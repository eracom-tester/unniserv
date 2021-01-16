<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Send Package</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">home</a></li>            
            <li class="breadcrumb-item"><a href="<?= $admin_path.'pin';?>">Package</a></li>            
            <li class="breadcrumb-item active" aria-current="page">Send Package</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">Send Pin </h6>
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
              <label for="">Username</label>
              <input type="text" name="tx_username" value="<?= set_value('tx_username');?>" data-response="username_res" class="form-control check_username_exist"  placeholder="Enter Username" aria-describedby="helpId"> 
              <span class=" " id="username_res"><?= form_error('tx_username');?></span>             
            </div>
            <div class="form-group">
                <label for="">Select Package</label>               
                <select class="form-control" name="selected_pin" id="" required>
                <option value="">Select Package</option>
                <?php
                $all_pin=$this->conn->runQuery("pin_rate,pin_type",'pin_details',"status=1");
                if($all_pin){
                    foreach($all_pin as $pindetails){
                        ?><option value="<?= $pindetails->pin_type;?>"><?= $pindetails->pin_type;?></option><?php
                    }
                }
                ?>
                </select>
                <span class=" " ><?= form_error('selected_pin');?></span>  
            </div>
            
            <div class="form-group">
                <label for="">No. of Package</label>
                <input type="text"
                    class="form-control" name="no_of_pins" value="<?= set_value('no_of_pins');?>" id="" aria-describedby="helpId" placeholder="Enter No. of pins" required />
                <small  class="form-text text-muted"><?= form_error('no_of_pins');?></small>
            </div>
            

            <button type="submit" class="btn btn-primary" name="pin_transfer_btn"  onclick="return confirm('Are you sure? you wants to Submit.')">Transfer</button>
        </form>
    </div>
    </div>
</div>
