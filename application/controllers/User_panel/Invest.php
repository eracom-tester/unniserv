<?php
class Invest extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('invest_section')!=1){
            $panel_path=$this->conn->company_info('panel_path');
            redirect(base_url($panel_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }
         $this->panel_url=$this->conn->company_info('panel_path');
    }

    public function investment(){
       //  $this->show->user_panel('coming_soon');

        if(isset($_POST['topup_btn'])){
            $pinvalidation='';

            if($this->conn->setting('topup_type')=='amount'){
                $this->form_validation->set_rules('selected_wallet', 'Wallet', 'required|callback_check_wallet_useable|callback_check_wallet_balance');
            }elseif($this->conn->setting('topup_type')=='pin'){
                $pinvalidation="|callback_check_pin_available";
            }
            

            $this->form_validation->set_rules('tx_username', 'Username', 'required|callback_valid_username|callback_already_topup');
            $this->form_validation->set_rules('selected_pin', 'Package', "required|callback_valid_package".$pinvalidation);

            if($this->form_validation->run() != False){
                $currenct_payout_id=$this->wallet->currenct_payout_id();
                $tx_username=$_POST['tx_username'];
                $tx_u_code=$this->profile->id_by_username($tx_username);
                $pin_type=$_POST['selected_pin'];
                $pin_details=$this->pin->pin_details($pin_type);

                $orders['u_code']=$tx_u_code;
                $orders['tx_type']='purchase';
                $orders['order_amount']=$pin_details->pin_rate;
                $orders['order_bv']=$pin_details->business_volumn;
                $orders['pv']=$pin_details->pin_value;
                $orders['status']=1;
                $orders['payout_id']=$currenct_payout_id;
                $orders['payout_status']=0;

                if($this->db->insert('orders',$orders)){
                    $mx_id=$this->conn->runQuery('MAX(active_id) as mx','users',"active_status='1'")[0]->mx;
                    $active_id = ($mx_id ? $mx_id:0)+1;
                    $update=array(
                        'active_id' => $active_id,
                        'active_status' => 1,
                        'active_date' => date('Y-m-d H:i:s'),
                    );
                    $this->db->where('id',$tx_u_code);
                    $this->db->update('users',$update);

                    if($this->conn->setting('topup_type')=='amount'){
                        $username=$this->session->userdata('profile')->username;
                        
                        $transaction['u_code']=$this->session->userdata('user_id');
                        $transaction['tx_u_code']=$tx_u_code;
                        $transaction['tx_type']="topup";
                        $transaction['debit_credit']="debit";
                        $transaction['wallet_type']=$_POST['selected_wallet'];
                        $transaction['amount']=$pin_details->pin_rate;
                        $transaction['date']=date('Y-m-d H:i:s');
                        $transaction['status']=1;
                        $transaction['open_wallet']=$this->update_ob->wallet($this->session->userdata('user_id'),$_POST['selected_wallet']);
                        $transaction['closing_wallet']=$transaction['open_wallet']-$transaction['amount'];
                        $transaction['remark']="$username topup $tx_username of amount $pin_details->pin_rate";
                        
                        if($this->db->insert('transaction',$transaction)){
                            $amnt=$transaction['amount'];
                            $this->update_ob->add_amnt($this->session->userdata('user_id'),$_POST['selected_wallet'],-$amnt);
                        }
                    }elseif($this->conn->setting('topup_type')=='pin'){
                        $pin_update_details=$this->pin->user_pins_by_type($this->session->userdata('user_id'),$pin_type);
                        $pin_id=$pin_update_details[0]->id;
                        $update_details['use_status']=1;
                        $update_details['used_in']='topup';
                        $update_details['usefor']=$tx_u_code;
                        $this->db->where('id',$pin_id);
                        $this->db->update('epins',$update_details);

                        
                        $cnt_tx_pre_pins = ($pin_update_details ? count($pin_update_details):0);

                        $pin_history['user_id']=$this->session->userdata('user_id');
                        $pin_history['debit']=1;
                        $pin_history['prev_pin']=$cnt_tx_pre_pins;
                        $pin_history['curr_pin']=$cnt_tx_pre_pins-1;
                        $pin_history['pin_type']=$pin_details->pin_type;
                        $pin_history['tx_type']='debit';
                        $name=$this->session->userdata('profile')->name;
                        $username=$this->session->userdata('profile')->username;
                        $pin_history['remark']="$name ( $username ) Topup $tx_username ";
                        $this->db->insert('pin_history',$pin_history);
                        
                        $this->update_ob->used_pin($this->session->userdata('user_id'));
                    }

                    if($this->conn->setting('level_distribution_on_topup')=='yes'){
                        $this->distribute->level_destribute($tx_u_code,$pin_details->pin_rate,15);
                    }

                    $sponsor_info=$this->profile->sponsor_info($tx_u_code,'mobile,id');
                    
                    if($sponsor_info){
                        $sponsor_mobile = $sponsor_info->mobile;
                        $tx_profile_info=$this->profile->profile_info($tx_u_code,'name');
                        $tx_name=$tx_profile_info->name;
                        $website=$this->conn->company_info('title');
                        $msg="Congratulations!! $tx_name Has activated his Position. Team $website";
                        //$this->message->sms($sponsor_mobile,$msg);
                        $this->update_ob->active_gen($sponsor_info->id);
                        $this->update_ob->active_direct($sponsor_info->id);
                    }

                    if($this->conn->plan_setting('matrix')=='1'){
                        $get_matrix_parent=$this->binary->get_matrix_parent(1);
                        $update_position['matrix_pool']=$get_matrix_parent['parent'];
                        $update_position['matrix_position']=$get_matrix_parent['position'];
                        $this->db->where('id',$tx_u_code);
                        $this->db->update('users',$update_position);
                    }
                    
                    $plan_type=$this->session->userdata('reg_plan'); 
                    if($plan_type=='single_leg'){
                         $this->update_ob->update_single_leg($tx_u_code,$active_id);
                    }
                    
                     
                    
                    $this->session->set_flashdata("success", "Package $pin_details->pin_type Activated successfully.");
                    redirect(base_url(uri_string()));
                }else{
                    $this->session->set_flashdata("error", "Something wrong.");
                }
            }
        }


       $this->show->user_panel('invest_topup');
    }

    

