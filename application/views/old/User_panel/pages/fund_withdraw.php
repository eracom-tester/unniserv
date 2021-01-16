<?php
$profile=$this->session->userdata("profile");


?>
<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		   
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">home</a></li>            
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">Fund</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Withdrawal</li>
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
    
       <?php
       $days_allowed=$this->conn->setting('wd_days');
       if($days_allowed){
            $daysjson_decode=json_decode($days_allowed);
            if(in_array(date('l'),$daysjson_decode)){
                
                
            $wd_start_time=$this->conn->setting('wd_start_time');
            $str_time=date('H:i:s',strtotime($wd_start_time));
            $wd_end_time=$this->conn->setting('wd_end_time');
            $end_time=date('H:i:s',strtotime($wd_end_time));
            
            $nw_tm=date('H:i:s');
            
            if($nw_tm>=$str_time && $nw_tm<=$end_time){
                
            
                
                ?>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card card-body  card-bg-1">
                        <form action="" method="post">

                        <?php
                        $userid=$this->session->userdata('user_id');
                        $currency=$this->conn->company_info('currency');
                        $available_wallets=$this->conn->setting('withdrawal_wallets');
                        
                        if($available_wallets){
                            $useable_wallet=json_decode($available_wallets);
                        
                            if(count((array)$useable_wallet)>1){
                                foreach($useable_wallet as $wlt_key=>$wlt_name){
                                    $balance = $this->wallet->balance($userid,$wlt_key);
                                    echo "$wlt_name : $currency $balance <br>";                           
                                   
                                }
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
                                    $balance = $this->wallet->balance($userid,$wlt_key);
                                    echo "$wlt_name : $currency $balance";
                                    ?><input type="hidden" name="selected_wallet" value="<?= $wlt_key;?>"><?php
                                }
                            }
                        }
                        ?>
                        <span class=" " ><?= form_error('selected_wallet');?></span>

                            
                            <div class="form-group">
                            <label for="">Enter Amount</label>
                            <input type="number" name="amount" id="amount" value="<?= set_value('amount');?>" class="form-control" placeholder="Enter Amount" aria-describedby="helpId">
                            <span class=" " ><?= form_error('amount');?></span>  
                            </div>
                            

                            <button type="submit" class="btn btn-primary" name="withdrawal_btn"  onclick="return confirm('Are you sure? you wants to Submit.')" >Withdraw</button>
                        </form>
                    </div>
                </div>
                
                <?php
            }
            }
       }
       ?>
   
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <?= $this->conn->setting('wd_conditions');?>
   
    </div>


</div>
</div>
