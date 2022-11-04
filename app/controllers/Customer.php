<?php

use GuzzleHttp\Psr7\Message;

defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
class Customer extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->helper(array('form', 'alert'));
        $this->call->model('M_customer');
        $this->call->model('mailer');
    }
    public function check()
    {
        if (!$this->session->has_userdata('username')) {
            redirect('Customer/Home');
        }
    }
    public function home($page=1)
    {
        $data['category'] = $this->M_customer->category();
        $data['cart'] = $this->M_customer->cart($this->session->userdata('user_id'));
        // $data['product'] = $this->M_customer->product();
        $data['product'] = $this->M_customer->product($page);
        $data['jfy'] = $this->M_customer->jfy($this->session->userdata('user_id'));
        $data['tsp'] = $this->M_customer->tsp();
        $data['lpp'] = $this->M_customer->lpp($this->session->userdata('user_id'));
        // var_dump($data);  
        $this->call->view('customer/home',$data);  
        
        // echo $data['product'];
    }

    public function Cart()
    {
        $this->check();
        $data['category'] = $this->M_customer->category();
        $data['cart'] = $this->M_customer->cart($this->session->userdata('user_id'));
        $this->call->view('customer/cart', $data);
    }

    public function Order()
    {
        $this->check();
        $data['category'] = $this->M_customer->category();
        $data['cart'] = $this->M_customer->cart($this->session->userdata('user_id'));
        $data['order'] = $this->M_customer->order($this->session->userdata('user_id'));
        $this->call->view('customer/order', $data);
    }

    public function Checkout()
    {
        $this->check();
        $data['category'] = $this->M_customer->category();
        $data['billing'] = $this->M_customer->billing($this->session->userdata('user_id'));
        $data['cart'] = $this->M_customer->cart($this->session->userdata('user_id'));
        if ($data['cart'])
            $this->call->view('customer/checkout', $data);
        else {
            redirect('customer/home');
        }
    }

    public function Contact()
    {
        $this->check();
        $data['category'] = $this->M_customer->category();
        $data['billing'] = $this->M_customer->billing($this->session->userdata('user_id'));
        $data['cart'] = $this->M_customer->cart($this->session->userdata('user_id'));
        $this->call->view('customer/contact', $data);
    }

    public function profile(){
        $data['cart'] = $this->M_customer->cart($this->session->userdata('user_id'));
        $data['prof_info'] = $this->M_customer->billing($this->session->userdata('user_id'));
        $data['barangays'] = $this->M_customer->get_barangay();
        $this->call->view('Customer/profile', $data);
    }

    public function Rate(){
        $rating = $this->io->post('rating');
        $review = $this->io->post('review');
        $id = $this->io->post('id');
        $this->M_customer->rate($id, $rating, $review);
        redirect('Customer/Order');
    }

    public function Place()
    {
        $this->check();
        // $data['category'] = $this->M_customer->category();
        $note = $this->io->post('note');
        $this->M_customer->Place($this->session->userdata('user_id'), $note);
        $data['last'] = $this->M_customer->LastTrans($this->session->userdata('user_id'));
        $data['cart'] = $this->M_customer->cart($this->session->userdata('user_id'));
        foreach ($data['cart'] as $cart) {
            $this->M_customer->updatecart($cart['cart_id'], $data['last']['trans_id']);
        }
        $status = "P";
        $subj = "Your Order Has Been Placed";
        $id = $data['last']['trans_id'];
        $this->call->model('M_marketer');
        $cart = $this->M_marketer->cart($data['last']['trans_id']);
        $customer = $this->M_marketer->cust_info($data['last']['trans_id']);
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
                    Order Placed
                </h1>

                <p style="color:black;">Your order ' . str_pad($data['last']['trans_id'], 8, "0", STR_PAD_LEFT) . '  has been placed! We will update you for status of your order.</p>
                <h3 style="margin: 3rem 3rem 1.5rem 3rem ; color: chocolate;">Your Orders</h3>
                
                <table width="90%" style="border-collapse: collapse;">
                    <thead>
                        <tr style="color:#730703;font-weight: bold;">
                            <td>Item</td>
                            <td style="text-align: right;">Price</td>
                            <td style="text-align: center;">Quantity</td>
                            <td style="text-align: right;">Total</td>
                        </tr>
                    </thead>
                    <tbody>';
        $sub = 0;
        foreach ($cart as $c) {
            $body = $body . ' <tr>
                        <td>' . $c['prod_name'] . '</td>
                        <td style="text-align: right;">₱' . number_format($c['prod_price'], 2) . '</td>
                        <td style="text-align: center;">' . $c['quantity'] . ' ' . $c['unit'] . '</td>
                        <td style="text-align: right;">₱' . number_format($c['prod_price'] * $c['quantity'], 2) . '</td>
                        </tr>';
            $sub += $c['prod_price'] * $c['quantity'];
        }
        $body .= '

                        <tr style="border-bottom: 1pt solid black;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"><b>Sub-total</b></td>
                        <td style="text-align: right;"><b>₱' . number_format($sub, 2) . '</b></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"><b>Shipping fee</b></td>
                        <td style="text-align: right;"><b>₱' . number_format($customer['delivery_fee'], 2) . '</b></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;"><b>Total</b></td>
                        <td style="text-align: right;"><b>₱' . number_format($sub + $customer['delivery_fee'], 2) . '</b></td>
                        </tr>
                    </tbody>
                </table>

                <h5 style="color:chocolate; margin-top: 2rem;">Thank you for choosing Online Palengke!</h5>
                </center>
            </div>';


        $customer = $this->M_marketer->cust_info($data['last']['trans_id']);
        if ($this->mailer->sendCode($customer['cust_email'], $subj, $body) == 'Link has been sent.') {
            $this->M_marketer->update($id, $status, "pending", 0);
            $sess = array(
                'email_succ' => 'Email has been sent successfully.'
            );
            $this->session->set_flashdata($sess);
        }


        $subj = "An Order Has Been Placed";
        $id = $data['last']['trans_id'];
        $this->call->model('M_marketer');
        $customer = $this->M_marketer->cust_info($data['last']['trans_id']);
        var_dump($customer);

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
                    Order Placed
                </h1>
                <h4 style="color:black;">' . $customer['cust_fname'] . ' ' . $customer['cust_lname'] . ' made an order with transaction number ' . str_pad($data['last']['trans_id'], 8, "0", STR_PAD_LEFT) . '  ! Please check the list of orders.</h4>

                <h3 style="margin: 3rem 3rem 1.5rem 3rem ; color: chocolate;" >Order Lists</h3>

                <table width="90%" style="border-collapse: collapse;">

                    <thead>
                        <tr style="color:#730703;font-weight: bold;">
                            <td>Item</td>
                            <td style="text-align: right;">Price</td>
                            <td style="text-align: center;">Quantity</td>
                            <td style="text-align: right;">Total</td>
                        </tr>
                    </thead>

                    <tbody>';
        $sub = 0;
        foreach ($cart as $c) {
            $body = $body . ' 
                        <tr>
                            <td>' . $c['prod_name'] . '</td>
                            <td style="text-align: right;">₱' . number_format($c['prod_price'], 2) . '</td>
                            <td style="text-align: center;">' . $c['quantity'] . ' ' . $c['unit'] . '</td>
                            <td style="text-align: right;">₱' . number_format($c['prod_price'] * $c['quantity'], 2) . '</td>
                        </tr>';
            $sub += $c['prod_price'] * $c['quantity'];
        }
        $body .= '

                        <tr style="border-bottom: 1pt solid black;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;"><b>Sub-total</b></td>
                            <td style="text-align: right;"><b>₱' . number_format($sub, 2) . '</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;"><b>Shipping fee</b></td>
                            <td style="text-align: right;"><b>₱' . number_format($customer['delivery_fee'], 2) . '</b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align: right;"><b>Total</b></td>
                            <td style="text-align: right;"><b>₱' . number_format($sub + $customer['delivery_fee'], 2) . '</b></td>
                        </tr>
                    </tbody>
                </table>
                <h5 style="color:chocolate; margin-top: 2rem;">Thank you for choosing Online Palengke!</h5>
            </center>
        </div>
        ';

        if ($this->mailer->sendCode('onlinepalengke2022@gmail.com', $subj, $body) == 'Link has been sent.') {
            $sess = array(
                'email_succ' => 'Email has been sent successfully.'
            );
            $this->session->set_flashdata($sess);
        }
        redirect('Customer/Order');
    }

    public function Cart_add($prod)
    {
        $this->check();
        if (!$this->session->has_userdata('username')) {
            echo '<script>window.alert("Please signin before adding to cart!")</script>';
        } else {
            $this->M_customer->Cart_add($prod, $this->session->userdata('user_id'));
        }
        redirect('Customer/Home');
    }

    public function Search($id)
    {
        $this->check();
        $data['category'] = $this->M_customer->category();
        $data['cart'] = $this->M_customer->cart($this->session->userdata('user_id'));
        $data['product'] = $this->M_customer->ProdCat($id); //SEARCH PRODUCT BY CATEGORY
        $this->call->view('customer/search', $data);
        // var_dump($data['product']);
    }
    public function Result()
    {
        $this->check();
        $data['category'] = $this->M_customer->category();
        $data['cart'] = $this->M_customer->cart($this->session->userdata('user_id'));
        $data['product'] = $this->M_customer->ProdSearch($this->io->post('search')); //SEARCH PRODUCT BY USER INPUT
        $data['search'] = $this->io->post('search');
        $this->call->view('customer/single_search', $data);
        // var_dump($data['product']);
    }



    // --------------------------------MESSAGING----------------------------------------------------

    public function message($transactionId)
    {
        $this->call->model('M_marketer');
        $data['transaction_info'] = $this->M_marketer->get_delivery_fee($transactionId);
        $data['order_list'] = $this->M_marketer->get_order_list($transactionId);
        $this->session->set_userdata(array('transaction_id' => $transactionId));
        $data['messages'] = $this->M_customer->getMessages($transactionId);
        $data['owner'] = 'c';
        $data['kachat_info'] = $this->M_marketer->customer_info($transactionId);
        $data['marketer_info'] = $this->M_customer->marketer_info($transactionId);
        $data['display_photo'] = $this->M_customer->getDisplayPhoto($transactionId);
        if ($this->M_customer->allMsgsFetched($transactionId)[0]['totalCount'] <= 20)
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
