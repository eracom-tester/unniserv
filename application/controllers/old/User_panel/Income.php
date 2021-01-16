<?php
class Income extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('income_section')!=1){
            $panel_path=$this->conn->company_info('panel_path');
            redirect(base_url($panel_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }
         $this->panel_url=$this->conn->company_info('panel_path');
    }

    public function index(){

        $data['limit']=10;
        $data['search_string']='income_search';

        if(isset($_REQUEST['income'])){
            $this->session->set_userdata('show_income',$_REQUEST['income']);
        }

        if(isset($_POST['reset'])){
            $this->session->unset_userdata($data['search_string']);
            $this->session->unset_userdata('show_income');
        }

        
        $conditions['u_code'] = $this->session->userdata('user_id');        
        $data['from_table']='transaction';
        $data['base_url']=$this->panel_url.'/income';  
        
        $conditions['tx_type']='income';
        if($this->session->has_userdata('show_income')){
            $conditions['source']=$this->session->userdata('show_income');
        }

        $data['conditions']=$conditions;
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];      
        $data['sr_no']=$res['sr_no'];

        $data['query_where']="";
        $this->show->user_panel('income',$data);
        
    }

    

     

     

}