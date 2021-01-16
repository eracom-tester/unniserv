<?php
class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){  

        if($this->session->has_userdata('franchise_login')){

            redirect(base_url($this->conn->company_info('franchise_path').'/dashboard'));
        }else{
            if(isset($_POST['login'])){
                $this->form_validation->set_rules('username', 'Username', 'required');
                   $this->form_validation->set_rules('password', 'Password', 'required');
                     if($this->form_validation->run() == TRUE){
                         $where = array(
                              'username'=>$_POST['username'],                   
                              'password'=>md5($_POST['password'])                   
                          );
   
                          $res=$this->conn->runQuery('*','franchise_users',$where);
                          if($res){
                             if($res[0]->is_block==0){
                               $this->session->set_userdata("franchise_login", true);                            
                               $this->session->set_userdata("franchise_id", $res[0]->id);                            
                                        
                               $this->session->set_flashdata("success", "You are logged in");
   
                               if(1!=1){
                                   redirect($this->session->userdata('login_redirect'), "refresh");
                               }else{
                                   redirect(base_url($this->conn->company_info('franchise_path')."/dashboard"), "refresh");
                               }
                            }else{
                              $this->session->set_flashdata("error", "Your Account is Blocked.");
                           }  
                          }else{
                              $this->session->set_flashdata("error", "Incorrect username or password.");
                           } 
                     }
           }


            $data['panel']=$panel=$this->conn->company_info('franchise_panel');
            $data['franchise_directory']=$franchise_directory=$this->conn->company_info('franchise_directory');
            $data['panel_url']=base_url().$franchise_directory.'/'.$panel.'/';
            
            $this->load->view($franchise_directory.'/pages/login',$data);
            }
        }
    
}