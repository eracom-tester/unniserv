<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		   
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Team</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Rankwise Team</li>
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

    $get_ranks=$this->conn->runQuery('package_name,id',"plan","1=1");
?>
    <div class="card card-body card-bg-1">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form action="<?= $panel_path.'team/team-rank-wise'?>" method="post">
                     <div class="form-inline">
                         <!--<div class="form-group">                      
                            <input type="text" Placeholder="Enter Name" name="<?= $search_string;?>[name]" class="form-control" value='<?= (array_key_exists("name", $likecondition) ? $likecondition['name']:'');?>'>                       
                         </div>
                         <div class="form-group">                      
                            <input type="text" Placeholder="Enter Username" name="<?= $search_string;?>[username]" class="form-control" value='<?= (array_key_exists("username", $likecondition) ? $likecondition['username']:'');?>'>                   
                            
                         </div>-->
                         <div class="form-group">                 
                            <select name="<?= $search_string;?>[rank_id]" class="form-control">
                                <option value=''>All Rank</option>
                                <?php foreach($get_ranks as $get_ranks){ ?>
                                    <option value="<?= $get_ranks->id-1; ?>" <?= (array_key_exists("rank_id", $likecondition) && ($get_ranks->id-1)==$likecondition['rank_id'] ? 'selected':'');?>><?= $get_ranks->package_name; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                         </div>
                         <input type="submit" name="submit" class="btn btn-primary btn-sm m-1" value="Search" />
        				 <input type="submit" name="reset" class="btn btn-primary btn-sm" value="Reset" />
                    </div>
                </form>
        <div class="table-responsive">
            <table class="<?= $this->conn->setting('table_classes'); ?>">
                <thead>
                    <tr>
                        
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Rank</th>
                        <th>Rank date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($table_data){            
                    foreach($table_data as $t_data){
                        $sr_no++;
                        $profile_info=$this->profile->profile_info($t_data['u_code'],'name,username');
                    ?>
                    <tr>
                        <td><?=  $sr_no;?></td>
                        <td><?= $profile_info->name;?></td>
                        <td><?= $profile_info->username;?></td>
                        <td><?= $t_data['rank'];?></td>
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
