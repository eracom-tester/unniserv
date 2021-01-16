 
 <?php
 
 $resp=json_decode($this->conn->setting('order_status'),true);
 
  $payment_status= $resp[$order_details->payment_status];
        
                         
                        
                        $order_status= $resp[$order_details->status];
        
                        
 ?>
<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">  Order Details </h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#"> Order</a></li>            
            <li class="breadcrumb-item"><a href="#"> All</a></li>            
            <li class="breadcrumb-item active" aria-current="page">  Order Detail </li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Order Detail</h6>
<hr>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
       

<div class="table-responsive">
<table class="table table-hover">
        <?php
        
        
        $tx_profile_arr=$order_details->order_address;
           $tx_profile=json_decode($tx_profile_arr,true);
           
           $shippingaddress=json_decode($order_details->order_address); 
        ?>
            <tr>               
                <th> User</th><td>:</td><td><?= $tx_profile['name'] ;?></td>
            </tr>
            <tr>
                <th>Amount</th><td>:</td><td><?= $order_details->order_amount;?></td>  
                </tr>
             
            <tr>
                <th>Date </th><td>:</td><td><?= $order_details->added_on;?></td>  
                 
            </tr>
            
            
            <tr>
                <th><b> Shipping Address</b> </th><td>:</td><td> <?= $shippingaddress->first_name; ?> <?= $shippingaddress->last_name; ?> <br>
                                        <?= $shippingaddress->email; ?><br>
                                        <?= $shippingaddress->address; ?><br>
                                        <?= $shippingaddress->address2; ?><br>
                                        <?= $shippingaddress->Country; ?><br>
                                        <?= $shippingaddress->State; ?><br>
                                        <?= $shippingaddress->zip; ?><br>
                                        <?= $shippingaddress->pan_no; ?><br>
                                        </td>  
                 
            </tr>
            <!--<tr>
                <th>Payment Slip </th><td>:</td><td>
                <a href="<?= $order_details->payment_slip;?>" target="_blank"><img style="width:100px;" src="<?= $order_details->payment_slip;?>" /></a>
                </td>  
                 
            </tr>-->
            <tr>
                <th>Order ID. </th><td>:</td><td>
                <?= $order_details->id;?>
                </td>  
                 
            </tr>
            <tr>
                <th>Payment Status </th><td>:</td><td>
                <?= $payment_status;?>
                </td>  
                 
            </tr>
            <tr>
                <th>Order Status </th><td>:</td><td>
                <?= $order_status;?>
                </td>  
                 
            </tr>
            <tr>
                <th>Order BV </th><td>:</td><td>
                <?= $order_details->order_bv;?>
                </td>  
                 
            </tr>
            <?php
            if($order_details->payment_mode=='emi'){
                $ordr_id=$order_details->id;
                $installments=$this->conn->runQuery('count(id) as cnt','order_payments',"order_id='$ordr_id'")[0]->cnt;
               ?>
                <tr>
                    <th>Paid Installments </th><td>:</td><td>
                    <?= $installments!='' ? $installments:0;?>
                    </td>  
                     
                </tr>
                <tr>
                    <th>Pending Installments </th><td>:</td><td>
                    <?= 12-($installments!='' ? $installments:0);?>
                    </td>  
                     
                </tr>
            <?php 
            }
            ?>
        
    </table>
    
    <h6 class="text-uppercase">Order Products</h6>
<hr>
   <table class="table">
    <tr>
        <th>S no.</th>
        <th>Product Code</th>
        <th>Product</th>
        <th>Name</th>
        <th>Qty</th>
        <th>Details</th>
    </tr>
    <?php
    
    $successorder_details=$order_details->order_details;
    $order_details_arr=json_decode($successorder_details,true);
    //print_r($order_details_arr);
    
    if(!empty($order_details_arr)){
        $sno=0;
        foreach($order_details_arr as $order_key=>$order_details_val){
            $sno++;
            $product_details=$this->product->product_detail($order_details_val['id']);
            ?>
            <tr>
                <td><?= $sno;?></td>
                <td><?= $product_details->p_code;?></td>
                <td> 
                    <div class="img" style="height: 75px; width: 75px;">
                        <?php $imageURL = $product_details->imgs!='' ? base_url('images/products/'.$product_details->imgs):base_url(); ?>
                        <img src="<?php echo $imageURL; ?>" width="75"/>
                    </div>
                </td>
                <td><?= $order_details_val['name'];?></td>
                <td><?= $order_details_val['qty'];?></td>
                <td>
                    <?php
                    if(array_key_exists('options',$order_details_val)){
                        foreach($order_details_val['options'] as $option_key=>$order_options){
                            echo "$option_key : $order_options<br>";
                        }
                        
                    }
                         
                    ?>
                </td>
                 
                 
            </tr>
            <?php
        }
    }
    ?>
    
</table>
</div>



   
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
        <form action="" method="post">
            <div class="form-group">
              <label for="">Payment Status</label>
              <select name="payment_status" class="form-control">
                  <option value="0" <?= ($payment_status=='Pending' ? 'selected':'');?> >Pending</option>
                  <option value="1" <?= ($payment_status=='Success' ? 'selected':'');?>>Approve</option>
              </select>
              <small class="text-muted"><?= form_error('payment_status');?></small>
            </div>
            <div class="form-group">
              <label for="">Order Status</label>
              <select name="order_status" class="form-control">
                  <option value="0" <?= ($order_status=='Pending' ? 'selected':'');?> >Pending</option>
                  <option value="3" <?= ($order_status=='Accepted' ? 'selected':'');?>>Accept</option>
                  <option value="4" <?= ($order_status=='Dispatched' ? 'selected':'');?>>Dispatch</option>
                  <option value="1" <?= ($order_status=='Success' ? 'selected':'');?>>Approve</option>
                  <option value="2" <?= ($order_status=='Rejected' ? 'selected':'');?>>Reject</option>
                  
              </select>
              <small class="text-muted"><?= form_error('order_status');?></small>
            </div>
            <div class="form-group">  
        <button type="submit" name="approve_btn" class="btn btn-success">Save </button>
         
            </div>
    </form>
    <?php
    if($order_details->payment_mode=='emi'){
        $installments=$this->conn->runQuery('*','order_payments',"order_id='$ordr_id'");
        if($installments){
            $ins=0;
            ?>
            <h6>Paid Installments</h6>
            <hr>
            <table class="table">
                <tr>
                    <th>S No.</th>
                    <th>Amount</th>
                    <th>BV</th>
                    <th>Date</th>
                </tr>
            
            <?php
            
            foreach($installments as $installment_details){
                 $ins++;
                 ?>
                 <tr>
                    <td><?= $ins;?></td>
                    <td><?= $installment_details->amount;?></td>
                    <td><?= $installment_details->bv;?></td>
                    <td><?= $installment_details->added_on;?></td>
                </tr>
                 <?php
            }
            ?>
            
            </table>
            <?php
        }
    }
    ?>
    
    </div>
</div>
