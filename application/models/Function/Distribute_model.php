<?php
class Distribute_model extends CI_Model{
    public function __construct()
    {
         $this->gen_plan = array(
            1 => array(
                37 => array(1=>'7',2=>'1.5',3=>'1'),
                41 => array(1=>'3',2=>'1',3=>'0.5'),
                42 => array(1=>'0.6',2=>'0.3',3=>'0.2'),
            ),
            2 => array(
                37 => array(1=>'7',2=>'4',3=>'2',4=>'1.5',5=>'1'),
                41 => array(1=>'3',2=>'2',3=>'1',4=>'1',5=>'0.5'),
                42 => array(1=>'0.6',2=>'0.5',3=>'0.4',4=>'0.3',5=>'0.2'),                
            ),
         );

    }

    function level_destribute($u_code,$amount,$no_of_levels=15){
        $code=$u_code;
        $ben_from=$u_code;
        $incomes=array();

        $l=1;

        $profile_info=$this->profile->profile_info($ben_from,'name,username');
        $name=$profile_info->name;
        $username=$profile_info->username;

        $plan=$this->conn->runQuery('level_income,id','plan','1=1');
        if($plan){
            $level_income=array_column($plan,'level_income','id');
            while($code!=''){
                $source ="level"; //($l==1 ? 'direct' : "level");
               $currenct_payout_id=$this->wallet->currenct_payout_id();
                $level_distribution_in=$this->conn->setting('level_distribution_in');
                if($level_distribution_in=='fix'){
                    $level_per=$level_income[$l];
                    $payable=$level_per;
                }else{
                    $level_per=$level_income[$l];
                    $payable=$amount*$level_per/100;
                }    

               
                
                $sponsor = $this->profile->sponsor_info($code,'id,active_status');
                $code = ($sponsor && $sponsor->active_status=='1'? $sponsor->id:'');
                
                $income=array();
                if($payable>0 && $code!='' ){
                    $income['tx_u_code']=$ben_from;
                    $income['u_code']=$code;
                    $income['tx_type']='income';
                    $income['source']=$source;
                    $income['debit_credit']='credit';
                    $income['amount']=$payable;
                    $income['tx_charge']=$payable*5/100;
                    $income['date']=date('Y-m-d H:i:s');
                    $income['status']=1;
                    $income['payout_id']=$currenct_payout_id;
                    $income['tx_record']=$l;
                    $income['remark']="Recieve $source income of amount $payable from $name ($username) from level $l";
                    if($this->db->insert('transaction',$income)){
                        $income_lvl=$income['amount']-$income['tx_charge'];
                        $this->update_ob->add_amnt($code,$source,$income_lvl);
                        $this->update_ob->add_amnt($code,'main_wallet',$income_lvl);
                    }
                   // $incomes[]=$income;
                    
                }

                
                if($l>=$no_of_levels){
                    break;
                }
                $l++;
            }

        }
               
        
        /*if(!empty($incomes)){    
            //$this->db->insert_batch('transaction',$incomes);
        }*/

    }
    
    public function order_distribute($u_code,$id){
        $amnt_8000=8000;
        
        $order_details=$this->conn->runQuery('*','orders',"id='$id' and closing_status='0' and status='1'");
         
        if($order_details){
            $order_detail=$order_details[0];
            $order_bv= $order_detail->order_bv;
             switch ($order_bv) {
                case $order_bv<=$amnt_8000:
                    if($order_bv!=''){
                        $this->distribute_income($u_code,$order_bv);
                        $this->upgrade_rank($u_code,$order_bv);
                    }
                    break;
                case $order_bv>$amnt_8000:
                      if($order_bv!=''){
                        $this->distribute_income($u_code,$amnt_8000);
                        $this->upgrade_rank($u_code,$amnt_8000);
                        $pnding_amnt=$order_bv-$amnt_8000;
                        $this->distribute_income($u_code,$pnding_amnt);
                        $this->upgrade_rank($u_code,$pnding_amnt);
                      }
                    break;
            }
            $order_id=$order_detail->id;
            $this->db->set('closing_status','1');
            $this->db->where('id',$order_id);
            $this->db->update('orders');
        }
    }
    
