 <div class="row pt-2 pb-2">
        <div class="col-sm-12">

		    <h4 class="page-title"> Edit  Category</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $admin_path.'product/categories'?>">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit  <?= $this->product->category_details($category_id)->name;?></li>
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

    <div class="row">
   
    <div class="col-md-4 card bg-light">

        <div class="card-header">
          Edit Category 
        </div>
        <div class="card-body">
       
            <?php
            $category_details =  $this->product->category_details($category_id);
            
            ?>
             <form action="" method="POST">
           
                       
  <div class="form-group">
   <label for="input-11">Select Category</label>
   <select name="sup_cat" class="form-control" value="<?php echo set_value('sup_cat');?>" >
   <option value="">-- Select Category --</option>
   <?php
   $prm['selected']=$category_details->parent_id;
   $prm['category_id']=$category_details->id;
        echo $categoriess=$this->product->category_options(null,$prm);
   ?>
   </select>
    <?php echo form_error('sup_cat');?>
  </div>
 
           <div class="form-group">
             <label for="input-11">Name</label>
             <input type="text" class="form-control input-shadow bg-white" value="<?= $category_details->name;?>" name="cat_name" id="input-11" placeholder="Enter Your Name" required />
            <?php echo form_error('cat_name');?>
            </div>
            
             
            <div class="form-group">
             <button type="submit" class="btn btn-dark shadow-dark px-5" name="cat_btn"><i class="icon-lock"></i> Save</button>
           </div>
           </form>
        </div>
    </div>
     
    

     
        
       
    </div><!--End Row-->

