<?php
class Index extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){        
        $this->show->main('index');
    }

    public function login(){
        $this->show->main('login');
    }

   public function any($page){
        $this->show->main($page);
    }
}