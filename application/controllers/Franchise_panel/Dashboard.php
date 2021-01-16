<?php
class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){         
           // print_r($_SESSION);
           //die();  
         //    $this->show->user_panel('coming_soon'); 
      $this->show->franchise_panel('index');
    }
      public function test(){         
           // print_r($_SESSION);
           //die();  
         //    $this->show->user_panel('coming_soon'); 
      $this->show->franchise_panel('index_test');
    }
    
    public function change_password(){
        if(isset($_POST['password_btn'])){

            $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_check_old_password');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]'); 
            if($this->form_validation->run() != False){
                $update['password']=md5($this->input->post('password'));               
                $this->db->where('id',$this->session->userdata('user_id'));
                if($this->db->update('users',$update)){
                    $this->session->set_userdata('profile', $this->profile->profile_info($this->session->userdata('user_id')));
                    $this->session->set_flashdata("success", "Password successfully changed.");
                    redirect(base_url(uri_string()));
                }else{                    
                    $this->session->set_flashdata("error", "Something Wrong.");
                    redirect(base_url(uri_string()));
                }
            }                        
        }
        $this->show->user_panel('change_password');
    }

    public  function check_old_password($str){
        $prof=$this->session->userdata('profile');
        if($prof->password==md5($str)){
            return true;
        }else{
              $this->form_validation->set_message('check_old_password', "Old password not match! Please Try again.");
               return false;
        }
    }
}