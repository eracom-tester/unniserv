
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Change Password</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $admin_path.'users';?>">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">Change Password</h6>
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
                  <label for="">Old Password </label>
                  <input type="password" name="old_password" id="old_password" value="" class="form-control" placeholder="Enter Old Password" aria-describedby="helpId">
                  <span class=" " ><?= form_error('old_password');?></span> 
                </div> 
                <div class="form-group">
                  <label for="">New Password </label>
                  <input type="text" name="u_password" id="u_password" value="" class="form-control" placeholder="Enter New Password" aria-describedby="helpId">
                   <span class=" " ><?= form_error('u_password');?></span> 
                </div>
                <div class="form-group">
                  <label for="">Confirm New Password </label>
                  <input type="password" name="confirm_password" id="confirm_password" value="" class="form-control" placeholder="Enter Confirm Password" aria-describedby="helpId">
                  <span class=" " ><?= form_error('confirm_password');?></span> 
                </div>
               
                

                <button type="submit" class="btn btn-primary" name="set_pass_btn">Set password</button>
            </form>
        </div>
    </div>
</div>
