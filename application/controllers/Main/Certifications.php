<?php
class Certifications extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){  
        $this->show->main('certifications',array());
    }
}