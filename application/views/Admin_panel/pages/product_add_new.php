
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
//echo $this->product->product_rate(21);

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
<form action="" method="POST" enctype="multipart/form-data">
          
    <div class="row">
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
                        <li id="product_cat-15"><label class="selectit"><input value="<?= $seclt_cat_id;?>" class="cat_class" type="checkbox" name="product_cat[]"> <?= $_categorydetails->name;?></label>
                        
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
		
             
            </div>
      <div class="col-lg-8">
         <div class="card bg-light">
           <div class="card-body">
           <div class="card-title">Add Product</div>
           <hr>
		   
          <div id="add_product_area">
              
          </div>
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
    