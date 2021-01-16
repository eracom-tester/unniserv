<?php
$profile=$this->session->userdata("profile");
?>
<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <h4 class="page-title">Adhaar Kyc</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="#">KYC</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adhaar</li>
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
    $adhaar_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");

    if($adhaar_details && $adhaar_details[0]->adhaar_kyc_status=='submitted'){
      ?>
      
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> Information! </strong>Pan kyc request submitted. Please wait for any action.
      </div>
      
      <?php
    }

    if($adhaar_details && $adhaar_details[0]->adhaar_kyc_status=='approved'){
      ?>      
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> Success! </strong>Adhaar kyc approved.
      </div>      
      <?php
    }

    if($adhaar_details && $adhaar_details[0]->adhaar_kyc_status=='rejected'){
      ?>      
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong> KYC Rejected! </strong> Reason : <?= $adhaar_details[0]->adhaar_remark;?>.
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
                  <label for="">Adhaar Name</label>
                  <input type="text" name="adhaar_name" value="<?= $adhaar_details ? $adhaar_details[0]->adhaar_name :'';?>" class="form-control" placeholder="" aria-describedby="helpId" >  
                  <span class=" text-danger" ><?= form_error('adhaar_name');?></span>             
                </div>
                
                <div class="form-group">
                  <label for="">Adhaar No.</label>
                  <input type="text" name="adhaar_no" id="adhaar_no" value="<?= $adhaar_details ? $adhaar_details[0]->adhaar_no :'';?>" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('adhaar_no');?></span>
                </div>
                
                <div class="form-group">
                  <label for="">Adhaar Image</label>
                  <input type="file" name="adhaar_image" id="adhaar_image" value="" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class=" text-danger  "><?= (isset($upload_error) ? $upload_error:'');?></small>
                </div>
                              
                
                <?php
                   if((!$adhaar_details) || ($adhaar_details[0]->adhaar_kyc_status=='pending') ||  ($adhaar_details[0]->adhaar_kyc_status=='rejected')){
                ?>
                  <button type="submit" class="btn btn-primary" name="adhaar_kyc_btn">Save</button>
                <?php 
                    }  
                ?>
                
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

      <?php
      if($adhaar_details && $adhaar_details[0]->adhaar_kyc_status!='pending'){
        ?>
        <div class="card">
          <div class="card-header">
          Adhaar-image
          </div>
          <div class=" card-body">          
            <img style="width:100%;" src="<?= $adhaar_details[0]->adhaar_image;?>">
          </div>
        </div>
        <?php
      }      
      ?>
  </div>
</div>
</div>
