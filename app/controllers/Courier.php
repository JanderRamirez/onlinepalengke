<?php 
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
class Courier extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->helper(array('form', 'alert'));
    }

    public function dashboard()
    {
        $this->call->view('courier/dashboard');
    }
}
?>