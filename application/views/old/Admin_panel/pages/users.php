<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Users</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">users</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> All Users</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> All Users</h6>
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
        <form action="<?= $admin_path.'users';?>" method="post">
             <div class="form-inline">
                 <div class="form-group m-1">                      
                    <input type="text" Placeholder="Enter Name" name="<?= $search_string;?>[name]" class="form-control" value='<?= (array_key_exists("name", $likecondition) ? $likecondition['name']:'');?>'>                       
                 </div>
                 <div class="form-group ">                      
                    <input type="text" Placeholder="Enter Username" name="<?= $search_string;?>[username]" class="form-control" value='<?= (array_key_exists("username", $likecondition) ? $likecondition['username']:'');?>'>                   
                 </div>
                 <div class="form-group m-1">                      
                    <input type="text" Placeholder="Enter Email" name="<?= $search_string;?>[email]" class="form-control" value='<?= (array_key_exists("email", $likecondition) ? $likecondition['email']:'');?>'>                   
                 </div>
                 <div class="form-group">                      
                    <input type="text" Placeholder="Enter Sponsor" name="name_search" class="form-control" value='<?= ($this->session->has_userdata($search_string.'user') ? $this->session->userdata($search_string.'user'):'');?>'>                   
                 </div>
                 <div class="form-group m-1">
                    
                   <select class="form-control" name="<?= $search_string;?>[active_status]" id="">
                     <option value="">Select Status</option>
                     <option value='1' <?= (array_key_exists("active_status", $likecondition) && $likecondition['active_status']=='1' ? 'selected':'');?> >Active</option>
                     <option value='0' <?= (array_key_exists("active_status", $likecondition) && $likecondition['active_status']=='0' ? 'selected':'');?> >Inactive</option>
                     
                   </select>
                 </div>
                 <input type="submit" name="submit" class="btn btn-sm " value="filter" />
                 <input type="submit" name="reset" class="btn btn-sm m-1" value="Reset" />
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
                
                <th>ID</th>
                <th>Action</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Join Date</th>
                <th>Active Status</th>
                <th>Sponsor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($table_data){            
            foreach($table_data as $t_data){
                $sr_no++
            ?>
            <tr>
                <td><?= $sr_no;?></td>
                <td><a class="btn btn-warning btn-sm" href="<?= $admin_path.'users/edit?id='.$t_data['id'];?>"><i class="fa fa-edit    "></i> </a>
                <a class="btn btn-info btn-sm" href="<?= $admin_path.'users/login?user='.$t_data['id'];?>" target="_blank">Login </a>
            </td>
                
                <td><?= $t_data['name'];?></td>
                <td><?= $t_data['username'];?></td>
                <td><?= $t_data['email'];?></td>
                <td><?= $t_data['mobile'];?></td>               
                <td><?= $t_data['added_on'];?></td>               
                <td><?php
                if($t_data['active_status']==1){
                    echo "Active<br>";
                    echo $t_data['active_date'];
                }else{
                    echo "Inactive";
                }
                ?></td> 
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


    <?php 
    
  
    echo '<br>';
    echo $this->pagination->create_links();?>
    </div>
</div>
