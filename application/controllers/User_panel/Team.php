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
        $this->show->user_panel('team_direct',$data);*/
    
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
         
            
        $this->show->user_panel('team_direct',$data);    
        
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
            
        $this->show->user_panel('team_generation',$data); 
        
    }
    public function team_generation(){
        $my_id=$this->session->userdata('user_id');
        $check_my_level_team = $this->team->my_generation($my_id);
        
        if(isset($_REQUEST['selected_user']) && $_REQUEST['selected_user']!=''){
            $this->session->set_userdata('selected_user',$_REQUEST['selected_user']);
        }
        
        if($this->session->has_userdata('selected_user')){
            $user_id=$this->session->userdata('selected_user');
            if($user_id!=$my_id){
                if(!in_array($user_id,$check_my_level_team)){
                    redirect(base_url($this->panel_url.'/team/team_generation?selected_user='.$my_id));
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
            $data = $this->paging->search_response($searchdata,$this->limit,$this->panel_url.'/team/team-generation');
                
        }else{
            $data['table_data']=false;
        }
        $data['check_my_level_team']=$check_my_level_team;
        $this->show->user_panel('team_generation_test',$data); 
        
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
       
        $this->show->user_panel('team_single_leg',$data);
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
        
        if(isset($_POST['search'])){
                
            $u_code=$this->session->userdata('user_id');
            $username=$_POST['username'];
            $user_detail_id=$this->conn->runQuery('id','users',"username='$username'");
            $u_id=$user_detail_id[0]->id;
          
            $position=$_POST['selected_postion'];
           
            if($position=='right'){
                  $team=$this->team->team_by_position($u_code,2);
                 
            }elseif($position=='left'){
               $team=$this->team->team_by_position($u_code,1);
              
            }else{
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

        $this->show->user_panel('team_tree',$data);
    }

    public function team_matrix(){

        if(isset($_REQUEST['node'])){
            $data['node_id']=$_REQUEST['node'];
        }else{
            $data['node_id']=$this->session->userdata('user_id');
        }
        
      if(isset($_POST['search'])){
             $u_code=$this->session->userdata('user_id');
            
            $user_details_id=$this->conn->runQuery('id','pool',"u_id='$u_code'");
            $matrix_parent_id=$user_details_id[0]->id;
            $teams=$this->team->my_matrix_team($matrix_parent_id);
            
                   $username=$_POST['username'];
                   $user_detail_id=$this->conn->runQuery('id','users',"username='$username'");
                   $u_id=$user_detail_id[0]->id;
                  
                   $user_details_id_srch=$this->conn->runQuery('id','pool',"u_id='$u_id'");
                      $matrix_parent_id_srch=$user_details_id_srch[0]->id;
                 
                    if($user_details_id_srch && in_array($matrix_parent_id_srch,$teams)){
                        
                          $data['node_id']=$matrix_parent_id_srch;
                          $this->session->set_flashdata("success", "Your Downline users.");
                       
                     }else{
                          $data['node_id']=$this->session->userdata('user_id');
                          $this->session->set_flashdata("error", "Users  Not In Your Downline.");  
                        
                     } 
                }     

        $this->show->user_panel('team_matrix',$data);
    }
    public function tds(){
        $this->show->user_panel('team_tds_report');
    }
    public function reward(){
        $this->show->user_panel('team_reward');
    }
    
}