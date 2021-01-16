 <?php
$product_detail=$this->product->product_detail($product_id);
?>
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Edit Product</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $product_detail->name;?></li>
         </ol>
	   </div>
       <div class="col-sm-3">
                    <div class="btn-group float-sm-right">
                        <a onclick="return confirm('Are you Sure? You want to delete this Product!');" href="<?= $admin_path.'product/delete?product='.$product_detail->id;?>" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-trash-o"></i> Delete</a>
                        
                    </div>
                </div>
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

          
    <div class="row">
      <div class="col-lg-8">
      <form action="" method="POST" enctype="multipart/form-data">
         <div class="card bg-light">
           <div class="card-body">
           <div class="card-title">Edit Product 
           <a class="btn btn-outline-primary waves-effect waves-light" href="<?= $admin_path.'product/add_product';?>">Add New </a>
           </div>
           <hr>
		   
          <div class="row">
             
            
            <div class="col-lg-6">
            <div class="form-group">
                  <label for="input-11">Name</label>
                  <input type="text" class="form-control input-shadow bg-white" value="<?= $product_detail->name;?>" name="product_name" id="input-11" placeholder="Enter Your Name" required />
                <?php echo form_error('product_name');?>
            </div>        
            </div>
            <!--
            <div class="col-lg-6">
              <div class="form-group">
                    <label for="input-11">Product MRP</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?= $product_detail->mrp;?>" name="product_mrp" id="" placeholder="Enter MRP" required />
                  <?php echo form_error('product_mrp');?>
              </div>       
            </div>
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label for="input-11">Product DP</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?= $product_detail->dp;?>" name="product_dp" id="" placeholder="Enter DP" required />
                  <?php echo form_error('product_dp');?>
              </div>           
            </div>  -->
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label for="input-11">Product Quantity</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?= $product_detail->qty;?>" name="product_qty" id="" placeholder="Enter Qty" required />
                  <?php echo form_error('product_qty');?>
              </div>          
            </div>
          
            
            <div class="col-lg-6">                  
              <div class="form-group">
              <?php
              $options=$product_detail->options;
              $input_options=($options!='' ? implode(',',json_decode($options)) : '');
              ?>
                    <label for="input-11">Add Options</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?= $input_options;?>" name="option" id="" placeholder="Enter Option"  />
                  <?php echo form_error('option');?>
                  <small id="helpId" class="text-muted">Example: 18kt,22kt etc</small>
              </div>          
            </div>


            <div class="col-lg-6">                  
              <div class="form-group">
              <?php
              $sizes=$product_detail->size;
              $input_sizes=($sizes!='' ? implode(',',json_decode($sizes)) : '');
              ?>
                    <label for="input-11">Add Size</label>
                    <input type="text" class="form-control input-shadow bg-white" value="<?= $input_sizes;?>" name="size" id="" placeholder="Enter Size" />
                  <?php echo form_error('size');?>
                  <small id="helpId" class="text-muted">Example: 1,2,3 etc</small>
              </div>          
            </div>
            <div class="col-lg-6">                  
              <div class="form-group">
                    <label for="input-11">Business volume</label>
                    <input type="number" class="form-control input-shadow bg-white" value="<?= $product_detail->product_bv;?>" name="bv" id="" placeholder="Business volume"  />
                  <?php echo form_error('bv');?>
                   
              </div>          
            </div>
            
                 <div class="col-lg-12">                  
                    <div class="form-group">
                          <label for="input-11">Link*</label>
                          <input type="text" class="form-control input-shadow bg-white" value="<?= $product_detail->link;?>" name="link" id="" placeholder="Insert link here" required />
                        <?php echo form_error('link');?>
                        
                    </div>          
                  </div>
                 
            <div class="col-lg-6">
                  <div class="form-group">
                      <label for="input-11">About Product</label>
                      <textarea class="form-control" name="product_about" ><?= $product_detail->p_dese;?></textarea> 
                      
                </div>           
            </div>
            <div class="col-lg-12">
            <div class="form-group">
            <label for="input-11">Product Description</label>
              <textarea class="form-control" id="code_preview0" name="product_description" style="width: 100%;"><?= $product_detail->other_dese;?></textarea>         
            </div>
            </div>
          </div>

            <div class="form-group">
                      <button type="submit" class="btn btn-dark shadow-dark px-5" name="edit_btn"><i class="icon-lock"></i> Save </button>
                  </div>  
         </div>
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
        
       
              <img id="p_main_image" src="<?= $product_detail->imgs;?>" style="width:100%;">            

              <div class="form-group">
                <label class="custom-file">
                  <input type="file" name="pr_image" id="pr_image" placeholder="" class="custom-file-input change_product_image" aria-describedby="fileHelpId">
                  <span class="custom-file-control"><a>Click here to choose another image</a></span>
                  <span id="image_res"></span>
                </label>                
              </div>              
        </form> 
        </div>
        </div>


      </div>
       
    </div><!--End Row-->

   
<script type="text/javascript">
  $(document).ready(function() {
    $('#code_preview0').summernote();

    $('.change_product_image').on('change', function() {
      $('#image_res').html('Please wait...');
      $('#main_image_form').submit();

		    return false;
		}); 

    $('#main_image_form').submit(function (e) {     	  
		    var formData = new FormData(this);
		    //alert(formData);
       
			$.ajax({
				url : "<?php echo $admin_path.'product/add_product_main_image'?>",
				method : 'POST',
				data : formData,
                contentType: false,
                processData: false,
				success : function(res){
                  var resp = JSON.parse(res);
                  if(resp.upload_error==false){
                    $('#image_res').html(resp.msg).css('color','green');
                    $('#p_main_image'). attr("src", "<?= base_url().'images/products/'?>"+resp.file_name+"");
                   // location.reload();
                  }else{
                    $('#image_res').html(resp.msg).css('color','red');
                  }
					//alert(res);
				  //	$('#'+pr_id).html(res);
					//location.reload();
				}
			}); 
      return false;
    });

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



</script>