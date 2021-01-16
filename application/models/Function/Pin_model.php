<?php
class Pin_model extends CI_Model{
   
    public function pin_details($pin_type){
        $pin_details=$this->conn->runQuery('*','pin_details',"status=1 and pin_type='$pin_type'");
        return ($pin_details ? $pin_details[0]:false);
    }

    public function user_pins_by_type($user,$type){
        if($this->pin_details($type)){
           return $this->conn->runQuery("*",'epins',"status=1 and u_code='$user' and use_status='0' and pin_type='$type'");           
        }else{
            $ret = false;
        }
    }
    
      public function package_details($pin_type){
        $pin_details=$this->conn->runQuery('*','package_details',"status=1 and pin_type='$pin_type'");
        return ($pin_details ? $pin_details[0]:false);
    }

}

