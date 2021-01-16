<?php
class Team extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('team_section')!=1){
            $panel_path=$this->conn->company_info('panel_path');
            redirect(base_url($panel_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }
         $this->panel_url=$this->conn->company_info('panel_path');
    }

    public function team_direct(){
        $data['limit']=10;
        $data['search_string']='direct_search';        
        $conditions['u_sponsor']=$this->session->userdata('user_id');
        $data['from_table']='users';
        $data['base_url']=$this->panel_url.'/team/team-direct';
       
        $data['conditions']=$conditions;

        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['sr_no']=$res['sr_no'];
        $this->show->user_panel('team_direct',$data);
    }

    public function team_generation(){        
        $data['limit']=10;
        $data['search_string']='generation_search'; 
        if(!$this->session->has_userdata('selected_level')){
            $this->session->set_userdata('selected_level',1);
        }

        if(isset($_POST['selected_level']) && $_POST['selected_level']!=''){
            $this->session->set_userdata('selected_level',$_POST['selected_level']);
        }

        $my_level_team = $this->team->my_level_team($this->session->userdata('user_id'));
        $lvl=$this->session->userdata('selected_level');
        $gen_team =  (array_key_exists($lvl,$my_level_team) ? $my_level_team[$lvl]:array());
        if(!empty($gen_team)){
            $conditions['id'] = $gen_team;
            $data['from_table']='users';
            $data['base_url']=$this->panel_url.'/team/team-generation';        
            $data['conditions']=$conditions;
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $data['sr_no']=$res['sr_no'];
        }else{
            $data['table_data']=false;
        }        
       
        $this->show->user_panel('team_generation',$data);
    }

    public function team_single_leg(){        
        $data['limit']=10;
        $data['search_string']='single_leg_search'; 
        $gen_team =  $this->team->my_active_single_leg($this->session->userdata('user_id'));
        if(!empty($gen_team)){
            $conditions['id'] = $gen_team;
            $data['from_table']='users';
            $data['base_url']=$this->panel_url.'/team/team-single-leg';        
            $data['conditions']=$conditions;
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $data['sr_no']=$res['sr_no'];
        }else{
            $data['table_data']=false;
        }        
       
        $this->show->user_panel('team_single_leg',$data);
    }
    
    public function team_rank_wise(){        
        $data['limit']=25;
        $data['search_string']='rank_wise_search'; 
        $gen_team =  $this->team->directs($this->session->userdata('user_id'));
        if(!empty($gen_team)){
            $conditions['u_code'] = $gen_team;
            $conditions['rank_type'] = 'single_leg';
            $data['from_table']='rank';
            $data['base_url']=$this->panel_url.'/team/team-rank-wise';        
            $data['order_by']="id asc";
            $data['conditions']=$conditions;
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $data['sr_no']=$res['sr_no'];
        }else{
            $data['table_data']=false;
        }        
       
        $this->show->user_panel('team_rankwise',$data);
    }

    public function team_left(){
        $data['limit']=10;
        $data['search_string']='left_team_search'; 
        $left_team =  $this->team->team_by_position($this->session->userdata('user_id'),'1');
        if(!empty($left_team)){
            $conditions['id'] = $left_team;
            $data['from_table']='users';
            $data['base_url']=$this->panel_url.'/team/team-left';        
            $data['conditions']=$conditions;
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $data['sr_no']=$res['sr_no'];
        }else{
            $data['table_data']=false;
        }               
        $this->show->user_panel('team_left',$data);
    }

    public function team_right(){
        $data['limit']=10;
        $data['search_string']='right_team_search'; 
        $left_team =  $this->team->team_by_position($this->session->userdata('user_id'),'2');
        if(!empty($left_team)){
            $conditions['id'] = $left_team;
            $data['from_table']='users';
            $data['base_url']=$this->panel_url.'/team/team-right';        
            $data['conditions']=$conditions;
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $data['sr_no']=$res['sr_no'];
        }else{
            $data['table_data']=false;
        }          
        $this->show->user_panel('team_right',$data);
    }


    public function team_tree(){

        if(isset($_REQUEST['node'])){
            $data['node_id']=$_REQUEST['node'];
        }else{
            $data['node_id']=$this->session->userdata('user_id');
        }
        

        $this->show->user_panel('team_tree',$data);
    }

    public function team_matrix(){

        if(isset($_REQUEST['node'])){
            $data['node_id']=$_REQUEST['node'];
        }else{
            $data['node_id']=$this->session->userdata('user_id');
        }
        

        $this->show->user_panel('team_matrix',$data);
    }

 public function single_leg_goal(){
            $this->show->user_panel('team_single_leg_goal',array());
    }

}