
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Edit Package</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $admin_path.'packages';?>">Packages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">Edit Package</h6>
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
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <div class="card card-body">
          <form action="" method="post">
              <div class="form-group">
                <label for="">Package Name</label>
                <input type="text"  value="<?= $package_details->pin_type;?>" name="pin_type" class="form-control" placeholder="" aria-describedby="helpId" >               
              </div>
              <div class="form-group">
                <label for="">Package Rate</label>
                <input type="text" name="pin_rate" id="pin_rate" value="<?= $package_details->pin_rate;?>" class="form-control" placeholder="" aria-describedby="helpId">
                
              </div>
              <div class="form-group">
                <label for="">BV</label>
                <input type="text" name="business_volumn" id="business_volumn" value="<?= $package_details->business_volumn;?>" class="form-control" placeholder="" aria-describedby="helpId">
                
              </div>
              <div class="form-group">
                <label for="">PV</label>
                <input type="text" name="pin_value" id="pin_value" value="<?= $package_details->pin_value;?>" class="form-control" placeholder="" aria-describedby="helpId">
                
              </div>

              <button type="submit" class="btn btn-primary" name="edit_btn">Save</button>
          </form>
      </div>
    </div>
</div>
