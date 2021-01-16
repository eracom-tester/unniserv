<?php
    $profile=$this->session->userdata("profile");

    $user_id=$this->session->userdata('user_id');


    $plan=$this->conn->runQuery("*",'plan',"1=1");
    $my_single_leg =  $this->team->my_active_single_leg($user_id);
    $my_actives =  $this->team->my_actives($user_id);
    $my_generation1 =  $this->team->my_generation($user_id);
    $all_active =  $this->team->actives();
    $count_my_total_gen=(!empty($my_generation1) ? count($my_generation1):0);
    $my_generation=(!empty($all_active) && !empty($my_generation1) ? array_intersect($all_active,$my_generation1):array());


    $count_my_single_leg=!empty($my_single_leg) ? count($my_single_leg):0;
    $count_my_actives=!empty($my_actives) ? count($my_actives):0;
    $count_my_gen=!empty($my_generation) ? count($my_generation):0;
                
                
                
$total_directsarr=$this->team->directs($user_id);
$cnt_total_direct=(!empty($total_directsarr) ? count($total_directsarr):0);
$this->update_ob->update_wallet($user_id,'total_directs',$cnt_total_direct);
$this->update_ob->update_wallet($user_id,'active_directs',$count_my_actives);
$this->update_ob->update_wallet($user_id,'my_gen',$count_my_total_gen);
$this->update_ob->update_wallet($user_id,'active_gen',$count_my_gen);
$this->update_ob->update_wallet($user_id,'single_leg_team',$count_my_single_leg);



