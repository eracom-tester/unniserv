<style> 
#logindiv {  
  background: #D6D7DF;
  animation: logindiv 3s infinite;
}

@keyframes logindiv {
  from {background-color: #D6D7DF;}
  to {background-color: #D3D4DA;}
}
</style>


<section class="banner-section">
    <div class="overlay">
        <div class="video-overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="<?= $panel_url;?>img/football.mp4" type="video/mp4">
        </video>

        <div class="container">
            <div class="total-slide">
                <div class="row  ">
                    <div class="col-lg-12">
                        <div  class="row">    
                            <div class="col-lg-3"></div>
                                <div id="logindiv"  class="col-lg-6 card card-body">
                                    <center><h1>Register</h1></center>
                                    <hr>
                                    <p>If you already have an account with us, please login at the <a href="<?= base_url('login');?>">login page</a>.</p>
                                    

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
                                    
                                        <form action="<?= base_url('register');?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            <?php 
                                            $requires=$this->conn->runQuery("*",'advanced_info',"title='Registration'");
                                            $value_by_lebel= array_column($requires, 'value', 'label');
                                        
                                        
                                            ?>

                                            <?php if(array_key_exists('is_sponsor_required', $value_by_lebel) && $value_by_lebel['is_sponsor_required']=='yes'){ ?>
                                                <div class="form-group">
                                                    <input type="text" class="form-control check_sponsor_exist no_space" id="u_sponsor" name="u_sponsor" placeholder="Sponsor ID" data-response="sponsor_res" value="<?php
                                                    if(isset($_REQUEST['ref'])){
                                                        echo $_REQUEST['ref'];
                                                    }else{
                                                        echo set_value('u_sponsor');
                                                    }
                                                ?>" />
                                                    <small class=" " id="sponsor_res"><?php echo form_error('u_sponsor');?></small>

                                                </div>
                                            <?php } ?>
                                            
                                            <?php if(array_key_exists('user_gen_method', $value_by_lebel) && $value_by_lebel['user_gen_method']=='manual'){?>

                                                <div class="form-group">

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <?= (array_key_exists('user_gen_prefix', $value_by_lebel) && $value_by_lebel['user_gen_prefix']!='' ? $value_by_lebel['user_gen_prefix']:'<i class="fa fa-user"></i>');?>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control check_username_exist no_space" id="usename" name="usename" placeholder="Username" data-response="username_res" value="<?php echo set_value('usename');?>">                    
                                                    
                                                </div>
                                                <span class=" " id="username_res"><?php echo form_error('usename');?></span>
                                                </div>
                                                
                                            <?php }?>
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="name" name="name" placeholder="Name" data-response="name_res" value="<?php echo set_value('name');?>">
                                                <span class=" " id="name_res"><?php echo form_error('name');?></span>    
                                            </div>
                                            
                                            <?php if(array_key_exists('reg_type', $value_by_lebel) && $value_by_lebel['reg_type']=='binary'){?>
                                                <div class="form-group">                 
                                                <select  class="form-control" name="position" id="position" required>
                                                <option value="">Select Position</option>
                                                <option value="1"  >Left</option>
                                                <option value="2" >Right</option>
                                                
                                                </select>
                                            </div>
                                            <?php } ?>  
                                            
                                            <?php if(array_key_exists('country_code', $value_by_lebel) && $value_by_lebel['country_code']=='yes'){?>
                                            <div class="form-group">                 
                                                <select data-response="mobile_code" class="form-control country" name="country_code" id="country_code">
                                                <option value="">Select Country</option>
                                                <?php
                                                $countries=$this->conn->runQuery('*','countries','1=1');
                                                if($countries){
                                                    foreach($countries as $country){
                                                        ?> <option data-sortname="<?= $country->sortname;?>" data-phonecode="<?= $country->phonecode;?>" value="<?= $country->name;?>"  ><?= $country->name;?></option><?php
                                                    }
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <?php } ?>
                                            
                                            <?php if(array_key_exists('mobile_users', $value_by_lebel) && $value_by_lebel['mobile_users']>0){?>

                                            <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text mobile_code" id="basic-addon1">
                                                    <i class="fa fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control mobile no_space check_mobile_valid" id="mobile" name="mobile" placeholder="mobile" data-response="mobile_res" value="<?= set_value('mobile');?>">
                                            </div>
                                                <span class=" " id="mobile_res"><?= form_error('mobile');?></span>
                                            </div>
                                            
                                            <?php }?>
                                            <?php if(array_key_exists('email_users', $value_by_lebel) && $value_by_lebel['email_users']>0){ ?>
                                                <div class="form-group">
                                                    <input type="email" class="form-control  check_email_valid" id="email" name="email" placeholder="Email" data-response="email_res" value="<?php echo set_value('email');?>" />
                                                    <span class=" " id="email_res"><?php echo form_error('email');?></span>

                                                </div>
                                            <?php } ?>
                                            
                                        
                                            <?php if(array_key_exists('pass_gen_type', $value_by_lebel) && $value_by_lebel['pass_gen_type']=='manual'){ ?>
                                                <div class="form-group">
                                                    <input type="password" class="form-control no_space" id="password" name="password" placeholder="password" data-response="password_res" value="<?php echo set_value('password');?>" />
                                                    <span class=" " id="password_res"><?php echo form_error('password');?></span>

                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control no_space" id="confirm_password" name="confirm_password" placeholder="Confirm password" data-response="confirm_password_res" value="<?php echo set_value('confirm_password');?>" />
                                                    <span class=" " id="confirm_password_res"><?php echo form_error('confirm_password');?></span>

                                                </div>
                                            <?php } ?>
                                            
                                        
                                                <div class="buttons">
                                                    <div class="pull-right">  
                                                        
                                                        &nbsp;
                                                        <input type="submit" name="register" value="Continue" class="btn btn-primary submit" />
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                    </div>
                </div>
                
            </div>
        </div>         
    </div>
</section>
 
