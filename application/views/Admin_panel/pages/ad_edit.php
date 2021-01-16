 
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">{title} </h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">home</a></li>            
                        
            <li class="breadcrumb-item active" aria-current="page">{title}</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">{title}</h6>
<hr>
<?php 


            $success['param']='success';
            $success['alert_class']='alert-success';
            $success['type']='success';
            $this->show->show_alert($success);
            ?>
                <?php 
            $erroralert['param']='error';
            $erroralert['alert_class']='alert-danger';
            $erroralert['type']='error';
            $this->show->show_alert($erroralert);
                        
                         
                        
                    ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card card-body">
        <form action="<?= $admin_path;?>ad/{edit_page}?id={edit_id}" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" name="title" value="<?= $data[0]->title;?>"  class="form-control"  placeholder="Enter title" aria-describedby="helpId"> 
              <span class=" " id="title"><?= form_error('title');?></span>             
            </div>
            <div class="form-group">
                <label for="">Img</label>
                <input type="file" name="file" class="form-control" aria-describedby="helpId"> 
              <span class=" " id="file_error"><?= form_error('file_error');?></span>  
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea id="ad_txt" name="desc">
                    <?= $data[0]->description;?>
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="add_btn" >Save</button>
        </form>
    </div>
    </div>
</div>