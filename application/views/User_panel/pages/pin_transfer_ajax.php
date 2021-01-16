        <div class="row pt-2 pb-2">
                <div class="col-sm-12">
        		    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">home</a></li>            
                    <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">Pin</a></li>            
                    <li class="breadcrumb-item active" aria-current="page"> Pin Transfer</li>
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
<div id="message_success"></div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card card-body">
        <form method="post">
 <?php
 $userid=$this->session->userdata('user_id');
 $available_pins=$this->conn->runQuery('count(pin) as cnt','epins',"use_status='0' and u_code='$userid'");
 $cnt_pins=($available_pins ? count($available_pins):0);
 echo "Pin Available : $cnt_pins";

 ?>

            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="tx_username" id="tx_username" value="<?= set_value('tx_username');?>" data-response="tx_username_error" class="form-control check_username_exist"  placeholder="Enter Username" aria-describedby="helpId"> 
              <span class=" " id="tx_username_error"><?= form_error('tx_username');?></span>             
            </div>
            <div class="form-group">
                <label for="">Select Pin</label>               
                <select class="form-control" name="selected_pin" id="selected_pin" required>
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
                <span class=" " id="selected_pin_error" ><?= form_error('selected_pin');?></span>  
            </div>
            
            <div class="form-group">
                <label for="">No. of pins</label>
                <input type="text"
                    class="form-control" name="no_of_pins" value="<?= set_value('no_of_pins');?>" id="no_of_pins" aria-describedby="helpId" placeholder="Enter No. of pins" required />
                <small  class="form-text text-muted" id="no_of_pins_error"><?= form_error('no_of_pins');?></small>
            </div>
            

            <button type="button" class="btn btn-primary pin_transfer_btn" data-tx_username="tx_username" data-selected_pin="selected_pin" data-no_of_pins="no_of_pins"  name="pin_transfer_btn" >Transfer</button>
        </form>
    </div>
    </div>
</div>
