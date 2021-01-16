<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Support</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Support</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Approved </li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Support Approved</h6>
<hr>
<?php

             $likecondition=($this->session->userdata($search_string) ? $this->session->userdata($search_string):array());
             
             ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         
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
            <th>Ticket Id</th>
            <th>User Id</th>
            <th>Description</th>
            <th>Create Date</th>
            <th>Status</th>
            <th>Reply</th>
            </tr>
        </thead>
        <tbody>
            <?php

        if($table_data){
            foreach($table_data as $t_data){
             $sr_no++;   
            $tx_profile=$this->profile->profile_info($t_data['u_code']);
                     

            ?>
            <tr>
                <td><?= $sr_no;?></td>  
                <td><?= $t_data['ticket'];?></td>  
                <td><?= ($tx_profile ? $tx_profile->name:'');?></td>                
                                          
                             
                <td><?= $t_data['message'];?></td>               
                <td><?= $t_data['timestamp'];?></td>               
                <td><?= 'Approved';?></td>               
                <td><?= $t_data['reply'];?></td>            
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
