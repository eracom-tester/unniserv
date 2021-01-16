<?php
class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        
        $this->show->admin_panel('index');
    }
    
    public function test(){
        $this->update_ob->add_amnt(1,'main_wallet',20);
        
        
        echo $this->update_ob->wallet(1,'main_wallet');
    }
    
    
}