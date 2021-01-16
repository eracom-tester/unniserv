<?php
class Product_model extends CI_Model{
    
    public function new_items($limit){
        
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit);
        $res=$this->db->get('products');
        if($res->num_rows()>0){
          return  $res->result();
        }else{
            return FALSE;
        }
         // print_r($this->db->last_query());
    }
    
    public function trending_items($limit){
        
        $this->db->order_by('views', 'DESC');
        $this->db->limit($limit);
        $res=$this->db->get('products');
        if($res->num_rows()>0){
          return  $res->result();
        }else{
            return FALSE;
        }
       //   print_r($this->db->last_query());
    }

	public function best_seller_items($limit){        
        $this->db->order_by('purchases', 'DESC');
        $this->db->limit($limit);
        $res=$this->db->get('products');
        if($res->num_rows()>0){
          return  $res->result();
        }else{
            return FALSE;
        }
       //   print_r($this->db->last_query());
    }
    public function daily_deal_items($limit){
        $date=date('Y-m-d H:i:s');
		    $this->db->where("available > '0' and till_time>'$date'");
        $this->db->order_by('available DESC, till_time ASC');		
        $this->db->limit($limit);
        $res=$this->db->get('daily_deals');
        if($res->num_rows()>0){
          return  $res->result();
        }else{
            return FALSE;
        }
          // print_r($this->db->last_query());
    }
   
    public function top_rated_items($limit){       
      $this->db->order_by('review_rate', 'DESC');
      $this->db->limit($limit);
      $res=$this->db->get('products');
      if($res->num_rows()>0){
        return  $res->result();
      }else{
          return FALSE;
      }
     //   print_r($this->db->last_query());
  }

     public function product_detail($id){        
        $res=$this->conn->runQuery('*','products',array('id'=>$id));
        if($res){
          $resp=$res[0];
          $categories=$this->product_categories($id,array('returnType'=>'string'));
          $resp->categories=($categories ? $categories :'');
            return $resp;
        }else{
             return false;
        }        
    }   
     public function related_items($pr_id,$limit){

      $ret=false;
        $pro_details=$this->product_detail($pr_id);

        $cat_res=$this->product->product_categories($pr_id);
        if($cat_res){
          $implode=implode(',',$cat_res);
          $allids=$this->conn->runQuery('post_id','manage_data',"param_id IN ($implode)");
          if($allids){
            $get1=array_column($allids,'post_id');
            $this->db->where_in('id',$get1);
            $this->db->where("status='1' and qty > '0'");
            $this->db->order_by(' `views` DESC, `purchases` DESC, `qty` DESC, `id` DESC');		
            $this->db->limit($limit);
            $res=$this->db->get('products');
            if($res->num_rows()>0){
              return  $res->result();
            }
          }
        }
		
		    
          // print_r($this->db->last_query());
    }
    
    public function product_categories($product_id,$data=array()){
     $return = false;

     if(is_array($product_id)){
           $implodes=implode(',',$product_id);
           $whr = "type='product_category' and status=1 and post_id IN ($implodes)";
      }else{
        $whr=array(
          'type' => 'product_category',
          'post_id' => $product_id ,
          'status' => 1 ,
        );
      }

      
      $res=$this->conn->runQuery('param_id','manage_data',$whr);
      if($res){
          if(array_key_exists("returnType", $data)){
            if($data['returnType']=='count'){
              $return=count($res);
            }            
            if($data['returnType']=='string'){              
              $get=array_column($res,'param_id');
              $imp=implode(',',$get);  
              $get_arr=$this->conn->runQuery('name','categories',"id IN ($imp)");
              if($get_arr){
                $get1=array_column($get_arr,'name');
                $return=implode(', ',$get1);
              }
            }            
          }else{            
                $return=array_column($res,'param_id');            
          }
       }
      return $return;
    }

    public function category_products($cat_id,$data=array()){
     $return = false;
      $this->db->select('post_id');
      $this->db->where('type','product_category');
      $this->db->where('status',1);
     if(is_array($cat_id)){
        $this->db->where_in('param_id',$cat_id);
     }else{
        $this->db->where('param_id',$cat_id);
     }

      $resp=$this->db->get('manage_data');
      if($resp->num_rows()>0){
         $res = $resp->result_array();
        if(array_key_exists("returnType", $data)){
          if($data['returnType']=='count'){
            $return=count($res);
          }else{
            $return=array_column($res,'post_id');
          }                     
        }else{            
              $return=array_column($res,'post_id');            
        }
      }       
      return $return;
    }

    public function add_view($productID){
      $views=$this->product_detail($productID)->views;
      $set=array(
        'views'=> $views+1,
      );
      $this->db->update('products',$set," id='$productID'");
    }
    
    public function insertOrderItems($data = array()) {
        
      // Insert order items
      $insert = $this->db->insert_batch('order_items', $data);

      // Return the status
      return $insert?true:false;
  }

  public function getOrder($id){ 
    
    // Get order items
    $this->db->select('i.*,  p.*');
    $this->db->from('order_items as i');
    $this->db->join('products as p', 'p.id = i.product_id', 'left');
    $this->db->where('i.order_id', $id);
    $query2 = $this->db->get();
    $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
    
    // Return fetched data
    return !empty($result)?$result:false;
}

    public function child_categories($cat_id){
      $this->db->select('id');
      $this->db->where('status',1);
      $this->db->where('type','cat');

        if(is_array($cat_id)){
          $this->db->where_in('parent_id',$cat_id);
        }else{          
          $this->db->where('parent_id',$cat_id);

        }

        $query2 = $this->db->get('categories');
        $res = ($query2->num_rows() > 0) ? $query2->result_array():array();
        return (!empty($res) ? array_column($res,'id'):false);
    }

    public function category_details($cat_id){
      $res=$this->conn->runQuery('*','categories',array('id'=>$cat_id));
        return ($res ? $res[0]:false);   
    }

    public function category_options($id,$params=array(),$res='',$scp=''){
      $categoriess=$this->child_categories($id);
      $selected='';
      $category_id='';
      if(array_key_exists("selected", $params)){
        $selected=$params['selected'];
      }
      if(array_key_exists("category_id", $params)){
        $category_id=$params['category_id'];
      }

      if($categoriess){
          foreach($categoriess as $categorys){
           $super_category=$this->category_details($categorys);
           $categories2=$this->child_categories($categorys);
           
           if($category_id!=$super_category->id){
              $res .='<option value="'.$super_category->id.'"  '.($selected==$super_category->id ? 'Selected':'').'>'.$scp.$super_category->name.'</option>';
           }
            

            if($categories2){
              $scp .="&nbsp;&nbsp;&nbsp;&nbsp;";           
              $res = $this->category_options($categorys,$params,$res,$scp);
              $scp="";
            }

          }
      }

      return $res;
    }

}

