<?php
$profile=$this->session->userdata("profile");
?>
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <h4 class="page-title">Bank Kyc</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $panel_path.'profile';?>">KYC</a></li>
            <li class="breadcrumb-item active" aria-current="page">bank</li>
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

    $userid=$this->session->userdata('user_id');
    $bank_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");

    if($bank_details && $bank_details[0]->bank_kyc_status=='submitted'){
      ?>
      
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> Information! </strong>Bank kyc request submitted. Please wait for any action.
      </div>
      
      <?php
    }

    if($bank_details && $bank_details[0]->bank_kyc_status=='approved'){
      ?>      
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> Success! </strong>Bank kyc approved.
      </div>      
      <?php
    }

    if($bank_details && $bank_details[0]->bank_kyc_status=='rejected'){
      ?>      
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> KYC Rejected! </strong> Reason : <?= $bank_details[0]->bank_remark;?>.
      </div>      
      <?php
    }
?>


<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card card-body">
        <?php
       

        ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Bank Name</label>
                  <input type="text" name="bank_name" value="<?= $bank_details ? $bank_details[0]->bank_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId" >  
                  <span class=" text-danger" ><?= form_error('bank_name');?></span>             
                </div>
                <div class="form-group">
                  <label for="">Account Holder Name</label>
                  <input type="text" name="account_holder_name" value="<?= $bank_details ? $bank_details[0]->account_holder_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('account_holder_name');?></span>
                </div>
                <div class="form-group">
                  <label for="">Account No.</label>
                  <input type="text" name="account_no" id="account_no" value="<?= $bank_details ? $bank_details[0]->account_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('account_no');?></span>
                </div>
                <div class="form-group">
                  <label for="">IFSC</label>
                  <input type="text" name="ifsc_code" id="ifsc_code" value="<?= $bank_details ? $bank_details[0]->ifsc_code :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('ifsc_code');?></span>
                </div>
                <div class="form-group">
                  <label for="">Bank branch</label>
                  <input type="text" name="bank_branch" id="bank_branch" value="<?= $bank_details ? $bank_details[0]->bank_branch :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('bank_branch');?></span>
                </div>
                <div class="form-group">
                  <label for="">Bank Image</label>
                  <input type="file" name="bank_kyc_img" id="bank_kyc_img" value="" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted text-danger  "><?= (isset($upload_error) ? $upload_error:'');?></small>
                </div>
                <!--<div class="form-group">
                  <label for="">Paytm no</label>
                  <input type="text" name="paytm_no" id="paytm_no" value="<?= $bank_details ? $bank_details[0]->paytm_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class=" text-danger" ><?= form_error('paytm_no');?></span>
                </div>
                <div class="form-group">
                  <label for="">BTC address </label>
                  <input type="text" name="btc_address" id="btc_address" value="<?= $bank_details ? $bank_details[0]->btc_address :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  
                </div>
                <div class="form-group">
                  <label for="">ETH address </label>
                  <input type="text" name="eth_address" id="eth_address" value="<?= $bank_details ? $bank_details[0]->eth_address :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  
                </div>-->             
                
                <?php
                   if((!$bank_details) || ($bank_details[0]->bank_kyc_status=='pending') ||  ($bank_details[0]->bank_kyc_status=='rejected')){
                ?>
                  <button type="submit" class="btn btn-primary" name="bank_kyc_btn">Save</button>
                <?php 
                    }  
                ?>
                
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

      <?php
      if($bank_details && $bank_details[0]->bank_kyc_status!='pending'){
        ?>
        <div class="card">
          <div class="card-header">
            Bank-image
          </div>
          <div class=" card-body">          
            <img style="width:100%;" src="<?= $bank_details[0]->bank_img;?>">
          </div>
        </div>
        <?php
      }      
      ?>
  </div>
</div>
