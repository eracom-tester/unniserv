<?php
class Checkout extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->has_userdata('user_login')){
            
            $path=base_url(uri_string());
            $this->session->set_userdata('user_login_path',$path);
            redirect(base_url('login'));
            die();
        } 
        
        if(empty($this->cart->contents())){
            redirect(base_url('cart'));
            die();
        }
        
        
    }

    public function index(){         
            // print_r($_SESSION);
           //die();  
          //    $this->show->user_panel('coming_soon'); 
          
        $data['currency']=$currency=$this->config->item('currency');
        $data['cart']=$this->cart->contents();
        $data['profile']=$this->session->userdata('profile');
        $data['user_id']=$u_code=$this->session->userdata('user_id');
        
        if(isset($_POST['submit'])){
            
            $ttl=$this->cart->total();//$this->product->rates();
            $total = $ttl['Total'];
            $this->form_validation->set_rules('wallet_type', 'Balance', 'required|callback_check_wallet');
            $this->form_validation->set_rules('Billing[first_name]', 'Name', 'required');
            $this->form_validation->set_rules('Billing[email]', 'Email', 'required');
            $this->form_validation->set_rules('Billing[address]', 'Address', 'required');
            $this->form_validation->set_rules('Billing[zip]', 'Zip', 'required');
            
            if($this->form_validation->run() != False){
                $shipping=json_encode($_POST['Billing']);
                $currenct_payout_id=$this->wallet->currenct_payout_id();
                $new_invoice_no=$this->order->new_invoice_no();
                $order_arr=array();
                $order_arr['order_address']=$shipping;
                $order_arr['tx_type']='purchase';
                $order_arr['u_code']=$u_code;
                $order_arr['order_details']=json_encode($this->cart->contents());
                $order_arr['payment_status'] = 1 ;
                $order_arr['payout_id'] = $currenct_payout_id ;
                $order_arr['invoice_no'] = $new_invoice_no ;
                $order_arr['order_amount'] = $total ;
                $order_arr['order_bv'] = $this->cart->totalbv();
                $odr_id=$this->placeOrder($order_arr);
                if($odr_id){
                    $trn=array();
                    $trn['u_code']=$u_code;
                    $trn['tx_type']='product_purchase';
                    $trn['debit_credit']='debit';
                    $trn['amount']=$total;
                    $trn['wallet_type']='shopping_wallet';
                    $trn['date']=date('Y-m-d H:i:s');
                    $trn['status']=1;
                    $trn['remark']="Purchase products of amount $currency $total";
                    $trn['tx_record']=$odr_id;
                    $this->db->insert('transaction',$trn);
                    
                    $this->session->set_flashdata('checkout_success', 'Order generated Successfully!');
                    $this->session->set_userdata('order_id', $odr_id);
                    redirect(base_url('success/order'));
                }
                
            }
        }
        
        
        $this->show->main('checkout',$data);
      
      
    }
    
    public function check_wallet(){
        $u_code=$this->session->userdata('user_id');
        
        $ttl=$this->product->rates($this->cart->total());
        $total = $ttl['Total'];
        $wallet_balance=$this->wallet->balance($u_code,'shopping_wallet');
        if($wallet_balance>=$total){
            return true;
        }else{
            $this->form_validation->set_message('check_wallet', "Insufficient balance in wallet.");
            return false;
        }
    }
    
    function placeOrder($ordData){       
       
        $insertOrder = $this->conn->get_insert_id('orders',$ordData);
        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
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
    
}