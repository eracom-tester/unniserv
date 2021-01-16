<div class="content-wrapper">
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		  
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Team</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Single Leg Team</li>
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
        <form action="<?= $panel_path.'team/team-single-leg'?>" method="post">
             <div class="form-inline">
                 <div class="form-group">                      
                    <input type="text" Placeholder="Enter Name" name="<?= $search_string;?>[name]" class="form-control" value='<?= (array_key_exists("name", $likecondition) ? $likecondition['name']:'');?>'>                       
                 </div>
                 <div class="form-group">                      
                    <input type="text" Placeholder="Enter Username" name="<?= $search_string;?>[username]" class="form-control" value='<?= (array_key_exists("username", $likecondition) ? $likecondition['username']:'');?>'>                   
                 </div>
                 <input type="submit" name="submit" class="btn btn-primary m-1 btn-sm" value="filter" />
				 <input type="submit" name="reset" class="btn btn-primary btn-sm" value="Reset" />
            </div>
        </form>

<div class="table-responsive">
    <table class="<?= $this->conn->setting('table_classes'); ?>">
        <thead>
            <tr>
                
                <th>S No.</th>
                <th>Name</th>
                <th>Username</th>
                <!--<th>Email</th> -->               
                <!--<th>Join Date</th>-->
                <th>Active Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
        if($table_data){
            foreach($table_data as $t_data){

                $sr_no++;
            ?>
            <tr>
                <td><?= $sr_no;?></td>
                <td><?= $t_data['name'];?></td>
                <td><?= $t_data['username'];?></td>
                <!--<td><?= $t_data['email'];?></td>-->                               
                <!--<td><?= $t_data['added_on'];?></td>-->               
                <td><?php
                if($t_data['active_status']==1){
                    echo "Active<br>";
                    echo $t_data['active_date'];
                }else{
                    echo "Inactive";
                }
                ?></td>               
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
