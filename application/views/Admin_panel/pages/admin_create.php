<div class="row pt-2 pb-2">
        <div class="col-sm-12">

		    <h4 class="page-title">   Submin </h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Submin</a></li>
            
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
          Add Subadmin
        </div>
        <div class="card-body">
       
            
            <form action="" method="POST">
            
            <div class="form-group">
             <label for="input-11">Username</label>
             <input type="text" class="form-control input-shadow bg-white" value="<?php echo set_value('username');?>" name="username" id="input-11" placeholder="Enter Your Username" required />
            <?php echo form_error('username');?>
            </div>
            <div class="form-group">
             <label for="input-11">Password</label>
             <input type="password" class="form-control input-shadow bg-white" value="<?php echo set_value('password');?>" name="password" id="input-11" placeholder="Enter Password" required />
            <?php echo form_error('password');?>
            </div>
            
             
            <div class="form-group">
             <button type="submit" class="btn btn-dark shadow-dark px-5" name="admin_btn"><i class="icon-lock"></i> Add Subadmin</button>
           </div>
           </form>
        </div>
    </div>
    <div class="col-md-8 card bg-light">
          
           <div class="card-body">
  
 
    <table class="table">
        <tr>
            <th>#  </th>
            <th>Name   </th>
             
            <th>Action</th>
        </tr>
        <?php
        $all_subadmin=$this->conn->runQuery('*','admin',"type='subadmin'");
        if($all_subadmin){
            $sno=0;
            foreach($all_subadmin as $subadmin){
                $sno++;
                ?>
                <tr>
                    <td><?= $sno;?>  </td>
                    <td><?= $subadmin->user;?>   </td>
                    <td><a href="<?= $admin_path.'admin/delete_admin?id='.$subadmin->id;?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
        </div>
        
        </div>
    
 <div class="col-md-10 card bg-light">
     <br>
          <center><h5>Give Rights Of Sub Admin</h5></center>
           <div class="card-body">
  
 <form action="<?= $admin_path.'admin/action_multiple';?>" method="post">
      <div class="form-group">
    <label for="email">username:</label>
    
    <input type="text" name="subadmin_name" class="form-control" requried>     
  
  </div>


<br>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>#  </th>
            	<th>
                    <input type="checkbox" id="selectAll" />
                </th>
                 <th>Heading</th>
            <th>Tital   </th>
             
            <th>Path</th>
        </tr>
        <?php
        $all_heading=$this->conn->runQuery('*','subadmin_rights',"1='1' order by heading asc");
        if($all_heading){
            $sno=0;
            foreach($all_heading as $all_heading1){
                $sno++;
                ?>
                <tr>
                    <td><?= $sno;?>  </td>
                     <td>
                    <input type="checkbox" name="wd_ids[]" id="<?= $sr_no;?>" value="<?= $all_heading1->path;?>" />
                </td>
                <td><?= $all_heading1->heading;?>   </td>
                    <td><?= $all_heading1->title;?>   </td>
                    <td><?= $all_heading1->path;?> </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    </div>
    <center>
    <input type="submit" class="btn btn-info btn-sm" name="add_btn" value="Approve" />
    </center>
    </form>
        </div>
        
        </div>
     
        
       
    </div><!--End Row-->

