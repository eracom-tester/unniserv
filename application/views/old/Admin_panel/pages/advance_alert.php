<div class="row pt-2 pb-2">
        <div class="col-sm-12">

		    <h4 class="page-title">   Advance</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Advance</a></li>
            <li class="breadcrumb-item active" aria-current="page">   Alert</li>
         </ol>
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
   
    <div class="col-md-4 card bg-light">

        <div class="card-header">
          Add Alert 
        </div>
        <div class="card-body">
       
            
             <form action="<?= $admin_path.'advance/add-alert';?>" method="POST" enctype= "multipart/form-data" >
                
                       
                <div class="form-group">
            	  <label for="">Select Alert type</label>
            	  <select class="form-control" name="alert_type" id="alert_type">
            		 
            		<option value="popup">Image and Text </option>
            		<option value="marquee">One Line</option>
            		
            	  </select>
            	</div>
     
               <div class="form-group">
                     <label for="input-11">Title</label>
                     <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('title');?>" name="title" id="title" placeholder="Enter Title here"  />
                    <?php echo form_error('title');?>
                </div>
                <div class="form-group">
                     <label for="input-11">Description</label>
                     <textarea  name="description" id="description" class="form-control" placeholder="Enter description here" ><?php echo set_value('description');?></textarea>
                      
                    <?php echo form_error('description');?>
                </div>
                <div class="form-group" id="file">
                     <label for="input-11">Image</label>
                     <input type="file" class="form-control input-shadow bg-white" name="file" placeholder=""  />
                     <?php echo (isset($upload_error) ? $upload_error:'');?>
                </div>
                 
                <div class="form-group">
                 <button type="submit" class="btn btn-dark shadow-dark px-5" name="alert_btn"><i class="icon-lock"></i> Add Alert</button>
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
                
                   <input type="text" Placeholder="Search" name="<?= $search_string;?>[description]" class="form-control" value='<?= (array_key_exists("description", $likecondition) ? $likecondition['description']:'');?>'> 
                </div>
                <div class="form-group" style="padding: 2px;">
                  <input type="submit" name="submit" class="btn" value="search"> 
                </div>
             </div>
              
              
            </form>
            <div class="table-responsive">
    <table class="table">
          <tr>
            <th>#  </th>
            <th>Title   </th>
            <th>Description   </th>
            <th>Image   </th>
            <th>Status   </th>
            <th>Action   </th>
          </tr>
          <?php


          if(!empty($table_data)){
           $sr_no=0;
            foreach($table_data as $t_data){
                $sr_no++;
                ?>
                <tr>
                    <td><?= $sr_no;?></td>
                    <td><?= $t_data['title'];?></td>
                    <td><?= $t_data['description'];?></td>
                    <td><img src="<?= $t_data['img_path'];?>" style="height:80px;" /></td>
                   <td><?= $t_data['status']==1 ? "Enabled" : 'Disabled';?></td>
                    <td> 
                    <a  onclick="return confirm('Are you Sure? You want to delete this Alert!');"  href="<?= $admin_path.'advance/delete?alert='.$t_data['id'];?>"><i class="fa fa-trash-o    "></i></a>
                    </td>
                   
                </tr>
                <?php
            }
          }
          ?>
         
    </table>
        </div>
        </div>
        <?php  echo $this->pagination->create_links();?>
        </div>
    
    <script>
        $("#alert_type").change(function(){
           
            var seleted_value = $(this).children('option:selected').attr('value'); 
            if(seleted_value=="popup"){
                $('#file').css('display','block');
            }else{
                $('#file').css('display','none');
            }
        });
    </script>
     
        
       
    </div><!--End Row-->

