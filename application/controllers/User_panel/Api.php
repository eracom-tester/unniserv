<?php
/*use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Enum\Param;
use Coinbase\Wallet\Exception\TwoFactorRequiredException;
use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Resource;
use Coinbase\Wallet\Resource\ResourceCollection;
use Coinbase\Wallet\Resource\Address;


use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Value\Money;*/

class Api extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        
        /*require_once APPPATH.'/third_party/coinbase/vendor/autoload.php';
		$apiKey='GiGwF4Z7JmOxbuoA';
		
		$apiSecret='l7dduz60eu12AV2aKECtQNPnJ2kCL2TT';
		
		$accessToken='7d13f30fede00c1413d99d7ec98045b6847308a7252594af57f9e7e207e6ccf0';
        
        $apiKeyeracom='AeEeZRnftuSd1K9G';
        
        $configuration = Configuration::apiKey($apiKey, $apiSecret);
        $this->client = Client::create($configuration);*/
        
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
     
    public function test_new(){
        $this->load->library('coinbase');
        
        $PrimaryAccount=$this->coinbase->PrimaryAccount();
        //$acc_address=$this->coinbase->AccountAddresses($PrimaryAccount);
        
        $res=$this->coinbase->request($PrimaryAccount,$PrimaryAccount,100,'INR','reqest test');
        echo '<pre>';
        print_r($res);
        
        
        
    }
    
    public function test_tr(){
        $this->load->library('coinbase');
       //$Account=$this->coinbase->PrimaryAccount();
        $PrimaryAccount=$this->coinbase->makedeposit();
         
        echo '<pre>';
        print_r($PrimaryAccount);
    }
    
    public function coinbase_new(){
        
        $client=$this->client;
        
        $account = $client->getPrimaryAccount();
        // $account = $client->getAccount('f7c033f1-b0ca-5f76-b1a0-deb0e2f378b1');
        
        //$addresses = $client->getAccountAddresses($account);
        //$address = $client->getAccountAddress($account, 'f5a40688-51b5-5699-8aa0-269a7459a280');
        
        // $transactions = $client->getAddressTransactions($address);
        
        //$transactions = $client->getAccountTransactions($account);
        
        $transaction = Transaction::send([
            'toBitcoinAddress' => '153cekDcp8QFUK1UAVypUEQ4KubtgVwYpE',
            'amount'           => new Money(150, CurrencyCode::INR),
            'description'      => 'Your first bitcoin!',
            //'fee'              => '0.0001' // only required for transactions under BTC0.0001
        ]);
        
        try { 
            
            $client->createAccountTransaction($account, $transaction);
            
            
        }
        catch(Exception $e) {
           $response = $e->getStatusCode();
           echo '<pre>';
           print_r($response);
           echo '</pre>';
             echo $e->getMessage(); 
        }
        
         /*echo '<pre>';
        print_r($addresses);*/
        
        
    }
    
    
    public function coinbase_old(){
       
        /*$data['response_type']='code';
        $data['client_id']=$this->client_id;
        //$data['redirect_uri']='http://www.coinbase.com/oauth/token';
        $data['scope']='wallet:accounts:read';
        $data['state']='2345673431';
        
        $header['Authorization']="Bearer ";
        
        $url="https://www.coinbase.com/oauth/authorize";
        
        $get_data=$this->curl->simple_get($url,$data);
        print_r($get_data);*/
    }
}