<?php
    $profile=$this->session->userdata("profile");

    $user_id=$this->session->userdata('user_id');


    $plan=$this->conn->runQuery("*",'plan',"1=1");
    $my_single_leg =  $this->team->my_single_leg($user_id);
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

$my_rank=$this->profile->my_rank($user_id);
$rank_per_arr=array(1=>0,2=>20,3=>40,4=>60,5=>80,6=>100);


$commision=$this->conn->runQuery('(SUM(amount)-SUM(tx_charge)) as amnt','transaction',"u_code='$user_id' and tx_type='income' and payout_id>=1 and status='1'")[0]->amnt;
?>

<marquee behavior="scroll" direction="left" scrollamount="10" class="card-bg-1"><?= $this->conn->company_info('news');?></marquee>

<div class="clearfix"></div>
	
  <div class="">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12 col-lg-6 col-xl-4">
                  <div class="card">
                      <div class="card-body">
                          <p class="mb-0 "style="color:#0E6CB5;">Commission  </p>
                           
                           <small style="color:black"><?= $commision!='' ? $commision:0; ?></small>
                          <p class="mb-0 mt-2 small-font text-muted" >Commission Amount <span class="float-right"> <i style="color:#F5B041;"class="fa fa-line-chart text-right fa-2x"></i></span></p>
                        </div>
                  </div>
             </div>
    
    
         <div class="col-12 col-lg-6 col-xl-4">
              <div class="card">
                  <div class="card-body">
                      <p class="text-success mb-0"style="color:#0E6CB5;">Business Volume </p>
                       
                      
                       <small style="color:black">0</small>
                      <p class="mb-0 mt-2 small-font text-muted">Daily<span class="float-right"> <i  style="color:#F5B041;" class="fa fa-briefcase text-right fa-2x"></i></span></p>
                    </div>
              </div>
         </div>
    
         <div class="col-12 col-lg-6 col-xl-4">
              <div class="card">
                  <div class="card-body">
                      <p class="text-danger mb-0" style="color:#0E6CB5;">License </p>
                      <?php
                      $count_my_pins=$this->conn->runQuery('count(pin) as cnt','epins',"u_code='$user_id' and use_status='0'");
                      ?>
                       <small style="color:black"><?= ($count_my_pins ? $count_my_pins[0]->cnt:0);?></small>
                      <p class="mb-0 mt-2 small-font text-muted">  <span class="float-right"> <i style="color:#F5B041;" class="fa fa-filter text-right fa-2x"></i></span></p>
                    </div>
              </div>
         </div>
    
       </div><!--End Row-->
      <!--Start Dashboard Content-->
         	<div class="row">
        	 <div class="col-12 col-lg-12">
        	   <div class="card">
        	     <div class="card-header border-0">Directs
        		 
        		 </div>
        	       <div class="table-responsive">
                         <table class="table align-items-center table-flush">
                          <!--<thead>
                           <tr>
                             <th>Photo</th>
                             <th>Product</th>
                             <th>Amount</th>
                             <th>Status</th>
                             <th>Completion</th>
                             <th>Date</th>
                           </tr>
                           </thead>-->
                   <tbody> <tr align="center" >
            <td align="center" >	<div class="wizard-steps-container" style="width:800px;" >
        	<div class="progress-bar-container">
        		<div class="progress-bar" style="width:<?= $my_rank && array_key_exists($my_rank,$rank_per_arr) ? $rank_per_arr[$my_rank]:0?>%" ></div>
        	</div>
         <div class="steps">
             <?php
              
             foreach($plan as $plan_details){
                 $plan_status='';
                 $plan_id=$plan_details->id;
                 $plan_name=$plan_details->rank;
                 $active_date_rank=false;
                 if($my_rank && $my_rank>=$plan_id){
                     $plan_status='active';
                     $active_date_rank=$this->profile->my_rank_arr($user_id,$plan_id);
                 }
                 
                ?>
                <div class="step <?= $plan_status;?>"><span class="label"><small><?= ucfirst($plan_name); ?><br><?= $active_date_rank? $active_date_rank->complete_date:'';?></small></span></div>
                <?php 
             }
             ?>
            <!--<div class="step <?= $my_rank && $my_rank>=1 ? 'active':'';?>"><span class="label"><small>Silver Star<br>   </small></span></div>
            
            <div class="step <?= $my_rank && $my_rank>=3 ? 'active':'';?>"><span class="label"><small>Gold Star </small></span></div>
            <div class="step <?= $my_rank && $my_rank>=4 ? 'active':'';?>"><span class="label"><small>Platinum Star</small></span></div>
            <div class="step <?= $my_rank && $my_rank>=5 ? 'active':'';?>"><span class="label"><small>Rubby Star </small></span></div>
            <div class="step <?= $my_rank && $my_rank>=6 ? 'active':'';?>"><span class="label"><small>Diamond Star</small></span></div>-->
            
         </div>
        </div></td>
               </tr>
                         </tbody></table>
                       </div>
        	   </div>
        	 </div>
        	</div><!--End Row-->
	<div class="row">
	 <div class="col-12 col-lg-12">
    	   <div class="card">
        	     <div class="card-header border-0">Directs
        		  
        		 </div>
    	       <div class="table-responsive">
                         <table class="<?= $this->conn->setting('table_classes'); ?>">
                              <thead>
                                  <tr>
                                   <th>S No.</th>
                                    <th>UserName</th>
                            		<th>Name</th>
                            		<th>Mobile</th>
                            	 
                            		<th>Activation Date</th>
                            		<!--<th>Package</th>-->
                                    
                                    <th> Rank</th>
                                    <th>Current Business</th>
                                    <th>Previews Business</th>
                                   </tr>
                               </thead>
                           <tbody>
                               
                                 </tbody>
                         </table>
                   </div>
    	   </div>
	 </div>
	</div><!--End Row-->

	<div class="row">
	 <div class="col-12 col-lg-6 col-xl-12">
             <div class="card">
               <div class="card-header">Challenges
                
               </div> 
               <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <div class="media align-items-center">
                     
                    <div class="media-body ml-3">
                    
                      <p class="mb-0 small-font">Userid : <?= $profile->username;?></p>
                    </div>
                    <div class="media-body ml-3">
                     
                      <p class="mb-0 small-font">Status : <?= $profile->active_status==1 ? 'Active':'Inactive ';?>
                                                			      	 <span class="badge-dot">
                                                                    <i class="bg-danger"></i> pending
                                                                    </span>
                                                			      	
                                                			      	 <span class="badge-dot">
                                                                    <i class="bg-success"></i> completed
                                                                    </span>
                                                			      	</p>
                    </div>
                   
                  </div>
                  </li>
                      <li class="list-group-item">
                            <div class="media align-items-center">
                             
                                <div class="media-body ml-3">
                                
                                  <p class="mb-0 small-font">Rank: </th><th><?= $profile->my_rank;?></p>
                                </div>
                                    <div class="media-body ml-3">
                                     
                                      <p class="mb-0 small-font">Joining Date : <?= $profile->added_on;?></p>
                                    </div>
                           
                          </div>
                      </li>
                      
                      
                           <li class="list-group-item">
                                <div class="media align-items-center">
                                 
                                    <div class="media-body ml-3">
                                    
                                      <p class="mb-0 small-font">Activation Date : <?= $profile->active_status==1 ? $profile->active_date:'';?></p>
                                    </div>
                                
                               
                              </div>
                          </li>
    			
                </ul>
             </div>
        </div>
      </div>
    <!--End Dashboard Content-->
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
	