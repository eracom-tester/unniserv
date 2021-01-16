<?php
class Database_model extends CI_Model{
   
    public function runQuery($select,$table,$where){
       
        $this->db->select($select);
        $this->db->where($where);
        $res= $this->db->get($table);
         if($res->num_rows()>0){
            return  $res->result();
        }else{
             return false;
        }   
        
    }   
    
    public function get_insert_id($table,$insertdata){
         if($this->db->insert($table,$insertdata)){
              return $this->db->insert_id();
         }else{
              return false;
         }        
    }
   
    
    public function update_query($table,$set,$where){        
        if($this->db->update($table, $set, $where)){
            return true; 
        }else{
            return false; 
        }
        print_r($this->db->last_query());
    }
   
     public function company_info($label){
        $this->session->unset_userdata('company_info');
        if($this->session->has_userdata('company_info') && array_key_exists($label,$this->session->userdata('company_info'))){
            $res=$this->session->userdata('company_info');
            return $res[$label];
        }else{ 
            $res=$this->runQuery('value,label','company_info',"status='1'");
            if($res){
                $arr=array_column($res,'value','label');
                $this->session->set_userdata('company_info',$arr);
                if(array_key_exists($label,$arr)){
                    return $arr[$label];    
                }else{
                    return false;
                }
                 
            }else{
                return false;
            }  
        }      
    }
    
     public function setting($label){
        $this->session->unset_userdata('advance_setting');
        if($this->session->has_userdata('advance_setting') && array_key_exists($label,$this->session->userdata('advance_setting'))){
            $res=$this->session->userdata('advance_setting');
            return $res[$label];
        }else{ 

        $res=$this->runQuery('value,label','advanced_info',"status='1'");
        if($res){
                $arr=array_column($res,'value','label');
                $this->session->set_userdata('advance_setting',$arr);
                if(array_key_exists($label,$arr)){
                    return $arr[$label];    
                }else{
                    return false;
                }
                 
            }else{
                return false;
            }  
        }      
    }

    public function plan_setting_old($param){        
        $this->session->unset_userdata('plan_setting');
        if($this->session->has_userdata('plan_setting') && array_key_exists($param,$this->session->userdata('plan_setting'))){
            $res=$this->session->userdata('plan_setting');
            return $res->$param;
        }else{            
            $reg_type=$this->session->userdata('reg_plan');
            $res=$this->runQuery("*",'website_settings',"status='1' and website_type='$reg_type'");
            if($res){
                
                $this->session->set_userdata('plan_setting',$res[0]);
                return $res[0]->$param;   
            }else{
                return false;
            } 
        }     

    }
    
    public function plan_setting($param){ 
        $rreg_type=$this->conn->setting('reg_type');
        $this->session->set_userdata('reg_plan',$rreg_type);
        $reg_type=$this->session->userdata('reg_plan');//$this->setting('reg_type');
        
        $res=$this->runQuery($reg_type,'website_settings',"slug='$param'");
           
        if($res){
              
            return $res[0]->$reg_type;         
        }else{
            return false;
        }      

    }

    
    function getRows($params = array()){
        
        
        
        
        if(array_key_exists("from_table", $params)){
			$this->db->from($params['from_table']);            
        }

        if(array_key_exists("where", $params)){
			$this->db->where($params['where']);            
        }

        if(array_key_exists("conditions", $params)){	
          $this->db->group_start();
          foreach($params['conditions'] as $key => $val){
           if(is_array($val)){
            $this->db->where_in($key, $val);
           }else{
                $this->db->where($key, $val);
           }
                  
          }
          $this->db->group_end();
        }

        if(array_key_exists("or_conditions", $params)){	
          $this->db->group_start();
          foreach($params['or_conditions'] as $key => $val){
            if(is_array($val)){
                    $this->db->or_where_in($key, $val);
            }else{            
                    $this->db->or_where($key, $val);
            }                  
          }
          $this->db->group_end();
        }   
        
        
        if(array_key_exists("likecondition", $params)){	
        $this->db->group_start();
          foreach($params['likecondition'] as $key => $val){    
            $this->db->like($key, $val);      
          }
          $this->db->group_end();
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            
            if(array_key_exists("select", $params)){
    			$this->db->select($params['select']);            
            }else{
                $this->db->select('*');
            }
            
            if(array_key_exists("order_by",$params)){
                $orby=$params["order_by"];
                $this->db->order_by($orby);
            }else{
                //$this->db->order_by('id asc');
            }
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //print_r($this->db->last_query());
        //die();
        // Return fetched data
        return $result;
    }
    
    public function server_time(){
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = time();
        $date_time = date("d-m-Y (D) H:i:s", $timestamp);
        echo "<b>Server Time: $date_time</b>";
    }
    
    
}

