<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Add franchise user</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= $admin_path.'franchise';?>">franchise</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add user</li>
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
                    <form action="" method="post" >
                        <div class="card card-body">
                            <div class="row ">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" value="<?php echo set_value('name');?>" class="form-control" placeholder="Name" aria-describedby="helpId">
                                    <span class=" " ><?php echo form_error('name');?></span>
                                </div>
                                <div class="form-group">
                                  <label for="">Username</label>
                                  <input type="text" name="username" value="<?= set_value('username');?>" data-response="username_res" class="form-control check_franchise_exist1"  placeholder="Enter Username" aria-describedby="helpId"> 
                                  <span class=" " id="username_res"><?= form_error('username');?></span>             
                                </div>
                                
                               <!-- <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" value="<?php echo set_value('username');?>"  data-response="username_res" class="form-control check_franchise_user_exists" placeholder="Username" aria-describedby="helpId"  >
                                    <span class=" " id="username_res"><?php echo form_error('username');?></span>
                                </div>-->
                              
                              <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" value="<?php echo set_value('email');?>" class="form-control" placeholder="Email" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('email');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile');?>" class="form-control" placeholder="Mobile" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('mobile');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" name="country" id="country" value="<?php echo set_value('country');?>" class="form-control" placeholder="Country" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('country');?></span>
                              </div>
                              <label for="">ADDRESS</label>
                             <textarea id="w3review" name="address" value="<?php echo set_value('address');?>" class="form-control" placeholder="Enter address" aria-describedby="helpId"rows="4" cols="50">
  
                             </textarea>
                             <span class=" " ><?php echo form_error('address');?></span>
                              <div class="form-group">
                                <label for="">State</label>
                                <input type="text" name="state" id="state" value="<?php echo set_value('state');?>" class="form-control" placeholder="Enter State" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('state');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Pin Code</label>
                                <input type="text" name="pin_code" id="pin_code" value="<?php echo set_value('pin_code');?>" class="form-control" placeholder="Enter pin code" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('pin_code');?></span>
                              </div>
                               <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" value="<?php echo set_value('password');?>" class="form-control" placeholder="Password" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('password');?></span>
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="">Nominee Relation</label>
                                <input type="text" name="nominee_relation" value="<?php echo set_value('nominee_relation');?>" class="form-control check_franchise_user_exists" placeholder="Nominee Relation" aria-describedby="helpId"  >
                                <span class=" " ><?php echo form_error('nominee_relation');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Nominee Name</label>
                                <input type="text" name="nominee_name" id="" value="<?php echo set_value('nominee_name');?>" class="form-control" placeholder="Nominee Name" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('nominee_name');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Franchise Name</label>
                                <input type="text" name="franchise_name" id="franchise_name" value="<?php echo set_value('franchise_name');?>" class="form-control" placeholder="Franchise Name" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('franchise_name');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Franchise Pan</label>
                                <input type="text" name="franchise_pan" id="franchise_pan" value="<?php echo set_value('franchise_pan');?>" class="form-control" placeholder="Franchise Pan number" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('franchise_pan');?></span>
                              </div>
                              
                              <div class="form-group">
                                <label for="">Franchise GST</label>
                                <input type="text" name="franchise_gst" id="franchise_gst" value="<?php echo set_value('franchise_gst');?>" class="form-control" placeholder="GST Number" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('franchise_gst');?></span>
                              </div>
                              
                              <div class="form-group">
                                <label for="">City</label>
                                <input type="text" name="city" id="city" value="<?php echo set_value('city');?>" class="form-control" placeholder="City" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('city');?></span>
                              </div>
                              
                              <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" value="<?php echo set_value('confirm_password');?>" class="form-control" placeholder="Confirm Password" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('confirm_password');?></span>
                              </div>
                              
                            </div>
                            
                            <button type="submit" class="btn btn-primary" name="add_btn">Save</button>
                        </div>
                            
                            
                        </div>
                        
                    </form>