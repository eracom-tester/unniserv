<?php
class Search extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){  
        $this->show->main('search',array());
    }
}
