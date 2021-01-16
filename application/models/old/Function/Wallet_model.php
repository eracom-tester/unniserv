<?php
class Wallet_model extends CI_Model{


   
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
            $this->db->select('sum(amount) as total,SUM(tx_charge) as charges');
            $this->db->where('wallet_type',$wallet_type);
            $this->db->where('u_code',$usrId);
            $this->db->where_in('source',$incomes);
            $this->db->where('status',1);
            $res=$this->db->get('transaction');
            if($res->num_rows()>0){
                $transaction=$res->row()->total-$res->row()->charges;
            }
        }

        return $transaction;    			
    }

    public function total_income($usrId,$source){
        $transaction=0;
        $this->db->select('sum(amount) as total,SUM(tx_charge) as charges');
        $this->db->where('u_code',$usrId);
        $this->db->where('source',$source);
        $this->db->where('status',1);
        $res=$this->db->get('transaction');
        if($res->num_rows()>0){
            $transaction=$res->row()->total-$res->row()->charges;
        }
        return $transaction;
    }

	public function balance($usrId,$wallet_type='main_wallet'){
        $credit['tx_type']=array('admin_credit','transfer','added_btc');
        $credit['wallet_type']=$wallet_type;
        
        $debit['tx_type']=array('transfer','withdrawal','pin_purchase','topup');
        $debit['wallet_type']=$wallet_type;
        $debit['status']=array(1,0);
        
        $income=$this->income($usrId,$wallet_type);
        $total_income=$this->total_income($usrId,$wallet_type);

        $totalcredit=$this->credit($usrId,$credit);
        $totaldebit=$this->debit($usrId,$debit);

        return round(($totalcredit-$totaldebit+$income+$total_income),2);


    }
    
}

