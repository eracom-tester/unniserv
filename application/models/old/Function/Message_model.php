<?php
class Message_model extends CI_Model{

    public function sms($mobile,$sms){
        $msg=urlencode($sms);
        
         $url = "https://www.txtguru.in/imobile/api.php?username=common_era&password=98506415&source=CHCKSM&dmobile=$mobile&message=$msg";
        $this->curl->simple_get($url);
    }

    function send_mail($email,$Subject,$message){

        $mailer_username=$this->conn->company_info('mailer_username');
        $mailer_password=$this->conn->company_info('mailer_password');
        $mailer_setFrom=$this->conn->company_info('mailer_setFrom');
        $mailer_ReplyTo=$this->conn->company_info('mailer_ReplyTo');
        $company=$this->conn->company_info('title');

        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtpout.secureserver.net';
        $mail->SMTPAuth = true;
        $mail->Username = $mailer_username;
        $mail->Password = $mailer_password;
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom($mailer_setFrom, $company);
        $mail->addReplyTo($mailer_ReplyTo, $company);
        
        // Add a recipient
        $mail->addAddress($email);
        
        // Add cc or bcc 
       /*  $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com'); */
        
        // Email subject
        $mail->Subject = $Subject;
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        /* $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>"; */
        $mail->Body = $message;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

}

