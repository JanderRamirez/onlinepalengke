<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
class Marketer extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->helper(array('form', 'alert'));
        $this->call->model('mailer');
        $this->call->model('M_marketer');
        $this->call->model('upload');
    }
    public function OnProcess()
    {
        var_dump($_SESSION);
        $data['order'] = $this->M_marketer->onprocess($this->session->userdata('username'));
        $data['courier'] = $this->M_marketer->courier();
        $data['transaction'] = $this->M_marketer->notif_transaction($this->session->userdata('admin_id'));
        var_dump($data['transaction']);
        $this->call->view('admin/onprocess', $data);
    }
    public function OnDelivery()
    {
        $data['transaction'] = $this->M_marketer->notif_transaction($this->session->userdata('admin_id'));
        $data['order'] = $this->M_marketer->ondelivery($this->session->userdata('username'));
        $this->call->view('admin/ondelivery', $data);
    }
    public function Finished()
    {
        $data['transaction'] = $this->M_marketer->notif_transaction($this->session->userdata('admin_id')); 
        $data['order'] = $this->M_marketer->finished($this->session->userdata('username'));
        $this->call->view('admin/finished', $data);
    }

    public function Update()
    {
        

        if (isset($_POST['deliver'])) {
            $status = "O";
            $subj = "Out for Delivery";
            $id = $this->io->post('transId');
            $courier = $this->io->post('courier');
            $courierdata = $this->M_marketer->single_courier($this->io->post('courier'));
            var_dump($courierdata);
            $reciever = $courierdata['admin_email'];
            $body = '                    
            <div 
            style="
            padding-top: 15px;
            padding-bottom: 25px;
            background-color: rgba(240, 255, 255, 0.68);
            border-top: 10px solid;
            border-color: chocolate ;">
                <center>
                    <h1 
                    style="
                    color:chocolate;
                    margin-bottom: 20px;">
                        Order Confirmed
                    </h1>
                    
                    <h4 style="color: black;">Order ' . str_pad($this->io->post('transId'), 8, "0", STR_PAD_LEFT) . ' is out for delivery! You are assigned to deliver the items to the customer</h4>
        
                    <p style="color:chocolate;">Thank you! Please keep on choosing Online Palengke!</p>
                </center>
            </div>';

            $this->mailer->sendCode($reciever, $subj, $body);
            $cart = $this->M_marketer->cart($this->io->post('transId'));
            $customer = $this->M_marketer->cust_info($this->io->post('transId'));
            $reciever = $customer['cust_email'];
            $body = '                    
            <div 
            style="
            padding-top: 15px;
            padding-bottom: 25px;
            background-color: rgba(240, 255, 255, 0.68);
            border-top: 10px solid;
            border-color: chocolate ;">
                <center>
                    <h1 
                    style="
                    color:chocolate;
                    margin-bottom: 20px;">
                            Order Confirmed
                    </h1>
                    <h4 style="color:black">Your order ' . str_pad($this->io->post('transId'), 8, "0", STR_PAD_LEFT) . ' is out for delivery!</h4>
                    
                    <p style="color:chocolate;">Thank you! Please keep on choosing Online Palengke!</p>
                </center>
            </div>';
            
            // CHECK IF EMAIL SUCCESSFULLY SENT
            if ($this->mailer->sendCode($reciever, $subj, $body) == 'Link has been sent.') {
                $this->M_marketer->deliver($id, $status, $courier);
                $sess = array(
                    'email_succ' => 'Email has been sent successfully.'
                );
                $this->session->set_flashdata($sess);
                redirect('Marketer/Pending');
                exit;
            } else {
                $sess = array(
                    'email_err' => 'Email sending failed. Please try again.'
                );
                $this->session->set_flashdata($sess);
                redirect('Marketer/Pending');
                exit;
            }
        }

        
    }






















    public function message($transactionId)
    {
        $data['transaction_info'] = $this->M_marketer->get_delivery_fee($transactionId);
        $data['order_list'] = $this->M_marketer->get_order_list($transactionId);
        $this->session->set_userdata(array('transaction_id' => $transactionId));
        $data['messages'] = $this->M_marketer->getMessages($transactionId);
        $data['owner'] = 'm';
        $data['kachat_info'] = $this->M_marketer->customer_info($transactionId);
        $data['display_photo'] = $this->M_marketer->getDisplayPhoto($transactionId);
        if ($this->M_marketer->allMsgsFetched($transactionId)[0]['totalCount'] <= 20)
            $data['allMsgsFetched'] = 'true';
        else
            $data['allMsgsFetched'] = 'false';

        $data['order_list_id'] = '[';
        for ($i = 0; $i < count($data['order_list']); $i++) {
            if (count($data['order_list']) - 1 == $i)
                $data['order_list_id'] .= $data['order_list'][$i]['cart_id'] . ']';
            else
                $data['order_list_id'] .= $data['order_list'][$i]['cart_id'] . ', ';
        }
        $this->call->view('customer/message', $data);
    }
}
