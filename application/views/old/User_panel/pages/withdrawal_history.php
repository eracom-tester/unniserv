
<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Transactions</a></li>
         </ol>
	   </div>
	   
</div>
<?php
if($this->session->has_userdata($search_parameter)){
	$get_data=$this->session->userdata($search_parameter);
	$likecondition = (array_key_exists($search_string,$get_data) ? $get_data[$search_string]:array());
	 
}else{
	$likecondition=array();
}
$txs_type_array=json_decode($this->conn->setting('transaction_types'));
             ?>
    <div class="card card-body card-bg-1">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form action="<?= $panel_path.'transactions'?>" method="post">
                     <div class="form-inline">
                        <div class="form-group">                      
                            <input type="text" Placeholder="Amount" name="<?= $search_string;?>[amount]" class="form-control" value='<?= (array_key_exists("amount", $likecondition) ? $likecondition['amount']:'');?>'>                       
                         </div>
                        <!-- <div class="form-group">                      
                           <select name="<?= $search_string;?>[debit_credit]" class="form-control" id="">
                            <option value="">Select Credit/Debit</option>
                            <option value="credit" <?= (array_key_exists("debit_credit", $likecondition) && $likecondition['debit_credit']=='credit' ? 'selected':'');?> >Credit</option>
                            <option value="debit" <?= (array_key_exists("debit_credit", $likecondition) && $likecondition['debit_credit']=='debit' ? 'selected':'');?>>Debit</option>
                           </select>                      
                         </div>
                         <div class="form-group">                      
                           <select name="<?= $search_string;?>[tx_type]" class="form-control" id="">
                            <option value="">Select Type</option>
                            <?php
                            foreach($txs_type_array as $txs_type_key=>$txs_type_value){
                                ?>
                                <option value="<?= $txs_type_key;?>" <?= (array_key_exists("tx_type", $likecondition) && $likecondition['tx_type']==$txs_type_key ? 'selected':'');?> ><?= $txs_type_value;?></option>
                                <?php
                            }
                            ?>                
                            
                           </select>                      
                         </div>-->
        
                         
                         <input type="submit" name="submit" class="btn btn-primary m-1 btn-sm" value="filter" />
                         <input type="submit" name="reset" class="btn btn-primary btn-sm" value="Reset" />
                    </div>
                </form>
        <br>
        <div class="table-responsive">
            <table class="<?= $this->conn->setting('table_classes'); ?>">
                <thead>
                    <tr>
                        
                        <th>S No.</th>
                       <th>Amount (<?= $this->conn->company_info('currency');?>)</th>
                        <th>Admin Charge/TDS 15%</th> 
                        <th>Payable Amount</th>
                       <th>Request Date</th>
                        <th>Action Date</th>
                        <th>States </th>
                         
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
                            if($t_data['status']==1){
                                $st="Approved";
                            }else if($t_data['status']==0){
                                 $st="Pending";
                            }else{
                                $st="Rejected";
                            }
                            
                    $sr_no++;            
                    ?>
                    <tr>
                        <td><?= $sr_no;?></td>
                        <td><?= $t_data['amount']+$t_data['tx_charge'];?></td>
                        
                        <td><?= $t_data['tx_charge'];?></td> 
                        
                        <td><?= $t_data['amount'];?></td>                               
                          <td><?= $t_data['added_on'];?></td>                             
                          <td><?= $t_data['status']!='0' ? $t_data['date'] :'';?></td>     
                                                    
                        <td><?= $st;?></td>                                
                                   
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
</div>
</div>