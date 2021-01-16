<?php
class Team extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('team_section')!=1){
            $admin_path=$this->conn->company_info('admin_path');
            redirect(base_url($admin_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }
         $this->admin_url=$this->conn->company_info('admin_path');
         $this->limit=25;
    }

    public function team_direct(){
      /*  $data['limit']=10;
        $data['search_string']='direct_search';        
        $conditions['u_sponsor']=$this->session->userdata('user_id');
        $data['from_table']='users';
        $data['base_url']=$this->panel_url.'/team/team-direct';
       
        $data['conditions']=$conditions;

        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['sr_no']=$res['sr_no'];
        $this->show->admin_panel('team_direct',$data);*/
    
     $searchdata['from_table']='users';        
        $conditions['u_sponsor']=$this->session->userdata('user_id');
        if(!empty($condition)){
            $searchdata['condition']=$condition;
        }
         
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            $likeconditions['name']=$_REQUEST['name'];
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
            $likeconditions['username']=$_REQUEST['username'];
        }
        if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && $_REQUEST['start_date']!='' && $_REQUEST['end_date']!='' ){
			$start_date=date('Y-m-d 00:00:00',strtotime($_REQUEST['start_date']));
			$end_date=date('Y-m-d 23:59:00',strtotime($_REQUEST['end_date']));
			$where="(added_on BETWEEN '$start_date' and '$end_date')";
            $searchdata['where'] = $where;
		}  
          if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->panel_url.'/team/team-direct'); 
         
            
        $this->show->admin_panel('team_direct',$data);    
        
    }

    public function team_generation_test(){
        
     if(isset($_REQUEST['selected_level']) && $_REQUEST['selected_level']!=''){
            $this->session->set_userdata('selected_level',$_REQUEST['selected_level']);
        }
         if(!$this->session->has_userdata('selected_level')){
            $this->session->set_userdata('selected_level',1);
        }
        $my_level_team = $this->team->my_level_team($this->session->userdata('user_id'));
        $lvl=$this->session->userdata('selected_level');
        $gen_team =  (array_key_exists($lvl,$my_level_team) ? $my_level_team[$lvl]:array());
        if(!empty($gen_team)){
        $conditions['id'] = $gen_team;
        $searchdata['from_table']='users';        
        //$conditions['u_sponsor']=$this->session->userdata('user_id');
        if(!empty($condition)){
            $searchdata['condition']=$condition;
        }
         
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            $likeconditions['name']=$_REQUEST['name'];
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
            $likeconditions['username']=$_REQUEST['username'];
        }
         
 
          if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->panel_url.'/team/team-generation');
            
        }else{
            $data['table_data']=false;
        }  
            
        $this->show->admin_panel('team_generation',$data); 
        
    }
   
    public function team_generation(){
        $my_id=1;     //$this->session->userdata('user_id');
        $check_my_level_team = $this->team->my_generation($my_id);
        
        if(isset($_REQUEST['selected_user']) && $_REQUEST['selected_user']!=''){
            $this->session->set_userdata('selected_user',$_REQUEST['selected_user']);
        }
        
        if($this->session->has_userdata('selected_user')){
            $user_id=$this->session->userdata('selected_user');
            if($user_id!=$my_id){
                if(!in_array($user_id,$check_my_level_team)){
                    redirect(base_url($this->admin_url.'/team/team_generation?selected_user='.$my_id));
                }
            }
        }else{
            $user_id=$this->session->userdata('user_id');
        }
        
        //echo $user_id;
        //die();
        
        if(isset($_REQUEST['selected_level']) && $_REQUEST['selected_level']!=''){
            $selected_level=$_REQUEST['selected_level'];
        }else{
            $selected_level=1;
        }
        
        $my_level_team = $this->team->my_level_team($user_id);
        
        $gen_team =  (array_key_exists($selected_level,$my_level_team) ? $my_level_team[$selected_level]:array());
        
        if(!empty($gen_team)){
            $conditions['id'] = $gen_team;
            $searchdata['from_table']='users';        
            //$conditions['u_sponsor']=$this->session->userdata('user_id');
             
            if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
                $likeconditions['name']=$_REQUEST['name'];
            }
            if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
                $likeconditions['username']=$_REQUEST['username'];
            }
            
            if(!empty($likeconditions)){
                $searchdata['likecondition'] = $likeconditions;
            }
            
            if(!empty($conditions)){
                $searchdata['conditions'] = $conditions;
            }
            $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/team/team-generation');
                
        }else{
            $data['table_data']=false;
        }
        $data['check_my_level_team']=$check_my_level_team;
        $this->show->admin_panel('team_generation_test',$data); 
        
    }

    public function team_single_leg(){        
        $data['limit']=10;
        $data['search_string']='single_leg_search'; 
        $gen_team =  $this->team->my_single_leg($this->session->userdata('user_id'));
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
       
        $this->show->admin_panel('team_single_leg',$data);
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
        $this->show->admin_panel('team_left',$data);
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
        $this->show->admin_panel('team_right',$data);
    }


    public function team_tree(){

        if(isset($_REQUEST['node'])){
            $data['node_id']=$_REQUEST['node'];
        }else{
            $data['node_id']=$this->session->userdata('user_id');
        }
          if(isset($_POST['search'])){
                
            $u_code=$this->session->userdata('user_id');
            $username=$_POST['username'];
            $user_detail_id=$this->conn->runQuery('id','users',"username='$username'");
            $u_id=$user_detail_id[0]->id;
          
           $position=$_POST['selected_postion'];
           
            if($position=='whole'){
                   $team=$this->team->my_generation($u_code);
                 
            }
                
                
            
             if(in_array($u_id,$team)){
                
                  $data['node_id']=$u_id;
                  $this->session->set_flashdata("success", "Your Downline users.");
               
             }else{
                  $data['node_id']=$this->session->userdata('user_id');
                  $this->session->set_flashdata("error", "Users  Not In Your Downline.");  
                
             } 
        }    

       
        $this->show->admin_panel('team_tree',$data);
    }

    
    public function team_matrix(){

        if(isset($_REQUEST['node'])){
            $data['node_id']=$_REQUEST['node'];
        }else{
            $data['node_id']=$this->session->userdata('user_id');
        }
         if(isset($_POST['search'])){
                
            $u_code=$this->session->userdata('user_id');
            $username=$_POST['username'];
            $user_detail_id=$this->conn->runQuery('id','users',"username='$username'");
            $u_id=$user_detail_id[0]->id;
          
           $position=$_POST['selected_postion'];
           
            if($position=='whole'){
                   $team=$this->team->my_generation($u_code);
                 
            }
             if(in_array($u_id,$team)){
                
                  $data['node_id']=$u_id;
                  $this->session->set_flashdata("success", "Your Downline users.");
               
             }else{
                  $data['node_id']=$this->session->userdata('user_id');
                  $this->session->set_flashdata("error", "Users  Not In Your Downline.");  
                
             } 
        }    

        $this->show->admin_panel('team_matrix',$data);
    }
    
    
    public function tds(){
        $this->show->admin_panel('team_tds_report');
    }
    public function reward(){
        $this->show->admin_panel('team_reward');
    }
    
 /*    public function team_matrix_generation(){
        $pool='pool1';
        if(isset($_REQUEST['node'])){
            $data['node_id']=$_REQUEST['node'];
        }else{
            $user_id=$this->session->userdata('user_id');
            $get_node_id=$this->conn->runQuery('*','pool',"u_id='$user_id' and pool_type='$pool' and pool_id='1'");
            $node_id=$get_node_id ? $get_node_id[0]->id:false;
            $data['node_id']=$node_id;//$this->session->userdata('user_id');
        }
        $this->show->admin_panel('team_matrix_generation',$data);
    }
    */
     public function team_matrix_club(){
        $pool='club1';
        if(isset($_REQUEST['node'])){
            $data['node_id']=$_REQUEST['node'];
        }else{
            $user_id=$this->session->userdata('user_id');
            $get_node_id=$this->conn->runQuery('*','pool',"u_id='$user_id' and pool_type='$pool' and pool_id='2' order by id asc");
            $node_id=$get_node_id ? $get_node_id[0]->id:false;
            $data['node_id']=$node_id;//$this->session->userdata('user_id');
        }
        $this->show->admin_panel('team_matrix_club',$data);
    } 
}