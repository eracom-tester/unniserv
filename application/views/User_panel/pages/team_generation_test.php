<div class="row pt-2 pb-2">
    
        <div class="col-sm-8">
		   
		    <ol class="breadcrumb">
           
            <li class="breadcrumb-item active" aria-current="page">  
            <?php
            
            $my_id=$this->session->userdata('user_id');
            
            
            //$check_my_level_team = $this->team->my_generation($my_id);
                 
                
            if($this->session->has_userdata('selected_user')){
                $user_id=$this->session->userdata('selected_user');
            }else{
                $user_id=$my_id;
            }
            
             if($user_id!=$my_id && in_array($user_id,$check_my_level_team)){
                 $sponsor=$this->profile->sponsor($user_id);
                if($my_id!=$sponsor && in_array($sponsor,$check_my_level_team)){
                    ?>
                        <a href="<?= $panel_path.'team/team-generation?selected_user='.$sponsor;?>"><i class="fa fa-reply" aria-hidden="true"></i></a> /
                    <?php
                    }
                ?>
                
                <a href="<?= $panel_path.'team/team-generation?selected_user='.$my_id;?>">My team </a>/
                <?php
                
                
                
            }
            
            $details=$this->profile->profile_info($user_id,'name,username');
            $name=$details->name ;
            $username=$details->username ;
            echo " $name ( $username )";
            
            ?>
            
           
            
            </li>
         </ol>
         
	   </div>
        <div class="col-sm-4">
		   
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Team</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> Generation Team   
          
           
            
            </li>
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
                
                
                //print_r($_REQUEST);
             ?>
        
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-body">
                     <form action="<?= $panel_path.'team/team-generation';?>" method="get">
                         <div class="form-inline1">
                                                  
                                <input type="text" Placeholder="Enter Name" name="name" class="l" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />                       
                             
                                                   
                                <input type="text" Placeholder="Enter Username" name="username" class="" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />                      
                             
                             
                               
                               <select class="" name="selected_level" id="">
                                 
                                 <?php
                                 for($l=1;$l<=10;$l++){
                                    ?><option value="<?= $l;?>" <?= (isset($_REQUEST['selected_level']) && $_REQUEST['selected_level']==$l ? 'selected':'');?> > Level <?= $l;?></option><?php
                                 }
                                 ?>
                               </select>
                             
                             <input type="submit" name="submit" class="" value="filter" />
            				 <a href="<?= $panel_path.'team/team-generation';?>" class=""><input type="submit" name="submit" class="" value="Reset" /></a>
                        </div>
                    </form>
                    </div>
               <div class="card card-body card-bg-1">     
            <div class="table-responsive">
                <table class="<?= $this->conn->setting('table_classes'); ?>">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>                
                            <th>Join Date</th>
                            <th>Active Status</th>
                            <th>Sponsor ID(Name)</th>
                           <!-- <th>Current Business</th>
                            <th>Previous Business</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    if($table_data){
                        foreach($table_data as $t_data){
                            $sr_no++;
                            $gen_team=$this->team->my_generation_with_personal($t_data['id']);
                        ?>
                        <tr>
                            <td><?=  $sr_no;?></td>
                            <td><a href="<?= $panel_path.'team/team-generation?selected_user='.$t_data['id'];?>"><i class="fa fa-sitemap"></i></a></td>
                            <td><?= $t_data['name'];?></td>
                            <td><?= $t_data['username'];?></td>
                            <td><?= $t_data['email'];?></td>                               
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
                                $sponsor_info=$this->profile->sponsor_info($t_data['id']);
                                    if($sponsor_info){
                                        echo "$sponsor_info->username ($sponsor_info->name)";
                                    }
                                ?>
                            </td> 
                           <!-- <td><?= $t_data['active_status']==1 ? $this->business->current_session_bv($gen_team):0;?></td> 
                            <td><?= $t_data['active_status']==1 ? $this->business->previous_bv($gen_team):0;?></td> -->
                        </tr>
                        <?php
                        }
                    }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            
            
                <?php
                    echo $this->pagination->create_links();
                ?>
                </div>
            </div>
        </div>
