<?php
class Transactions extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('transactions_section')!=1){
            $admin_path=$this->conn->company_info('admin_path');
            redirect(base_url($admin_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }
         $this->panel_url=$this->conn->company_info('admin_path');
    }

    public function index(){
        $data['limit']=10;
        $data['search_string']='transaction_search';
        $conditions=array();
        if(isset($_REQUEST['income'])){
            $this->session->set_userdata('show_income',$_REQUEST['income']);
        }



        if(isset($_POST['reset'])){
            $this->session->unset_userdata($data['search_string']);
            $this->session->unset_userdata('show_income');
            $this->session->unset_userdata('income_where');
        }
          
        

        
        $data['base_url']=$this->panel_url.'/transactions';  
        
        
        if($this->session->has_userdata('show_income')){
            $conditions['source']=$this->session->userdata('show_income');
        }

        if($this->session->has_userdata('income_where')){
            $data['where']=$this->session->userdata('income_where');
        }

        if(!empty($conditions)){
            $data['conditions']=$conditions;
        }       
        
        
        $user_search_name=$data['search_string'].'user';
        if((isset($_POST['name_search']) && $_POST['name_search']!='') || $this->session->has_userdata($user_search_name)){
             $this->session->set_userdata($user_search_name,$_POST['name_search']);
             $srch=$this->session->userdata($user_search_name);
             $this->profile->ids_from_users($srch,'u_code','transaction');
        }else{
            $data['from_table']='transaction';
        }
        
       
        
        $res=$this->paging->searching_data($data);
        
        $this->db->flush_cache();
        
        $data['table_data']=$res['table_data'];      
        $data['sr_no']=$res['sr_no'];     
        $data['total_rows']=$res['total_rows'];

              
       $this->show->admin_panel('transactions',$data);        
    }

    
   

    

     

     

}