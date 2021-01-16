<?php
$profile=$this->session->userdata("profile");


?>
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		  
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Profile</li>
         </ol>
	   </div>
	   
</div>

        <div class="row">
                <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-menu">                    
                                    <a href="<?= $panel_path.'profile/edit-profile';?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                </div>
                                <div class="card-header-headshot"></div>
                            </div>
                                    <div class="card-content" >
                                         
                                            <div class="table-responsive" >
                                                <table class="<?= $this->conn->setting('table_classes'); ?>">
                                                        <tbody> 
                                                            <tr><th>Sponsor: </th><th><?php
                                                            $check_existsspo=$this->conn->runQuery('id','users',"id='$profile->u_sponsor'");
                                                            if($check_existsspo){
                                                               echo $this->profile->profile_info($profile->u_sponsor)->username;
                                                            }
                                                            
                                                            ?></th></tr>
                                                            <tr><th>Userid: </th><th><?= $profile->username;?></th></tr>
                                                            <tr><th>Title: </th><th><?= $profile->title;?></th></tr>
                                                            <tr><th>Name: </th><th><?= $profile->name;?></th></tr>
                                                           
                                                            <tr><th>Mobile: </th><th><?= $profile->mobile;?></th></tr>
                                                            <tr><th>Email: </th><th><?= $profile->email;?></th></tr>
                                                            <tr><th>Joining Date: </th><th><?= $profile->added_on;?></th></tr>
                                                            <tr><th>Status: </th><th><?= $profile->active_status==1 ? 'Active':'Inactive';?></th></tr>
                                                            <tr><th>Active Date: </th><th><?= $profile->active_status==1 ? $profile->active_date:'';?></th></tr>
                                                            
                                                        </tbody>
                                                </table>
                                            </div>
                                    </div>
                            
                             </div>
                     </div>
             </div>
