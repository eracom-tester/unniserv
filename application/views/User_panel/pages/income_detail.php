

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
    
    <!-- End Breadcrumb-->
      <div class="row">
            
           
           <div class="col-12">
              <div class="container-fluid">
                  <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Commission Detail </h5>
                 
                </div>
				<br><br><br>
                <div class="ibox-content" >
                                <!-- Table Responsive -->
                                <div class="table-responsive">
								<div class="w3-container">
								<!--<center> <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-success">Export to excel</button>
                                </form></center>-->
									<form class="form-inline" action="" method="post" >
									<div class="form-group">
									<input type="text" name="search_username" class="form-control" placeholder="Enter UserName:" value="<?php echo (isset($_POST['search_username']) && $_POST['search_username']!='' ? $_POST['search_username']: '');?>">
									</div>
							   
								<div class="form-group">
									<input type="submit" class="btn btn-success "  style=" margin-top:5px;margin-bottom:5px;" name="search" value="Search" >
									<input type="submit" class="btn btn-success"  style="margin-left:5px; margin-top:5px;margin-bottom:5px;" name="refresh" value="Refresh"></div>							
  </div>
	
				<br>
				
			
				
			
                       </div>			
                       
				</div>       
				<div class="table-responsive">
				<table id="example" class="table table-sm">
								
							<tr>
									<td>S No.</td>
									 <td> Name</td>
									 <?php $all_income=$db->runQuery("SELECT * FROM `income_types`");
									 if(!empty($all_income)){
									     foreach($all_income as $all_income1){
									 ?>
									<td>
									    <a href="income.php?source=<?php echo $all_income1['value'];?>" target="_blank"><?php echo $all_income1['name'];?></a></td>
									<?php }}?>
								
								<td>Total Payout</td>
								<td>TDS</td>
								<td>Admin Charges</td>
								<td>Net Profit</td>
								 <!--	<td>Paid Amount</td>-->
								<td>Balance Amount</td>
								<!--<td>Bank Account Number</td>
								<td> Bank IFSC Code</td>-->
								   
							</tr>
                                <?php
                                if(!empty($table_info)){
                                    $i=0;
                                    foreach($table_info as $table_info1){
                                        $usrId=$table_info1['u_code'];
                                            $get_res=$db->runQuery("select sum(amount) as ttl from income  where   u_code='$usrId'");
                                            $ttl_pay1=$get_res[0]['ttl'];
                                            $user_bank_detail=$db->runQuery("SELECT * FROM `user_kyc` where u_id='$usrId' and document_type='bank' and status='SUCCESSFULL'");
                                            $paid_amt=$db->runQuery("SELECT SUM(amount) AS total FROM ledger WHERE u_code='$usrId'  and  txs_type='paid_earning'")[0]['total'];
                                            ?>
                                            <tr>
                                               <td align="center"><?php echo $i+1;?></td>
                                                <td><?php echo $user_ob->usernamebyid($table_info1['u_code'])."<br>"."(".$user_ob->user_profile($table_info1['u_code'])[0]['name'].")";?></td>
                                                    <?php foreach($all_income as $all_income12){
                                                    ?>
                                                    <td><?php 
                                                    $income_values=$all_income12['value'];
                                                    //echo "select sum(amount) as ttl from income  where   u_code='$usrId' and `date`>='$dateStr' and `date`<='$dateStr1' and source='$income_values'";
                                                    $all_incomes=$db->runQuery("select sum(amount) as ttl from income  where   u_code='$usrId'  and source='$income_values'")[0]['ttl'];
                                                    if(!empty($all_incomes)){
                                                        ?>
                                                    <a href="income.php?source=<?php echo $income_values;?>" target="_blank"> <?php  echo $all_incomes;?></a>    
                                                        <?php
                                                       
                                                    }else{
                                                        echo "0";
                                                    }
                                                    ?></td> 
                                                    <?php } ?>
                                                    
                                                    <td> <?php echo $ttl_pay1; ?></td>
                                                    <td><?php 
                                                        $tds=$db->settings('is_tds');
                                                        echo $tds_mnt=($ttl_pay1*$tds)/100;
                                                        ?>
                                                    </td>
                                                    <td><?php 
                                                        $is_admin_charge=$db->settings('is_admin_charge');
                                                        echo $ttl_admn_chrg=($ttl_pay1*$is_admin_charge)/100;
                                                        ?>
                                                    </td>
                                                    <td><?php echo $ttl_payout[]=$net_payable=$ttl_pay1-$tds_mnt-$ttl_admn_chrg-$rprchase_amnt;?></td>
                                                    <!--<td><?php  echo round($paid_amt,2)!='' ? round($paid_amt,2):0;?></td>-->
                                                    <td><?php $ttt=$net_payable-$paid_amt;
                                                    
                                                    echo round($ttt,2);
                                                    ?></td>
                                                   <!-- <td><?php echo $user_bank_detail[0]['bank_account_number'];?></td>
                                                    
                                                    <td><?php echo $user_bank_detail[0]['bank_ifsc'];?> </td>-->
                                                    <!--<td><form method="post" action="" > 
                                                    <input type="text" name="amount" class="form-control" required>
                                                    <input type="hidden" name="payable_amount" class="form-control"  value="<?php echo $net_payable; ?>" required>
                                                    <input type="hidden" name="user_id"  value="<?php echo $usrId;?>" class="form-control" placeholder="amount"><br>
                                                    <input type="submit" name="submit" class="btn btn-success">
                                                    </form> </td>-->
                                                    
                                                    </tr>
                                                    <?php
                                                    
                                                    
                                        $i++;	
                                    }
                                }
                                ?>
							
						<label class="btn btn-success pull-right"><?php echo "Total Payout :".array_sum($ttl_payout);?></label>	
								</table>
                                    </div>
						<script type="text/javascript">
							window.onload=function(){
									$('#loader').hide();
								}
						</script> 
				
              </div>            
                </div>
            </div>
           
           
            
          </div>


     
<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
   
  </div><!--End wrapper-->


 
