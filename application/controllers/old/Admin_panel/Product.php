<?php
class Product extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();        
        $this->panel_url=$this->conn->company_info('admin_path');
        $this->limit=10;
    }
    
    
    
    public function index(){
        $this->products();     
        
    }  
    
      public function products(){ 
            $data['search_string']='admin_product_search';
            $data['limit']=25;
            $data['from_table']='products';
            $data['base_url']=$this->panel_url.'/product/products';
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $data['total_rows']=$res['total_rows'];
            $this->show->admin_panel('products',$data);  
      }

      public function categories(){  
            $data['search_string']='admin_category_search';
            $data['limit']=25;
            $data['from_table']='categories';
            $data['base_url']=$this->panel_url.'product/categories';
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $this->show->admin_panel('product_categories',$data); 
      } 

      public function add_product(){
          $data=array();
          if(isset($_POST['cat_btn'])){
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			$this->form_validation->set_rules('product_mrp', 'Product MRP', 'required');
			$this->form_validation->set_rules('product_dp', 'Product DP', 'required');
			$this->form_validation->set_rules('product_qty', 'Product Qty', 'required');
			$this->form_validation->set_rules('product_type', 'Product Type', 'required');
			$this->form_validation->set_rules('product_cat[]', 'Product Category', 'required');

			if($_POST['product_type']=='affiliate'){
				$this->form_validation->set_rules('link', 'Product Type', 'required');
			}
			
			$upload_product=$this->upload_file->upload_product('file');

			$options=json_encode(explode(',', $_POST['option']));
			$size=json_encode(explode(',', $_POST['size']));

			if($this->form_validation->run() != False && $upload_product['upload_error']==false){
				
			$morefile=$count = $this->upload_file->upload_multiple('morefile');
				
				$insert=array(
				'name' => htmlspecialchars($_POST['product_name']),				
				'mrp' => htmlspecialchars($_POST['product_mrp']),
				'dp' => htmlspecialchars($_POST['product_dp']),
				'qty' => htmlspecialchars($_POST['product_qty']),
				'p_dese' => htmlspecialchars($_POST['product_about']),
				'other_dese' => $_POST['product_description'],
				'size' => $size,
				'options' => $options,
				'more_imgs' => $morefile,
				'imgs' => $upload_product['file_name'],
				'product_type' => $_POST['product_type'],
				'link' => $_POST['link'],
				
				);
				$get_insert_id=$this->conn->get_insert_id('products',$insert);
				 if($get_insert_id){
						foreach($_POST['product_cat'] as $product_cat){
							$manage_data['type']='product_category';
							$manage_data['post_id']=$get_insert_id;
							$manage_data['param_id']=$product_cat;
							$this->db->insert('manage_data', $manage_data);
						}

						 $this->session->set_flashdata("alert_success", "Product Added Successfully.");
						
				 }else{
					    
					   $this->session->set_flashdata("alert_error", "Somthing Wrong1! Please try again.");
					  }
				 redirect($this->panel_url.'/product/add_product','refresh');	  
			}else{
					$data2['upload_error']=($upload_product['upload_error']==true ? $upload_product['display_error'] : '');
					$this->session->set_flashdata("alert_error", "Somthing Wrong! Please try again2.");
					 
			}			
		}
          
          
          $this->show->admin_panel('product_add',$data);
          
          
      } 
        
    public function add_category(){
        if(isset($_POST['cat_btn'])){
			$this->form_validation->set_rules('cat_name', 'Category Name', 'required');
		 
			 if($this->form_validation->run() != False){
				 $insert=array(
					'name' => htmlspecialchars($_POST['cat_name']),
					'parent_id' => ($_POST['sup_cat']!='' ? htmlspecialchars($_POST['sup_cat']):null),
					'type' => 'cat',
				 );
				  
				  if($this->conn->get_insert_id('categories',$insert)){
						  $this->session->set_flashdata("alert_success", "Category Added Successfully.");
						   
				  }else{					
						$this->session->set_flashdata("alert_error", "Somthing Wrong! Please try again.");
						 
                       }
			 }else{
				   $this->session->set_flashdata("alert_error", "Somthing Wrong! Please try again.");
				  
			 }
			 redirect($_SERVER['HTTP_REFERER']); 
		}
    }  
        
      public function delete(){
        if(isset($_REQUEST['product'])){
          $this->db->delete('products', array('id' => $_REQUEST['product']));
          $admin_path=$this->conn->company_info('admin_path');
          $this->session->set_flashdata("alert_success", "Product Deleted successfully.");
          redirect(base_url().$admin_path.'/product');
        }
    
         if(isset($_REQUEST['category'])){
            $cat_id=$_REQUEST['category'];
              $check_parent=$this->conn->runQuery("*",'categories',"type='cat' and parent_id='$cat_id'");
              $admin_directory=$this->conn->company_info('admin_directory');
              if(!$check_parent){
                  $this->db->delete('categories', array('id' => $_REQUEST['category']));                  
                  $this->session->set_flashdata("alert_success", "Product Deleted successfully.");
              }else{
                $this->session->set_flashdata("alert_error", " You can not delete any parent category.");
              }
              
              redirect(base_url().$admin_directory.'/product/categories');
        }
      }

    public function add_product_main_image(){
		$res['upload_error']=true;
		if($this->session->has_userdata('edit_product_id')){
			$res = $this->upload_file->upload_product('pr_image');
				if($res['upload_error']==false){			
						$update['imgs'] = $res['file_name'];                
						$this->db->where('id', $this->session->userdata('edit_product_id'));
						if($this->db->update('products', $update)){
							$res['msg']="Success";
						}else{
							$res['msg']="Something wrong.";
						}
				}else{
					$res['msg']=$res['display_error'];
				}
		}
		print_r(json_encode($res));
	  }
	  
	  
	  public function change_categories(){
		$res['error']=true;
		if($this->session->has_userdata('edit_product_id')){
			if(isset($_POST['product_cat'])){
				$edit_product_id=$this->session->userdata('edit_product_id');
				
				if(!empty($_POST['product_cat'])){
					$this->db->delete('manage_data', array('post_id' => $edit_product_id,'type' => 'product_category'));
					foreach($_POST['product_cat'] as $product_cat){
						$manage_data['type']='product_category';
						$manage_data['post_id']=$edit_product_id;
						$manage_data['param_id']=$product_cat;
						$this->db->insert('manage_data', $manage_data);
					}
				}
				
				
			}
			$res['msg']="Product categories updated.";
			$res['error']=false;
		}else{
			$res['msg']="Product Id not selected.";
		}

		return print(json_encode($res));
	  }
      public function edit_product(){
        $data=array();
        if(isset($_REQUEST['id'])){
          $data['product_id']=$_REQUEST['id'];
          $this->session->set_userdata('edit_product_id',$_REQUEST['id']);
        }
        
        if(isset($_POST['edit_btn'])){

          $product_detail=$this->product->product_detail($this->session->userdata('edit_product_id'));

              $this->form_validation->set_rules('product_name', 'Product Name', 'required');           
              $this->form_validation->set_rules('product_mrp', 'Product MRP', 'required');
              $this->form_validation->set_rules('product_dp', 'Product DP', 'required');
              $this->form_validation->set_rules('product_qty', 'Product Qty', 'required'); 
              $options=(isset($_POST['option']) ? json_encode(explode(',', $_POST['option'])):'');
              $size=(isset($_POST['size']) ? json_encode(explode(',', $_POST['size'])):'');
         
          if($product_detail->product_type=='affiliate'){
            $this->form_validation->set_rules('link', 'Link', 'required');
          }
          
          if($this->form_validation->run() != False){			
        
                $update['name'] = htmlspecialchars($_POST['product_name']);
           
                $update['mrp'] = htmlspecialchars($_POST['product_mrp']);
                $update['dp'] = htmlspecialchars($_POST['product_dp']);
                $update['qty'] = htmlspecialchars($_POST['product_qty']);
                $update['size'] = $size;
                $update['options'] = $options;
            
                $update['p_dese'] = htmlspecialchars($_POST['product_about']);
                $update['other_dese'] = $_POST['product_description'];
                $update['link'] = $_POST['link'];
            
             
             
            $this->db->where('id', $this->session->userdata('edit_product_id'));
             if($this->db->update('products', $update)){
              
                 $this->session->set_flashdata("alert_success", "Product Updated Successfully.");
                 redirect($_SERVER['HTTP_REFERER']); 						 
             }else{					   
                 $this->session->set_flashdata("alert_error", "Somthing Wrong1! Please try again.");
                }
          }else{
               
              $this->session->set_flashdata("alert_error", "Somthing Wrong! Please try again.");
               
          }
        }
        $this->show->admin_panel('product_edit',$data);
      }
    
      public function edit_category(){
        $data=array();
        if(isset($_REQUEST['id'])){
          $data['category_id']=$_REQUEST['id'];
          $this->session->set_userdata('edit_category_id',$_REQUEST['id']);
        }

        if(isset($_POST['cat_btn'])){
          $this->form_validation->set_rules('cat_name', 'Category Name', 'required');
         
           if($this->form_validation->run() != False){
             $update=array(
              'name' => htmlspecialchars($_POST['cat_name']),
              'parent_id' => ($_POST['sup_cat']!='' ? htmlspecialchars($_POST['sup_cat']):null),
              'type' => 'cat',
             );
              $this->db->where('id',$this->session->userdata('edit_category_id'));
              if($this->db->update('categories',$update)){
                  $this->session->set_flashdata("alert_success", "Category Updated Successfully.");
                  
              }else{					
                $this->session->set_flashdata("alert_error", "Somthing Wrong! Please try again.");
               
                           }
           }else{
               $this->session->set_flashdata("alert_error", "Somthing Wrong! Please try again.");
              
           }
           redirect($_SERVER['HTTP_REFERER']); 
        }

        $this->show->admin_panel('product_edit_category',$data);
      }
}

