<?php
class Api extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function callback(){
$testing['remark']='done';
$this->db->insert('testing',$testing);

        $secret = "1crexchanger";
   if($_GET['secret'] != $secret)
   {
     die('Stop doing that');
   }
   else
   {
    
	
	    $url = "https://blockchain.info/stats?format=json";				
        $contents  = $this->curl->simple_get($url);

				if (!is_string($contents) || !strlen($contents)) {
				echo "Failed to get contents.";
				$contents = '';
                }
                
        $data=json_decode($contents,true);

        $price=$data["market_price_usd"];
        $userId = $_GET['invoice'];
        $amount = $_GET['value'];
        $orderid = $_GET['orderid'];
        $transaction_hash = $_GET['transaction_hash'];
	    $amountCalc = $amount / 100000000;
	    $final=$price*$amountCalc;
        $final=round($final,2);
        
       $found_record=$this->conn->runQuery('id',"transaction","tx_record='$transaction_hash'");
       
	  
	   if(!$found_record){

        $inserttransection['u_code']=$userId;
        $inserttransection['amount']=$final;
        $inserttransection['tx_type']='added_btc';
        $inserttransection['wallet_type']='fund_wallet';
        $inserttransection['debit_credit']='credit';
        $inserttransection['reason']='callback';
        $inserttransection['tx_record']=$transaction_hash;
    	
		$this->db->insert('transaction',$inserttransection);

	   }             
		echo "*ok*"; 
   }
    }
}