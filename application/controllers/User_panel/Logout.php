<?php
class Logout extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){         
        $this->session->unset_userdata('user_id');  
        $this->session->unset_userdata('profile');  
        $this->session->unset_userdata('user_login'); 
        $this->cart->destroy();
        redirect(base_url());
    }
}