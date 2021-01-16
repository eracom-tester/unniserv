<?php
class Index extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){  
       
        $this->show->main('index',array());
        /* if($this->session->has_userdata('admin_login')===true){
            $this->show->admin_panel('index',array());           
        }elseif($this->session->has_userdata('user_login')===true){
            $this->show->user_panel('index',array());
        }else{
            $this->show->main('login',array());
            
        } */
        

    }
}
