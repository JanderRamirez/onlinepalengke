<?php
class M_account extends Model { 
    // INSERT CUSTOMER INFORMATION TO DATABASE
    public function insertConsumer($fn, $mn, $ln, $sex, $bd, $email, $num, $barangay, $street, $code, $isUpdateInsert, $updateId = 0)
    {
        if($sex == 'male'){$sex = 'm';}
        else              {$sex = 'f';}

        // ROW TO CUSTOMER TABLE DATA
        $cust_data = array(
            'cust_fname' =>     $fn,
            'cust_mname' =>     $mn,
            'cust_lname' =>     $ln,
            'cust_sex' =>       $sex,
            'cust_birthdate' => $bd,
            'cust_email' =>     $email,
            'cust_cnum' =>      str_replace('-','',$num),
            'cust_username' =>  "",
            'cust_code' =>      $code
        );

        if ($isUpdateInsert == 'insert'){

            // INSERT ROW TO CUSTOMER TABLE
            $this->db->table('tbl_customer')->insert($cust_data);

            // INSERT CUSTOMER ADDRESS TO ADDRESS TABLE
            $customer = $this->db->table('tbl_customer')->select('cust_id, cust_email')->order_by('cust_id','DESC')->get();

            // ROW TO ADDRESS TABLE DATA
            $address_data = array(
                'cust_id' =>     $customer['cust_id'],
                'barangay_id'=>     $barangay,
                'street'=>       $street
            );

            // INSERT ROW TO ADDRESS TABLE
            $this->db->table('tbl_address')->insert($address_data);
        }else{
            $customer = $this->db->table('tbl_customer')->select('cust_id, cust_email')->where('cust_email', $email)->where_null('cust_password')->get();

            // ROW TO ADDRESS TABLE DATA
            $address_data = array(
                'barangay_id'=>     $barangay,
                'street'=>       $street
            );
            
            $this->db->table('tbl_customer')->where('cust_email', $email)->update($cust_data);
            $this->db->table('tbl_address')->where('cust_id', $customer['cust_id'])->update($address_data);
        }


        // OPEN LINK SENT PAGE
        // $this->call->view('account/Link_Sent');
    }

    // VERIFY ACCOUNT
    public function verify_account($code)
    {
        $where = ['cust_code' => $code];
        $customer = $this->db->table('tbl_customer')->select('cust_id')->where($where)->get();
        return $customer;
    }

    // COMPLETE REGISTRATION
    public function complete_registration($id,$pass,$username)
    {
        $data = [
            'cust_password' => password_hash($pass, PASSWORD_DEFAULT),
            'cust_username' => $username
        ];
        $this->db->table('tbl_customer')->where('cust_id', $id)->update($data);
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $new_code = substr(str_shuffle($str_result), 0, 50);
        $data1 = [
            'cust_code' => $new_code
        ];
        $this->db->table('tbl_customer')->where('cust_id', $id)->update($data1);
    }

     // GENERATE 50 RANDOM CHAR AS CODE
     public function code(){
          $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
          return substr(str_shuffle($str_result),
          0, 50);
     }    
      
     // CHECK IF EMAIL EXIST
     public function check_email($email){
          $where = [
          'cust_email' => $email
          ];
          return $this->db->table('tbl_customer')->select('cust_email')->where($where)->where_not_null('cust_password')->get();
     }

     // GET CODE FROM CUSTOMER ROW USING EMAIL
     public function get_code($email,$column){
          $where = [
            $column => $email
          ];
          return $this->db->table('tbl_customer')->where($where)->get();
     }

     // CHECK IF CODE EXIST IN THE CUSTOMER TABLE
     public function verify_code($code){
          $where = [
               'cust_code' => $code
          ];
          return $this->db->table('tbl_customer')->where($where)->get();
     }

     // RESET PASSWORD AND RESET CODE
     public function reset_password($email,$password,$code){
          $data = [
          'cust_password' => password_hash($password, PASSWORD_DEFAULT),
          'cust_code' => $code
          ];
          $this->db->table('tbl_customer')->where('cust_email', $email)->update($data);
     }

     // CHECK IF ACCOUNT IS ADMIN
    public function admin_login($username){
        $where = [
        'admin_username' => $username
        ];
        return $this->db->table('tbl_admin')->where($where)->get();
    }

    // CHECK ID ACCOUNT IS FOR CUSTOMER
    public function customer_login($username){
        $where = [
        'cust_username' => $username
        ];
        return $this->db->table('tbl_customer')->where("cust_email = ? OR cust_username = ?",[$username, $username])->get();
    }

    // CHECK IF ACCOUNT IS FOR COURIER
    public function courier_login($username){
        $where = [
        'cour_username' => $username
        ];
        return $this->db->table('tbl_courier')->where($where)->get();
    }

    // GET ALL DATA FROM BARANGAY TABLE
    public function get_barangay(){
        return $this->db->table('tbl_barangay')->order_by('brgy_name')->get_all();
    }
}   
?>