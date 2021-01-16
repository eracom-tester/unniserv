<br>
 <?php

if(!isset($_SESSION['forgot_user'])){
    $this->session->set_flashdata('error'," Please Enter Username.");
    redirect(base_url('forgot'),"refresh");
}

 if(isset($_POST['verify'])){
    $forgot_otp = $_POST['forgot_otp'];

    if($forgot_otp && $_SESSION['forgot_otp']==$_POST['forgot_otp']){
        $_SESSION['forgot_otp_verified']=true;
        $this->session->set_flashdata('success',"OTP Verified Successfully.");
            redirect(base_url('change_password'),"refresh");
        
    }else{
        $this->session->set_flashdata('error'," Incorrect OTP. Please Enter Valid OTP.");
    }

 }

 ?>


<div class="row" style="margin:150px";>
   
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
                                    <input type="text" class="form-control" placeholder="Enter OTP" id="forgot_otp" name="forgot_otp" value="">
                                      
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
        <br>