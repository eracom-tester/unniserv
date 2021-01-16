
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Create Package</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $admin_path.'packages';?>">Packages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Package</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">Create Package</h6>
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
                <input type="text"  value="<?= set_value('pin_type');?>" name="pin_type" class="form-control" placeholder="Package Name" aria-describedby="helpId" >  
                <span class=" " ><?= form_error('pin_type');?></span>               
              </div>
              <div class="form-group">
                <label for="">Package Rate</label>
                <input type="text" name="pin_rate" id="pin_rate" value="<?= set_value('pin_rate');?>" class="form-control" placeholder="Package Rate" aria-describedby="helpId">
                <span class=" " ><?= form_error('pin_rate');?></span>  
              </div>
              <div class="form-group">
                <label for="">BV</label>
                <input type="text" name="business_volumn" id="business_volumn" value="<?= set_value('business_volumn');?>" class="form-control" placeholder="Business volumn" aria-describedby="helpId">
                <span class=" " ><?= form_error('business_volumn');?></span>  
              </div>
              <div class="form-group">
                <label for="">PV</label>
                <input type="text" name="pin_value" id="pin_value" value="<?= set_value('pin_value');?>" class="form-control" placeholder="Pin value" aria-describedby="helpId">
                <span class=" " ><?= form_error('pin_value');?></span>  
              </div>

              <button type="submit" class="btn btn-primary" name="add_btn">Create</button>
          </form>
      </div>
    </div>
</div>
