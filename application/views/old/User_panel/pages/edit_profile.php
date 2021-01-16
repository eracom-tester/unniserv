<?php
$profile=$this->session->userdata("profile");
?>
    <div class="content-wrapper">
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
<div class="row" >
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card card-body card-bg-1">
          <form action="" method="post">
              <div class="form-group">
                <label for="">Username</label>
                <input type="text"  value="<?= $profile->username;?>" class="form-control" placeholder="" aria-describedby="helpId" readonly >               
              </div>
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" value="<?= $profile->name;?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $profile_edited;?> />
                
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="email" value="<?= $profile->email;?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $profile_edited;?> />
                
              </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="mobile" id="mobile" value="<?= $profile->mobile;?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $profile_edited;?> />
                
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
      </div>
    </div>
    
    <?php
    if($this->conn->plan_setting('bank_kyc')!='1'){
    ?>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card card-body  card-bg-1">
        <?php
        $userid=$this->session->userdata('user_id');
        $bank_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");
        $edit_bank_once=$this->conn->setting('edit_bank_once');
        $bank_edited='';
        if($edit_bank_once=='yes'){
            $bank_edited=$bank_details ? 'readonly':'';
        }
        
        ?>
            <form action="" method="post">
                <?php
                 $edit_bank_enable=$this->conn->setting('edit_bank_enable');
                 if($edit_bank_enable=='yes'){
                     ?>
                     <div class="form-group">
                          <label for="">Bank Name</label>
                          <input type="text" name="bank_name" value="<?= $bank_details ? $bank_details[0]->bank_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId"  <?= $bank_edited;?> />               
                        </div>
                        <div class="form-group">
                          <label for="">Account Holder Name</label>
                          <input type="text" name="account_holder_name" value="<?= $bank_details ? $bank_details[0]->account_holder_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                          
                        </div>
                        <div class="form-group">
                          <label for="">Account No.</label>
                          <input type="text" name="account_no" id="account_no" value="<?= $bank_details ? $bank_details[0]->account_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                           <span class=" " ><?= form_error('account_no');?></span>
                        </div>
                        <div class="form-group">
                          <label for="">IFSC</label>
                          <input type="text" name="ifsc_code" id="ifsc_code" value="<?= $bank_details ? $bank_details[0]->ifsc_code :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                          <span class=" " ><?= form_error('ifsc_code');?></span>
                        </div>
                        <div class="form-group">
                          <label for="">Bank branch</label>
                          <input type="text" name="bank_branch" id="bank_branch" value="<?= $bank_details ? $bank_details[0]->bank_branch :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                          
                        </div>
                     <?php
                 }
                
                     $edit_paytm_enable=$this->conn->setting('edit_paytm_enable');
                     if($edit_paytm_enable=='yes'){
                     ?>
                        <div class="form-group">
                          <label for="">Paytm no</label>
                          <input type="text" name="paytm_no" id="paytm_no" value="<?= $bank_details ? $bank_details[0]->paytm_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                          <span class=" " ><?= form_error('paytm_no');?></span>
                        </div>
                    <?php
                    }
                
                     $edit_btc_enable=$this->conn->setting('edit_btc_enable');
                     if($edit_btc_enable=='yes'){
                     ?>
                        <div class="form-group">
                          <label for="">BTC address </label>
                          <input type="text" name="btc_address" id="btc_address" value="<?= $bank_details ? $bank_details[0]->btc_address :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                           <span class=" " ><?= form_error('btc_address');?></span>
                        </div>
                        <div class="form-group">
                          <label for="">ETH address </label>
                          <input type="text" name="eth_address" id="eth_address" value="<?= $bank_details ? $bank_details[0]->eth_address :'';?>" class="form-control" placeholder="" aria-describedby="helpId" <?= $bank_edited;?> />
                          <span class=" " ><?= form_error('eth_address');?></span>
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
        </div>
    </div>
    <?php } ?>
</div>
</div>