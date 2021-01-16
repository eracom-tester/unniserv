<?php
class Product extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $data['product_id']=$product_id=$_REQUEST['id'];
        $data['product_details']=json_decode(json_encode($this->product->product_detail($product_id)),true);
        $data['currency']=$this->config->item('currency');
        
        $this->show->main('product_details',$data);
    }

    public function product_details(){

        $data=array();

        $arr['size']= isset($_POST['size']) && $_POST['size']!='' ? $_POST['size']: '6';
        $arr['gold']= isset($_POST['gold']) ? $_POST['gold']:'18kt';
        $arr['diamond']=isset($_POST['diamond']) ? $_POST['diamond']: 'jk_si';
        $data['data_arr']=$arr;
        $data['product_id']=$_REQUEST['product_id'];
        $this->load->view('Main/m15/product_table',$data);
    }

    public function product_bv(){
        $ret=0;
        $type=isset($_POST['diamond']) ? $_POST['diamond']: 'jk_si';
        $product_id=$_REQUEST['product_id'];
        $rate=$this->product->metal_rate($product_id,'diamond',$type,6);
        
        $get_per=$this->conn->runQuery('*','product_bv',"post_id='$product_id' and slug='$type'");
        if($get_per){
            $persnt=$get_per[0]->value;
            $ret=$rate*$persnt/100;
        }
        echo $ret;
    }

    public function available_size(){
        //echo '';
        $res['error']=true;
        
        
        if(isset($_POST['productId']) && isset($_POST['size']) && $_POST['size']!=''){
            
            $pending=$this->product->available_by_size($_POST['productId'],$_POST['size']);
            if($pending>0){
                $res['error']=false;
                $res['msg']="In Stock.";
            }else{
                $res['msg']="Out of stock.";
            }
        }else{
            $res['msg']="Please Select Size.";
        }
        print_r(json_encode($res));
        
        
    }


}
