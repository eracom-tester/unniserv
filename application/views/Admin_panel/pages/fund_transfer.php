 
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Fund Transfer</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Fund</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Fund Transfer</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Fund Transfer</h6>
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
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="card card-body">
        <form action="" method="post">

        <?php
 
        $available_wallets=$this->conn->setting('transfer_wallets');
        
        if($available_wallets){
            $useable_wallet=json_decode($available_wallets);
           
            if(count((array)$useable_wallet)>1){
                foreach($useable_wallet as $wlt_key=>$wlt_name){
                                           
                   
                }

                ?>
                <div class="form-group">
                <label for="">Select Wallet</label>
                <select name="selected_wallet" id="" class="form-control">
                    <option value="">Select Wallet</option>
                    <?php
                    foreach($useable_wallet as $wlt_key=>$wlt_name){
                        ?>
                        <option value="<?= $wlt_key;?>"><?= $wlt_name;?></option>
                        <?php
                    }
                    ?>
                </select>
                </div>
                <?php
            }else{
                foreach($useable_wallet as $wlt_key=>$wlt_name){
                    
                    ?><input type="hidden" name="selected_wallet" value="<?= $wlt_key;?>"><?php
                }
            }
        }
        ?>
        <span class=" " ><?= form_error('selected_wallet');?></span>

            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="tx_username" value="<?= set_value('tx_username');?>" data-response="username_res" class="form-control check_username_exist"  placeholder="Enter Username" aria-describedby="helpId"> 
              <span class=" " id="username_res"><?= form_error('tx_username');?></span>             
            </div>
            <div class="form-group">
              <label for="">Enter Amount</label>
              <input type="number" name="amount" id="amount" value="<?= set_value('amount');?>" class="form-control" placeholder="Enter Amount" aria-describedby="helpId">
              <span class=" " ><?= form_error('amount');?></span>  
            </div>
            
            <?php
                $edit_profile_with_otp=$this->conn->setting('admin_transfer_with_otp');
                if($edit_profile_with_otp=='yes'){

                  $display=(isset($_SESSION['admin_otp']) ? 'block':'none');
                  ?>
                  <button type="button" data-response_area="action_area" class="btn btn-primary send_otp" >Send OTP</button>
                  
                  <div id="action_area" style="display:<?= $display;?>"> 
                    <div class="form-group">
                      <label for="">Enter OTP </label>
                      <input type="text" name="otp_input" id="otp_input" value="<?= set_value('otp_input');?>" class="form-control" placeholder="Enter OTP" aria-describedby="helpId">
                      <span class=" " ><?= form_error('otp_input');?></span> 
                    </div> 
                    <button type="submit" class="btn btn-primary" name="transfer_btn">Transfer</button> 
                  </div>
                  <?php
                }else{
                  ?>
                   <button type="submit" class="btn btn-primary" name="transfer_btn" onclick="return confirm('Are you sure? you wants to Submit.')" >Transfer</button>
                  <?php
                }
                ?>
           


        </form>
    </div>
    </div>
</div>
