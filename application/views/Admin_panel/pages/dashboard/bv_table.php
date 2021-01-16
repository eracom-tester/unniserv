
<?php
if($type=='all'){
    $totals=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"1=1");
    $total_bv=$totals[0]->bv;  $total_orders=$totals[0]->orders; $total_amnt=$totals[0]->amnt;
   
    $pendings=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=0");
    $pending_bv=$pendings[0]->bv; $pending_order=$pendings[0]->orders; $pending_amnt=$pendings[0]->amnt;
   
    $accepteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=3");
    $accepted_bv=$accepteds[0]->bv; $accepted_order=$accepteds[0]->orders; $accepted_amnt=$accepteds[0]->amnt;
    
    $rejecteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=2");
    $rejected_bv=$rejecteds[0]->bv; $rejected_order=$rejecteds[0]->orders; $rejected_amnt=$rejecteds[0]->amnt;
   
    $approveds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=1");
    $approved_bv=$approveds[0]->bv; $approved_order=$approveds[0]->orders; $approved_amnt=$approveds[0]->amnt;
   
}
if($type=='today'){
    $totals=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"DATE(added_on)=DATE(NOW())");
    $total_bv=$totals[0]->bv; $total_orders=$totals[0]->orders; $total_amnt=$totals[0]->amnt;
    
    $pendings=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=0 and DATE(added_on)=DATE(NOW())");
    $pending_bv=$pendings[0]->bv; $pending_order=$pendings[0]->orders; $pending_amnt=$pendings[0]->amnt;
    
    $accepteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=3 and DATE(added_on)=DATE(NOW())");
    $accepted_bv=$accepteds[0]->bv; $accepted_order=$accepteds[0]->orders; $accepted_amnt=$accepteds[0]->amnt;
    
    $rejecteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=2 and DATE(added_on)=DATE(NOW())");
    $rejected_bv=$rejecteds[0]->bv; $rejected_order=$rejecteds[0]->orders; $rejected_amnt=$rejecteds[0]->amnt;
   
    $approveds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=1 and DATE(added_on)=DATE(NOW())");
    $approved_bv=$approveds[0]->bv; $approved_order=$approveds[0]->orders; $approved_amnt=$approveds[0]->amnt;
   
}
if($type=='24hour'){
    $totals=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders'," added_on > (NOW() - INTERVAL 24 HOUR)");
    $total_bv=$totals[0]->bv; $total_orders=$totals[0]->orders; $total_amnt=$totals[0]->amnt;
    
    $pendings=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=0 and added_on > (NOW() - INTERVAL 24 HOUR)");
    $pending_bv=$pendings[0]->bv; $pending_order=$pendings[0]->orders; $pending_amnt=$pendings[0]->amnt;
    
    $accepteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=3 and added_on > (NOW() - INTERVAL 24 HOUR)");
    $accepted_bv=$accepteds[0]->bv; $accepted_order=$accepteds[0]->orders; $accepted_amnt=$accepteds[0]->amnt;
   
    $rejecteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=2 and added_on > (NOW() - INTERVAL 24 HOUR)");
    $rejected_bv=$rejecteds[0]->bv; $rejected_order=$rejecteds[0]->orders; $rejected_amnt=$rejecteds[0]->amnt;
   
    $approveds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=1 and added_on > (NOW() - INTERVAL 24 HOUR)");
    $approved_bv=$approveds[0]->bv; $approved_order=$approveds[0]->orders; $approved_amnt=$approveds[0]->amnt;
  
}
if($type=='lastweek'){
    $totals=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders'," added_on > (NOW() - INTERVAL 24*7 HOUR)");
    $total_bv=$totals[0]->bv; $total_orders=$totals[0]->orders; $total_amnt=$totals[0]->amnt;
    
    $pendings=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=0 and added_on > (NOW() - INTERVAL 24*7 HOUR)");
    $pending_bv=$pendings[0]->bv; $pending_order=$pendings[0]->orders; $pending_amnt=$pendings[0]->amnt;
    
    $accepteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=3 and added_on > (NOW() - INTERVAL 24*7 HOUR)");
    $accepted_bv=$accepteds[0]->bv; $accepted_order=$accepteds[0]->orders; $accepted_amnt=$accepteds[0]->amnt;
    
    $rejecteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=2 and added_on > (NOW() - INTERVAL 24*7 HOUR)");
    $rejected_bv=$rejecteds[0]->bv; $rejected_order=$rejecteds[0]->orders; $rejected_amnt=$rejecteds[0]->amnt;
    
    $approveds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=1 and added_on > (NOW() - INTERVAL 24*7 HOUR)");
    $approved_bv=$approveds[0]->bv; $approved_order=$approveds[0]->orders; $approved_amnt=$approveds[0]->amnt;
}
if($type=='lastmonth'){
    $totals=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders'," added_on > (NOW() - INTERVAL 30*24 HOUR)");
    $total_bv=$totals[0]->bv;   $total_orders=$totals[0]->orders; $total_amnt=$totals[0]->amnt;
    
    $pendings=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=0 and added_on > (NOW() - INTERVAL 30*24 HOUR)");
    $pending_bv=$pendings[0]->bv; $pending_order=$pendings[0]->orders; $pending_amnt=$pendings[0]->amnt;
    
    $accepteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=3 and added_on > (NOW() - INTERVAL 30*24 HOUR)");
    $accepted_bv=$accepteds[0]->bv; $accepted_order=$accepteds[0]->orders; $accepted_amnt=$accepteds[0]->amnt;
   
    $rejecteds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=2 and added_on > (NOW() - INTERVAL 30*24 HOUR)");
    $rejected_bv=$rejecteds[0]->bv; $rejected_order=$rejecteds[0]->orders; $rejected_amnt=$rejecteds[0]->amnt;
    
    $approveds=$this->conn->runQuery('count(id) as orders,sum(order_bv) as bv,sum(order_amount) as amnt','orders',"status=1 and added_on > (NOW() - INTERVAL 30*24 HOUR)");
    $approved_bv=$approveds[0]->bv; $approved_order=$approveds[0]->orders; $approved_amnt=$approveds[0]->amnt;
}


