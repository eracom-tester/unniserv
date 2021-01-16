<?php
class Cart extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        /*print_r($_SESSION['cart_contents']);
        die();*/
        $this->show->main('cart',array());
        
       // $cartcon=$this->cart->contents();
        //print_r($cartcon);
    }
    
    
    public function add_to_cart(){
       $res['error']=true;
      // if(isset($_POST['size']) && $_POST['size']!=''){
           
       
           $productId=$_POST['productId'];
           
           //$pending=$this->product->available_by_size($productId,$_POST['size']);
            //if($pending>=$_POST['productQty']){
                $product_details=$this->product->product_detail($productId);
                $img=$product_details->imgs;
                $productName=$product_details->name;
                $productPrice=$product_details->dp;
                $product_bv=$product_details->product_bv;
                $data = array(
                    "u_code"    =>($this->session->has_userdata('user_id') ? $this->session->userdata('user_id'):''),
                    "img"         => base_url('images/products/'.$img),
                    "id"         => $productId,
                    "name"       => $productName,//,
                    "qty"        => $_POST['productQty'],
                    "price"      => $productPrice,
                    "bv"      => $product_bv,
        		);
        		
        		//$options['Size']=$_POST['size'];
        		//$data['options']=$options;
        		
        	 	$this->cart->insert($data);
        
        		//print_r($data);
        		$this->session->set_flashdata("alert_success", "Product successfully added to cart.");
    		    $res['error']=false;
            /*}else{
                $res['msg']="Out of stock.";
            }*/
           
           
       /*}else{
           $res['msg']="Please select size.";
       }*/
       print_r(json_encode($res));
    }
    
    public function remove(){		
		 $data = array(
			'rowid' =>  $_POST['rowid'],
			'qty'   => 0
		 );
		 $this->session->set_flashdata('update_cart', 'You have modified your shopping cart!');
		 $this->cart->update($data);
	 }
    
    public function update_all(){		
		//print_r($_POST);
		$data=$this->cart->update($_POST);
		$this->session->set_flashdata('update_cart', 'You have modified your shopping cart!');
		redirect(base_url().'/cart');
	}
	
	public function update(){		
		 $data = array(
			'rowid' =>  $_POST['rowid'],
			'qty'   => $_POST['qty']
		 );
		 $this->session->set_flashdata('update_cart', 'You have modified your shopping cart!');
		 $this->cart->update($data);
	 }
    
}
