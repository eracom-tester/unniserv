<!DOCTYPE html>

<html lang="en">
    
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- //// required in every head////-->
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<!-- //// required in every head////-->
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->conn->company_info('company_name');?></title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="" type="image/x-icon">
       <!-- <link rel="apple-touch-icon" type="image/x-icon" href="assets/dist/img/ico/apple-touch-icon-57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="assets/dist/img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="assets/dist/img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="assets/dist/img/ico/apple-touch-icon-144-precomposed.png">-->

        <!-- Start Global Mandatory Style
        =====================================================================-->
        <link href="<?= $panel_url;?>assets/dist/css/base.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Toastr css -->
        <link href="<?= $panel_url;?>assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css">
        <!-- Emojionearea -->
        <link href="<?= $panel_url;?>assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css" >
        <!-- Monthly css -->
        <link href="<?= $panel_url;?>assets/plugins/monthly/monthly.min.css" rel="stylesheet" type="text/css">
        <!-- amchat css -->
        <link href="<?= $panel_url;?>assets/plugins/amcharts/export.css" rel="stylesheet" type="text/css">
        <!-- Theme style -->
        <link href="<?= $panel_url;?>assets/dist/css/component_ui.min.css" rel="stylesheet" type="text/css">
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/component_ui_rtl.css" rel="stylesheet" type="text/css">-->
        <!-- Custom css -->
        <link href="<?= $panel_url;?>assets/dist/css/custom.css" rel="stylesheet" type="text/css">
        <style>
            .separator {
                    display: flex;
                    align-items: center;
                    text-align: center;
                }
                .separator::before, .separator::after {
                    content: '';
                    flex: 2;
                    border-bottom: 1px solid #000;
                }
                .separator::before {
                    margin-right: .40em;
                }
                .separator::after {
                    margin-left: .40em;
                }
                body{
                      text-transform: uppercase;
                }
        </style>
        <style>
            .grid_1{
               background-color:#2C90C9; background-image: linear-gradient(#059CC1,  #1D07AC 60%);color: #FFF;font-size: 14px;width: 100%; border: none; padding: 10px;border-radius: 5px;
               height: 90px;
            }
            .grid_1 i,h2{
                font-size:25px !important;
            }
           .grid_2{
               background-color:#2C90C9; background-image: linear-gradient(#059CC1,  #1D07AC 60%);color: #FFF;font-size: 18px;width: 100%; border: none; padding: 10px;border-radius: 5px;
            }
             .grid_3{
               background-color:#2C90C9; background-image: linear-gradient(#059CC1,  #1D07AC 60%);color: #FFF;font-size: 18px;width: 100%; border: none; padding: 10px;border-radius: 5px;
            }
                     
                            
                /*
                ====================================================================
                    currency-exchange style
                ====================================================================
                */
                .prices{
                	position: relative;
                	padding: 100px 0;
                	text-align: center;
                }
                .prices .sec-title p {
                    max-width: 650px;
                    margin: 0 auto;
                    color: #848484;
                    margin-top: 20px;
                }
                .prices .table{
                	margin-top: 46px;
                	margin-bottom: 0
                }
                .prices .currency-icon{
                	max-width: 25px;
                	margin-right: 15px
                }
                .prices .up{
                	color: #43c443
                }
                .prices .down{
                	color: red
                }
                .prices .chart{
                	margin-top: 46px
                }
                /*
                ====================================================================
                    currency-exchange style
                ====================================================================
                */
                .currency-exchange{
                	position: relative;
                	padding: 100px 0;
                }
                
                .currency-exchange .sec-title p {
                    max-width: 650px;
                    margin: 0 auto;
                    color: #848484;
                    margin-top: 20px;
                }
        </style>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


