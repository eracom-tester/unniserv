<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Pin Box</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Pin</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Pin Box</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Pin Box</h6>
<hr>
<?php

           //  $likecondition=($this->session->userdata($search_string) ? $this->session->userdata($search_string):array());
             
             ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="<?= $admin_path.'pin/pin-box';?>" method="get">
             <div class="form-inline">
                 <div class="form-group m-1">                      
                    <input type="text" Placeholder="Enter Name" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />                       
                 </div>
                 <div class="form-group ">                      
                    <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />                      
                 </div>
                 <!--   <div class="form-group"> 
                    <input type="text" Placeholder="Enter Usefor" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />            
                                          
                 </div>-->
                 <div class="form-group">                      
                   <select name="use_status" class="form-control" id="">
                    <option value="">Select Type</option>
                        <option value='0' <?= isset($_REQUEST['use_status']) && $_REQUEST['use_status']=='0' ? 'selected':'';?> >Unused</option>
                        <option value='1' <?= isset($_REQUEST['use_status']) && $_REQUEST['use_status']=='1' ? 'selected':'';?> >Used</option>
                   </select>                      
                 </div>
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
                <a href="<?=$admin_path.'pin/pin-box';?>" class="btn btn-sm">Reset</a>
            </div>
        </form>    
        
        
<div class="table-responsive">
    <table class="<?= $this->conn->setting('table_classes'); ?>">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Name</th>
                <th>Username</th>
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
                $u_profile=$this->profile->profile_info($t_data['u_code']);
                   
                    $sr_no++;
            ?>
            <tr>
                <td><?=  $sr_no;?></td>
                <td><?= $u_profile->name; ?></td>
                <td><?= $u_profile->username; ?></td>
                <td><?= $t_data['pin'];?></td>
                <td><?= $t_data['used_in'];?></td>   
                <td><?= $t_data['pin_type'];?></td>  
                <td>
                    <?php if($t_data['use_status']==0){ ?>
                    
                         <?php    
                        }else{
                         echo ($tx_profile ? $tx_profile->name:'');
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
