<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		  
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="">Income</a></li>            
           
         </ol>
	   </div>
	  
</div>

<center>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<?php
if($this->session->has_userdata($search_parameter)){
	$get_data=$this->session->userdata($search_parameter);
	$likecondition = (array_key_exists($search_string,$get_data) ? $get_data[$search_string]:array());
}else{
	$likecondition=array();
}
$user_id=$this->session->userdata('user_id');
?>
    
        <div class="card card-body card-bg-1">
              <div class="panel-heading">
                    <h4 class="panel-title">Income Section</h4>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                        <table class="<?= $this->conn->setting('table_classes'); ?>">
                        
                        <thead>
                                <tr>
                                <?php
                                $usrid=$this->session->userdata('user_id');
                                
                                $all_incomes=$this->conn->runQuery("*",'wallet_types',"wallet_type='income' and status=1");
                                if($all_incomes){
                                    foreach($all_incomes as $income){                           
                                        ?>
                                        <th><?= $income->name;?> (<?= $this->conn->company_info('currency');?>)</th>                            
                                        <?php
                                    }
                                }
                                ?>                            
                                </tr>
                        </thead> 
                                <tbody>
                                    <tr>
                                <?php
                            $ttl_income=array();
                                if($all_incomes){
                                    foreach($all_incomes as $income){
                                        $slug= $income->slug;
                                        $total = $this->conn->runQuery('SUM(amount) as amnt','transaction',"u_code='$usrid' and source='$slug' $query_where")[0]->amnt;
                                        
                                    $ttl_income[]=$total ? $total:0;

                                        ?>

                                            <td><a href="<?= $panel_path."income?income=$slug";?>"><?= $total ? $total:0;?></a></td>
                                        
                                        <?php
                                    }
                                }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              </div>
              <br><br>
        <div class="panel-body">
                <div class="table-responsive">
                        <table class="<?= $this->conn->setting('table_classes'); ?>">
                        
                        <thead>
                                <tr>
                                    <th>Total Income</th>                            
                                    <th>TDS(5%)</th>                            
                                    <th>Total Payable Income</th>                            
                                    <th>Generated Payout</th>                            
                                    <th>Expected Payout</th>                            
                                                         
                                </tr>
                        </thead> 
                                <tbody>
                                    <tr>
                                    <td><?= $ttl_income_amt=round(array_sum($ttl_income),2);?></a></td>
                                    <td><?= $ttl_tx_charge=round($ttl_income_amt*5/100,2);?></a></td>
                                    <td><?= $ttl_income_amt-$ttl_tx_charge;?></a></td>
                                    <td><?= round($this->wallet->paid_earning($user_id,'payout'),2);?> </a></td>
                                    <td><?= round($this->wallet->balance($user_id,'main_wallet'),2);?></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              </div>
          
                       
 <div class="card card-body">
     <form action="" method="get">
             <div class="form-inline1">
                 
                <!--<div class="form-group m-1">                      
                    <input type="text" Placeholder="Enter Tx User" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />                       
                 </div>-->
                <!-- <div class="form-group ">                      
                    <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />                      
                 </div>-->
                 
                                     
                   <select name="source" class="" id="">
                    <option value="">Select Income</option>
                    <?php
                    

                    if($all_incomes){
                        foreach($all_incomes as $income){  
                        ?>
                       
                        <option value='<?= $income->slug;?>'<?= isset($_REQUEST['source']) && $_REQUEST['source']==$income->slug ? 'selected':'';?> ><?= $income->name;?></option>
                        <?php
                        }
                    }
                    ?>                
                    
                   </select>                      
                
               

                 
                 <input type="submit" name="submit" class="" value="filter" />
                <a href="<?= $panel_path.'income';?>" class=""> <input type="submit" name="submit" class="" value="Reset" /></a>
            </div>
        </form>                
          </div> 
  <div class="card card-body card-bg-1">        
<div class="table-responsive">
    <table class="<?= $this->conn->setting('table_classes'); ?>">
        <thead>
            <tr>
                
                <th>S No.</th>
                <th>Tx user</th>
                 <?php   $show_inc=$_REQUEST['income'];
                        if($show_inc=="royality"){
                ?>
                 <th>Business Volumn</th>
                 <th>Per</th>
                 
                <?php } ?>
                  <?php   $show_inc=$_REQUEST['income'];
                        if($show_inc=="level" || $show_inc=="repurchase"){
                ?> 
                  <th>Level</th>
                <?php } ?>
                <th>Amount (<?= $this->conn->company_info('currency');?>)</th>
                <th>TDS (5%) (<?= $this->conn->company_info('currency');?>)</th>
                <th>Payable (<?= $this->conn->company_info('currency');?>)</th>
                <th>Remark</th>
                <th>Date </th>
                 
            </tr>
        </thead>
        <tbody>
            <?php

        if($table_data){
            
            foreach($table_data as $t_data){               

                    if($t_data['tx_u_code']!=''){
                        $tx_profile=$this->profile->profile_info($t_data['tx_u_code']);
                    }else{
                        $tx_profile=$this->profile->profile_info($t_data['u_code']);
                    }
            $sr_no++;            
            ?>
            <tr>
                <td><?= $sr_no;?></td>
                <td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
                 <?php  
                         if($show_inc=="royality"){
                ?>
                <td><?= $t_data['user_prsnt'];?></td> 
                  <td><?= $t_data['distribute_per'];?>%</td>                               
                
                <?php } ?>
                 <?php   
                        if($show_inc=="level" || $show_inc=="repurchase"){
                ?>
                  <td><?= $t_data['tx_record'];?></td>                               
               
                <?php } ?>                              
                <td><?= $t_data['amount'];?></td>                               
                <td><?= $t_data['tx_charge'];?></td>                               
                 <td><?= $t_data['amount']-$t_data['tx_charge'];?></td>
                <td><small><?= $t_data['remark'];?></small></td>                                
                <td><?= $t_data['date'];?></td>                                
                           
            </tr>
            <?php
            }
        }
            ?>
            
        </tbody>
    </table>
</div>
</div>


    <?php 
    
    echo $this->pagination->create_links();?>
        
    </div>
</div>
</center>

