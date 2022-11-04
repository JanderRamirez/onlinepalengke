<?php
class M_marketer extends Model
{

    public function pending($username)
    {
        $this->call->database();

        return $this->db->table('tbl_transaction as t')->select('t.*,cu.*')->select_sum('(c.quantity*p.prod_price)', 'total')->left_join('tbl_cart as c', 't.trans_id=c.trans_id')->left_join('tbl_customer as cu', 't.cust_id=cu.cust_id')->left_join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('t.trans_id')->where(['t.trans_status' => 'P'])->get_all();
    }

    public function onprocess($username)
    {
        $this->call->database();
        $marketerId = $this->db->raw("SELECT admin_id FROM tbl_admin WHERE admin_username = ?", array($username))[0]['admin_id'];
        return $this->db->table('tbl_transaction as t')->select('t.*,cu.*')->select_sum('(c.quantity*p.prod_price)', 'total')->left_join('tbl_cart as c', 't.trans_id=c.trans_id')->left_join('tbl_customer as cu', 't.cust_id=cu.cust_id')->left_join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('t.trans_id')->where(['t.trans_status' => 'OP', 'marketer_id' => $marketerId])->get_all();
    }

    public function ondelivery($username)
    {
        $this->call->database();
        $marketerId = $this->db->raw("SELECT admin_id FROM tbl_admin WHERE admin_username = ?", array($username))[0]['admin_id'];
        return $this->db->table('tbl_transaction as t')->select('t.*,cu.*')->select_sum('(c.quantity*p.prod_price)', 'total')->left_join('tbl_cart as c', 't.trans_id=c.trans_id')->left_join('tbl_customer as cu', 't.cust_id=cu.cust_id')->left_join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('t.trans_id')->where(['t.trans_status' => 'O', 'marketer_id' => $marketerId])->get_all();
    }

    public function finished($username)
    {
        $this->call->database();
        $marketerId = $this->db->raw("SELECT admin_id FROM tbl_admin WHERE admin_username = ?", array($username))[0]['admin_id'];
        return $this->db->table('tbl_transaction as t')->select('t.*,cu.*')->select_sum('(c.quantity*p.prod_price)', 'total')->left_join('tbl_cart as c', 't.trans_id=c.trans_id')->left_join('tbl_customer as cu', 't.cust_id=cu.cust_id')->left_join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('t.trans_id')->where(['t.trans_status' => 'D', 'marketer_id' => $marketerId])->get_all();
    }

    public function update($id, $status, $date, $markerterID)
    {
        $cust_id = $this->db->raw('SELECT cust_id FROM tbl_transaction WHERE trans_id = ?', array($id))[0]['cust_id'];
        $delivery_fee = $this->db->raw('SELECT b.delivery_fee FROM tbl_address AS a INNER JOIN tbl_barangay AS b ON a.barangay_id = b.brgy_id WHERE a.cust_id = ?', array($cust_id))[0]['delivery_fee'];

        $this->db->table('tbl_transaction')->where("trans_id", $id)->update(array('delivery_fee' => $delivery_fee, 'trans_status' => $status, $date =>  date("Y-m-d H:i:s"), 'marketer_id' => $markerterID));
        $this->db->raw("INSERT INTO tbl_messaging (msg_owner, message, trans_id) VALUES (?,?,?)", array('m' . $markerterID, 'Good Day! Thank you for choosing Calapan Online Palengke.', $id));
    }

    public function deliver($id, $status, $courier)
    {
        $this->db->table('tbl_transaction')->where("trans_id", $id)->update(array('trans_status' => $status, 'cour_id' => $courier, "delivery" => date("Y-m-d H:i:s")));
    }

    public function cart($id)
    {
        $this->call->database();
        return  $this->db->table('tbl_cart as c')->select('c.*, p.*, u.unit')->join('tbl_product as p', 'c.prod_id=p.prod_id')->join('tbl_transaction as t', 'c.trans_id=t.trans_id')->join('tbl_unit as u', 'p.prod_unit=u.unit_id')->where("c.trans_id", $id)->get_all();
    }

