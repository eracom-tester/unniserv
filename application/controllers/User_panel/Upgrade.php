<?php
class Upgrade extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function set_eligible(){         
            $get_all_eligible=$this->conn->runQuery('*','eligible',"1='1' order by timestamp asc");
            if($get_all_eligible){
                $ac_id=0;
                foreach($get_all_eligible as $user_details){
                     
                    $u_code=$user_details->u_code;
                    $check_exists=$this->conn->runQuery('id','users',"id='$u_code' and active_id IS NULL");
                    if($check_exists){
                        $ac_id++;
                        $update=array();
                        $update['active_date']=$user_details->timestamp;
                        $update['active_status']=1;
                        $update['active_id']=$ac_id;
                        $this->db->where('id',$u_code);
                        $this->db->update('users',$update);
                        
                    }
                }
            }       
    }
    
    public function level_income(){
        $get_all_eligible=$this->conn->runQuery('*','income',"source = 'level'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $insert=array();
                    $insert['tx_u_code']=$user_details->ben_from;
                    $insert['u_code']=$user_details->u_code;
                    $insert['tx_type']='income';
                    $insert['debit_credit']='credit';
                    $insert['source']='level';
                    $insert['wallet_type']='main_wallet';
                    $insert['amount']=$user_details->amount;
                    $insert['date']=$user_details->date;
                    $insert['status']=$user_details->status;
                    $insert['distribute_per']=$user_details->VPP;
                    $insert['tx_record']=$user_details->level;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('transaction',$incomes);
                }
            }
    }
    public function repurchase_income(){
        $get_all_eligible=$this->conn->runQuery('*','income',"source = 'repurchase'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $insert=array();
                    $insert['tx_u_code']=$user_details->ben_from;
                    $insert['u_code']=$user_details->u_code;
                    $insert['tx_type']='income';
                    $insert['debit_credit']='credit';
                    $insert['source']='repurchase';
                    $insert['wallet_type']='main_wallet';
                    $insert['amount']=$user_details->amount;
                    $insert['date']=$user_details->date;
                    $insert['status']=$user_details->status;
                    $insert['distribute_per']=$user_details->VPP;
                    $insert['tx_record']=$user_details->level;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('transaction',$incomes);
                }
            }
    }
    public function royality_income(){
        $get_all_eligible=$this->conn->runQuery('*','income',"source = 'royality'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $insert=array();
                    $insert['tx_u_code']=$user_details->ben_from;
                    $insert['u_code']=$user_details->u_code;
                    $insert['tx_type']='income';
                    $insert['debit_credit']='credit';
                    $insert['source']='royality';
                    $insert['wallet_type']='main_wallet';
                    $insert['amount']=$user_details->amount;
                    $insert['date']=$user_details->date;
                    $insert['status']=$user_details->status;
                    $insert['distribute_per']=$user_details->VPP;
                    $insert['user_prsnt']=$user_details->package;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('transaction',$incomes);
                }
            }
    }
    
    public function paid_earning(){
        $get_all_eligible=$this->conn->runQuery('*','ledger',"txs_type = 'paid_earning'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $insert=array();
                    $insert['u_code']=$user_details->u_code;
                    $insert['tx_type']='paid_earning';
                    $insert['debit_credit']='debit';
                    $insert['wallet_type']='main_wallet';
                    $insert['amount']=$user_details->amount;
                    $insert['date']=$user_details->timestamp;
                    $insert['status']=$user_details->wd_status;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('transaction',$incomes);
                }
            }
    }
    
    public function paid_earning_franchise(){
        $get_all_eligible=$this->conn->runQuery('*','ledger_franchise',"txs_type = 'payout'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $insert=array();
                    $f_code=$user_details->u_code;
                    $franchise_details=$this->conn->runQuery('*','franchise_users',"username='$f_code'");
                    $insert['u_code']=$franchise_details ? $franchise_details[0]->id:null;
                    $insert['tx_type']='payout';
                    $insert['debit_credit']='debit';
                    $insert['wallet_type']='main_wallet';
                    $insert['amount']=$user_details->amount;
                    $insert['date']=$user_details->timestamp;
                    $insert['status']=$user_details->status;
                    $insert['payout_id']=$user_details->payout_id;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('transaction_franchise',$incomes);
                }
            }
    }
    public function franchise_repurchase_income(){
        $get_all_eligible=$this->conn->runQuery('*','income_franchise',"1=1");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $insert=array();
                    //$insert['tx_u_code']=$user_details->ben_from;
                     $f_code=$user_details->u_code;
                    $franchise_details=$this->conn->runQuery('*','franchise_users',"username='$f_code'");
                    $insert['u_code']=$franchise_details ? $franchise_details[0]->id:null;
                    $insert['tx_type']='income';
                    $insert['debit_credit']='credit';
                    $insert['source']='repurchase';
                    $insert['wallet_type']='main_wallet';
                    $insert['amount']=$user_details->amount;
                    $insert['date']=$user_details->date;
                    $insert['status']=1;
                    $insert['distribute_per']=$user_details->coin_id;
                    $insert['payout_id']=$user_details->payout_id;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('transaction_franchise',$incomes);
                }
            }
    }
    
    
    
    public function franchise_users(){
        $get_all_eligible=$this->conn->runQuery('*','franschise_users',"1='1'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $insert=array();
                    $insert['id']=$user_details->u_code;
                    $insert['u_sponsor']=$user_details->u_sponsor;
                    $insert['username']=$user_details->username;
                    $insert['name']=$user_details->u_f_name;
                    $insert['type']=$user_details->u_type;
                    $insert['nominee_name']=$user_details->relation_name;
                    $insert['nominee_relation']=$user_details->relation;
                    $insert['franchise_name']=$user_details->franschise_name;
                    $insert['email']=$user_details->u_email;
                    $insert['mobile']=$user_details->u_mobile;
                    $insert['pan_no']=$user_details->pan_number;
                    $insert['password']=$user_details->u_confirm_password;
                    $insert['franchise_gst']=$user_details->gst_number;
                    $insert['address']=$user_details->u_address;
                    $insert['city']=$user_details->u_city;
                    $insert['state']=$user_details->u_state;
                    $insert['added_on']=$user_details->u_join_date;
                     
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('franchise_users',$incomes);
                }
            }
    }
    public function repurchase_orders(){
        
        $get_all_eligible=$this->conn->runQuery('*','repurchase_detail',"1='1'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $us=$user_details->shoppee_id;
                    $franchise_details=$this->conn->runQuery('*','franchise_users',"username='$us'");
                    
                    $insert=array();
                    $insert['id']=$user_details->Id;
                    $insert['u_code']=$user_details->UserId;
                    $insert['tx_type']='repurchase';
                    $insert['tx_user_id']=$franchise_details ? $franchise_details[0]->id:null;
                    $insert['order_amount']=$user_details->total_cash_amount;
                    $insert['order_bv']=$user_details->total_business_volume;
                    $insert['status']=$user_details->Status;
                    $insert['added_on']=$user_details->Date;
                    $insert['invoice_no']=$user_details->InvoiceNo2;
                    $insert['payout_status']=$user_details->closing_status;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('orders',$incomes);
                }
            }
    }
    public function investment_orders(){
        
        $get_all_eligible=$this->conn->runQuery('*','investment',"1='1'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $us=$user_details->shoppee_id;
                     
                    $insert=array();
                    $insert['u_code']=$user_details->u_code;
                    $insert['tx_type']='investment';
                    //$insert['tx_user_id']=$franchise_details ? $franchise_details[0]->id:null;
                    $insert['order_amount']=$user_details->amount;
                    $insert['order_bv']=$user_details->invest_amount;
                    $insert['status']=$user_details->status;
                    $insert['added_on']=$user_details->date;
                    
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('orders',$incomes);
                }
            }
    }
    public function repurchase_orders_items(){
        
        $get_all_eligible=$this->conn->runQuery('*','repurchase',"1='1'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    
                    
                    
                    $us=$user_details->shoppee_id;
                    $franchise_details=$this->conn->runQuery('*','franchise_users',"username='$us'");
                    
                    $insert=array();
                    $insert['u_code']=$user_details->userid;
                    $insert['franchise_id']=$franchise_details ? $franchise_details[0]->id:null;
                    $insert['order_id']= $user_details->ReId;
                    $insert['name']= $user_details->Product;
                    $insert['product_id']= $user_details->Code;
                    $insert['quantity']= $user_details->Qty;
                    $insert['product_bv']= $user_details->business_volume;
                    $insert['sub_total']= $user_details->Total;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('order_items',$incomes);
                }
            }
    }
    
    public function franchise_repurchase_orders(){
        
        $get_all_eligible=$this->conn->runQuery('*','shopee_repurchase_detail',"1='1'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    $us=$user_details->UserId;
                    $franchise_details=$this->conn->runQuery('*','franchise_users',"username='$us'");
                    
                    $insert=array();
                    $insert['id']=$user_details->Id;
                    $insert['f_code']=$franchise_details ? $franchise_details[0]->id:null;
                     
                    
                    $insert['order_amount']=$user_details->total_cash_amount;
                    $insert['order_bv']=$user_details->total_business_volume;
                    $insert['status']=$user_details->Status;
                    $insert['added_on']=$user_details->Date;
                    $insert['invoice_no']=$user_details->InvoiceNo2;
                    $insert['payout_id']=$user_details->payout_id;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('franchise_orders',$incomes);
                }
            }
    }
    
    public function franchise_orders_items(){
        
        $get_all_eligible=$this->conn->runQuery('*','shoppee_repurchase',"1='1'");
            if($get_all_eligible){
                $incomes=array();
                foreach($get_all_eligible as $user_details){
                    
                    
                    
                    $us=$user_details->userid;
                    $franchise_details=$this->conn->runQuery('*','franchise_users',"username='$us'");
                    
                    $insert=array();
                     
                    $insert['f_code']=$franchise_details ? $franchise_details[0]->id:null;
                    $insert['order_id']= $user_details->ReId;
                    $insert['name']= $user_details->Product;
                    $insert['product_id']= $user_details->Code;
                    $insert['quantity']= $user_details->Qty;
                    $insert['product_bv']= $user_details->business_volume;
                    $insert['sub_total']= $user_details->Total;
                    $incomes[]=$insert;
                }
                
                if(!empty($incomes)){    
                    $this->db->insert_batch('franchise_order_items',$incomes);
                }
            }
    }
    
      public function kyc_aadhar(){
        $get_adhar_arr=$this->conn->runQuery('*','user_kyc',"document_type='aadhar'");
        if($get_adhar_arr){
            foreach($get_adhar_arr as $ad_details){
                $upload=array();
                $upload['u_code']=$u_id=$ad_details->u_id;
                $upload['attached_doc']=$ad_details->document;
                $upload['adhaar_no']=$ad_details->aadhaar_number;
                $upload['adhaar_name']=$ad_details->name;
                $upload['adhaar_address']=$ad_details->aadhaar_address1.' '.$ad_details->aadhaar_city.' '.$ad_details->aadhaar_state.' '.$ad_details->aadhaar_pincode;
                $upload['adhaar_image']='https://3doshacare.com/new/images/kyc/'.$ad_details->front_image;
                $upload['adhaar_back_image']='https://3doshacare.com/new/images/kyc/'.$ad_details->back_image;
                $upload['adhaar_kyc_status']=$ad_details->status;
                $upload['adhaar_remark']=$ad_details->reject_reason;
                $upload['adhaar_kyc_date']=$ad_details->added_on;
                $check_exists=$this->conn->runQuery('*','user_accounts',"u_code='$u_id'");
                if(!$check_exists){
                    $this->db->insert('user_accounts',$upload);
                }/*else{
                    $this->db->where('u_code',$u_id);
                    $this->db->update('user_accounts',$upload);
                }*/
                
            }
        }
        
    }
    public function kyc_pan(){
        $get_adhar_arr=$this->conn->runQuery('*','user_kyc',"document_type='pan'");
        if($get_adhar_arr){
            foreach($get_adhar_arr as $ad_details){
                $upload=array();
                $upload['u_code']=$u_id=$ad_details->u_id;
                //$upload['attached_doc']=$ad_details->document;
                $upload['pan_no']=$ad_details->pan_number;
                $upload['pan_name']=$ad_details->pan_name;
                
                $upload['pan_image']='https://3doshacare.com/new/images/kyc/'.$ad_details->front_image;
              
                $upload['pan_kyc_status']=$ad_details->status;
                $upload['pan_remark']=$ad_details->reject_reason;
                $upload['pan_kyc_date']=$ad_details->added_on;
                $check_exists=$this->conn->runQuery('*','user_accounts',"u_code='$u_id'");
                if(!$check_exists){
                    $this->db->insert('user_accounts',$upload);
                }else{
                    $this->db->where('u_code',$u_id);
                    $this->db->update('user_accounts',$upload);
                }
                
            }
        }
        
    }
    public function kyc_bank(){
        $get_adhar_arr=$this->conn->runQuery('*','user_kyc',"document_type='bank'");
        if($get_adhar_arr){
            foreach($get_adhar_arr as $ad_details){
                $upload=array();
                $upload['u_code']=$u_id=$ad_details->u_id;
                //$upload['attached_doc']=$ad_details->document;
                $upload['bank_name']=$ad_details->bank_name;
                $upload['ifsc_code']=$ad_details->bank_ifsc;
                $upload['bank_branch']=$ad_details->bank_branch_name;
                $upload['account_holder_name']=$ad_details->bank_account_name;
                $upload['account_no']=$ad_details->bank_account_number;
                 
                
                $upload['bank_img']='https://3doshacare.com/new/images/kyc/'.$ad_details->front_image;
              
                $upload['bank_kyc_status']=$ad_details->status;
                $upload['bank_remark']=$ad_details->reject_reason;
                $upload['bank_kyc_date']=$ad_details->added_on;
                $check_exists=$this->conn->runQuery('*','user_accounts',"u_code='$u_id'");
                if(!$check_exists){
                    $this->db->insert('user_accounts',$upload);
                }else{
                    $this->db->where('u_code',$u_id);
                    $this->db->update('user_accounts',$upload);
                }
                
            }
        }
        
    }
    
    public function products(){
        $get_adhar_arr=$this->conn->runQuery('*','products',"1=1");
        if($get_adhar_arr){
            foreach($get_adhar_arr as $ad_details){
                $upload=array();
                $upload['p_code']=$u_id=$ad_details->id;
                $upload['product_type']='product';
                //$upload['attached_doc']=$ad_details->document;
                $upload['name']=$ad_details->product_name;
                $upload['imgs']='https://3doshacare.com/new/images/kyc/'.$ad_details->product_image;
                $upload['mrp']=$ad_details->product_price;
                $upload['dp']=$ad_details->product_price;
                $upload['product_bv']=$ad_details->business_volumn;
                $upload['other_dese']=$ad_details->description;
                $upload['qty']=$ad_details->in_stock;
                
                $check_exists=$this->conn->runQuery('*','products_new',"p_code='$u_id'");
                if(!$check_exists){
                    $this->db->insert('products_new',$upload);
                }else{
                    $this->db->where('p_code',$u_id);
                    $this->db->update('products_new',$upload);
                }
                
            }
        }
        
    }
    
}