<?php
class Incomes extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        /*if($this->conn->plan_setting('transactions_section')!=1){
            $admin_path=$this->conn->company_info('admin_path');
            redirect(base_url($admin_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }*/
         $this->admin_url=$this->conn->company_info('admin_path');
         $this->limit=10;
    }

   
    public function index(){
        
        $conditions=array();
     
       if(isset($_POST['reset'])){
            $this->session->unset_userdata($data['search_string']);
        }
        
       $searchdata['from_table']='transaction';
       $conditions['tx_type'] ='income'; 
       $source=$_REQUEST['income'];
       $conditions['source']=$source; 
       
          
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
        if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && $_REQUEST['start_date']!='' && $_REQUEST['end_date']!='' ){
			$start_date=date('Y-m-d 00:00:00',strtotime($_REQUEST['start_date']));
			$end_date=date('Y-m-d 23:59:00',strtotime($_REQUEST['end_date']));
			$where="(date BETWEEN '$start_date' and '$end_date')";
            $searchdata['where'] = $where;
		}
		if(isset($_REQUEST['source']) && $_REQUEST['source']!=''){
            $source=$_REQUEST['source'];
            if($source){
                $conditions['tx_type'] = $source;
            }
           
        }   
        if(isset($_REQUEST['debit_credit']) && $_REQUEST['debit_credit']!=''){
            $debit_credit=$_REQUEST['debit_credit'];
            if($debit_credit){
                $conditions['debit_credit'] = $debit_credit;
            }
           
        }  
	
        
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/incomes'); 
         
            
        $this->show->admin_panel('incomes',$data);    
        
    }
    
    
    
    
    
    
    
    /*public function payouts(){
        $data['limit']=10;
        $data['search_string']='transaction_search_payouts';
        $conditions=array();
        if(isset($_REQUEST['income'])){
            $this->session->set_userdata('show_income',$_REQUEST['income']);
        }

        if(isset($_POST['reset'])){
            $this->session->unset_userdata($data['search_string']);
        }
        
        $data['base_url']=$this->panel_url.'/transactions';  
        
        $whr='1=1 AND';
        if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && $_REQUEST['start_date']!='' && $_REQUEST['end_date']!=''){
                $start_date=date('Y-m-d 00-00-01',strtotime($_REQUEST['start_date']));
                $end_date=date('Y-m-d 23-59-59',strtotime($_REQUEST['end_date']));
                $whr .= " ( `date` BETWEEN '$start_date' AND '$end_date') AND";
        }

        $whr=rtrim($whr,'AND');
        $data['where']=$whr;

        $conditions['tx_type']='payout';
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

              
       $this->show->admin_panel('payouts',$data);        
    }

    */
    
    
    
    
    
    
    
    
    public function pending_payouts(){
      $conditions=array();
        if(isset($_REQUEST['income'])){
            $this->session->set_userdata('show_income',$_REQUEST['income']);
        }

        if(isset($_POST['reset'])){
            $this->session->unset_userdata($data['search_string']);
        }
        
       $searchdata['from_table']='transaction';
       $conditions['tx_type']='payout';
       $conditions['status']=0;
       
           
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
        
        if(isset($_REQUEST['payout_id']) && $_REQUEST['payout_id']!=''){
            $spo=$_REQUEST['payout_id'];
            $conditions['payout_id'] = $spo;
        } 
        if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && $_REQUEST['start_date']!='' && $_REQUEST['end_date']!='' ){
			$start_date=date('Y-m-d 00:00:00',strtotime($_REQUEST['start_date']));
			$end_date=date('Y-m-d 23:59:00',strtotime($_REQUEST['end_date']));
			$where="(updated_on BETWEEN '$start_date' and '$end_date')";
            $searchdata['where'] = $where;
		}
        
          if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/transactions/pending_payouts'); 
         
            
        $this->show->admin_panel('payout_pending',$data); 

    }

     public function payouts(){
      $conditions=array();
        if(isset($_REQUEST['income'])){
            $this->session->set_userdata('show_income',$_REQUEST['income']);
        }

        if(isset($_POST['reset'])){
            $this->session->unset_userdata($data['search_string']);
        }
        
       $searchdata['from_table']='transaction';
       $conditions['tx_type']='payout';
       $conditions['status']=1;
           
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
        if(isset($_REQUEST['payout_id']) && $_REQUEST['payout_id']!=''){
            $spo=$_REQUEST['payout_id'];
            $conditions['payout_id'] = $spo;
        } 
        
        
        if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && $_REQUEST['start_date']!='' && $_REQUEST['end_date']!='' ){
			$start_date=date('Y-m-d 00:00:00',strtotime($_REQUEST['start_date']));
			$end_date=date('Y-m-d 23:59:00',strtotime($_REQUEST['end_date']));
			$where="(updated_on BETWEEN '$start_date' and '$end_date')";
            $searchdata['where'] = $where;
		}
        
          if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/transactions/payouts'); 
         
            
        $this->show->admin_panel('payouts',$data); 

    }
    
    
    public function view(){
        if(isset($_REQUEST['id'])){
            $this->session->set_userdata('admin_withdrawal_id',$_REQUEST['id']);
        }
        $wd_id=$this->session->userdata('admin_withdrawal_id');

        if(isset($_POST['approve_btn'])){
            $this->approve($wd_id);
            $this->session->set_flashdata("success", "Payout Approved.");
            redirect(base_url($this->conn->company_info('admin_path').'/transactions/pending_payouts'));
        }

        /*if(isset($_POST['cancel_btn'])){
            $this->form_validation->set_rules('reason', 'Reason', 'required');
            if($this->form_validation->run() != False){
                $set['status']=2;
                $set['reason']=$_POST['reason'];
                $this->db->where('id',$wd_id);
                $this->db->update('transaction',$set);
                redirect(base_url($this->conn->company_info('admin_path').'/transactions/pending_payouts'));
            }
        }*/

        $data['wd_id']=$wd_id;
        $this->show->admin_panel('payout_view',$data);
        
    }
     
    public function approve($wd_id){
        $chk_exists=$this->conn->runQuery('id','transaction',"status=0 and id='$wd_id'");
        if($chk_exists){
            $set['status']=1;
            $set['reason']=$_POST['reason'];
            $this->db->where('id',$wd_id);
            $this->db->update('transaction',$set);
        }
    }
}