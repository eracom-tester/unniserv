<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		  
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Pin</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Pin History</li>
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
 ?>
 
 <div class="card card-body card-bg-1">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="<?= $panel_path.'pin/pin-history'?>" method="post">
             <div class="form-inline">
                 <div class="form-group">                      
                    <input type="text" Placeholder="Remark" name="<?= $search_string;?>[remark]" class="form-control" value='<?= (array_key_exists("remark", $likecondition) ? $likecondition['remark']:'');?>'>                       
                 </div>
                 <div class="form-group">                      
                   <select name="<?= $search_string;?>[tx_type]" class="form-control" id="">
                    <option value="">Select Credit/Debit</option>
                    <option value="credit" <?= (array_key_exists("tx_type", $likecondition) && $likecondition['tx_type']=='credit' ? 'selected':'');?> >Credit</option>
                    <option value="debit" <?= (array_key_exists("tx_type", $likecondition) && $likecondition['tx_type']=='debit' ? 'selected':'');?>>Debit</option>
                   </select>                      
                 </div>

                 
                 <input type="submit" name="submit" class="btn btn-primary m-1 btn-sm" value="filter" />
                 <input type="submit" name="reset" class="btn btn-primary btn-sm" value="Reset" />
            </div>
        </form>
<br>
<div class="table-responsive">
    <table class="<?= $this->conn->setting('table_classes'); ?>">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Tx user</th>
                <th>No of Pins</th>                
                <th>Pin Type</th>
                <th>Credit/Debit</th>
                <th>Balance</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php

        if($table_data){
                foreach($table_data as $t_data){
    
                    if($t_data['tx_type']=='credit'){                    
                        $no_of_pins=$t_data['credit'];
                    }else{
                        $no_of_pins=$t_data['debit'];
                    }
    
                        if($t_data['tx_user']!=''){
                            $tx_profile=$this->profile->profile_info($t_data['tx_user']);
                        }else{
                            $tx_profile=$this->profile->profile_info($t_data['user_id']);
                        }
                        $sr_no++;
                ?>
                <tr>
                    <td><?=  $sr_no;?></td>
                    <td><?= ($tx_profile ? $tx_profile->name:'');?></td>
                    
                    <td><?= $no_of_pins;?></td>                               
                    <td><?= $t_data['pin_type'];?></td>               
                    <td><?= $t_data['tx_type'];?></td>               
                    <td><?= $t_data['curr_pin'];?></td>               
                    <td><?= $t_data['remark'];?></td>               
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

