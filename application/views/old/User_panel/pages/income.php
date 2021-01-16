<div class="content-wrapper">

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
        
          
        <p>
            <strong>Total Income :</strong><?= array_sum($ttl_income);?>
                            </p>

        <form action="<?= $panel_path.'income'?>" method="post">
             <div class="form-inline">
                <div class="form-group">                      
                    <input type="text" Placeholder="Remark" name="<?= $search_string;?>[remark]" class="form-control" value='<?= (array_key_exists("remark", $likecondition) ? $likecondition['remark']:'');?>'>                       
                 </div>
                 
                 <div class="form-group">                      
                   <select name="<?= $search_string;?>[source]" class="form-control" id="">
                    <option value="">Select Income</option>
                    <?php
                    

                    if($all_incomes){
                        foreach($all_incomes as $income){  
                        ?>
                        <option value="<?= $income->slug;?>" <?= (array_key_exists("source", $likecondition) && $likecondition['source']==$income->slug ? 'selected':'');?> ><?= $income->name;?></option>
                        <?php
                        }
                    }
                    ?>                
                    
                   </select>                      
                 </div>

                 
                 <input type="submit" name="submit" class="btn btn-primary btn-sm m-1" value="filter" />
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
                
                             
                <th>Amount (<?= $this->conn->company_info('currency');?>)</th>
                <th>Deduction (<?= $this->conn->company_info('currency');?>)</th>
                
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
                
                                               
                <td><?= $t_data['amount'];?></td>                               
                <td><?= $t_data['tx_charge'];?></td>                               
                
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
</div>
</center>

