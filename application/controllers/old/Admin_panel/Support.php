<?php
class Support extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('support_section')!=1){
            $panel_path=$this->conn->company_info('panel_path');
            redirect(base_url($panel_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }
        $this->panel_url=$this->conn->company_info('admin_path');
    }

    public function index(){

         
        
    }

    public function pending(){
        $data['limit']=25;
        $data['search_string']='admin_pending_support'; 
        $data['from_table']='support';
        $data['base_url']=$this->panel_url.'/support/pending'; 
        $conditions['status']=0;
        $data['conditions']=$conditions;
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['sr_no']=$res['sr_no'];
        $data['total_rows']=$res['total_rows'];
        $this->show->admin_panel('support_pending',$data);
        
        
    }
    public function approved(){
        $data['limit']=25;
        $data['search_string']='admin_pending_support'; 
        $data['from_table']='support';
        $data['base_url']=$this->panel_url.'/support/pending'; 
        $conditions['status']=1;
        $data['conditions']=$conditions;
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['sr_no']=$res['sr_no'];
        $data['total_rows']=$res['total_rows'];
        $this->show->admin_panel('support_approved',$data);
        
        
    }

    public function view(){
        if(isset($_REQUEST['id'])){
            $this->session->set_userdata('admin_support_id',$_REQUEST['id']);
        }
        $wd_id=$this->session->userdata('admin_support_id');

        

        if(isset($_POST['reply_btn'])){
            $this->form_validation->set_rules('reply', 'Reply', 'required');
            if($this->form_validation->run() != False){
                $set['reply_status']=1;
                $set['status']=1;
                $set['reply']=$_POST['reply'];
                $this->db->where('id',$wd_id);
                $this->db->update('support',$set);
                redirect(base_url($this->conn->company_info('admin_path').'/support/approved'));
            }
        }

        $data['support_id']=$wd_id;
        $this->show->admin_panel('support_view',$data);
        
    }

     

     

}