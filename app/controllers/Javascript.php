<?php 
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Javascript extends Controller
{

    // Display disabled javascript message
    public function disabled(){
        $this->call->view('errors/error_noscript',);
    }
}
?>