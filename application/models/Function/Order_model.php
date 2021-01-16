<?php
class Order_model extends CI_Model{
    
    
    public function date_column($status){
        $ret='added_on';
        //{"3":"Accepted","0":"Pending","1":"Success","2":"Rejected","4":"Dispatched"}
        switch ($status){
            case  '1' :
                $ret = 'date_approve';
                break;
            case  '2' :
                $ret = 'date_reject';
                break;
            case  '3' :
                $ret = 'date_accept';
                break;
            case  '4' :
                $ret = 'date_dispatch';
                break;
        }
        
        return $ret;
    }
    
    public function new_invoice_no(){
        
        $check_no=$this->conn->runQuery('MAX(invoice_no) as invoice_id','orders',"1=1")[0]->invoice_id;
        $new_invoice_no=$check_no!='' ? $check_no+1:1;
        return $new_invoice_no;
        
    }
    public function new_franchise_invoice_no(){
        
        $check_no=$this->conn->runQuery('MAX(invoice_no) as invoice_id','franchise_orders',"1=1")[0]->invoice_id;
        $new_invoice_no=$check_no!='' ? $check_no+1:1;
        return $new_invoice_no;
        
    }
    
}

