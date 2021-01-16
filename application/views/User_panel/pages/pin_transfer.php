<div class="">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <h4 class="page-title"> Pin Transfer</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">home</a></li>            
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">Pin</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Pin Transfer</li>
         </ol>
	   </div>
	  
</div>

<?php 
$userid = $this->session->userdata('user_id');


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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card card-body card-bg-1">
        
 <?php
 
 


 $available_pins=$this->conn->runQuery('count(pin) as cnt','epins',"use_status=0 and u_code='$userid'");
 $cnt_pins=($available_pins ? $available_pins[0]->cnt :0);
 //echo "Pin Available : $cnt_pins";

echo form_open($panel_path.'pin/pin_transfer');

  
 ?>
        Pin Available: <span id="total_pins"> <?= $cnt_pins;?></span>    
              
            <div class="form-group row">
              <label for="input-1" class="col-sm-2 col-form-label">Username*</label>
              <div class="col-sm-10">
              <input type="text" name="tx_username" value="<?= set_value('tx_username');?>" data-response="username_res" class="form-control check_username_exist"  placeholder="Enter Username" aria-describedby="helpId"> 
              <span class=" " id="username_res"><?= form_error('tx_username');?></span>             
            </div>
            </div>
            <div class="form-group row">
                <label for="input-1" class="col-sm-2 col-form-label">Select Pin*</label> 
                <div class="col-sm-10">
                 <select class="form-control selected_pins" name="selected_pin" id="selected_pin"  data-response="total_pins" required>   
               
                <option value="">Select Pin</option>
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
            </div>
            <div class="form-group row">
                <label for="input-1" class="col-sm-2 col-form-label">No. of pins*</label>
                <div class="col-sm-10">
                <input type="text"
                    class="form-control" name="no_of_pins" value="<?= set_value('no_of_pins');?>" id="" aria-describedby="helpId" placeholder="Enter No. of pins" required />
                <small  class="form-text text-muted"><?= form_error('no_of_pins');?></small>
            </div>
            </div>

            <button type="submit" class="btn btn-primary" name="pin_transfer_btn">Transfer</button>
        </form>
        <hr>
         <p>You can transfer any no. of pins to the user. </p>
			  <p>* Check no. of pin available  </p>
			  <p>* Enter username </p>
			  <p>* Select types of pins from the drop down menu</p>
			  <p>* Enter no. of pins transfer to user And then click on transfer button.</p>
    </div>
    </div>
</div>
</div>
