<div class="">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		   
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Pin</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Generate Pin</li>
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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card card-body card-bg-1">
            <form action="" method="post">

            <?php
$userid=$this->session->userdata('user_id');
$currency=$this->conn->company_info('currency');
            $available_wallets=$this->conn->setting('generate_pin_wallets');
        
            if($available_wallets){
                $useable_wallet=json_decode($available_wallets);
            
                if(count((array)$useable_wallet)>1){
                    foreach($useable_wallet as $wlt_key=>$wlt_name){
                        $balance = $this->wallet->balance($userid,$wlt_key);
                        echo "$wlt_name : $currency $balance <br>";                           
                       
                    }
                    ?>
                    <div class="form-group row">
                    <label for="input-1" class="col-sm-2 col-form-label">Select Wallet</label>
                    <div class="col-sm-10">
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
                    </div>
                    <?php
                }else{
                    foreach($useable_wallet as $wlt_key=>$wlt_name){
                        $balance = $this->wallet->balance($userid,$wlt_key);
                        echo "$wlt_name : $currency $balance";
                        ?><input type="hidden" name="selected_wallet" value="<?= $wlt_key;?>"><?php
                    }
                }
            }
            ?>
            <span class=" text-danger" ><?= form_error('selected_wallet');?></span>

                
                <div class="form-group">
                <label for=""></label>
                    
                
                </div>
                <div class="form-group row">
                    <label for="input-1" class="col-sm-2 col-form-label">Select Pin</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="selected_pin" id="" required>
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
                <label for="input-1" class="col-sm-2 col-form-label">No. of pins</label>
                <div class="col-sm-10">
                <input type="text"
                    class="form-control" name="no_of_pins" value="<?= set_value('no_of_pins');?>" id="" aria-describedby="helpId" placeholder="Enter No. of pins" required />
                <small  class="form-text text-muted"><?= form_error('no_of_pins');?></small>
                </div>
                </div>
                <button type="submit" class="btn btn-primary" name="generate_btn"  onclick="return confirm('Are you sure? you wants to Submit.')" >Generate</button>
            </form>
             <hr>
            <p>You can Generate pin user id</p>
			  
			  <p>*  Enter usernsme which you want to Generate pin</p>
			  <p>* Select package from the drop down menu And then click on Generate pin button.</p>
        </div>
    </div>
</div>
</div>
