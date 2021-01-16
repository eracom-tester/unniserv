
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Add Product</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
         </ol>
	   </div>
	  <!-- <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a href="javaScript:void();" class="dropdown-item">Action</a>
          <a href="javaScript:void();" class="dropdown-item">Another action</a>
          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
          <div class="dropdown-divider"></div>
          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
        </div>
      </div>
     </div> -->
     </div>
    <!-- End Breadcrumb-->

<!--End Row-->

<?php 


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
           ?>
<form action="" method="POST" enctype="multipart/form-data">
          
    <div class="row">
      <div class="col-lg-8">
         <div class="card bg-light">
           <div class="card-body">
           <div class="card-title">Add Product</div>
           <hr>
		   
          <div class="row">
            <input type="hidden" name="product_type" value="product" />
            <input type="hidden" name="unit_symbol" value="g" />
            <!-- 
            <div class="col-lg-6">
            <div class="form-group">
              <label for="">Select Product Type</label>
              <select class="custom-select" name="" id="">
                
                <option value="">Simple</option>
                <option value="affiliate">Affiliate</option>
                
              </select>
            </div>
            </div> -->
            <div class="col-lg-6">
                <div class="form-group">
                      <label >Product Code</label>
                      <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('product_code');?>" name="product_code" id="input-11" placeholder="Enter Product Code" required />
                    <?php echo form_error('product_code');?>
                </div>        
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                      <label >Name</label>
                      <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('product_name');?>" name="product_name" id="input-11" placeholder="Enter Your Name" required />
                    <?php echo form_error('product_name');?>
                </div>        
            </div>
            
            <!-- <div class="col-lg-6">
              <div class="form-group">
                    <label for="input-11">Product MRP</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('product_mrp');?>" name="product_mrp" id="" placeholder="Enter MRP" required />
                  <?php echo form_error('product_mrp');?>
              </div>       
            </div>
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label for="input-11">Product DP</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('product_dp');?>" name="product_dp" id="" placeholder="Enter DP" required />
                  <?php echo form_error('product_dp');?>
              </div>           
            </div> -->
            
           
            
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label >Product Quantity</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('product_qty');?>" name="product_qty" id="" placeholder="Enter Qty" required />
                  <?php echo form_error('product_qty');?>
              </div>          
            </div>
            <div class="col-lg-6">
                
              <div class="form-group">
                  <label >Choose Main Image</label>
                  <input type="file" class="form-control input-shadow bg-white"   name="file"  multiple="multiple" />
                  <?php echo (isset($upload_error) ? $upload_error:'');?>
            </div>            
            </div>
            <div class="col-lg-6">
                  <div class="form-group">
                      <label >Choose More Image</label>
                      <input type="file" class="form-control input-shadow bg-white"   name="morefile[]"  multiple="multiple" />
                      <small id="helpId" class="text-muted">Select multiple images</small>
                </div>           
            </div>
             <!--  <div class="col-lg-6">
                  <div class="form-group">
                      <label >Short description</label>
                      <textarea class="form-control" name="product_about" ><?php echo set_value('product_about');?></textarea> 
                      
                </div>           
            </div>
            
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label >Add Options</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('option');?>" name="option" id="" placeholder="Enter Option"  />
                  <?php echo form_error('option');?>
                  <small id="helpId" class="text-muted">Example: 18kt,22kt etc</small>
              </div>          
            </div>
           
           
          <div class="col-lg-6">
              <div class="form-group">
                <label for="input-11">Enter Weight (In grams.)</label>
                <?php
                $get_rates=$this->conn->runQuery('*','live_rates','1=1');
                if($get_rates){
                  foreach($get_rates as $get_rate){
                    ?>
                    <div class="form-inline">
                      <input type="number" class="form-control" name="matel[][<?= $get_rate->metal_name;?>]" placeholder="Total <?= $get_rate->metal_name;?> weight" value="">
                    </div><br>
                    <?php
                  }
                }
                ?>
                <?php echo form_error('matel');?>
              </div>
            </div>-->
             
            <!-- <div class="col-lg-6">                  
              <div class="form-group">
                    <label >Product total weight (In grams)</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('product_total_weight');?>" name="product_total_weight" id="product_total_weight" placeholder="Enter product total weight"  />
                    <?php echo form_error('product_total_weight');?>
              </div>          
            </div>
            
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label >Metal weight (In grams)</label>
                    <input type="text" class="form-control input-shadow bg-white " value="<?php echo set_value('gold_weight');?>" name="gold" id="gold_weight" placeholder="Gold weight" readonly />
                    <?php echo form_error('gold_weight');?>
              </div>          
            </div>
            
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label >Diamond weight (In ct)</label>
                    <input type="text" class="form-control input-shadow bg-white subtr" value="" name="matel[diamond]" id="" placeholder="Enter diamond weight"  />
                    <?php echo form_error('diamond_weight');?>
              </div>          
            </div>
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label >Solitaire weight (In ct)</label>
                    <input type="text" class="form-control input-shadow bg-white subtr" value="" name="matel[solitaire]" id="" placeholder="Enter solitaire weight"  />
                    <?php echo form_error('solitaire_weight');?>
              </div>          
            </div>
            
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label >Color stone weight (In ct)</label>
                    <input type="text" class="form-control input-shadow bg-white subtr" value="" name="matel[color_stone]" id="" placeholder="Enter color stone weight"  />
                    <?php echo form_error('color_stone_weight');?>
              </div>          
            </div>
             -->
             
            

             
            
            <?php
            $get_all_available_features=$this->conn->runQuery('*','product_add_features',"status='1' and is_add_feature='1'");
            $feature_requirements_by_slug=($get_all_available_features ? array_column($get_all_available_features,'feature_requirements','slug'):array());
            $feature_title_by_slug=($get_all_available_features ? array_column($get_all_available_features,'feature_title','slug'):array());
            
            if($get_all_available_features){
              foreach($get_all_available_features as $available_features){
                $val='';
                $ftr_slug=$available_features->slug;
                $feature_requirements=$available_features->feature_requirements;
                
                if($available_features->feature_type=='select' || $available_features->feature_type=='radio'){
                 
                   ?>
                   <div class="col-lg-6">                  
                      <div class="form-group">
                        <label class=" ">
                          <input type="checkbox" class="show_options" data-optionarea="option<?= $ftr_slug;?>" name="" id="" value="<?= $available_features->id;?>" autocomplete="off" checked />
                            <?= $available_features->feature_title;?>
                         </label>
                        
                         <?php
                        if($available_features->feature_requirements!=''){
                          ?>
                          <span style="display:block;" id="option<?= $ftr_slug;?>">
                          <?php
                          
                          $decode_feature_requirements=json_decode($feature_requirements);
                          $features_options=$decode_feature_requirements->option;

                          // print_r($features_options);
                            foreach($features_options as $ftr_key=>$feature_requirementsvalue){
                              
                            ?>
                            <label class="">
                              <input type="checkbox" name="<?= $ftr_slug;?>[<?= $ftr_key;?>]" id="" value="<?= $feature_requirementsvalue;?>" autocomplete="off" checked />
                              <?= $feature_requirementsvalue;?>
                            
                            <?php
                            if(array_key_exists($ftr_key,$feature_requirements_by_slug)){
                                ?>
                                 <input type="text" name="<?= $ftr_key;?>" id="" value="" autocomplete="off" placeholder="<?= $feature_title_by_slug[$ftr_key];?>">
                                
                                <?php
                            }
                            ?>
                            </label>
                            <?php
                            
                          }  
                          ?>
                          </span>
                          <?php
                        }
                     ?>
                      </div>  
                  </div>
                   <?php
                }

                          
                $requirements =  ($feature_requirements!='' ? json_decode($feature_requirements, true):array());
               
                if($available_features->feature_type=='text'){

                  $advance_title=(array_key_exists('advance_title',$requirements) ? $requirements['advance_title']:'' );                  
                  $feature_classes=$available_features->feature_classes;
                   
                  $feature_classes_arr = $feature_classes!='' ? explode(',', $feature_classes):array();
                  $feature_classe = !empty($feature_classes_arr) ? implode(' ',$feature_classes_arr):'';


                  $input_weight_unit=(array_key_exists('input_weight_unit',$requirements) ? $requirements['input_weight_unit']:'' );
                  $weight_calculation_in=(array_key_exists('weight_calculation_in',$requirements) ? $requirements['weight_calculation_in']:'' );
                  $readonly=(in_array('readonly',$requirements) ? 'readonly':'' );

                  ?>
                  <div class="col-lg-6">                  
                    <div class="form-group">
                          <label ><?= $available_features->feature_title;?> <?= $advance_title;?></label>
                          <input type="text" class="form-control input-shadow bg-white <?= $feature_classe;?>" value="" name="<?= $ftr_slug;?>" id="" data-input_weight_unit="<?= $input_weight_unit;?>" data-weight_calculation_in="<?= $weight_calculation_in;?>"  placeholder="Enter <?= $available_features->feature_title;?>" <?= $readonly;?> />
                          <?php
                            if(in_array('comma_separation',$requirements)){
                              ?>
                              <small id="helpId" class="text-muted">use comma separation </small>
                              <?php
                            }
                          ?>
                        
                    </div>          
                  </div>
                  <?php
                }


                ?>               
                 
                <?php
              }
            }

            
            ?>

            <script>
           $('.show_options').change(function (e) { 
              var resarea = $(this).attr('data-optionarea');
              if($(this).is(':checked')){
                $('#'+resarea).css('display','block');
              }else{
                $('#'+resarea).css('display','none');
              }
             
           });
          
           
            $('.subtr,.product_total_weight').change(function()
                {
                    
              
                var sum = 0;
                var total_weight = $('.product_total_weight').val();
                
                $('.subtr').each(function() {
                 if(!isNaN(this.value) && this.value.length!=0) 
                    {   
                       
                        var thsval = parseFloat(this.value,2); 
                        <?= "var gramrate=".$this->unit_convert->convert("ct","gms");?>;
                        sum += gramrate* thsval; 
                          //  alert(sum);
                    }
                });

                var sumingram = sum;
                var calcu = total_weight-sumingram;
                var ttlwght = calcu.toFixed(3);
                $('.gross_weight').val(ttlwght);
            });
            
            
            </script>
            
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label >Product Business volume</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('bv');?>" name="bv" id="" placeholder="Enter Business volume" />
                  <?php echo form_error('bv');?>
              </div>          
            </div>

            <div class="col-lg-6">                  
                <div class="form-group">
                    <label >Making charges</label>
                    <input type="number" class="form-control input-shadow bg-white" value="<?php echo 1000;//(set_value('making_charges') ? set_value('making_charges') :0);?>" name="making_charges" id="" placeholder="Making charges"  readonly />
                    <?php echo form_error('making_charges');?>
                    <small id="" class="text-muted">Example: Metal wight * Making charges </small>
                </div>          
            </div>
            <!--<div class="col-lg-12">                  
              <div class="form-group">
                    <label for="input-11">Link</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('link');?>" name="link" id="" placeholder="Insert link here"  />
                  <?php echo form_error('link');?>
                   
              </div>          
            </div>-->
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="input-11">Product Description</label>
                    <textarea class="form-control" id="code_preview0" name="product_description" style="width: 100%;"><?php echo set_value('product_description');?></textarea>         
                </div>
            </div>
            
            
             <div class="col-lg-12">
          <div id="accordion7">
              <?php
              $get_more_details_titles=$this->conn->runQuery('*','features',"is_feature_title='1' and type='product'");
              if($get_more_details_titles){
                  foreach($get_more_details_titles as $detail_title){
                      $feature_id=$detail_title->id;
                      $features_details=$this->conn->runQuery('*','features',"is_feature_title='0' and type='product' and feature_id='$feature_id'");
                      if($features_details){
                          ?>
                          <div class="card mb-2">
                            <div class="card-header">
                                <a class="btn btn-link text-primary shadow-none" data-toggle="collapse" data-target="#collapse-<?= $detail_title->id;?>" aria-expanded="true" aria-controls="collapse-<?= $detail_title->id;?>">
                                 <i class="fa fa-plus"></i> <?= $detail_title->feature_name;?>
                                </a>
                            </div>
            
                            <div id="collapse-<?= $detail_title->id;?>" class="collapse" data-parent="#accordion7">
                              <div class="card-body">
                                 <?php 
                                 foreach($features_details as $features_detail){
                                     ?>
                                        <div class="form-group">
                                            <label for="input-<?= $features_detail->id;?>"><?= $features_detail->feature_name;?></label>
                                            <input type="text" name="more_detail[<?= $detail_title->slug;?>][<?= $features_detail->slug;?>]" class="form-control" id="input-<?= $features_detail->id;?>" placeholder="Enter <?= $features_detail->feature_name;?>">
                                        </div>
                                     <?php
                                 }
                                 ?>
                              </div>
                            </div>
                          </div>
                          <?php
                      }
                  }
              }
              ?>
              
              
              
              
            </div>
        </div>
            
            





          </div>

           
         </div>
         </div>
      </div>
