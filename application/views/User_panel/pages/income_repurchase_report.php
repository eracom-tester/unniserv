<?php
$u_code=$this->session->userdata('user_id');
?>
            <div class="row pt-2 pb-2">
                    <div class="col-sm-12">
            		    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
                        <li class="breadcrumb-item"><a href="#">Repurchase Income Report</a></li>
                     </ol>
            	   </div>
            	   
            </div>
            <div class="card card-body card-bg-1">
                <form action="<?= $panel_path.'income/repurchase_report';?>" method="get">
                    <div class="form-inline1">
                        <input type="date" class=" "  Placeholder="From"  name="start_date" value="<?= (isset($_REQUEST['start_date']) ? $_REQUEST['start_date']:''); ?>"/>
                        <input type="date" class=" "  Placeholder="End date"  name="end_date" value="<?= (isset($_REQUEST['end_date']) ? $_REQUEST['end_date']:''); ?>" />
                        <input type="submit" name="submit" class="" value="filter" />
                        <button><a href="<?= $panel_path.'income/repurchase_report';?>" class=" m-1" > Reset </a></button>
                        <!--<input type="submit" name="export_to_excel" class="btn btn-sm m-1" value="Export to excel" />-->
                    </div>
                </form>
           </div>
       <div class="card">
          <div class="table-responsive">
                <table class="<?= $this->conn->setting('table_classes'); ?>">
                    <thead>
                        <tr><th>Level</th>
                             <th>Business </th>              
                             <th>Commission </th>              
                            <th>Amount (<?= $this->conn->company_info('currency');?>)</th>
                           
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $start_date= (isset($_REQUEST['start_date']) ? $_REQUEST['start_date']:'');
                        $end_date= (isset($_REQUEST['end_date']) ? $_REQUEST['end_date']:'');
                        
                        $my_gen=$this->team->my_level_team($u_code);
                          $plan = $this->conn->runQuery('*','plan',"1='1'");
                          if($plan){
                              $level=0;
                              foreach($plan as $plan_details){
                                   $level++;
                                   
                                   $order_details=$this->conn->runQuery('SUM(amount) as amnt','transaction',"u_code='$u_code' and source='repurchase' and tx_record='$level' $whr ")[0]->amnt;
                                   if(array_key_exists($level,$my_gen)){
                                       $ids=$my_gen[$level];
                                       
                                       $business_volume=$this->business->repurchase_volume_by_date($ids,$start_date,$end_date);
                                   }else{
                                       $business_volume=0;
                                   }
                                   
                                  ?>
                                    <tr> 
                                        <td><?= $level;?></td>
                                        <td><?= round($business_volume);?></td>
                                        <td><?= round($plan_details->level_income);?></td>
                                        <td><?= $order_details!='' ? round($order_details):0;?></td>
                                        
                                    </tr>
                                  <?php
                              }
                          }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
         
        
        
             
           