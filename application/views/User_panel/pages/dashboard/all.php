<?php

    $plan_type=$this->session->userdata('reg_plan'); 
    $profile=$this->session->userdata("profile");
    $user_id=$this->session->userdata('user_id');
    $plan=$this->conn->runQuery("*",'plan',"1=1");
    $website_settings=$this->conn->plan_setting("dashboard"); 

    $incomes=$this->conn->runQuery("*",'wallet_types',"wallet_type='income' and  status='1' and $plan_type='1'");
    $team=$this->conn->runQuery("*",'wallet_types',"wallet_type='team' and  status='1' and $plan_type='1'");
    $wallets=$this->conn->runQuery("*",'wallet_types',"wallet_type IN ('wallet','pin') and  status='1'  and $plan_type='1'");
    $withdrawals=$this->conn->runQuery("*",'wallet_types',"wallet_type = 'withdrawal' and  status='1'  and $plan_type='1'");
    $payouts=$this->conn->runQuery("*",'wallet_types',"wallet_type = 'payout' and  status='1'  and $plan_type='1'");

    $w_balance=$this->conn->runQuery('*','user_wallets',"u_code='$user_id'");
    $wallet_balance=$w_balance ? $w_balance[0]:array();
?>

<div class="clearfix"></div>
	
  <div class="content">
    <div class="container-fluid">
	<marquee behavior="scroll" direction="left" scrollamount="10" class="card-bg-1 card gradient-orange text-white"><?= $this->conn->company_info('news');?></marquee>
	<?php
	$get_alert=$this->conn->runQuery('*','notice_board',"type='popup' and status='1' order by id desc");
	    if($get_alert){
	        ?>
            	    
            	    
	<div class="modal fade" id="panel_popup">
      <div class="modal-dialog">
        <div class="modal-content border-warning">
          <?php
          if($get_alert[0]->title!=''){
              ?>
              <div class="modal-header bg-warning">
                <h5 class="modal-title text-white"><?= $get_alert[0]->title;?></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php
          }
          ?>
          
          <div class="modal-body" style="color:black;">
            <?php
          if($get_alert[0]->description!=''){
              ?>
            <p ><?= $get_alert[0]->description;?></p>
            <?php
          }
          if($get_alert[0]->img_path!=''){
            ?>
            <img src="<?= $get_alert[0]->img_path;?>" style="width:100%;">
            <?php  
          }
          ?>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-inverse-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
            ?>
	<div class="row">
	<div class="col-md-8 col-xs-12">
	<center><h5>Incomes Section</h5></center>
	 <div class="row">
	 
	      
					<?php

					   
//echo $plan_type;

					?>
					
					<?php
                foreach($incomes as $income){    
                    $slug =  $income->wallet_column; 
                    ?>					
                    <div class="col-12 col-lg-6 col-xl-4">
                    
                      <div class="card gradient-army">
                  
                        <div class="card-body">
                              <div class="media d-flex">
                                <div class="media-body">
                                  <span class="text-white"><?= $income->name;?></span>
                                  <h3 class="text-white"><?= (!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug:0); ?></h3>
                        
                                </div>
                                <div class="w-icon">
                                  <i class="fa fa-google-wallet text-white"></i>
                                </div>
                              </div>
                              <div id="widget-chart-4"></div>
                            </div>
                      </div>
                  
                    </div>
		<?php }
		    
		        if($withdrawals && $this->conn->setting('earning_type')=='withdrawal'){
		        
                    foreach($withdrawals as $withdrawal_sec){    
                        $slug =  $withdrawal_sec->wallet_column; 
                        ?>					
                        <div class="col-12 col-lg-6 col-xl-4">
                        
                          <div class="card gradient-army">
                      
                            <div class="card-body">
                                  <div class="media d-flex">
                                    <div class="media-body">
                                      <span class="text-white"><?= $withdrawal_sec->name;?></span>
                                      <h3 class="text-white"><?= (!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug:0); ?></h3>
                            
                                    </div>
                                    <div class="w-icon">
                                      <i class="fa fa-google-wallet text-white"></i>
                                    </div>
                                  </div>
                                  <div id="widget-chart-4"></div>
                                </div>
                          </div>
                      
                        </div>
    		<?php }
		        }
		        
		        if($payouts && $this->conn->setting('earning_type')=='payout'){
		        
                    foreach($payouts as $payout_sec){    
                        $slug =  $payout_sec->wallet_column; 
                        ?>					
                        <div class="col-12 col-lg-6 col-xl-4">
                        
                          <div class="card gradient-army">
                      
                            <div class="card-body">
                                  <div class="media d-flex">
                                    <div class="media-body">
                                      <span class="text-white"><?= $payout_sec->name;?></span>
                                      <h3 class="text-white"><?= (!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug:0); ?></h3>
                            
                                    </div>
                                    <div class="w-icon">
                                      <i class="fa fa-google-wallet text-white"></i>
                                    </div>
                                  </div>
                                  <div id="widget-chart-4"></div>
                                </div>
                          </div>
                      
                        </div>
    		<?php }
		        }
		
		
		?>
		
		
      </div><!--End Row-->
	</div>
	<div class="col-md-4 col-xs-12">
		<center><h5>Wallets Section</h5><center>
			<div class="row">
			
			 <?php
				 
					
				if($wallets){
				?>
				
				<?php
					foreach($wallets as $wallet){  
						$slug =  $wallet->wallet_column; 
							?>
			 <div class="col-12 col-lg-12 col-xl-12 col-xs-12">
				   <div class="card gradient-orange">
					 <div class="card-body">
						<div class="media d-flex">
						  <div class="media-body">
							<span class="text-white"><?= $wallet->name;?></span>
							<h3 class="text-white"><?= (!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug:0); ?></h3>
						  </div>
						  <div class="w-icon">
							<i class="icon-pie-chart text-white"></i>
						  </div>
						</div>
						<div id="widget-chart-6"></div>
					  </div>
				   </div>
				 </div>
				  <?php
								}
								?>
				 
			<?php

		  }


		?>
	 
		
		</div>
	</div>
	</div>
	  <center><h3>Team Section</h3></center>
	<div class="row">
	
	<?php
				if($team){
				  
						foreach ($team as $team_val) {
              $slug =  $team_val->wallet_column; 
                   ?>
                <div class="col-12 col-lg-6 col-xl-3 ">
                      <div class="card gradient-dusk">
                        <div class="card-body">
                              <div class="media d-flex">
                                <div class="media-body">
                                  <span class="text-white"><?= $team_val->name;?></span>
                                  <h3 class="text-white"><?= (!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug:0); ?></h3>
                                </div>
                                <div class="w-icon">
                                  <i class="icon-wallet text-white"></i>
                                </div>
                              </div>
                              <div id="widget-chart-5"></div>
                            </div>
                      </div>
                  
                    </div>                
              <?php
               }
            
        }

?>
      </div>
     

    
				       <div class="col-md-12 ">

								<div class="input-group card-bg-1 ">
										  <div class="input-group-prepend">
											<span class="input-group-text">Referral</span>
										  </div>
										  <input type="text" id="referral_link_right" class="form-control" value="<?php echo $right_link=base_url('register?ref='.$profile->username);?>">
										  <div class="input-group-append">
											<div class="input-group-btn" >
												<button type="submit" class="btn btn-default"  onclick="copyLink('right')">
													<i class="fa fa-copy" style="color: #D3B916; font-size: 18px;"></i>
												</button>
												<a href="<?php echo $right_link; ?>" target="_blank" class="btn btn-default">
														<i class="fa fa-link" style="color: #1686D3; font-size: 18px;"></i>
												</a>
												<a class="btn btn-default" href="whatsapp://send?text=<?php echo $right_link; ?>" target="_blank"  data-action="share/whatsapp/share">
													<i class="fa fa-whatsapp" style="color: green; font-size: 18px;"></i>
												</a>
											</div>
										  </div>
										</div>

										
									</div>
						<br>
					 
<!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->

   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	
