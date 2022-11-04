<?php
    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require PUBLIC_DIR . '/PHPMailer/Exception.php';
    require PUBLIC_DIR . '/PHPMailer/PHPMailer.php';
    require PUBLIC_DIR . '/PHPMailer/SMTP.php';


    class mailer extends Model
    {
        public function sendCode($receiver, $subj, $body)
        {
            $mail = new PHPMailer;
            $mail->isSMTP();                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;               // Enable SMTP authentication
            $mail->Username = 'onlinepalengke2022@gmail.com';   // SMTP username
            $mail->Password = 'capstone2022';   // SMTP password
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                    // TCP port to connect to
            // Sender info
            $mail->setFrom('onlinepalengke2022@gmail.com', 'Online Palengke - Calapan City');
            $mail->addReplyTo('onlinepalengke2022@gmail.com', 'Online Palengke - Calapan City');



            // Add a recipient
            $mail->addAddress($receiver);
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
            // Set email format to HTML
            $mail->isHTML(true);
            // Mail subject
            $mail->Subject = $subj;
            // Mail body content
            $bodyContent = '<h1> '. $subj .'</h1>';
            $bodyContent .= $body;
            $mail->Body    = $bodyContent;
            // Send email 
            if ($mail->send() != 1) {
                 return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                return 'Link has been sent.';
            }
        }
    }
?>