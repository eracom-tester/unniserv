
<?php
$profile=$this->session->userdata("profile");

$user_id=$this->session->userdata('user_id');


$plan=$this->conn->runQuery("*",'plan',"1=1");
                $my_single_leg =  $this->team->my_single_leg($user_id);
                $my_active_single_leg =  $this->team->my_active_single_leg($user_id);
                $my_actives =  $this->team->my_actives($user_id);
                $my_generation1 =  $this->team->my_generation($user_id);
                $all_active =  $this->team->actives();
                $count_my_total_gen=(!empty($my_generation1) ? count($my_generation1):0);
                $my_generation=(!empty($all_active) && !empty($my_generation1) ? array_intersect($all_active,$my_generation1):array());


                $count_my_single_leg=!empty($my_single_leg) ? count($my_single_leg):0;
                $count_my_active_single_leg=!empty($my_active_single_leg) ? count($my_active_single_leg):0;
                $count_my_actives=!empty($my_actives) ? count($my_actives):0;
                $count_my_gen=!empty($my_generation) ? count($my_generation):0;
                
                
                
$total_directsarr=$this->team->directs($user_id);
$cnt_total_direct=(!empty($total_directsarr) ? count($total_directsarr):0);
$this->update_ob->update_wallet($user_id,'total_directs',$cnt_total_direct);
$this->update_ob->update_wallet($user_id,'active_directs',$count_my_actives);
$this->update_ob->update_wallet($user_id,'my_gen',$count_my_total_gen);
$this->update_ob->update_wallet($user_id,'active_gen',$count_my_gen);
$this->update_ob->update_wallet($user_id,'single_leg_team',$count_my_single_leg);
$this->update_ob->update_wallet($user_id,'active_single_leg',$count_my_active_single_leg);

$dashboard_section=$this->conn->runQuery("value,slug"," wallets ","u_code='$user_id' and status='1'");
$wallet_details=($dashboard_section ? array_column($dashboard_section,'value','slug'):array());

?>

      
            <!-- main header -->
			
                        <!-- Content Header (Page header) -->
                        <marquee class="grid_2"><?php echo $this->conn->company_info('news');?> </marquee>
                         
						
                    <!-- <div class="col-md-4 ">
						    <div class="col-sm-12 col-md-12" >
                                <div class="card" >
                                    <div class="card-header grid_3" >
                                        <div class="card-header-menu">
                                          
									        <a href="editprofile.php" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="card-header-headshot"></div>
                                    </div>
                                    <div class="card-content" >
                                        
                                        <div class="table-responsive" >
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr><th>Userid: </th><th><?=  $profile->username;?></th></tr>
                                                    
                                                    
                                                    <tr><th>Mobile: </th><th><?= $profile->mobile;?></th></tr>
                                                    <tr><th>Email: </th><th><?= $profile->email;?></th></tr>
                                                    <tr><th>Joining Date: </th><th><?= $profile->added_on;?></th></tr>
                                                    <tr><th>Activation Date: </th><th><?= $profile->active_date;?></th></tr>
                                                   
                                                     
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                    </div> -->
                    <div class="col-md-12">
                        
                        <div class="separator"><center><Strong>Dashboard</Strong></center></div>
                        <div class="row">
                            <?php
                            
                            $wallets=$this->conn->runQuery("slug,name",'wallet_types',"wallet_type='wallet' and  status='1'");
                            if($wallets){

                           
                            foreach($wallets as $wallet){  
                                $slug =  $wallet->slug;
                                ?>
                            
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <!-- statistic box -->
    								
                                    <div  class="grid_1 statistic-box">
                                        <h2><span class="count-number"> <?= $this->wallet->balance($user_id,$slug); ?></span>  </h2><Br>
                                        <div class="small"><?= $wallet->name; ?>(<?= $this->conn->company_info('currency');?>)</div>
                                        <i class="fa fa-inr statistic_icon count-number"></i>
                                        <div class="sparkline1 text-center"></div>
                                    </div> <!-- /. statistic box -->
                                </div>
    								  <?php 
    								  
                                      } 
                            } 

                            $incomes=$this->conn->runQuery("slug,name",'wallet_types',"wallet_type='income' and  status='1'");
                            if($incomes){

                           
                            foreach($incomes as $income){  
                                $slug =  $income->slug;
                                ?>
                            
                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <!-- statistic box -->
    								
                                    <div  class="grid_1 statistic-box">
                                        <h2><span class="count-number"> <?= $this->wallet->balance($user_id,$slug); ?></span>  </h2><Br>
                                        <div class="small"><?= $income->name; ?>(<?= $this->conn->company_info('currency');?>)</div>
                                        <i class="fa fa-inr statistic_icon count-number"></i>
                                        <div class="sparkline1 text-center"></div>
                                    </div> <!-- /. statistic box -->
                                </div>
    								  <?php 
    								  
                                      } 
                            }?>
                        
    						 
				    	
					
                    
                            
                        
                            <?php
                            $website_settings=$this->conn->plan_setting("dashboard");    
                            if($website_settings){

                                $dashboard_section=json_decode($website_settings);
                                if(!empty($dashboard_section)){
                                    foreach ($dashboard_section as $ky=>$sections) {
                                            ?>
                                           <!--  <div class="separator"><center><Strong><?= $ky;?></Strong></center></div> 
                                            <div class="row">-->

                                                <?php  foreach($sections as $key=>$section){  ?>
                                                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div  class="grid_1 statistic-box statistic-filled-5">
                                                        <h2><span class="count-number"> <?= (array_key_exists($slug,$wallet_details) ? $wallet_details[$slug]:0); ?></span><span class="slight">  </span></h2><Br>
                                                        <div class="small"><?= $section;?></div>
                                                        <i class="fa fa-users statistic_icon"></i>
                                                        <div class="sparkline1 text-center"></div>
                                                    </div>
                                                  </div> 
                                                <?php
                                        }
                                        ?>       
                                           <!--  </div> -->
                                            <?php
                                    }
                                }
                            }
                            ?> 

