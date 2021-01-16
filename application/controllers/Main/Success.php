<?php
class Success extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
       
    }
    
    public function order(){
        
       // echo 'Success ! Order placed successfully.<br><a href="'.base_url('index').'">Go to home</a>';
         $this->show->main('order_bill',array());
    }
    
}