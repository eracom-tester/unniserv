<?php
class Btc_api extends CI_Model{
    
    function generate_btc_address($userId){
        $api_key = "6c5da718-aa57-45b4-8901-c5cacfbab72c";
        $secret = "1crexchanger"; //this can be anything you want
        $xpub='';        
		$i=0;
		
        while($xpub==''){
            $xpub_array=$this->conn->runQuery("*","xpub","1=1");
            if($xpub_array){

                 $gap_url="https://api.blockchain.info/v2/receive/checkgap?xpub=".$xpub_array[$i]->xpub."&key=".$api_key;

                 $cl = $this->curl->simple_get($gap_url);
                 $xpub_record = json_decode($cl, true);
                 $gap = $xpub_record['gap'];
                 if($gap<20){
                     $xpub=$xpub_array[$i]->xpub;
                 }

                $i++;
                 if($i>=count($xpub_array)){
                     break;
                 }                
            }else{
                break;
            }
        }
	
	$payTo='';
    if($xpub!=''){            
            
                //call blockchain info receive payments API$invoice_id=uniqid();
            $callback_url = base_url()."user/api/callback?invoice=".$userId."&secret=".$secret;
            $receive_url = "https://api.blockchain.info/v2/receive?key=".$api_key."&xpub=".$xpub."&callback=".urlencode($callback_url);

            $ccc = $this->curl->simple_get($receive_url);
            $json = json_decode($ccc, true);
            $payTo = $json['address']; //the newly created address will be stored under 'address' in the JSON response
            $payTo; //echo out the newly created receiving address
            $tm= date("Y-m-d H:i:s");
            
            $btc_address_insert['userid']=$userId;
            $btc_address_insert['btc_address']=$payTo;
            $btc_address_insert['xpub']=$xpub;
            $btc_address_insert['added']=$tm;
            $this->db->insert('wallet_address',$btc_address_insert);
    }
	 return $payTo;
}

     
}

