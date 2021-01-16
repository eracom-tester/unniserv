
<?php
$currency=$this->config->item('currency');
 $reg_plan=$this->session->userdata('reg_plan');
 
$all_incomes=$this->conn->runQuery('*','wallet_types',"wallet_type='income' and $reg_plan='1'");
$all_income_arr=array();

if($type=='all'){
    $total=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income'")[0]->total;
    if($all_incomes){
       foreach($all_incomes as $income){
           $src=$income->slug;
           $name=$income->name;
           $all_income_arr[$name]=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income' and source='$src'")[0]->total;
       }
    }
  
}
if($type=='today'){
    $total=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income' and date(date)=DATE(NOW())")[0]->total;
    if($all_incomes){
       foreach($all_incomes as $income){
           $src=$income->slug;
           $name=$income->name;
           $all_income_arr[$name]=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income' and source='$src' and date(date)=DATE(NOW())")[0]->total;
       }
   }
}
if($type=='24hour'){
    $total=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income' and date > (NOW() - INTERVAL 24 HOUR)")[0]->total;
    if($all_incomes){
       foreach($all_incomes as $income){
           $src=$income->slug;
           $name=$income->name;
           $all_income_arr[$name]=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income' and source='$src' and date > (NOW() - INTERVAL 24 HOUR)")[0]->total;
       }
    }
}
if($type=='lastweek'){
    $total=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income' and date > (NOW() - INTERVAL 24*7 HOUR)")[0]->total;
    if($all_incomes){
       foreach($all_incomes as $income){
           $src=$income->slug;
           $name=$income->name;
           $all_income_arr[$name]=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income' and source='$src' and date > (NOW() - INTERVAL 24*7 HOUR)")[0]->total;
       }
    }
}
if($type=='lastmonth'){
    $total=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income' and date > (NOW() - INTERVAL 30*24 HOUR)")[0]->total;
    if($all_incomes){
       foreach($all_incomes as $income){
           $src=$income->slug;
           $name=$income->name;
           $all_income_arr[$name]=$this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='income' and source='$src' and date > (NOW() - INTERVAL 30*24 HOUR)")[0]->total;
       }
    }
    
}

                             
?>

<div class="table-responsive">
    <table class="table table-sm  table ">
        <tr>
            <td style="background-color:pink;"><a href="#';?>">Total Income</a></td>
            <td><?= $currency;?> <?= $total!='' ? round($total):0;?></td>
        </tr>
        <?php
        if(!empty($all_income_arr)){
            foreach($all_income_arr as $income_name=>$income){
                ?>
                 <tr>
                    <td><a href="#"><?= $income_name;?></a></td>
                    <td> <?= $currency;?> <?= $income!='' ? round($income):0;?></td>
                </tr>
                <?php
            }
        }
        
        ?>
         
         
    </table>
</div>