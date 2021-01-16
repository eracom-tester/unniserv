<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\HttpClient;
use Coinbase\Wallet\Mapper;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Resource\Buy;
use Coinbase\Wallet\Resource\CurrentUser;
use Coinbase\Wallet\Resource\Deposit;
use Coinbase\Wallet\Resource\PaymentMethod;
use Coinbase\Wallet\Resource\ResourceCollection;
use Coinbase\Wallet\Resource\Sell;
use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Resource\User;
use Coinbase\Wallet\Resource\Withdrawal;
use Psr\Http\Message\ResponseInterface;
 
use Coinbase\Wallet\Enum\Param;
use Coinbase\Wallet\Exception\TwoFactorRequiredException;

use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Value\Money;

use GuzzleHttp\Psr7\Response;
 
class Coinbase
{   
    
    /** @var \PHPUnit_Framework_MockObject_MockObject|HttpClient */
    private $http;

    /** @var \PHPUnit_Framework_MockObject_MockObject|Mapper */
    private $mapper;

    /** @var Client */
    private $client;
    
    
    
    public function __construct(){
        require_once APPPATH.'/third_party/coinbase/vendor/autoload.php';
		$apiKey='GiGwF4Z7JmOxbuoA';
		
		$apiSecret='l7dduz60eu12AV2aKECtQNPnJ2kCL2TT';
		
		$accessToken='7d13f30fede00c1413d99d7ec98045b6847308a7252594af57f9e7e207e6ccf0';
        
        $apiKeyeracom='AeEeZRnftuSd1K9G';
        
        $configuration = Configuration::apiKey($apiKey, $apiSecret);
        $this->client = Client::create($configuration);
    }
    
    
    public function load(){
        return $this->client;
    }
    

    public function PrimaryAccount(){
        
        $client=$this->client;
        return $client->getPrimaryAccount();
        
    }
    
    public function Account($id){
        $client=$this->client;
        return $client->getAccount($id);
    }
    
    public function AccountAddresses($account){
        $client=$this->client;
        return $client->getAccountAddresses($account);
    }
    
    public function AccountAddress($account,$id){
        $client=$this->client;
        return $client->getAccountAddress($account,$id);
    }
    
    public function send($from_acc,$to,$amount,$currecny,$description){
        //$response=false;
        
        $res['error']=true;
        
        $client=$this->client;
        $transaction = Transaction::send([
            'toBitcoinAddress' => $to,
            'amount'           => new Money($amount, CurrencyCode::INR),
            'description'      => $description,
            //'fee'              => '0.0001' // only required for transactions under BTC0.0001
        ]);
        
        try {
            $client->createAccountTransaction($from_acc, $transaction); 
            
        }
            catch(Exception $e) {
                  
            if ($errors =  $e->getErrors()) {
                
                $res['error']=true;
                $res['error_code']=$e->getstatusCode();
                $res['message'] = $e->getMessage();
                 
            } else {
                
                $res['error']=false;
                $res['data']=$transaction->getrawData();
            } 
        }
        return $res;
    }
    
    public function request($account,$to,$amount,$currecny,$description){
        //$response=false;
        
        $res['error']=true;
        
        $client=$this->client;
         
        $transaction = Transaction::request([
            
            'toEmail'=>'test@mail.com',
            'amount'      => new Money($amount, CurrencyCode::INR),
            'description' => 'Burrito',
             
        ]);
        
        $client->createAccountTransaction($account,$transaction);
         
        
        
        
        return $transaction;
    }
    
    public function AccountTransactions($account){
        $client=$this->client;
        $getAccountTransactions=$client->getAccountTransactions($account);
        return $getAccountTransactions;
    }
    
    public function AccountTransaction($account,$transactionId){
        $client=$this->client;
        $transaction=$client->getAccountTransaction($account, $transactionId);
        return $transaction->getrawData();
        
    }
    
    public function AccountDeposits($account){
        $client=$this->client;
        $transaction=$client->getAccountDeposits($account);
        return $transaction;
        
    }
    public function makedeposit(){
         
        
        $deposit = new Deposit([
            'paymentMethod' => PaymentMethod::reference($paymentMethodId)
        ]);
        echo '<pre>';
        print_r($deposit);
    }
    
    
    
    
    
}