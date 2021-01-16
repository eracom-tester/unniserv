
<?php 
$profile=$this->session->userdata("profile"); 
$user_id=$this->session->userdata("user_id"); 
?>
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Orders</a></li>            
            <li class="breadcrumb-item active" aria-current="page">Order details</li>
         </ol>
	   </div>
	 
</div>
  <?php
        $userid=$this->session->userdata('user_id'); 
        $ttl=$this->conn->runQuery('sum(order_amount)as total,sum(order_bv)as bv','orders',"u_code='$userid' and status='1' and tx_type='repurchase'");
        $ttl_amnt=$ttl[0]->total;
        $ttl_tx_charge=$ttl[0]->bv;
        ?>
         <div align="right">
            <div class="table table-responsive"> 
                <table>
                    <tr>
                      <th>Total Order Amount(<?=round($ttl_amnt)?>)</th>
                      <th>Total Order Bv(<?=round($ttl_tx_charge)?>)</th>
                  
                   </tr>
                </table>
            </div>
        </div>    
        
 
             <div class="card card-body card-bg-1">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
<div class="table-responsive">
    <table class="<?= $this->conn->setting('table_classes'); ?>">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Order ID</th>
                <th>Order amount</th>              
                <th>Order BV</th>                
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Action</th>
                 
            </tr>
            <?php
            $my_orders=$this->conn->runQuery('*','orders',"u_code='$user_id' and tx_type='repurchase'");
            
            if($my_orders){
                $sno=0;
                foreach($my_orders as $my_order){
                    $sno++;
                    ?>
                    <tr>
                        <td><?= $sno;?></td>
                        <td>#<?= $my_order->id;?></td>
                        <td><?= round($my_order->order_amount);?></td>
                        <td><?= round($my_order->order_bv);?></td>
                        <td><?= $my_order->added_on;?></td>
                        <td><?= $my_order->status==1 ? "Approved" : "Pending"; ?> </td>
                        <td><a href="<?= $panel_path.'orders/view?id='.$my_order->id;?>">View Details</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </thead>
        
    </table>
</div>


    
    </div>
</div>
</div>