</head>
    <body class="text-uppercase" >
	<header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <!-- top navigation -->
               <!-- /. top navigation -->
                <!--  main navigation -->
                <nav class="navbar navbar-default navbar-mobile navbar-sticky bootsnav">
                    <!-- Start Top Search -->
                    <div class="top-search">
                        <div class="container">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ti-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-addon close-search"><i class="ti-close"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Search -->
                    <div class="container">
                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class=" " href="index.php"><img src="<?= $this->conn->company_info('logo');?>" class="logo" style="width:100px;" alt="<?= $this->conn->company_info('company_name');?>"></a>
                        </div>
                        <!-- End Header Navigation -->
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-left" data-in="" data-out="">
                                <li class="active"><a href="<?= $panel_path.'dashboard';?>"><i class="ti-home"></i> Dashboard</a></li>
								<?php
      if($this->conn->plan_setting('profile_section')==1){
          ?>
								 	
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ti-user"></i>My Profile</a>
                                    <ul class="dropdown-menu">
                                     <?php  if($this->conn->plan_setting('profile_page')==1){  ?>
                                        <li><a href="<?= $panel_path.'profile';?>"><i class="ti-user"></i>Profile Details</a></li>
										<?php } ?>
            <?php  if($this->conn->plan_setting('profile_page')==1){  ?>
                                      <li><a href="<?= $panel_path.'profile/edit-profile';?>"><i class="fa fa-edit"></i>Edit Profile</a></li>
                                    <?php } ?>
                                 <?php  if($this->conn->plan_setting('change_password')==1){  ?>
										<li><a href="<?= $panel_path.'profile/change-password';?>"><i class="fa fa-key"></i>Change Password</a></li>
                                        <li><a href="<?= $panel_path.'logout';?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                      <?php } ?>
                                    </ul>
                                </li>
								 <?php } ?>
								 
								 <?php
      if($this->conn->plan_setting('fund_section')==1){
          ?>
								<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>Fund</a>
                                    <ul class="dropdown-menu">
                                     <?php  if($this->conn->plan_setting('add_fund')==1){  ?>
                                        <li><a href="<?= $panel_path.'fund/fund-add';?>"><i class="fa fa-sitemap"></i>Add Fund</a></li>
                                      
                                       <?php } ?>
            <?php  if($this->conn->plan_setting('fund_deposit')==1){  ?>
										
									   <li><a href="<?= $panel_path.'fund/fund-deposit';?>"><i class="fa fa-hand-o-left"></i>Deposit Fund</a></li>
									   <?php } ?>
                                            <?php  if($this->conn->plan_setting('transfer_fund')==1){  ?>
									   <li><a href="<?= $panel_path.'fund/fund-transfer';?>"><i class="fa fa-hand-o-right"></i>Transfer Fund</a></li>
									   <?php } ?>
                                        <?php  if($this->conn->plan_setting('withdraw_fund')==1){  ?>
									   <li><a href="<?= $panel_path.'fund/fund-withdraw';?>"><i class="fa fa-tree"></i>Withdrawal</a></li>
									   <?php } ?>
              
                                          <?php  if($this->conn->plan_setting('fund_request')==1){  ?>
                                      
										   <li><a href="<?= $panel_path.'fund/fund-request';?>"><i class="fa fa-bars"></i>Fund request</a></li>
										   <?php } ?>
										 
									  	  
									 
                                    </ul>
                                </li>
								   <?php } ?>
      
                              <?php
                              if($this->conn->plan_setting('team_section')==1){
                                  ?>
								<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file"></i>Team</a>
                                    <ul class="dropdown-menu">
                                   	 <?php  if($this->conn->plan_setting('direct_team')==1){  ?>
                                        <li><a href="<?= $panel_path.'team/team-direct';?>"><i class="fa fa-address-card-o"></i>Direct</a></li>
										  <?php } ?>
                                    <?php  if($this->conn->plan_setting('generation_team')==1){  ?>
                                        <li><a href="<?= $panel_path.'team/team-generation';?>"><i class="fa fa-id-card"></i>Generation</a></li>
										   <?php } ?>
            <?php  if($this->conn->plan_setting('single_leg_team')==1){  ?>
                                        <li><a href="<?= $panel_path.'team/team-single-leg';?>"><i class="fa fa-id-card-o"></i>Single Leg</a></li>
										<?php } ?>
            <?php  if($this->conn->plan_setting('left_team')==1){  ?>
                                        <li><a href="<?= $panel_path.'team/team-left';?>"><i class="fa fa-id-card-o"></i>Left Team</a></li>
										<?php } ?>
            <?php  if($this->conn->plan_setting('right_team')==1){  ?>
                                        <li><a href="<?= $panel_path.'team/team-right';?>"><i class="fa fa-id-card-o"></i>Right Team</a></li>
										 <?php } ?>
              
            <?php  if($this->conn->plan_setting('tree')==1){  ?>
                                        <li><a href="<?= $panel_path.'team/team-tree';?>"><i class="fa fa-id-card-o"></i>Tree</a></li>
										  <?php } ?> 
                                      
                                    </ul>
                                </li>
								 <?php } ?>
      
                                       <?php
                                                if($this->conn->plan_setting('pin_section')==1){
                                          ?>
								  
								<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags"></i>E-pin</a>
                                    <ul class="dropdown-menu">
                                     <?php  if($this->conn->plan_setting('generate_pin')==1){  ?>
                                        <li><a href="<?= $panel_path.'pin/pin-generate';?>"><i class="fa fa-tag"></i>Generate pin</a></li>
										<?php } ?>
            <?php  if($this->conn->plan_setting('transfer_pin')==1){  ?>
                                        <li><a href="<?= $panel_path.'pin/pin-transfer';?>"><i class="fa fa-cart-plus"></i>Transfer</a></li>
										<?php } ?>
            <?php  if($this->conn->plan_setting('pin_history')==1){  ?>
                                        <li><a href="<?= $panel_path.'pin/pin-history';?>"><i class="fa fa-briefcase"></i>History</a></li>
                                        <?php } ?>
                                      
                                    </ul>
                                </li>
								  <?php } ?>
      
      <?php
      if($this->conn->plan_setting('invest_section')==1){
          ?>
								
								<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-key"></i>Topup</a>
                                    <ul class="dropdown-menu">
                                     
                                     <?php  if($this->conn->plan_setting('investment')==1){  ?>

							
						   <li><a href="<?= $panel_path.'invest/investment';?>"><i class="fa fa-plus"></i>Topup</a></li>
							<?php } ?>
            <?php  if($this->conn->plan_setting('reinvestment')==1){  ?>
                                        <li><a href="<?= $panel_path.'invest/reinvestment';?>"><i class="fa fa-exchange"></i>Re-Topup</a></li>
										
                                        <?php } ?>
                                      
                                    </ul>
                                </li>
					 <?php } ?>
					 
					  <?php
      if($this->conn->plan_setting('income_section')==1){
          ?>
					 <li class=""><a href="<?= $panel_path.'income';?>"><i class="fa fa-trophy"></i> Income</a></li>
					 
					 
					 
					  <?php } ?>

      <?php
        if($this->conn->plan_setting('transactions_section')==1){
            ?>
					 <li class=""><a href="<?= $panel_path.'transactions';?>"><i class="fa fa-trophy"></i> Transactions</a></li>
					 <?php } ?>

        
      <?php
        if($this->conn->plan_setting('support_section')==1){
            ?>
					 <li class=""><a href="<?= $panel_path.'support';?>"><i class="fa fa-trophy"></i> Support</a></li>
					 
					 <?php } ?>
					 
					 
					 
					 <li><a href="<?= $panel_path.'logout';?>" class=""><i class="fa fa-trophy "></i> <span>Logout</span></a></li>
					 
                              
								 	
                                        			
							   
                               	
								
								
    								
								
                               	
									
								  
                                
                                
                                   
                               
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- Start Side Menu -->
                   
                    <!-- End Side Menu -->
                </nav> <!-- /. main navigation -->
                <div class="clearfix"></div>
            </header>
            <div class="wrapper animsition">
            <!-- /.content-wrapper -->
            <div class="content-wrapper">
                <div class="container">
                    <!-- main content -->
                    <div class="content">