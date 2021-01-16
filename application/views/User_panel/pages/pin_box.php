
<?php  $profile=$this->session->userdata("profile"); ?>
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

            // $likecondition=($this->session->userdata($search_string) ? $this->session->userdata($search_string):array());
             
             ?>
             
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card card-body">
        <form action="<?= $panel_path.'pin/pin-box';?>" method="get">
             <div class="form-inline1">
                
                                      
                   <select name="use_status" class="" id="">
                    <option value="">Select Type</option>
                        <option value='0' <?= isset($_REQUEST['use_status']) && $_REQUEST['use_status']=='0' ? 'selected':'';?> >Unused</option>
                        <option value='1' <?= isset($_REQUEST['use_status']) && $_REQUEST['use_status']=='1' ? 'selected':'';?> >Used</option>
                   </select>                      
                 
                 <input type="submit" name="submit" class="" value="filter" />
                <a href="<?=$panel_path.'pin/pin-box';?>" class=""><input type="submit" name="submit" class="" value="Reset" /></a>
            </div>
        </form> 
        </div>
  <div class="card card-body card-bg-1">      
<div class="table-responsive">
    <table class="<?= $this->conn->setting('table_classes'); ?>">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Pin</th> 
                <th>Use In</th>                
                <th>Pin Type</th>
                <th>Use for</th>
                <th>Date&Time</th>
                 
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
                         <?php    
                        }else{
                         echo ($tx_profile ? $tx_profile->username:'');
                          } ?>
                </td>               
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
</div>