<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Franchise</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Franchise</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> All Franchise Users</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<?php
 $ttl_records=$this->conn->runQuery('COUNT(id) as total','franchise_users','1=1')[0]->total;

?>
<h6 class="text-uppercase"> All Franchise Users(<?= $ttl_records?>)</h6>
<hr>
<?php

$likecondition=($this->session->userdata($search_string) ? $this->session->userdata($search_string):array());
//print_R($likecondition);
             
             ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="<?= $admin_path.'/franchise/users';?>" method="get">
             <div class="form-inline">
                 <div class="form-group"> 
                    <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />
                 </div> 
                  <div class="form-group"> 
                    <input type="text" Placeholder="Enter Name" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />      
                                          
                 </div>
                 <div class="form-group">
                     <input type="text" Placeholder="Enter Franchise name" name="franchise_name" class="form-control" value='<?= isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!='' ? $_REQUEST['franchise_name']:'';?>' />                                   
                   
                 </div>
                 <div class="form-group">
                     <input type="text" Placeholder="Enter Mobile Number" name="mobile_number" class="form-control" value='<?= isset($_REQUEST['mobile_number']) && $_REQUEST['mobile_number']!='' ? $_REQUEST['mobile_number']:'';?>' />                                   
                   
                 </div>
                 <!-- <div class="form-group">
                     <input type="text" Placeholder="Enter State" name="state" class="form-control" value='<?= isset($_REQUEST['state']) && $_REQUEST['state']!='' ? $_REQUEST['state']:'';?>' />                                   
                   
                 </div>-->
                 <div class="form-group">
                    <input type="text" Placeholder="Enter City" name="city" class="form-control" value='<?= isset($_REQUEST['city']) && $_REQUEST['city']!='' ? $_REQUEST['city']:'';?>' />                                   
                   
                 </div>
                 <div class="form-group">
                     <input type="text" Placeholder="Enter Pin Code" name="pin_code" class="form-control" value='<?= isset($_REQUEST['pin_code']) && $_REQUEST['pin_code']!='' ? $_REQUEST['pin_code']:'';?>' />                                   
                   
                 </div>
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
                <a href="<?= $admin_path.'/franchise/users';?>" class="btn btn-sm">Reset</a>
            </div>
        </form>
        <br>
    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                
                <th>ID</th>
                <th>Action</th> 
                <th>Username</th>
                <th>Full Name</th>
                <th>Franchise Name</th>
                <th>Mobile Number</th>
                <th>State</th>
                <th>City</th>
                <th>Pin Code</th>
                <th>Joning Date</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php
            
          // $this->my_web->all_users_account();
         
            if($table_data){            
            foreach($table_data as $t_data){
                
                 $pre_pins=$this->pin->user_pins_by_type($t_data['id'],'silver');
                    
                    $cnt_pre_pins = ($pre_pins ? count($pre_pins):0);
                
            ?>
            <tr>
                <td>#<?= $t_data['id'];?></td>
              <td><a class="btn btn-warning btn-sm" href="<?= $admin_path.'franchise/edit?id='.$t_data['id'];?>"><i class="fa fa-edit"></i> </a>
                <a class="btn btn-info btn-sm" href="<?= $admin_path.'franchise/login?user='.$t_data['id'];?>" target="_blank">Login </a>
            </td>
            <td><?= $t_data['username'];?></td>
                <td><?= $t_data['name'];?></td>
                
                <td><?= $t_data['franchise_name'];?></td>
                <td><?= $t_data['mobile'];?></td> 
                <td><?= $t_data['state'];?></td> 
                <td><?= $t_data['city'];?></td>   
                <td><?= $t_data['pin_code'];?></td> 
                
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
    echo '<br>';
    echo $this->pagination->create_links();?>
    </div>
</div>
