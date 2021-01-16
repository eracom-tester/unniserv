<?php
class Logout extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){         
        $this->session->unset_userdata('franchise_id');  
          
        $this->session->unset_userdata('franchise_login');  
        redirect(base_url());
    }
}