<br>
 <?php

if(!isset($_SESSION['forgot_user'])){
    
    redirect(base_url('forgot'),"refresh");
    die();
}

if($_SESSION['forgot_otp_verified']!==true){
    
    redirect(base_url('verify'),"refresh");
    die();
}

 if(isset($_POST['change_btn'])){
    
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|min_length[6]|matches[password]');
    $update['password'] = md5($_POST['password']);
    if($this->form_validation->run() != False){
        
        $this->db->where('id',$_SESSION['forgot_user']);
        $this->db->update('users',$update);

        unset($_SESSION['forgot_otp']);
        unset($_SESSION['forgot_user']);
        unset($_SESSION['forgot_otp_verified']);

        $this->session->set_flashdata('success'," Password successfully Changed.");
        redirect(base_url('forgot'),"refresh");
        
    }

 }

 ?>


<div class="row">
   
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
                        <div class="form-group">
                            <input type="password" class="form-control no_space" id="password" name="password" placeholder="password" data-response="password_res" value="<?php echo set_value('password');?>" />
                            <span class=" " id="password_res"><?php echo form_error('password');?></span>

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control no_space" id="confirm_password" name="confirm_password" placeholder="Confirm password" data-response="confirm_password_res" value="<?php echo set_value('confirm_password');?>" />
                            <span class=" " id="confirm_password_res"><?php echo form_error('confirm_password');?></span>

                        </div>
                           
                            <div class="form-group col-md-12 text-center animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                            	<button class="btn btn-default btn-radius" type="submit"  name="change_btn">Save</button>
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