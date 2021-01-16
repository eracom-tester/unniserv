<?php
class Distribute_model extends CI_Model{


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
                $source = ($l==1 ? 'direct' : "level");

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
                

                if($payable>0 && $code!='' ){
                    $income['tx_u_code']=$ben_from;
                    $income['u_code']=$code;
                    $income['tx_type']='income';
                    $income['source']=$source;
                    $income['debit_credit']='credit';
                    $income['amount']=$payable;
                    $income['date']=date('Y-m-d H:i:s');
                    $income['status']=1;
                    $income['remark']="Recieve $source income of amount $payable from $name ($username) from level $l";
                    //$this->db->insert('transaction',$income);
                    $incomes[]=$income;
                    
                }

                
                if($l>=$no_of_levels){
                    break;
                }
                $l++;
            }

        }
               
        
if(!empty($incomes)){    
    $this->db->insert_batch('transaction',$incomes);
}

    }

}

