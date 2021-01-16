<?php
class Products extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->show->main('products',array());
    }
    
    public function product_detail(){
        $this->show->main('product_details',array());
    }
}
