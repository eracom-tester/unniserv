<?php
class Lifetime extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){  
        $this->show->main('lifetime',array());
    }
}