<?php
class Products extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->panel_url=$this->conn->company_info('franchise_path');
        $this->limit=10;
    }

    public function index(){
        $data['search_string']='franchise_product_search';
        $data['limit']=25;
        $data['from_table']='products';
        $data['base_url']=$this->panel_url.'/products';
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $this->show->franchise_panel('products',$data);  
    }
    
    public function add_to_cart(){
        $err['error']=false;
        $pro_id=$_POST['productId'];
        $franchise_id=$this->session->userdata('franchise_id');
        
        $add_qty=1;
       
        $cart_contant=$this->cart->contents();
        
        $cart_qtys=array();
        if(!empty($cart_contant)){
            $cart_qtys=array_column($cart_contant,'qty','id');
        }
       
        
        $ttl_qty = !empty($cart_qtys) && array_key_exists($pro_id,$cart_qtys) ? $cart_qtys[$pro_id]:0;
        $qty_after_add=$ttl_qty+$add_qty;
       
            $product_details=$this->product->product_detail($pro_id);
           
            $required_fielsa=$this->conn->runQuery('*','product_variants',"post_id='$pro_id'");
            
            if(!$required_fielsa){
                $product_stock=$this->product->franchise_stock($franchise_id,$pro_id);
                
                if($product_stock>=$qty_after_add){
                    
                    $data = array(
                        "id"         => $_POST['productId'],
                        "name"       => $product_details->name,
                        "qty"        => $add_qty,
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
                 
                $product_stock=$this->product->franchise_stock($franchise_id,$pro_id,$sku);
                if($product_stock>=$qty_after_add && $err['error']===false){
                    $data = array(
                        "id"         => $_POST['productId'],
                        "name"       => $product_details->name,
                        "qty"        => $add_qty,
                        "price"      =>   $product_details->dp,           
                        "mrp"      =>   $product_details->mrp,           
                        "bv"      =>   $product_details->product_bv,
                        "sku"      =>   $sku,
                         
            		);
                    $this->cart->insert($data); 
                }
            }
      //  }
        print_r(json_encode($err));
		//$this->session->set_flashdata("alert_success", "Product successfully added to cart.");
    }
    
    
    
	public function sale(){ 
        $data['search_string']='franchise_product_search';
        $data['limit']=25;
        $data['from_table']='products';
        $data['base_url']=$this->panel_url.'/products/sale';
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $this->show->franchise_panel('products',$data);  
    }
    
     public function purchase(){ 
        $searchdata['from_table']='orders';
        $conditions['tx_user_id'] =$this->session->userdata('franchise_id'); 
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
        $data = $this->paging->search_response($searchdata,$this->limit,$this->panel_url.'/products/purchase');
        $this->show->franchise_panel('user_purchase',$data);
    }
    
    
    
     public function user_sale(){ 
        $data['search_string']='franchise_product_purchase_search';
        $data['limit']=25;
        //$condition['stock_from']=$this->session->userdata('franchise_id');
        $data['from_table']='order_items';
        $data['base_url']=$this->panel_url.'/products/user-sale';
        //$data['conditions']=$condition;
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $this->show->franchise_panel('user_sale',$data);  
    }
    /* public function stock_history(){ 
        $data['search_string']='stock_history_search';
        $data['limit']=25;
        $data['from_table']='franchise_purchase';
        $data['base_url']=$this->panel_url.'/products/stock-history';
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $this->show->franchise_panel('franchise_stock_history',$data);  
    }*/
    
    
    public function stock_history(){ 
        $searchdata['from_table']='franchise_orders';
        $conditions['f_code'] =$this->session->userdata('franchise_id'); 
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
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->panel_url.'/products/stock_history');
        $this->show->franchise_panel('franchise_stock_history',$data);
    }
    
   
		/*public function update_all(){
	    $table_data=$this->cart->contents();
	    $rowid=$_POST['rowid'];
	    $qty=$_POST['qty'];
	    
	    $product_id=$table_data[$rowid]['id'];
	    $product_name=$table_data[$rowid]['name'];
	    $franchise_id=$this->session->userdata('franchise_id');
	    
	    $product_qty=$this->conn->runQuery('SUM(qty) as qty','franchise_purchase',"product_id='$product_id' and f_code='$franchise_id'");
        $total_purchase=($product_qty[0]->qty!='' ? $product_qty[0]->qty:0);
	    
	    $product_sale_qty=$this->conn->runQuery('SUM(qty) as qty','user_repurchase',"product_id='$product_id' and stock_from='$franchise_id'");
                
        $user_purchase=($product_sale_qty[0]->qty!='' ? $product_sale_qty[0]->qty:0);
        $left_sale=$total_purchase-$user_purchase;
	    if($left_sale>=$qty){
	        $data = array(
    			'rowid' =>  $rowid,
    			'qty'   => $qty
		    );
		    $this->session->set_flashdata('success', 'You have modified your shopping cart!');
		    $this->cart->update($data);
	    }else{
	        $this->session->set_flashdata('error', "You have $left_sale $product_name in stock!");
		    
	    }
	    
	 }*/
    
    public function update_all(){		
		//print_r($_POST);
	$data=$this->cart->update($_POST);
		$this->session->set_flashdata('success', 'You have modified your shopping cart!');
		redirect($this->panel_url.'/products/cart');
	}
	
	 
	  public  function is_user_valid($str){        
        $where = array(
            'username' => $str            
        );         
        if($this->conn->runQuery('id','users', $where)){
            return true;
        }else{
            $this->form_validation->set_message('is_user_valid', "Username Not Exists! Please Try another.");
            return false;
              
        }
    }
    
	 public  function is_user_order_valid($str){ 
	     $ttl_bv=$_POST['ttl_bv'];
	     $username=$str;
	     
        $where = array(
            'username' => $str            
        );
                    
        if($this->conn->runQuery('id','users', $where)){
            $user_det=$this->conn->runQuery('id','users', $where);
            $u_idss=$user_det[0]->id;
            $find_order_=$this->conn->runQuery('*','user_order',"u_code='$u_idss'");
                    if($find_order_){
                        return true;
                    }else{
                        if($ttl_bv>=500){
                           return true; 
                        }else{
                            $this->form_validation->set_message('is_user_order_valid', "<span style='color:red'>First order must be minimum 500 bv.</span>");
                            return false; 
                        }
                       
                    }
            
            
           
        }else{
            $this->form_validation->set_message('is_user_order_valid', "<span style='color:red'>Username Not Exists! Please Try another.</span>");
            return false;
              
        }
    }
	
/*	public function update(){		
		 $data = array(
			'rowid' =>  $_POST['rowid'],
			'qty'   => $_POST['qty']
		 );
		 $this->session->set_flashdata('success', 'You have modified your shopping cart!');
		 $this->cart->update($data);
	 }*/
	public function update(){
	    $table_data=$this->cart->contents();
	    $rowid=$_POST['rowid'];
	    $qty=$_POST['qty'];
	    
	    $product_id=$table_data[$rowid]['id'];
	    $product_name=$table_data[$rowid]['name'];
	    $franchise_id=$this->session->userdata('franchise_id');
	    
	    $product_qty=$this->conn->runQuery('SUM(quantity) as qty','franchise_order_items',"product_id='$product_id' and f_code='$franchise_id'");
        $total_purchase=($product_qty ? $product_qty[0]->qty:0);
              
        $product_sale_qty=$this->conn->runQuery('SUM(quantity) as qty','order_items',"product_id='$product_id' and franchise_id='$franchise_id'");
        
                
        $user_purchase=($product_sale_qty[0]->qty!='' ? $product_sale_qty[0]->qty:0);
        $left_sale=$total_purchase-$user_purchase;
	    if($left_sale>=$qty){
	        $data = array(
    			'rowid' =>  $rowid,
    			'qty'   => $qty
		    );
		    $this->session->set_flashdata('success', 'You have modified your shopping cart!');
		    $this->cart->update($data);
	    }else{
	        $this->session->set_flashdata('error', "You have $left_sale $product_name in stock!");
		    
	    }
	    
	 }
	 
	 public function remove(){
		 $data = array(
			'rowid' =>  $_POST['rowid'],
			'qty'   => 0
		 );
		 $this->session->set_flashdata('success', 'You have modified your shopping cart!');
		 $this->cart->update($data);
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
	public function order(){ 
       
        $this->show->franchise_panel('franchise_order');  
    } 
    public function cart(){
        $data['from_table']='orders';
        $data['search_string']='franchise_cart';
        $data['base_url']=$this->panel_url.'/franchise/cart';
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        if(isset($_POST['buy_btn'])){
            
            $this->form_validation->set_rules('tx_username', 'Username', 'required|trim|callback_is_user_valid'); 
            if($this->form_validation->run() != False){

                if(!empty($this->cart->contents())){
                    //$carts=$this->cart->contents();
                   
                    $total=$this->cart->total();
                    $ttl_bv=$_POST['ttl_bv'];
                    $mrp=$_POST['mrp'];
                    $tx_username=$_POST['tx_username'];
                    $get_franchise_details=$this->conn->runQuery('*','users',"username='$tx_username'");
                    $u_code=$get_franchise_details[0]->id;
                    $u_name=$get_franchise_details[0]->name;
                    $u_mobile=$get_franchise_details[0]->mobile;
                    $active_status=$get_franchise_details[0]->active_status;
                    
                    
                    $new_invoice_no=$this->order->new_franchise_invoice_no();
                    $new_invoice_no=$this->order->new_franchise_invoice_no();
                    $order_arr=array();
                    $total=$this->cart->total();
                    $order_arr['tx_type']='repurchase';
                    $order_arr['u_code']=$u_code;
                    $order_arr['order_details']=json_encode($this->cart->contents());
                    $order_arr['payment_status'] = 1 ;
                    $order_arr['invoice_no'] = $new_invoice_no ;
                    $order_arr['order_amount'] = $total ;
                    $order_arr['tx_user_id']=$this->session->userdata('franchise_id');
                    $order_arr['order_bv'] = $this->cart->totalbv();
                    $order_arr['payout_id'] = $this->wallet->currenct_payout_id();
                    $order_arr['status'] = 1;
                    $odr_id=$this->placeOrder($order_arr,$this->session->userdata('franchise_id'),$u_code);
                        
                        
                    $date=date('Y-m-d H:i:s');
                    //$msg="Dear $f_name , You have made purchase of $total Rs ,Sr no-$get_insert_id on $date for B.v  $ttl_bv .Team $website";
                    //$msg="Dear $u_name , You have made purchase of Rs.$total vide Sr. no. on $date for BV.$ttl_bv.Total Live BV. $ttl_bv  Thanks For Purchase";
                    //$this->message->sms($u_mobile,$msg);
                        
                    $this->cart->destroy();
                    //$this->session->set_flashdata("success", " Success ! Order generated sucessfully.");
                    redirect(base_url($this->conn->company_info('franchise_path')."/products/success"), "refresh");
                    
                }
                redirect(base_url(uri_string()));
            }
            
            
        }
            $data['search_string']='franchise_cart';
          $this->show->franchise_panel('franchise_cart',$data);
     
        //$this->show->franchise_panel('franchise_cart');
    }
    
     function placeOrder($ordData,$f_code,$u_code){       
       
        $insertOrder = $this->conn->get_insert_id('orders',$ordData);
        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i=0;
            
            foreach($cartItems as $item){
                $ordItemData[$i]['franchise_id']     = $f_code;
                $ordItemData[$i]['u_code']     = $u_code;
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
                $insertOrderItems = $this->db->insert_batch('order_items',$ordItemData);
                
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
   function success(){
       $this->show->franchise_panel('franchise_success');
   }
   
    public function product_pending(){ 
        $searchdata['from_table']='orders';
        $conditions['delivery_status'] =0;
        $conditions['stock_from'] =$this->session->userdata('franchise_id'); 
        
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            $spo2=$this->profile->column_like($_REQUEST['name'],'name');
            if($spo2){
                $conditions['u_code'] = $spo2;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
            $spo=$this->profile->column_like($_REQUEST['username'],'username');
            if($spo){
                $conditions['u_code'] = $spo;
            }
        }
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->panel_url.'/products/product-pending');
        $this->show->franchise_panel('franchise_product_pending',$data);
    }
    
    public function product_approved(){ 
        $searchdata['from_table']='user_order';
        $conditions['delivery_status'] =1;
        $conditions['stock_from'] =$this->session->userdata('franchise_id'); 
        
       if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
           $spo1=$this->profile->column_like($_REQUEST['name'],'name'); 
            if($spo1){
                $conditions['u_code'] = $spo1;
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
            $spo=$this->profile->column_like($_REQUEST['username'],'username');
            if($spo){
                $conditions['u_code'] = $spo;
            }
        }
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->panel_url.'/products/product_approved');
        $this->show->franchise_panel('franchise_product_approved',$data);
    }
   
   
    public function orders(){ 
        if(isset($_GET['order_id'])){
            $this->session->set_userdata('order_id',$_GET['order_id']);
        
        }
        $fran_id=$this->session->userdata('order_id');
       
        if(isset($_POST['approve_btn'])){
            $remark=$_POST['remark'];
             $chk_exists=$this->conn->runQuery('id','user_order',"delivery_status=0 and id='$fran_id'");
             
        if($chk_exists){
            $set['delivery_status']=1;
            $set['remark']=$remark;
            $set['delivery_date']=date('Y-m-d H:i:s');
            $this->db->where('id',$fran_id);
            $this->db->update('user_order',$set);
         }
           
            $this->session->set_flashdata("success", "Order Approved.");
            redirect(base_url($this->conn->company_info('franchise_path').'/products/orders'));
        }
        $this->show->franchise_panel('franchise_pending_orders');  
    } 
    
    public function orders_product(){ 
        
        $this->show->franchise_panel('franchise_approved_orders');  
    } 
     public function bill(){ 
        
        $this->show->franchise_panel('user_bill');  
    } 
    
    public function franchise_bill(){ 
        
        $this->show->franchise_panel('franchise_bill');  
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
       $conditions['u_code']=$this->session->userdata('franchise_id');
           
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
        $data = $this->paging->search_response($searchdata,$this->limit,$this->panel_url.'/products/payouts'); 
         
            
        $this->show->franchise_panel('franchise_payout',$data); 

    }
    

}