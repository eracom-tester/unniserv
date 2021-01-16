    
    <?php
    if($type=="last"){
        $get_detail=$this->conn->runQuery('*','closing_binary_details',"1='1' order by id desc limit 1");
    }
    
     
    if($type=="lastmonth"){
        
        $get_detail=$this->conn->runQuery('*','closing_binary_details',"added_on > (NOW() - INTERVAL 30*24 HOUR)");
    }
    
    ?>
    <div class=" table-responsive">
	     <table class="table">
	         <tr>
	             <th>Time</th>
	             <th>Total Business</th>
	             <th>Total Matching</th>
	             <th>30%</th>
	             <th>Per BV</th>
	             
	             <th>Action</th>
	         </tr>
	         <?php
	         
	         if($get_detail){
	             foreach($get_detail as $detail_amnt){
	                 ?>
	                 <tr>
			             <td><?= $detail_amnt->date_time;?></td>
			             <td><?= $detail_amnt->fresh_business;?></td>
			             <td><?= $detail_amnt->total_matching;?></td>
			             <td><?= $detail_amnt->count_business;?></td>
			             <td><?= $detail_amnt->per_bv;?></td>
			          
			             <td><a href="<?= $admin_path.'closing?id='.$detail_amnt->id;?>" class="btn btn-sm btn-warning" >View Details</a></td>
			              
			             
			         </tr>
	                 <?php
	             }
	         }
	         ?>
	     </table>
	     </div>