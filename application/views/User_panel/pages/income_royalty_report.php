<?php
$u_code=$this->session->userdata('user_id');
$profile=$this->profile->profile_info($u_code);

$top_legs=$this->business->top_legs($u_code);

$main_leg = array_key_exists(0,$top_legs) ? $top_legs[0]:0;
$other_legs = !empty($top_legs) ? array_sum($top_legs)-$main_leg:0;

$plan=$this->conn->runQuery('*','plan',"1=1");
$r_per=array_column($plan,'royalty_gto','royalty');
$my_rank=$profile->my_rank;
$mY_per=array_key_exists($my_rank,$r_per) ? $r_per[$my_rank]:0;

?>
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#"> Report</a></li>
         </ol>
	   </div>
	   
</div>
 
    <div class="card  ">
            <div class="card-header text-right">
                Max Leg business : <?= $main_leg;?>
                 | Other business : <?= $other_legs;?>
                 | Royalty : <?= $mY_per;?>%
            </div>
       
              <div class="table-responsive">
                    <table class="<?= $this->conn->setting('table_classes'); ?>">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Username </th>              
                                <th>Name </th>              
                                <th>Current Business</th>
                                <th>Previous Business</th>
                               
                                 
                            </tr>
                        </thead>
                        <?php
                        $directs=$this->conn->runQuery('*','users',"u_sponsor='$u_code'");
                        if($directs){
                            $sno=0;
                            
                            foreach($directs as $direct){
                                $sno++;
                                $gen_team=$this->team->my_generation_with_personal($direct->id);
                                ?>
                                    <tr>
                                        <td><?= $sno;?></td>
                                        <td><?= $direct->username;?></td>
                                        <td><?= $direct->name;?></td>
                                        <td><?= $direct->active_status==1 ? $this->business->current_session_bv($gen_team):0;?></td> 
                                        <td><?= $direct->active_status==1 ? $this->business->previous_bv($gen_team):0;?></td>
                                    </tr>
                                <?php
                            }
                        }
                        ?>
                         
                    </table>
                </div>
             
</div>
