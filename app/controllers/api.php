<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json;");

class api extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->helper(array('form', 'alert'));
    }

    // CHECK IF EMAIL EXIST AT REGISTRATION
    public function email_exist()
    {
        $this->call->database();
        echo json_encode($this->db->table('tbl_customer')->select('cust_email')->where("cust_email", $_POST['email'])->where_not_null('cust_password')->get());
    }

    // CHECK IF CONTACT EXIST AT REGISTRATION
    public function contact_exist()
    {
        $this->call->database();
        echo json_encode($this->db->table('tbl_customer')->select('cust_cnum')->where("cust_cnum", '09511177784')->where_not_null('cust_password')->get());
    }

    // CHECK IF USERNAME EXISTS AT VERIFY ACCOUNT
    public function username_exist()
    {
        $this->call->database();
        echo json_encode($this->db->table('tbl_customer')->select('cust_username')->where("cust_username", $_POST['username'])->get());
    }

    public function changeqty()
    {
        $this->call->database();
        $this->db->table('tbl_cart')->where('cart_id', $_POST['id'])->update(array('quantity' => $_POST['qty']));
        $data["total"] =  $this->db->table('tbl_cart as c')->select_sum('c.quantity*p.prod_price', 'total')->join('tbl_product as p', 'c.prod_id=p.prod_id')->where(array('c.cust_id' => $this->session->userdata('user_id'), 'c.trans_id' => '0'))->get_all();
        $data["single"] = $this->db->table('tbl_cart as c')->join('tbl_product as p', 'c.prod_id=p.prod_id')->join('tbl_unit as u', 'p.prod_unit=u.unit_id')->where(array('c.cart_id' => $_POST['id']))->get();
        echo json_encode($data);
    }

    public function deleteitem()
    {
        $this->db->table('tbl_cart')->where("cart_id", $_POST['id'])->delete();
        echo json_encode($this->db->table('tbl_cart as c')->select_sum('c.quantity*p.prod_price', 'total')->join('tbl_product as p', 'c.prod_id=p.prod_id')->where(array('c.cust_id' => $this->session->userdata('user_id'), 'c.trans_id' => '0'))->get_all());
    }
    public function cancelorder()
    {
        echo json_encode($this->db->table('tbl_transaction')->where("trans_id", $_POST['id'])->update(array('trans_status' => 'C')));
    }
    public function addtocart()
    {
        $price = $this->db->raw("SELECT prod_price FROM tbl_product WHERE prod_id = ?", array($_POST['id']))[0]['prod_price'];
        $bind = array(
            'prod_id' => $_POST['id'],
            'price' => $price,
            'cust_id' => $this->session->userdata('user_id'),
            'quantity' => 1
        );
        $this->db->table('tbl_cart')->insert($bind);
        echo json_encode($this->db->table('tbl_cart')->select_count('cart_id', 'total_row')->where(array('cust_id' =>  $this->session->userdata('user_id'), 'trans_id' => '0'))->get());
    }


    public function order_details()
    {
        $this->call->database();
        $data['cart'] = $this->db->table('tbl_cart as c')->select('c.*, p.*,u.unit, t.trans_note')->join('tbl_product as p', 'c.prod_id=p.prod_id')->join('tbl_transaction as t', 'c.trans_id=t.trans_id')->join('tbl_unit as u', 'p.prod_unit=u.unit_id')->where("c.trans_id", $_POST['id'])->get_all();
        $data['customer'] = $this->db->table('tbl_transaction as t')->join('tbl_customer as c', 't.cust_id=c.cust_id')->join('tbl_address as a', 'c.cust_id=a.cust_id')->join('tbl_barangay as b', 'a.barangay_id=b.brgy_id')->where("t.trans_id", $_POST['id'])->get();
        echo json_encode($data);
    }

    public function BuyProduct()
    {
        echo json_encode($this->db->table('tbl_cart')->where("cart_id", $_POST['id'])->update(array('status' => $_POST['status'])));
    }

    public function sendMessage()
    {
        $this->call->database();
        if (isset($_SESSION['user_id']))
            $msgOwner = 'c' . $_SESSION['user_id'];
        else
            $msgOwner = 'm' . $this->db->raw("SELECT marketer_id FROM tbl_transaction WHERE trans_id = ?", array($_POST['transactionID']))[0]['marketer_id'];

        $bind = array(
            'trans_id' => $_POST['transactionID'],
            'message' => $_POST['message'],
            'msg_owner' => $msgOwner
        );
        $result = array($this->db->table('tbl_messaging')->insert($bind));

        if (strlen($result[0]) > 0)
            echo json_encode($result);
    }

    public function getNewMsgs()
    {
        $this->call->database();
        echo json_encode($this->db->raw('SELECT * FROM tbl_messaging WHERE mess_id > ? AND trans_id = ?', array($_POST['msg_id'], $_POST['trans_id'])));
    }

    public function getOldMsgs()
    {
        $this->call->database();
        $data['messages'] = $this->db->raw('SELECT * FROM tbl_messaging WHERE trans_id = ? AND mess_id < ? ORDER BY mess_id DESC LIMIT 20', array($_POST['trans_id'], $_POST['oldestMsgID']));
        $data['msgCount'] = count($data['messages']);
        echo json_encode($data);
    }

    public function newNotif(){
        $this->call->database();
        $data['pending'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where('trans_status','P')->get();
        $data['process'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where('trans_status', 'OP')->get();
        $data['delivery'] = $this->db->table('tbl_transaction')->select_count('trans_id', 'total')->where('trans_status', 'O')->get();
        echo json_encode($data);
    }

    public function refresh_info()
    {
        $this->call->model('M_marketer');
        $transactionId= $_POST['trans_id']; // DITO ANG ID FROM POST
        $data['transaction_info'] = $this->M_marketer->get_delivery_fee($transactionId);
        $data['order_list'] = $this->M_marketer->get_order_list($transactionId);
        $this->session->set_userdata(array('transaction_id' => $transactionId));
        $data['kachat_info'] = $this->M_marketer->customer_info($transactionId);
        $data['order_list_id'] = '[';
        for ($i = 0; $i < count($data['order_list']); $i++) {
            if (count($data['order_list']) - 1 == $i)
                $data['order_list_id'] .= $data['order_list'][$i]['cart_id'] . ']';
            else
                $data['order_list_id'] .= $data['order_list'][$i]['cart_id'] . ', ';
        }
        echo json_encode($data);
    }

    public function update_orders()
    {
        $this->call->model('M_marketer');
        $order_list = json_decode($_POST['order_id']);
        $quantities = json_decode($_POST['quantities']);
        $this->call->database();
        for ($i = 0; $i < count($order_list); $i++) {
            $this->db->raw("UPDATE tbl_cart SET quantity = ? WHERE cart_id = ?", array($quantities[$i], $order_list[$i]));
        }
        echo json_decode(json_encode($_POST['order_id']));
    }

    public function earnings(){
        $month = $_POST['month'];
        echo  json_encode($this->db->raw("SELECT ROUND(SUM(c.quantity*c.price),2) AS total FROM tbl_cart as c LEFT JOIN tbl_transaction as t ON c.trans_id = t.trans_id WHERE MONTH(t.trans_date)=$month AND YEAR(t.trans_date)=YEAR(now()) AND t.trans_status = 'D'"));
    }

    public function inflation_data()
    {
        $this->call->model('M_admin');
        $data['inflation'] = $this->M_admin->get_inflation_data($_POST['prod_id'], $_POST['date']);
        $data['inflation']['date'] = json_decode('[' . $data['inflation']['date'] . ']');
        $data['inflation']['percentage'] = json_decode('[' . $data['inflation']['percentage'] . ']');
        echo json_encode($data);
    }

    public function transactions_data()
    {
        $this->call->model('M_admin');
        $data['transactions'] = $this->M_admin->get_transactions($_POST['date']);
        $compJson = '[';
        $cancJson = '[';
        for ($i = 1; $i <= 12; $i++) {
            $completed = 0;
            $cancelled = 0;

            foreach ($data['transactions']['completed'] as $comp) {
                if (intval(substr($comp['trans_date'], 5, 2)) == $i)
                    $completed = $comp['completed'];
            }

            foreach ($data['transactions']['cancelled'] as $canc) {
                if (intval(substr($canc['trans_date'], 5, 2)) == $i)
                    $cancelled = $canc['cancelled'];
            }

            if ($i == 12) {
                $compJson .= $completed;
                $cancJson .= $cancelled;
            } else {
                $compJson .= $completed . ', ';
                $cancJson .= $cancelled . ', ';
            }
        }
        $compJson .= ']';
        $cancJson .= ']';
        $result['completed'] = json_decode($compJson);
        $result['cancelled'] = json_decode($cancJson);
        $result['date'] = $_POST['date'];
        echo json_encode($result);
    }

    public function top_selling_data()
    {
        $this->call->model('M_admin');
        $data = $this->M_admin->get_top_products($_POST['date']);
        $data['date'] = $_POST['date'];
        echo json_encode($data);
    }
}

