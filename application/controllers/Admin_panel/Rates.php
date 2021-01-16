<?php
class Rates extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        
        $this->show->admin_panel('rates_live');
    } 
    
    public function set_live_rate(){
        
        $id=$_POST['rate_id'];
        $live_rate=$_POST['live_rate'];
        
        $get_rate=$this->conn->runQuery('*','live_rates',"id='$id'");
        $metal_name=$get_rate[0]->metal_name;
        $type=$get_rate[0]->type;
        if($metal_name=='gold' && $type=='24kt'){
            $kt18=$live_rate*76/100;
            $this->db->set('unit_rate',$kt18);
            $this->db->where('metal_name','gold');
            $this->db->where('type','18kt');
            $this->db->update('live_rates'); 
            
            $kt14=$live_rate*60/100;
            $this->db->set('unit_rate',$kt14);
            $this->db->where('metal_name','gold');
            $this->db->where('type','14kt');
            $this->db->update('live_rates');
            
        }
        
        $this->db->set('unit_rate',$live_rate);
        $this->db->where('id',$id);
        $this->db->update('live_rates');
       // print_r($this->db->last_query());
    }

    public function set_diamond_option_rate(){
        
        $get_rates=$this->conn->runQuery('*','product_add_features',"slug='diamond_option'");
        $inputdiamond_type=$_POST['diamond_type'];
        $live_rate=$_POST['live_rate'];

                if($get_rates){

                    $val_from='diamond';
                    $feature_requirements=$get_rates[0]->feature_requirements;
                    
                    $requirements = $feature_requirements!='' ? json_decode($feature_requirements, true):array();
                    $all_diamond_type=!empty($requirements) && array_key_exists($val_from,$requirements) ? $requirements[$val_from]:array();
                    


                    if(!empty($all_diamond_type)){
                        foreach($all_diamond_type as $d_key=>$diamond_type){
                            $newval[$d_key]=$diamond_type;
                            if($inputdiamond_type==$d_key){
                                $newval[$d_key]=$live_rate;
                            }                          
                        }
                    }
                    $requirements[$val_from]=$newval;
                    $uopdate_rate['feature_requirements']=json_encode($requirements);
                    $this->db->where('slug','diamond_option');
                    $this->db->update('product_add_features',$uopdate_rate);

                }

        
        
    }


}