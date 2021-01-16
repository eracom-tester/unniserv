
<?php  $profile=$this->session->userdata("profile"); ?>
<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Pin</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Pin Box</li>
         </ol>
	   </div>
	 
</div>

<?php

             $likecondition=($this->session->userdata($search_string) ? $this->session->userdata($search_string):array());
             
             ?>
			 
             <div class="card card-body card-bg-1">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="<?= $panel_path.'pin/pin-box'?>" method="post">
             <div class="form-inline">
                 <div class="form-group">                      
                    <input type="text" Placeholder="Remark" name="<?= $search_string;?>[pin]" class="form-control" value='<?= (array_key_exists("pin", $likecondition) ? $likecondition['pin']:'');?>'>                       
                 </div>
                 <div class="form-group">                      
                   <select name="<?= $search_string;?>[use_status]" class="form-control" id="">
                    <option value="">Select Type</option>
                    <option value="0" <?= (array_key_exists("use_status", $likecondition) && $likecondition['use_status']=='0' ? 'selected':'');?> >Unused</option>
                    <option value="1" <?= (array_key_exists("use_status", $likecondition) && $likecondition['use_status']=='1' ? 'selected':'');?>>Used</option>
                   </select>                      
                 </div>

                 
                 <input type="submit" name="submit" class="btn btn-primary m-1 btn-sm" value="filter" />
            </div>
        </form>
<div class="table-responsive">
    <table class="<?= $this->conn->setting('table_classes'); ?>">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Pin</th>              
                <th>Use In</th>                
                <th>Pin Type</th>
                <th>Use for</th>
                 
            </tr>
        </thead>
        <tbody>
            <?php

        if($table_data){
            foreach($table_data as $t_data){

                $tx_profile=$this->profile->profile_info($t_data['usefor']);

                   
                    $sr_no++;
            ?>
            <tr>
                <td><?=  $sr_no;?></td>
                <td><?= $t_data['pin'];?></td>
                <td><?= $t_data['used_in'];?></td>   
                <td><?= $t_data['pin_type'];?></td>  
                <td>
                    <?php if($t_data['use_status']==0){ ?>
                     <a class="btn btn-success" href="<?php echo base_url('register?ref='.$profile->username)."&pin=".$t_data['pin']; ?>" target="_blank">New Account</a>
                         <?php    
                        }else{
                         echo ($tx_profile ? $tx_profile->name:'');
                          } ?>
                </td>               
                            
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
