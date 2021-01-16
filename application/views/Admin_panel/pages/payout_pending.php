<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Payouts</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Payouts</a></li>            
           
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>

<h6 class="text-uppercase"> Payouts</h6>
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
    $txs_type_array=json_decode($this->conn->setting('transaction_types'));
    $currenct_payout_id=$this->wallet->currenct_payout_id();
    $last_payout=$currenct_payout_id-1;
    ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card card-body">
       <form action="" method="get">
             <div class="form-inline1">
                 <div class="form-group m-1">                      
                    <input type="text" Placeholder="Enter Name" name="name" class="" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />                       
                 </div>
                <!-- <div class="form-group ">                      
                    <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />                      
                 </div>-->
                 
                    
                    <input type="date" class=""  Placeholder="From"  name="start_date" value="<?= (isset($_REQUEST['start_date']) ? $_REQUEST['start_date']:''); ?>"/>
                    
                    <input type="date" class=""  Placeholder="End date"  name="end_date" value="<?= (isset($_REQUEST['end_date']) ? $_REQUEST['end_date']:''); ?>" />
                     
                 
                    <select class="" name="payout_id" id="">
                        <!--<option value="">Select Payout</option>-->
                        
                        <option value='' >All Payout</option>
                        <option value='<?= $last_payout?>' <?= isset($_REQUEST['payout_id']) && $_REQUEST['payout_id']==$last_payout ? 'selected':'';?> >Last Payout</option>
                      
                    </select>
                 
               
                 <input type="submit" name="submit" class=" " value="filter" />
                 <a href="<?= $admin_path.'transactions/payouts';?>" class="" > <input type="submit" name="submit" class=" " value="Reset" />  </a>
                 <!--<input type="submit" name="export_to_excel" class="btn btn-sm m-1" value="Export to excel" />-->
            </div>
        </form>
</div>
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
       
<br>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>  <th>Name</th>
                <th>Total Payouts</th>
                <th>Charges</th>
                <th>Net Profit</th>
                <th>Bank Account Number</th>
                <th>Bank Ifsc Code</th>
                <th>Date </th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
            <?php

        if($table_data){
            
            foreach($table_data as $t_data){               
                $tx_profile=$this->profile->profile_info($t_data['u_code']);
                $ttl_amnt=  $t_data['amount']+$t_data['tx_charge']; 
                $user_id=$t_data['u_code'];
                $check_bank=$this->conn->runQuery('*','user_accounts',"u_code='$user_id'  and bank_kyc_status='approved'");    
            ?>
            <tr>
                <td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
                <td><?= $ttl_amnt;?></td> 
                <td><?= $t_data['tx_charge'];?></td> 
                <td><?= $t_data['amount'];?></td> 
                <td><?= $check_bank[0]->account_no;?></td> 
                <td><?= $check_bank[0]->ifsc_code;?></td> 
                <td><?= $t_data['date'];?></td>                    
                                          
                <td><a class="btn btn-sm btn-info" href="<?= $admin_path.'Transactions/view?id='.$t_data['id'];?>">View</a></td>              
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
