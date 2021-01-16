<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <h4 class="page-title"> Re-Topup</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="">Invest</a></li>            
            <li class="breadcrumb-item active" aria-current="page">  Re-Topup</li>
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
 
 
 
 
<!--<?php 

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
                    ?>-->

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card card-body">
         <?php
 
 


 $available_pins=$this->conn->runQuery('count(pin) as cnt','epins',"use_status=0 and u_code='$userid'");
 $cnt_pins=($available_pins ? $available_pins[0]->cnt :0);
 echo "Pin Available : $cnt_pins";

echo form_open($panel_path.'pin/pin_transfer');

  
 ?>
        <form action="" method="post">
 
        <?php

            if($this->conn->setting('retopup_type')=='amount'){

           
                $available_wallets=$this->conn->setting('invest_wallets');

                if($available_wallets){
                    $useable_wallet=json_decode($available_wallets);
                
                    if(count((array)$useable_wallet)>1){
                        ?>
                        <div class="form-group">
                        <label for="">Select Wallet</label>
                        <select name="selected_wallet" id="" class="form-control">
                            <option value="">Select Wallet</option>
                            <?php
                            foreach($useable_wallet as $wlt_key=>$wlt_name){
                                ?>
                                <option value="<?= $wlt_key;?>"><?= $wlt_name;?></option>
                                <?php
                            }
                            ?>
                        </select>
                        </div>
                        <?php
                    }else{
                        foreach($useable_wallet as $wlt_key=>$wlt_name){
                            ?><input type="hidden" name="selected_wallet" value="<?= $wlt_key;?>"><?php
                        }
                    }
                }
            }
            ?>
            <span class=" " ><?= form_error('selected_wallet');?></span>

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
            
            

            <button type="submit" class="btn btn-primary" name="topup_btn"  onclick="return confirm('Are you sure? you wants to Submit.')" >Topup</button>
        </form>
    </div>
    </div>
</div>
</div>