</div>

    					
        					
                        <!--   ////////////////////////////================= single leg team section =====================////////////////////-->
                         
        					
        					 
							
                        </div>
                        <div class="col-md-12 ">
						    <div class="input-group grid_2">
						        <span class="input-group-addon">Referral link </span>
                                <input type="text" id="referral_link_right" class="form-control" value="<?php echo $right_link=base_url('register?ref='.$profile->username);?>">
                                <div class="input-group-btn" >
                                    <button type="submit" class="btn btn-default"  onclick="copyLink('right')">
                                        <i class="fa fa-copy" style="color: #D3B916; font-size: 18px;"></i>
                                    </button>
                                    <a href="<?php echo $right_link; ?>" target="_blank" class="btn btn-default">
                                            <i class="fa fa-link" style="color: #1686D3; font-size: 18px;"></i>
                                    </a>
                                    <a class="btn btn-default" href="whatsapp://send?text=<?php echo $right_link; ?>" target="_blank"  data-action="share/whatsapp/share">
                                        <i class="fa fa-whatsapp" style="color: green; font-size: 18px;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12   ">
        <h4>Goals</h4>
        <div class="table-responsive" >
            <table class="table  ">
                <tr>
                    <th>Rank Name</th>
                    <th>Single Leg</th>
                    <th>Direct</th>
                    <th>Generation</th>
                    <th>Status</th>
                </tr>
                <?php

$r_name='';
                

                $my_actives_req=0;
                $my_pre_level_req=0;
                for($p=0;$p<10;$p++){


                    $single_leg_req=$plan[$p]->single_leg_required;
                    $my_gen_required=$plan[$p]->gen_required;
                    $my_actives_req +=$plan[$p]->direct_required;
                   
                    
                    if($count_my_actives>$my_actives_req){
                        $shw_dir=$plan[$p]->direct_required;
                    }else{
                        $rest=$count_my_actives-$my_pre_level_req;
                        if($rest>0){
                            $shw_dir=$rest;
                        }else{
                            $shw_dir=0;
                        }
                    }
$goalstatus=($profile->active_status==1 && $count_my_single_leg>=$single_leg_req && $count_my_actives>=$my_actives_req && $count_my_gen>=$my_gen_required ? 'Achieved':'Pending');

                    ?>
                    <tr <?php if($goalstatus=="Achieved"){
                        $r_name=$plan[$p]->package_name;

                        $check_rank_=$this->conn->runQuery('u_code','rank',"rank_id='$p' and u_code='$user_id' and rank='$r_name'");
                        if(!$check_rank_){
                            $rankinsert['u_code']=$user_id;
                            $rankinsert['rank']=$r_name;
                            $rankinsert['rank_id']=$p;
                            if($this->db->insert('rank',$rankinsert)){
                                $update_rank['my_rank']=$r_name;
                                $this->db->where('id',$user_id);
                                $this->db->update('users',$update_rank);
                            }
                        }

                        ?>class="panel panel-success border-class alert alert-success" <?php } ?> >
                        <td><?= $plan[$p]->package_name;?></td>
                        <td><?= ($count_my_single_leg>=$single_leg_req ? $single_leg_req:$count_my_single_leg);?>/<?= $plan[$p]->single_leg_required;?></td>
                        <td><?= $shw_dir;?>/+<?= $plan[$p]->direct_required;?></td>
                        <td><?= ($count_my_gen>=$my_gen_required ? $my_gen_required:$count_my_gen);?>/<?= $plan[$p]->gen_required;?></td>
                        
                        <td><?= $goalstatus;?></td>
                        
                    </tr>
                    <?php
                     $my_pre_level_req +=$plan[$p]->direct_required;
                }
                ?>
            </table>
        </div>
    </div>
</div>
	
                        
						
						
						
                
            
         
       
            	 
   