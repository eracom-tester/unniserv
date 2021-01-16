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



?>

<marquee behavior="scroll" direction="left" scrollamount="10" class="card-bg-1"><?= $this->conn->company_info('news');?></marquee>

<div class="row" >
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4   ">
    <!--<div class="separator"><center>Profile</center></div>-->
        <div class="card ">
            <div class="card-header card-bg-1">
                <div class="">                    
                     <Strong>Profile Info</Strong>
                </div>
               
            </div>
            <div class="" >
                <div class="table-responsive" >
                    <table class="<?= $this->conn->setting('table_classes'); ?>">
                        <tbody >
                            <tr><td>Userid </td><td>:</td><td><?= $profile->username;?></td></tr>
                            <tr><td>Name </td><td>:</td><td><?= $profile->name;?></td></tr>
                            <tr><td>Mobile </td><td>:</td><td><?= $profile->mobile;?></td></tr>
                            <tr><td>Email </td><td>:</td><td><?= $profile->email;?></td></tr>
                            <tr><td>Joining Date </td><td>:</td><td><?= $profile->added_on;?></td></tr>
                            <tr><td>Status </td><td>:</td><td><?= $profile->active_status==1 ? 'Active':'Inactive ';?></td></tr>
                            <tr><td>Active Date </td><td>:</td><td><?= $profile->active_status==1 ? $profile->active_date:'';?></td></tr>
                            <tr><td>Current Pool </td><td>:</td><td id="myrank"><?= $profile->my_rank;?></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="card card-body card-bg-1">  
        <?php
            $dashboard_section=$this->conn->runQuery("value,slug"," wallets ","u_code='$user_id' and status='1'");
            $wallet_details=($dashboard_section ? array_column($dashboard_section,'value','slug'):array());
            $wallets=$this->conn->runQuery("slug,name",'wallet_types',"wallet_type='wallet' and  status='1'");
        if($wallets){
        ?>
         <!--<div class="separator" style="text-transform: uppercase;"><center><Strong>Wallets</Strong></center></div>-->
          <div class="panel panel-primary border-class alert alert-primary">
                                        <div  class="panel-heading text-center ">
                                             <Strong>Wallets Section</Strong> </div>
                                              </div>
        
         <div class="container">
         <div class="row" style="text-transform: uppercase;">
        <?php
            foreach($wallets as $wallet){  
                    $slug =  $wallet->slug; 
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <div class="status kyc">
                            <center> 
                                <h5 style="padding:px;">
                                    <?= $wallet->name;?>: <?= $this->wallet->balance($user_id,$slug); //(array_key_exists($slug,$wallet_details) ? $wallet_details[$slug]:0); ?>
                                </h5>
                            </center>
                        </div>
                    </div>
                    <?php
                        }
                        ?> 
                        <?php if(count($wallets)<2){
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="status kyc">
                                <center>
                                    <h5 style="padding:px;">
                                        <?php
                                        $count_my_pins=$this->conn->runQuery('count(pin) as cnt','epins',"u_code='$user_id' and use_status='0'");
                                        ?>
                                        Available Pins: <?= ($count_my_pins ? $count_my_pins[0]->cnt:0);?>
                                    </h5>
                                </center>
                                </div>
                            </div> 
                            <?php
                        } ?>
                                       
    <!-- <div class="container">
 <div class="table-responsive">
                    <table class="table  ">                        
                        <thead>
                                <tr style="">
                                    <?php
                                    foreach($wallets as $wallet){                           
                                        ?>
                                        <th><?= $wallet->name;?></th>                            
                                        <?php
                                    }
                                    ?>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <?php
                                    foreach($wallets as $wallet){ 
                                        $slug =  $wallet->slug;                      
                                        ?>
                                        <td><?= $this->wallet->balance($user_id,$slug); //(array_key_exists($slug,$wallet_details) ? $wallet_details[$slug]:0); ?></td>                            
                                        <?php
                                    }
                                    ?>
                                </tr>
                        </tbody>
                     </table>
           </div>
           </div>-->
</div>
</div>
<hr>
<?php

  }

$incomes=$this->conn->runQuery("slug,name",'wallet_types',"wallet_type='income' and  status='1'");
if($incomes){


?>
<!-- <div class="separator" style="text-transform: uppercase;"><center><Strong>Incomes</Strong></center></div>-->
  <div class="">
                                <div  class="panel-heading text-center ">
                                     <Strong>Incomes Section</Strong> </div>
                                      </div>
 
 <div class="row" style="text-transform: uppercase;">
        <div class="container">
 <div class="table-responsive">
                    <table class="<?= $this->conn->setting('table_classes'); ?>">                        
                        <thead>
                                <tr class=" ">
                                    <?php
                                    foreach($incomes as $income){                           
                                        ?>
                                        <th><?= $income->name;?></th>                            
                                        <?php
                                    }
                                    ?>
                                </tr>
                        </thead>
                        <tbody>
                                <tr >
                                    <?php
                                    foreach($incomes as $income){ 
                                        $slug =  $income->slug;                      
                                        ?>
                                        <td><center><?= $this->wallet->balance($user_id,$slug); //(array_key_exists($slug,$wallet_details) ? $wallet_details[$slug]:0); ?></center></td>                            
                                        <?php
                                    }
                                    ?>
                                </tr>
                        </tbody>
                     </table>
           </div>
           </div>
</div>

<?php

  }


?>
<hr>
<?php

$website_settings=$this->conn->plan_setting("dashboard");    
if($website_settings){

    $dashboard_section=json_decode($website_settings);
    if(!empty($dashboard_section)){

   foreach ($dashboard_section as $ky=>$sections) {
       
       ?>
       
      <!-- <div class="separator" style="text-transform: uppercase;"><center><Strong><?= $ky;?></Strong></center></div>-->
       
        <div class="panel panel-success">
                                <div  class="panel-heading text-center ">
                                     <Strong><?= $ky;?></Strong> </div>
                                      </div>
       
       <div class="row" style="text-transform: uppercase;">
              <div class="container">
            <div class="table-responsive">
                        <table class="<?= $this->conn->setting('table_classes'); ?>  ">                        
                            <thead><!--background-color:#9AF4F8;-->
                                    <tr class="">
                                        <?php
                                        foreach($sections as $key=>$section){                           
                                            ?>
                                            <th><?= $section;?></th>                            
                                            <?php
                                        }
                                        ?>
                                    </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <?php
                                        foreach($sections as $slug=>$section){ 
                                                                
                                            ?>
                                            <td><center><?= (array_key_exists($slug,$wallet_details) ? $wallet_details[$slug]:0); ?></center></td>                            
                                            <?php
                                        }
                                        ?>
                                    </tr>
                            </tbody>
                        </table>
            </div>
            </div>
    </div>
       <?php
       
   }
}
}
?>

    </div></div> 


    <div class="col-md-12 ">

    <div class="input-group card-bg-1">
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
</div>
<br>
<div class="row card-bg-1">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4>Goals</h4>
        <div class="table-responsive" >
            <table class="<?= $this->conn->setting('table_classes'); ?>   ">
                <tr>
                    <th>Rank Name</th>
                    <th>Single Leg</th>
                    <th>Direct</th>
                   <!--  <th>Generation</th> -->
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
$goalstatus=($profile->active_status==1 && $count_my_single_leg>=$single_leg_req && $count_my_actives>=$my_actives_req ? 'Achieved':'Pending');

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
                        <!-- <td><?= ($count_my_gen>=$my_gen_required ? $my_gen_required:$count_my_gen);?>/<?= $plan[$p]->gen_required;?></td> -->
                        
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


