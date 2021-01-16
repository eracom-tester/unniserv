    
    <?php
    if($type=="last"){
        $get_detail=$this->conn->runQuery('*','closing_sod_details',"1='1' order by id desc limit 1");
    }
    
    if($type=="lastweek"){
        
        $get_detail=$this->conn->runQuery('*','closing_sod_details',"added_on > (NOW() - INTERVAL 24*7 HOUR)");
    }
    
    if($type=="lastmonth"){
        
        $get_detail=$this->conn->runQuery('*','closing_sod_details',"added_on > (NOW() - INTERVAL 30*24 HOUR)");
    }
    
    ?>
    <div class=" table-responsive">
         <table class="table">
             <tr>
                 <th>Time</th>
                 <th>Total Business</th>
                 <th>SOD amount</th>
                 <th>SOD Users</th>
                 <th>SOD Per user</th>
                 <th>Action</th>
             </tr>
             <?php
             
             if($get_detail){
                 foreach($get_detail as $detail_amnt){
                     ?>
                     <tr>
    		             <td><?= $detail_amnt->date_time;?></td>
    		             <td><?= $detail_amnt->fresh_business;?></td>
    		            
    		             <td><?= $detail_amnt->star_income;?></td>
    		             <td><?= $detail_amnt->star_users;?></td>
    		             <td><?= $detail_amnt->star_per_user;?></td>
    		             <td><a href="<?= $admin_path.'income/star-of-the-day?id='.$detail_amnt->id;?>" class="btn btn-sm btn-warning" >View Details</a></td>
    		              
    		             
    		         </tr>
                     <?php
                 }
             }
             ?>
         </table>
    </div>