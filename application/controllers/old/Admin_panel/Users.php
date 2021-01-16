<?php
class Users extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->admin_url=$this->conn->company_info('admin_path');
    }

    public function index(){       
        
        $data['limit']=10;
        $data['search_string']='all_users_search';        
       
        
        $data['base_url']=$this->admin_url.'/users'; 
        
        
       $user_search_name=$data['search_string'].'user';
        if((isset($_POST['name_search']) && $_POST['name_search']!='') || $this->session->has_userdata($user_search_name)){
             $this->session->set_userdata($user_search_name,$_POST['name_search']);
             $srch=$this->session->userdata($user_search_name);
             $this->profile->ids_from_users($srch,'u_sponsor','users');
        }else{
            $data['from_table']='users';
        }
         
        
        $res=$this->paging->searching_data($data);
        $this->db->flush_cache();
        
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $data['sr_no']=$res['sr_no'];
        $this->show->admin_panel('users',$data);
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


    public function login(){
        $id=$_REQUEST['user'];
        $this->session->set_userdata("user_login", true);                            
        $this->session->set_userdata("user_id", $id);                            
        $this->session->set_userdata("profile", $this->profile->profile_info($id));
        redirect(base_url($this->conn->company_info('panel_path')."/dashboard"), "refresh");
    }
}