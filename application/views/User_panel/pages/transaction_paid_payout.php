<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Paid Payout</a></li>
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
                            <input type="text" Placeholder="Remark" name="<?= $search_string;?>[remark]" class="form-control" value='<?= (array_key_exists("remark", $likecondition) ? $likecondition['remark']:'');?>'>                       
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
                        <th>Tx user</th>
                        
                        <th>Credit / Debit</th>                
                        <th>Amount (<?= $this->conn->company_info('currency');?>)</th>
                       
                      
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
                    
                    $tx_type=$t_data['tx_type'];
                    ?>
                    <tr>
                        <td><?= $sr_no;?></td>
                        <td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
                        
                        <td><?= $t_data['debit_credit'];?></td>                               
                        <td><?= $t_data['amount'];?></td>                               
                                                   
                        
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
        
        
            <?php 
            
            echo $this->pagination->create_links();?>
            </div>
        </div>
</div>
