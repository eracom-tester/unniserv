<?php
        $sliders=$this->conn->runQuery('*','home_sliders',"id='$b_id'");
         
        ?>
        
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
    		    <h4 class="page-title"> Banners</h4>
    		    <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
                <li class="breadcrumb-item"><a href="#">Banners</a></li>            
                 
             </ol>
    	   </div>
    	   <div class="col-sm-3">
           
         </div>
    </div>
    <h6 class="text-uppercase"> Banners</h6>
    <hr>
    <?php 
                        $success['param']='success';
                        $success['alert_class']='alert-success';
                        $success['type']='success';
                        $this->show->show_alert($success);
                        ?>
    
 <form action="<?= $admin_path.'home/change_banner?id='.$b_id;?>" method="post" enctype="multipart/form-data" >
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <img style="width:100%;" src="<?= $sliders[0]->img;?>" />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="desc_sl" value="<?= $sliders[0]->sl_desc;?>">
            </div>
            <div class="form-group">
                <label>Img</label>
                <input type="file" class="form-control" name="new_file" />
            </div>
            <button type="submit" name="update_btn" class="btn btn-info btn-sm">Update</button>
        </div>
    </div>
     
 </form>
    