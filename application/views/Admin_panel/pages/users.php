<?php
 $ttl_records=$this->conn->runQuery('COUNT(id) as total','users','1=1')[0]->total;

?>


<div class="row pt-3 bg-default">
        <div class="col-sm-10">
		  <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">users</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> All Users</li>
         </ol>
	   </div>
	   <div class="col-sm-2">
       
     </div>
</div>
 
 
<?php
    /*if($this->session->has_userdata($search_parameter)){
    	$get_data=$this->session->userdata($search_parameter);
    	$likecondition = (array_key_exists($search_string,$get_data) ? $get_data[$search_string]:array());
    	 
    }else{
    	$likecondition=array();
    }*/
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card card-body">
            
               <form action="<?= $admin_path.'users';?>" method="post">
                     <div class="form-inline1">
                                             
                            <input type="text" Placeholder="Enter Name" name="name" class=" " value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />
                            <input type="text" Placeholder="Enter Username" name="username" class=" " value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />
                            <input type="text" Placeholder="Enter Email" name="email" class=" " value='<?= isset($_REQUEST['email']) && $_REQUEST['email']!='' ? $_REQUEST['email']:'';?>'>
                            <input type="text" Placeholder="Enter Sponsor" name="sponsor" class=" " value='<?= isset($_REQUEST['sponsor']) && $_REQUEST['sponsor']!='' ? $_REQUEST['sponsor']:'';?>'>
                            <input type="text" Placeholder="Enter Mobile" name="mobile" class=" " value='<?= isset($_REQUEST['mobile']) && $_REQUEST['mobile']!='' ? $_REQUEST['mobile']:'';?>'>
                            <select class=" " name="active_status" id="">
                                <option value="">Select Status</option>
                                <option value='1' <?= isset($_REQUEST['active_status']) && $_REQUEST['active_status']=='1' ? 'selected':'';?> >Active</option>
                                <option value='0' <?= isset($_REQUEST['active_status']) && $_REQUEST['active_status']=='0' ? 'selected':'';?> >Inactive</option>
                            </select>
                          
                        <!-- <?php
                             $ttl_pages=ceil($total_rows/$limit);
                             if($ttl_pages>1){  
                            ?>
                            <div class="form-group m-1 ">                      
                                <input type="text" list="pages" class="form-control" name="page" value="<?= (isset($_REQUEST['page']) ? $_REQUEST['page']:'1');?>" /> 
                                 <datalist id="pages">
                                     <?php
                                         for($pg=1;$pg<=$ttl_pages;$pg++){
                                             ?><option value="<?= $pg;?>" ><?= $pg;?></option><?php
                                         }
                                     ?>
                                </datalist>
                            </div>
                         <?php 
                         } ?>-->
                         <input type="submit" name="submit" class="  " value="filter" />
                         <input type="submit" name="reset" class="  " value="Reset" />
                         <input type="submit" name="export_to_excel" class=" " value="Export to excel" />
                    </div>
                </form>
            </div>
         
        
    <!-- <h3><button class="btn btn-primary">Total Records:
                  <?php echo $this->conn->runQuery('COUNT(id) as total','users','1=1')[0]->total;?>
              </button>
         </h3>  -->  
        
       
 
    <div class="card ">
    <div class="card-header text-right">| All Users:(<?= $ttl_records?>)</div>
        <div class="table-responsive">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        
                        <th>ID</th>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Join Date</th>
                        <!--<th>Active Status</th>-->
                        <th>Sponsor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $page='';
                    if(isset($_REQUEST['page'])){
                        $page='&page='.$_REQUEST['page'];
                    }
                    if($table_data){            
                    foreach($table_data as $t_data){
                        $sr_no++
                    ?>
                    <tr>
                        <td><?= $sr_no;?></td>
                        <td><a class="btn btn-warning btn-sm" href="<?= $admin_path.'users/edit?id='.$t_data['id'].$page;?>"><i class="fa fa-edit"></i> </a>
                        <a class="btn btn-info btn-sm" href="<?= $admin_path.'users/login?user='.$t_data['id'].$page;?>" target="_blank">Login </a>
                    </td>
                        
                        <td><?= $t_data['name'];?></td>
                        <td>
                          <?php
                        
                        if($t_data['active_status']==1){
                            echo'<i class="fa fa-circle btn-sm" style="color:green;" aria-hidden="true"></i>';
                        }else{
                            echo'<i class="fa fa-circle btn-sm" style="color:red;" aria-hidden="true"></i>';
                        }
                        ?><?= $t_data['username'];?></td>
                        <td><?= $t_data['email'];?></td>
                        <td><?= $t_data['mobile'];?></td>               
                        <td><?= $t_data['added_on'];?></td>               
                        <!--<td><?php
                        if($t_data['active_status']==1){
                            echo "Active<br>";
                            echo $t_data['active_date'];
                        }else{
                            echo "Inactive";
                        }
                        ?></td> -->
                        <td>
                            <?php
                            $sponsor_info=$this->profile->sponsor_info($t_data['id'],'username,name');
                                if($sponsor_info){
                                    echo "$sponsor_info->username ($sponsor_info->name)";
                                }
                            ?>
                        </td>
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

    <?php 
    echo $this->pagination->create_links();?>
    </div>
</div>
