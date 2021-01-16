<?php
$withdrawal_details=$this->conn->runQuery('*','user_accounts',"id='$wd_id'");
if(!$withdrawal_details){
    redirect($admin_path.'withdrawal/pending');
}
$t_data=$withdrawal_details[0];
?>
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">  KYC Details </h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#"> Kyc</a></li>            
            <li class="breadcrumb-item"><a href="#"> View</a></li>            
            <li class="breadcrumb-item active" aria-current="page">  Kyc Detail </li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Bank Detail</h6>
<hr>

<div class="row">
    <?php if($t_data->bank_kyc_status!="pending"){?>
    
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
       

<div class="table-responsive">
<table class="table table-hover">
        <?php
          $tx_profile=$this->profile->profile_info($t_data->u_code);
          //$bank_details=json_decode($t_data->bank_details); 
        ?>
            <tr>               
                <th> User</th><td>:</td><td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
            </tr>
            
            <tr> 
                <th>Bank Name</th><td>:</td><td><?= $t_data->bank_name;?></td>
                </tr>
            <tr>
                <th>A/c Holder Name</th><td>:</td><td><?= $t_data->account_holder_name;?></td> 
                </tr>
            <tr>
                <th>A/c No.</th><td>:</td><td><?= $t_data->account_no;?></td> 
                </tr>
            <tr>
                <th>IFSC</th><td>:</td><td><?= $t_data->ifsc_code;?></td> 
                </tr>
            <tr>
                <th>Branch</th><td>:</td><td><?= $t_data->bank_branch;?></td>
                </tr>
            
            <tr>
                <th>Status </th><td>:</td><td><span class="badge badge-warning badge-sm"><?= $t_data->bank_kyc_status;?></span></td> 
                </tr>
            <tr>
                <th>Date </th><td>:</td><td><?= $t_data->bank_kyc_date;?></td>  
                 
            </tr>
    </table>
    
</div>



   
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <a href="<?= $t_data->adhaar_image;?>" target="_blank">
        <img src="<?= $t_data->adhaar_image;?>" style="height:300px;width:300px">
        </a>
        <br>
        <?php if($t_data->bank_kyc_status=='submitted'){?>
        <form action="" method="post">
            <div class="form-group">
              <label for="">Reason (Give Reason on cancellation)</label>
              <textarea name="reason" id="" class="form-control"></textarea>
              <small class="text-muted"><?= form_error('reason');?></small>
            </div>
            <input type="hidden" value="bank" name="tx_type">
            <div class="form-group">  
        <button type="submit" name="approve_btn" class="btn btn-success">Approve</button>
        <button type="submit" name="cancel_btn" class="btn btn-danger">Cancel</button>
            </div>
        </form>
        <?php }else if($t_data->bank_kyc_status=='approved'){
            echo "<br>";    
            echo '<h3 style="color:green">Kyc Approved</h3>';
        }elseif($t_data->bank_kyc_status=='rejected'){
            echo "<br>";  
            echo '<h3 style="color:red"><center>Kyc rejected</center></h3>';
            echo "<br>";
            echo '<h4 style="color:red">Reason</h4>'.$t_data->bank_remark;
        } ?>
    </div>
   <?php   }else{
       echo "<br>";
         echo "<br>";
      echo '<center><h5>Not Upload Yet</h5></center>';
     echo "<br>";
         echo "<br>";
    }?>
