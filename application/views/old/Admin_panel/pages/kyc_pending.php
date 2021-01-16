<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> <?= $page_name;?> Kyc</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#"> Kyc</a></li>            
            <li class="breadcrumb-item active" aria-current="page">  <?= $page_name;?> </li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> <?= $page_name;?> Kyc</h6>
<hr>
<?php

 $success['param']='success';
$success['alert_class']='alert-success';
$success['type']='success';
$this->show->show_alert($success);

$erroralert['param']='error';
$erroralert['alert_class']='alert-danger';
$erroralert['type']='error';
$this->show->show_alert($erroralert);
if($this->session->has_userdata($search_parameter)){
	$get_data=$this->session->userdata($search_parameter);
	$likecondition = (array_key_exists($search_string,$get_data) ? $get_data[$search_string]:array());
}else{
	$likecondition=array();
}   
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="<?= $admin_path.'withdrawal/pending';?>" method="post">
             <div class="form-inline">
                <div class="form-group">                      
                    <input type="text" Placeholder="Search" name="<?= $search_string;?>[remark]" class="form-control" value='<?= (array_key_exists("remark", $likecondition) ? $likecondition['remark']:'');?>'>                       
                 </div>
                 
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
                 <input type="submit" name="reset" class="btn btn-sm" value="Reset" />
               
            </div>
        </form>
<br>
 <?php
         $ttl_pages=ceil($total_rows/$limit);
         if($ttl_pages>1){
             ?>
              <form action="" method="get">
                <div class="form-group">
                    
                    Go to Page : 
                    <input type="text" list="pages" name="page" value="<?= (isset($_REQUEST['page']) ? $_REQUEST['page']:'');?>" />
                    
                    <datalist id="pages">
                         <?php
                             for($pg=1;$pg<=$ttl_pages;$pg++){
                                 ?><option value="<?= $pg;?>" ><?= $pg;?></option><?php
                             }
                         ?>
                    </datalist>
                    <input type="submit" name="submit" class=" " value="Go" />
                </div>
            </form>
             <?php
         }
        ?>
       
<br>

<div class="modal fade" id="formemodal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Please give reject reason. </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                             <div class="form-group">
                               <label for="input-3">Enter Reason</label>
                               <textarea name="reject_reason" id=""  class="form-control"></textarea>
                             </div>
                            
                             <div class="form-group">
                              <button type="submit" name="reject_btn" class="btn btn-info shadow-info px-5"><i class="icon-lock"></i> Reject All</button>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Tx user</th>
                <th>Bank </th>
                <th>Aadhar</th>
                <th>Pan</th>
              
            </tr>
        </thead>
        <tbody>
        <?php
        if($table_data){
            foreach($table_data as $t_data){   
                $sr_no++;            
                $tx_profile=$this->profile->profile_info($t_data['u_code']);
            ?>
            <tr>
                <td><?= $sr_no;?></td>
                <td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
                <td><?php if($t_data['bank_kyc_status']=='submitted'){ ?><a class="btn btn-sm btn-info" href="<?= $admin_path.'kyc/view?id='.$t_data['id'];?>">View Request</a><?php } ?><?php if($t_data['bank_kyc_status']=='approved'){ ?>Approved<?php } ?><?php if($t_data['bank_kyc_status']=='rejected'){ ?>Rejected<?php } ?><?php if($t_data['bank_kyc_status']=='pending'){ ?>Not Uploaded<?php } ?></td>                               
                <td><?php if($t_data['adhaar_kyc_status']=='submitted'){ ?><a class="btn btn-sm btn-info" href="<?= $admin_path.'kyc/view?id='.$t_data['id'];?>">View Request</a><?php } ?><?php if($t_data['adhaar_kyc_status']=='approved'){ ?>Approved<?php } ?><?php if($t_data['adhaar_kyc_status']=='rejected'){ ?>Rejected<?php } ?><?php if($t_data['adhaar_kyc_status']=='pending'){ ?>Not Uploaded<?php } ?></td>                              
                <td><?php if($t_data['pan_kyc_status']=='submitted'){ ?><a class="btn btn-sm btn-info" href="<?= $admin_path.'kyc/view?id='.$t_data['id'];?>">View Request</a><?php } ?><?php if($t_data['pan_kyc_status']=='approved'){ ?>Approved<?php } ?><?php if($t_data['pan_kyc_status']=='rejected'){ ?>Rejected<?php } ?><?php if($t_data['pan_kyc_status']=='pending'){ ?>Not Uploaded<?php } ?></td>                           
                           
            </tr>
        <?php
            }
        }
        ?>
            
        </tbody>
    </table>
</div>
 

    <?php 
    
    echo $this->pagination->create_links();?>
    </div>
</div>
