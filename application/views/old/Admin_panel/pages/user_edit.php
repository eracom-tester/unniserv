
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Edit Profile</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $admin_path.'users';?>">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">Edit Profile</h6>
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
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card card-body">
          <form action="" method="post">
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

              <button type="submit" class="btn btn-primary" name="edit_btn">Save</button>
          </form>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card card-body">
        <?php
        $userid=$edit_user;
        $bank_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");

        ?>
            <form action="" method="post">
                <div class="form-group">
                  <label for="">Bank Name</label>
                  <input type="text" name="bank_name" value="<?= $bank_details ? $bank_details[0]->bank_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId" >               
                </div>
                <div class="form-group">
                  <label for="">Account Holder Name</label>
                  <input type="text" name="account_holder_name" value="<?= $bank_details ? $bank_details[0]->account_holder_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  
                </div>
                <div class="form-group">
                  <label for="">Account No.</label>
                  <input type="text" name="account_no" id="account_no" value="<?= $bank_details ? $bank_details[0]->account_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  
                </div>
                <div class="form-group">
                  <label for="">IFSC</label>
                  <input type="text" name="ifsc_code" id="ifsc_code" value="<?= $bank_details ? $bank_details[0]->ifsc_code :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  
                </div>
                <div class="form-group">
                  <label for="">Bank branch</label>
                  <input type="text" name="bank_branch" id="bank_branch" value="<?= $bank_details ? $bank_details[0]->bank_branch :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  
                </div>
                <div class="form-group">
                  <label for="">BTC address </label>
                  <input type="text" name="btc_address" id="btc_address" value="<?= $bank_details ? $bank_details[0]->btc_address :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  
                </div>
                <div class="form-group">
                  <label for="">ETH address </label>
                  <input type="text" name="eth_address" id="eth_address" value="<?= $bank_details ? $bank_details[0]->eth_address :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  
                </div>
                

                <button type="submit" class="btn btn-primary" name="edit_bank_btn">Save</button>
            </form>
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
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
