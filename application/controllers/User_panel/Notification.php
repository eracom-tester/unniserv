<?php
class Notification extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->show->user_panel('notifications/list');
    }
    public function view(){
        $data['n_id']=$_REQUEST['id'];
        $this->show->user_panel('notifications/view',$data);
    }
    
}