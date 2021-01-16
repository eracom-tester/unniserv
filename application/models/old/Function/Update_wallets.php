<?php
class Update_wallets extends CI_Model{

    public function update_wallet($u_code,$slug,$value){

        $column=$this->get_column($slug);       

       if($column!=false){
            $wallet_exists=$this->conn->runQuery("$column",'user_wallets',"u_code='$u_code'");            
            if($wallet_exists){
                $wallet[$column]=$value;
                $this->db->where('u_code',$u_code);
                $this->db->update('user_wallets',$wallet);
            }else{
                $wallet['u_code']=$u_code;
                $this->db->insert('user_wallets',$wallet);
            }
       }          
    }
    
    
    public function get_column($type){
        $ret=false;
        $get=$this->conn->runQuery('*','wallet_types',"slug='$type' and status='1'");
        if($get){
            $ret = $get[0]->wallet_column;
        }
        return $ret;
    }
    
    public function add_amnt($u_code,$slug,$amnt){
        $column=$this->get_column($slug);
        $wallet_exists=$this->conn->runQuery("$column",'user_wallets',"u_code='$u_code'"); 
         
        if($wallet_exists){
            $this->db->set($column, "$column+$amnt", FALSE);
            $this->db->where('u_code',$u_code);
            $this->db->update('user_wallets');
        }else{
            $wallet[$column]=$amnt;
            $wallet['u_code']=$u_code;
            $this->db->insert('user_wallets',$wallet);
        }
        return true;
        
    }
    public function wallet($u_code,$slug){
        $ret=0;
        $column=$this->get_column($slug);
        $wallet_exists=$this->conn->runQuery("$column",'user_wallets',"u_code='$u_code'"); 
        if($wallet_exists){
            $ret = $wallet_exists[0]->$column;
        }
        return $ret;
    }
    
    

}

