 
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Register</h4></h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Register</a></li>            
            <li class="breadcrumb-item active" aria-current="page">Register</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">Register</h6>
<hr>
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

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="card card-body">
       <form action="" method="post">
        								    <div class="card card-warning ">
                                                <div class="card-header"><h5 class="text-center">Register</h5></div>
                                                    <div class="card-body ">
                								    <?php 
                                                        $requires=$this->conn->runQuery("*",'advanced_info',"title='Registration'");
                                                        $value_by_lebel= array_column($requires, 'value', 'label');
                                                        ?>
                                                    <div class="row">
                                                    <?php if(array_key_exists('is_sponsor_required', $value_by_lebel) && $value_by_lebel['is_sponsor_required']=='yes'){ ?>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                              <input type="text" class="form-control check_sponsor_exist no_space" id="u_sponsor" name="u_sponsor" placeholder="Sponsor ID" data-response="sponsor_res" value="<?php
                    													if(isset($_REQUEST['ref'])){
                    														echo $_REQUEST['ref'];
                    													}else{
                    														 echo set_value('u_sponsor');
                    													}
                    												   ?>" />
                                                              <span class=" " id="sponsor_res"><?php echo form_error('u_sponsor');?></span>
                                                        </div>
                                                    </div>
                									
                									 <?php } ?>
                                                    
                                                    <?php if(array_key_exists('user_gen_method', $value_by_lebel) && $value_by_lebel['user_gen_method']=='manual'){?>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                    									      <?= (array_key_exists('user_gen_prefix', $value_by_lebel) && $value_by_lebel['user_gen_prefix']!='' ? $value_by_lebel['user_gen_prefix']:'<i class="fa fa-user"></i>');?>
                                                            <input type="text" class="form-control check_username_exist no_space" id="usename" name="usename" placeholder="Username" data-response="username_res" value="<?php echo set_value('usename');?>">
                    										<span class=" " id="username_res"><?php echo form_error('usename');?></span>
                                                        </div>
                                                    </div>
                                                    
                									 <?php }?>
                									 
                									 
                                                    
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                              <input type="text" class="form-control " id="name" name="name" placeholder="Full Name" data-response="name_res" value="<?php echo set_value('name');?>">
                                                               <span class=" " id="name_res"><?php echo form_error('name');?></span> 
                                                            </div>
                                                        </div>
                										
                									<!--	<div class="col-lg-6">
                                                            <div class="form-group">
                                                              <input type="text" class="form-control " id="address" name="address" placeholder="Enter Address" data-response="address_res" value="<?php echo set_value('address');?>">
                                                               <span class=" " id="address_res"><?php echo form_error('address');?></span> 
                                                            </div>
                                                        </div>
                										<div class="col-lg-6">
                                                            <div class="form-group">
                                                              <input type="text" class="form-control " id="father_name" name="father_name" placeholder="Enter Father name" data-response="father_name_res" value="<?php echo set_value('father_name');?>">
                                                               <span class=" " id="father_name_res"><?php echo form_error('father_name');?></span> 
                                                            </div>
                                                        </div>
                										
                										<div class="col-lg-6">
                                                            <div class="form-group">
                                                                <select  class="form-control" name="gender" id="gender" required>
                													  <option value="">Select Gender</option>
                													  <option value="male"  >Male</option>
                													  <option value="female" >Famale</option>
                													  <option value="other" >Other</option>
                                 
                                                                  </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                              <input type="date" class="form-control " id="dob" name="dob" placeholder="Enter dob" data-response="dob_res" value="<?php echo set_value('dob');?>">
                                                               <span class=" " id="dob_res"><?php echo form_error('dob');?></span> 
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                              <input type="text" class="form-control " id="m_status" name="m_status" placeholder="Marital Status" data-response="m_status_res" value="<?php echo set_value('m_status');?>">
                                                               <span class=" " id="m_status_res"><?php echo form_error('m_status');?></span> 
                                                            </div>
                                                        </div>-->
                                                        
                                                         <div class="col-lg-6">
                                                            <div class="form-group">
                                                               <select data-response="state" class="form-control" name="state" id="state">
                													  <option value="">Select State</option>
                													  <?php
                													  $states=$this->conn->runQuery('*','states',"country_id='101'");
                													  if($states){
                														foreach($states as $state){
                															?> <option  value="<?= $state->name;?>"  ><?= $state->name;?></option><?php
                														}
                													  }
                													  ?>
                                                                 </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                              <input type="text" class=" form-control" id="city" name="city" placeholder="City" data-response="city_res" value="<?php echo set_value('city');?>">
                                                               <span class=" " id="city_res"><?php echo form_error('city');?></span> 
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-lg-6">
                                                            <div class="form-group">
                                                              <input type="text" class=" form-control" id="pin_code" name="pin_code" placeholder="Pin code" data-response="pin_code_res" value="<?php echo set_value('pin_code');?>">
                                                               <span class=" " id="pin_code_res"><?php echo form_error('pin_code');?></span> 
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                              <input type="text" class="form-control " id="pan_no" name="pan_no" placeholder="Pan no" data-response="pan_no_res" value="<?php echo set_value('pan_no');?>">
                                                               <span class=" " id="pan_no_res"><?php echo form_error('pan_no');?></span> 
                                                            </div>
                                                        </div>
                                                        
                										 <?php if(array_key_exists('reg_type', $value_by_lebel) && $value_by_lebel['reg_type']=='binary'){?>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <select  class="form-control" name="position" id="position" required>
                													  <option value="">Select Position</option>
                													  <option value="1"  >Left</option>
                													  <option value="2" >Right</option>
                                 
                                                                  </select>
                                                            </div>
                                                        </div>
                										
                										
                										<?php } ?>  -->
                               
                                                    <?php if(array_key_exists('country_code', $value_by_lebel) && $value_by_lebel['country_code']=='yes'){?>
                										 <div class="col-lg-6">
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
                                                        </div>
                										
                										
                										<?php } ?>
                             
                                                   <?php if(array_key_exists('mobile_users', $value_by_lebel) && $value_by_lebel['mobile_users']>0){?>
                										 <div class="col-lg-6">
                                                            <div class="form-group">
                                                                 <input type="number" class="form-control mobile no_space check_mobile_valid" id="mobile" name="mobile" placeholder="Phone Number" data-response="mobile_res" value="<?= set_value('mobile');?>">
                												  <span class=" " id="mobile_res"><?= form_error('mobile');?></span>
                                                             </div>
                                                           </div>
                										
                										
                										 <?php }?>
                                             <?php if(array_key_exists('email_users', $value_by_lebel) && $value_by_lebel['email_users']>0){ ?>
                										 <div class="col-lg-6">
                                                            <div class="form-group">
                                                               <input type="email" class="form-control check_email_valid" id="email" name="email" placeholder="Email" data-response="email_res" value="<?php echo set_value('email');?>" />
                                                                 <span class=" " id="email_res"><?php echo form_error('email');?></span>
                                                            </div>
                                                        </div>
                										
                										
                										
                										<?php } ?>
                            
                        
                                                    <?php if(array_key_exists('pass_gen_type', $value_by_lebel) && $value_by_lebel['pass_gen_type']=='manual'){ ?>
                										 <div class="col-lg-6">
                                                            <div class="form-group">
                                                               <input type="password" class="form-control no_space" id="password" name="password" placeholder="password" data-response="password_res" value="<?php echo set_value('password');?>" />
                                                            <span class=" " id="password_res"><?php echo form_error('password');?></span>
                                                            </div>
                                                        </div>
                										
                										
                										
                										 <div class="col-lg-6">
                                                            <div class="form-group">
                                                               <input type="password" class="form-control no_space" id="confirm_password" name="confirm_password" placeholder="Confirm password" data-response="confirm_password_res" value="<?php echo set_value('confirm_password');?>" />
                                                                <span class=" " id="confirm_password_res"><?php echo form_error('confirm_password');?></span>
                                                            </div>
                                                        </div>
                										<?php } ?>
                                                    </div>
                                                    <!--<div class="single-input-item">
                                                        <div class="login-reg-form-meta">
                                                            <div class="remember-meta">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                                    <label class="custom-control-label" for="subnewsletter">Subscribe
                                                                        Our Newsletter</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>-->
                                                   
                									
                									
                								</div>
                								
                								 </div>
                								<br>
                								<!--<div class="row">
                    								<div class="col-md-6">
                    								    
                    								    <div class="card card-warning ">
                                                            <div class="card-header"><h5 class="text-center">Bank details</h5></div>
                                                            <div class="card-body ">
                                                                <div class="form-group">
                                                                  <input type="text" class="form-control " id="account_holder_name" name="account_holder_name" placeholder="Account holder name"  value="<?php echo set_value('account_holder_name');?>">
                                                                   <span class=" "><?php echo form_error('account_holder_name');?></span> 
                                                                </div>
                                                                <div class="form-group">
                                                                  <input type="text" class="form-control " id="bank_name" name="bank_name" placeholder="Bank name"  value="<?php echo set_value('bank_name');?>">
                                                                   <span class=" "><?php echo form_error('bank_name');?></span> 
                                                                </div>
                                                                <div class="form-group">
                                                                  <input type="text" class="form-control " id="account_number" name="account_number" placeholder="Account number"  value="<?php echo set_value('account_number');?>">
                                                                   <span class=" "><?php echo form_error('account_number');?></span> 
                                                                </div>
                                                                <div class="form-group">
                                                                  <input type="text" class="form-control " id="ifsc" name="ifsc" placeholder="Enter IFSC code"  value="<?php echo set_value('ifsc');?>">
                                                                   <span class=" "><?php echo form_error('ifsc');?></span> 
                                                                </div>
                                                            </div>   
                                                        </div>   
                    								</div>
                    								
                    								<div class="col-md-6">
                    								    
                    								    <div class="card card-warning ">
                                                            <div class="card-header"><h5 class="text-center">Nomimee details</h5></div>
                                                            <div class="card-body ">
                                                                <div class="form-group">
                                                                  <input type="text" class="form-control " id="nominee_name" name="nominee_name" placeholder="Nominee name"  value="<?php echo set_value('nominee_name');?>">
                                                                   <span class=" "><?php echo form_error('nominee_name');?></span> 
                                                                </div>
                                                                <div class="form-group">
                                                                  <input type="text" class="form-control " id="nominee_relation" name="nominee_relation" placeholder="Nominee relation"  value="<?php echo set_value('nominee_relation');?>">
                                                                   <span class=" "><?php echo form_error('nominee_relation');?></span> 
                                                                </div>
                                                                <div class="form-group">
                                                                  <input type="date" class="form-control " id="nominee_dob" name="nominee_dob" placeholder="nominee dob"  value="<?php echo set_value('nominee_dob');?>">
                                                                   <span class=" "><?php echo form_error('nominee_dob');?></span> 
                                                                </div>
                                                                 
                                                            </div>   
                                                        </div>   
                    								</div>
                    								
                								</div>-->
                								
                								<div class="single-input-item">
                                                        <button class="btn btn-sqr btn-block" type="submit" name="register">Register</button>
                                                    </div>
                                       
                                        </form>
    </div>
    </div>
</div>