</div>
<h6 class="text-uppercase">Pan Kyc Detail</h6>
<hr>
<div class="row">
     <?php if($t_data->pan_kyc_status!="pending"){?>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
<div class="table-responsive">
    <table class="table table-hover">
        <?php
          $tx_profile=$this->profile->profile_info($t_data->u_code);
          //$bank_details=json_decode($t_data->bank_details); 
        ?>
            <tr>               
                <th> User</th><td>:</td><td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
            </tr>
            
            <tr> 
                <th>Pan Number</th><td>:</td><td><?= $t_data->pan_no;?></td>
                </tr>
            <tr>
                <th>Pan Name</th><td>:</td><td><?= $t_data->pan_name;?></td> 
                </tr>
            <tr>
                <th>Status </th><td>:</td><td><span class="badge badge-warning badge-sm"><?= $t_data->pan_kyc_status;?></span></td> 
                </tr>
            <tr>
                <th>Date </th><td>:</td><td><?= $t_data->pan_kyc_date;?></td> 
            </tr>
    </table>
    
</div>



   
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <a href="<?= $t_data->pan_image;?>" target="_blank">
        <img src="<?= $t_data->pan_image;?>" style="height:300px;width:300px">
        </a>
        <?php if($t_data->pan_kyc_status=='submitted'){?>
        <form action="" method="post">
            <div class="form-group">
              <label for="">Reason (Give Reason on cancellation)</label>
              <textarea name="reason" id="" class="form-control"></textarea>
              <small class="text-muted"><?= form_error('reason');?></small>
            </div>
             <input type="hidden" value="pan" name="tx_type">
            <div class="form-group">  
        <button type="submit" name="approve_btn" class="btn btn-success">Approve</button>
        <button type="submit" name="cancel_btn" class="btn btn-danger">Cancel</button>
            </div>
        </form>
        <?php }else if($t_data->pan_kyc_status=='approved'){
          echo '<h3 style="color:green">Kyc Approved</h3>';
       
        }elseif($t_data->pan_kyc_status=='rejected'){
            echo "<br>";  
            echo '<h3 style="color:red">Kyc rejected</h3>';
            echo "<br>";
            echo '<h4 style="color:red">Reason</h4>'.$t_data->pan_remark;
        }
        ?>
    </div>
     <?php   }else{
       echo "<br>";
         echo "<br>";
      echo '<center><h5>Not Upload Yet</h5></center>';
     echo "<br>";
         echo "<br>";
    }?>
</div>
<h6 class="text-uppercase">Adhaar Kyc Detail</h6>
<hr>
<div class="row">
     <?php if($t_data->adhaar_kyc_status!="pending"){?>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
<div class="table-responsive">
    <table class="table table-hover">
        <?php
          $tx_profile=$this->profile->profile_info($t_data->u_code);
          //$bank_details=json_decode($t_data->bank_details); 
        ?>
            <tr>               
                <th> User</th><td>:</td><td><?= $tx_profile->name.'( '.$tx_profile->username.' )';?></td>
            </tr>
            
            <tr> 
                <th>Adhaar Name</th><td>:</td><td><?= $t_data->adhaar_name;?></td>
                </tr>
            <tr>
                <th>Adhaar Number</th><td>:</td><td><?= $t_data->adhaar_no;?></td> 
                </tr>
            <tr>
                <th>Status </th><td>:</td><td><span class="badge badge-warning badge-sm"><?= $t_data->adhaar_kyc_status;?></span></td> 
                </tr>
            <tr>
                <th>Date </th><td>:</td><td><?= $t_data->adhaar_kyc_date;?></td> 
            </tr>
    </table>
    
</div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <a href="<?= $t_data->adhaar_image;?>" target="_blank">
        <img src="<?= $t_data->adhaar_image;?>" style="height:300px;width:300px">
        </a>
        <?php if($t_data->adhaar_kyc_status=='submitted'){?>
        <form action="" method="post">
            <div class="form-group">
              <label for="">Reason (Give Reason on cancellation)</label>
              <textarea name="reason" id="" class="form-control"></textarea>
              <small class="text-muted"><?= form_error('reason');?></small>
            </div>
             <input type="hidden" value="adhaar" name="tx_type">
            <div class="form-group">  
        <button type="submit" name="approve_btn" class="btn btn-success">Approve</button>
        <button type="submit" name="cancel_btn" class="btn btn-danger">Cancel</button>
            </div>
        </form>
        <?php }else if($t_data->adhaar_kyc_status=='approved'){
          echo '<h3 style="color:green">Kyc Approved</h3>';
       
        }elseif($t_data->adhaar_kyc_status=='rejected'){
            echo "<br>";  
            echo '<h3 style="color:red">Kyc rejected</h3>';
            echo "<br>";
            echo '<h4 style="color:red">Reason</h4>'.$t_data->adhaar_remark;
        }
        ?>
    </div>
     <?php   }else{
       echo "<br>";
         echo "<br>";
      echo '<center><h5>Not Upload Yet</h5></center>';
     echo "<br>";
         echo "<br>";
    }?>
</div>
