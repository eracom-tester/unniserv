<?php
class Fund extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->currency=$this->conn->company_info('currency');
         
    }

    public function index(){ 
        $this->fund_transfer();
    }

    public function fund_transfer(){

        if(isset($_POST['transfer_btn'])){
            $this->form_validation->set_rules('selected_wallet', 'Wallet', 'required|callback_check_wallet_useable');
            $this->form_validation->set_rules('tx_username', 'Username', 'required|callback_valid_username');

            $min_transfer_limit=$this->conn->setting('min_transfer_limit');
            if($min_transfer_limit){
                $tr_validation='|callback_min_transfer_limit';
            }else{
                $tr_validation='';
            }

            $this->form_validation->set_rules('amount', 'Amount', 'required|greater_than[0]'.$tr_validation);
            if($this->form_validation->run() != False){
                $crncy=$this->conn->company_info('currency');

                $tx_username=$_POST['tx_username'];
                $wallet_type=$_POST['selected_wallet'];
                $transfer='admin_credit';
                $tx_u_code=$this->profile->id_by_username($tx_username);
                 
                $amnt=abs($_POST['amount']);
                $date=date('Y-m-d H:i:s');

                $tx_u_code_open_wallet=$this->wallet->balance($tx_u_code,$wallet_type);
                $tx_u_code_closing_wallet=$tx_u_code_open_wallet+$amnt;

                
                $tx_u_code_remark="$tx_username recieve $crncy $amnt from admin";

                $inserttrans = array(
                   
                    array(
                        'wallet_type'  => $wallet_type,
                        'tx_type'  => $transfer,
                        'debit_credit'  => 'credit',                        
                        'u_code'  => $tx_u_code,
                        'amount'  => $amnt,
                        'date'  => $date,
                        'status'  => 1,
                        'open_wallet'  => $tx_u_code_open_wallet,
                        'closing_wallet'  => $tx_u_code_closing_wallet,
                        'remark'  => $tx_u_code_remark,
                    )
                    
                );

                if($this->db->insert_batch('transaction',$inserttrans)){ 
                    $smsg=" Transaction Successful. You transfer $crncy $amnt to $tx_username";
                    $this->session->set_flashdata("success", $smsg);
                    redirect(base_url(uri_string()));

                }else{
                    $this->session->set_flashdata("error", "Something wrong.");
                }
            } 
        }


        $this->show->admin_panel('fund_transfer');
    }

    public function valid_username($str){
        $check_username=$this->conn->runQuery("id",'users',"username='$str'");
        if($check_username){
            return true;
        }else{
              $this->form_validation->set_message('valid_username', "Invalid Username! Please check username.");
               return false;
        }
    }

    

    public function check_wallet_useable($str){
        $available_wallets=$this->conn->setting('transfer_wallets');
        $useable_wallet=json_decode($available_wallets);
        if(array_key_exists($str,$useable_wallet)){
            return true;
        }else{
              $this->form_validation->set_message('check_wallet_useable', "You can not tranfer fund from this wallet");
               return false;
        }
    }

     
    
    public function min_transfer_limit($str){
        $min_transfer_limit=$this->conn->setting('min_transfer_limit');
       
        if(is_numeric($str) && $str>=$min_transfer_limit){
            return true;
        }else{
            $curr=$this->conn->company_info('currency');
              $this->form_validation->set_message('min_transfer_limit', "Amount should be minimum $curr $min_transfer_limit");
               return false;
        }
    }

    public function send_otp(){ 
        $ret['error']=true;
        
        if(isset($_POST['tx_username'])){
            $username=$_POST['tx_username'];
            if(isset($_POST['amount'])){
                $amount=$_POST['amount'];
                $check_username=$this->conn->runQuery('id,name','users',"username='$username'");
                if($check_username){
                    $otp=random_string('numeric', 6);
                    $this->session->set_tempdata('admin_otp', $otp, 300);
                    $company_name=$this->conn->company_info('title');
                    $name=$check_username[0]->name;
                    $msg="$otp is your OTP for send $amount to $name. Team $company_name";
                    $mobile=7827540939;
                   
                    $this->message->sms($mobile,$msg);
                    $ret['error']=false;
                    $ret['msg']="Success!. OTP has been sent to admin mobile number.";
                }else{
                    $ret['msg']="Invalid Username. Please check username.";
                }
            }else{
                $ret['msg']="Enter Amount.";
            }
            
        }else{
            $ret['msg']="Enter Username.";
        }
        
        return print_r(json_encode($ret));
    }
    
}