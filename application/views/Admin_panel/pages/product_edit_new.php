
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Edit Product</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
         </ol>
	   </div>
	   
     </div>
    <!-- End Breadcrumb-->

<!--End Row-->

<?php 
//echo $this->product->product_rate(21);
  
    $product_details_arr=$this->conn->runQuery('*','products',"id='$product_id'")[0];
    $product_details['product_details']=$product_details_arr;
    
    
    
    $product_advance_options_arr=$this->conn->runQuery('*','product_offers',"post_id='$product_id'");
    $product_details['offers']=$product_advance_options_arr ? array_column($product_advance_options_arr,'value','slug'):false;
    
    
    
    $product_details=json_decode(json_encode($product_details), true);
    
    
    $product_details['product_details']['product_code']=$product_details_arr->p_code;
    $product_details['product_details']['product_name']=$product_details_arr->name;
    $product_details['product_details']['product_description']=$product_details_arr->other_dese;
    
    //echo '<pre>';
   // print_r($product_details);
    
  
    
         $success['param']='alert_success';
         $success['alert_class']='alert-success';
         $success['type']='success';
          $this->show->show_alert($success);
           ?>
             <?php 
         $erroralert['param']='alert_error';
         $erroralert['alert_class']='alert-danger';
         $erroralert['type']='error';
          $this->show->show_alert($erroralert);
          
          
            echo validation_errors();  
             echo '<br>'.(isset($upload_error) ? $upload_error:'');?>

          
    <div class="row">
         
      <div class="col-lg-8">
          <form action="" method="POST" enctype="multipart/form-data">
         <div class="card bg-light">
           <div class="card-body">
           <div class="card-title">Edit Product</div>
           <hr>
		   
          <div id="add_product_area">
              <ul class="nav nav-tabs nav-tabs-primary">
            <?php
            
             
            if($all_tabs){
                $c=0;
                foreach($all_tabs as $tab){
                    $c++;
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($c=='1' ? 'active show':'');?>" data-toggle="tab" href="#<?= $tab->slug;?>">   <span class=""><?= $tab->name;?></span></a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            <?php
                if($all_tabs){
                    $c=0;
                    foreach($all_tabs as $tab){
                        $c++;
                        
                        $tb_slug = $tab->slug;
                         
                        ?>
                        <div id="<?= $tab->slug;?>" class="container <?= ($c=='1' ? 'active show':'');?> tab-pane">
                            <div class="row">
                                <?php
                                    $fields=$this->conn->runQuery('*','product_add_fields',"cat_slug IN ('for_all_products') and tab_slug='$tb_slug' order by field_index asc");
                                    if($fields){
                                        foreach($fields as $field){
                                            $fl_type=$field->type;
                                            $fl_slug=$field->slug;
                                            $field_attr_arr=$this->conn->runQuery('*','product_add_fields_attr',"field_slug='$fl_slug'");
                                            $fl_attr='';
                                            if($field_attr_arr){
                                                foreach($field_attr_arr as $field_attr){
                                                    $fl_attr .= $field_attr->field_attr.'="'.$field_attr->value.'"';
                                                }
                                            }
                                            $field_attr_class=$this->conn->runQuery('*','product_add_fields_classes',"field_slug='$fl_slug'");
                                            $fl_class='';
                                            if($field_attr_class){
                                                foreach($field_attr_class as $field_attr){
                                                    $fl_class .=  " $field_attr->value";
                                                }
                                            }
                                            
                                            if($field->has_options==1){
                                                $options_check=$this->conn->runQuery('*','product_add_options',"tab_slug='$tb_slug' and field_slug='$fl_slug'");

                                            }
                                            
                                            $corr_val='';
                                            
                                            
                                            if(array_key_exists($tb_slug,$product_details)){
                                                $curr_arr=$product_details[$tb_slug];
                                                
                                                $fl_slugchk=$tb_slug=='weight' || $tb_slug=='options' ? substr($fl_slug, 0, -7):$fl_slug;
                                                if(array_key_exists($fl_slugchk,$curr_arr)){
                                                    
                                                    $corr_val=$curr_arr[$fl_slugchk];
                                                }
                                            }
                                            
                                           // echo $fl_slugchk;
                                          //  print_r($corr_val);
                                            ?>
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <?php
                                                    if($fl_type=='text'){
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                            <input <?= $fl_attr;?> name="<?= $field->slug;?>" value="<?= $corr_val;?>" class="form-control <?= $fl_class;?>" Placeholder="<?= $field->admin_display;?>" />
                                                        <?php
                                                    }
                                                    
                                                    if($fl_type=='textarea'){
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                            <textarea <?= $fl_attr;?> name="<?= $field->slug;?>" class="form-control <?= $fl_class;?>" title="<?= $field->admin_display;?>"><?= $corr_val;?></textarea>
                                                        <?php
                                                    }
                                                    
                                                    if($fl_type=='file'){
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                            <input <?= $fl_attr;?> name="<?= $field->slug;?>" type="file" class="form-control <?= $fl_class;?>" Placeholder="<?= $field->admin_display;?>" />
                                                        <?php
                                                    }
                                                    if($fl_type=='multi_file'){
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                            <input <?= $fl_attr;?> name="<?= $field->slug;?>[]" type="file" class="form-control <?= $fl_class;?>" Placeholder="<?= $field->admin_display;?>" multiple />
                                                        <?php
                                                    }

                                                    if($fl_type=='title' && $field->has_options==1){
                                                        
                                                          
                                                        ?>
                                                        <label><?= $field->admin_display;?></label>
                                                        <?php
                                                        if($options_check){
                                                           
                                                            foreach($options_check as $options_val){
                                                                if($options_val->type=='checkbox'){
                                                                    $ftr_key=$options_val->slug;
                                                                    
                                                                    $feature_requirementsvalue=$options_val->admin_name;
                                                                    ?>
                                                                        <label class="">
                                                                            <input type="checkbox" name="<?= $field->slug;?>[<?= $ftr_key;?>]" id="" value="<?= $feature_requirementsvalue;?>" autocomplete="off" <?= is_array($corr_val) && in_array($ftr_key,$corr_val) ? 'checked':'';?> />
                                                                        <?= $feature_requirementsvalue;?>
                                                                        </label>
                                                                        <?php
                                                                }
                                                                
                                                                
                                                              }
                                                        }
                                                    }



                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    
                                    if($tb_slug=='offers'){
                                        $dta['name']='advance';
                                        $dta['placeholder']='Offer Title';
                                        $offr_arr=$this->conn->runQuery('slug as key,value','product_offers',"post_id='$product_id'");
                                        $dta['data']=$offr_arr ? json_decode(json_encode($offr_arr),true):false;
                                        
                                        
                                        $this->load->view('Admin_panel/pages/product_add_advance_options',$dta);
                                    }
                                    
                                    
                                ?>
                                
                                
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
        
          </div>
            
           
         </div>
         </div>
         <div class="form-group">
                  <button type="submit" class="btn btn-dark shadow-dark px-5" name="edit_btn"><i class="icon-lock"></i> Edit Product</button>
              </div> 
              </form>
      </div>
      <div class="col-lg-4">
           <form action="" id="category_form" method="post" >
        <div class="card">
  <div class="card-header">
    Select Categries<br>
    <span id="categories_res"></span>
  </div>
  <div class="card-body" style="height:250px;overflow-y:scroll;">
    
<?php

$product_categories=$this->product->product_categories($product_id);


?>

  <ul id="product_catchecklist" style="list-style:none;" data-wp-lists="list:product_cat" class="categorychecklist form-no-clear">
        <?php
        $all_cats=$this->product->child_categories(null);
        if($all_cats){
          foreach($all_cats as $seclt_cat_id){
            $_categorydetails=$this->product->category_details($seclt_cat_id);
            ?>
            <li id="product_cat-15"><label class="selectit"><input value="<?= $seclt_cat_id;?>" type="checkbox" name="product_cat[]"  <?= ($product_categories && in_array($seclt_cat_id,$product_categories) ? 'checked':'')?> > <?= $_categorydetails->name;?></label>
            
            <?php
            $sball_cats=$this->product->child_categories($seclt_cat_id);
            if($sball_cats){
              ?>
                <ul class="children" style="list-style:none;">
                  <?php
                    foreach($sball_cats as $sectsb_cat_id){
                      $sb_categorydetails=$this->product->category_details($sectsb_cat_id);
                      ?>
                      <li ><label class="selectit"><input value="<?= $sectsb_cat_id;?>" type="checkbox" name="product_cat[]" <?= ($product_categories && in_array($sectsb_cat_id,$product_categories) ? 'checked':'');?> > <?= $sb_categorydetails->name;?></label></li>
                      <?php
                    }
                  ?>
                </ul>
              <?php
            }
            ?>
            </li>
            <?php
          }
        }
        ?>
        
         
    </ul>
    <?php echo form_error('product_cat');?>
  </div>
  <div class="card-foot">
  <br>
<center>
  <button type="submit" class="btn btn-primary btn-sm">Save</button>
</center>
  </br>
  </div>
</div>
</form>
          
          
        <div class="card ">
            <div class="card-header">
                Product image
            </div>
            <div class="card-body">
                <form action="" id="main_image_form" method="post" enctype="">
                    <img id="p_main_image" src="<?= base_url().'images/products/'.$product_details_arr->imgs;?>" style="width:100%;">
                    <!--<div class="form-group">
                    <label class="custom-file">
                    <input type="file" name="pr_image" id="pr_image" placeholder="" class="custom-file-input change_product_image" aria-describedby="fileHelpId">
                    <span class="custom-file-control"><a>Click here to choose another image</a></span>
                    <span id="image_res"></span>
                    </label>                
                    </div> -->             
                </form> 
            </div>
        </div>
      </div>

       
    </div><!--End Row-->

     

<script type="text/javascript">
  $(document).ready(function() {
    $('#code_preview0').summernote();
    
    
    $('#category_form').submit(function (e) { 
      $('#categories_res').html('Please wait...');
      var formData = new FormData(this);
      
      $.ajax({
        type: "post",
        url: "<?php echo $admin_path.'product/change_categories'?>",     
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          var resp = JSON.parse(response);
          if(resp.error==false){
            $('#categories_res').html(resp.msg).css('color','green');
          }else{
            $('#categories_res').html(resp.msg).css('color','red');
          }
        }
      });
      return false;
    });
    
    
    });
</script
    