<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> History</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Pin</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Pin History</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Pin History</h6>
<hr>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="<?= $admin_path.'pin/pin-history';?>" method="post">
             <div class="form-inline">
                 <div class="form-group m-1">                      
                    <input type="text" Placeholder="Enter Name" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />                       
                 </div>
                 <div class="form-group ">                      
                    <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />                      
                 </div>
                 <div class="form-group">                      
                   <select name="pin_type" class="form-control" id="">
                    <option value="">Select pin</option>
                        <option value='silver' <?= isset($_REQUEST['pin_type']) && $_REQUEST['pin_type']=='silver' ? 'selected':'';?> >silver</option>
                        <option value='gold' <?= isset($_REQUEST['pin_type']) && $_REQUEST['pin_type']=='gold' ? 'selected':'';?> >gold</option>
                   </select>                      
                 </div>
                  
                 <div class="form-group">                      
                   <select name="tx_type" class="form-control" id="">
                    <option value="">Select Credit/Debit</option>
                        <option value='credit' <?= isset($_REQUEST['tx_type']) && $_REQUEST['tx_type']=='credit' ? 'selected':'';?> >Credit</option>
                        <option value='debit' <?= isset($_REQUEST['tx_type']) && $_REQUEST['tx_type']=='debit' ? 'selected':'';?> >debit</option>
                   </select>                      
                 </div>
                   <div id="dateragne-picker">
                    <div class="input-daterange input-group">
                    <input type="text" class="form-control"  Placeholder="From"  name="start_date" value="<?= (isset($_REQUEST['start_date']) ? $_REQUEST['start_date']:''); ?>"/>
                    <div class="input-group-prepend">
                    <span class="input-group-text">to</span>
                    </div>
                    <input type="text" class="form-control"  Placeholder="End date"  name="end_date" value="<?= (isset($_REQUEST['end_date']) ? $_REQUEST['end_date']:''); ?>" />
                    </div>
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
                
                <th>S No.</th>                
                <th>Tx user</th>  
                <th>Username</th>   
                <th>No of Pins</th>                
                <th>Pin Type</th>
                <th>Credit/Debit</th>
                <th>Remark</th>
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
                <td><?= ($tx_profile ? $tx_profile->name:'');?></td> 
                <td><?=$tx_profile->username;?></td>
                <td><?= $no_of_pins;?></td>                               
                <td><?= $t_data['pin_type'];?></td>               
                <td><?= $t_data['tx_type'];?></td>               
                <td><?= $t_data['remark'];?></td>               
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
