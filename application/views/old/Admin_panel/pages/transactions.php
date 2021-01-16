<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Transactions</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Transactions</a></li>            
           
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Transactions</h6>
<hr>
<?php
if($this->session->has_userdata($search_parameter)){
	$get_data=$this->session->userdata($search_parameter);
	$likecondition = (array_key_exists($search_string,$get_data) ? $get_data[$search_string]:array());
	 
}else{
	$likecondition=array();
}
$txs_type_array=json_decode($this->conn->setting('transaction_types'));


             ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="<?= $admin_path.'transactions';?>" method="post">
             <div class="form-inline">
                <div class="form-group">                      
                    <input type="text" Placeholder="Remark" name="<?= $search_string;?>[remark]" class="form-control" value='<?= (array_key_exists("remark", $likecondition) ? $likecondition['remark']:'');?>'>                       
                 </div>
                 <div class="form-group">                      
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
                 </div>

                 
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
                 <input type="submit" name="reset" class="btn btn-sm" value="Reset" />
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
       
<br>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tx user</th>
                <th>From user</th>
                
                <th>Credit / Debit</th>                
                <th>Amount</th>
                <th>Tx Charge</th>
                <th>Txn Type</th>
                <th>Remark</th>
                <th>Date </th>
                 
            </tr>
        </thead>
        <tbody>
            <?php

        if($table_data){
            
            foreach($table_data as $t_data){               

                   // if($t_data['tx_u_code']!=''){
                        $tx_profile_from=$this->profile->profile_info($t_data['tx_u_code']);
                    //}else{
                        $tx_profile=$this->profile->profile_info($t_data['u_code']);
                   // }
                    $tx_type=$t_data['tx_type'];
            ?>
            <tr>
                <td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
                <td><?php  if($tx_profile_from){ echo $tx_profile_from->name.'( '.$tx_profile_from->username.' )'; }?></td>
                
                <td><?= $t_data['debit_credit'];?></td>                               
                <td><?= $t_data['amount'];?></td> 
                <td><?= $t_data['tx_charge'];?></td> 
                <td><?= $txs_type_array->$tx_type;?></td>   
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
