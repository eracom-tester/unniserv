<?php
	$total_invest=$this->conn->runQuery('SUM(order_amount) as ttl_invest','orders',"1=1")[0]->ttl_invest;
	$today_invest=$this->conn->runQuery('SUM(order_amount) as ttl_invests','orders',"status='1' and DATE(added_on)=DATE(NOW())")[0]->ttl_invests;
	//$yesterday_invest=$this->conn->runQuery('SUM(amount) as ttl_investments','orders',"status='1' and  added_on < (NOW() - INTERVAL 1 DAY)")[0]->ttl_investments;
	 $yesterday_invest=$this->conn->runQuery('SUM(order_amount) as ttl_investments','orders',"status='1' and  date(added_on)= DATE(NOW() - INTERVAL 1 DAY)")[0]->ttl_investments;
	$currency=$this->config->item('currency');
	 $currs=$this->conn->company_info('currency');
?>
<div class="table-responsive">
    <table class="table table-sm table">
        
        <tr>
            
            <td><a href="<?= $admin_path.'order';?>">Total</a></td>
            <td><?=$currs?>&nbsp;<?= $total_invest!='' ? $total_invest:0 ;?></td>
        </tr>
        
        <tr>
            <td><a href="<?= $admin_path.'order';?>">Today</a></td>
            <td><?=$currs?>&nbsp;<?= $today_invest!='' ? $today_invest:0;?></td>
        </tr>
        <tr>
            <td><a href="<?= $admin_path.'order';?>">Yesterday </a></td>
            <td><?=$currs?>&nbsp;<?= $yesterday_invest!='' ? $yesterday_invest:0;?></td>
        </tr>
        
    </table>
</div>