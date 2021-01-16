<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		  
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $panel_path.'profile';?>">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
                    ?>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <div class="card card-body card-bg-1">
          <form action="" method="post">
              <div class="form-group">
                <label for="">Old Password</label>
                <input type="password" name="old_password"  value="<?php echo set_value('old_password');?>" class="form-control" placeholder="Old Password" aria-describedby="helpId"  >  
                <span class=" "><?php echo form_error('old_password');?></span>             
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password" id="password" value="<?php echo set_value('password');?>" class="form-control" placeholder="Password" aria-describedby="helpId">
                <span class=" " ><?php echo form_error('password');?></span>
              </div>
              <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" value="<?php echo set_value('confirm_password');?>" class="form-control" placeholder="Confirm Password" aria-describedby="helpId">
                <span class=" "><?php echo form_error('confirm_password');?></span>
              </div>
              

              <button type="submit" class="btn btn-primary" name="password_btn">Change</button>
          </form>
      </div>
    </div>
</div>
</div>
