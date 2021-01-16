<?php
class Crons extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

   public function single_leg(){
   // $this->db->insert('testing',$testing);
    $insert_income=array();
    $plan=$this->conn->runQuery("*",'plan',"1=1");
    $source='single_leg';
        $all_users=$this->conn->runQuery('id,name,username,my_rank','users',"active_status='1' and income_status='1'");
        if($all_users){
           foreach($all_users as $user_details){
               $r_name='';
                $user_id =  $user_details->id;
                    $my_active_single_leg =  $this->team->my_active_single_leg($user_id);
                    $my_actives =  $this->team->my_actives($user_id);
                    $count_my_active_single_leg=!empty($my_active_single_leg) ? count($my_active_single_leg):0;
                    $count_my_actives=!empty($my_actives) ? count($my_actives):0;
                    $my_actives_req=0;
                    $my_pre_level_req=0;
                    for($p=0;$p<22;$p++){
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
                        $goalstatus=( $count_my_active_single_leg>=$single_leg_req && $count_my_actives>=$my_actives_req  ? 'Achieved':'Pending');
                        if($goalstatus=="Achieved"){
                            $income_gen = false;
                            $r_name=$plan[$p]->package_name;
                            if($plan[$p]->package_name==$user_details->my_rank){
                                $get_rank_date=$this->conn->runQuery('added_on','rank',"rank='$r_name'");
                                $rank_date=$get_rank_date[0]->added_on;
    
                                $get_last_direct_active_date=$this->conn->runQuery('active_date','users',"u_sponsor='' and active_status='1' and active_date>'$rank_date' ORDER BY active_date asc");
                                if($get_last_direct_active_date){
                                    $income_gen = true;
                                }else{
                                    $last_active_date = date('Y-m-d H:i:s');
                                    $seconds = abs(strtotime($last_active_date) - strtotime($rank_date));
                                    $hours=floor($seconds/3600);
                                    if($hours<48){
                                        $income_gen = true;
                                    }else{
                                        $up_['income_status']=0;
                                        $this->db->where('id',$user_id);
                                        $this->db->update('users',$up_);
                                    }
                                }
                            }else{
                                $income_gen = true;
                            }
                                if($income_gen === true){
                                    $per_day_income=$plan[$p]->per_day_income;
                                                        
                                    $today=date('Y-m-d H:i:s');
                                    $income_check=$this->conn->runQuery('u_code','transaction',"reason='$r_name' and u_code='$user_id' and source='$source'");
                                    if($income_check==false){
                                        
                                        $check_next_level_done=$this->conn->runQuery('rank_id','rank',"u_code='$user_id' and rank_id>'$p'");
                                        if($check_next_level_done==false){
                                            $income_insert['u_code']=$user_id;
                                            $income_insert['amount']=$per_day_income;
                                            $income_insert['source']=$source;
                                            $income_insert['tx_type']='income';
                                            $income_insert['debit_credit']='credit';
                                            $income_insert['wallet_type']='main_wallet';
                                            $income_insert['date']=$today;
                                            $income_insert['status']=1;
                                            $income_insert['remark']=" $user_details->name ( $user_details->username ) Recieve $per_day_income Single leg income from $r_name";
                                            $income_insert['reason']=$r_name;
                                            $insert_income[]=$income_insert;
                                        }
                                        
                                    }
                                }
                            
                        }else{
                            break;
                        }
         
                         $my_pre_level_req +=$plan[$p]->direct_required;
                    }
               
           }
           
           $this->db->insert_batch('transaction',$insert_income);
           
       }
   
   }

   public function clear_form_submit(){
        $this->db->empty_table('form_request'); 
    }
}