    public function distribute_income($u_code,$amnt){
        

        $ben_from=$u_code;
        $source='test';
        $pre_level_per=$level_per=0;
        $l=0;
        
        $nxt='yes';
        
        $currenct_payout_id=$this->wallet->currenct_payout_id();
        
        while($nxt=='yes'){
            $nxt='no';
            
            
            $my_rank_per=$this->profile->my_rank_per($u_code);
            $pre_level_per=$level_per;
            if($my_rank_per && $my_rank_per>$level_per){                
                $curr_per=$my_rank_per-$level_per;
                $level_per=$my_rank_per;
                $payable=$amnt*$curr_per/100;
                
                if($payable>0){
                    $income=array();
                    $income['tx_u_code']=$ben_from;
                    $income['u_code']=$u_code;
                    $income['tx_type']='income';
                    $income['source']=$source;
                    $income['debit_credit']='credit';
                    $income['amount']=$payable;
                    $income['date']=date('Y-m-d H:i:s');
                    $income['status']=1;
                    $income['payout_id']=$currenct_payout_id;
                    $income['user_prsnt']=$my_rank_per;
                    $income['distribute_per']=$curr_per;
                    $income['remark']="Recieve $source income of amount $payable from level $l";
                    $this->db->insert('transaction',$income);
                    $l++;
                }                
            }            
            
            if($my_rank_per>=37 && $pre_level_per==$my_rank_per){
                $this->gen_distribute($u_code,$my_rank_per,$amnt);
            }
            
            $u_code=$this->profile->sponsor($u_code);
            if($u_code){
                $nxt='yes';
            }
        }        
    } 
    

    public function upgrade_rank($u_code,$amnt){
        
        
        $my_rank_per=$this->profile->my_rank_per($u_code);
        
        echo "<br>$u_code $amnt $my_rank_per";
        switch ($my_rank_per) {
            case 0:
                $this->upgrade($u_code,1);
                break;
            case 17:
                $this->upgrade($u_code,2);
                break;                     
            case 27:
                $this->rank_check_nxt($u_code,3);
                break;                     
           
        }
        //echo "<br>upgrade $u_code $amnt";
    }
    
