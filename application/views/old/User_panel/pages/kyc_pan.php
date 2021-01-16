<?php
$profile=$this->session->userdata("profile");
?>
<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <h4 class="page-title">Pan Kyc</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $panel_path.'profile';?>">KYC</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pan</li>
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
    $pan_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");

    if($pan_details && $pan_details[0]->pan_kyc_status=='submitted'){
      ?>
      
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> Information! </strong>Pan kyc request submitted. Please wait for any action.
      </div>
      
      <?php
    }

    if($pan_details && $pan_details[0]->pan_kyc_status=='approved'){
      ?>      
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> Success! </strong>Pan kyc approved.
      </div>      
      <?php
    }

    if($pan_details && $pan_details[0]->pan_kyc_status=='rejected'){
      ?>      
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> KYC Rejected! </strong> Reason : <?= $pan_details[0]->pan_remark;?>.
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
                  <label for="">Pan Name</label>
                  <input type="text" name="pan_name" value="<?= $pan_details ? $pan_details[0]->pan_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId" >  
                  <span class=" text-danger" ><?= form_error('pan_name');?></span>             
                </div>
                
                <div class="form-group">
                  <label for="">Pan No.</label>
                  <input type="text" name="pan_no" id="pan_no" value="<?= $pan_details ? $pan_details[0]->pan_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('pan_no');?></span>
                </div>
                
                <div class="form-group">
                  <label for="">Pan Image</label>
                  <input type="file" name="pan_image" id="pan_image" value="" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class=" text-danger  "><?= (isset($upload_error) ? $upload_error:'');?></small>
                </div>
                              
                
                <?php
                   if((!$pan_details) || ($pan_details[0]->pan_kyc_status=='pending') ||  ($pan_details[0]->pan_kyc_status=='rejected')){
                ?>
                  <button type="submit" class="btn btn-primary" name="pan_kyc_btn">Save</button>
                <?php 
                    }  
                ?>
                
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

      <?php
      if($pan_details && $pan_details[0]->pan_kyc_status!='pending'){
        ?>
        <div class="card">
          <div class="card-header">
            Pan-image
          </div>
          <div class=" card-body">          
            <img style="width:100%;" src="<?= $pan_details[0]->pan_image;?>">
          </div>
        </div>
        <?php
      }      
      ?>
  </div>
</div>
</div>
