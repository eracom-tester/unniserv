<?php
$profile=$this->session->userdata("profile");

?>
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">home</a></li>            
                <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">Fund</a></li>            
                <li class="breadcrumb-item active" aria-current="page"> Fund Convert</li>
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
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="card card-body card-bg-1">
        

         <?php
        echo form_open($panel_path.'fund/fund-convert');
        
        $userid=$this->session->userdata('user_id');
        $currency=$this->conn->company_info('currency');
        
        $convert_from_wallets=$this->conn->setting('convert_from_wallets');
        $convert_to_wallets=$this->conn->setting('convert_to_wallets');
        
        ?>
        <div class="form-group">
            <label for="" >Select From Wallet</label>
            <select name="from_wallet" class="check_balance form-control" data-response="from_area" >
                <option value="">Select Wallet</option>
                <?php
                    $convert_from_wallet_arr=json_decode($convert_from_wallets,true);
                    foreach($convert_from_wallet_arr as $sl=>$wl_name){
                        ?>
                        <option value="<?= $sl;?>"><?= $wl_name;?></option>
                        <?php
                    }
                ?>
            </select>
             <span id="from_area" class=" " ><?= form_error('from_wallet');?></span>
        </div>
        <div class="form-group">
            <label for="">Select To Wallet</label>
            <select name="to_wallet" class="form-control">
                <option value="">Select Wallet</option>
                <?php
                    $convert_to_wallet_arr=json_decode($convert_to_wallets,true);
                    foreach($convert_to_wallet_arr as $sl=>$wl_name){
                        ?>
                        <option value="<?= $sl;?>"><?= $wl_name;?></option>
                        <?php
                    }
                ?>
            </select>
            <span class=" " ><?= form_error('to_wallet');?></span>
        </div>
             
        <div class="form-group">
            <label for="">Enter Amount</label>
            <input type="number" name="amount" id="amount" value="<?= set_value('amount');?>" class="form-control" placeholder="Enter Amount" aria-describedby="helpId">
            <span class=" " ><?= form_error('amount');?></span>  
        </div>           

            <button type="submit" class="btn btn-primary" name="convert_btn" >Convert</button>
        </form>
    </div>
    </div>
</div>
