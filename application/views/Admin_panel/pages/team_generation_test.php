<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Generation Team</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Generation Team</a></li>            
           
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Generation Team</h6>
<hr>

<div class="col-sm-8">
		   
		    <ol class="breadcrumb">
           
            <li class="breadcrumb-item active" aria-current="page">  
            <?php
            
            $my_id=1;//$this->session->userdata('user_id');
            
            
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
                        <a href="<?= $admin_path.'team/team-generation?selected_user='.$sponsor;?>"><i class="fa fa-reply" aria-hidden="true"></i></a> /
                    <?php
                    }
                ?>
                
                <a href="<?= $admin_path.'team/team-generation?selected_user='.$my_id;?>">My team </a>/
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
<?php
    if($this->session->has_userdata($search_parameter)){
    	$get_data=$this->session->userdata($search_parameter);
    	$likecondition = (array_key_exists($search_string,$get_data) ? $get_data[$search_string]:array());
    	 
    }else{
    	$likecondition=array();
    }
    $txs_type_array=json_decode($this->conn->setting('transaction_types'));

    ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <form action="<?= $admin_path.'team/team-generation';?>" method="get">
             <div class="form-inline">
                 <div class="form-group m-1">                      
                    <input type="text" Placeholder="Enter Name" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />                       
                 </div>
                 <div class="form-group ">                      
                    <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />                      
                 </div>
                <!-- <div class="form-group">                      
                   <select name="debit_credit" class="form-control" id="">
                    <option value="">Select Credit/Debit</option>
                    <option value="credit" <?= isset($_REQUEST['debit_credit']) && $_REQUEST['debit_credit']=='credit' ? 'selected':'';?> >Credit</option>
                    <option value="debit" <?= isset($_REQUEST['debit_credit']) && $_REQUEST['debit_credit']=='debit' ? 'selected':'';?>>Debit</option>
                   </select>                      
                 </div>
                 <div class="form-group m-1">
                    
                    <select class="form-control" name="source" id="">
                        <option value="">Select Type</option>
                         <?php
                    foreach($txs_type_array as $txs_type_key=>$txs_type_value){
                        ?>
                        <option value='<?= $txs_type_key;?>' <?= isset($_REQUEST['source']) && $_REQUEST['source']==$txs_type_key ? 'selected':'';?> ><?= $txs_type_value;?></option>
                       <?php
                    }
                       
                       ?>
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
                 -->
                  <div class="form-group m-1">
                   <select class="form-control" name="selected_level" id="">
                                 
                                 <?php
                                 for($l=1;$l<=20;$l++){
                                    ?><option value="<?= $l;?>" <?= (isset($_REQUEST['selected_level']) && $_REQUEST['selected_level']==$l ? 'selected':'');?> > Level <?= $l;?></option><?php
                                 }
                                 ?>
                               </select>
                               </div>
                  
                 <input type="submit" name="submit" class="btn btn-sm " value="filter" />
                 <a href="<?= $admin_path.'team/team-generation';?>" class="btn btn-sm m-1" > Reset </a>
                 <!--<input type="submit" name="export_to_excel" class="btn btn-sm m-1" value="Export to excel" />-->
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
   
       


<div class="table-responsive">
   <table class="<?= $this->conn->setting('table_classes'); ?>">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>                
                            <th>Mobile</th>                
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
                            <td><a href="<?= $admin_path.'team/team-generation?selected_user='.$t_data['id'];?>"><em class="fa fa-sitemap" ></em></a></td>
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
    
    echo $this->pagination->create_links();?>
    </div>
</div>
