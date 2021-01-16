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
    

    public function profile_info($id,$param='*'){        
        $res=$this->conn->runQuery($param,'users',array('id'=>$id));
        if($res){
            return $res[0];
        }else{
             return false;
        }        
    }
    
    public function sponsor($userid){
        $sponsor=$this->conn->runQuery('u_sponsor','users',"id='$userid'");
        $ret = ($sponsor ? $sponsor[0]->u_sponsor:false);
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
    
    public function ids_from_users($str,$column,$table){
        $res=$this->conn->runQuery("id",'users',"(username LIKE '%$str%') or (name  LIKE '%$str%')");
        $ret = ($res ? array_column($res,'id'):array());
        if(!empty($ret)){
            $this->db->start_cache();
            
            $this->db->from($table);
            $this->db->where_in($column,$ret);
            $this->db->stop_cache();
            return $this;
        }
    }
    
}

