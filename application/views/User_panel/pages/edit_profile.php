<?php
$profile=$this->session->userdata("profile");

?>
    <div class="">
        <div class="row pt-2 pb-2">
                <div class="col-sm-12">
        		   
        		    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= $panel_path.'profile';?>">Profile</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                 </ol>
        	   </div>
        	    
        </div>


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
                        
                        
                        $edit_profile_once=$this->conn->setting('edit_profile_once');
                        $profile_edited='';
                        if($edit_profile_once=='yes'){
                            $profile_edited=$profile->profile_edited=='1' ? 'readonly':'';
                        }
                    ?>

<!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body card-bg-1">
              <form id="" action="" method="post" enctype="multipart/form-data">
                <h4 class=" text-uppercase">
                  <!--<i class="fa fa-lock-circle-o"></i>-->
                  user detail
                </h4>
                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">Username*</label>
                  <div class="col-sm-10">
                  <input type="text"  value="<?= $profile->username;?>" class="form-control" placeholder="" aria-describedby="helpId" readonly > 
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-2" class="col-sm-2 col-form-label">Name*</label>
                  <div class="col-sm-10">
                   <input type="text" name="name" id="name" value="<?= $profile->name;?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $profile_edited;?> />
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="input-2" class="col-sm-2 col-form-label">Profile Pic</label>
                  <div class="col-sm-10">
                   <input type="file" name="profile_pic" id="profile_pic" class="form-control" placeholder="" aria-describedby="helpId" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">Email*</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" id="email" value="<?= $profile->email;?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $profile_edited;?> />
                  </div>
                </div>
                
				
				
				<div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">Mobile*</label>
                  <div class="col-sm-10">
                   <input type="text" name="mobile" id="mobile" value="<?= $profile->mobile;?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $profile_edited;?> />
                  </div>
                </div>
                
                <?php
              if($profile_edited!='readonly'){
                    $edit_profile_with_otp=$this->conn->setting('edit_profile_with_otp');
                    if($edit_profile_with_otp=='yes'){
                      $display=(isset($_SESSION['otp']) ? 'block':'none');
                      ?>
                      <button type="button" data-response_area="action_areap" class="btn btn-primary send_otp" >Send OTP</button>
                      
                      <div id="action_areap" style="display:<?= $display;?>"> 
                        <div class="form-group">
                          <label for="">Enter OTP </label>
                          <input type="text" name="otp_input1" id="otp_input1" value="<?= set_value('otp_input1');?>" class="form-control" placeholder="Enter OTP" aria-describedby="helpId">
                          <span class=" " ><?= form_error('otp_input1');?></span> 
                        </div> 
                        <button type="submit" class="btn btn-primary" name="edit_btn">Save</button> 
                      </div>
                      <?php
                    }else{
                      ?>
                      <button type="submit" class="btn btn-primary" name="edit_btn">Save</button>
                      <?php
                    } 
              }
              
                
                ?>
              </form>
              <hr>
			  <p>Edit your user profile details</p>
			  <p>To edit your user profile details, follow the steps below:</p>
			  <p>* Click on the username at the top left of the screen. then enter username.</p>
			  <p>* Type your  email address</p>
			  <p>* Type your mobile number</p>
			  <p>* Click the Save option to save all user details </p>
            </div>
          </div>
        </div>
		
		
		
		
		 <?php
    if($this->conn->plan_setting('bank_kyc')!='1'){
    ?>
		<div class="col-lg-12">
          <div class="card">
            <div class="card-body card-bg-1">
			 <?php
        $userid=$this->session->userdata('user_id');
        $bank_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");
        $edit_bank_once=$this->conn->setting('edit_bank_once');
        $bank_edited='';
        if($edit_bank_once=='yes'){
            $bank_edited=$bank_details ? 'readonly':'';
        }
        
        ?>
              <form id="" action="" method="post">
			  <?php
                 $edit_bank_enable=$this->conn->setting('edit_bank_enable');
                 
                 $btc_withdrawal=$this->conn->setting('btc_withdrawal');
                 if($edit_bank_enable=='yes' && $btc_withdrawal=='no'){
                     ?>
                <h4 class="form-header text-uppercase">
                  <!--<i class="fa fa-lock-circle-o"></i>-->
                  Bank Detail
                </h4>
                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">Bank Name*</label>
                  <div class="col-sm-10">
                   <input type="text" name="bank_name" value="<?= $bank_details ? $bank_details[0]->bank_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId"  <?= $bank_edited;?> />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-2" class="col-sm-2 col-form-label">Account Holder Name*</label>
                  <div class="col-sm-10">
                   <input type="text" name="account_holder_name" value="<?= $bank_details ? $bank_details[0]->account_holder_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-3" class="col-sm-2 col-form-label">Account No*</label>
                  <div class="col-sm-10">
                  <input type="text" name="account_no" id="account_no" value="<?= $bank_details ? $bank_details[0]->account_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                           <span class=" " ><?= form_error('account_no');?></span>
                  </div>
                </div>
                
				
				<div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">IFSC*</label>
                  <div class="col-sm-10">
                    <input type="text" name="ifsc_code" id="ifsc_code" value="<?= $bank_details ? $bank_details[0]->ifsc_code :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                          <span class=" " ><?= form_error('ifsc_code');?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">Bank branch*</label>
                  <div class="col-sm-10">
                    <input type="text" name="bank_branch" id="bank_branch" value="<?= $bank_details ? $bank_details[0]->bank_branch :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                  </div>
                </div>
				
				 <?php
                 }
                
                     $edit_paytm_enable=$this->conn->setting('edit_paytm_enable');
                     
                     
                     if($edit_paytm_enable=='yes' ){
                     ?>
                        <div class="form-group">
                          <label for="">Paytm no*</label>
                          <input type="text" name="paytm_no" id="paytm_no" value="<?= $bank_details ? $bank_details[0]->paytm_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                          <span class=" " ><?= form_error('paytm_no');?></span>
                        </div>
                    <?php
                    }
                
                     $edit_btc_enable=$this->conn->setting('edit_btc_enable');
                     if($edit_btc_enable=='yes' || $btc_withdrawal=='yes'){
                     ?>
				<div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">BTC address*</label>
                  <div class="col-sm-10">
                    <input type="text" name="btc_address" id="btc_address" value="<?= $bank_details ? $bank_details[0]->btc_address :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                           <span class=" " ><?= form_error('btc_address');?></span>
                  </div>
                </div>
				
			 	<div class="form-group row">
                  <label for="input-1" class="col-sm-2 col-form-label">ETH address*</label>
                  <div class="col-sm-10">
                   <input type="text" name="eth_address" id="eth_address" value="<?= $bank_details ? $bank_details[0]->eth_address :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                          <span class=" " ><?= form_error('eth_address');?></span>
                  </div>
                </div> 
                <?php
                     }
                if($bank_edited!='readonly'){
                    $edit_profile_with_otp=$this->conn->setting('edit_bank_with_otp');
                    if($edit_profile_with_otp=='yes'){
    
                      $display=(isset($_SESSION['otp']) ? 'block':'none');
                      ?>
                      <button type="button" data-response_area="action_area" class="btn btn-primary send_otp" >Send OTP</button>
                      
                      <div id="action_area" style="display:<?= $display;?>"> 
                        <div class="form-group">
                          <label for="">Enter OTP </label>
                          <input type="text" name="otp_input" id="otp_input" value="<?= set_value('otp_input');?>" class="form-control" placeholder="Enter OTP" aria-describedby="helpId">
                          <span class=" " ><?= form_error('otp_input');?></span> 
                        </div> 
                        <button type="submit" class="btn btn-primary" name="edit_bank_btn">Save</button>  
                      </div>
                      <?php
                    }else{
                      ?>
                      <button type="submit" class="btn btn-primary" name="edit_bank_btn">Save</button>
                      <?php
                    }
                }
                ?>
              </form>
			  <p>You can enter any number of bank details for each business partner. </p>
			  <p>* Write the name as it is appeared in your bank account. Refer your passbook or cheque book.</p>
			  <p>* Write the name of your bank e.g. HDFC Bank, ICICI Bank, Punjab National Bank etc.</p>
			  <p>* You can refer your passbook or cheque book for IFSC code.</p>
			  <p>* These codes are used when transferring money between banks, particularly for 
     international wire transfers. Either you contact your bank for this or check the official website of the 
     bank to know the swift code for your bank.</p>
     <p>* I hope you know your bank account number. Don’t copy paste when entering second time so that you can know the mistake.</p>
     <p>* Check the box “Set this form of payment as Primary”.</p>
     <p>* And then Click on Save button.</p>
            </div>
          </div>
        </div>
		 <?php } ?>
      </div><!--End Row-->
</div>