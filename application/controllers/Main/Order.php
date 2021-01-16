<?php
class Order extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        /*if(!$this->session->has_userdata('user_login')){
            
            $path=base_url(uri_string());
            $this->session->set_userdata('path_after_login',$path);
            redirect(base_url('login'));
            die();
        }*/
        
        if(empty($this->cart->contents())){
            redirect(base_url('cart'));
            die();
        }
        
        
    }

    public function index(){
        //$this->show->main('cart',array());
    }
    
    public function shipping_address(){
        
        $data['currency']=$this->conn->company_info('currency');
        $data['profile']=$this->session->userdata('profile');
        
       
        
        
        $this->show->main('order_shipping',$data);
    }
    
    public function payment(){
        $data['currency']=$this->conn->company_info('currency');
        $profile=$data['profile']=$this->session->userdata('profile');
        
        
        if($this->session->has_userdata('user_id')){
            $u_code=$this->session->userdata('user_id');
        }else{
            $u_code='';
        }
         if(isset($_POST['continue_btn'])){
            $this->form_validation->set_rules('shipping[name]', 'Name', 'required');
            $this->form_validation->set_rules('shipping[email]', 'Email', 'required');
            $this->form_validation->set_rules('shipping[address1]', 'Address', 'required');
            $this->form_validation->set_rules('shipping[mobile]', 'Phone', 'required');
            $this->form_validation->set_rules('shipping[city]', 'City', 'required');
            $this->form_validation->set_rules('shipping[postcode]', 'Postcode', 'required');
            if($this->form_validation->run() != False){
                $shipping=json_encode($_POST['shipping']);
                $tx_id=time().$u_code;
                $order_arr=array();
                $order_arr['tx_id']=$tx_id;
                $order_arr['order_address']=$shipping;
                $order_arr['tx_type']='order';
                $order_arr['tx_user_id']=$u_code;
                $order_arr['order_details']=json_encode($this->cart->contents());
                $total=$order_arr['order_amount'] = $this->cart->total();
                $odr_id=$this->placeOrder($order_arr);
                
                
                ?>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                <script>
                
                  var SITEURL = "<?php echo base_url() ?>";
                  checkout();
                  function checkout(){
                    var totalAmount = <?= $this->cart->total();?>;
                    var tx_id =  <?= $tx_id;?>;
                    var options = {
                    "key": "rzp_live_xFfwxzetTSI7k9",
                    "amount": <?= 1*100;?>, // 2000 paise = INR 20
                    "name": "Caratshine",
                    "description": "Payment",
                    "image": "https://caratshine.in/images/logo/logo2.png",
                    "prefill.name":"<?= $profile->name;?>",
                    "prefill.email":"<?= $profile->email;?>",
                    "prefill.contact":"<?= $profile->mobile;?>",
                    "handler": function (response){
                        alert(response);
                        $.ajax({
                            url: SITEURL + 'order/razorPaySuccess',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
                            }, 
                            success: function (msg) {
                                
                               window.location.href = SITEURL + 'order/RazorThankYou';
                            }
                        });
                      
                    },
                    "theme": {
                        "color": "#9C2776"
                    }
                  };
                  var rzp1 = new Razorpay(options);
                  rzp1.open();
                  e.preventDefault();
                  }
                 
                </script>
                <?php
                //$this->session->set_flashdata('checkout_success', 'Make payment!');
                $this->session->set_userdata('order_id', $odr_id);
                $this->show->main('order_success',$data);
                
                //redirect(base_url(uri_string()));
            }
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
                $ordItemData[$i]['product_bv']     = $item['product_bv'];
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
    
    public function checkout(){
        $u_code=$this->session->userdata('user_id');
        $tx_id=time().$u_code;
         
         
    }
    
    public function razorPaySuccess()
    { 
        //print_r($_POST);
        $testing=json_encode($_POST);
        $tst['remark']=$testing;
        $this->db->insert('testing',$tst);
      
        $this->session->set_flashdata('checkout_success', 'Order placed successfully!');
        $this->show->main('order_success',$data);
      
      
    }
    
    public function RazorThankYou()
    {
    $this->show->main('razorthankyou');
     //$this->load->view('razorthankyou');
    }
    
}