?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
	<marquee behavior="scroll" direction="left" scrollamount="10" class="card-bg-1 card gradient-orange text-white"><?= $this->conn->company_info('news');?></marquee>
	<?php
	$get_alert=$this->conn->runQuery('*','notice_board',"type='popup' and status='1' order by id desc");
	    if($get_alert){
	        ?>
            	    
            	    
	<div class="modal fade" id="panel_popup">
      <div class="modal-dialog">
        <div class="modal-content border-warning">
          <?php
          if($get_alert[0]->title!=''){
              ?>
              <div class="modal-header bg-warning">
                <h5 class="modal-title text-white"><?= $get_alert[0]->title;?></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php
          }
          ?>
          
          <div class="modal-body" style="color:black;">
            <?php
          if($get_alert[0]->description!=''){
              ?>
            <p ><?= $get_alert[0]->description;?></p>
            <?php
          }
          if($get_alert[0]->img_path!=''){
            ?>
            <img src="<?= $get_alert[0]->img_path;?>" style="width:100%;">
            <?php  
          }
          ?>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-inverse-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
            ?>
	<div class="row">
	<div class="col-md-8 col-xs-12">
	<center><h5>Incomes Section</h5></center>
	 <div class="row">
	 
	      <?php

                 

						$incomes=$this->conn->runQuery("slug,name",'wallet_types',"wallet_type='income' and  status='1'");


						?>

					<?php

					$website_settings=$this->conn->plan_setting("dashboard");    


					?>
					
					<?php
                foreach($incomes as $income){    
                    $slug =  $income->slug; 
                    ?>
					
         <div class="col-12 col-lg-6 col-xl-4">
		     
           <div class="card gradient-army">
		   
             <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body">
                      <span class="text-white"><?= $income->name;?></span>
                      <h3 class="text-white"><?= $this->wallet->balance($user_id,$slug); //(array_key_exists($slug,$wallet_details) ? $wallet_details[$slug]:0); ?></h3>
					  
                    </div>
                    <div class="w-icon">
                      <i class="fa fa-google-wallet text-white"></i>
                    </div>
                  </div>
                  <div id="widget-chart-4"></div>
                </div>
           </div>
		   
         </div>
		<?php } ?>
		
		
      </div><!--End Row-->
	</div>
	<div class="col-md-4 col-xs-12">
		<center><h5>Wallets Section</h5><center>
			<div class="row">
			
			 <?php
					$dashboard_section=$this->conn->runQuery("value,slug"," wallets ","u_code='$user_id' and status='1'");
					$wallet_details=($dashboard_section ? array_column($dashboard_section,'value','slug'):array());
					$wallets=$this->conn->runQuery("slug,name",'wallet_types',"wallet_type='wallet' and  status='1'");
				if($wallets){
				?>
				
				<?php
					foreach($wallets as $wallet){  
							$slug =  $wallet->slug; 
							?>
			 <div class="col-12 col-lg-12 col-xl-12 col-xs-12">
				   <div class="card gradient-orange">
					 <div class="card-body">
						<div class="media d-flex">
						  <div class="media-body">
							<span class="text-white"><?= $wallet->name;?></span>
							<h3 class="text-white"><?= $this->wallet->balance($user_id,$slug); //(array_key_exists($slug,$wallet_details) ? $wallet_details[$slug]:0); ?></h3>
						  </div>
						  <div class="w-icon">
							<i class="icon-pie-chart text-white"></i>
						  </div>
						</div>
						<div id="widget-chart-6"></div>
					  </div>
				   </div>
				 </div>
				  <?php
								}
								?>
				 
			<?php

		  }


		?>
		
		
		<?php if(count($wallets)<2){
                            ?>
                            
                            
           <?php
                   $count_my_pins=$this->conn->runQuery('count(pin) as cnt','epins',"u_code='$user_id' and use_status='0'");                     
                                        ?>                 
		<div class="col-12 col-lg-12 col-xl-12 col-xs-12">
           <div class="card gradient-orange">
             <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body">
                    <span class="text-white">Available Pins</span>
                    <h3 class="text-white"><?= ($count_my_pins ? $count_my_pins[0]->cnt:0);?></h3>
                  </div>
                  <div class="w-icon">
                    <i class="fa fa-thumb-tack text-white"></i>
                  </div>
                </div>
                <div id="widget-chart-7"></div>
              </div>
           </div>
         </div>
		<?php
                        } ?>
		
		</div>
	</div>
	</div>
	  <center><h3>Team Section</h3></center>
	<div class="row">
	
	<?php
				if($website_settings){
					$dashboard_section=json_decode($website_settings);
					if(!empty($dashboard_section)){
						foreach ($dashboard_section as $ky=>$sections) {
                   ?>
		
		
		<?php
            foreach($sections as $slug=>$section){ 
                                                        
                              ?>
         <div class="col-12 col-lg-6 col-xl-3 ">
           <div class="card gradient-dusk">
             <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body">
                      <span class="text-white"><?= $section;?></span>
                      <h3 class="text-white"><?= (array_key_exists($slug,$wallet_details) ? $wallet_details[$slug]:0); ?></h3>
                    </div>
                    <div class="w-icon">
                      <i class="icon-wallet text-white"></i>
                    </div>
                  </div>
                  <div id="widget-chart-5"></div>
                </div>
           </div>
		   
         </div>
		 <?php
                                }
                                ?>
								
								
								
								
	<?php
               }
            }
        }

?>
      </div>
     

    
				       <div class="col-md-12 ">

								<div class="input-group card-bg-1 ">
										  <div class="input-group-prepend">
											<span class="input-group-text">Referral</span>
										  </div>
										  <input type="text" id="referral_link_right" class="form-control" value="<?php echo $right_link=base_url('register?ref='.$profile->username);?>">
										  <div class="input-group-append">
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

										
									</div>
						<br>
						<?php if($this->conn->setting('reg_type')=='single_leg'){ ?>
						<div class="row card-bg-1">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h4>Goals</h4>
                                <div class="table-responsive" >
                                    <table class="table table-info table-hover text-center">
                                        <tr>
                                            <th>Rank Name</th>
                                            <th>Single Leg</th>
                                            <th>Direct</th>
                                           <!--  <th>Generation</th> -->
                                           <th>Remaining Flush Time</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php
                        
                            $r_name='';
                                            
                            
                                            $my_actives_req=0;
                                            $my_pre_level_req=0;
                                            for($p=0;$p<10;$p++){
                            $chk_dot='';
                            
                                                $single_leg_req=$plan[$p]->single_leg_required;
                                                //$my_gen_required=$plan[$p]->gen_required;
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
                            $goalstatus=($profile->active_status==1 && $count_my_single_leg>=$single_leg_req && $count_my_actives>=$my_actives_req ? 'Achieved':'Pending');
                            
                            $r_name=$plan[$p]->package_name;
                            $chk_next=false;
                            $rming_hrs=false;
                            
                            $chk='';
                            $chkhere='';
                            if($count_my_single_leg>=$single_leg_req){
                                
                                
                                $check_rank_=$this->conn->runQuery('u_code','rank',"rank_id='$p' and u_code='$user_id' and rank='$r_name'");
                                if(!$check_rank_){
                                    $rankinsert['u_code']=$user_id;
                                    $rankinsert['rank']=$r_name;
                                    $rankinsert['is_complete']=0;
                                    $rankinsert['rank_id']=$p;
                                    $this->db->insert('rank',$rankinsert);
                                }
                               
                               
                               
                               
                                $check_rank_new=$this->conn->runQuery('*','rank',"rank_id='$p' and u_code='$user_id' and rank='$r_name'");
                                $is_complete=$check_rank_new[0]->is_complete;
                                if($check_rank_new && $is_complete!='2'){
                                    
                                    $my_active_id=$profile->active_id;
                                    $get_this_level_done_id=$my_active_id+$single_leg_req;
                                    $get_this_level_done_time=$this->conn->runQuery('active_date','users',"active_id='$get_this_level_done_id'");
                                    $get_rank_time=$get_this_level_done_time[0]->active_date;
                                    
                                    
                                    $rank_achieve_hours_limit = $plan[$p]->rank_achieve_hours;
                                    $update_rank3['added_on']=$get_rank_time;
                                    $this->db->where('u_code',$user_id);
                                    $this->db->where('rank_id',$p);
                                    $this->db->update('rank',$update_rank3);
                                    
                                    $chk_time=date('Y-m-d H:i:s', strtotime("+$rank_achieve_hours_limit hours", strtotime($get_rank_time)));
                                    
                                    $last_active_date=false;
                            
                            if($my_actives_req==0){
                                $chk_next=true;
                                
                            }else {
                                if($count_my_actives>=$my_actives_req){
                                            $dir_implode=implode(',',$my_actives);
                                            $get_seri=$this->conn->runQuery('active_date','users',"id IN ($dir_implode) and active_status='1' order by active_date asc");
                                            $last_active_date=$get_seri[$my_actives_req-1]->active_date;
                                            
                                    }
                            }
                            
                                    
                                    
                                  //  echo "<br>".$count_my_actives;
                                   // echo "<br>".$my_actives_req;
                                   if(($count_my_actives>=$my_actives_req && $last_active_date!==false && $chk_time>=$last_active_date) or $my_actives_req==0){
                                               
                                              $chk_next=true;
                                    }else{
                                        
                                       
                                        
                                        if($chk_time>=date('Y-m-d H:i:s')){
                                            
                                            $now = new DateTime();
                                            $future_date = new DateTime($chk_time);
                                            $interval = $future_date->diff($now);
                                            $rming_hrs = $interval->format("%a day %h h :  %i m"); 
                                            $chk_next=true;
                                            
                                        }else{
                                           $goalstatus = 'Flashed';
                                            
                                        }
                                    }
                                     
                                }else{
                                    $goalstatus='Flashed';
                                }
                               
                            }
                             $trclass="";
                             
                            if($goalstatus=='Flashed'){
                            
                               // echo $chkhere;
                                $update_rank2['is_complete']=2;
                                $this->db->where('u_code',$user_id);
                                $this->db->where('rank_id',$p);
                                $this->db->update('rank',$update_rank2);
                                $trclass="panel panel-danger border-class alert alert-danger";
                            }
                            
                            if($chk_next===true && $goalstatus=="Achieved"){
                                $update_rank1['is_complete']=1;
                                $this->db->where('u_code',$user_id);
                                $this->db->where('rank_id',$p);
                                $this->db->update('rank',$update_rank1);
                                $update_rank['my_rank']=$r_name;
                                $this->db->where('id',$user_id);
                                $this->db->update('users',$update_rank);
                            }
                            
                                                ?>
                                                <tr <?php if($goalstatus=="Achieved"){ ?>class="panel panel-success border-class alert alert-success" <?php } ?> >
                                                    <td><?= $plan[$p]->package_name;?></td>
                                                    <td><?= ($count_my_single_leg>=$single_leg_req ? $single_leg_req:$count_my_single_leg);?>/<?= $plan[$p]->single_leg_required;?></td>
                                                    <td><?= $shw_dir;?>/<?= ($p>1?"+":"").$plan[$p]->direct_required;?></td>
                                                    <!-- <td><?= ($count_my_gen>=$my_gen_required ? $my_gen_required:$count_my_gen);?>/<?= $plan[$p]->gen_required;?></td> -->
                                                    <td><?= $chk_dot.$rming_hrs;?></td>
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
                        <?php } ?>
<!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->

   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	
