<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
class Account extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->helper(array('form', 'alert'));
        $this->call->model('M_account');
        $this->call->model('mailer');
        $this->call->model('sms');
    }
    public function Index(){
        if ($this->session->userdata('admin_type') == '1')
            redirect('admin/dashboard');
        else if ($this->session->userdata('admin_type') == '2')
            redirect('marketer/onprocess');
        else
            redirect('customer/home');
    }

    // LOG IN PAGE 
    public function Login()
    {
        $this->session->sess_destroy();
        $this->call->view('account/Login');
    }
    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('Account/Login');
    }

    // FORGOT PASSWORD PAGE
    public function Forgot()
    {
        $this->call->view('account/Forgot');
    }

    // LOAD REGISTER PAGE
    public function Register()
    {
        $data['barangays'] = $this->M_account->get_barangay();
        $this->call->view('account/register', $data);
    }

    // LOAD LINK SENT PAGE
    public function Link_Sent()
    {
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('fn')->required()
                ->min_length(1)
                ->max_length(30)
                ->name('mn')->required()
                ->min_length(1)
                ->max_length(30)
                ->name('ln')->required()
                ->min_length(1)
                ->max_length(30)
                ->name('sex')->required()
                ->min_length(1)
                ->name('bd')->required()
                ->name('street')->required()
                ->min_length(1)
                ->max_length(50)
                ->name('barangay')->required()
                ->numeric()
                ->min_length(1)
                ->max_length(50)
                ->name('contact')->required()
                ->min_length(1)
                ->max_length(13)
                ->name('email')->required();

            if ($this->form_validation->run()) {
                $fn = $this->io->post('fn');
                $mn = $this->io->post('mn');
                $ln = $this->io->post('ln');
                $sex = $this->io->post('sex');
                $bd = $this->io->post('bd');
                $barangay = trim($this->io->post('barangay'));
                $contact = $this->io->post('contact');
                $email = $this->io->post('email');

                $textRegEx = '/^[a-zA-Z- ]{0,30}$/';
                $sexRegEx = '/^(male|female)$/';
                $bdRegEx = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
                $contactRegEx = '/^09[0-9]{2}-[0-9]{3}-[0-9]{4}$/';

                //CHECK INPUT IF MATCHES THE REGULAR EXPRESSION
                $fnValid = preg_match($textRegEx, $fn);
                $mnValid = preg_match($textRegEx, $mn);
                $lnValid = preg_match($textRegEx, $ln);
                $sexValid = preg_match($sexRegEx, $sex);
                $bdValid = preg_match($bdRegEx, $bd);
                $contactValid = preg_match($contactRegEx, $contact);

                // kapag null/'' ang returned value ay invalid ang email
                if (filter_var($email, FILTER_VALIDATE_EMAIL) == '')
                    $emailValid = 0;
                else
                    $emailValid = 1;

                // SERVER SIDE VALIDATION OF INPUTS
                if ($fnValid == 0 || $mnValid == 0 || $lnValid == 0 || $sexValid == 0 || $bdValid == 0 || is_numeric($barangay) == 0 || $contactValid == 0 || $emailValid == 0) {
                    if ($fnValid == 0) {
                        $input = ' first name ';
                    } else if ($mnValid == 0) {
                        $input = ' middle name ';
                    } else if ($lnValid == 0) {
                        $input = ' last name ';
                    } else if ($sexValid == 0) {
                        $input = 'sex';
                    } else if ($bdValid == 0) {
                        $input = ' birthdate ';
                    } else if (is_numeric($barangay) == 0) {
                        $input = ' barangay ';
                    } else if ($contactValid == 0) {
                        $input = ' contact ';
                    }
                    $sess = array(
                        'msg' => 'Your' . $input . 'are invalid please try again.',
                        'fn' => $this->io->post('fn'),
                        'mn' => $this->io->post('mn'),
                        'ln' => $this->io->post('ln'),
                        'sex' => $this->io->post('sex'),
                        'bd' => $this->io->post('bd'),
                        'email' => $this->io->post('email'),
                        'contact' => $this->io->post('contact'),
                        'barangay' => $this->io->post('barangay'),
                        'street' => $this->io->post('street'),
                    );
                    $this->session->set_flashdata($sess);
                    redirect('account/register');
                    exit;
                } else {
                    // DETERMINES WHETHER EMAIL EXISTS IN THE TABLE AND EITHER INSERTS IT OR UPDATE RECORD
                    $isUpdateInsert = 'insert';

                    //  CHECKS IF THE EMAIL EXISTS, OR FULLY VERIFIED
                    $isFullyRegistered = $this->db->table('tbl_customer')->select('cust_email')->where(array("cust_email" => $this->io->post('email')))->where_not_null('cust_password')->get_all();
                    $isPartiallyRegistered = $this->db->table('tbl_customer')->select('cust_id')->where(array("cust_email" => $this->io->post('email')))->where_null('cust_password')->get();

                    if ($isFullyRegistered != false) {
                        $sess = array(
                            'login_succ' => 'Email already registered. Please login instead.',
                            'email' => $this->io->post('email')
                        );
                        $this->session->set_flashdata($sess);
                        redirect('account/login');
                    } else {
                        if ($isPartiallyRegistered != false) {
                            $isUpdateInsert = 'update';
                        }

                        // GENERATE VERIFICATION CODE
                        $code = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                        $code = substr(str_shuffle($code), 0, 10);

                        // GET CODE SENDING MODE
                        $sendVia = $this->io->post('send-to');
                        $isCodeSent = false;

                        if ($sendVia == "number") {
                            $msg = BASE_URL . 'Account/verify_account/' . $code;
                            $number = str_replace('-', "", $this->io->post('contact'));
                            $smsResult = $this->sms->sendCode($number, 'asdasd');
                            if ($smsResult == 0) {
                                $isCodeSent = true;
                            } else {
                                $isCodeSent = 'Sending failed. Err code: ' . $smsResult;
                            }
                        } else {
                            if (strpos($this->io->post('email'), '@gmail.com') != false && strlen($this->io->post('email')) > 0 && $this->form_validation->valid_email($this->io->post('email'))) {

                                $subj = 'Email Verification Link';
                                $body = '
                                <div 
                                style="
                                padding-top: 35px;
                                padding-bottom: 25px;
                                background-color: rgba(240, 255, 255, 0.68);
                                border-top: 10px solid;
                                border-color: chocolate ;">
                                    <center>
                                        <h1 
                                            style="
                                            color:chocolate;
                                            margin-bottom: 20px;">
                                                Email Verification Link
                                        </h1>
                                        <h4 
                                            style="
                                                color:black">
                                                    Welcome to Calapan Online Palengke. To fully verify your account use this link: 
                                        </h4>
                                        <p style="color:chocolate">Thank you for Choosing us!</p>
                                        <a href="' . BASE_URL . 'Account/verify_account/' . $code . '" target="_blank"
                                            style="
                                            text-decoration:none;
                                            color:white">
                                            <button 
                                                style="
                                                color:white;
                                                background-color:chocolate;
                                                margin-top: 2rem;
                                                border: 0px;
                                                cursor:pointer;
                                                padding: 10px;">
                                                    Verify Account
                                            </button>
                                        </a>
                                    </center>
                                </div>
                            ';
                                $mailResult = $this->mailer->sendCode($this->io->post('email'), $subj, $body);

                                if ($mailResult == "Link has been sent.") {
                                    $isCodeSent = true;
                                } else {
                                    $isCodeSent = $mailResult;
                                }
                            } else {
                                echo 'invalid email';
                                //RETURN TO REGISTER PAGE WITH DATA SENT AND ALERT THAT EMAIL IS INVALID
                            }
                        }

                        // CHECKS IF VERIFICATION SENDINNG SUCCESSFULLY FINISHED    
                        if ($isCodeSent == "true") {
                            $this->M_account->insertConsumer(
                                $this->io->post('fn'),
                                $this->io->post('mn'),
                                $this->io->post('ln'),
                                $this->io->post('sex'),
                                $this->io->post('bd'),
                                $this->io->post('email'),
                                $this->io->post('contact'),
                                $this->io->post('barangay'),
                                $this->io->post('street'),
                                $code,
                                $isUpdateInsert
                            );
                            $this->call->view('account/Link_Sent');
                        } else {
                            $sess = array(
                                'msg' => 'Verification Sending failed. Please try again.',
                                'fn' => $this->io->post('fn'),
                                'mn' => $this->io->post('mn'),
                                'ln' => $this->io->post('ln'),
                                'sex' => $this->io->post('sex'),
                                'bd' => $this->io->post('bd'),
                                'email' => $this->io->post('email'),
                                'contact' => $this->io->post('contact'),
                                'barangay' => $this->io->post('barangay'),
                                'street' => $this->io->post('street'),
                            );
                            $this->session->set_flashdata($sess);
                            redirect('account/register');
                            exit;
                        }
                    }
                }
            } else {
                redirect('account/register');
            }
        } else {
            redirect('account/register');
        }
    }

    // VERIFY ACCOUNT
    public function verify_account($code)
    {
        $data['customer'] = $this->M_account->verify_account($code);
        if ($data['customer'])
            $this->call->view('account/Verify-Account', $data);
    }

    // COMPLETE REGISTRATION
    public function complete_registration()
    {
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('pass')->required()
                ->name('rePass')->required()
                ->name('username')->required()
                ->name('id')->required();

            if ($this->form_validation->run()) {
                $this->call->database();

                if (preg_match('/[^\w]/', $this->io->post('username'))) {
                    $sess = array(
                        'msg' => 'Username must only contain alphanumeric and underscore character.',
                        'username' => $this->io->post('username'),
                        'id' => $this->io->post('id'),
                        'pass' => $this->io->post('pass'),
                        'rePass' => $this->io->post('rePass')
                    );
                    $this->session->set_flashdata($sess);
                    $this->call->database();
                    $code = $this->db->table('tbl_customer')->select('cust_code')->where('cust_id', $this->io->post('id'))->get();
                    redirect('account/verify_account/' . $code['cust_code']);
                    exit;
                } else {
                    $usernameExist = $this->db->table('tbl_customer')->select('cust_username')->where('cust_username', $this->io->post('username'))->get();
                    if ($usernameExist != false) {
                        $sess = array(
                            'msg' => 'Username already in use.',
                            'username' => $this->io->post('username'),
                            'id' => $this->io->post('id'),
                            'pass' => $this->io->post('pass'),
                            'rePass' => $this->io->post('rePass')
                        );
                        $this->session->set_flashdata($sess);
                        $code = $this->db->table('tbl_customer')->select('cust_code')->where('cust_id', $this->io->post('id'))->get();
                        redirect('account/verify_account/' . $code['cust_code']);
                        exit;
                    }
                }
                $pass = $this->io->post('pass');
                $rePass = $this->io->post('rePass');
                if ((strlen($pass) < 8 || strlen($pass) > 20) || (strlen($rePass) < 8 || strlen($rePass) > 20)) {
                    $sess = array(
                        'msg' => 'Pasword must be between 8-20 characters long',
                        'username' => $this->io->post('username'),
                        'id' => $this->io->post('id'),
                        'pass' => $this->io->post('pass'),
                        'rePass' => $this->io->post('rePass')
                    );
                    $this->session->set_flashdata($sess);
                    $code = $this->db->table('tbl_customer')->select('cust_code')->where('cust_id', $this->io->post('id'))->get();
                    redirect('account/verify_account/' . $code['cust_code']);
                    exit;
                } else {
                    if (preg_match('/[^\w]/', $this->io->post('pass')) > 0 || preg_match('/[^\w]/', $this->io->post('rePass')) > 0) {
                        $sess = array(
                            'msg' => 'Pasword must only contain alphanumeric and underscore character.',
                            'username' => $this->io->post('username'),
                            'id' => $this->io->post('id'),
                            'pass' => $this->io->post('pass'),
                            'rePass' => $this->io->post('rePass')
                        );
                        $this->session->set_flashdata($sess);
                        $code = $this->db->table('tbl_customer')->select('cust_code')->where('cust_id', $this->io->post('id'))->get();
                        redirect('account/verify_account/' . $code['cust_code']);
                    } else {
                        if ($this->io->post('pass') != $this->io->post('rePass')) {
                            $sess = array(
                                'msg' => 'Password did not match.',
                                'username' => $this->io->post('username'),
                                'id' => $this->io->post('id'),
                                'pass' => $this->io->post('pass'),
                                'rePass' => $this->io->post('rePass')
                            );
                            $this->session->set_flashdata($sess);
                            $code = $this->db->table('tbl_customer')->select('cust_code')->where('cust_id', $this->io->post('id'))->get();
                            redirect('account/verify_account/' . $code['cust_code']);
                        } else {
                            $this->M_account->complete_registration(
                                $this->io->post('id'),
                                $this->io->post('pass'),
                                $this->io->post('username')
                            );

                            redirect('account/login');
                        }
                    }
                }
            }
        }
    }

    // CHANGE PASSWORD
    public function change_password($code)
    {
        $data = $this->M_account->verify_code($code);
        if ($data) {
            $this->call->view('account/change_password', $data);
        }
    }

    // SEND CODE FOR CHANGING PASSWORD
    public function Send_Code()
    {
        if ($this->form_validation->submitted()) {
            $this->form_validation->name('email')->required()->min_length(1);

            if ($this->form_validation->run()) {

                // GET CHECK IF INPUT IS VALID EMAIL
                $email = $this->io->post('email');
                $isEmail = (filter_var($email, FILTER_VALIDATE_EMAIL) && substr($email, strpos($email, '@')) == '@gmail.com');

                //SEND CODE VIA EMAIL
                if ($isEmail == 1) {
                    $user = $this->M_account->check_email($email);
                    if ($user) {
                        $code = $this->M_account->get_code($user['cust_email'], 'cust_email');

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
                                            Password Changing Link
                                    </h1>
                                    <h5 style="color:black;">
                                        To change your password safely please use this link: 
                                    </h5>
                                    <p style="color:chocolate">Thank you for Choosing us!</p>
                        
                                    <a href="' . BASE_URL . 'Account/change_password/' . $code['cust_code'] . '" target="_blank" style="text-decoration:none;color:white">
                                        <button 
                                            style="
                                            color:white;
                                            background-color:chocolate;
                                            margin-top: 2rem;
                                            border: 0px;
                                            cursor:pointer;
                                            padding: 10px;">
                                                Change Password
                                        </button>
                                    </a>
                                    
                                </center>
                            </div>
                        ';

                        // CHECK IF EMAIL SUCCESSFULLY SENT
                        if ($this->mailer->sendCode($email, "Change Password", $body) == 'Link has been sent.') {
                            $sess = array(
                                'email_succ' => 'Email has been sent successfully.'
                            );
                            $this->session->set_flashdata($sess);
                            redirect('Account/Forgot');
                            exit;
                        } else {
                            $sess = array(
                                'email_err' => 'Email sending failed. Please try again.'
                            );
                            $this->session->set_flashdata($sess);
                            redirect('Account/Forgot');
                            exit;
                        }
                    } else {
                        $sess = array(
                            'email_err' => 'Email not found!'
                        );
                        $this->session->set_flashdata($sess);
                        redirect('Account/Forgot');
                        exit;
                    }
                } else {
                    $email = str_replace('-', '', $email);
                    if (is_numeric($email)) {
                        if (strlen($email) == 11 && substr($email, 0, 2) == '09') {
                            $code = $this->M_account->get_code($email, 'cust_cnum');
                            $msg = BASE_URL . 'Account/change_password/' . $code['cust_code'];
                            $smsResult = $this->sms->sendCode($email, $msg);
                            if ($smsResult == 0) {
                                $sess = array(
                                    'email_succ' => 'Sms has been sent successfully.'
                                );
                                $this->session->set_flashdata($sess);
                                redirect('Account/Forgot');
                                exit;
                            } else {
                                $sess = array(
                                    'email_err' => 'Sms sending failed. Please try again.'
                                );
                                $this->session->set_flashdata($sess);
                                redirect('Account/Forgot');
                                exit;
                            }
                        } else {
                            $sess = array(
                                'email_err' => 'Invalid Phone Number!'
                            );
                            $this->session->set_flashdata($sess);
                            redirect('Account/Forgot');
                            exit;
                        }
                    } else {
                        $sess = array(
                            'email_err' => 'Invalid Email!'
                        );
                        $this->session->set_flashdata($sess);
                        redirect('Account/Forgot');
                        exit;
                    }
                }
            } else {
                $sess = array(
                    'email_err' => 'Invalid email!'
                );
                $this->session->set_flashdata($sess);
                redirect('Account/Forgot');
                exit;
            }
        }
    }

    // RESET PASSWORD ONCLICK
    public function reset_password()
    {
        if ($this->form_validation->submitted()) {
            $email['cust_email'] = $this->io->post('email');
            $this->form_validation
                ->name('password')->matches('cpassword');
            if ($this->form_validation->run()) {
                $email['cust_email'] = $this->io->post('email');
                $password = $this->io->post('password');
                $new_code = $this->M_account->code();
                $this->M_account->reset_password($email['cust_email'], $password, $new_code);
                $sess = array(
                    'login_succ' => 'Password Reset!'
                );
                $this->session->set_flashdata($sess);
                redirect('Account/Login');
                exit;
            } else {
                $sess = array(
                    'pass_err' => 'Password not match!'
                );
                $this->session->set_flashdata($sess);
                $this->call->view('account/change_password', $email);
                exit;
            }
        }
    }

    // SIGNIN/LOGIN CODE ONCLICK
    public function signin()
    {
        if ($this->form_validation->submitted()) {
            $this->form_validation
                ->name('username')->required()
                ->name('password')->required();

            if ($this->form_validation->run()) {

                $username = $this->io->post('username');
                $password = $this->io->post('password');
                $data = $this->M_account->admin_login($username);

                // ADMIN | COURIER | MARKETER LOGIN
                if ($data && password_verify($password, $data['admin_password'])) {
                    $sess = array(
                        'username' => $data['admin_username'],
                        'admin_type' => $data['admin_type'],
                        'admin_id' => $data['admin_id']
                    );
                    $this->session->set_userdata($sess);

                    // REDIRECT TO PAGE DEPENDING ON ADMIN TYPE
                    if ($this->session->userdata('admin_type') == '1')
                        redirect('admin/dashboard');
                    else if ($this->session->userdata('admin_type') == '2')
                        redirect('marketer/onprocess');
                    // else if ($this->session->userdata('admin_type') == '3')
                    //     redirect('marketer/ondelivery');
                    exit;
                } else {
                    // CUSTOMER LOGIN
                    $data = $this->M_account->customer_login($username);
                    if ($data && password_verify($password, $data['cust_password'])) {
                        $sess = array(
                            'username' => $data['cust_username'],
                            'user_id' => $data['cust_id']
                        );
                        $this->session->set_userdata($sess);
                        redirect('customer/home');
                        exit;
                    } else {
                        $sess = array('login_err' => 'Invalid username or password!');
                        $this->session->set_flashdata($sess);
                        redirect('Account/Login');
                        exit;
                    }
                }
            }
        }
    }
}
