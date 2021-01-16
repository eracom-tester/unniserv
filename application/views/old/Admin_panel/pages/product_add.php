
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
            
            
            <div class="col-lg-6">
            <div class="form-group">
              <label for="">Select Product Type</label>
              <select class="custom-select" name="product_type" id="">
                
                <option value="product">Simple</option>
                <option value="affiliate">Affiliate</option>
                
              </select>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="form-group">
                  <label for="input-11">Name</label>
                  <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('product_name');?>" name="product_name" id="input-11" placeholder="Enter Your Name" required />
                <?php echo form_error('product_name');?>
            </div>        
            </div>
            <div class="col-lg-6">
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
            </div>
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label for="input-11">Product Quantity</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('product_qty');?>" name="product_qty" id="" placeholder="Enter Qty" required />
                  <?php echo form_error('product_qty');?>
              </div>          
            </div>
            <div class="col-lg-6">
                
              <div class="form-group">
                  <label for="input-11">Choose Main Image</label>
                  <input type="file" class="form-control input-shadow bg-white"   name="file"  multiple="multiple" />
                  <?php echo (isset($upload_error) ? $upload_error:'');?>
            </div>            
            </div>
            <div class="col-lg-6">
                  <div class="form-group">
                      <label for="input-11">Choose More Image</label>
                      <input type="file" class="form-control input-shadow bg-white"   name="morefile[]"  multiple="multiple" />
                      <small id="helpId" class="text-muted">Select multiple images</small>
                </div>           
            </div>
             <div class="col-lg-6">
                  <div class="form-group">
                      <label for="input-11">About Product</label>
                      <textarea class="form-control" name="product_about" ><?php echo set_value('product_about');?></textarea> 
                      
                </div>           
            </div>
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label for="input-11">Add Options</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('option');?>" name="option" id="" placeholder="Enter Option"  />
                  <?php echo form_error('option');?>
                  <small id="helpId" class="text-muted">Example: Red,Blue,Green etc</small>
              </div>          
            </div>
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label for="input-11">Add Size</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('size');?>" name="size" id="" placeholder="Enter Size"  />
                  <?php echo form_error('size');?>
                  <small id="helpId" class="text-muted">Example: S,M,L,XL,1,2,3 etc </small>
              </div>          
            </div>
            <div class="col-lg-12">                  
              <div class="form-group">
                    <label for="input-11">Link</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('link');?>" name="link" id="" placeholder="Insert link here" required />
                  <?php echo form_error('link');?>
                   
              </div>          
            </div>
            <div class="col-lg-12">
            <div class="form-group">
            <label for="input-11">Product Description</label>
              <textarea class="form-control" id="code_preview0" name="product_description" style="width: 100%;"><?php echo set_value('product_description');?></textarea>         
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
    