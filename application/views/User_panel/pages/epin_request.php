<?php
$profile=$this->session->userdata("profile");
?>
<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <h4 class="page-title">Pin Request</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $panel_path.'profile';?>">Pin Request</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pin Request</li>
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
    
    $pin_details=$this->conn->runQuery('*','pin_details',"status='1'");
    $pin_rate=$pin_details[0]->pin_rate;
    
    
?>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Username.</label>
                  <input type="text" name="user_id" id="user_id" value="<?=$profile->username;?>" class="form-control" placeholder="" aria-describedby="helpId" readonly>
                  <span class="text-danger " ><?= form_error('user_id');?></span>
                </div>
                <div class="form-group">
                  <label for="">Utr Number.</label>
                  <input type="text" name="utr_number" id="" value="" class="form-control" placeholder="Enter Utr Number" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('utr_number');?></span>
                </div>
                <div class="form-group">
                  <label for="">Slip</label>
                  <input type="file" name="slip_img" value="" class="form-control" placeholder="" aria-describedby="helpId">
                 
                </div>
                <div class="form-group">
                  <label for="">Number Of Pins.</label>
                  <input type="text" name="number_of_pins" id="" value="" class="form-control cal_amnt" placeholder="Enter Number Of Pins " data-pin_rate="<?=$pin_rate;?>" aria-describedby="helpId">
                  <span id="rate_area" class="text-danger " ><?= form_error('number_of_pins');?></span>
                </div>
                <div class="form-group">
                  <label for="">Remark.</label>
                  <input type="text" name="remark" id="" value="" class="form-control" placeholder="" aria-describedby="helpId">
                  <span class="text-danger " ><?= form_error('remark');?></span>
                </div>
                  <button type="submit" class="btn btn-primary" name="epin_btn">Submit</button>
            </form>
        </div>
    </div>
     
</div>
</div>

 
