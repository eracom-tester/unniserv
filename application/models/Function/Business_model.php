<?php
class Business_model extends CI_Model{
    public function package($ids){
       
        $bv_qr=$this->conn->runQuery('SUM(order_bv) as total_bv','orders',"u_code='$ids' and status='1' and tx_type='investment' ");
        $ret = ($bv_qr[0]->total_bv!='' ? $bv_qr[0]->total_bv:0);
        return $ret;
    }
    
    public function business_volume($ids){
        if(is_array($ids)){
           $users= $ids;
        }else{
            $users = array($ids);
        }
        $implode=implode(',',$users);
        $bv_qr=$this->conn->runQuery('SUM(order_bv) as total_bv','orders',"u_code IN ($implode) and status='1' ");
        $ret = ($bv_qr[0]->total_bv!='' ? $bv_qr[0]->total_bv:0);
        return $ret;
    }
    
    
    
    public function last_session_bv($ids){
        $currenct_payout_id=$this->wallet->currenct_payout_id();
        $last_id=$currenct_payout_id-1;
        
        if(is_array($ids)){
           $users= $ids;
        }else{
            $users = array($ids);
        }
        $implode=implode(',',$users);
        $bv_qr=$this->conn->runQuery('SUM(order_bv) as total_bv','orders',"u_code IN ($implode) and status='1' and payout_id='$last_id' ");
        $ret = ($bv_qr[0]->total_bv!='' ? $bv_qr[0]->total_bv:0);
        return $ret;
    }
    
    public function previous_bv($ids){
        $currenct_payout_id=$this->wallet->currenct_payout_id();
        if(is_array($ids)){
           $users= $ids;
        }else{
            $users = array($ids);
        }
        $implode=implode(',',$users);
        $bv_qr=$this->conn->runQuery('SUM(order_bv) as total_bv','orders',"u_code IN ($implode) and status='1' and payout_id<'$currenct_payout_id' ");
        $ret = ($bv_qr[0]->total_bv!='' ? $bv_qr[0]->total_bv:0);
        return $ret;
    }
    
    public function current_session_bv($ids){
        $currenct_payout_id=$this->wallet->currenct_payout_id();
        if(is_array($ids)){
           $users= $ids;
        }else{
            $users = array($ids);
        }
        $implode=implode(',',$users);
        $bv_qr=$this->conn->runQuery('SUM(order_bv) as total_bv','orders',"u_code IN ($implode) and status='1' and payout_id='$currenct_payout_id' ");
        $ret = ($bv_qr[0]->total_bv!='' ? $bv_qr[0]->total_bv:0);
        return $ret;
    }
    
    public function top_legs($user_id){
        $directs=$this->team->my_actives($user_id);
       
        $dir=array();
        if(!empty($directs)){
            foreach($directs as $direct_details){
                $my_generation_with_personal=array();
                $my_generation_with_personal=$this->team->my_generation_with_personal($direct_details);
                if(!empty($my_generation_with_personal)){
                    $implode=implode(',',$my_generation_with_personal);
                    $personal_bv_qr=$this->conn->runQuery('SUM(order_bv) as total_bv','orders',"u_code IN ($implode)  and status='1'");
                    $ret = ($personal_bv_qr[0]->total_bv!='' ? $personal_bv_qr[0]->total_bv:0);
                    if($ret>0){
                        $dir[$direct_details]=$ret;
                    }
                }
            }
            
        }
        if(!empty($dir)){
            rsort($dir);
        }
        return $dir;
    }
    
    public function purchase_volume_by_date($ids,$start_date='',$end_date=''){
        $whr=' AND';
        if($start_date!='' && $end_date!='' ){
            $start_date=date('Y-m-d 00:00:00',strtotime($start_date));
            $end_date=date('Y-m-d 23:59:00',strtotime($end_date));
        	          
			$whr .= " added_on>='$start_date' and added_on<='$end_date' AND";
		}
        $where = rtrim($whr,"AND");
        
        if(is_array($ids)){
           $users= $ids;
        }else{
            $users = array($ids);
        }
        $implode=implode(',',$users);
        $bv_qr=$this->conn->runQuery('SUM(order_bv) as total_bv','orders',"tx_type='investment' and u_code IN ($implode) and status='1' $where");
        $ret = ($bv_qr[0]->total_bv!='' ? $bv_qr[0]->total_bv:0);
        return $ret;
    }
    
    public function repurchase_volume_by_date($ids,$start_date='',$end_date=''){
        $whr=' AND';
        if($start_date!='' && $end_date!='' ){
            $start_date=date('Y-m-d 00:00:00',strtotime($start_date));
            $end_date=date('Y-m-d 23:59:00',strtotime($end_date));
        	          
			$whr .= " added_on>='$start_date' and added_on<='$end_date' AND";
		}
        $where = rtrim($whr,"AND");
        
        if(is_array($ids)){
           $users= $ids;
        }else{
            $users = array($ids);
        }
        $implode=implode(',',$users);
        $bv_qr=$this->conn->runQuery('SUM(order_bv) as total_bv','orders',"tx_type!='investment' and u_code IN ($implode) and status='1' $where");
        $ret = ($bv_qr[0]->total_bv!='' ? $bv_qr[0]->total_bv:0);
        return $ret;
    }
    
    
}

