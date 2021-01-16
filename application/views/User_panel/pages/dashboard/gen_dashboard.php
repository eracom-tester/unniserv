<?php

    $plan_type=$this->session->userdata('reg_plan'); 
    $profile=$this->session->userdata("profile");
    $user_id=$this->session->userdata('user_id');
    $plan=$this->conn->runQuery("*",'plan',"1=1");
    $website_settings=$this->conn->plan_setting("dashboard"); 
    $currency = $this->conn->company_info('currency');
    $incomes=$this->conn->runQuery("*",'wallet_types',"wallet_type='income' and  status='1' and $plan_type='1'");
    $team=$this->conn->runQuery("*",'wallet_types',"wallet_type='team' and  status='1' and $plan_type='1'");
    $wallets=$this->conn->runQuery("*",'wallet_types',"wallet_type IN ('wallet','pin') and  status='1'  and $plan_type='1'");
    $withdrawals=$this->conn->runQuery("*",'wallet_types',"wallet_type = 'withdrawal' and  status='1'  and $plan_type='1'");
    $payouts=$this->conn->runQuery("*",'wallet_types',"wallet_type = 'payout' and  status='1'  and $plan_type='1'");

    $w_balance=$this->conn->runQuery('*','user_wallets',"u_code='$user_id'");
    $wallet_balance=$w_balance ? $w_balance[0]:array();
?>
	<?php
    $get_alert_mar=$this->conn->runQuery('*','notice_board',"type='marquee' and status='1' order by id desc");
    if($get_alert_mar){
    ?>
    <marquee behavior="scroll" direction="left" scrollamount="10" class="card-bg-1 card"><?= $get_alert_mar[0]->description;?></marquee>
<?php
}else{?>
	<marquee behavior="scroll" direction="left" scrollamount="10" class="card-bg-1 card"><?= $this->conn->company_info('news');?></marquee>

<?php } ?>
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
		<div class="clearfix"></div>
			<div class="col-md-12">
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
			</div><br>
		
			
 
   

      <!--Start Dashboard Content-->
	  
      <div class="row">
      <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-bloody corner">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white">Total Orders</p>
                <h4 class="text-white line-height-5"><?= 0;?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-cart-plus text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
       <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-scooter corner">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white">Total Amount</p>
                <h4 class="text-white line-height-5"><?= 0;?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-money text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-blooker corner">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white">Total BV</p>
                <h4 class="text-white line-height-5"><?= 0; ?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-users text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
         <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-blooker corner">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white">Total Payout</p>
                <h4 class="text-white line-height-5"><?=$currency;?>&nbsp;<?= 0;?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-money text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
   
      <div class="row">
      
       <div class="col-12 col-lg-6">
          <div class="card corner">
            <!--<div class="card-header">-->
            
               
                   <!-- Team Section -->
                         <div class="corner">
                          <div class="panel-heading" style="margin:8px;">
                           <h4 class="panel-title"  align='center'><b>Team Section</b><hr></h4>
                         
                          </div>
                         <div class="panel-body">
                            <table class="table profile__table table table-responsive">
                              <tbody>  
                              
                                        <?php
                                          foreach($team as $section){ 
                                              $slug =  $section->wallet_column;                               
                                      ?>
                                    <tr>
                                          <th><span><?= $section->name;?></span></th>
                                          <th></th><th></th><td><?= (!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug:0); ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            </table>
                      </div>
                </div>
        
                </div>
                 
         
                
                </div>
                
                
       
                
		<div class="col-12 col-lg-6">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="corner" style="background-color:#E5E7E9;">
						<div class="card corner" style="background-color:#8B3BEC;">
							<div class="card-body">
							<div class="d-flex flex-row flex-wrap">
							<div class="profile__avatar">
							<img  src="<?=base_url('images/user/').$profile->img;?>" alt="..." style="background-color:black;">
						</div> 
					      <div class="ml-3">
						<h6 class="text-white"><?= $this->session->userdata('profile')->name;?></h6>
						<p class="text-white"><?= $this->session->userdata('profile')->username;?></p>
						<p class="mt-2 text-white font-weight-bold" style="line-height:15px;"><?= $this->session->userdata('profile')->mobile;?></p>
						<p class="mt-2 text-white font-weight-bold" style="line-height:1px;"><?= $this->session->userdata('profile')->email;?></p>
					</div>
				</div>
			</div>
		</div>
                  
                    
                    <table class="table profile__table table table-responsive">
                            <tbody> 
                                   <h6 class="panel-title" style="line-height:1px;" align='center'><b></b></h6>
                                     
                                    
                                    <tr style="line-height:1px;">
                                          <th><span>My Rank</span></th>
                                          <th></th><th></th><td><b><?= $this->session->userdata('profile')->my_rank;?></b></td>
                                     
                                    </tr>
                                    
                                    <tr>
                                    <th>
                                         <b>Income Type</b><hr><span></span>
                                    
                                    </th>
                                    <th></th><th></th><th> <b >Earning</b><span></span>
                                    </th>
                                    </tr>
                                    <?php
                                     $ttl=array();
                                    foreach($incomes as $income){    
                                        $slug =  $income->wallet_column; 
                                       
                                        ?> 
                                    <tr style="line-height:1px;">
                                      <th><span><?= $income->name;?></span></th>
                                      <th></th><th></th> <td><?=$currency;?>&nbsp;<?= $ttl[]=(!empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug:0); ?></td>
                                    </tr>
                                        <?php } ?>
                                        
                                    <tr style="line-height:15px;">
                                      <th><hr><span><b>Total Earning</b></span></th>
                                      <th></th><th></th><td><b><?=$currency;?>&nbsp;<?= array_sum($ttl);?><b></td>
                                    </tr>
             
                             </tbody>
                      
                    </table>
                   
                  
                </div>	
            
             
            
            <!-- User info -->
          
            
            
            
            </div>
         
        </div>
            </div>
            
      </div><!--End Row-->
		</div>
		

 
      
      
      
      
      
      
      
      
      
      
   
	