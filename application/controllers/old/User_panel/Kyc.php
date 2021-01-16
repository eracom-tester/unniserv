<?php
class Kyc extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){         
          
      //$this->show->user_panel('index');
    }

    public function docs(){
        $data=array();
        $userid=$this->session->userdata('user_id');
        if(isset($_POST['bank_kyc_btn'])){
            $this->form_validation->set_rules('account_holder_name', 'Account holder name', 'required');
            $this->form_validation->set_rules('account_no', 'Account no', 'required');
            $this->form_validation->set_rules('ifsc_code', 'IFSC code', 'required');
            $this->form_validation->set_rules('pan_no', 'Pan No', 'required');
            $this->form_validation->set_rules('adhaar_no', 'Adhaar No', 'required');
            if($this->form_validation->run() != False){
                $update['account_holder_name']=$this->input->post('account_holder_name');
                $update['account_no']=$this->input->post('account_no');
                $update['ifsc_code']=$this->input->post('ifsc_code');
                $update['pan_no']=$this->input->post('pan_no');
                $update['adhaar_no']=$this->input->post('adhaar_no');
                $update['kyc_status']=0;
                $details=$this->conn->runQuery('*',"user_accounts","u_code='$userid'");
                    if($details){
                        $this->db->where('u_code',$this->session->userdata('user_id'));
                        $qury=$this->db->update('user_accounts',$update);
                    }else{
                        $update['u_code']=$userid;
                        $qury=$this->db->insert('user_accounts',$update);
                    }
                $this->session->set_flashdata("success", "Request submitted successfully.");
                redirect(base_url(uri_string()));   
            }
            
        }
        $this->show->user_panel('kyc_docs',$data);
    }
    
    public function bank(){
        $data=array();
        if(isset($_POST['bank_kyc_btn'])){

            $userid=$this->session->userdata('user_id');
            $bank_details=$this->conn->runQuery('bank_kyc_status',"user_accounts","u_code='$userid' and bank_kyc_status IN ('submitted','approved')");
            if($bank_details==false){
                

                $this->form_validation->set_rules('paytm_no', 'Paytm no', 'required|regex_match[/^[0-9]{10}$/]');
                $this->form_validation->set_rules('bank_name', 'Bank name', 'required');
                $this->form_validation->set_rules('account_holder_name', 'Account holder name', 'required');
                $this->form_validation->set_rules('account_no', 'Account no', 'required');
                $this->form_validation->set_rules('ifsc_code', 'IFSC code', 'required');

                $params['upload_path']= 'kyc';            
                        
                $upload_pic=$this->upload_file->upload_image('bank_kyc_img',$params);
                

                if($this->form_validation->run() != False && $upload_pic['upload_error']==false){


                    $update['bank_img'] = base_url().'images/kyc/'.$upload_pic['file_name'];
                    $update['bank_name']=$this->input->post('bank_name');
                    $update['account_holder_name']=$this->input->post('account_holder_name');
                    $update['account_no']=$this->input->post('account_no');
                    $update['ifsc_code']=$this->input->post('ifsc_code');
                    $update['bank_branch']=$this->input->post('bank_branch');
                    $update['paytm_no']=$this->input->post('paytm_no');
                    $update['btc_address']=$this->input->post('btc_address');
                    $update['eth_address']=$this->input->post('eth_address');
                    $update['bank_kyc_status']="submitted";
                    $update['bank_kyc_date']=date('Y-m-d H:i:s');

                    $userid=$this->session->userdata('user_id');
                    $bank_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");
                    if($bank_details){
                        $this->db->where('u_code',$this->session->userdata('user_id'));
                        $qury=$this->db->update('user_accounts',$update);
                    }else{
                        $update['u_code']=$userid;
                        $qury=$this->db->insert('user_accounts',$update);
                    }          

                    if($qury){
                        $this->session->set_userdata('profile', $this->profile->profile_info($this->session->userdata('user_id')));
                        $this->session->set_flashdata("success", "Request submitted successfully.");
                        redirect(base_url(uri_string()));
                    }else{
                        
                        $this->session->set_flashdata("error", "Something Wrong.");
                        redirect(base_url(uri_string()));
                    }
                }else{
                    $data['upload_error']=($upload_pic['upload_error']==true ? $upload_pic['display_error'] : '');
                }
            }else{
                $this->session->set_flashdata("error", "Something Wrong.");
                redirect(base_url(uri_string()));
            }

                        
        }

        $this->show->user_panel('kyc_bank',$data);
    }

    public function pan(){
        $data=array();
        if(isset($_POST['pan_kyc_btn'])){

            $userid=$this->session->userdata('user_id');
            $pan_details=$this->conn->runQuery('pan_kyc_status',"user_accounts","u_code='$userid' and pan_kyc_status IN ('submitted','approved')");
            if($pan_details==false){
                 
                $this->form_validation->set_rules('pan_name', 'Pan name', 'required');                 
                $this->form_validation->set_rules('pan_no', 'Pan no', 'required');               

                $params['upload_path']= 'kyc';            
                        
                $upload_pic=$this->upload_file->upload_image('pan_image',$params);
                

                if($this->form_validation->run() != False && $upload_pic['upload_error']==false){


                    $update['pan_image'] = base_url().'images/kyc/'.$upload_pic['file_name'];
                    $update['pan_name']=$this->input->post('pan_name');
                     
                    $update['pan_no']=$this->input->post('pan_no');
                    
                    $update['pan_kyc_status']="submitted";
                    $update['pan_kyc_date']=date('Y-m-d H:i:s');

                    $userid=$this->session->userdata('user_id');
                    $pan_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");
                    if($pan_details){
                        $this->db->where('u_code',$this->session->userdata('user_id'));
                        $qury=$this->db->update('user_accounts',$update);
                    }else{
                        $update['u_code']=$userid;
                        $qury=$this->db->insert('user_accounts',$update);
                    }          

                    if($qury){                       
                        $this->session->set_flashdata("success", "Request submitted successfully.");
                        redirect(base_url(uri_string()));
                    }else{
                        
                        $this->session->set_flashdata("error", "Something Wrong.");
                        redirect(base_url(uri_string()));
                    }
                }else{
                    $data['upload_error']=($upload_pic['upload_error']==true ? $upload_pic['display_error'] : '');
                }
            }else{
                $this->session->set_flashdata("error", "Something Wrong.");
                redirect(base_url(uri_string()));
            }

                        
        }

        $this->show->user_panel('kyc_pan',$data);
    }

    public function adhaar(){
        $data=array();
        if(isset($_POST['adhaar_kyc_btn'])){

            $userid=$this->session->userdata('user_id');
            $adhaar_details=$this->conn->runQuery('adhaar_kyc_status',"user_accounts","u_code='$userid' and adhaar_kyc_status IN ('submitted','approved')");
            if($adhaar_details==false){
                 
                $this->form_validation->set_rules('adhaar_name', 'Adhaar name', 'required');                 
                $this->form_validation->set_rules('adhaar_no', 'Adhaar no', 'required');               

                $params['upload_path']= 'kyc';            
                        
                $upload_pic=$this->upload_file->upload_image('adhaar_image',$params);
                

                if($this->form_validation->run() != False && $upload_pic['upload_error']==false){

                    $update['adhaar_image'] = base_url().'images/kyc/'.$upload_pic['file_name'];
                    $update['adhaar_name']=$this->input->post('adhaar_name');
                     
                    $update['adhaar_no']=$this->input->post('adhaar_no');
                    
                    $update['adhaar_kyc_status']="submitted";
                    $update['adhaar_kyc_date']=date('Y-m-d H:i:s');

                    $userid=$this->session->userdata('user_id');
                    $adhaar_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");
                    if($adhaar_details){
                        $this->db->where('u_code',$this->session->userdata('user_id'));
                        $qury=$this->db->update('user_accounts',$update);
                    }else{
                        $update['u_code']=$userid;
                        $qury=$this->db->insert('user_accounts',$update);
                    }          

                    if($qury){                       
                        $this->session->set_flashdata("success", "Request submitted successfully.");
                        redirect(base_url(uri_string()));
                    }else{
                        
                        $this->session->set_flashdata("error", "Something Wrong.");
                        redirect(base_url(uri_string()));
                    }
                }else{
                    $data['upload_error']=($upload_pic['upload_error']==true ? $upload_pic['display_error'] : '');
                }
            }else{
                $this->session->set_flashdata("error", "Something Wrong.");
                redirect(base_url(uri_string()));
            }

                        
        }

        $this->show->user_panel('kyc_adhaar',$data);
    
    }
     
}