<div class="row pt-2 pb-2">
        <div class="col-sm-12">

		    <h4 class="page-title">   Category</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">   Categories</li>
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
          Add More Category 
        </div>
        <div class="card-body">
       
            
             <form action="<?= $admin_path.'product/add-category';?>" method="POST">
           
                       
  <div class="form-group">
   <label for="input-11">Select Category</label>
   <select name="sup_cat" class="form-control" value="<?php echo set_value('sup_cat');?>" >
   <option value="">-- Select Category --</option>
   <?php
 echo $categoriess=$this->product->category_options(null);
   ?>
   </select>
    <?php echo form_error('sup_cat');?>
  </div>
 
           <div class="form-group">
             <label for="input-11">Name</label>
             <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('cat_name');?>" name="cat_name" id="input-11" placeholder="Enter Your Name" required />
            <?php echo form_error('cat_name');?>
            </div>
            
             
            <div class="form-group">
             <button type="submit" class="btn btn-dark shadow-dark px-5" name="cat_btn"><i class="icon-lock"></i> Add Category</button>
           </div>
           </form>
        </div>
    </div>
    <div class="col-md-8 card bg-light">
          
           <div class="card-body">
  

             <?php

             $likecondition=($this->session->userdata($search_string) ? $this->session->userdata($search_string):array());
             ?>
             <form action="" method="post">
             <div class="form-inline" >
                <div class="form-group" style="padding: 2px;">
                
                   <input type="text" Placeholder="Search" name="<?= $search_string;?>[name]" class="form-control" value='<?= (array_key_exists("name", $likecondition) ? $likecondition['name']:'');?>'> 
                </div>
                <div class="form-group" style="padding: 2px;">
                  <input type="submit" name="submit" class="btn" value="search"> 
                </div>
             </div>
              
              
            </form>
    <table class="table">
          <tr>
            <th>#  </th>
            <th>Name   </th>
            <th>Parent Category   </th>
            <th>Action   </th>
          </tr>
          <?php


          if(!empty($table_data)){
           
            foreach($table_data as $t_data){
                ?>
                <tr>
                    <td>#<?= $t_data['id'];?></td>
                    <td><?= $t_data['name'];?></td>
                    <td><?= ($t_data['parent_id']!=null ? $this->product->category_details($t_data['parent_id'])->name :'');?></td>
                    <td><a href="<?= $admin_path.'product/edit-category?id='.$t_data['id'];?>"><i class="fa fa-edit    "></i></a>
                    <a  onclick="return confirm('Are you Sure? You want to delete this Category!');"  href="<?= $admin_path.'product/delete?category='.$t_data['id'];?>"><i class="fa fa-trash-o    "></i></a>
                    </td>
                   
                </tr>
                <?php
            }
          }
          ?>
         
    </table>
        </div>
        <?php  echo $this->pagination->create_links();?>
        </div>
    

     
        
       
    </div><!--End Row-->

