<?php
class M_customer extends Model
{

    public function category()
    {
        return $this->db->table('tbl_category')->get_all();
    }
    public function product($page){
        $this->call->library('pagination');
        // return $this->db->table('tbl_product as p')->join('tbl_category as c', 'p.cat_id=c.cat_id')->where('archive', 0)->get_all();
        $offset = ($page - 1) * 20;
        $data['product'] = $this->db
            ->table('tbl_product as p')
            ->join('tbl_category as c', 'p.cat_id=c.cat_id')
            ->where('archive', 0)
            ->limit($offset, 20)
            ->order_by('prod_name')
            ->get_all();
        $count = $this->db
            ->table('tbl_product')
            ->select_count('prod_id', 'count')
            ->where('archive', 0)
            ->get_all()[0];
            $this->pagination->initialize($count['count'], 20, $page,'Customer/Home');
        $data['pagination'] = $this->pagination->paginate();
        return $data;
    }
    public function cart($user)
    {
        return $this->db->table('tbl_cart as c')->join('tbl_product as p', 'c.prod_id=p.prod_id')->join('tbl_unit as u', 'p.prod_unit=u.unit_id')->where(array('c.cust_id' => $user, 'c.trans_id' => '0'))->get_all();
    }
    public function order($user)
    {
        return $this->db->table('tbl_transaction as t')->select('t.*')->select_sum('(c.quantity*p.prod_price)', 'total')->left_join('tbl_cart as c', 't.trans_id=c.trans_id')->left_join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('t.trans_id')->where(array('t.cust_id' => $user))->get_all();
    }
    public function Cart_add($prod, $user, $qty = 1, $price = 0)
    {       
        $bind = array(
            'prod_id' => $prod,
            'cust_id' => $user,
            'price' => $price,
            'quantity' => $qty
        );
        $this->db->table('tbl_cart')->insert($bind);
    }
    public function billing($user)
    {
        return $this->db->table('tbl_customer as c')->join('tbl_address as a', 'c.cust_id=a.cust_id')->join('tbl_barangay as b', 'a.barangay_id=b.brgy_id')->where(array('c.cust_id' => $user))->get();
    }
    public function Place($user, $note = " ")
    {
        $bind = array(
            'cust_id' => $user,
            'trans_status' => "P",
            'trans_date' => date("Y-m-d"),
            'trans_note' => $note
        );
        $this->db->table('tbl_transaction')->insert($bind);
    }
    public function LastTrans($user)
    {
        return $this->db->table('tbl_transaction')->select('trans_id')->order_by('trans_id', 'DESC')->where(array('cust_id' => $user))->get();
    }
    public function updatecart($cid, $tid)
    {
        $this->call->database();
        $data = [
            'trans_id' => $tid
        ];
        $this->db->table('tbl_cart')->where('cart_id', $cid)->update($data);
        return $data;
    }

    // SELECT PRODUCT PER CATEGORY
    public function ProdCat($id)
    {
        return $this->db->table('tbl_product as p')->join('tbl_category as c', 'p.cat_id=c.cat_id')->where(array('p.cat_id' => $id))->get_all();
    }
    // SELECT PRODUCT PER USER INPUT
    public function ProdSearch($search)
    {
        return $this->db->table('tbl_product as p')->join('tbl_category as c', 'p.cat_id=c.cat_id')->like('p.prod_name', '%' . $search . '%')->get_all();
    }
    // JUST FOR YOU
    public function jfy($id)
    {
        return $this->db->table('tbl_cart as c')->join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('c.prod_id')->order_by('SUM(c.quantity)', 'DESC')->where(array('c.cust_id' => $id))->not_where('trans_id', 0)->limit(6)->get_all();
    }
    // TOP SELLING PRODUCTS
    public function tsp()
    {
        return $this->db->table('tbl_cart as c')->join('tbl_product as p', 'c.prod_id=p.prod_id')->group_by('c.prod_id')->order_by('SUM(c.quantity)', 'DESC')->not_where('trans_id', 0)->limit(6)->get_all();
    }
    // LAST PURCHASE PRODUCTS
    public function lpp($id)
    {
        return $this->db->table('tbl_cart as c')->select('distinct(c.prod_id) as id')->select('p.*')->join('tbl_product as p', 'c.prod_id=p.prod_id')->order_by('cart_id', 'DESC')->where(array('c.cust_id' => $id))->not_where('trans_id', 0)->limit(6)->get_all();
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

    public function getDisplayPhoto($transactionID)
    {
        $mId = $this->db->raw('SELECT marketer_id FROM tbl_transaction WHERE trans_id = ?', array($transactionID))[0]['marketer_id'];
        $mBin = file_get_contents(BASE_URL . PUBLIC_DIR . '/images/marketer/' . $mId);
        $data['mark'] = base64_encode($mBin);
        $data['cust'] = base64_encode(file_get_contents(BASE_URL . PUBLIC_DIR . '/images/logo.png'));
        return $data;
    }

    public function marketer_info($transactionID)
    {
        $data = $this->db->raw(
            "SELECT * FROM tbl_admin WHERE admin_id = ?",
            array($this->db->raw('SELECT marketer_id FROM tbl_transaction WHERE trans_id = ?', array($transactionID))[0]['marketer_id'])
        );
        $result['fname'] = $data[0]['admin_fname'];
        $result['mname'] = $data[0]['admin_mname'];
        $result['lname'] = $data[0]['admin_lname'];
        return $result;
    }

    public function rate($id, $rating, $review){
        $this->db->table('tbl_transaction')->where("trans_id", $id)->update(array('rating' =>$rating, 'review' =>$review));
    }
    // GET ALL DATA FROM BARANGAY TABLE
    public function get_barangay(){
        return $this->db->table('tbl_barangay')->order_by('brgy_name')->get_all();
    }
}
