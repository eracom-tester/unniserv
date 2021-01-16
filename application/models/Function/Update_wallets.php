<?php
class Update_wallets extends CI_Model{

    public function update_wallet($u_code,$slug,$value){

        $column=$this->get_column($slug);       

       if($column!=false){
            $wallet[$column]=$value;
            $wallet_exists=$this->conn->runQuery("$column",'user_wallets',"u_code='$u_code'");            
            if($wallet_exists){               
               
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
    public function direct_update($u_code){
        $directs=$this->team->directs($u_code);
        
        $my_actives=$this->team->my_actives($u_code);

        $update=array();
        $total=!empty($directs) ? count($directs):0;
        $c1=$this->get_column('total_directs');
        if($c1!=false){
            $update[$c1]=$total;
        }
        $my_actives_ttl=!empty($my_actives) ? count($my_actives):0;
        $c2=$this->get_column('active_directs');
        if($c2!=false){
            $update[$c2]=$my_actives_ttl;
        }
        
        $inactive=$total-$my_actives_ttl;
        $c3=$this->get_column('inactive_directs');
        if($c3!=false){
            $update[$c3]=$inactive;
        }

        $this->db->where('u_code',$u_code);
        $this->db->update('user_wallets',$update);

        $sponsor=$this->profile->sponsor($u_code);
        if($sponsor){
            $this->direct_update($sponsor);
        }
    }

    public function generation_update($u_code){

        $actives=$this->team->actives();
        $my_generation=$this->team->my_generation($u_code);

        $active_gen=!empty($my_generation) ? array_intersect($my_generation,$actives):array();

        $update=array();
        if(!empty($my_generation)){
            $cnt_gen=count($my_generation);
            $c1=$this->get_column('total_gen');
            $update[$c1]=$cnt_gen;
        }
         
        if(!empty($active_gen)){
            $cnt_activegen=count($active_gen);
            $c2=$this->get_column('active_gen');
            $update[$c2]=$cnt_activegen;
        }

        $this->db->where('u_code',$u_code);
        $this->db->update('user_wallets',$update);

        $sponsor=$this->profile->sponsor($u_code);
        if($sponsor){
            $this->generation_update($sponsor);
        }

    }
    public function active_direct($u_code){
       // $this->add_amnt($u_code,'total_directs',1);
        $this->add_amnt($u_code,'active_directs',1);
        $this->add_amnt($u_code,'inactive_directs',-1);        
    }
    public function add_direct($u_code){
        $this->add_amnt($u_code,'total_directs',1);        
        $this->add_amnt($u_code,'inactive_directs',1);        
    }

    public function active_gen($u_code){
        //$this->add_amnt($u_code,'total_gen',1);
        $this->add_amnt($u_code,'active_gen',1);
        $sponsor=$this->profile->sponsor($u_code);
        if($sponsor){
            $this->active_gen($sponsor);
        }                
    }    
    public function add_gen($u_code){
        $this->add_amnt($u_code,'total_gen',1);
        // $this->add_amnt($u_code,'active_gen',1);
        $sponsor=$this->profile->sponsor($u_code);
        if($sponsor){
            $this->add_gen($sponsor);
        }                
    }
    public function add_pin($u_code,$no_of_pins=1){
        $this->add_amnt($u_code,'total_pins',$no_of_pins);
        $this->add_amnt($u_code,'unused_pins',$no_of_pins);
    }
    public function used_pin($u_code,$no_of_pins=1){
        //$this->add_amnt($u_code,'total_pins',$no_of_pins);
        $this->add_amnt($u_code,'unused_pins',-$no_of_pins);
    }

    public function update_binary($u_code){

        $left_team=$this->team->team_by_position($u_code,'1');
        $right_team=$this->team->team_by_position($u_code,'2');
        $update=array();
        if(!empty($left_team)){
            $left_team_cnt=count($left_team);
            $c1=$this->get_column('left_team');
            $update[$c1]=$left_team_cnt;
        }
        if(!empty($right_team)){
            $right_team_cnt=count($right_team);
            $c2=$this->get_column('right_team');
            $update[$c2]=$right_team_cnt;
        }
        $this->db->where('u_code',$u_code);
        $this->db->update('user_wallets',$update);

        $sponsor=$this->profile->sponsor($u_code);
        if($sponsor){
            $this->update_binary($sponsor);
        }

    }
    public function update_single_leg($u_code,$active_id){
        $c2=$this->get_column('single_leg_team');
        $this->db->set($c2, "$c2+1", FALSE);
        $this->db->where("active_id<'$active_id'");
        $this->db->where("active_id!='0'");
        $this->db->update('user_wallets');
       
    }

}

