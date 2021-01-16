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
     // echo 'asdf';
        $this->show->user_panel('index');
    }
    public function test(){         
           // print_r($_SESSION);
           //die();  
         //    $this->show->user_panel('coming_soon'); 
     // echo 'asdf';
        $this->show->user_panel('index');
    }
}