    public function upgrade($u_code,$rank_id){
        echo "<br>$u_code $rank_id";
        
        
        $plan=$this->conn->runQuery('*','plan',"id='$rank_id'")[0];
        if($rank_id=='1'){
            $check_order=$this->conn->runQuery('SUM(order_bv) as amnt','orders',"u_code='$u_code' and status='1'");
            
            if($check_order && $check_order[0]->amnt!='' && $check_order[0]->amnt>=8000){
                
                $check_exists=$this->conn->runQuery('*','rank',"u_code='$u_code' and rank_id='$plan->id'");
                if(!$check_exists){
                    $rank=array();
                    $rank['rank']=$plan->rank;
                    $rank['u_code']=$u_code;
                    $rank['rank_per']=$plan->r_per;
                    $rank['rank_id']=$plan->id;
                    $rank['is_complete']=1;
                    $rank['complete_date']=date('Y-m-d H:i:s');
                    $this->db->insert('rank',$rank);
                    $sponsor=$this->profile->sponsor($u_code);
                    if($sponsor){
                        $this->upgrade($sponsor,2);
                    }
                    echo '<br>rank updated';
                }
            }
        }

        if($rank_id=='2'){
            $rank_ids=$this->team->downline_rank_team($u_code,17);
            if(!empty($rank_ids) && count($rank_ids)>=4){
                $check_exists=$this->conn->runQuery('*','rank',"u_code='$u_code' and rank_id='$plan->id'");
                if(!$check_exists){
                    $rank=array();
                    $rank['rank']=$plan->rank;
                    $rank['u_code']=$u_code;
                    $rank['rank_per']=$plan->r_per;
                    $rank['rank_id']=$plan->id;
                    $rank['is_complete']=1;
                    $rank['complete_date']=date('Y-m-d H:i:s');
                    $this->db->insert('rank',$rank);
                    $sponsor=$this->profile->sponsor($u_code);
                    if($sponsor){
                        $this->rank_check_nxt($sponsor,3);
                    }
                }
            }
            
            $check_order=$this->conn->runQuery('SUM(order_bv) as amnt','orders',"u_code='$u_code' and status='1'");
            if($check_order && $check_order[0]->amnt!='' && $check_order[0]->amnt>=$plan->required_business){
                
                $check_exists=$this->conn->runQuery('*','rank',"u_code='$u_code' and rank_id='$plan->id'");
                if(!$check_exists){
                    $rank=array();
                    $rank['rank']=$plan->rank;
                    $rank['u_code']=$u_code;
                    $rank['rank_per']=$plan->r_per;
                    $rank['rank_id']=$plan->id;
                    $rank['is_complete']=1;
                    $rank['complete_date']=date('Y-m-d H:i:s');
                    $this->db->insert('rank',$rank);
                    
                    $free_pin=4;
                    for($f=0;$f<$free_pin;$f++){
                        $pin=random_string('alnum', 14);
                        $insert_pin=array();
                        $insert_pin['pin']=$pin;
                        $insert_pin['u_code']=$u_code;
                        $insert_pin['status']=1;
                        $insert_pin['use_status']=0;
                        $insert_pin['pin_type']='free_pin';
                        $this->db->insert('epins',$insert_pin);
                    }
                    $sponsor=$this->profile->sponsor($u_code);
                    if($sponsor){
                        $this->rank_check_nxt($sponsor,3);
                    }
                }
            }
        }
        
        

    }
    
    public function rank_check_nxt($u_code,$rank_id){
        $plan=$this->conn->runQuery('*','plan',"id='$rank_id'")[0];
        if($rank_id==3){
            $rank_ids=$this->team->downline_rank_team($u_code,27);
            if(!empty($rank_ids) && count($rank_ids)>=3){
                $check_exists=$this->conn->runQuery('*','rank',"u_code='$u_code' and rank_id='$plan->id'");
                if(!$check_exists){
                    $rank=array();
                    $rank['rank']=$plan->rank;
                    $rank['u_code']=$u_code;
                    $rank['rank_per']=$plan->r_per;
                    $rank['rank_id']=$plan->id;
                    $rank['is_complete']=1;
                    $rank['complete_date']=date('Y-m-d H:i:s');
                    $this->db->insert('rank',$rank);
                    $sponsor=$this->profile->sponsor($u_code);
                    if($sponsor){
                        $this->rank_check_nxt($sponsor,4);
                    }
                }
            }
            $check_order=$this->conn->runQuery('SUM(order_bv) as amnt','orders',"u_code='$u_code' and status='1'");
            if($check_order && $check_order[0]->amnt!='' && $check_order[0]->amnt>=$plan->required_business){
                
                $check_exists=$this->conn->runQuery('*','rank',"u_code='$u_code' and rank_id='$plan->id'");
                if(!$check_exists){
                    $rank=array();
                    $rank['rank']=$plan->rank;
                    $rank['u_code']=$u_code;
                    $rank['rank_per']=$plan->r_per;
                    $rank['rank_id']=$plan->id;
                    $rank['is_complete']=1;
                    $rank['complete_date']=date('Y-m-d H:i:s');
                    $this->db->insert('rank',$rank);
                    
                    $free_pin=12;
                    for($f=0;$f<$free_pin;$f++){
                        $pin=random_string('alnum', 14);
                        $insert_pin=array();
                        $insert_pin['pin']=$pin;
                        $insert_pin['u_code']=$u_code;
                        $insert_pin['status']=1;
                        $insert_pin['use_status']=0;
                        $insert_pin['pin_type']='free_pin';
                        $this->db->insert('epins',$insert_pin);
                    }
                    $sponsor=$this->profile->sponsor($u_code);
                    if($sponsor){
                        $this->rank_check_nxt($sponsor,4);
                    }
                }
            }
            
        }
        if($rank_id==4){
            $rank_ids=$this->team->downline_rank_team($u_code,37);
            if(!empty($rank_ids) && count($rank_ids)>=4){
                $check_exists=$this->conn->runQuery('*','rank',"u_code='$u_code' and rank_id='$plan->id'");
                if(!$check_exists){
                    $rank=array();
                    $rank['rank']=$plan->rank;
                    $rank['u_code']=$u_code;
                    $rank['rank_per']=$plan->r_per;
                    $rank['rank_id']=$plan->id;
                    $rank['is_complete']=0;
                    $this->db->insert('rank',$rank);
                    
                }
            }
            $check_order=$this->conn->runQuery('SUM(order_bv) as amnt','orders',"u_code='$u_code' and status='1'");
            if($check_order && $check_order[0]->amnt!='' && $check_order[0]->amnt>=$plan->required_business){
                
                $check_exists=$this->conn->runQuery('*','rank',"u_code='$u_code' and rank_id='$plan->id'");
                if(!$check_exists){
                    $rank=array();
                    $rank['rank']=$plan->rank;
                    $rank['u_code']=$u_code;
                    $rank['rank_per']=$plan->r_per;
                    $rank['rank_id']=$plan->id;
                    $rank['is_complete']=0;
                    $this->db->insert('rank',$rank);
                }
            }
            
        }
        if($rank_id==3){
            $sponsor=$this->profile->sponsor($u_code);
            if($sponsor){
                $this->rank_check_nxt($sponsor,$rank_id);
            }
        }
        
    }
    
