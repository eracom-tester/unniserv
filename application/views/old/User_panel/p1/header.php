<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta http-equiv="refresh" content="600;url=<?= $panel_path.'logout';?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title><?= $this->conn->company_info('company_name');?></title>
  <!--favicon-->
  <link rel="icon" href="<?= $this->conn->company_info('symbol');?>" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="<?= $panel_url;?>assets/plugins/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
  <link href="<?= $panel_url;?>assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" type="text/css"/>

  <link href="<?= $panel_url;?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="<?= $panel_url;?>assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="<?= $panel_url;?>assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?= $panel_url;?>assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="<?= $panel_url;?>assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="<?= $panel_url;?>assets/css/app-style.css" rel="stylesheet"/>
  <style>
    body{
          background-color: #020429 !important;
          color: white !important;
        }
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
               
        </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <style type="text/css">
        .style1
        {
            height: 19px;
        }
        .thai-btn
        {
            margin-top: 20px;
        }
        .thai-btn .btn
        {
            margin-right: 20px;
            width: 215x;
        }
        
        
        .status  {
          border-style: dotted;
          
        }
        .monthly-cuttoff{
            
           border-style: solid;
           color:#79215F;
        }
        .card-bg-1{
            background-color: #E5EAE9;
            color: black;
        }
        
    </style>
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="<?= base_url();?>index">
       <img src="<?= $this->conn->company_info('logo');?>" class="logo-icon" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?= $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn-> company_info('logo_height');?>">
       <h5 class="logo-text"> <?= $this->conn->company_info('company_name');?></h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <!--<li class="sidebar-header">MAIN NAVIGATION</li>-->
      <li>
        <a href="<?= $panel_path.'dashboard';?>" class="waves-effect">
          <i class="zmdi zmdi-home"></i> <span>Dashboard</span>          
        </a>
      </li>
      
      <?php
      if($this->conn->plan_setting('profile_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-account"></i> <span>My Account</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('profile_page')==1){  ?>
              <li><a href="<?= $panel_path.'profile';?>"><i class="zmdi zmdi-user"></i>Profile</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('profile_page')==1){  ?>
              <li><a href="<?= $panel_path.'profile/edit-profile';?>"><i class="zmdi zmdi-user"></i>Edit Profile</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('change_password')==1){  ?>
              <li><a href="<?= $panel_path.'profile/change-password';?>"><i class="zmdi zmdi-user"></i>Change Password</a></li>
            <?php } ?>
              
            </ul>
          </li>
          <?php } ?>
      
      <?php
      if($this->conn->plan_setting('fund_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-n-1-square"></i> <span>Fund</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('add_fund')==1){  ?>
              <li><a href="<?= $panel_path.'fund/fund-add';?>"><i class="zmdi zmdi-user"></i>Add Fund</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('fund_deposit')==1){  ?>
              <li><a href="<?= $panel_path.'fund/fund-deposit';?>"><i class="zmdi zmdi-user"></i>Deposit Fund</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('transfer_fund')==1){  ?>
              <li><a href="<?= $panel_path.'fund/fund-transfer';?>"><i class="zmdi zmdi-user"></i>Transfer Fund</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('withdraw_fund')==1){  ?>
              <li><a href="<?= $panel_path.'fund/fund-withdraw';?>"><i class="zmdi zmdi-user"></i>Withdrawal</a></li>
            <?php } ?>
              
            <?php  if($this->conn->plan_setting('fund_request')==1){  ?>
              <li><a href="<?= $panel_path.'fund/fund-request';?>"><i class="zmdi zmdi-user"></i>Fund request</a></li>
            <?php } ?>
              
            </ul>
          </li>
          <?php } ?>
      
      <?php
      if($this->conn->plan_setting('team_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-accounts-list-alt"></i> <span>Team</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('direct_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-direct';?>"><i class="zmdi zmdi-user"></i>Direct</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('generation_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-generation';?>"><i class="zmdi zmdi-user"></i>Generation</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('single_leg_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-single-leg';?>"><i class="zmdi zmdi-user"></i>Single Leg</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('left_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-left';?>"><i class="zmdi zmdi-user"></i>Left Team</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('right_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-right';?>"><i class="zmdi zmdi-user"></i>Right Team</a></li>
            <?php } ?>
              
            <?php  if($this->conn->plan_setting('tree')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-tree';?>"><i class="zmdi zmdi-user"></i>Tree</a></li>
            <?php } ?>
               <?php  if($this->conn->plan_setting('matrix')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-matrix';?>"><i class="zmdi zmdi-user"></i>Matrix</a></li>
            <?php } ?>
             <?php  if($this->conn->plan_setting('team_rank_wise')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-rank-wise';?>"><i class="zmdi zmdi-user"></i>Rank Wise</a></li>
            <?php } ?>
              
            </ul>
          </li>
          <?php } ?>
      <?php
      if($this->conn->plan_setting('kyc_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-pin"></i> <span>KYC</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('adhaar_kyc')==1){  ?>
              <li><a href="<?= $panel_path.'kyc/adhaar';?>"><i class="zmdi zmdi-user"></i>Adhaar</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('pan_kyc')==1){  ?>
              <li><a href="<?= $panel_path.'kyc/pan';?>"><i class="zmdi zmdi-user"></i>Pan</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('bank_kyc')==1){  ?>
              <li><a href="<?= $panel_path.'kyc/bank';?>"><i class="zmdi zmdi-user"></i>Bank</a></li>
            <?php } ?>
             
              
            </ul>
          </li>
          <?php } ?>
      <?php
      if($this->conn->plan_setting('pin_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-pin"></i> <span>E-pin</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('generate_pin')==1){  ?>
              <li><a href="<?= $panel_path.'pin/pin-generate';?>"><i class="zmdi zmdi-user"></i>Generate pin</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('transfer_pin')==1){  ?>
              <li><a href="<?= $panel_path.'pin/pin-transfer';?>"><i class="zmdi zmdi-user"></i>Transfer</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('pin_history')==1){  ?>
              <li><a href="<?= $panel_path.'pin/pin-history';?>"><i class="zmdi zmdi-user"></i>History</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('pin_box')==1){  ?>
              <li><a href="<?= $panel_path.'pin/pin-box';?>"><i class="zmdi zmdi-user"></i>Pinbox</a></li>
            <?php } ?>
             
              
            </ul>
          </li>
          <?php } ?>
      
      <?php
      if($this->conn->plan_setting('invest_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-accounts-add"></i> <span>Membership</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('investment')==1){  ?>
              <li><a href="<?= $panel_path.'invest/investment';?>"><i class="zmdi zmdi-user"></i>Topup</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('reinvestment')==1){  ?>
              <li><a href="<?= $panel_path.'invest/reinvestment';?>"><i class="zmdi zmdi-user"></i>Re-Topup</a></li>
            <?php } ?>
            </ul>
          </li>
        <?php } ?>
      
      
      <?php
      if($this->conn->plan_setting('income_section')==1){
          ?>
          <li>
            <a href="<?= $panel_path.'income';?>" class="waves-effect">
              <i class="zmdi zmdi-labels"></i> <span>Income</span>          
            </a>
          </li> 
        <?php } ?>

      <?php
        if($this->conn->plan_setting('transactions_section')==1){
            ?>
            <li>
              <a href="<?= $panel_path.'transactions';?>" class="waves-effect">
                <i class="zmdi zmdi-receipt"></i> <span>Transactions</span>          
              </a>
            </li> 
      <?php } ?>

        
      <?php
        if($this->conn->plan_setting('support_section')==1){
            ?>
            <li>
              <a href="<?= $panel_path.'support';?>" class="waves-effect">
                <i class="zmdi zmdi-local-convenience-store"></i> <span>Support</span>          
              </a>
            </li> 
      <?php } ?>

        
      
      
      
    
         
      <li><a href="<?= $panel_path.'logout';?>" class="waves-effect"><i class="zmdi zmdi-power "></i> <span>Logout</span></a></li>
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->
 <header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top bg-white">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
     
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
      
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="<?= base_url('images/users/user.png');?>" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="<?= $panel_path.'profile';?>">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="<?= base_url('images/users/user.png');?>" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?= $this->session->userdata('profile')->name;?></h6>
            <p class="user-subtitle"><?= $this->session->userdata('profile')->email;?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
       
        <li class="dropdown-item"><a href="<?= $panel_path.'logout';?>"><i class="icon-power mr-2"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<div class="clearfix"></div>
	
  <div class="content-wrapper" >
    <div class="" >