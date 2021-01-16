<?php

$withdrawal_details=$this->conn->runQuery('*','transaction',"id='$rq_id' and status=0");
if(!$withdrawal_details){
    redirect($admin_path.'fund/pending');
}
$t_data=$withdrawal_details[0];
?>
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">  Fund Request Details </h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#"> Fund Request</a></li>            
            <li class="breadcrumb-item"><a href="#"> Pending</a></li>            
            <li class="breadcrumb-item active" aria-current="page">  Fund Request Detail </li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Fund Request Detail</h6>
<hr>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
       

<div class="table-responsive">
<table class="table table-hover">
        <?php
          $tx_profile=$this->profile->profile_info($t_data->u_code);
           
        ?>
            <tr>               
                <th> User</th><td>:</td><td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
            </tr>
            <tr>
                <th>Amount</th><td>:</td><td><?= $t_data->amount;?></td>  
                </tr>
                
           
                
            <tr>
                <th>Method</th><td>:</td><td><?= $t_data->cripto_type;?></td> 
                </tr>
               <tr>
                <th>Type</th><td>:</td><td><?= $t_data->payment_type;?></td> 
                </tr> 
            <tr>    
                <th>UTR Number</th><td>:</td><td><?= $t_data->cripto_address;?></td> 
                </tr>
             <tr>    
                <th>Payment Slip</th><td>:</td><td><a href="<?= $t_data->payment_slip;?>" target="_blank"><img src="<?= $t_data->payment_slip;?>" style="height:50px;width:50px;"></a></td> 
                </tr>    
            <tr>
                
                
                <th>Status </th><td>:</td><td><span class="badge badge-warning badge-sm"><?= $t_data->status==0 ? 'Pending':'';?></span></td> 
                </tr>
            <tr>
                <th>Date </th><td>:</td><td><?= $t_data->date;?></td>  
                 
            </tr>
         
        
    </table>
    
</div>



   
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <form action="" method="post">
            <div class="form-group">
              <label for="">Reason (Give Reason on cancellation)</label>
              <textarea name="reason" id="" class="form-control"></textarea>
              <small class="text-muted"><?= form_error('reason');?></small>
            </div>
            <div class="form-group">  
        <button type="submit" name="approve_btn" class="btn btn-success">Approve</button>
        <button type="submit" name="cancel_btn" class="btn btn-danger">Cancel</button>
            </div>
    </form>
    </div>
</div>