<div class="col-lg-4">
<div class="card">
  <div class="card-header">
    Select Categries
  </div>
  <div class="card-body">
    
  <ul id="product_catchecklist" style="list-style:none;" data-wp-lists="list:product_cat" class="categorychecklist form-no-clear">
        <?php
        $all_cats=$this->product->child_categories(null);
        if($all_cats){
          foreach($all_cats as $seclt_cat_id){
            $_categorydetails=$this->product->category_details($seclt_cat_id);
            ?>
            <li id="product_cat-15"><label class="selectit"><input value="<?= $seclt_cat_id;?>" type="checkbox" name="product_cat[]"> <?= $_categorydetails->name;?></label>
            
            <?php
            $sball_cats=$this->product->child_categories($seclt_cat_id);
            if($sball_cats){
              ?>
                <ul class="children" style="list-style:none;">
                  <?php
                    foreach($sball_cats as $sectsb_cat_id){
                      $sb_categorydetails=$this->product->category_details($sectsb_cat_id);
                      ?>
                      <li ><label class="selectit"><input value="<?= $sectsb_cat_id;?>" type="checkbox" name="product_cat[]"> <?= $sb_categorydetails->name;?></label>
                      
                      <?php
                      $chsball_cats=$this->product->child_categories($sectsb_cat_id);
                      if($chsball_cats){
                        ?>
                          <ul class="children" style="list-style:none;">
                            <?php
                              foreach($chsball_cats as $chsectsb_cat_id){
                                $chsb_categorydetails=$this->product->category_details($chsectsb_cat_id);
                                ?>
                                <li ><label class="selectit"><input value="<?= $chsectsb_cat_id;?>" type="checkbox" name="product_cat[]"> <?= $chsb_categorydetails->name;?></label>
                                
                                </li>
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
   
</div>
		
<div class="form-group">
                      <button type="submit" class="btn btn-dark shadow-dark px-5" name="cat_btn"><i class="icon-lock"></i> Add Product</button>
                  </div>  
</div>
       
    </div><!--End Row-->

    </form>

<script type="text/javascript">
  $(document).ready(function() {
    $('#code_preview0').summernote();
    });
</script
    