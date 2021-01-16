<?php
class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        
        $this->show->admin_panel('index_new');
    }
    public function index1(){

        
        //$this->show->admin_panel('index_test');
    }
    public function new_page(){

        
        $this->show->admin_panel('index_new');
    }
    
    public function bv(){
        $admn_path=$this->conn->company_info('admin_directory');
        $dta['type']=$_REQUEST['type'];
        $this->load->view($admn_path.'/pages/dashboard/bv_table',$dta);
    }
     public function invest(){
        $admn_path=$this->conn->company_info('admin_directory');
        $dta['type']=$_REQUEST['type'];
        $this->load->view($admn_path.'/pages/dashboard/invest_table',$dta);
    }
    public function epin(){
        $admn_path=$this->conn->company_info('admin_directory');
        $dta['type']=$_REQUEST['type'];
        $this->load->view($admn_path.'/pages/dashboard/epin_table',$dta);
    }
    public function income(){
        $admn_path=$this->conn->company_info('admin_directory');
        $dta['type']=$_REQUEST['type'];
        $this->load->view($admn_path.'/pages/dashboard/income_table',$dta);
    }
    public function orders(){
        $admn_path=$this->conn->company_info('admin_directory');
        $dta['type']=$_REQUEST['type'];
        $this->load->view($admn_path.'/pages/dashboard/order_table',$dta);
    }
    public function sod(){
        $admn_path=$this->conn->company_info('admin_directory');
        $dta['type']=$_REQUEST['type'];
        $this->load->view($admn_path.'/pages/dashboard/sod_table',$dta);
    }
    public function binary(){
        $admn_path=$this->conn->company_info('admin_directory');
        $dta['type']=$_REQUEST['type'];
        $this->load->view($admn_path.'/pages/dashboard/binary_table',$dta);
    }
    
}