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
    //$total_directsarr=$this->team->directs($user_id);
    //$cnt_total_direct=(!empty($total_directsarr) ? count($total_directsarr):0);
    /*$this->update_ob->update_wallet($user_id,'total_directs',$cnt_total_direct);
    $this->update_ob->update_wallet($user_id,'active_directs',$count_my_actives);
    $this->update_ob->update_wallet($user_id,'my_gen',$count_my_total_gen);
    $this->update_ob->update_wallet($user_id,'active_gen',$count_my_gen);
    $this->update_ob->update_wallet($user_id,'single_leg_team',$count_my_single_leg);*/
?>
<div class="content-wrapper">
<div class="row card-bg-1">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h4>Goals</h4>
        <div class="table-responsive" >
            <table class="<?= $this->conn->setting('table_classes'); ?>   ">
                <tr>
                   <th>Sr No</th>
                    <th>Total Single Leg/Required Team</th>
                    <th>Total Direct/Requried Direct</th>
                     <!--<th>Direct Rank Required</th>-->
                   <!--  <th>Generation</th> -->
                    <th>Rank Name</th>
                    <th>Remaining Fluse Time</th>
                    
                    <th>Status</th>
                    <th>Royalty</th>
                </tr>
                <?php
                $r_name='';
                $my_actives_req=0;
                $my_pre_level_req=0;
                for($p=0;$p<14;$p++){
                    
                    
                     $fls=1;
                     
                    $single_leg_req=$plan[$p]->single_leg_required;
                    $my_gen_required=$plan[$p]->gen_required;
                    $my_actives_req =$plan[$p]->direct_required;
                    /*if($count_my_actives>$my_actives_req){
                         $shw_dir=$plan[$p]->direct_required;
                    }else{
                        $rest=$count_my_actives;//$my_pre_level_req;
                        if($rest>0){
                            $shw_dir=$rest;
                        }else{
                            $shw_dir=0;
                        }
                    }*/
                    $shw_dir=$count_my_actives;
                    $no_of_direct_for_rank=$plan[$p]->no_of_direct_for_rank;
                    $direct_rank_required=$plan[$p]->direct_rank_required;
                    if(!empty($my_actives)){
                        $implode_dir = implode(',',$my_actives);
                        $get_res=$this->conn->runQuery('count(id) as cnt','rank',"rank='$direct_rank_required' and u_code IN ($implode_dir) and is_complete='1'");
                        $get_count=$get_res[0]->cnt;
                        $show_my_dir= $get_count!='' ? ($get_count>=$no_of_direct_for_rank ? $no_of_direct_for_rank:$get_count) : 0;
                    }else{
                        $show_my_dir='0';
                    }
                    $chk_direct_for_rank_status=($no_of_direct_for_rank!='' ? $no_of_direct_for_rank :0);
                    $goalstatus=($show_my_dir>=$chk_direct_for_rank_status && $profile->active_status==1 && $count_my_single_leg>=$single_leg_req && $count_my_actives>=$my_actives_req ? 'Achieved':'Pending');
                    //echo $cnt_total_direct;
                    
                    $r_name=$plan[$p]->package_name;
                    $chk_next=false;
                    $rming_hrs=false;
                    
                    $chk='';
                    
                   
                    
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
                        if(($check_rank_new && $is_complete!='2') or $check_rank_new[0]->active_flash==0 ){
                            
                            $my_active_id=$profile->active_id;
                            $get_this_level_done_id=$my_active_id+$single_leg_req;
                            $get_this_level_done_time=$this->conn->runQuery('active_date','users',"active_id='$get_this_level_done_id'");
                            $get_rank_time=$get_this_level_done_time[0]->active_date;
                            
                            
                            $rank_achieve_hours_limit = $plan[$p]->rank_achieve_hours;
                            $update_rank3['added_on']=$get_rank_time;
                            $this->db->where('u_code',$user_id);
                            $this->db->where('rank_id',$p);
                            $this->db->update('rank',$update_rank3);
                            
                            $chk_date=date('Y-m-d', strtotime("+$rank_achieve_hours_limit hours", strtotime($get_rank_time)));
                           
                                 if($chk_date=='2020-06-16'){
                                     $chk_time=date('Y-m-19 H:i:s', strtotime("+$rank_achieve_hours_limit hours", strtotime($get_rank_time)));
                                }elseif($chk_date=='2020-06-17'){
                                    $chk_time=date('Y-m-19 H:i:s', strtotime("+$rank_achieve_hours_limit hours", strtotime($get_rank_time)));
                                }elseif($chk_date=='2020-06-18'){
                                    $chk_time=date('Y-m-20 H:i:s', strtotime("+$rank_achieve_hours_limit hours", strtotime($get_rank_time)));
                                }elseif($chk_date=='2020-06-19'){
                                    $chk_time=date('Y-m-21 H:i:s', strtotime("+$rank_achieve_hours_limit hours", strtotime($get_rank_time)));
                                }else{
                                    $chk_time=date('Y-m-d H:i:s', strtotime("+$rank_achieve_hours_limit hours", strtotime($get_rank_time)));
                                }
                            
                            
                            
                            $last_active_date=false;
                            if($count_my_actives>=$my_actives_req){
                                    $dir_implode=implode(',',$my_actives);
                                    $get_seri=$this->conn->runQuery('active_date','users',"id IN ($dir_implode) and active_status='1' order by active_date asc");
                                    $last_active_date=$get_seri[$my_actives_req-1]->active_date;
                                    
                            }
                            
                          //  echo "<br>".$count_my_actives;
                           // echo "<br>".$my_actives_req;
                           if($count_my_actives>=$my_actives_req && $last_active_date!==false && $chk_time>=$last_active_date){
                                       
                                      $chk_next=true;
                            }else{
                                
                               $chk='.';
                                if($check_rank_new[0]->active_flash==1){
                                    if($chk_time>=date('Y-m-d H:i:s')){
                                        
                                        $now = new DateTime();
                                        $future_date = new DateTime($chk_time);
                                        $interval = $future_date->diff($now);
                                        $rming_hrs = $interval->format("%a day %h h :  %i m"); 
                                        $chk_next=true;
                                        
                                    }else{
                                       $goalstatus = 'Flashed';
                                        
                                    }
                                }else{
                                    $fls=0;
                                }
                            }
                             
                        }else{
                            $goalstatus='Flashed';
                        }
                       
                    }
                     $trclass="";
                     
                    if($goalstatus=='Flashed'){
                        $update_rank2['is_complete']=2;
                        $this->db->where('u_code',$user_id);
                        $this->db->where('rank_id',$p);
                        $this->db->update('rank',$update_rank2);
                        $trclass="panel panel-danger border-class alert alert-danger";
                   }
                   
                                   
                                   
                       
                    if(($chk_next===true && $goalstatus=="Achieved") or $fls==0){
                        $update_rank1['is_complete']=1;
                        $this->db->where('u_code',$user_id);
                        $this->db->where('rank_id',$p);
                        $this->db->update('rank',$update_rank1);
                        $update_rank['my_rank']=$r_name;
                        $this->db->where('id',$user_id);
                        $this->db->update('users',$update_rank);
                        
                        
                        $source='single_leg';
                        $today=date('Y-m-d H:i:s');
                        $income_check=$this->conn->runQuery('u_code','transaction',"reason='$r_name' and u_code='$user_id' and source='$source' and DATE(date)=DATE('$today')");
                        if($income_check==false){
                            $total_income=$plan[$p]->total_income;
                            $per_day_income=$plan[$p]->per_day_income;
                            $check_pre=$this->conn->runQuery('SUM(amount) as amnt','transaction',"reason='$r_name' and u_code='$user_id' and source='$source'");
                            $psmnt=$check_pre[0]->amnt;
                            $paid = $psmnt!='' ? $check_pre[0]->amnt:0;
                            if($paid<$total_income){
                                $income_insert['u_code']=$user_id;
                                $income_insert['amount']=$per_day_income;
                                $income_insert['source']=$source;
                                $income_insert['tx_type']='income';
                                $income_insert['debit_credit']='credit';
                                $income_insert['wallet_type']='main_wallet';
                                $income_insert['date']=$today;
                                $income_insert['status']=1;
                                $income_insert['remark']=" $profile->name ( $profile->username ) Recieve $per_day_income Single leg income from $r_name";
                                $income_insert['reason']=$r_name;
                                if($this->db->insert('transaction',$income_insert)){
                                    
                                    
                                    $this->db->set($source,"$source + $per_day_income ", FALSE);
                                    $this->db->set('main_wallet',"main_wallet + $per_day_income ", FALSE);
                                    $this->db->where('id',$user_id);
                                    $this->db->update('users');
                                    
                                }
                                
                                
                                
                            }
                        }
                         $trclass="panel panel-success border-class alert alert-success";
                    }            
                    
                    
                    ?>
                    <tr class="<?= $trclass;?>" >  
                        <td><?= $p+1;?></td>
                        <td><?= $count_my_single_leg;?>/<?= $plan[$p]->single_leg_required;?></td>
                        <td><?= $shw_dir;?>/<?= $plan[$p]->direct_required;?></td>
                        <!--<td><?= ($no_of_direct_for_rank!='' ? $show_my_dir .' / '.$no_of_direct_for_rank.' '.$direct_rank_required:'');?></td>-->
                        <!-- <td><?= ($count_my_gen>=$my_gen_required ? $my_gen_required:$count_my_gen);?>/<?= $plan[$p]->gen_required;?></td> -->
                         <td><?= $plan[$p]->package_name;?></td>
                         
                         <td><?= $chk.$rming_hrs;?></td> 
                         <td><?= $goalstatus;?></td>
                         <td><?= $plan[$p]->reward_award;?></td>
                        
                    </tr>
                    <?php
                    // $my_pre_level_req +=$plan[$p]->direct_required;
                }
                ?>
            </table>
        </div>
    </div>
</div>
</div>

