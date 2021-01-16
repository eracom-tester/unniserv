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
    }

    public function index(){ 
        $this->show->user_panel('fund_add');
    }
     public function fund_convert(){
            $u_Code=$this->session->userdata('user_id');
            $csrf_test_name=json_encode($_POST);
            $crncy=$this->conn->company_info('currency');
            if(isset($_POST['convert_btn'])){
                $check_ex=$this->conn->runQuery('id','form_request',"request='$csrf_test_name' and u_code='$u_Code'");
                if($check_ex){
                    
                    $this->session->set_flashdata("error", "You can not submit same request within 5 minutes.");
                    redirect(base_url('user/fund/fund_convert'));
                }else{
                    $request['u_code']=$u_Code;
                    $request['request']=$csrf_test_name;
                    $this->db->insert('form_request',$request);
                    
                    $this->form_validation->set_rules('from_wallet', 'From Wallet', 'required|callback_check_from_wallet_useable');
                    $this->form_validation->set_rules('to_wallet', 'To Wallet', 'required|callback_check_to_wallet_useable');
                    $this->form_validation->set_rules('amount', 'Amount', 'required|callback_check_convert_balance');
                    if($this->form_validation->run() != False){
                        $amnt=$debit_amnt=abs($_POST['amount']);
                        $tx_amnt=$debit_amnt*0/100;
                        $credit=$debit_amnt-$tx_amnt;
                        $date=date('Y-m-d H:i:s');
                        
                        $collection_amnt=$debit_amnt*5/100;
                        
                        
                        $u_code_remark="You convert $debit_amnt from ".$_POST['from_wallet'].' to '.$_POST['to_wallet'];
                        $tx_u_code_remark="You recieve $credit from fund convert";
                        $collection_remark="You recieve 5% from fund convert";
                        
                        $inserttrans = array(
    					
    					array(
    						'wallet_type'  => $_POST['from_wallet'],
    						'tx_type'  => 'convert_send',
    						'debit_credit'  => 'debit',
    						'tx_u_code'  => $u_Code,
    						'u_code'  => $u_Code,
    						'amount'  => $credit,
    						'tx_charge'  => $tx_amnt,
    						'date'  => $date,
    						'status'  => 1,
    						'remark'  => $u_code_remark,
    					),
    					array(
    						'wallet_type'  => $_POST['to_wallet'],
    						'tx_type'  => 'convert_recieve',
    						'debit_credit'  => 'credit',
    						'tx_u_code'  => $u_Code,
    						'u_code'  => $u_Code,
    						'amount'  => $credit,
    						'tx_charge'  => 0,
    						'date'  => $date,
    						'status'  => 1,
    						'remark'  => $tx_u_code_remark,
    					)
    					
    				);
    
    				if($this->db->insert_batch('transaction',$inserttrans)){ 
    				    $this->update_ob->add_amnt($u_Code,$_POST['to_wallet'],$credit);
    				    $this->update_ob->add_amnt($u_Code,$_POST['from_wallet'],-$debit_amnt);
    				    //$this->update_ob->add_amnt($u_Code,'collection',$collection_amnt);
    				    
    					$smsg=" Convert Successful. You Convert $crncy $amnt";
    					$this->session->set_flashdata("success", $smsg);
    					redirect(base_url(uri_string()));
    
    				}else{
    					$this->session->set_flashdata("error", "Something wrong.");
    				} 
                    }
                    
                }
            }
        
        
        $this->show->user_panel('fund_convert');
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

						$u_code_open_wallet=$this->update_ob->wallet($u_code,$wallet_type);
						$u_code_closing_wallet=$u_code_open_wallet-$amnt;

						$tx_u_code_open_wallet=$this->update_ob->wallet($tx_u_code,$wallet_type);
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
						    $this->update_ob->add_amnt($tx_u_code,$wallet_type,$amnt);
						    $this->update_ob->add_amnt($u_code,$wallet_type,-$amnt);
						    
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
    
    public function fund_request(){
    
         if(isset($_POST['request_btn'])){
                //$_SESSION['form_submitted'] = TRUE;
                     
              $this->form_validation->set_rules('address', 'Address', 'required');            
              $this->form_validation->set_rules('payment_type', 'Payment Type', 'required');            
              $this->form_validation->set_rules('amount', 'Amount', 'required');             
              $this->form_validation->set_rules('utr_number', 'UTR', 'required'); 
              $params['upload_path']= 'payment_slip'; 
                        
             $upload_pic=$this->upload_file->upload_image('payment_slip',$params);               

                if($this->form_validation->run() != False && $upload_pic['upload_error']==false){
                   
                    $inserttrans['payment_slip'] = base_url().'images/payment_slip/'.$upload_pic['file_name'];
                    
            
					$profile=$this->session->userdata('profile');
					$username=$profile->username;
					$name=$profile->name;
                 
				   $inserttrans['wallet_type']='fund_wallet';
				   $inserttrans['tx_type']='fund_request';
                   $inserttrans['payment_type']=$_POST['payment_type'];
                   $inserttrans['cripto_type']=$_POST['address'];
                   $inserttrans['cripto_address']= $_POST['utr_number'];                 
                   $inserttrans['cripto_address']= $_POST['utr_number'];                 
				   $inserttrans['debit_credit']="credit";             
				   $inserttrans['u_code']=$this->session->userdata('user_id');
				   $inserttrans['amount']=abs($_POST['amount']);
				   $amnt=$inserttrans['amount'];
				   $inserttrans['date']=date('Y-m-d H:i:s');
				   $inserttrans['status']=0;
				  
				   $inserttrans['remark']="$name ($username) fund Request $crncy $amnt";
					
					
					if($this->db->insert('transaction',$inserttrans)){
					    
					   
						$smsg="fund request success of amount  $crncy $amnt .";
						$this->session->set_flashdata("success", $smsg);
						redirect(base_url(uri_string()));

					}else{
						$this->session->set_flashdata("error", "Something wrong.");
					}
				}
             
			}
		
     
        
         
        $this->show->user_panel('fund_request');
    }
    
    
    
    
    
    public function btc_address_inserted($str){
        $ID= $this->session->userdata('user_id');
        $check_username=$this->conn->runQuery("btc_address",'user_accounts',"u_code='$ID'");
        if($check_username && $check_username[0]->btc_address!=''){
            return true;
        }else{
            $this->form_validation->set_message('btc_address_inserted', "Add BTC address first!");
            return false;
        }
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
        $balance=$this->update_ob->wallet($this->session->userdata('user_id'),$wlt);        
        if($balance>=$str){
            return true;
        }else{
            $this->form_validation->set_message('check_transfer_balance', "Insufficient Fund in wallet.");
            return false;
        }
    }


   /* public function fund_request(){
        $this->show->user_panel('coming_soon');
        // $this->show->user_panel('fund_request');
    }
*/
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
             $this->form_validation->set_rules('selected_wallet', 'Wallet', 'required|callback_check_wallet_useable_withdrawal');            
             $this->form_validation->set_rules('amount', 'Amount', 'required|callback_check_transfer_balance|greater_than[0]|callback_check_account_exists|callback_min_withdrawal_limit');
           
         
            $with_drawal_mode=$this->conn->setting('withdrawals_mode')=='in_cripto';
             if($with_drawal_mode){
            $this->form_validation->set_rules('selected_address', 'Address', 'callback_check_cripto_address_exists');
        
                          }
        
       
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
    				$type=$_POST['selected_address'];
                    
                    $cripto_addres='';
                    switch($type){
                        case "ETH":
                            $cripto_addres=$bank_details[0]->eth_address;
                            break ;
                        case "BTC" :
                            $cripto_addres=$bank_details[0]->btc_address;
                            break ;
                        case "TRX" :
                            $cripto_addres=$bank_details[0]->tron_address;
                            break ;
                    }
                    $inserttrans['bank_details']=json_encode($bank_details[0]);
					
                    $crncy=$this->conn->company_info('currency');
					$profile=$this->session->userdata('profile');
					$username=$profile->username;
					$name=$profile->name;
                 
				   $inserttrans['wallet_type']=$_POST['selected_wallet'];
				   $inserttrans['tx_type']='withdrawal';
                   $inserttrans['cripto_type']=$_POST['selected_address'];
                   $inserttrans['cripto_address']=$cripto_addres;                     
				   $inserttrans['debit_credit']="debit";             
				   $inserttrans['u_code']=$this->session->userdata('user_id');
				   $inserttrans['amount']=abs($_POST['amount']);
				   $amnt=$inserttrans['amount'];
				   $inserttrans['date']=date('Y-m-d H:i:s');
				   $inserttrans['status']=0;
				   $inserttrans['open_wallet']=$this->update_ob->wallet($this->session->userdata('user_id'),$_POST['selected_wallet']);
				   $inserttrans['closing_wallet']=$inserttrans['open_wallet']-$inserttrans['amount'];
				   $inserttrans['remark']="$name ($username) Withdraw  $crncy $amnt";

					if($this->db->insert('transaction',$inserttrans)){
					    
					    //$this->update_ob->add_amnt($tx_u_code,$wallet_type,$amnt);
					    $this->update_ob->add_amnt($userid,$_POST['selected_wallet'],-$amnt);
					    $this->update_ob->add_amnt($userid,'total_withdrawal',$amnt);
						    
						$smsg="Withdrawal request success of amount  $crncy $amnt .";
						$this->session->set_flashdata("success", $smsg);
						redirect(base_url(uri_string()));

					}else{
						$this->session->set_flashdata("error", "Something wrong.");
					}
				}
             
			}
		}
     
        $this->show->user_panel('fund_withdraw');
    }
    
    
  /*  public function fund_withdraw(){
        if(isset($_POST['withdrawal_btn'])){
                //$_SESSION['form_submitted'] = TRUE;
            $this->form_validation->set_rules('selected_wallet', 'Wallet', 'required|callback_check_wallet_useable_withdrawal');
            
            $usrvald='';
            $btc_withdrawal=$this->conn->setting('btc_withdrawal');
            if($btc_withdrawal=='yes'){
                $usrvald='|callback_btc_address_inserted';
            }
            
            $this->form_validation->set_rules('amount', 'Amount', 'required|callback_check_transfer_balance|greater_than[0]|callback_check_account_exists|callback_min_withdrawal_limit'.$usrvald);
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
				   $inserttrans['open_wallet']=$this->update_ob->wallet($this->session->userdata('user_id'),$_POST['selected_wallet']);
				   $inserttrans['closing_wallet']=$inserttrans['open_wallet']-$inserttrans['amount'];
				   $inserttrans['remark']="$name ($username) Withdraw  $crncy $amnt";

					if($this->db->insert('transaction',$inserttrans)){
					    
					    //$this->update_ob->add_amnt($tx_u_code,$wallet_type,$amnt);
					    $this->update_ob->add_amnt($userid,$_POST['selected_wallet'],-$amnt);
					    $this->update_ob->add_amnt($userid,'total_withdrawal',$amnt);
						    
						$smsg="Withdrawal request success of amount  $crncy $amnt .";
						$this->session->set_flashdata("success", $smsg);
						redirect(base_url(uri_string()));

					}else{
						$this->session->set_flashdata("error", "Something wrong.");
					}
				}
             
			}
		}
     
        $this->show->user_panel('fund_withdraw');
    }
    */
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
        $min_withdrawal_limit=$this->conn->setting('min_withdrawal_limit');
       
        if(is_numeric($str)   && $str>=$min_withdrawal_limit){
            return true;
        }else{
            $curr=$this->conn->company_info('currency');
              $this->form_validation->set_message('min_withdrawal_limit', "Amount should be minimum $curr $min_withdrawal_limit");
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
    
    public function check_cripto_address_exists($st){
        $userid = $this->session->userdata('user_id');
        $cripto_address_details=$this->conn->runQuery('*',"user_accounts","status='1' and u_code='$userid'");
        $type=$st;
        if($type=="ETH"){
                    
            $cripto_addres=$cripto_address_details[0]->eth_address;
            
            }elseif($type=="BTC"){
            
            $cripto_addres=$cripto_address_details[0]->btc_address;
            }else{
            
            $cripto_addres= $cripto_address_details[0]->tron_address;
          
           }
       if($cripto_addres!=''){
            return true;
        }else{
              $this->form_validation->set_message('check_cripto_address_exists', "Add Cripto details first.");
               return false;
        }
    }
    
    
    
    
    
    
       public function cripto_detail(){
        $type=trim($_POST['selected_address']);
         $u_id=$this->session->userdata('user_id');
        $res='';
       
        if($type=='BTC'){
             $get_cripto_detail=$this->conn->runQuery('btc_address',"user_accounts","status='1' and u_code='$u_id'");
             if($get_cripto_detail[0]->btc_address!=''){
               echo $res.'My Address &nbsp;:'.$get_cripto_detail[0]->btc_address;  
             }else{
                echo $res.'My Address &nbsp;:No Address!';
             }
          }elseif($type=='ETH'){
             $get_cripto_eth=$this->conn->runQuery('eth_address',"user_accounts","status='1' and u_code='$u_id'");
            if($get_cripto_eth[0]->eth_address!=''){
               echo $res.'My Address &nbsp;:'.$get_cripto_eth[0]->eth_address;  
             }else{
                echo $res.'My Address &nbsp;:No Address!';
             }
           }else{
                if($type=='TRX'){
                    $get_cripto_tron=$this->conn->runQuery('tron_address',"user_accounts","status='1' and u_code='$u_id'");
                    
                  
                   if($get_cripto_tron[0]->tron_address!=''){
                       echo $res.'My Address &nbsp;:'.$get_cripto_tron[0]->tron_address;  
                     }else{
                         echo $res.'My Address &nbsp;:No Address!';
                     }
               }
        }
       
        
        if($get_cripto_detail){
            //$res=$get_cripto_detail;
        } else{
            //$res=0;
        }
        echo $res;
    }
    
    
    public function request_history(){
        $data=array();
        $limit=$this->limit;
        
        $conditions['u_code'] = $this->session->userdata('user_id');        
        $data['from_table']='transaction';
        $data['base_url']=$base_url=base_url().$this->panel_url.'/fund/request_history';  
         
        $conditions['tx_type']='fund_request';
        
        if(isset($_REQUEST['reset'])){
             redirect(base_url($base_url));
        }
        if(isset($_REQUEST['status']) && $_REQUEST['status']!='all'){
            $conditions['status']=$_REQUEST['status'];
        }
          
        if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!='' && isset($_REQUEST['end_date']) && $_REQUEST['end_date']!=''){
            $data['where']="date>='".$_REQUEST['start_date']."' and date<='".$_REQUEST['end_date']."'";
        }
        if(isset($_REQUEST['limit']) && $_REQUEST['limit']!=''){
            $limit=$_REQUEST['limit'];
        }
        
        $data['conditions']=$conditions;
        $data = $this->paging->search_response($data,$limit,$base_url);
        
        $data['base_url']=$base_url;
        
        $this->show->user_panel('fund_request_history',$data);
        
    }
    
    public function get_payment_method(){
        $type=$_POST['connection_type'];
        $res='';
        $get_operator_code=$this->conn->runQuery('*',"payment_method","parent_method='$type'");
        if($get_operator_code){
            $res .='<option value="">Select   </option>';
            foreach($get_operator_code as $get_operator_code1){
                $res .='<option value="'.$get_operator_code1->slug.'">'.$get_operator_code1->name.'</option>'; 
            }
        } 
        echo $res;
    }
    
    public function get_payment_method_image(){
        $type=$_POST['connection_type'];
        $res='';
        $get_operator_code=$this->conn->runQuery('*',"payment_method","slug='$type'");
        if($get_operator_code){
            $res .=base_url().'/images/qr_code/'.$get_operator_code[0]->image;
            //$res .='<img  style="width:100%;" src="'.base_url().'/images/qr_code/'.$get_operator_code[0]->image.'">';
          
             
        } 
        echo $res;
    }
    
     public function check_from_wallet_useable($str){
        $available_wallets=$this->conn->setting('convert_from_wallets');
        $useable_wallet=json_decode($available_wallets);
        if(array_key_exists($str,$useable_wallet)){
            return true;
        }else{
              $this->form_validation->set_message('check_from_wallet_useable', "You can not Convert fund from this wallet");
               return false;
        }
    }
    
    public function check_to_wallet_useable($str){
        $available_wallets=$this->conn->setting('convert_to_wallets');
        $useable_wallet=json_decode($available_wallets);
        if(array_key_exists($str,$useable_wallet)){
            return true;
        }else{
              $this->form_validation->set_message('check_to_wallet_useable', "You can not Convert fund to this wallet");
               return false;
        }
    }
    
   
    public function check_convert_balance($str){
        $wlt=$_POST['from_wallet'];
        $balance=$this->update_ob->wallet($this->session->userdata('user_id'),$wlt);        
        if($balance>=$str){
            return true;
        }else{
            $this->form_validation->set_message('check_convert_balance', "Insufficient Fund in wallet.");
            return false;
        }
    }
    
    public function wallet_balance(){
        $u_Code=$this->session->userdata('user_id');
        $wallet=$_POST['wallet'];
        
        if($wallet!=''){
            $res['error']=false;
            $res['message']=$this->update_ob->wallet($u_Code,$wallet);
        }else{
            $res['error']=true;
            $res['message']="Please select wallet.";
        }
        
        print_r(json_encode($res));
        
    }
}