$currency=$this->config->item('currency');
 
?>
<div class="table-responsive">
    <table class="table table-sm table">
         <tr>
            <th></th><th>Orders</th><th>BV</th><th>Amount(<?= $currency?>)</th>
            
        </tr>
        <tr>
            
            <td><a href="<?= $admin_path.'order';?>">Total</a></td>
            <td><?= $total_orders!='' ? $total_orders:0 ;?><td><?= $total_bv!='' ? round($total_bv):0;?></td><td><?=$total_amnt!='' ? round($total_amnt):0;?></td></td>
        </tr>
        
        <tr>
            <td><a href="<?= $admin_path.'order';?>?id=&status=0&submit=filter">Pending </a></td>
            <td><?= $pending_order!='' ? $pending_order:0;?><td><?= $pending_bv!='' ? round($pending_bv):0;?></td><td><?= $pending_amnt!='' ? round($pending_amnt):0;?></td></td>
        </tr>
        <tr>
            <td><a href="<?= $admin_path.'order';?>?id=&status=3&submit=filter">Accepted </a></td>
            <td><?= $accepted_order!='' ? $accepted_order:0;?><td><?= $accepted_bv!='' ? round($accepted_bv):0;?></td><td><?= $accepted_amnt!='' ? round($accepted_amnt):0;?></td></td>
        </tr>
        <tr>
            <td><a href="<?= $admin_path.'order';?>?id=&status=2&submit=filter">Rejected </a></td>
            <td><?= $rejected_order!='' ? $rejected_order:0;?><td><?= $rejected_bv!='' ? round($rejected_bv):0;?></td><td><?= $rejected_amnt!='' ? round($rejected_amnt):0;?></td></td>
        </tr>
        <tr>
            <td><a href="<?= $admin_path.'order';?>?id=&status=1&submit=filter">Delivered </a></td>
            <td><?= $approved_order!='' ? $approved_order:0;?></td><td><?= $approved_bv!='' ? round($approved_bv):0;?></td><td><?= $approved_amnt!='' ? round($approved_amnt):0;?></td>
        </tr>
       <!-- <tr>
            <td><a href="<?= $admin_path.'order';?>?id=&payment_status=&status=3&payment_mode=full_payment&submit=filter">EMI Orders</a></td>
            <td><?= $emi;?></td>
        </tr>-->
    </table>
</div>