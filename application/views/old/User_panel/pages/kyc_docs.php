<?php
$profile=$this->session->userdata("profile");
?>
<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <h4 class="page-title">Kyc</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $panel_path.'profile';?>">KYC</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
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
    $bank_details=$this->conn->runQuery('*',"user_accounts","kyc_status='0' and u_code='$userid'");

    if($bank_details && $bank_details[0]->kyc_status=='0'){
      ?>
      
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         
            <strong> Information! </strong>Kyc request submitted. Please wait for any action.
         
      </div>
      
      <?php
    }

    if($bank_details && $bank_details[0]->kyc_status=='1'){
      ?>      
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> Success! </strong>Kyc approved.
      </div>      
      <?php
    }

    if($bank_details && $bank_details[0]->kyc_status=='2'){
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
                  <label for="">Adhaar No.</label>
                  <input type="text" name="adhaar_no" id="adhaar_no" value="<?= $bank_details ? $bank_details[0]->adhaar_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('adhaar_no');?></span>
                </div>
                <div class="form-group">
                  <label for="">Pan No.</label>
                  <input type="text" name="pan_no" id="pan_no" value="<?= $bank_details ? $bank_details[0]->pan_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('pan_no');?></span>
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
                            
                
                <?php
                   if((!$bank_details) ||  ($bank_details[0]->kyc_status=='2')){
                ?>
                  <button type="submit" class="btn btn-primary" name="bank_kyc_btn">Save</button>
                <?php 
                    }  
                ?>
                
            </form>
        </div>
    </div>
     
</div>
</div>
