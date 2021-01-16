<?php
$withdrawal_details=$this->conn->runQuery('*','support',"id='$support_id' and reply_status=0 ");
if(!$withdrawal_details){
    redirect($admin_path.'support/pending');
}
$t_data=$withdrawal_details[0];
?>
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Support</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Support</a></li>            
            <li class="breadcrumb-item active" aria-current="page"> View </li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Message Detail</h6>
<hr>
<div class="alert alert-success  "  role="alert"> <div class="alert-message"><?= $t_data->message;?></div></div>
<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <form action="" method="post">
            <div class="form-group">
              <label for="">Reply</label>
              <textarea name="reply" id="" class="form-control"></textarea>
              <small class="text-muted"><?= form_error('reply');?></small>
            </div>
            <div class="form-group">  
        <button type="submit" name="reply_btn" class="btn btn-success">Reply</button>
        
            </div>
    </form>
    </div>
</div>
