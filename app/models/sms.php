<?php
class sms extends Model
{
    public function sendCode($num, $message)
    {
        $email = "arconleemar0726@gmail.com";
        $apicode = "TR-LEE8A174116_1SG1B";
        $password = "Lee_199089072610";

        $url = 'https://api.itexmo.com/api/broadcast';
        $recipient = array();
        array_push($recipient, $num);
        $itexmo = array('Email' => $email,  'Password' => $password, 'ApiCode' => $apicode, 'Recipients' => $recipient, 'Message' => $message);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
    }
}