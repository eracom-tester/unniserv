
<?php
if($type=='all'){
    $total=$this->conn->runQuery('count(pin) as ttl','epins',"created_by IN ('admin','user')")[0]->ttl;
    $total_admin=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'admin'")[0]->ttl;
    $total_user=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'user'")[0]->ttl;
    $total_used=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='1' and used_in IN ('topup')")[0]->ttl;
    $total_unused=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='0'")[0]->ttl;
   
}
if($type=='today'){
    $total=$this->conn->runQuery('count(pin) as ttl','epins',"created_by IN ('admin','user') and DATE(added_on)=DATE(NOW())")[0]->ttl;
    $total_admin=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'admin' and DATE(added_on)=DATE(NOW())")[0]->ttl;
    $total_user=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'user' and DATE(added_on)=DATE(NOW())")[0]->ttl;
    $total_used=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='1' and used_in IN ('topup') and DATE(updated_on)=DATE(NOW())")[0]->ttl;
    $total_unused=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='0' and DATE(added_on)=DATE(NOW())")[0]->ttl;
}
if($type=='24hour'){
    
    $total=$this->conn->runQuery('count(pin) as ttl','epins',"created_by IN ('admin','user') and  added_on > (NOW() - INTERVAL 24 HOUR)")[0]->ttl;
    $total_admin=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'admin' and  added_on > (NOW() - INTERVAL 24 HOUR)")[0]->ttl;
    $total_user=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'user' and  added_on > (NOW() - INTERVAL 24 HOUR)")[0]->ttl;
    $total_used=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='1' and used_in IN ('topup') and  updated_on > (NOW() - INTERVAL 24 HOUR)")[0]->ttl;
    $total_unused=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='0' and  added_on > (NOW() - INTERVAL 24 HOUR)")[0]->ttl;
    
    
  
}
if($type=='lastweek'){
    
    $total=$this->conn->runQuery('count(pin) as ttl','epins',"created_by IN ('admin','user') and  added_on > (NOW() - INTERVAL 24*7 HOUR)")[0]->ttl;
    $total_admin=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'admin' and  added_on > (NOW() - INTERVAL 24*7 HOUR)")[0]->ttl;
    $total_user=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'user' and  added_on > (NOW() - INTERVAL 24*7 HOUR)")[0]->ttl;
    $total_used=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='1' and used_in IN ('topup') and  updated_on > (NOW() - INTERVAL 24*7 HOUR)")[0]->ttl;
    $total_unused=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='0' and  added_on > (NOW() - INTERVAL 24*7 HOUR)")[0]->ttl;
    
}
if($type=='lastmonth'){
    
    $total=$this->conn->runQuery('count(pin) as ttl','epins',"created_by IN ('admin','user') and  added_on > (NOW() - INTERVAL 30*24 HOUR)")[0]->ttl;
    $total_admin=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'admin' and  added_on > (NOW() - INTERVAL 30*24 HOUR)")[0]->ttl;
    $total_user=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'user' and  added_on > (NOW() - INTERVAL 30*24 HOUR)")[0]->ttl;
    $total_used=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='1' and used_in IN ('topup') and  updated_on > (NOW() - INTERVAL 30*24 HOUR)")[0]->ttl;
    $total_unused=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='0' and  added_on > (NOW() - INTERVAL 30*24 HOUR)")[0]->ttl;
}
if($type=='lastyear'){
    
    $total=$this->conn->runQuery('count(pin) as ttl','epins',"created_by IN ('admin','user') and  added_on > (NOW() - INTERVAL  1 YEAR)")[0]->ttl;
    $total_admin=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'admin' and  added_on > (NOW() - INTERVAL  1 YEAR)")[0]->ttl;
    $total_user=$this->conn->runQuery('count(pin) as ttl','epins',"created_by = 'user' and  added_on > (NOW() - INTERVAL  1 YEAR)")[0]->ttl;
    $total_used=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='1' and used_in IN ('topup') and  updated_on > (NOW() - INTERVAL  1 YEAR)")[0]->ttl;
    $total_unused=$this->conn->runQuery('count(pin) as ttl','epins',"use_status='0' and  added_on > (NOW() - INTERVAL  1 YEAR)")[0]->ttl;
}

$total= $total!='' ? $total:0;
$total_admin= $total_admin!='' ? $total_admin:0;
$total_user= $total_user!='' ? $total_user:0;
$total_used= $total_used!='' ? $total_used:0;
$total_unused= $total_unused!='' ? $total_unused:0;

 
?>
<div class="table-responsive">
    <table class="table table-sm table">
         <tr>
            <th>Total Pins</th><th>Admin Created</th><th>User Created</th><th>Used Pins</th><th>Unused Pins</th>
            
        </tr>
        <tr>
            <td><?= $total;?></td><td><?= $total_admin;?></td><td><?= $total_user;?></td><td><?= $total_used;?></td><td><?= $total_unused;?></td>
        </tr>
    </table>
</div>