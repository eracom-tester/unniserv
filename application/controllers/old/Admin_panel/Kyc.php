<?php
class Kyc extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->panel_url=$this->conn->company_info('admin_path');
    }

    public function index(){

        $this->pending();
        
    }


    public function pending(){
        $data['limit']=10;
        $data['search_string']='kyc_search';
        $data['where']="(pan_kyc_status='submitted' or bank_kyc_status='submitted' or adhaar_kyc_status='submitted')";
        //$conditions['tx_type']='withdrawal';
        //$conditions['status']=0;
        $data['page_name']="Pending";
        $data['from_table']='user_accounts';
        $data['base_url']=$this->panel_url.'/kyc/pending';
        /*if(!empty($conditions)){
            $data['conditions']=$conditions;
        }*/
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $data['sr_no']=$res['sr_no'];
        $this->show->admin_panel('kyc_pending',$data);
    }
    
    public function approved(){
        $data['limit']=10;
        $data['search_string']='kyc_search';
        $data['where']="(pan_kyc_status='approved' or bank_kyc_status='approved' or adhaar_kyc_status='approved')";
        //$conditions['status']=1;
        $data['page_name']="Approved";
        $data['from_table']='user_accounts';
        $data['base_url']=$this->panel_url.'/kyc/approved';
        /*if(!empty($conditions)){
            $data['conditions']=$conditions;
        } */

        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data']; 
        $data['total_rows']=$res['total_rows'];
        $data['sr_no']=$res['sr_no'];
        $this->show->admin_panel('kyc_pending',$data);
    }
    
    public function cancelled(){
        $data['limit']=10;
        $data['search_string']='kyc_search';
        $data['where']="(pan_kyc_status='rejected' or bank_kyc_status='rejected' or adhaar_kyc_status='rejected')";
        /*$conditions['tx_type']='withdrawal';
        $conditions['status']=2;*/
        $data['page_name']="Cancelled";
        $data['from_table']='user_accounts';
        $data['base_url']=$this->panel_url.'/kyc/cancelled';
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $data['sr_no']=$res['sr_no'];
        $this->show->admin_panel('kyc_pending',$data);
        
    }
    public function view(){
        if(isset($_REQUEST['id'])){
            $this->session->set_userdata('admin_kyc_id',$_REQUEST['id']);
        }
        $wd_id=$this->session->userdata('admin_kyc_id');

        if(isset($_POST['approve_btn'])){
            $tx_type=$_POST['tx_type'];
            $this->approve($wd_id,$tx_type);
            $this->session->set_flashdata("success", "Kyc Approved.");
            redirect(base_url($this->conn->company_info('admin_path').'/kyc/approved'));
        }

        if(isset($_POST['cancel_btn'])){
            $type=$_POST['tx_type'];
            if($type=="bank"){
                $tx_type="bank_kyc_status";
                $reject_reason="bank_remark";
            }else if($type=="pan"){
               $tx_type="pan_kyc_status";
               $reject_reason="pan_remark";
            }else if($type=="adhaar"){
                $tx_type="adhaar_kyc_status";
                $reject_reason="adhaar_remark";
            }
            $this->form_validation->set_rules('reason', 'Reason', 'required');
            if($this->form_validation->run() != False){
                $set[$tx_type]="rejected";
                $set[$reject_reason]=$_POST['reason'];
                $this->db->where('id',$wd_id);
                $this->db->update('user_accounts',$set);
                redirect(base_url($this->conn->company_info('admin_path').'/kyc/cancelled'));
            }
        }

        $data['wd_id']=$wd_id;
        $this->show->admin_panel('kyc_view',$data);
        
    }
	
	public function action_multiple(){
        if(isset($_POST['withdrawal_btn'])){
            
            if(isset($_POST['wd_ids'])){
               // print_r($_POST['wd_ids']);
                $wd_id=$_POST['wd_ids'];
                $set['status']=1;
                $this->db->where_in('id',$wd_id);
                $this->db->update('transaction',$set);
                $this->session->set_flashdata("success", "Withdrawal Approved.");
                redirect($this->panel_url.'/withdrawal/approved');
            }else{
                $this->session->set_flashdata("error", "Invalid Request. Please Select User1");
                redirect($this->panel_url.'/withdrawal/pending'); 
            }
        }

        if(isset($_POST['reject_btn'])){
            
            if(isset($_POST['wd_ids'])){
                if(isset($_POST['reject_reason']) && $_POST['reject_reason']!=''){
                    $wd_id=$_POST['wd_ids'];
                    $set['status']=2;
                    $set['reason']=$_POST['reject_reason'];
                    $this->db->where_in('id',$wd_id);
                    $this->db->update('transaction',$set);
                    $this->session->set_flashdata("success", "Withdrawal Rejected.");
                    redirect($this->panel_url.'/withdrawal/cancelled');
                }else{
                    $this->session->set_flashdata("error", "Invalid Request. Please Give Reject reason.");
                    redirect($this->panel_url.'/withdrawal/pending'); 
                }
            }else{
                $this->session->set_flashdata("error", "Invalid Request. Please Select User");
                redirect($this->panel_url.'/withdrawal/pending'); 
            }
        }
    }
    public function approve($wd_id,$type){
        if($type=="bank"){
            $tx_type="bank_kyc_status";
        }else if($type=="pan"){
           $tx_type="pan_kyc_status"; 
        }else if($type=="adhaar"){
            $tx_type="adhaar_kyc_status";
        }
        $chk_exists=$this->conn->runQuery('id','user_accounts',"id='$wd_id' and $tx_type='submitted'");
        if($chk_exists){
            $set[$tx_type]='approved';
            $this->db->where('id',$wd_id);
            $this->db->update('user_accounts',$set);
        }
    }

}