<?php
$currency=$this->config->item('currency');
if($type=='all'){
    $list_new_orders=$this->conn->runQuery('*','orders',"1='1' order by id desc limit 6");
}
if($type=='pending'){
    $list_new_orders=$this->conn->runQuery('*','orders',"status='0' order by id desc limit 6");
}
if($type=='accepted'){
    $list_new_orders=$this->conn->runQuery('*','orders',"status='3' order by id desc limit 6");
}
if($type=='rejected'){
    $list_new_orders=$this->conn->runQuery('*','orders',"status='2' order by id desc limit 6");
}
if($type=='approved'){
    $list_new_orders=$this->conn->runQuery('*','orders',"status='1' order by id desc limit 6");
}
/* if($type=='emi'){
    $list_new_orders=$this->conn->runQuery('*','orders',"payment_mode='emi' order by id desc limit 6");
} */
 
?>
<table class="table align-items-center table-flush table table-resposive">
      <thead>
       <tr>
         <th>Action</th>
         <th>User</th>
         <th>Order ID</th>
         <th>Order Type</th>
         <th>Order BV</th>
         <th>Amount</th>
         <th>Completion</th>
       </tr>
       </thead>
        <?php
           if($list_new_orders){
               foreach($list_new_orders as $new_order){
                   
                   $btn=$new_order->payment_status=='1' ? 'success':'info';
                  /* $payment_status=$new_order->payment_status=='1' ? 'Paid':'Pending';*/
                   $tx_type=$new_order->tx_type;
                   $user_profile=false;
                   if($new_order->u_code!=''){
                       $user_profile=$this->profile->profile_info($new_order->u_code,'name,username');
                   }
                   
                   $progress=$new_order->payment_status=='1' ? 'ohhappiness':'scooter';
                   
                   $stts=$new_order->payment_status;
                   switch ($stts) {
                        case 0:
                            $progress_bar=20;
                            break;
                        case 3:
                            $progress_bar=50;
                            break;
                        case 1:
                            $progress_bar=100;
                            break;
                        case 2:
                            $progress='ibiza';
                            $progress_bar=100;
                            break;
                        default:
                            $progress_bar=20;
                            break;
                    }
                    
                   
                   
                   ?>
                   <tr>
                       <td><a class="btn btn-sm btn-info" href="<?= $admin_path.'order/view?id='.$new_order->id;?>">View</a></td>
                       <td><?= $user_profile ? $user_profile->name.'('.$user_profile->username.')':'';?></td>
                       <td><?= $new_order->id;?></td>
                       <td><?= $new_order->tx_type;?></td>
                       <!-- <td><span class="btn btn-sm btn-outline-<?= $btn;?> btn-round btn-block"><?= $payment_status;?></span></td>-->
                       <td><?= round($new_order->order_bv);?></td>
                       <td><?= $currency;?> <?= round($new_order->order_amount);?></td>
                       <td><div class="progress shadow" style="height: 4px;">
                          <div class="progress-bar gradient-<?= $progress;?>" role="progressbar" style="width: <?= $progress_bar;?>%"></div>
                       </div></td>
                     </tr>
                   <?php
               }
           }
           ?>
       

     </table>