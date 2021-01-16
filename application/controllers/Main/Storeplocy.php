<?php
class Storeplocy extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){  
        $this->show->main('storeplocy',array());
    }
}