<?php
class Unit_convert_model extends CI_Model{
    
    public function convert($from,$to,$value=1,$type='mass'){
        $get_value=$this->conn->runQuery('*','unit_converter',"from_unit='$from' and to_unit='$to' and type='$type'");
        $ret=0;
        if($get_value){
            $per_unit_value=$get_value[0]->value / $get_value[0]->per ;
            $ret=$value*$per_unit_value;
        }
        return $ret;
    }
}

