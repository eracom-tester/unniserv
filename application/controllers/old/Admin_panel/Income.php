<?php
class Income extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('income_section')!=1){
            $admin_path=$this->conn->company_info('admin_path');
            redirect(base_url($admin_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }
         $this->panel_url=$this->conn->company_info('admin_path');
    }

    public function index(){
        $data['search_string']='income_page_string';

        $whr='1=1 AND';
        if(isset($_POST['submit'])){
            if(isset($_POST['date']) && $_POST['date']!=''){
                $date=date('Y-m-d',strtotime($_POST['date']));
                $whr .= " DATE(`date`)=DATE('$date') AND";
            }
            if(isset($_POST['select_month']) && $_POST['select_month']!=''){
                $select_month=date('Y-m-d',strtotime($_POST['select_month']));
                $whr .= " (MONTH(`date`)=MONTH('$select_month') AND YEAR(`date`)=YEAR('$select_month')) AND";
            }

            if(isset($_POST['start_date']) && isset($_POST['end_date']) && $_POST['start_date']!='' && $_POST['end_date']!=''){
                $start_date=date('Y-m-d 00-00-01',strtotime($_POST['start_date']));
                $end_date=date('Y-m-d 23-59-59',strtotime($_POST['end_date']));
                $whr .= " ( `date` BETWEEN '$start_date' AND '$end_date') AND";
            }

        }

        $whr=rtrim($whr,'AND');

        $this->session->set_userdata('income_where',$whr);
        
        $data['query_where']=$whr;
        $this->show->admin_panel('income',$data);
        
    }

    

     

     

}