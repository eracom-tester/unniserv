<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Rank</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">home</a></li>            
            <li class="breadcrumb-item"><a href="<?= $admin_path.'Package';?>">Rank</a></li>            
            <li class="breadcrumb-item active" aria-current="page">Make Rank</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase">Make Rank </h6>
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
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card card-body">
        <form action="" method="post">
 

            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="tx_username" value="<?= set_value('tx_username');?>" data-response="username_res" class="form-control check_username_exist"  placeholder="Enter Username" aria-describedby="helpId"> 
              <span class=" " id="username_res"><?= form_error('tx_username');?></span>             
            </div>
            <div class="form-group">
                <label for="">Select Rank</label>               
                <select class="form-control" name="selected_pin" id="" required>
                <option value="">Select Pin</option>
                <?php
                $all_pin=$this->conn->runQuery("*",'plan',"1=1");
                if($all_pin){
                    foreach($all_pin as $pindetails){
                        ?><option value="<?= $pindetails->id;?>"><?= $pindetails->rank;?></option><?php
                    }
                }
                ?>
                </select>
                <span class=" " ><?= form_error('selected_pin');?></span>  
            </div>
            <button type="submit" class="btn btn-primary" name="make_rank_btn"  onclick="return confirm('Are you sure? you wants to Submit.')">Make Rank</button>
        </form>
    </div>
    </div>
</div>
