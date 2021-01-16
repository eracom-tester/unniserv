
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Auto Register</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $admin_path.'users';?>">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Auto Register</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">Auto Register</h6>
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
                        
                        $requires=$this->conn->runQuery("*",'advanced_info',"title='Auto Registration'");
                        $value_by_lebel= array_column($requires, 'value', 'label');
                        $spon=$value_by_lebel['auto_sponsor_id'];
                        $tx_profile=$this->profile->profile_info($spon);
                    ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="card card-body">
          <form action="" method="post">
              <div class="form-group">
                <label for="">Sponsor Name</label>
                <input type="text" name="sponsor_name" value="<?php echo $tx_profile->username;?>" class="form-control" placeholder="" aria-describedby="helpId"  >               
              </div>
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" value="<?= $value_by_lebel['auto_name'];?>" class="form-control" placeholder="" aria-describedby="helpId">
                
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="email" value="<?= $value_by_lebel['auto_email'];?>" class="form-control" placeholder="" aria-describedby="helpId">
                
              </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="mobile" id="mobile" value="<?= $value_by_lebel['auto_mobile'];?>" class="form-control" placeholder="" aria-describedby="helpId">
                
              </div>
              <div class="form-group">
                <label for="">Total Entry</label>
                <input type="number" name="total_entry" id="total_entry" value="<?= $value_by_lebel['auto_register_entry'];?>" class="form-control" placeholder="" aria-describedby="helpId">
                 <input type="hidden" name="auto_id" id="auto_id" value="<?= random_string($this->conn->setting('pin_gen_fun'), $this->conn->setting('pin_gen_digit'));?>" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
               <div class="form-group">
                <label for="">Auto Register Status</label>
                <select class="form-control" name="auto_register_status">
                    <option value="yes" <?php if($value_by_lebel['auto_register_enable']=="yes"){ echo "selected";}?>>Enable</option>
                    <option value="no" <?php if($value_by_lebel['auto_register_enable']=="no"){ echo "selected";}?>>Disable</option>
                </select>
              </div>
              
              <button type="submit" class="btn btn-primary" name="add_btn">Save</button>
          </form>
      </div>
    </div>
  
</div>
