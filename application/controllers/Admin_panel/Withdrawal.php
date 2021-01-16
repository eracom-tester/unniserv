<?php
class Withdrawal extends CI_Controller{
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
        $data['search_string']='withdrawal_search';
        $conditions['tx_type']='withdrawal';
        $conditions['status']=0;
        $data['from_table']='transaction';
        $data['base_url']=$this->panel_url.'/withdrawal/pending'; 
        
        if(!empty($conditions)){
            $data['conditions']=$conditions;
        }

        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        if(isset($_POST['export_to_excel'])){
            /* $dta[0]=array('Debit Ac No','Beneficiary Ac No','Beneficiary Name','Amt','Pay Mod','Date','IFSC');*/
            $whr="tx_type='withdrawal' and status='0'";
           $get_data=$this->conn->runQuery('bank_details,amount,date','transaction', $whr);          
           if($get_data){
                
               for($f=0;$f<count($get_data);$f++){
                $bank_details=json_decode($get_data[$f]->bank_details); 
                $dta['Debit Ac No']=0;//$bank_details->account_no;
                $dta['Beneficiary Ac No']=$bank_details->account_no;
                $dta['Beneficiary Name']=$bank_details->account_holder_name;
                $dta['Amt']=$get_data[$f]->amount;
                $dta['Pay Mod']='N';
                $dta['Date']= $get_data[$f]->date;
                $dta['IFSC']= $bank_details->ifsc_code;
                $exdataval[$f]=$dta;

               }
           }
             
            $this->export->export_to_excel($exdataval);

        }
        
        $data['sr_no']=$res['sr_no'];
        $data['total_rows']=$res['total_rows'];  

        $this->show->admin_panel('withdrawal_pending',$data);
    }
    
    public function approved(){

        $data['limit']=10;
        $data['search_string']='withdrawal_search';
        $conditions['tx_type']='withdrawal';
        $conditions['status']=1;
        

        $data['from_table']='transaction';
        $data['base_url']=$this->panel_url.'/withdrawal/approved';  
        
        
        if(!empty($conditions)){
            $data['conditions']=$conditions;
        }       


        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];      
        $data['total_rows']=$res['total_rows'];      
        $data['sr_no']=$res['sr_no'];
              
       
        $this->show->admin_panel('withdrawal_approved',$data);
    }
    
    public function cancelled(){
        $data['limit']=10;
        $data['search_string']='withdrawal_search';
        $conditions['tx_type']='withdrawal';
        $conditions['status']=2;
        $data['from_table']='transaction';
        $data['base_url']=$this->panel_url.'/withdrawal/pending'; 
        
        if(!empty($conditions)){
            $data['conditions']=$conditions;
        }       


        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['sr_no']=$res['sr_no'];
        $data['total_rows']=$res['total_rows'];  
        $this->show->admin_panel('withdrawal_cancelled',$data);
        
    }
    public function view(){
        if(isset($_REQUEST['id'])){
            $this->session->set_userdata('admin_withdrawal_id',$_REQUEST['id']);
        }
        $wd_id=$this->session->userdata('admin_withdrawal_id');

        if(isset($_POST['approve_btn'])){
            $this->approve($wd_id);
            $this->session->set_flashdata("success", "Withdrawal Approved.");
            redirect(base_url($this->conn->company_info('admin_path').'/withdrawal/approved'));
        }

        if(isset($_POST['cancel_btn'])){
            $this->form_validation->set_rules('reason', 'Reason', 'required');
            if($this->form_validation->run() != False){
                 $chk_exists=$this->conn->runQuery('u_code,amount,tx_charge,wallet_type','transaction',"status=0 and id='$wd_id'");
                if($chk_exists){
                    $u_code=$chk_exists[0]->u_code;
                    
                    $amnt=$chk_exists[0]->amount;
                    $tx_charge=$chk_exists[0]->tx_charge;
                    $ttl_amnt=$amnt+$tx_charge;
                    $wallet_type=$chk_exists[0]->wallet_type;
                    
                    
                    $set['status']=2;
                    $set['reason']=$_POST['reason'];
                    $this->db->where('id',$wd_id);
                    if($this->db->update('transaction',$set)){
                       $this->update_ob->add_amnt($u_code,$wallet_type,$ttl_amnt); 
                       $this->update_ob->add_amnt($u_code,'total_withdrawal',-$ttl_amnt); 
                       
                    }
                }
                
                redirect(base_url($this->conn->company_info('admin_path').'/withdrawal/cancelled'));
            }
        }

        $data['wd_id']=$wd_id;
        $this->show->admin_panel('withdrawal_view',$data);
        
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
                    if(!empty($wd_id)){
                        foreach($wd_id as $wdid){
                            $chk_exists=$this->conn->runQuery('amount,tx_charge,wallet_type','transaction',"status=0 and id='$wdid'");
                            if($chk_exists){
                                $u_code=$chk_exists[0]->u_code;
                                
                                $amnt=$chk_exists[0]->amount;
                                $tx_charge=$chk_exists[0]->tx_charge;
                                $ttl_amnt=$amnt+$tx_charge;
                                $wallet_type=$chk_exists[0]->wallet_type;
                                
                                $set=array();
                                $set['status']=2;
                                $set['reason']=$_POST['reject_reason'];
                                $this->db->where('id',$wdid);
                                if($this->db->update('transaction',$set)){
                                   $this->update_ob->add_amnt($u_code,$wallet_type,$ttl_amnt); 
                                   $this->update_ob->add_amnt($u_code,'total_withdrawal',-$ttl_amnt); 
                                   
                                }
                            }
                        }
                    }
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
    public function approve($wd_id){
        $chk_exists=$this->conn->runQuery('id','transaction',"status=0 and id='$wd_id'");
        if($chk_exists){
            $set['status']=1;
            $this->db->where('id',$wd_id);
            $this->db->update('transaction',$set);
        }
    }

}