<?php
class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){  

        if($this->session->has_userdata('admin_login')){

            redirect(base_url($this->conn->company_info('admin_path').'/dashboard'));
        }else{
            if(isset($_POST['login'])){
                $this->form_validation->set_rules('username', 'Username', 'required');
                   $this->form_validation->set_rules('password', 'Password', 'required');
                     if($this->form_validation->run() == TRUE){
                         $where = array(
                              'user'=>$_POST['username'],                   
                              'password'=>md5($_POST['password'])                   
                          );
   
                          $res=$this->conn->runQuery('*','admin',$where);
                          if($res){
                               
                               $this->session->set_userdata("admin_login", true);                            
                               $this->session->set_userdata("admin_id", $res[0]->id);                            
                               $this->session->set_userdata("admin_type", $res[0]->type);                            
                               $this->session->set_flashdata("success", "You are logged in");
   
                               if(1!=1){
                                   redirect($this->session->userdata('login_redirect'), "refresh");
                               }else{
                                   redirect(base_url($this->conn->company_info('admin_path')."/dashboard"), "refresh");
                               }
                               
                          }else{
                              $this->session->set_flashdata("error", "Incorrect username or password.");
                           } 
                     }
           }


            $data['panel']=$panel=$this->conn->company_info('admin_panel');
            $data['admin_directory']=$admin_directory=$this->conn->company_info('admin_directory');
            $data['panel_url']=base_url().$admin_directory.'/'.$panel.'/';
            
            $this->load->view($admin_directory.'/pages/login',$data);

        }
    }
}