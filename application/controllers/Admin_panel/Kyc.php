<?php
class Kyc extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->admin_url=$this->conn->company_info('admin_path');
        $this->limit=10;
    }

    public function index(){

        $this->pending();
        
    }

    public function pending(){
      
        
        $searchdata['where']="(pan_kyc_status='submitted' or bank_kyc_status='submitted' or adhaar_kyc_status='submitted')";
        $searchdata['from_table']='user_accounts';
       
         if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
           $spo=$this->profile->column_like($_REQUEST['name'],'name');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
          
          
            $spo=$this->profile->column_like($_REQUEST['username'],'username');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
           
        }
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/kyc/pending');
        $this->show->admin_panel('kyc_pending',$data); 
    }
    
    public function approved(){
        
        
        $searchdata['where']="(pan_kyc_status='approved' or bank_kyc_status='approved' or adhaar_kyc_status='approved')";
        $searchdata['from_table']='user_accounts';
       
         if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
           $spo=$this->profile->column_like($_REQUEST['name'],'name');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
          
          
            $spo=$this->profile->column_like($_REQUEST['username'],'username');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
           
        }
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/kyc/approved');
        $this->show->admin_panel('kyc_approved',$data); 
    }
    
    public function cancelled(){
      
        
        $searchdata['where']="(pan_kyc_status='rejected' or bank_kyc_status='rejected' or adhaar_kyc_status='rejected')";
        $searchdata['from_table']='user_accounts';
       
         if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
           $spo=$this->profile->column_like($_REQUEST['name'],'name');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
          
          
            $spo=$this->profile->column_like($_REQUEST['username'],'username');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
           
        }
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/kyc/cancelled');
        $this->show->admin_panel('kyc_cancelled',$data); 
        
    }
  
   
    public function view(){
        if(isset($_REQUEST['id'])){
            $this->session->set_userdata('admin_kyc_id',$_REQUEST['id']);
        }
        $wd_id=$this->session->userdata('admin_kyc_id');

        if(isset($_POST['approve_btn'])){
            $tx_type=$_POST['tx_type'];
            //$this->approve($wd_id,$tx_type);
            if($tx_type=="bank"){
            $tx_type1="bank_kyc_status";
        }else if($tx_type=="pan"){
           $tx_type1="pan_kyc_status"; 
        }else if($tx_type=="adhaar"){
            $tx_type1="adhaar_kyc_status";
        }
        $chk_exists=$this->conn->runQuery('id','user_accounts',"id='$wd_id' and $tx_type1='submitted'");
        if($chk_exists){
            if($tx_type=="bank"){
               $set['bank_name']=$_POST['bank_name'];
               $set['account_holder_name']=$_POST['account_holder_name'];
               $set['account_no']=$_POST['account_no'];
               $set['ifsc_code']=$_POST['ifsc_code'];
               $set['bank_branch']=$_POST['bank_branch'];
            }elseif($tx_type=="pan"){
                $set['pan_name']=$_POST['pan_name'];
                $set['pan_no']=$_POST['pan_no'];
            }elseif($tx_type=="adhaar"){
                $set['adhaar_name']=$_POST['adhaar_name'];
                $set['adhaar_no']=$_POST['adhaar_no'];
            }
            
            $set[$tx_type1]='approved';
            $this->db->where('id',$wd_id);
            $this->db->update('user_accounts',$set);
        }
            
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
                redirect($this->admin_url.'/withdrawal/approved');
            }else{
                $this->session->set_flashdata("error", "Invalid Request. Please Select User1");
                redirect($this->admin_url.'/withdrawal/pending'); 
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
                    redirect($this->admin_url.'/withdrawal/cancelled');
                }else{
                    $this->session->set_flashdata("error", "Invalid Request. Please Give Reject reason.");
                    redirect($this->admin_url.'/withdrawal/pending'); 
                }
            }else{
                $this->session->set_flashdata("error", "Invalid Request. Please Select User");
                redirect($this->admin_url.'/withdrawal/pending'); 
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
            if($tx_type=="bank"){
               $set['bank_name']='approved';
               $set['account_holder_name']='approved';
               $set['account_no']='approved';
               $set['ifsc_code']='approved';
               $set['bank_branch']='approved';
            }
            
            $set[$tx_type]='approved';
            $this->db->where('id',$wd_id);
            $this->db->update('user_accounts',$set);
        }
    }

}