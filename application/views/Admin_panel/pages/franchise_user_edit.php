
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Franchise Edit Profile</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $admin_path.'franchise_users';?>">Franchise Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Frachise Edit Profile</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">Frachise Edit Profile</h6>
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
          <form action="" method="post" >
                        <div class="card card-body">
                            <div class="row ">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" value="<?= $profile->name;?>" class="form-control" placeholder="Name" aria-describedby="helpId">
                                    <span class=" " ><?php echo form_error('name');?></span>
                                </div>
                                <div class="form-group">
                                  <label for="">Username</label>
                                  <input type="text" name="username" value="<?= $profile->username;?>" data-response="username_res" class="form-control check_franchise_exist1" readonly placeholder="Enter Username" aria-describedby="helpId"> 
                                  <span class=" " id="username_res"><?= form_error('username');?></span>             
                                </div>
                                
                               <!-- <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" value="<?php echo set_value('username');?>"  data-response="username_res" class="form-control check_franchise_user_exists" placeholder="Username" aria-describedby="helpId"  >
                                    <span class=" " id="username_res"><?php echo form_error('username');?></span>
                                </div>-->
                              
                              <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" value="<?= $profile->email;?>" class="form-control" placeholder="Email" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('email');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" name="mobile" id="mobile" value="<?= $profile->mobile;?>" class="form-control" placeholder="Mobile" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('mobile');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" name="country" id="country" value="<?= $profile->country;?>" class="form-control" placeholder="Country" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('country');?></span>
                              </div>
                              <label for="">ADDRESS</label>
                             <textarea id="w3review" name="address"  class="form-control" placeholder="Enter address" aria-describedby="helpId"rows="4" cols="50">
                               <?= $profile->address;?>
                             </textarea>
                             <span class=" " ><?php echo form_error('address');?></span>
                              <div class="form-group">
                                <label for="">State</label>
                                <input type="text" name="state" id="state" value="<?= $profile->state;?>" class="form-control" placeholder="Enter State" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('state');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Pin Code</label>
                                <input type="text" name="pin_code" id="pin_code" value="<?= $profile->pin_code;?>" class="form-control" placeholder="Enter pin code" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('pin_code');?></span>
                              </div>
                               
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="">Nominee Relation</label>
                                <input type="text" name="nominee_relation" value="<?= $profile->nominee_relation;?>" class="form-control check_franchise_user_exists" placeholder="Nominee Relation" aria-describedby="helpId"  >
                                <span class=" " ><?php echo form_error('nominee_relation');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Nominee Name</label>
                                <input type="text" name="nominee_name" id="" value="<?= $profile->nominee_name;?>" class="form-control" placeholder="Nominee Name" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('nominee_name');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Franchise Name</label>
                                <input type="text" name="franchise_name" id="franchise_name" value="<?= $profile->franchise_name;?>" class="form-control" placeholder="Franchise Name" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('franchise_name');?></span>
                              </div>
                              <div class="form-group">
                                <label for="">Franchise Pan</label>
                                <input type="text" name="franchise_pan" id="franchise_pan" value="<?= $profile->pan_no;?>" class="form-control" placeholder="Franchise Pan number" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('franchise_pan');?></span>
                              </div>
                              
                              <div class="form-group">
                                <label for="">Franchise GST</label>
                                <input type="text" name="franchise_gst" id="franchise_gst" value="<?= $profile->franchise_gst;?>" class="form-control" placeholder="GST Number" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('franchise_gst');?></span>
                              </div>
                              
                              <div class="form-group">
                                <label for="">City</label>
                                <input type="text" name="city" id="city" value="<?= $profile->city;?>" class="form-control" placeholder="City" aria-describedby="helpId">
                                <span class=" " ><?php echo form_error('city');?></span>
                              </div>
                               <div class="form-group">
                <label for="">Status</label>
                <select class="form-control" name="is_block">
                    <option value="0" <?php echo $profile->is_block=='0' ? 'selected':'';?>>Active</option>
                    <option value="1"<?php echo $profile->is_block=='1' ? 'selected':'';?>>Block</option>
                </select>           
                
              </div>
                            </div>
                             <button type="submit" class="btn btn-primary" name="edit_btn">Save</button>
                        </div>
                            
                            
                        </div>
                        
                    </form>
          
         <!-- <form action="" method="post">
              <div class="form-group">
                <label for="">Username</label>
                <input type="text"  value="<?= $profile->username;?>" class="form-control" placeholder="" aria-describedby="helpId" readonly >               
              </div>
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" value="<?= $profile->name;?>" class="form-control" placeholder="" aria-describedby="helpId">
                
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="email" value="<?= $profile->email;?>" class="form-control" placeholder="" aria-describedby="helpId">
                
              </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="mobile" id="mobile" value="<?= $profile->mobile;?>" class="form-control" placeholder="" aria-describedby="helpId">
                
              </div>
              <div class="form-group">
                <label for="">Status</label>
                <select class="form-control" name="is_block">
                    <option value="0" <?php echo $profile->is_block=='0' ? 'selected':'';?>>Active</option>
                    <option value="1"<?php echo $profile->is_block=='1' ? 'selected':'';?>>Block</option>
                </select>           
                
              </div>
              <button type="submit" class="btn btn-primary" name="edit_btn">Save</button>
          </form>-->
      </div>
    </div>
   
     <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <div class="card card-body">
         
            <form action="" method="post">
                 
                <div class="form-group">
                  <label for="">Set New Password </label>
                  <input type="password" name="u_password" id="u_password" value="" class="form-control" placeholder="Enter New Password" aria-describedby="helpId">
                  
                </div>
               
                

                <button type="submit" class="btn btn-primary" name="set_pass_btn">Set password</button>
            </form>
        </div>
    </div>
</div>
