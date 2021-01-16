<?php
class Fund extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('fund_section')!=1){
            $panel_path=$this->conn->company_info('panel_path');
            redirect(base_url($panel_path.'/dashboard'));
            
        }
		$this->currency=$this->conn->company_info('currency');
			$this->panel_url=$this->conn->company_info('panel_path');
    }

    public function index(){ 
        $this->show->user_panel('fund_add');
    }

    public function fund_add(){
        $this->show->user_panel('coming_soon');
        //$this->show->user_panel('fund_add');
    }
    public function fund_transfer(){

        if(isset($_POST['transfer_btn'])){
            $u_code=$this->session->userdata('user_id');      


            $this->form_validation->set_rules('selected_wallet', 'Wallet', 'required|callback_check_wallet_useable');
            $this->form_validation->set_rules('tx_username', 'Username', 'required|callback_valid_username|callback_self_check');

            $min_transfer_limit=$this->conn->setting('min_transfer_limit');
            if($min_transfer_limit){
                $tr_validation='|callback_min_transfer_limit';
            }else{
                $tr_validation='';
            }

            $this->form_validation->set_rules('amount', 'Amount', 'required|callback_check_transfer_balance|greater_than[0]'.$tr_validation);
            if($this->form_validation->run() != False){
				 $csrf_test_name=json_encode($_POST);

                    $check_ex=$this->conn->runQuery('id','form_request',"request='$csrf_test_name'");
                    if($check_ex){
						$this->session->set_flashdata("error", "You can not submit same request within 5 minutes.");
                    }else{               
					    $request['u_code']=$u_code;
                        $request['request']=$csrf_test_name;
                        $this->db->insert('form_request',$request);
						$crncy=$this->conn->company_info('currency');

						$username=$this->session->userdata('profile')->username;
						$name=$this->session->userdata('profile')->name;

						$tx_username=$_POST['tx_username'];
						$wallet_type=$_POST['selected_wallet'];
						$transfer='transfer';
						$tx_u_code=$this->profile->id_by_username($tx_username);
						$u_code=$this->session->userdata('user_id');
						$amnt=abs($_POST['amount']);
						$date=date('Y-m-d H:i:s');

						$u_code_open_wallet=$this->wallet->balance($u_code,$wallet_type);
						$u_code_closing_wallet=$u_code_open_wallet-$amnt;

						$tx_u_code_open_wallet=$this->wallet->balance($tx_u_code,$wallet_type);
						$tx_u_code_closing_wallet=$tx_u_code_open_wallet+$amnt;

						$u_code_remark="$name ( $username ) sent $crncy $amnt to $tx_username";
						$tx_u_code_remark="$tx_username recieve $crncy $amnt from $name ( $username )";

						$inserttrans = array(
							array(
								'wallet_type'  => $wallet_type,
								'tx_type'  => $transfer,
								'debit_credit'  => 'debit',
								'tx_u_code'  => $tx_u_code,
								'u_code'  => $u_code,
								'amount'  => $amnt,
								'date'  => $date,
								'status'  => 1,
								'open_wallet'  => $u_code_open_wallet,
								'closing_wallet'  => $u_code_closing_wallet,
								'remark'  => $u_code_remark,
							),
							array(
								'wallet_type'  => $wallet_type,
								'tx_type'  => $transfer,
								'debit_credit'  => 'credit',
								'tx_u_code'  => $u_code,
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
		}
         
        $this->show->user_panel('fund_transfer');
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

    public function self_check($str){
        $check_username=$this->session->userdata('profile')->username;
        if($check_username!=$str){
            return true;
        }else{
              $this->form_validation->set_message('self_check', " Invalid Username! You can not transfer fund to yourself.");
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

    public function check_transfer_balance($str){
        $wlt=$_POST['selected_wallet'];
        $balance=$this->wallet->balance($this->session->userdata('user_id'),$wlt);        
        if($balance>=$str){
            return true;
        }else{
            $this->form_validation->set_message('check_transfer_balance', "Insufficient Fund in wallet.");
            return false;
        }
    }


    public function fund_request(){
        $this->show->user_panel('coming_soon');
        // $this->show->user_panel('fund_request');
    }

    public function fund_deposit(){

        $usrId=$this->session->userdata('user_id');

$payTo='';
$find_address_query=$this->conn->runQuery("*","wallet_address","userid='$usrId'");
if($find_address_query){
    $payTo=$find_address_query[0]->btc_address;
}else{
    $this->load->model('Btc_api','address_ob');
    $payTo=$this->address_ob->generate_btc_address($usrId);
}
$data['payTo']=$payTo;

        $this->show->user_panel('fund_deposit',$data);
        // $this->show->user_panel('fund_request');
    }

    public function fund_withdraw(){
        if(isset($_POST['withdrawal_btn'])){
                //$_SESSION['form_submitted'] = TRUE;
               
                if($this->session->userdata('profile')->active_status=='1'){
                    $this->form_validation->set_rules('selected_wallet', 'Wallet', 'required|callback_check_wallet_useable_withdrawal');            
                    $this->form_validation->set_rules('amount', 'Amount', 'required|callback_check_transfer_balance|greater_than[0]|callback_check_account_exists|callback_min_withdrawal_limit|callback_max_withdrawal_limit|callback_check_pending_withdrawal');
                    if($this->form_validation->run() != False){
        				$csrf_test_name=json_encode($_POST);
        				$check_ex=$this->conn->runQuery('id','form_request',"request='$csrf_test_name'");
        				if($check_ex){
        					$this->session->set_flashdata("error", "You can not submit same request within 5 minutes.");
        				}else{   
        				    
        					$request['u_code']=$this->session->userdata('user_id');
        					$request['request']=$csrf_test_name;
        					$this->db->insert('form_request',$request);
        					$userid=$this->session->userdata('user_id');
        					$bank_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");
        					$inserttrans['bank_details']=json_encode($bank_details[0]);
        					$crncy=$this->conn->company_info('currency');
        					$profile=$this->session->userdata('profile');
        					$username=$profile->username;
        					$name=$profile->name;
        				   $inserttrans['wallet_type']=$_POST['selected_wallet'];
        				   $inserttrans['tx_type']='withdrawal';  
        				   $inserttrans['debit_credit']="debit";             
        				   $inserttrans['u_code']=$this->session->userdata('user_id');
        				   $inserttrans['amount']=abs($_POST['amount']);
        				   $amnt=$inserttrans['amount'];
        				   $inserttrans['date']=date('Y-m-d H:i:s');
        				   $inserttrans['status']=0;
        				   $inserttrans['open_wallet']=$this->wallet->balance($this->session->userdata('user_id'),$_POST['selected_wallet']);
        				   $inserttrans['closing_wallet']=$inserttrans['open_wallet']-$inserttrans['amount'];
        				   $inserttrans['remark']="$name ($username) Withdraw  $crncy $amnt";
        
        					if($this->db->insert('transaction',$inserttrans)){
        						$smsg="Withdrawal request success of amount  $crncy $amnt .";
        						$this->session->set_flashdata("success", $smsg);
        						redirect(base_url(uri_string()));
        
        					}else{
        						$this->session->set_flashdata("error", "Something wrong.");
        					}
        				}
                     
        			}
                }else{
                    	$smsg="Please Activate your account first.";
						$this->session->set_flashdata("error", $smsg);
						redirect(base_url(uri_string()));
                }
                
            
		}
     
        $this->show->user_panel('fund_withdraw');
    }
    
    public function check_wallet_useable_withdrawal($str){
        $available_wallets=$this->conn->setting('withdrawal_wallets');
        $useable_wallet=json_decode($available_wallets);
        if(array_key_exists($str,$useable_wallet)){
            return true;
        }else{
              $this->form_validation->set_message('check_wallet_useable', "You can not Withdraw fund from this wallet");
               return false;
        }
    }

    public function min_withdrawal_limit($str){
        $user_id=$this->session->userdata('user_id');
        $user_withdrawals=$this->conn->runQuery('id','transaction',"u_code='$user_id' and tx_type='withdrawal' and status IN (1,0)");
        $count_withdrawal=($user_withdrawals ? count($user_withdrawals):0);
        
        $withdrawal_limits = $this->conn->setting('withdrawal_limits');
        $explode=array();
        $count_validation=($withdrawal_limits ? count($explode = explode(",", $withdrawal_limits)):0);
        
        if($withdrawal_limits && $count_withdrawal<$count_validation){
            $min_withdrawal_limit=$explode[$count_withdrawal];
             if(is_numeric($str)   && $str==$min_withdrawal_limit){
                return true;
            }else{
                $curr=$this->conn->company_info('currency');
                  $this->form_validation->set_message('min_withdrawal_limit', "Amount should be $curr $min_withdrawal_limit");
                   return false;
            }
             
        }else{
             $curr=$this->conn->company_info('currency');
            $err_msg='';
            $multiple_res=false;
            $withdrawal_multiple_of=$this->conn->setting('withdrawal_multiple_of');
            if($withdrawal_multiple_of){
                if($str % $withdrawal_multiple_of == 0){
                    $multiple_res=true;
                }else{
                    $err_msg= "And multiple of  $curr $withdrawal_multiple_of";
                }
            }else{
                 $multiple_res=true;
            }
            
            $min_withdrawal_limit=$this->conn->setting('min_withdrawal_limit');
            if(is_numeric($str)   && $str>=$min_withdrawal_limit && $multiple_res===true){
                return true;
            }else{
                
                  $this->form_validation->set_message('min_withdrawal_limit', "Amount should be minimum $curr $min_withdrawal_limit $err_msg");
                   return false;
            }
        }
        
    }
    
    public function max_withdrawal_limit($str){
        $max_withdrawal_limit=$this->conn->setting('max_withdrawal_limit');
       
        if(is_numeric($str)   && $str<=$max_withdrawal_limit){
            return true;
        }else{
            $curr=$this->conn->company_info('currency');
              $this->form_validation->set_message('max_withdrawal_limit', "Amount should be maximum $curr $max_withdrawal_limit ");
               return false;
        }
    }
    
     public function check_pending_withdrawal($st){
        $userid = $this->session->userdata('user_id');
        $bank_details=$this->conn->runQuery('u_code',"transaction","status='0' and u_code='$userid' and tx_type='withdrawal'");
        if(!$bank_details){
            return true;
        }else{
              $this->form_validation->set_message('check_pending_withdrawal', "You already have a pending withdrawal request.");
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

    public function check_account_exists($st){
        $userid = $this->session->userdata('user_id');
        $bank_details=$this->conn->runQuery('u_code',"user_accounts","status='1' and u_code='$userid'");
        if($bank_details){
            return true;
        }else{
              $this->form_validation->set_message('check_account_exists', "Add account details first.");
               return false;
        }
    }
    
    public function withdrawal_history(){ 
        $data['limit']=25;
        $data['search_string']='withdrawal_history_search';         
        $conditions['u_code'] = $this->session->userdata('user_id');
        $conditions['tx_type'] = 'withdrawal';
        $data['from_table']='transaction';
        $data['base_url']=$this->panel_url.'/fund/withdrawal-history';        
        $data['conditions']=$conditions;
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['sr_no']=$res['sr_no'];
        $this->show->user_panel('withdrawal_history',$data);
    }
}