    public function reinvestment(){
       //  $this->show->user_panel('coming_soon');
        
            if(isset($_POST['topup_btn'])){
                $pinvalidation='';

                if($this->conn->setting('retopup_type')=='amount'){
                    $this->form_validation->set_rules('selected_wallet', 'Wallet', 'required|callback_check_wallet_useable|callback_check_wallet_balance');
                }elseif($this->conn->setting('retopup_type')=='pin'){
                    $pinvalidation="|callback_check_pin_available";
                }
                

                $this->form_validation->set_rules('tx_username', 'Username', 'required|callback_valid_username');
                $this->form_validation->set_rules('selected_pin', 'Package', "required|callback_valid_package".$pinvalidation);

                if($this->form_validation->run() != False){
                    $tx_username=$_POST['tx_username'];
                    $tx_u_code=$this->profile->id_by_username($tx_username);
                    $pin_type=$_POST['selected_pin'];
                    $pin_details=$this->pin->pin_details($pin_type);

                    $orders['u_code']=$tx_u_code;
                    $orders['order_type']='purchase';
                    $orders['amount']=$pin_details->pin_rate;
                    $orders['bv']=$pin_details->business_volumn;
                    $orders['pv']=$pin_details->pin_value;
                    $orders['status']=1;

                    if($this->db->insert('orders',$orders)){

                        $update=array(
                            'active_status' => 1,
                            'active_date' => date('Y-m-d H:i:s'),
                        );
                        $this->db->where('id',$tx_u_code);
                        $this->db->update('users',$update);

                        if($this->conn->setting('retopup_type')=='amount'){
                            $username=$this->session->userdata('profile')->username;
                            
                            $transaction['u_code']=$this->session->userdata('user_id');
                            $transaction['tx_u_code']=$tx_u_code;
                            $transaction['tx_type']="retopup";
                            $transaction['debit_credit']="debit";
                            $transaction['wallet_type']=$_POST['selected_wallet'];
                            $transaction['amount']=$pin_details->pin_rate;
                            $transaction['date']=date('Y-m-d H:i:s');
                            $transaction['status']=1;
                            $transaction['open_wallet']=$this->wallet->balance($this->session->userdata('user_id'),$_POST['selected_wallet']);
                            $transaction['closing_wallet']=$transaction['open_wallet']-$transaction['amount'];
                            $transaction['remark']="$username topup $tx_username of amount $pin_details->pin_rate";
                            $this->db->insert('transaction',$transaction);
                        }elseif($this->conn->setting('retopup_type')=='pin'){
                            $pin_update_details=$this->pin->user_pins_by_type($this->session->userdata('user_id'),$pin_type);
                            $pin_id=$pin_update_details[0]->id;
                            $update_details['use_status']=1;
                            $update_details['used_in']='retopup';
                            $update_details['usefor']=$tx_u_code;
                            $this->db->where('id',$pin_id);
                            $this->db->update('epins',$update_details);

                            $cnt_tx_pre_pins = ($pin_update_details ? count($pin_update_details):0);
                            $pin_history['user_id']=$this->session->userdata('user_id');
                            $pin_history['debit']=1;
                            $pin_history['prev_pin']=$cnt_tx_pre_pins;
                            $pin_history['curr_pin']=$cnt_tx_pre_pins-1;
                            $pin_history['pin_type']=$pin_details->pin_type;
                            $pin_history['tx_type']='debit';
                            $name=$this->session->userdata('profile')->name;
                            $username=$this->session->userdata('profile')->username;
                            $pin_history['remark']="$name ( $username ) Retopup $tx_username ";
                            $this->db->insert('pin_history',$pin_history);
                            
                            $this->update_ob->used_pin($this->session->userdata('user_id'));
                            
                        }

                        $this->session->set_flashdata("success", "Package $pin_details->pin_type Activated successfully.");
                        redirect(base_url(uri_string()));
                    }else{
                        $this->session->set_flashdata("error", "Something wrong.");
                    }
                }
            }
      $this->show->user_panel('invest_retopup');
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

     public function valid_package($str){
        $check_username=$this->conn->runQuery("id",'pin_details',"pin_type='$str' and status=1");
        if($check_username){
            return true;
        }else{
              $this->form_validation->set_message('valid_package', "Invalid Package! Please select valid package.");
               return false;
        }
    }

    public function check_pin_available($str){
        $user_pins=$this->pin->user_pins_by_type($this->session->userdata('user_id'),$str);
            if($user_pins){
                return true;
            }else{
                $this->form_validation->set_message('check_pin_available', "Insufficient pin in account .");
                return false;
            }
    }

    public function check_wallet_useable($str){
        $available_wallets=$this->conn->setting('invest_wallets');
        $useable_wallet=json_decode($available_wallets);
        if(array_key_exists($str,$useable_wallet)){
            return true;
        }else{
              $this->form_validation->set_message('check_wallet_useable', "You can not Topup from this wallet");
               return false;
        }
    }

    public function check_wallet_balance($str){
       if(isset($_POST['selected_pin']) && $_POST['selected_pin']!=''){

        $checkable=$this->pin->pin_details($_POST['selected_pin'])->pin_rate;
            $balance=$this->update_ob->wallet($this->session->userdata('user_id'),$str);        
            if($balance>=$checkable){
                return true;
            }else{
                $this->form_validation->set_message('check_wallet_balance', "Insufficient Fund in wallet.");
                return false;
            }
       }else{
            $this->form_validation->set_message('check_wallet_balance', "Please Select valid pin.");
            return false;
       }
        
    }

    public function already_topup($str){
       if($str!=''){

        $chk=$this->conn->runQuery("id",'users',"username='$str' and active_status='1'");
            if($chk){
                $this->form_validation->set_message('already_topup', "User already have active package.");
                return false;                
            }else{
                return true;
            }
       }else{
            $this->form_validation->set_message('already_topup', "Please enter username.");
            return false;
       }
        
    }
    
    public function pin_detail(){
        $type=trim($_POST['selected_pin']);
        $u_id=$this->session->userdata('user_id');
        $res='';
        $get_pin_detail=$this->conn->runQuery('*',"epins","pin_type LIKE '%$type%' and use_status='0' and u_code='$u_id'");
        //echo  $sql = $this->db->last_query();
        if($get_pin_detail){
            $res=count($get_pin_detail);
        } else{
            $res=0;
        }
        echo $res;
    }

}