    public function gen_distribute($u_code,$my_rank_per,$amnt){
        
        ///////////////// plan //////////////
        $plan=$this->gen_plan;
        $ben_from=$u_code;
        $source='gen';
        $nxt='yes';
        $lvl=1;
        $currenct_payout_id=$this->wallet->currenct_payout_id();
        
        while ($nxt=='yes') {
            $nxt='no';
            $rankper=$this->profile->my_rank_per($u_code);

            $curr_business=$this->conn->runQuery('SUM(order_bv) as sm','orders',"u_code='$u_code' and payout_id='$currenct_payout_id'")[0]->sm;
            if($curr_business!='' && $curr_business>=2251){
                if($rankper>=$my_rank_per){
                    
                    $directs=$this->team->my_actives($u_code);
                    if(!empty($directs)){
                        $dir_implode=implode(',',$directs);
                        $check_directs=$this->conn->runQuery('*','rank',"u_code IN ($dir_implode) and is_complete='1' and rank_per>='$my_rank_per'");
                        if($check_directs && count($check_directs)>=2){
                            $dir3=$plan[2];                     
                        }else{
                            $dir3=$plan[1];
                        }
    
                        if(array_key_exists($my_rank_per,$dir3)){
                            $pay_per=$dir3[$my_rank_per];
                            if(array_key_exists($lvl,$pay_per)){
                                $persnt=$pay_per[$lvl];
                                $payable=$amnt*$persnt/100;
                                if($payable>0){
                                    $income=array();
                                    $income['tx_u_code']=$ben_from;
                                    $income['u_code']=$u_code;
                                    $income['tx_type']='income';
                                    $income['source']=$source;
                                    $income['debit_credit']='credit';
                                    $income['amount']=$payable;
                                    $income['date']=date('Y-m-d H:i:s');
                                    $income['status']=1;
                                    $income['payout_id']=$currenct_payout_id;
                                    $income['user_prsnt']=$my_rank_per;
                                    $income['distribute_per']=$persnt;
                                    $income['remark']="Recieve $source income of amount $payable from level $lvl";
                                    $this->db->insert('transaction',$income);
                                    $lvl++;
                                }
                            }                    
                        }
                    }
                }
            }
            $u_code=$this->profile->sponsor($u_code);
            if($lvl<=5 && $u_code){
                $nxt='yes'; 
            }
            
            
        }       
        
    }
    
    
}

