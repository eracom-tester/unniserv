<?php
class Binary_model extends CI_Model{
   
    public function new_parent($node,$position){
        
        $left_array_qr=$this->conn->runQuery("id,Parentid,position",'users',"position='$position'");
        $left_array=(!empty($left_array_qr) ? array_column($left_array_qr,'Parentid','id'):array());
        if(!empty($left_array)){
            while(in_array($node,$left_array)){
                $node=array_search($node,$left_array);
            }
        }        
        return $node;
    }

    function get_legs($id){
        $get_tree=$this->conn->runQuery("id,matrix_position",'users',"matrix_pool='$id' order by matrix_position asc");
        if($get_tree){
            $res['legs']=count($get_tree);
            $res['leg_users']=array_column($get_tree,'id');
        }else{
            $res['legs']=0; 
            $res['leg_users']=array();
        }
        return $res;
        unset($get_tree);
    }
    
    function get_matrix_parent($donee){
        $result='fail';
        $a[]=$donee;
        $i=0;
        $go='yes';
        while($go=='yes'){
           $parent=$a[$i];
           //echo "<br>";
           $check_legs=$this->get_legs($parent);
           $legs=$check_legs['legs'];
           $mtrx=$this->conn->setting('matrix_node');
           if($legs<$mtrx){
               $result='success';
               $postion=$legs+1;
               $go='no';
               break;
           }else{
               $go='yes';
               $a=array_merge($a,$check_legs['leg_users']);
               $i++;
           }
        }
        unset($a);
        return array('result'=>$result,'parent'=>$parent,'position'=>$postion);
    }
}