    public function cust_info($id)
    {
        $this->call->database();
        return  $this->db->table('tbl_transaction as t')->join('tbl_customer as c', 't.cust_id=c.cust_id')->join('tbl_address as a', 'c.cust_id=a.cust_id')->join('tbl_barangay as b', 'a.barangay_id=b.brgy_id')->where("t.trans_id", $id)->get();
    }

    public function courier()
    {
        $this->call->database();
        return  $this->db->table('tbl_admin')->where("admin_type", 3)->get_all();
    }

    public function single_courier($id)
    {
        $this->call->database();
        return  $this->db->table('tbl_admin')->where("admin_id", $id)->get();
    }

    public function nextMarketer()
    {
        $this->call->database();
        $latestMarketer =  $this->db->raw('select marketer_id from tbl_transaction WHERE marketer_id != 0 ORDER BY trans_id DESC limit 1')[0]['marketer_id'];
        $newMarketer = $this->db->raw('select admin_id from tbl_admin WHERE admin_id > ? AND admin_type = 2 limit 1', array($latestMarketer));

        if (count($newMarketer) > 0) {
            return $newMarketer[0]['admin_id'];
        } else {
            return $this->db->raw('select admin_id from tbl_admin WHERE admin_type = 2 ORDER BY admin_id ASC limit 1')[0]['admin_id'];
        }
    }

    public function notif_transaction($id)
    {
    //    $trans['pending'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where('trans_status', 'P')->get();
       $trans['process'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where(array('trans_status' => 'OP', 'marketer_id'=>$id))->get();
       $trans['delivery'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where(array('trans_status' => 'O', 'marketer_id'=>$id))->get();
       $trans['successful'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where(array('trans_status' => 'D', 'marketer_id'=>$id))->get();
       return $trans;
    }


    // GET THE FIRST 20 MESSAGES
    public function getMessages($transactionID)
    {
        return array_reverse($this->db->raw('SELECT * FROM tbl_messaging WHERE trans_id = ? ORDER BY mess_id DESC LIMIT 20', [$transactionID]));
    }

    public function allMsgsFetched($transactionID)
    {
        return $this->db->raw('SELECT COUNT(mess_id) AS totalCount FROM tbl_messaging WHERE trans_id = ?', array($transactionID));
    }

    public function getDisplayPhoto($transactionID){
        $mId = $this->db->raw('SELECT marketer_id FROM tbl_transaction WHERE trans_id = ?', array($transactionID))[0]['marketer_id'];
        $mBin = file_get_contents(BASE_URL . PUBLIC_DIR . '/images/marketer/'. $mId);
        $data['mark'] = base64_encode($mBin);
        $data['cust'] = base64_encode(file_get_contents(BASE_URL . PUBLIC_DIR . '/images/logo.png'));
        return $data;
    }

    public function customer_info($transactionID)
    {
        $data = $this->db->raw(
            "SELECT * FROM tbl_customer WHERE cust_id = ?",
            array($this->db->raw('SELECT cust_id FROM tbl_transaction WHERE trans_id = ?', array($transactionID))[0]['cust_id'])
        );
        $address = $this->db->raw('SELECT a.street, b.brgy_name FROM tbl_address AS a INNER JOIN tbl_barangay AS b ON a.barangay_id = b.brgy_id WHERE a.cust_id = ?', array($data[0]['cust_id']));
        $result['address'] = ucfirst($address[0]['brgy_name']) . ', ' . ucfirst($address[0]['street']);
        $result['fname'] = $data[0]['cust_fname'];
        $result['mname'] = $data[0]['cust_mname'];
        $result['lname'] = $data[0]['cust_lname'];
        $result['num'] = $data[0]['cust_cnum'];
        return $result;
    }
    public function get_order_list($transactionID)
    {
        return $this->db->raw("SELECT c.*,p.*,u.* FROM tbl_cart as c INNER JOIN tbl_product as p ON c.prod_id = p.prod_id  INNER JOIN tbl_unit as u ON u.unit_id = p.prod_unit WHERE trans_id = ? ORDER BY p.prod_name", array($transactionID));
    }
    public function get_delivery_fee($transactionID){
        return $this->db->raw('SELECT * FROM tbl_transaction WHERE trans_id = ?', array($transactionID))[0];
    }
}
