<?php
class Crons extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function closing_rank(){
        $all_orders=$this->conn->runQuery('*','orders',"closing_status='0' and status='1'");
        if($all_orders){
            foreach($all_orders as $orderdetails){
                $u_code=$orderdetails->u_code;
                $this->distribute->order_distribute($u_code,$orderdetails->id);
                
            }
        }
        
        
    }
    
    public function gen_payouts(){
        echo $currenct_payout_id=$this->wallet->currenct_payout_id();
        $get_all_users=$this->conn->runQuery('DISTINCT(u_code) as u_code','transaction',"payout_id='$currenct_payout_id' and tx_type='income'");
        echo $this->db->last_query();
        if($get_all_users){
            $insert=array();
            foreach($get_all_users as $user_details){
                $u_code=$user_details->u_code;
                $get_amnt=$this->conn->runQuery('(SUM(amount)-SUM(tx_charge)) as ttl','transaction',"payout_id='$currenct_payout_id' and tx_type='income' and u_code='$u_code'")[0]->ttl;
                
                $amnt=$get_amnt!='' ? $get_amnt:0;
                $tds=$amnt*5/100;
                $arr=array();
                $arr['u_code']=$u_code;
                $arr['tx_type']='payout';
                $arr['debit_credit']='debit';
                $arr['wallet_type']='main_wallet';
                $arr['amount']=$amnt-$tds;
                $arr['tx_charge']=$tds;
                $arr['date']=date('Y-m-d H:i:s');
                $arr['status']=0;
                $arr['payout_id']=$currenct_payout_id;
               
                $insert[]=$arr;
                
            }
            
            if(!empty($insert)){    
                $this->db->insert_batch('transaction',$insert);
                echo $this->db->last_query();
            }
        }
    }
    

    public function testing(){
       $rank_ids=$this->team->downline_rank_team(5,17);
       echo '<pre>';
       print_r($rank_ids);
    }
    
    public function insert_users()
    {
        $getall_users=$this->conn->runQuery('*','users1',"1=1");
        if($getall_users){
            foreach($getall_users as $users){
               // echo '<pre>';
                //print_r($users);
                $user=array();
                $user['id']=$users->id;
                $user['u_sponsor']=$users->u_sponsor!='' ? $users->u_sponsor:null;
                $user['Parentid']=$users->parent_id!='' ? $users->parent_id:null;
                $user['position']='1';
                $user['username']=$users->username;
                $user['user_type']='user';
                $user['title']=$users->ftitle;
                $user['name']=$users->name;
                $user['email']=$users->email;
                $user['mobile']=$users->mobile;
                $user['password']=$users->password;
                $user['address']=$users->uaddress;
                $user['country']=$users->country;
                $user['city']=$users->ucity;
                $user['state']=$users->ustate;
                $user['post_code']=$users->upincode;
                $user['img']=$users->img;
                $user['added_on']=$users->added_on;
                $this->db->insert('users',$user);
                //die();
            }
        }
    }

    public function active_users()
    {
       $eligible=$this->conn->runQuery('*','eligible',"1=1");
       foreach($eligible as $eligibl){
            $user=array();
            $max=$this->conn->runQuery('max(active_id) as mx','users',"1=1")[0]->mx;
            $mxid= ($max!='' ? $max:0)+1;
            $id=$eligibl->u_code;
            $user['active_id']=$mxid;
            $user['active_status']=1;
            $user['active_date']=$eligibl->timestamp;
            $this->db->where('id',$id);
            $this->db->update('users',$user);
       }
    }
    public function rank_closing()
    {
    
        $ranplan=$this->conn->runQuery('*','plan',"1=1");
        $plan=array_column($ranplan,'r_per','id');
        $eligible=$this->conn->runQuery('*','rank1',"1=1");
        foreach($eligible as $eligibl){
            $user=array();       
            $user['u_code']=$eligibl->u_code;
            $user['rank']=$eligibl->rank;
            $user['rank_id']=$eligibl->rank_id;
            $user['rank_per']=$plan[$eligibl->rank_id];
            $user['is_complete']=1;
            $user['complete_date']=$eligibl->added_on;         
            $this->db->insert('rank',$user);
        }
    }

      public function auto_register_with_pin_active(){
        $requires=$this->conn->runQuery("*",'advanced_info',"title='Auto Registration'");
        /*echo $this->db->last_query();
        die();*/
        $value_by_lebel= array_column($requires, 'value', 'label');
        if($value_by_lebel['auto_register_enable']=="yes"){
            $register['auto_register']=$auto_reg=$value_by_lebel['auto_id'];
            $sponsor_id=$sp_id=$value_by_lebel['auto_sponsor_id'];
            $auto_ent=$value_by_lebel['auto_register_entry'];
            //die();
            $resp=$this->conn->runQuery("id",'users',"u_sponsor='$sp_id' and auto_register='$auto_reg'");
            
            if(!empty($resp)){
                $ttl_entry=count($resp);
            }else{
                $ttl_entry=0;
            }   
            if($auto_ent>$ttl_entry){
            //for($i=0;$i<$auto_ent;$i++){
                $register['u_sponsor']= $sp_id;
                $register['username'] = $username=$this->get_username();
                $register['name'] = $name=$value_by_lebel['auto_name'];
                $register['email'] =$value_by_lebel['auto_email'];
                $register['mobile'] =$value_by_lebel['auto_mobile'];
                $register['user_type'] ="user";
                $register['password'] = md5(random_string($value_by_lebel['auto_registration_pass_gen_fun'], $value_by_lebel['auto_registration_pass_gen_digit']));
                $tx_u_code=$code=$this->conn->get_insert_id('users',$register);
                $inser_wallet=array();
                    $inser_wallet['u_code']=$code;
                    if($this->db->insert('user_wallets',$inser_wallet)){
                        $this->update_ob->add_direct($sponsor_id);
                        $this->update_ob->add_gen($sponsor_id);
                        if($this->conn->setting('reg_type')=='binary'){
                            $this->update_ob->update_binary($sponsor_id);
                        }
                    }
                
                /*echo $this->db->last_query();
            die();*/
                $pin_type="Welcome Kit";
                $pin_details=$this->pin->pin_details($pin_type);
                /////////////////////active user code/////////////////////////////////////////////
                $tx_username=$username;
               // $tx_u_code =  $this->profile->id_by_username($tx_username);                
                $no_of_pins = 1;
                $pin_type = 'Welcome Kit';
                $tx_pre_pins=$this->pin->user_pins_by_type($tx_u_code,$pin_type);
                $cnt_tx_pre_pins = ($tx_pre_pins ? count($tx_pre_pins):0);

                $pin_history = array(
                    'user_id'  => $tx_u_code,
                    'tx_user'  => null,
                    'debit'  => 0,
                    'prev_pin'  => $cnt_tx_pre_pins,
                    'curr_pin'  => ($cnt_tx_pre_pins+$no_of_pins),
                    'credit'  => $no_of_pins,
                    'pin_type'  => $pin_type,
                    'tx_type'  => 'credit',
                    'remark'  => "$tx_username recieve $no_of_pins pin(s) from Admin ."                  
                    
                );

                $this->db->insert('pin_history', $pin_history);
                        
                for($n=0;$n<$no_of_pins;$n++){
                    $epin['pin']=random_string($this->conn->setting('pin_gen_fun'), $this->conn->setting('pin_gen_digit'));
                    $epin['u_code']=$tx_u_code;                        
                    $epin['status']=1; 
                    $epin['created_by']='admin';                                               
                    $epin['pin_type']=$pin_type;
                    $this->db->insert('epins',$epin);

                }
                
                
                
                $orders['u_code']=$code;
                $orders['tx_type']='purchase';
                $orders['order_amount']=$top_amt=$pin_details->pin_rate;
                $orders['order_bv']=$pin_details->business_volumn;
                $orders['pv']=$pin_details->pin_value;
                $orders['payout_status']=0;
                $orders['status']=1;
                $this->db->insert('orders',$orders);
                    $mx_id=$this->conn->runQuery('MAX(active_id) as mx','users',"active_status='1'")[0]->mx;
                    $active_id = ($mx_id ? $mx_id:0)+1;
                    $update=array(
                        'active_id' => $active_id,
                        'active_status' => 1,
                        'active_date' => date('Y-m-d H:i:s'),
                    );
                    $this->db->where('id',$tx_u_code);
                    $this->db->update('users',$update);
                    $pin_update_details=$this->pin->user_pins_by_type($tx_u_code,$pin_type);
                    $pin_id=$pin_update_details[0]->id;
                    $update_details['use_status']=1;
                    $update_details['used_in']='topup';
                    $update_details['usefor']=$tx_u_code;
                    $this->db->where('id',$pin_id);
                    $this->db->update('epins',$update_details);
                    $cnt_tx_pre_pins = ($pin_update_details ? count($pin_update_details):0);
                    $pin_history['user_id']=$tx_u_code;
                    $pin_history['debit']=1;
                    $pin_history['prev_pin']=$cnt_tx_pre_pins;
                    $pin_history['curr_pin']=$cnt_tx_pre_pins-1;
                    $pin_history['pin_type']=$pin_details->pin_type;
                    $pin_history['tx_type']='debit';
                    $pin_history['credit']=0;
                    
                    $pin_history['remark']="$name ( $username ) Topup $tx_username ";
                    $this->db->insert('pin_history',$pin_history);
                        
                    /*if($this->conn->setting('level_distribution_on_topup')=='yes'){
                        $this->distribute->level_destribute($tx_u_code,$pin_details->pin_rate,10);
                    }*/
                    
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
                         $this->distribute->gen_pool($tx_u_code,$top_amt);
                        /*$get_matrix_parent=$this->binary->get_matrix_parent(1);
                        $update_position['matrix_pool']=$get_matrix_parent['parent'];
                        $update_position['matrix_position']=$get_matrix_parent['position'];
                        $this->db->where('id',$tx_u_code);
                        $this->db->update('users',$update_position);*/
                    }
                   
                    $plan_type=$this->session->userdata('reg_plan'); 
                    if($plan_type=='single_leg'){
                         $this->update_ob->update_single_leg($tx_u_code,$active_id);
                    }
                    
            //}
                
        }
        }  
    }
     
     public function get_username(){
        $selected='no';
        $user_gen_prefix=$this->conn->setting('user_gen_prefix');
        $user_gen_digit=$this->conn->setting('user_gen_digit');
        $user_gen_fun=$this->conn->setting('user_gen_fun');
        while($selected=='no'){
            $selected='yes';
            $username=$user_gen_prefix.random_string($user_gen_fun, $user_gen_digit);
            $check_username_exists=$this->conn->runQuery('username','users',"username='$username'");
            if($check_username_exists){
                $selected='no';
            }
        }        
        return $username;
    }
    
    
    public function clear_form_submit(){
        $this->db->empty_table('form_request'); 
    }
    
   
}