<?php
class Cart extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){         
           // print_r($_SESSION);
           //die();  
         //    $this->show->user_panel('coming_soon'); 
      //$this->show->user_panel('index');
      
      $contents=$this->cart->contents();
      print_r($contents);
    }
}