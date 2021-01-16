<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Pending Fund Request</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#"> Fund Request</a></li>            
            <li class="breadcrumb-item active" aria-current="page">  Pending </li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Pending Fund Request</h6>
<hr>
<?php

 $success['param']='success';
$success['alert_class']='alert-success';
$success['type']='success';
$this->show->show_alert($success);

$erroralert['param']='error';
$erroralert['alert_class']='alert-danger';
$erroralert['type']='error';
$this->show->show_alert($erroralert);
if($this->session->has_userdata($search_parameter)){
	$get_data=$this->session->userdata($search_parameter);
	$likecondition = (array_key_exists($search_string,$get_data) ? $get_data[$search_string]:array());
}else{
	$likecondition=array();
}   
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="<?= $admin_path.'fund/pending';?>" method="get">
             <div class="form-inline">
                 <div class="form-group m-1">                      
                    <input type="text" Placeholder="Enter Tx User" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />                       
                 </div>&nbsp;
                
                 
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />&nbsp;
                 <a href="<?=$admin_path.'fund/pending';?>"class="btn btn-sm">Reset</a>
                 
               
            </div>
        </form>
<br>
<?php
         $ttl_pages=ceil($total_rows/$limit);
         if($ttl_pages>1){
             ?>
              <form action="" method="get">
                <div class="form-group">
                    
                    Go to Page : 
                    <input type="text" list="pages" name="page" value="<?= (isset($_REQUEST['page']) ? $_REQUEST['page']:'');?>" />
                    
                    <datalist id="pages">
                         <?php
                             for($pg=1;$pg<=$ttl_pages;$pg++){
                                 ?><option value="<?= $pg;?>" ><?= $pg;?></option><?php
                             }
                         ?>
                    </datalist>
                    <input type="submit" name="submit" class=" " value="Go" />
                </div>
            </form>
             <?php
         }
        ?>
       


<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                
                <th>S No.</th>
				
                <th>Tx user</th>
                <th>Action</th>
                <th>Amount</th>
                 <th>Method</th>
                <th>Type</th>
                <th>Utr Number</th>
                 <th>Payment Slip</th>
                
                <th>Status </th>
                <th>Date </th>
                 
            </tr>
        </thead>
        <tbody>
            <?php

        if($table_data){
            
            foreach($table_data as $t_data){
             
                
                $sr_no++;            
                    $tx_profile=$this->profile->profile_info($t_data['u_code']);
                  $bank_details=json_decode($t_data['bank_details']);  

            ?>
            <tr>
                <td><?= $sr_no;?></td>
				 
                <td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
                
                                               
                <td><a class="btn btn-sm btn-info" href="<?= $admin_path.'fund/view?id='.$t_data['id'];?>">View</a></td>                               
                <td><?= $t_data['amount']+$t_data['tx_charge'];?></td>   
                 <td><?= $t_data['cripto_type'];?></td>                             
                 <td><?= $t_data['payment_type'];?></td>                             
                <td><?= $t_data['cripto_address'];?></td> 
                <td><a href="<?= $t_data['payment_slip'];?>" target="_blank"><img src="<?= $t_data['payment_slip'];?>" style="height:50px;width:50px"></a></td>  
                 
                <td><span class="badge badge-warning badge-sm"><?= $t_data['status']==0 ? 'Pending':'';?></span></td>                                
                <td><?= $t_data['date'];?></td>                                
                           
            </tr>
            <?php
            }
        }
            ?>
            
        </tbody>
    </table>
</div>


    <?php 
    
    echo $this->pagination->create_links();?>
    </div>
</div>
