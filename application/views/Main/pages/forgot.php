<br>
 <?php

//$this->message->sms(7015769572,'hello');

 if(isset($_POST['verify'])){
    $tx_username = $_POST['username'];

    if($tx_username){
        $check_exists=$this->conn->runQuery('mobile,id','users',"username='$tx_username'");
        if($check_exists){
            $_SESSION['forgot_otp']=$otp=mt_rand(100000,999999);
            $_SESSION['forgot_user']=$check_exists[0]->id;
             $company_name=$this->conn->company_info('title');
             $company_url=$this->conn->company_info('base_url');
            $sms="$otp is your OTP for forgot password. Thanks $company_name team. For more visit $company_url";
           // $msg=urlencode($sms);
            $this->message->sms($check_exists[0]->mobile,$sms);
            $this->session->set_flashdata('success'," OTP has been sent to your registered mobile no.");
            redirect(base_url('verify'),"refresh");
        }else{
            $this->session->set_flashdata('error'," Username not exists. Please Enter valid Username.");
        }
    }else{
        $this->session->set_flashdata('error'," Please Enter Username.");
    }

 }

 ?>


<div class="row" style="margin:150px;">
   
<div class="col-lg-4"></div>
        	<div class="col-lg-4 card card-body">
            	<div class="authorize_box">
                	<div class="title_default_dark title_border text-center">
                    	<h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Forgot Password</h4>
                         
                    </div>
                    <div class="field_form authorize_form">
                    <?php 


                        $success['param']='success';
                        $success['alert_class']='alert-success';
                        $success['type']='success';
                        $this->show->show_alert($success);
                        ?>
                            <?php 
                        $erroralert['param']='error';
                        $erroralert['alert_class']='alert-danger';
                        $erroralert['type']='error';
                        $this->show->show_alert($erroralert);
                    ?>
        
                        <form action="" method="POST">
                            <div class="form-group col-md-12 animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                                    <input type="text" class="form-control" placeholder="Enter username" id="username" name="username" value="<?php echo set_value('username')?>">
                                      <span class="text-danger"><?php echo form_error('username');?></span>
                            </div>
                           
                            <div class="form-group col-md-12 text-center animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                            	<button class="btn btn-default btn-radius" type="submit"  name="verify">Verify</button>
                            </div>
                             
                        </form>
                    </div>
                </div>
                <div class="divider small_divider"></div>
                <div class="text-center">
                    <span class="animation" data-animation="fadeInUp" data-animation-delay="1s">Don't have an account?<a href="<?= base_url('register');?>"> Register</a></span>
                </div>
            </div>
        </div>
        