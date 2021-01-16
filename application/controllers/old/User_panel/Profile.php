<?php
class Profile extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){ 
        $this->show->user_panel('profile');
    }

    public function edit_profile(){

        if(isset($_POST['edit_btn'])){

            $edit_profile_with_otp=$this->conn->setting('edit_profile_with_otp');
            if($edit_profile_with_otp=='yes'){
                $this->form_validation->set_rules('otp_input1', 'OTP', 'required|trim|callback_check_otp_valid');
            }
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]|callback_is_mobile_valid');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            if($this->form_validation->run() != False){
                $update['name']=$this->input->post('name');
                $update['email']=$this->input->post('email');
                $update['mobile']=$this->input->post('mobile');
                $edit_profile_once=$this->conn->setting('edit_profile_once');
                 if($edit_profile_once=='yes'){
                     $update['profile_edited']=1;
                 }
                
                
                
                $this->db->where('id',$this->session->userdata('user_id'));
                if($this->db->update('users',$update)){
                    $this->session->set_userdata('profile', $this->profile->profile_info($this->session->userdata('user_id')));
                    $this->session->set_flashdata("success", "Profile Updated successfully.");
                    redirect(base_url(uri_string()));
                }else{
                    
                    $this->session->set_flashdata("error", "Something Wrong.");
                    redirect(base_url(uri_string()));
                }  
            }           
        }

        if($this->conn->plan_setting('bank_kyc')!='1'){       
            if(isset($_POST['edit_bank_btn'])){

                $edit_profile_with_otp=$this->conn->setting('edit_bank_with_otp');
                if($edit_profile_with_otp=='yes'){
                    $this->form_validation->set_rules('otp_input', 'OTP', 'required|trim|callback_check_otp_valid');
                }
                $edit_bank_enable=$this->conn->setting('edit_bank_enable');
                if($edit_bank_enable=='yes'){
                    $this->form_validation->set_rules('account_no', 'Account no', 'required');
                    $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'required');
                }
                $edit_paytm_enable=$this->conn->setting('edit_paytm_enable');
                if($edit_paytm_enable=='yes'){
                    $this->form_validation->set_rules('paytm_no', 'Paytm no', 'required|regex_match[/^[0-9]{10}$/]');
                }
                $edit_btc_enable=$this->conn->setting('edit_btc_enable');
                if($edit_btc_enable=='yes'){
                    $this->form_validation->set_rules('btc_address', 'BTC Address', 'required');
                    $this->form_validation->set_rules('eth_address', 'ETH Address', 'required');
                }
                if($this->form_validation->run() != False){
                    
                    if($edit_bank_enable=='yes'){
                        $update['bank_name']=$this->input->post('bank_name');
                        $update['account_holder_name']=$this->input->post('account_holder_name');
                        $update['account_no']=$this->input->post('account_no');
                        $update['ifsc_code']=$this->input->post('ifsc_code');
                        $update['bank_branch']=$this->input->post('bank_branch');
                    }
                    
                    if($edit_paytm_enable=='yes'){
                        $update['paytm_no']=$this->input->post('paytm_no');
                    }
                    if($edit_btc_enable=='yes'){
                        $update['btc_address']=$this->input->post('btc_address');
                        $update['eth_address']=$this->input->post('eth_address');
                    }
                    $update['bank_kyc_status']="approved";
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
                        $this->session->set_flashdata("success", "Profile Updated successfully.");
                        redirect(base_url(uri_string()));
                    }else{
                        
                        $this->session->set_flashdata("error", "Something Wrong.");
                        redirect(base_url(uri_string()));
                    }
                }                            
            }

        }

        $this->show->user_panel('edit_profile');
    }

    public function change_password(){

        if(isset($_POST['password_btn'])){

            $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_check_old_password');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]'); 
            if($this->form_validation->run() != False){
                $update['password']=md5($this->input->post('password'));               
                $this->db->where('id',$this->session->userdata('user_id'));
                if($this->db->update('users',$update)){
                    $this->session->set_userdata('profile', $this->profile->profile_info($this->session->userdata('user_id')));
                    $this->session->set_flashdata("success", "Password successfully changed.");
                    redirect(base_url(uri_string()));
                }else{                    
                    $this->session->set_flashdata("error", "Something Wrong.");
                    redirect(base_url(uri_string()));
                }
            }                        
        }

        $this->show->user_panel('change_password');
    }

    public  function check_old_password($str){
             $prof=$this->session->userdata('profile');
        if($prof->password==md5($str)){
            return true;
        }else{
              $this->form_validation->set_message('check_old_password', "Old password not match! Please Try again.");
               return false;
        }
    }

    public  function check_otp_valid($str){
        if(isset($_SESSION['otp'])){
            if($_SESSION['otp']==$str){
                return true;
            }else{
                $this->form_validation->set_message('check_otp_valid', "Incorect OTP. Please try again.");
                return false;
            }
        }else{
            $this->form_validation->set_message('check_otp_valid', "OTP not Valid.");
            return false;
        }        
    }

    public function verify_username(){
        $username=$_POST['username'];
        $ret['error']=true;
        if($username!=''){
            $check=$this->conn->runQuery('id,name','users',"username='$username'");
            if($check){
                $ret['error']=false;
                $ret['msg']=$check[0]->name;
            }else{                
                $ret['msg']="Invalid Username.";
            }
        }else{            
            $ret['msg']="Please enter username.";
        }        
        print_r(json_encode($ret));
    }

    public  function is_mobile_valid($str){
        $where = array(
            'mobile' => $str            
        );
        $result=$this->conn->runQuery('id','users', $where);
        if($result){            
            $mobile_users=$this->conn->setting('mobile_users');
            if(count($result)>=$mobile_users){
                  $this->form_validation->set_message('is_mobile_valid', "You exceed maximum number of mobile use limit! Please Try another.");
                 return false;                
            }else{
                return true;
            }
        }else{
            return true;
        }
    }

    public function send_otp(){
        $mobile=$this->session->userdata('profile')->mobile;
        $otp=random_string('numeric', 6);
        $this->session->set_tempdata('otp', $otp, 300);
        $company_name=$this->conn->company_info('title');
        $msg="$otp is your OTP. Team $company_name";
        $this->message->sms($mobile,$msg);
        return json_encode(array('error'=>false));
    }
}