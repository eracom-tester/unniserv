<?php
class Users extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->admin_url=$this->conn->company_info('admin_path');
        $this->limit=10;
    }

   
    
    public function index(){  
        
        
        $searchdata['from_table']='users';
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            $likeconditions['name']=$_REQUEST['name'];
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
            $likeconditions['username']=$_REQUEST['username'];
        }
        if(isset($_REQUEST['email']) && $_REQUEST['email']!=''){
            $likeconditions['email']=$_REQUEST['email'];
        }
        if(isset($_REQUEST['sponsor']) && $_REQUEST['sponsor']!=''){
            $spo=$this->profile->column_like($_REQUEST['sponsor'],'username');
            if($spo){
                $conditions['u_sponsor'] = $spo;
            }
        }
        if(isset($_REQUEST['active_status']) && $_REQUEST['active_status']!=''){
            $conditions['active_status'] = $_REQUEST['active_status'];
        }
         if(isset($_REQUEST['mobile']) && $_REQUEST['mobile']!=''){
            $conditions['mobile'] = $_REQUEST['mobile'];
        }
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/users');
        $this->show->admin_panel('users',$data);
    
    if(isset($_POST['export_to_excel'])){
           
           $get_data=$this->conn->runQuery('username,u_sponsor,name,email,mobile,country,state,city,post_code,added_on,active_date','users','1=1');          
          //print_R($get_data);
           if($get_data){
               for($f=0;$f<count($get_data);$f++){
                $dta['Username']=$get_data[$f]->username;
                $dta['Name']=$get_data[$f]->name;
                $dta['Email']=$get_data[$f]->email; 
                $dta['Mobile']=$get_data[$f]->mobile;
                $dta['Country']=$get_data[$f]->country;
                $dta['State']=$get_data[$f]->state;
                $dta['Post_code']=$get_data[$f]->post_code;
                $dta['Joining Date']=$get_data[$f]->added_on;
                $dta['Activation Date']=$get_data[$f]->active_date;
                $user_sponsor= $get_data[$f]->u_sponsor;
                $sponsor_info=$this->conn->runQuery('name,username','users',"id='$user_sponsor'");
                 if($sponsor_info){
                
                $dp_name=$sponsor_info[0]->name;
                $db_username=$sponsor_info[0]->username;
                 }else{
                    $dp_name=""; 
                    $db_username="";
                 }
                 $dta['Sponsor Name']=$dp_name;
                 $dta['Sponsor Username ']=$db_username;
                $exdataval[$f]=$dta;
               }
           }
             
            $this->export->export_to_excel($exdataval);

        }    
        
    } 
    
    
    public function edit(){
        if(isset($_REQUEST['id'])){
            $this->session->set_userdata('admin_edit_user',$_REQUEST['id']);
        }
        $edit_user=$this->session->userdata('admin_edit_user');

        if(isset($_POST['edit_btn'])){
            $update['name']=$this->input->post('name');
            $update['email']=$this->input->post('email');
            $update['mobile']=$this->input->post('mobile');
            $update['block_status']=$this->input->post('input_block');
            $this->db->where('id',$edit_user);
            if($this->db->update('users',$update)){                
                $this->session->set_flashdata("success", "Profile Updated successfully.");
                redirect(base_url(uri_string()));
            }else{                
                $this->session->set_flashdata("error", "Something Wrong.");
                redirect(base_url(uri_string()));
            }             
        }


        if(isset($_POST['edit_bank_btn'])){
            $update['bank_name']=$this->input->post('bank_name');
            $update['account_holder_name']=$this->input->post('account_holder_name');
            $update['account_no']=$this->input->post('account_no');
            $update['ifsc_code']=$this->input->post('ifsc_code');
            $update['bank_branch']=$this->input->post('bank_branch');
            $update['btc_address']=$this->input->post('btc_address');
            $update['eth_address']=$this->input->post('eth_address');
            $update['tron_address']=$this->input->post('tron_address');

            $userid=$edit_user;
            $bank_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");
            if($bank_details){
                $this->db->where('u_code',$userid);
                $qury=$this->db->update('user_accounts',$update);
            }else{
                $update['u_code']=$userid;
                $qury=$this->db->insert('user_accounts',$update);
            }          

            if($qury){               
                $this->session->set_flashdata("success", "Profile Updated successfully.");
                redirect(base_url(uri_string()));
            }else{
                
                $this->session->set_flashdata("error", "Something Wrong.");
                redirect(base_url(uri_string()));
            }             
        }
        if(isset($_POST['set_pass_btn'])){
             $this->form_validation->set_rules('u_password', 'Password', 'required');
            
            if($this->form_validation->run() != False){
                $update=array();
                $update['password']=md5($this->input->post('u_password'));
                
                $this->db->where('id',$edit_user);
                if($this->db->update('users',$update)){                
                    $this->session->set_flashdata("success", "Password Updated successfully.");
                    redirect(base_url(uri_string()));
                }else{                
                    $this->session->set_flashdata("error", "Something Wrong.");
                    redirect(base_url(uri_string()));
                }
            }
                        
        }
        

        $data['edit_user']=$edit_user;
        $data['profile']=$this->profile->profile_info($edit_user);
        $this->show->admin_panel('user_edit',$data);
    }
    
     public function change_password(){

        if(isset($_POST['set_pass_btn'])){

            $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_check_old_password');
            $this->form_validation->set_rules('u_password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[u_password]'); 
            if($this->form_validation->run() != False){
                $update['password']=md5($this->input->post('u_password'));
                $typ='controller';
                $this->db->where('type',$typ);
                if($this->db->update('admin',$update)){
                    $this->session->set_userdata('profile', $this->profile->profile_info($this->session->userdata('user_id')));
                    $this->session->set_flashdata("success", "Password successfully changed.");
                    redirect(base_url(uri_string()));
                }else{                    
                    $this->session->set_flashdata("error", "Something Wrong.");
                    redirect(base_url(uri_string()));
                }
            }                        
        }

        $this->show->admin_panel('user_admin_password');
    }

        public  function check_old_password($str){
            $pass=md5($str);
            $check=$this->conn->runQuery('*','admin',"type='controller' and password='$pass'");
           
        if($check){
            return true;
        }else{
              $this->form_validation->set_message('check_old_password', "Old password not match! Please Try again.");
               return false;
        }
    }
    
    
    
    public function verify_username(){
        $username=$_POST['username'];
        $ret['error']=true;
        if($username!=''){
            $check=$this->conn->runQuery('id,name','users',"username='$username'");
            if($check){
                $ret['error']=false;
                $ret['msg']=$check[0]->name;
            }else{                
                $ret['msg']="Invalid Username.";
            }
        }else{            
            $ret['msg']="Please enter username.";
        }        
        print_r(json_encode($ret));
    }
    public function verify_franchise(){
        $username=$_POST['username'];
        $ret['error']=true;
        if($username!=''){
            $check=$this->conn->runQuery('id,name','franchise_users',"username='$username'");
            if($check){
                $ret['error']=false;
                $ret['msg']=$check[0]->name;
            }else{                
                $ret['msg']="Invalid Username.";
            }
        }else{            
            $ret['msg']="Please enter username.";
        }        
        print_r(json_encode($ret));
    }

    public function login(){
        $id=$_REQUEST['user'];
        $this->session->set_userdata("user_login", true);                            
        $this->session->set_userdata("user_id", $id);                            
        $this->session->set_userdata("profile", $this->profile->profile_info($id));
        redirect(base_url($this->conn->company_info('panel_path')."/dashboard"), "refresh");
    }
    
     public function auto_register(){
        if(isset($_POST['add_btn'])){
                $sponsor=$this->input->post('sponsor_name');
                $find_sp=$this->profile->id_by_username($sponsor);
                if($find_sp!=''){
                    
                    $total_entry=$this->input->post('total_entry');
                    if($total_entry<=50){
                    
                        $update1['value']=$find_sp;
                        $this->db->where('label',"auto_sponsor_id");
                        $this->db->update('advanced_info',$update1);
                        
                        $update5['value']=$this->input->post('total_entry');
                        $this->db->where('label',"auto_register_entry");
                        $this->db->update('advanced_info',$update5);
                        
                        $update2['value']=$this->input->post('name');
                        $this->db->where('label',"auto_name");
                        $this->db->update('advanced_info',$update2);
                        
                        $update3['value']=$this->input->post('email');
                        $this->db->where('label',"auto_email");
                        $this->db->update('advanced_info',$update3);
                        
                        $update4['value']=$this->input->post('mobile');
                        $this->db->where('label',"auto_mobile");
                        $this->db->update('advanced_info',$update4);
                        
                        $update5['value']=$this->input->post('total_entry');
                        $this->db->where('label',"auto_register_entry");
                        $this->db->update('advanced_info',$update5);
                        
                        $update6['value']=$this->input->post('auto_register_status');
                        $this->db->where('label',"auto_register_enable");
                        $this->db->update('advanced_info',$update6);
                        
                        $update7['value']=$this->input->post('auto_id');
                        $this->db->where('label',"auto_id");
                        $this->db->update('advanced_info',$update7);
                    }else{
                        
                        $this->session->set_flashdata("error", "Maximum 50 Total Entry Only.");
                        redirect(base_url(uri_string()));
                        
                    }
                }else{
                    
                    $this->session->set_flashdata("error", "Sponsor Invalid.");
                    redirect(base_url(uri_string()));
                    
                } 
            }
            $this->show->admin_panel('user_auto_register');
            
     }
}