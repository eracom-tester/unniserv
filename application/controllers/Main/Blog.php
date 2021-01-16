<?php
class Blog extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){ 
        
        $id=$_GET['id'];
         
        $data['ad_id']=$id;
        $data['rel_page']='blog_section';
        $data['title']='Blog';
        $data['data']=$this->conn->runQuery('*','ad_blogs',"id='$id'")[0];
        
        //$this->show->admin_panel('ad_edit',$data);
        
        $this->show->main('view_ad',$data);
    }
}
