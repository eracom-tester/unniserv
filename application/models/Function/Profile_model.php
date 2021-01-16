<?php
class Profile_model extends CI_Model{
    public function id_by_username($username){
        
        $res=$this->conn->runQuery('id','users',array('username'=>$username));
        if($res){
            return $res[0]->id;
        }else{
             return false;
        }
        
    }
    
    
    public function my_rank_per($_code){
        $res=$this->conn->runQuery('rank_per','rank',"u_code='$_code' and is_complete='1'  order by rank_per desc");
        if($res){
            return $res[0]->rank_per;
        }else{
             return 0;
        }
    }
    public function my_rank($_code){
        $res=$this->conn->runQuery('rank_id','rank',"u_code='$_code' and is_complete='1'  order by rank_id desc");
        if($res){
            return $res[0]->rank_id;
        }else{
             return false;
        }
    }
    public function my_rank_arr($_code,$rank_id){
        $res=$this->conn->runQuery('*','rank',"u_code='$_code' and rank_id='$rank_id' and is_complete='1' ");
        if($res){
            return $res[0];
        }else{
             return false;
        }
    }

    public function profile_info($id,$param='*'){        
        $res=$this->conn->runQuery($param,'users',array('id'=>$id));
        if($res){
            return $res[0];
        }else{
             return false;
        }        
    }
    public function franchise_info($id,$param='*'){        
        $res=$this->conn->runQuery($param,'franchise_users',array('id'=>$id));
        if($res){
            return $res[0];
        }else{
             return false;
        }        
    }
    
    public function sponsor($userid){
        $sponsor=$this->conn->runQuery('u_sponsor','users',"id='$userid'");
        $ret = ($sponsor && $sponsor[0]->u_sponsor!=0 && $sponsor[0]->u_sponsor!='' ? $sponsor[0]->u_sponsor:false);
        return $ret;
    }

    public function sponsor_info($userid,$param='*'){
        $ret=false;
        $sponsor = $this->sponsor($userid);
        if($sponsor){
            $res=$this->conn->runQuery($param,'users',array('id'=>$sponsor));
            if($res){
                $ret = $res[0];
            }
        }
        return $ret;
    }

    public function column_like($str,$column){
        $res=$this->conn->runQuery("id",'users',"$column LIKE '%$str%'");
        return ($res ? array_column($res,'id'):array());
    }
    public function column_like_franchise($str,$column){
        $res=$this->conn->runQuery("id",'franchise_users',"$column LIKE '%$str%'");
        return ($res ? array_column($res,'id'):array());
    }
}

