<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Retrieved History</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Pin</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Pin History</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Pin Retrieved History</h6>
<hr>
<?php
if($this->session->has_userdata($search_parameter)){
	$get_data=$this->session->userdata($search_parameter);
	$likecondition = (array_key_exists($search_string,$get_data) ? $get_data[$search_string]:array());
	 
}else{
	$likecondition=array();
}
            
           
             ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="<?= $admin_path.'pin/pin_retreive_detail';?>" method="post">
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

                 
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
                 <input type="submit" name="reset" class="btn btn-sm" value="Reset" />
            </div>
        </form>
<br>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                
                <th>Sr</th>
                <th>Retrieve User Id</th>
                <th>Retrieve Name</th>
                <th>No of Pins</th>                
                <!--<th>Pin Type</th>
                <th>Credit/Debit</th>
                <th>Remark</th>-->
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php

        if($table_data){
            foreach($table_data as $t_data){
                $sr_no++;
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

            ?>
            <tr>
                <td><?= $sr_no;?></td>
                 <td><?= ($tx_profile ? $tx_profile->username:'');?></td>
                <td><?= ($tx_profile ? $tx_profile->name:'');?></td>                
                <td><?= $no_of_pins;?></td>                               
               <!-- <td><?= $t_data['pin_type'];?></td>               
                <td><?= $t_data['tx_type'];?></td>               
                <td><?= $t_data['remark'];?></td>    -->           
                <td><?= $t_data['added_on'];?></td>               
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
