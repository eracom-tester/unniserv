<?php
class Franchise extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->admin_url=$this->conn->company_info('admin_path');
        $this->limit=20;
    }

    public function index(){
        $this->show->admin_panel('index');
    }
    
    public function add(){
        if(isset($_POST['add_btn'])){
            $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_is_username_valid');   
            $this->form_validation->set_rules('name', 'Name', 'required');   
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');   
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');   
            $this->form_validation->set_rules('country', 'Counrty', 'required');   
            $this->form_validation->set_rules('state', 'State', 'required');   
            $this->form_validation->set_rules('password', 'Password', 'required');   
            $this->form_validation->set_rules('confirm_password', 'Password', 'required|matches[password]');   
            $this->form_validation->set_rules('nominee_relation', 'Nominee relation', 'required');   
            $this->form_validation->set_rules('nominee_name', 'Nominee Name', 'required');   
            $this->form_validation->set_rules('franchise_name', 'Franchise name', 'required');   
            $this->form_validation->set_rules('franchise_pan', 'Pan number', 'required');   
            $this->form_validation->set_rules('franchise_gst', 'Franchise GST', 'required');
            $this->form_validation->set_rules('address', 'Addess', 'required');
            $this->form_validation->set_rules('pin_code', 'Pin Code', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');   
            if($this->form_validation->run() != False){
                $register['username']=$_POST['username'];
                $register['name']=$_POST['name'];
                $register['email']=$_POST['email'];
                $register['mobile']=$_POST['mobile'];
                $register['country']=$_POST['country'];
                $register['state']=$_POST['state'];
                $register['city']=$_POST['city'];
                $register['password']=md5($_POST['password']);
                $register['pan_no']=$_POST['franchise_pan'];
                $register['nominee_relation']=$_POST['nominee_relation'];
                $register['nominee_name']=$_POST['nominee_name'];
                $register['franchise_name']=$_POST['franchise_name'];
                $register['franchise_gst']=$_POST['franchise_gst'];
                $register['address']=$_POST['address'];
                $register['pin_code']=$_POST['pin_code'];
                if($this->db->insert('franchise_users',$register)){
                /*$rgmsg1="Stock Point is created Successfully.".'Your Username:'.$this->input->post('username').''.'And Password is:'.$this->input->post('password');
                $this->session->set_flashdata("Congratulation!", $rgmsg1);*/
                 redirect(base_url($this->conn->company_info('admin_path').'/franchise/success?username='.$register['username'].'&pass='.$_POST['password']).'&name='.$register['name'].'&franshise='.$register['franchise_name'],"refresh");      
                }else{
                    $this->session->set_flashdata("error", "Somthing Wrong! Please try again.");
                }
                
                redirect(base_url(uri_string()));
            }
        }
       
        $this->show->admin_panel('franchise_add_user');
    }
    
    
  
    
    public function users(){
        $searchdata['from_table']='franchise_users';
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            
                 $conditions['name'] =$_REQUEST['name'];
          
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
           
                $conditions['username'] =$_REQUEST['username'];
           
        }
       
        if(isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!=''){
           
                $conditions['franchise_name'] = $_REQUEST['franchise_name'];
          
        }
        
        if(isset($_REQUEST['mobile_number']) && $_REQUEST['mobile_number']!=''){
           
                $conditions['mobile'] = $_REQUEST['mobile_number'];
          
        }
        
        if(isset($_REQUEST['state']) && $_REQUEST['state']!=''){
           
                $conditions['state'] = $_REQUEST['state'];
          
        }
        if(isset($_REQUEST['city']) && $_REQUEST['city']!=''){
           
                $conditions['city'] = $_REQUEST['city'];
          
        }
        if(isset($_REQUEST['pin_code']) && $_REQUEST['pin_code']!=''){
           
                $conditions['pin_code'] = $_REQUEST['pin_code'];
          
        }
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/franchise/users');
       /* echo $this->db->last_query();
        die();*/
        $data['search_string']='franchise_users';
        $this->show->admin_panel('franchise_users',$data);
        
    }
    
    
    
    public function edit(){
        if(isset($_REQUEST['id'])){
            $this->session->set_userdata('admin_edit_user',$_REQUEST['id']);
        }
        $edit_user=$this->session->userdata('admin_edit_user');
 

        if(isset($_POST['edit_btn'])){
            //$register['username']=$_POST['username'];
           
           $update['name']=$this->input->post('name');
            $update['email']=$this->input->post('email');
            $update['mobile']=$this->input->post('mobile');
            $update['is_block']=$this->input->post('is_block');
            $update['country']=$this->input->post('country'); 
            $update['state']=$this->input->post('state'); 
            $update['city']=$this->input->post('city'); 
           
            $update['pan_no']= $this->input->post('franchise_pan'); 
            $update['nominee_relation']=$this->input->post('nominee_relation');
            $update['nominee_name']=$this->input->post('nominee_name');
            $update['franchise_name']=$this->input->post('franchise_name'); 
            $update['franchise_gst']=$this->input->post('franchise_gst'); 
            $update['address']=$this->input->post('address');
            $update['pin_code']=$this->input->post('pin_code');
            
            
            
            $this->db->where('id',$edit_user);
            if($this->db->update('franchise_users',$update)){
                $this->session->set_flashdata("success", "Profile Updated successfully.");
                redirect(base_url(uri_string()));
            }else{                
                $this->session->set_flashdata("error", "Something Wrong.");
                redirect(base_url(uri_string()));
            }             
        }
          
         
        if(isset($_POST['set_pass_btn'])){
             $this->form_validation->set_rules('u_password', 'Password', 'required');
            
            if($this->form_validation->run() != False){
                $update=array();
                $update['password']=md5($this->input->post('u_password'));
                
                $this->db->where('id',$edit_user);
                if($this->db->update('franchise_users',$update)){                
                    $this->session->set_flashdata("success", "Password Updated successfully.");
                    redirect(base_url(uri_string()));
                }else{                
                    $this->session->set_flashdata("error", "Something Wrong.");
                    redirect(base_url(uri_string()));
                }
            }
                        
        }
        

        $data['edit_user']=$edit_user;
        $data['profile']=$this->profile->franchise_info($edit_user);
        $this->show->admin_panel('franchise_user_edit',$data);
    }
    public function change_password(){
        if(isset($_POST['set_pass_btn'])){
            $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_check_old_password');
            $this->form_validation->set_rules('u_password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[u_password]'); 
            if($this->form_validation->run() != False){
                $update['password']=md5($this->input->post('u_password'));
                $typ='controller';
                $this->db->where('type',$typ);
                if($this->db->update('admin',$update)){
                    $this->session->set_userdata('profile', $this->profile->profile_info($this->session->userdata('user_id')));
                    $this->session->set_flashdata("success", "Password successfully changed.");
                    redirect(base_url(uri_string()));
                }else{                    
                    $this->session->set_flashdata("error", "Something Wrong.");
                    redirect(base_url(uri_string()));
                }
            }                        
        }
        $this->show->admin_panel('user_admin_password');
    }
      public  function check_old_password($str){
            $pass=md5($str);
            $check=$this->conn->runQuery('*','admin',"type='controller' and password='$pass'");
           
        if($check){
            return true;
        }else{
              $this->form_validation->set_message('check_old_password', "Old password not match! Please Try again.");
               return false;
        }
    }
    public  function is_username_valid($str){
        
        $where = array(
            'username' => $str            
        ); 
        
        if($this->conn->runQuery('id','franchise_users', $where)){
            $this->form_validation->set_message('is_username_valid', "Username Already Exists! Please Try another.");
            return false;
        }else{
              
               return true;
        }
    }

    public  function is_franchise_valid($str){        
        $where = array(
            'username' => $str            
        );         
        if($this->conn->runQuery('id','franchise_users', $where)){
            return true;
        }else{
            $this->form_validation->set_message('is_franchise_valid', "Username Not Exists! Please Try another.");
            return false;
              
        }
    }

    public function sale(){ 
        $data['search_string']='admin_franchise_product_search';
        $data['limit']=25;
        $data['from_table']='products';
        $data['base_url']=$this->admin_url.'/franchise/sale';
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $this->show->admin_panel('franchise_sale',$data);  
    }
  

    
    public function purchase(){
        
        $searchdata['from_table']='franchise_orders';
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['name'],'name');
            if($spo){
                $conditions['f_code'] = $spo;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['username'],'username');
            if($spo){
                $conditions['f_code'] = $spo;
            }
        }
       
        if(isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['franchise_name'],'franchise_name');
            if($spo){
                $conditions['f_code'] = $spo;
            }
        }
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/franchise/purchase');
        $data['search_string']='admin_franchise_purchase_search';
        $this->show->admin_panel('franchise_purchase',$data);
        
    }
    public function pending_stock(){
        $searchdata['from_table']='franchise_users';
        
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            
                 $conditions['name'] =$_REQUEST['name'];
          
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
           
                $conditions['username'] =$_REQUEST['username'];
           
        }
       
        if(isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!=''){
           
                $conditions['franchise_name'] = $_REQUEST['franchise_name'];
          
        }
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/franchise/pending-stock');
        $data['search_string']='admin_franchise_pending_search';
        $this->show->admin_panel('franchise_pending_stock',$data);
        
    }
     public function view(){ 
       
        $data['from_table']='franchise_purchase';
        $data['base_url']=$this->admin_url.'/franchise/view';
        /* $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows']; */
        $this->show->admin_panel('franchise_pending_view',$data);  
    }
    


     public function order(){ 
        $data['search_string']='admin_franchise_perchase_search';
        $data['limit']=50;
        $data['from_table']='franchise_purchase';
        $data['base_url']=$this->admin_url.'/franchise/order';
        /*$res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];*/
        $this->show->admin_panel('franchise_bill',$data);  
    }
      public function user_sale(){ 
        /*$data['search_string']='franchise_product_purchase_search';
        $data['limit']=25;
        //$condition['stock_from']=$this->session->userdata('franchise_id');
        $data['from_table']='order_items';
        $data['base_url']=$this->admin_url.'/products/user-sale';
        //$data['conditions']=$condition;
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $this->show->admin_panel('user_sale',$data);*/
        
        
       $searchdata['from_table']='order_items';
        
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            
                 $conditions['name'] =$_REQUEST['name'];
          
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
           
                $conditions['username'] =$_REQUEST['username'];
           
        }
       
        if(isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!=''){
           
                $conditions['franchise_name'] = $_REQUEST['franchise_name'];
          
        }
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/franchise/user-sale');
        $data['search_string']='admin_franchise_pending_search';
        $this->show->admin_panel('user_sale',$data);     
        
    }
  
    
    
    
   public function userorder(){ 
        $this->show->admin_panel('franchise_user_order');  
    }
    
    public function repurchase_order_history(){
        $searchdata['from_table']='orders';
        $conditions['tx_type']='repurchase';
       // $conditions['tx_user_id'] =$this->session->userdata('franchise_id'); 
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
       
        /*if(isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['franchise_name'],'franchise_name');
            if($spo){
                $conditions['stock_from'] = $spo;
            }
        }*/
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/franchise/repurchase_order_history');
        $this->show->admin_panel('franchise_repurchase_order_history',$data);
    }
    
    
    /*public function stock_list(){ 
        $searchdata['from_table']='franchise_purchase';
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['name'],'name');
            if($spo){
                $conditions['f_code'] = $spo;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['username'],'username');
            if($spo){
                $conditions['f_code'] = $spo;
            }
        }
       
        if(isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['franchise_name'],'franchise_name');
            if($spo){
                $conditions['f_code'] = $spo;
            }
        }
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/franchise/stock-list');
        $this->show->admin_panel('franchise_stock_list',$data);
    }*/
    
    public function stock_list(){
        $searchdata['select']="DISTINCT(`f_code`) as u_code";
        $searchdata['from_table']='franchise_order_items';
        // $conditions['use_status'] =0;
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['name'],'name');
            if($spo){
                $conditions['f_code'] = $spo;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['username'],'username');
            if($spo){
                $conditions['f_code'] = $spo;
            }
        }
         if(isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!=''){
            $spo=$this->profile->column_like_franchise($_REQUEST['franchise_name'],'franchise_name');
            if($spo){
                $conditions['f_code'] = $spo;
            }
        }
       
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $searchdata['order_by_disable'] = 1;
        
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/franchise/stock-list');
        
        //echo $this->db->last_query();
        //die();
        $this->show->admin_panel('franchise_stock_list',$data);
    }
    
   
    public function cart(){

        if(isset($_POST['buy_btn'])){
            $this->form_validation->set_rules('tx_username', 'Username', 'required|trim|callback_is_franchise_valid'); 
            if($this->form_validation->run() != False){

                if(!empty($this->cart->contents())){
                    $tx_username=$_POST['tx_username'];
                    $fr_details=$this->conn->runQuery('*','franchise_users',"username='$tx_username'")[0];
                    $find_payout_id=$this->conn->runQuery('MAX(payout_id) as max_pay_id','transaction_franchise',"tx_type='payout'");
                    $payout_ids=$find_payout_id[0]->max_pay_id+1;
                   
                    $u_code=$fr_details->id;
                     
                    $new_invoice_no=$this->order->new_franchise_invoice_no();
                    $order_arr=array();
                    $total=$this->cart->total();
                    $order_arr['tx_type']='purchase';
                    $order_arr['f_code']=$u_code;
                    $order_arr['order_details']=json_encode($this->cart->contents());
                    $order_arr['payment_status'] = 0 ;
                    $order_arr['payout_id'] = $payout_ids;
                    
                    $order_arr['invoice_no'] = $new_invoice_no ;
                    $order_arr['order_amount'] = $total ;
                    $order_arr['order_bv'] = $this->cart->totalbv();
                    $odr_id=$this->placeOrder($order_arr,$u_code);
                    
                    $this->session->set_userdata("new_order_id", $odr_id);
                    $this->session->set_flashdata("success", " Success ! Order generated sucessfully.");
                }
                redirect(base_url(uri_string()));
            }
        }
        $this->show->admin_panel('franchise_cart');
    }
    
    
     public function login(){
        $id=$_REQUEST['user'];
        $this->session->set_userdata("user_login", true);                            
        $this->session->set_userdata("user_id", $id);                            
        //$this->session->set_userdata("profile", $this->profile->profile_info($id));
        
        $user_id=$id;
         $res=$this->conn->runQuery('*','franchise_users',"id='$user_id'");
          if($res){
             
               $this->session->set_userdata("franchise_login", true);                            
               $this->session->set_userdata("franchise_id", $res[0]->id);                            
                        
               $this->session->set_flashdata("success", "You are logged in");

               if(1!=1){
                   redirect($this->session->userdata('login_redirect'), "refresh");
               }else{
                   redirect(base_url($this->conn->company_info('franchise_path')."/dashboard"), "refresh");
               }
           
          }
        //redirect(base_url($this->conn->company_info('franchise_path')."/dashboard"), "refresh");
    }
    
    
   public function add_to_cart(){
        $err['error']=false;
        $pro_id=$_POST['productId'];
        
    /*    $u_code=$this->session->userdata("admin_id");
        $csrf_test_name=json_encode($_POST);

        $check_ex=$this->conn->runQuery('id','form_request',"request='$csrf_test_name' and u_code='$u_code'");
        if($check_ex){
            $err['error']=true;
            $err['message'] = "You can not submit same request within 5 minutes.";
            
            //$this->session->set_flashdata("error", "You can not submit same request within 5 minutes.");
        }else{
            $request['u_code']=$u_code;
            $request['request']=$csrf_test_name;
            $this->db->insert('form_request',$request);*/
            $product_details=$this->product->product_detail($pro_id);
    
            $required_fielsa=$this->conn->runQuery('*','product_variants',"post_id='$pro_id'");
            if(!$required_fielsa){
                $product_stock=$this->product->product_stock($pro_id);
                if($product_stock>=1){
                    $data = array(
                        "id"         => $_POST['productId'],
                        "name"       => $product_details->name,
                        "qty"        => 1,
                        "price"      =>   $product_details->dp,           
                        "mrp"      =>   $product_details->mrp,           
                        "bv"      =>   $product_details->product_bv,
                        "sku"      =>   'product_qty',
            		);
                    $this->cart->insert($data); 
                }else{
                    $err['error']=true;
                    $err['message'] = "Out of Stock";
                }
            }else{
                
                $sku='';
                
               
                foreach($required_fielsa as $required_field){
                   
                    if(!isset($_REQUEST[$required_field->slug])){
                        $err['error']=true;
                        $err['message'][$required_field->slug] = "Required";
                         
                        //$this->form_validation->set_message($required_field->slug, "Field required");
                    }else{
                        $sku=$_REQUEST[$required_field->slug].'-';
                    }
                }
                $sku=rtrim($sku,"-");
                //print_r($err);
                 
                $product_stock=$this->product->product_stock($pro_id,$sku);
                if($product_stock>=1 && $err['error']===false){
                    $data = array(
                        "id"         => $_POST['productId'],
                        "name"       => $product_details->name,
                        "qty"        => 1,
                        "price"      =>   $product_details->dp,   
                        "mrp"      =>   $product_details->mrp,
                        "bv"      =>   $product_details->product_bv,
                        "sku"      =>   $sku,
                         
            		);
                    $this->cart->insert($data); 
                }
            }
            
       // }            
                    
        
        
        print_r(json_encode($err));
		//$this->session->set_flashdata("alert_success", "Product successfully added to cart.");
    }
	
	public function update_all(){		
		//print_r($_POST);
		$data=$this->cart->update($_POST);
		$this->session->set_flashdata('success', 'You have modified your shopping cart!');
		redirect(base_url($this->admin_url.'/franchise/cart'));
	}
	
	public function update(){		
		 $data = array(
			'rowid' =>  $_POST['rowid'],
			'qty'   => $_POST['qty']
		 );
		 $this->session->set_flashdata('success', 'You have modified your shopping cart!');
		 $this->cart->update($data);
	 }
	 
	 public function remove(){
		 $data = array(
			'rowid' =>  $_POST['rowid'],
			'qty'   => 0
		 );
		 $this->session->set_flashdata('success', 'You have modified your shopping cart!');
		 $this->cart->update($data);
	 } 
	 
	 public function clear(){
		 
		 $this->cart->destroy();
		 redirect(base_url($this->admin_url.'/franchise/cart'));
	 } 
	 
	 public function order_success(){ 
        $data['search_string']='franchise_product_search';
        $data['limit']=25;
        $data['from_table']='user_order';
        $data['base_url']=$this->admin_url.'/products/order-success';
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        if(isset($_POST['buy_btn'])){
            $this->form_validation->set_rules('tx_username', 'Username', 'required|trim|callback_is_user_valid'); 
            if($this->form_validation->run() != False){
                if(!empty($this->cart->contents())){
                   $franchise_id=$this->session->userdata('franchise_id');
                    $total=$this->cart->total();
                    $ttl_bv=$_POST['ttl_bv'];
                    $tx_username=$_POST['tx_username'];
                    $get_franchise_details=$this->conn->runQuery('*','users',"username='$tx_username'");
                     $f_code=$get_franchise_details[0]->id;
                    //die();
                    $get_invoice_no=$this->conn->runQuery('MAX(invoice_no) as invoice','user_order',"1=1");
                    $invoice_no=($get_invoice_no ? $get_invoice_no[0]->invoice+1:1);
                    $franchise_order=array();
                    
                    $franchise_order['total_bv']=$ttl_bv;
                    $franchise_order['total_amt']=$total;
                    $franchise_order['u_code']=$f_code;
                    $franchise_order['stock_from']=$franchise_id;
                    $franchise_order['invoice_no']=$invoice_no;
                    $get_insert_id=$this->conn->get_insert_id('user_order',$franchise_order);
                    /*echo $this->db->last_query();
                    die();*/
                    if($get_insert_id){
                        foreach ($this->cart->contents() as $items){
                            $product_id=$items['id'];
                            $product_details=$this->product->product_detail($product_id);
                            $franchise_purchase=array();
                            $franchise_purchase['order_id'] = $get_insert_id;
                            $franchise_purchase['u_code'] = $f_code;
                            $franchise_purchase['stock_from	'] = $franchise_id;
                            $franchise_purchase['product_name'] = $product_details->name;
                            $franchise_purchase['qty'] = $items['qty'];
                            $franchise_purchase['unit_amt'] =$items['price'];
                            $franchise_purchase['total_amt'] =$items['subtotal'];
                            $franchise_purchase['unit_bv'] = $product_details->product_bv;
                            $franchise_purchase['total_bv'] = $items['qty']*$product_details->product_bv;
                            $franchise_purchase['product_id'] = $product_id;
                            $this->db->insert('user_repurchase',$franchise_purchase);
                        }
                        $this->cart->destroy();
                        $this->session->set_flashdata("success", " Success ! Order generated sucessfully.");
                    }else{
                        $this->session->set_flashdata("error", "Somthing Wrong! Please try again.");
                    }
                }
                redirect(base_url(uri_string()));
            }
            
            
        }
        $this->show->franchise_panel('franchise_success',$data);  
    }
    
     function success(){
       $this->show->admin_panel('franchise_success');
   }
   
   
   
   function placeOrder($ordData,$u_code){       
       
        $insertOrder = $this->conn->get_insert_id('franchise_orders',$ordData);
        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['f_code']     = $u_code;
                $ordItemData[$i]['order_id']     = $insertOrder;
                $ordItemData[$i]['product_id']     = $item['id'];
                $ordItemData[$i]['name']     = $item['name'];
                $ordItemData[$i]['quantity']     = $item['qty'];
                $ordItemData[$i]['product_bv']     = $item['bv'];
                $ordItemData[$i]['sub_total']     = $item["subtotal"];
                $ordItemData[$i]['options']     =  array_key_exists('options',$item) ? json_encode($item["options"]):null;
                $i++;
            }
            
            if(!empty($ordItemData)){
                // Insert order items
                $insertOrderItems = $this->db->insert_batch('franchise_order_items',$ordItemData);
                
                if($insertOrderItems){
                    // Remove items from the cart
                    $this->cart->destroy();
                    
                    // Return order ID
                    return $insertOrder;
                }
            }
        }
        return false;
    }
     
     public function bill(){
        $this->show->admin_panel('user_bill');
    }
    
    public function pending_payouts(){
      $conditions=array();
        if(isset($_REQUEST['income'])){
            $this->session->set_userdata('show_income',$_REQUEST['income']);
        }

        if(isset($_POST['reset'])){
            $this->session->unset_userdata($data['search_string']);
        }
        
       $searchdata['from_table']='transaction_franchise';
       $conditions['tx_type']='payout';
       $conditions['status']=0;
       
           
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
           $spo=$this->profile->column_like_franchise($_REQUEST['name'],'name');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
          
          
            $spo=$this->profile->column_like_franchise($_REQUEST['username'],'username');     
            
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
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/franchise/pending_payouts'); 
         
            
        $this->show->admin_panel('franchise_payout_pending',$data); 

    }
    
     public function payout_view(){
        if(isset($_REQUEST['id'])){
            $this->session->set_userdata('admin_payout_id',$_REQUEST['id']);
        }
        $wd_id=$this->session->userdata('admin_payout_id');

        if(isset($_POST['approve_btn'])){
            $this->approve($wd_id);
            $this->session->set_flashdata("success", "Payout Approved.");
            redirect(base_url($this->conn->company_info('admin_path').'/franchise/pending_payouts'));
        }

       
        $data['wd_id']=$wd_id;
        $this->show->admin_panel('franchise_payout_view',$data);
        
    }
     public function payouts(){
      $conditions=array();
        if(isset($_REQUEST['income'])){
            $this->session->set_userdata('show_income',$_REQUEST['income']);
        }

        if(isset($_POST['reset'])){
            $this->session->unset_userdata($data['search_string']);
        }
        
       $searchdata['from_table']='transaction_franchise';
       $conditions['tx_type']='payout';
       $conditions['status']=1;
           
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
           $spo=$this->profile->column_like_franchise($_REQUEST['name'],'name');     
            
            if($spo){
                $conditions['u_code'] = $spo;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
          
          
            $spo=$this->profile->column_like_franchise($_REQUEST['username'],'username');     
            
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
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/franchise/payouts'); 
         
            
        $this->show->admin_panel('franchise_payout',$data); 

    }

     public function approve($wd_id){
        $chk_exists=$this->conn->runQuery('id','transaction_franchise',"status=0 and id='$wd_id'");
        if($chk_exists){
            $set['status']=1;
            $set['reason']=$_POST['reason'];
            $this->db->where('id',$wd_id);
            $this->db->update('transaction_franchise',$set);
        }
    }
}