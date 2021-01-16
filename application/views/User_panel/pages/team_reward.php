
<?php 
$profile=$this->session->userdata("profile"); 
$user_id=$this->session->userdata("user_id"); 
?>
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Reward</a></li>            
            <li class="breadcrumb-item active" aria-current="page">Rewards</li>
         </ol>
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
                <th>Requried </th>
                <th>Rank</th>              
                <th>Royalty</th>              
                <th>Status</th>                
                
                 
            </tr>
            <?php
            $my_plan=$this->conn->runQuery('*','plan',"1=1");
           
            $top_legs1=$this->business->top_legs($user_id);
            $max_leg_business=$top_legs1[0];
            //echo "<br>";
            $other_leg=array_sum($top_legs1)-max($top_legs1);               
            if($my_plan){
                $sno=0;
                for($i=0;$i<8;$i++){
                    $requried_business=$my_plan[$i]->tour;
                    $our_rank=$my_plan[$i]->royalty;
                    $bv_oneside=$my_plan[$i]->bv_oneside;
                    $bv_anotherside=$my_plan[$i]->bv_anotherside;
                    $goalstatus=($top_legs1>=$bv_oneside && $profile->active_status==1 && $other_leg>=$bv_anotherside ? 'Achieved':'Pending');
                    
                    if($goalstatus=="Achieved"){
                     $check_rank_=$this->conn->runQuery('u_code','rank',"rank_id='$i' and u_code='$user_id' and rank='$our_rank'");
                        if(!$check_rank_){
                            $rankinsert['u_code']=$user_id;
                            $rankinsert['rank']=$our_rank;
                            $rankinsert['is_complete']=1;
                            $rankinsert['rank_id']=$i;
                            $this->db->insert('rank',$rankinsert);
                        }
                        $update_rank['my_rank']=$our_rank;
                        $this->db->where('id',$user_id);
                        $this->db->update('users',$update_rank);
                    }    
                    ?>
                    <tr>
                        <td><?= $i+1;?></td>
                        <td><?= $requried_business;?></td>
                        <td><?= $our_rank;?></td>
                         <td><?= $my_plan[$i]->reward;?></td>
                        <td><?= $goalstatus; ?> </td>
                       
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
