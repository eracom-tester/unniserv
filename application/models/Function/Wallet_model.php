<?php
class Wallet_model extends CI_Model{

    public function currenct_payout_id(){
        $payout_id=$this->conn->runQuery('MAX(id) as payout_id','company_payout',"1=1")[0]->payout_id;
        $new_p_id= $payout_id!='' ? $payout_id+1:1;
        return $new_p_id;
    }
   
    public function currenct_franchise_payout_id(){
        $max_payout_id=$this->conn->runQuery('MAX(payout_id) as max_pay_id','transaction_franchise',"tx_type='payout'")[0]->max_pay_id;
        $new_p_id= $max_payout_id!='' ? $max_payout_id+1:1;
        return $new_p_id;
    }
    
    public function debit($usrId,$params=array()){
        $transaction=0;
            $this->db->select('SUM(amount) as total,SUM(tx_charge) as charges');            
            $this->db->where('u_code',$usrId);
            $this->db->where('debit_credit','debit');
            if(array_key_exists("tx_type", $params)){                
                $txs_type=$params['tx_type'];
                if(is_array($txs_type)){
                    $this->db->where_in('tx_type',$txs_type);   
                }else{
                    $this->db->where('tx_type',$txs_type);
                }
            }            

            if(array_key_exists("status", $params)){                
                $status=$params['status'];
                if(is_array($status)){
                    $this->db->where_in('status',$status);   
                }else{
                    $this->db->where('status',$status);
                }
            }else{
                $this->db->where('status',1);
            }            
            
            if(array_key_exists("wallet_type", $params)){
                $this->db->where('wallet_type',$params['wallet_type']);
            }

            $res=$this->db->get('transaction');
            if($res->num_rows()>0){
                $transaction=$res->row()->total+$res->row()->charges;
            }
            //print_r($this->db->last_query());
            return  $transaction;
    }

    public function credit($usrId,$params=array()){
        $transaction=0;
            $this->db->select('SUM(amount) as total,SUM(tx_charge) as charges');            
            $this->db->where('u_code',$usrId);
            $this->db->where('debit_credit','credit');
            if(array_key_exists("tx_type", $params)){                
                $txs_type=$params['tx_type'];
                if(is_array($txs_type)){
                    $this->db->where_in('tx_type',$txs_type);   
                }else{
                    $this->db->where('tx_type',$txs_type);
                }
            }            

            if(array_key_exists("status", $params)){                
                $status=$params['status'];
                if(is_array($status)){
                    $this->db->where_in('status',$status);   
                }else{
                    $this->db->where('status',$status);
                }
            }else{
                $this->db->where('status',1);
            }            
            
            if(array_key_exists("wallet_type", $params)){
                $this->db->where('wallet_type',$params['wallet_type']);
            }

            $res=$this->db->get('transaction');
            if($res->num_rows()>0){
                $transaction=$res->row()->total-$res->row()->charges;
            }
            return  $transaction;
    }
        
    public function income($usrId,$wallet_type){
        $rcv=$this->conn->runQuery('*','wallet_types',"count_in_wallet='$wallet_type' and status='1' and wallet_type='income'");
        $transaction=0;
        if($rcv){
            $incomes=array_column($rcv,'slug');
            $this->db->select('(sum(amount)-sum(tx_charge)) as total');
            $this->db->where('wallet_type',$wallet_type);
            $this->db->where('u_code',$usrId);
            $this->db->where_in('source',$incomes);
            $this->db->where('status',1);
            $res=$this->db->get('transaction');
            if($res->num_rows()>0){
                $transaction=$res->row()->total;
            }
        }

        return $transaction;    			
    }

    public function total_income($usrId,$source){
        $transaction=0;
        $this->db->select('sum(amount) as total');
        $this->db->where('u_code',$usrId);
        $this->db->where('source',$source);
        $this->db->where('status',1);
        $res=$this->db->get('transaction');
        if($res->num_rows()>0){
            $transaction=$res->row()->total;
        }
        return $transaction;
    }
    
   
    
    
	public function balance($usrId,$wallet_type='main_wallet'){
        $credit['tx_type']=array('admin_credit','transfer','added_btc','convert_recieve');
        $credit['wallet_type']=$wallet_type;
        
        $debit['tx_type']=array('transfer','withdrawal','pin_purchase','topup','product_purchase','payout','convert_send');
        $debit['wallet_type']=$wallet_type;
        $debit['status']=array(1,0);
        
        $income=$this->income($usrId,$wallet_type);
        $total_income=$this->total_income($usrId,$wallet_type);

        $totalcredit=$this->credit($usrId,$credit);
        $totaldebit=$this->debit($usrId,$debit);

        return $totalcredit-$totaldebit+$income+$total_income;


    }
    
    public function paid_earning($usrId,$tx_type){
        $paid_amts=$this->conn->runQuery('SUM(amount) as amt','transaction',"u_code='$usrId' and tx_type='$tx_type' and status='1'")[0]->amt;
        $ttl_amt= $paid_amts!='' ? $paid_amts:0;
        return $ttl_amt;
    }
    public function payable_earning($usrId,$tx_type){
        $paid_amts=$this->conn->runQuery('SUM(amount) as amt','transaction',"u_code='$usrId' and tx_type='$tx_type' and status='0'")[0]->amt;
        $ttl_amt= $paid_amts!='' ? $paid_amts:0;
        return $ttl_amt;
    }
    
    public function generated_payout_by_income($u_code,$source){
        $paid_amts=$this->conn->runQuery('(SUM(amount)-SUM(tx_charge)) as amt','transaction',"u_code='$u_code' and tx_type='income' and payout_status='1' and source='$source'")[0]->amt;
        $ttl_amt= $paid_amts!='' ? $paid_amts:0;
        return $ttl_amt;
    }
    public function pending_payout_by_income($u_code,$source){
        $paid_amts=$this->conn->runQuery('(SUM(amount)-SUM(tx_charge)) as amt','transaction',"u_code='$u_code' and tx_type='income' and payout_status='0' and source='$source'")[0]->amt;
        $ttl_amt= $paid_amts!='' ? $paid_amts:0;
        return $ttl_amt;
    }
   
    
    
    
}

