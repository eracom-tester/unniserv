<?php
class Message_model extends CI_Model{

    public function sms($mobile,$sms){
        $msg=urlencode($sms);
        
        $url = "http://smartsms.smseasy.in/domestic/sendsms/bulksms_v2.php?apikey=ZXJhY29tOnl4UloyUUV2&type=TEXT&sender=ERACOM&mobile=$mobile&message=$msg";
        $this->curl->simple_get($url);
    }

    function send_mail1($email,$Subject,$message){

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
    public function send_mail($email,$Subject,$message) {

		$mailer_username=$this->conn->company_info('mailer_username');
		$mailer_password=$this->conn->company_info('mailer_password');
		$mailer_setFrom=$this->conn->company_info('mailer_setFrom');
		$mailer_ReplyTo=$this->conn->company_info('mailer_ReplyTo');
		$company=$this->conn->company_info('title');
		
		//$this->load->library('email');  
	    $from_email=$mailer_setFrom; 
	    $config = array();
	    $config['protocol']     = "smtp"; // you can use 'mail' instead of 'sendmail or smtp'
	    $config['smtp_host']    = "smtpout.secureserver.net";// you can use 'smtp.googlemail.com' or 'smtp.gmail.com' instead of 'ssl://smtp.googlemail.com'
	    $config['smtp_port']    =  465;
	    $config['smtp_timeout'] = '60';
	    $config['smtp_crypto']  = 'ssl';
	    
	    $config['smtp_user']    = $mailer_username; // client email gmail id
	    $config['smtp_pass']    = $mailer_password; // client password
	    
	    $config['charset']      = 'utf-8';
	    $config['newline']      = "\r\n";
	    $config['mailtype']     = "html";
	    $config['validate']     = TRUE;
	    $this->email->initialize($config); // intializing email library, whitch is defiend in system
	
	    $this->email->set_mailtype("html");
	
	    $this->email->from($from_email);
	    $this->email->to($email);
	    $this->email->subject($Subject); 
	    $msg=$this->temp($message,$Subject);
	    
	    $this->email->message($msg);  // we can use html tag also beacause use $config['mailtype'] = 'HTML'
	    //Send mail
	    if($this->email->send()){
	    	 return true;
	    }
	    else{
	         return false;
	    }
}
	public function temp($message,$Subject){
		  
		
		 
		$mailer_ReplyTo=$this->conn->company_info('mailer_ReplyTo');
		$company=$this->conn->company_info('company_name');
		
		$res='<!docytpe html>
		<html>
		<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
		.container{
			padding:40px;
		}
		h1{
			text-align:center;
		}
		
		h2{
			text-align:center;
			background-color:#37326C;
			color:white;
		}
		
		h3{
			
			text-align:center;
			background-color:#FEC601;
			color:white;
		}
		
		h4{
			text-align:center;
			
			
		}
		h5{
			text-align:center;
		color:#ff8000;
		
		}
		P {
		font-family: "trebuchet MS";
		color: #222222; 
		font-size: 15pt;
		text-align: justify;  
		line-height: 18px;  
		
		margin-top: 10px;
		}
		
		.content-text {
		
		color: #222222; 
		font-size: 10pt;
		text-align: center;
		line-height: 20px; 
		
		}
		.email{
			color:blue;
		}
		</style>
		
		</head>
		<body>
		
		
				
				
			
		<div class="container">
		 
		
		         <h1>Important Message.</h1>             
		         <h2>'.$company.'</h2>             
		         <h3>'.$Subject.'</h3>
		
		
		 '.$message.'
		
		
				 
		      
		
		<hr>
		
		<h4>'.$company.'</h4>
		<h4>Ceo & Founder</h4>
		<h4>Email: <span class="email">'.$mailer_ReplyTo.'</span></h4>
		 
		
		<hr>
		<p class="content-text">The content of this email is confidential and intended for the recipient specified in message only. it is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. if you received this message by mistake, please reply  to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future. </p>
		
		 </div>       
				
		 
		  
		</body>
		</html>';
		 return $res;
	}
	 

}

