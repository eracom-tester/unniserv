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
              $this->form_validation->set_rules('product_code', 'Product Code', 'required');
              $this->form_validation->set_rules('product_name', 'Product Name', 'required');
              $this->form_validation->set_rules('mrp', 'Product MRP', 'required');
              $this->form_validation->set_rules('dp', 'Product DP', 'required');
              $this->form_validation->set_rules('product_bv', 'Product BV', 'required');
               
              $upload_product=$this->upload_file->upload_product('file');
              if($this->form_validation->run() != False && $upload_product['upload_error']==false){
                $morefile=$count = $this->upload_file->upload_multiple('morefile');
                $insert=array(
                  'p_code' => htmlspecialchars($_POST['product_code']),				
                  'name' => htmlspecialchars($_POST['product_name']),
                  'other_dese' => $_POST['product_description'],
                  'more_imgs' => $morefile,
                  'mrp' => $_POST['mrp'],
                  'dp' => $_POST['dp'],
                  'product_bv' => $_POST['product_bv'],
                  'imgs' => base_url().'images/products/'.$upload_product['file_name'],
                  'product_type' => 'product',                  
                );
                $get_insert_id=$this->conn->get_insert_id('products',$insert);
                   if($get_insert_id){
                      foreach($_POST['product_cat'] as $product_cat){
                        $manage_data['type']='product_category';
                        $manage_data['post_id']=$get_insert_id;
                        $manage_data['param_id']=$product_cat;
                        $this->db->insert('manage_data', $manage_data);
                      }
                    }
                    /*
                    $all_options_arr=$this->conn->runQuery('*','product_add_fields',"cat_slug='for_all_products' and tab_slug='options'");
                    if($all_options_arr){
                      foreach($all_options_arr as $option_input){
                        if(isset($_POST[$option_input->slug]) && !empty($_POST[$option_input->slug])){
                          $options_arr=$_POST[$option_input->slug];
                          foreach($options_arr as $option_key=>$optionval){
                            //$cur_slug = substr($option_input->slug, 0, -7);
                            $insert_option=array();
                            $insert_option['post_id']=$get_insert_id;
                            $insert_option['type']='options';
                            $insert_option['slug']=$option_input->slug;
                            $insert_option['value']=$option_key;
                            $this->db->insert('product_options',$insert_option);

                          }                          
                        }
                      }
                    }
                    */
                    //$vr_arr=array();
                    if(isset($_POST['variant'])){
                      //print_r($_POST['variant']);
                      foreach($_POST['variant'] as $vl){
                        if($vl['value']!=''){
                          $vr_insert=array();
                          $vr_insert['post_id']=$get_insert_id;
                          $vr_insert['slug']=$vl['slug'];
                          $vr_insert['value']=$vl['value'];
                          $vr_insert['type']=$vl['type'];
                          $this->db->insert('product_variants',$vr_insert);
                          //$vr_arr[]=explode(',',$vl['value']);
                        }
                      }
                    }
                    if(isset($_POST['qty'])){
                      if(is_array($_POST['qty'])){
                        foreach($_POST['qty'] as $sku=>$val){
                          $sku_insert=array();
                          $sku_insert['post_id']=$get_insert_id;
                          $sku_insert['sku']=$sku;
                          $sku_insert['qty']=$val;
                          $this->db->insert('product_skus',$sku_insert);
                        }
                      }else{
                        $sku_insert=array();
                        $sku_insert['post_id']=$get_insert_id;
                        $sku_insert['sku']='product_qty';
                        $sku_insert['qty']=$_POST['qty'];
                        $this->db->insert('product_skus',$sku_insert);
                      }
                    }

                    //$asd=$this->product->combinations($vr_arr);
                    //die();
                     
                     
                     
                     $this->session->set_flashdata("alert_success", "Product Added Successfully.");
                     redirect($this->panel_url.'/product/add_product','refresh');
              }else{
                 	$data2['upload_error']=($upload_product['upload_error']==true ? $upload_product['display_error'] : '');
					$this->session->set_flashdata("alert_error", "Somthing Wrong! Please try again."); 
              }
            }

            $this->show->admin_panel('product_add_new',$data);
        }
        
         

        public function get_section(){
            $data=array();
            
            $cats=array();
            
            if(isset($_POST['categories'])){
                $cats = $_POST['categories'];
            }
            
            $cats[]='for_all_products';
            $data['implode_cats'] = $implode_cats =  "'".implode("','",$cats)."'";
             
            $this->db->where_in($cats);
            $this->db->order_by('tab_index asc');
            $res= $this->db->get('product_add_tabs');
             if($res->num_rows()>0){
                $all_tabss = $res->result();
            }else{
                 $all_tabss =  false;
            }  
           // print_r($all_tabs);
            $data['all_tabs']=$all_tabss; 
            
            $this->load->view('Admin_panel/pages/product_add_ajax',$data);
        }
        
        public function variant_row(){

          $sdta['name']=$_POST['name'];
          $sdta['index']=$_POST['index'];
          
          $this->load->view('Admin_panel/pages/product/product_add_variant_row',$sdta);
        }

        public function skus(){
         
          $array=array();
          //$array[] = $_POST['slug'];

          foreach($_POST['values'] as $vl){
            if($vl!=''){
              $array[]=explode(',',$vl);
            }
          }
          //$array[] = $_POST['values'];          
          $sdta['sku']=$this->product->combinations($array);

          $this->load->view('Admin_panel/pages/product/product_add_qty',$sdta);
          /* echo '<pre>';
          print_r($asd); */
        }
        
      public function add_product_test(){
          $data=array();
          if(isset($_POST['cat_btn'])){
			$this->form_validation->set_rules('product_code', 'Product Code', 'required');
			$this->form_validation->set_rules('product_name', 'Product Name', 'required');
			/* $this->form_validation->set_rules('product_mrp', 'Product MRP', 'required');
			$this->form_validation->set_rules('product_dp', 'Product DP', 'required'); */
			$this->form_validation->set_rules('product_qty', 'Product Qty', 'required');
			$this->form_validation->set_rules('product_type', 'Product Type', 'required');
			$this->form_validation->set_rules('making_charges', 'Making charges', 'required');
		//	$this->form_validation->set_rules('bv', 'Product BV', 'required');
			$this->form_validation->set_rules('product_cat[]', 'Product Category', 'required');
			//$this->form_validation->set_rules('matel[]', 'Weight', 'required');

			if($_POST['product_type']=='affiliate'){
				$this->form_validation->set_rules('link', 'Product Type', 'required');
			}
			
			$upload_product=$this->upload_file->upload_product('file');

			//$options=json_encode(explode(',', $_POST['option']));
			$size='';//json_encode(explode(',', $_POST['size']));

			if($this->form_validation->run() != False && $upload_product['upload_error']==false){
            /*echo "<pre>";
            print_r($_POST);
             echo "</pre>";
             die();*/
       // $product_add_features_arr=$this->conn->runQuery('*','product_add_features',"status='1' and is_add_feature='1'");

			$morefile=$count = $this->upload_file->upload_multiple('morefile');
				
				$insert=array(
				'p_code' => htmlspecialchars($_POST['product_code']),				
				'name' => htmlspecialchars($_POST['product_name']),				
				'making_charges' => htmlspecialchars($_POST['making_charges']),				
				/* 'mrp' => htmlspecialchars($_POST['product_mrp']),
				'dp' => htmlspecialchars($_POST['product_dp']),*/
				'qty' => htmlspecialchars($_POST['product_qty']), 
				'product_bv' => htmlspecialchars($_POST['bv']), 
				//'p_dese' => htmlspecialchars($_POST['product_about']),
				'other_dese' => $_POST['product_description'],
				'size' => $size,
				//'options' => $options,
				'more_imgs' => $morefile,
				'imgs' => base_url().'images/products/'.$upload_product['file_name'],
				'product_type' => $_POST['product_type'],
			
				//'link' => $_POST['link'],
				
				);
				$get_insert_id=$this->conn->get_insert_id('products',$insert);
				 if($get_insert_id){
						foreach($_POST['product_cat'] as $product_cat){
							$manage_data['type']='product_category';
							$manage_data['post_id']=$get_insert_id;
							$manage_data['param_id']=$product_cat;
							$this->db->insert('manage_data', $manage_data);
						}

                             
                            
                            /* $product_add_features=$_POST['product_add_features'];
                            if(is_array($product_add_features) && !empty($product_add_features)){
                              foreach($product_add_features as $ftr_slug=>$features){
                                if(is_array($features) && !empty($features)){

                                  $manage_data=array();
                                  $manage_data['type']='product_feature';
                                  $manage_data['post_id']=$get_insert_id;
                                  $manage_data['slug']=$ftr_slug;
                                  $manage_data['value']=json_encode($features);
                                  $this->db->insert('manage_data', $manage_data);
                                }
                              }
                            } */
                            
                            
                            /* $add_features_text=$_POST['add_features_text'];
                            if(is_array($add_features_text) && !empty($add_features_text)){
                              foreach($add_features_text as $ftr_key=>$features_text_value){                                  
                                  $manage_data=array();
                                  $manage_data['type']='product_feature';
                                  $manage_data['post_id']=$get_insert_id;
                                  $manage_data['slug']=$ftr_key;
                                  $manage_data['value']=json_encode(explode(',', $features_text_value));
                                  $this->db->insert('manage_data', $manage_data);
                              }
                            }

                            
                            $matel_data['metal_name']='gold';
                            $matel_data['product_id']=$get_insert_id;
                            $matel_data['unit_symbol']='g';
                            $matel_data['metal_weight']=$_POST['gold'];
                            $this->db->insert('product_weight_details', $matel_data);
                            
                            $matel=$_POST['matel'];
                          
                            foreach($matel as $matel_key=>$metal_details){
                                if($metal_details>0){
                                    $matel_data['metal_name']=$matel_key;
                                    $matel_data['product_id']=$get_insert_id;
                                    $matel_data['unit_symbol']='ct';
                                    $matel_data['metal_weight']=$metal_details;
                                    $this->db->insert('product_weight_details', $matel_data);
                                }
                            }
                           */
                        
                        if(isset($_POST['more_detail'])){
                            $more_details=$_POST['more_detail'];
                            
                           
                            if(!empty($more_details)){
                                foreach($more_details as $m_key=>$more_detail){
                                    $m_details_values_arr=$more_detail;
                                   
                                    if(!empty($m_details_values_arr)){
                                        foreach($m_details_values_arr as $v_key=>$details_value){
                                            if($details_value!=''){
                                                $more_d['value']=$details_value;
                                                $more_d['slug']=$v_key;
                                                $more_d['post_id']=$get_insert_id;
                                                $more_d['type']='product_more_detail';
                                                $this->db->insert('manage_data',$more_d);
                                            }
                                        }
                                    }
                                }
                            }
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
          $this->db->delete('manage_data', array('post_id' => $_REQUEST['product']));
          $this->db->delete('product_sizes', array('post_id' => $_REQUEST['product']));
          $this->db->delete('product_weight_details', array('post_id' => $_REQUEST['product']));
          $this->db->delete('product_options', array('post_id' => $_REQUEST['product']));
          $this->db->delete('product_bv', array('post_id' => $_REQUEST['product']));
          $this->db->delete('product_advance_options', array('post_id' => $_REQUEST['product']));
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
						$update['imgs'] = base_url().'images/products/'.$res['file_name'];                
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
             /* $this->form_validation->set_rules('product_mrp', 'Product MRP', 'required');
              $this->form_validation->set_rules('product_dp', 'Product DP', 'required');*/ 
              $this->form_validation->set_rules('product_qty', 'Product Qty', 'required');
              $options=(isset($_POST['option']) ? json_encode(explode(',', $_POST['option'])):'');
              $size=(isset($_POST['size']) ? json_encode(explode(',', $_POST['size'])):'');
         
          if($product_detail->product_type=='affiliate'){
            $this->form_validation->set_rules('link', 'Link', 'required');
          }
          
          if($this->form_validation->run() != False){			
        
                $update['name'] = htmlspecialchars($_POST['product_name']);
           
               /* $update['mrp'] = htmlspecialchars($_POST['product_mrp']);
                $update['dp'] = htmlspecialchars($_POST['product_dp']);*/
                $update['qty'] = htmlspecialchars($_POST['product_qty']);
                $update['size'] = $size;
                $update['options'] = $options;
                $update['product_bv'] = $_POST['bv'];
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
      
      
      
      
      
      ////////// feature functions //////////////
      
      public function features(){
          if(isset($_POST['add_feature_btn'])){
            $this->form_validation->set_rules('feature_name', 'Feature title', 'required');
            $this->form_validation->set_rules('slug', 'slug', 'required');
             if($this->form_validation->run() != False){
                 $feaature['feature_name']=$_POST['feature_name'];
                 $feaature['slug']=$_POST['slug'];
                 $feaature['is_feature_title']=1;
                 $feaature['type']='product';
                 $this->db->insert('features',$feaature);
                  $this->session->set_flashdata("alert_success", "feature addedd Successfully.");
                 redirect($_SERVER['HTTP_REFERER']); 
             }
              
          }
          if(isset($_GET['delete_feature'])){
              $delete_feature=$_GET['delete_feature'];
              $this->db->where('id',$delete_feature);
              $this->db->where('type','product');
              $this->db->delete('features');
          }
          
          
          $this->show->admin_panel('product_features');
      }
      
      public function add_feature(){
            $slug=$_POST['slug'];
            $feature_id=$_POST['feature_id'];
            
            $res['error']=true;
            
            $check=$this->conn->runQuery('*','features',"slug='$slug' and feature_id='$feature_id'");
            if(!$check){
                $feaature['feature_name']=$_POST['feature_name'];
                $feaature['slug']=$slug;
                $feaature['feature_id']=$feature_id;
                $feaature['is_feature_title']=0;
                $feaature['type']='product';
                $this->db->insert('features',$feaature);
                $res['error']=false;
                $res['msg']="Feature added";
            }else{
                $res['msg']="Feature already added";
            }
            print_r(json_encode($res));
      }
      
      
      public function  product_edit(){
          
           $data['product_id']=$product_id=$_REQUEST['id'];
           $this->session->set_userdata('edit_product_id',$product_id);
           $cats=array();
            
            if(isset($_POST['categories'])){
                $cats = $_POST['categories'];
            }
            
            $cats[]='for_all_products';
            $data['implode_cats'] = $implode_cats =  "'".implode("','",$cats)."'";
             
            $this->db->where_in($cats);
            $this->db->order_by('tab_index asc');
            $res= $this->db->get('product_add_tabs');
             if($res->num_rows()>0){
                $all_tabss = $res->result();
            }else{
                 $all_tabss =  false;
            }  
           // print_r($all_tabs);
            $data['all_tabs']=$all_tabss; 
            
            if(isset($_POST['edit_btn'])){
              $this->form_validation->set_rules('product_code', 'Product Code', 'required');
              $this->form_validation->set_rules('product_name', 'Product Name', 'required');
              $upload_product=$this->upload_file->upload_product('file');
              if($this->form_validation->run()){
                $morefile=$count = $this->upload_file->upload_multiple('morefile');
                $json=json_decode($morefile);
                $insert=array();
                if(!empty($json)){
                    $insert['more_imgs']=$morefile;
                }
                
                if($upload_product['upload_error']==false){
                    $insert['imgs']=base_url().'images/products/'.$upload_product['file_name'];
                }
               
               $insert['p_code']=htmlspecialchars($_POST['product_code']);
               $insert['name']=htmlspecialchars($_POST['product_name']);
               $insert['other_dese']=htmlspecialchars($_POST['product_description']);
               $insert['product_type']='product';
               /* $insert=array(
                  'p_code' => ,				
                  'name' => htmlspecialchars($_POST['product_name']),
                  'other_dese' => $_POST['product_description'],
                 // 'more_imgs' => $morefile,
                //  'imgs' => $upload_product['file_name'],
                  'product_type' => 'product',                  
                );*/
               
                $this->db->where('id',$product_id);
                $get_insert_id=$this->db->update('products',$insert);
               
                   
                   /*if($get_insert_id){
                      foreach($_POST['product_cat'] as $product_cat){
                        $manage_data['type']='product_category';
                        $manage_data['post_id']=$get_insert_id;
                        $manage_data['param_id']=$product_cat;
                        $this->db->insert('manage_data', $manage_data);
                      }
                    }*/
                    if(isset($_POST['advance'])){
                        $this->db->where('post_id',$product_id);
                        $this->db->delete('product_offers');
                        $advance=$_POST['advance'];
                        if(!empty($advance)){
                            foreach($advance as $advance_info){
                                if($advance_info['key']!='' && $advance_info['value']!=''){
                                    $insert_advance_options=array();
                                    $insert_advance_options['post_id']=$get_insert_id;
                                    $insert_advance_options['slug']=$advance_info['key'];
                                    $insert_advance_options['value']=$advance_info['value'];
                                    $this->db->insert('product_offers',$insert_advance_options);
                                }
                            }
                        }
                    }
                   
                     
                     $this->session->set_flashdata("alert_success", "Product Edited Successfully.");
                     redirect($this->panel_url.'/product/product_edit','refresh');
              }else{
                 	$data2['upload_error']=($upload_product['upload_error']==true ? $upload_product['display_error'] : '');
					$this->session->set_flashdata("alert_error", "Somthing Wrong! Please try again."); 
              }
            }
            
            
             $this->show->admin_panel('product_edit_new',$data);
            
            
            
    }
      
      
}

