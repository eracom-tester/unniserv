<?php 

$profile=$this->session->userdata("profile"); 
$user_id=$this->session->userdata("user_id"); 
?>
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="<?= $panel_path.'orders';?>">Orders</a></li>            
            <li class="breadcrumb-item active" aria-current="page">Order details</li>
         </ol>
	   </div>
	 
</div>

 
             <div class="card card-body card-bg-1">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
<div class="table-responsive">
    <table class="<?= $this->conn->setting('table_classes'); ?> table-bordered">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Product Code</th>
                <th>Name</th>
               
                <th>Qty</th> 
                <th>Sub total</th>
                <th>Sub BV</th>
            </tr>
            <?php
            $cart_details=$this->conn->runQuery('*','order_items',"order_id='$vd_id'") ;
           
            if(!empty($cart_details)){
                $sno=0;
                foreach($cart_details as $cart){
                    $sno++;
                    ?>
                    <tr>
                        <td><?= $sno;?></td>
                         <td><?= $cart->product_id;?></td>
                        <td><?= $cart->name;?></td>
                        <td><?= $ttl_qty[]=$cart->quantity;?></td>
                        <td><?= $sub_ttl[]=$cart->sub_total;?></td>
                        <td><?= $ttl_bv[]=$cart->product_bv;?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            <tr>
                <td colspan="3">Total</td>
              
                <td ><?= array_sum($ttl_qty);?></td>
                <td ><?= array_sum($sub_ttl);?></td>
                <td ><?= array_sum($ttl_bv);?></td>
            </tr>
        </thead>
        
    </table>
</div>


    
    </div>
</div>
</div>
