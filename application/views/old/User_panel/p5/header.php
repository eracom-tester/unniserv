<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title><?= $this->conn->company_info('company_name');?></title>
  <!--favicon-->
  <link rel="icon" href="<?= $this->conn->company_info('symbol');?>" type="image/x-icon">
  <!-- simplebar CSS-->
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
  <!-- skins CSS-->
  <link href="<?= $panel_url;?>assets/css/skins.css" rel="stylesheet"/>
  <!-- skins CSS-->
  <link href="<?= $panel_url;?>assets/css/skins.css" rel="stylesheet"/>
  
  <style>
         .card-bg-1{
            background-color: #EAF1F2;
            color: black;
        }
        
        
        
        
 
@media (min-width: 1024px) {
  .ghost {
    display: none;
  }
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
       <img src="<?= $this->conn->company_info('logo');?>" class="logo-icon" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?php echo $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn->company_info('logo_height');?>">
       <!--<h5 class="logo-text"><?= $this->conn->company_info('company_name');?></h5>-->
     </a>
   </div>
   <!--<div class="user-details">
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar"><img class="mr-3 side-user-img" src="<?= $panel_url;?>assets/images/avatars/avatar-13.png" alt="user avatar"></div>
       <div class="media-body">
       <h6 class="side-user-name">Mark Johnson</h6>
      </div>
       </div>
     <div id="user-dropdown" class="collapse">
      <ul class="user-setting-menu">
            <li><a href="javaScript:void();"><i class="icon-user"></i>  My Profile</a></li>
            <li><a href="javaScript:void();"><i class="icon-settings"></i> Setting</a></li>
      <li><a href="javaScript:void();"><i class="icon-power"></i> Logout</a></li>
      </ul>
     </div>
      </div>-->
   <ul class="sidebar-menu">
      <!--<li class="sidebar-header">MAIN NAVIGATION</li>-->
      <li>
        <a href="<?= $panel_path.'dashboard';?>" class="waves-effect">
          <i class="fa fa-tachometer"></i> <span>Dashboard</span><i class=""></i>
        </a>
		
      </li>
	   <?php
      if($this->conn->plan_setting('profile_section')==1){
          ?>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-layers"></i>
          <span>My Account</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
		 <?php  if($this->conn->plan_setting('profile_page')==1){  ?>
    <li><a href="<?= $panel_path.'profile';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Profile</a></li>
	  <?php } ?>
            <?php  if($this->conn->plan_setting('profile_page')==1){  ?>
        <li><a href="<?= $panel_path.'profile/edit-profile';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Edit Profile</a></li>
		<?php } ?>
            <?php  if($this->conn->plan_setting('change_password')==1){  ?>
    <li><a href="<?= $panel_path.'profile/change-password';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Change Password</a></li>
         <?php } ?>
        </ul>
      </li>
	  <?php } ?>
	  
	  
	   <!-- <?php
      if($this->conn->plan_setting('fund_section')==1){
          ?>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-card-travel"></i>
          <span>Fund</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
		<?php  if($this->conn->plan_setting('add_fund')==1){  ?>
          <li><a href="<?= $panel_path.'fund/fund-add';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Add Fund</a></li>
		  <?php } ?>
            <?php  if($this->conn->plan_setting('fund_deposit')==1){  ?>
          <li><a href="<?= $panel_path.'fund/fund-deposit';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Deposit Fund</a></li>
		   <?php } ?>
            <?php  if($this->conn->plan_setting('transfer_fund')==1){  ?>
          <li><a href="<?= $panel_path.'fund/fund-transfer';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Transfer Fund</a></li>
		  <?php } ?>
            <?php  if($this->conn->plan_setting('withdraw_fund')==1){  ?>
          <li><a href="<?= $panel_path.'fund/fund-withdraw';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Withdrawal</a></li>
		  <?php } ?>
              
            <?php  if($this->conn->plan_setting('fund_request')==1){  ?>
          <li><a href="<?= $panel_path.'fund/fund-request';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Fund request</a></li>
         <?php } ?>
        </ul>
      </li>
	  <?php } ?>-->
	  
	   <?php
      if($this->conn->plan_setting('team_section')==1){
          ?>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-users"></i> <span>Team</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
		 <?php  if($this->conn->plan_setting('direct_team')==1){  ?>
          <li><a href="<?= $panel_path.'team/team-direct';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Direct</a></li>
		  <?php } ?>
            <?php  if($this->conn->plan_setting('generation_team')==1){  ?>
          <li><a href="<?= $panel_path.'team/team-generation';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Generation</a></li>
		  <?php } ?>
            <?php  if($this->conn->plan_setting('single_leg_team')==1){  ?>
          <li><a href="<?= $panel_path.'team/team-single-leg';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Single Leg</a></li>
		  <?php } ?>
            <?php  if($this->conn->plan_setting('left_team')==1){  ?>
          <li><a href="<?= $panel_path.'team/team-left';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Left Team</a></li>
		   <?php } ?>
            <?php  if($this->conn->plan_setting('right_team')==1){  ?>
          <li><a href="<?= $panel_path.'team/team-right';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Right Team</a></li>
		   <?php } ?>
              
            <?php  if($this->conn->plan_setting('tree')==1){  ?>
          <li><a href="<?= $panel_path.'team/team-tree';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Tree</a></li>
		  <?php } ?>
               <?php  if($this->conn->plan_setting('matrix')==1){  ?>
          <li><a href="<?= $panel_path.'team/team-matrix';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Matrix</a></li>
		   <?php } ?>
               <?php  if($this->conn->plan_setting('matrix')==1){  ?>
          <li><a href="<?= $panel_path.'team/team-rank-wise';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Rank Wise</a></li>
		   <?php } ?>
        </ul>
       </li>
	    <?php } ?>
		
		
		<?php
        if($this->conn->plan_setting('kyc_section')==1){
            
            if($this->conn->setting('is_kyc_separate')!='yes'){
                ?>
                <li>
                    <a href="<?= $panel_path.'kyc/docs';?>" class="waves-effect">
                      <i class="fa fa-money"></i> <span>KYC</span>
                    </a>
                </li>
        	   <?php
            }else{
                
            
          ?>
             <li>
                <a href="javaScript:void();" class="waves-effect">
                  <i class="fa fa-file"></i> <span>KYC</span>
                  <i class="fa fa-angle-left float-right"></i>
                </a>
                <ul class="sidebar-submenu">
        		<?php  if($this->conn->plan_setting('adhaar_kyc')==1){  ?>
                  <li><a href="<?= $panel_path.'kyc/adhaar';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Adhaar</a></li>
        		   <?php } ?>
                    <?php  if($this->conn->plan_setting('pan_kyc')==1){  ?>
                  <li><a href="<?= $panel_path.'kyc/pan';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Pan</a></li>
        		   <?php } ?>
                    <?php  if($this->conn->plan_setting('bank_kyc')==1){  ?>
                  <li><a href="<?= $panel_path.'kyc/bank';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Bank</a></li>
                 <?php } ?>
                </ul>
              </li>
	  <?php } 
	  } ?>
	  
     
    
     
       <?php
      if($this->conn->plan_setting('pin_section')==1){
          ?>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-thumb-tack"></i> <span>E-pin</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
		<?php  if($this->conn->plan_setting('generate_pin')==1){  ?>
          <li><a href="<?= $panel_path.'pin/pin-generate';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Generate pin</a></li>
		   <?php } ?>
            <?php  if($this->conn->plan_setting('transfer_pin')==1){  ?>
          <li><a href="<?= $panel_path.'pin/pin-transfer';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Transfer</a></li>
		  <?php } ?>
            <?php  if($this->conn->plan_setting('pin_history')==1){  ?>
          <li><a href="<?= $panel_path.'pin/pin-history';?>"><i class="zmdi zmdi-dot-circle-alt"></i> History</a></li>
		   <?php } ?>
            <?php  if($this->conn->plan_setting('pin_box')==1){  ?>
          <li><a href="<?= $panel_path.'pin/pin-box';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Pinbox</a></li>
          <?php } ?>
        </ul>
      </li>
       <?php } ?>
	   
	   
	   
	<?php
      if($this->conn->plan_setting('invest_section')==1){
          ?>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-user"></i> <span>Membership</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
		<?php  if($this->conn->plan_setting('investment')==1){  ?>
          <li><a href="<?= $panel_path.'invest/investment';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Topup</a></li>
		   <?php } ?>
            <?php  if($this->conn->plan_setting('reinvestment')==1){  ?>
          <li><a href="<?= $panel_path.'invest/reinvestment';?>"><i class="zmdi zmdi-dot-circle-alt"></i> Re-Topup</a></li>
          <?php } ?>
        </ul>
       </li>
        <?php } ?>
		
		
		
		
			<?php
      if($this->conn->plan_setting('withdraw_fund')==1){
          ?>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-money"></i> <span>Withdrawal</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
		<?php  if($this->conn->plan_setting('withdraw_fund')==1){  ?>
          <li><a href="<?= $panel_path.'fund/fund-withdraw';?>" ><i class="zmdi zmdi-dot-circle-alt"></i> Withdrawal</a></li>
		   <?php } ?>
            <?php  if($this->conn->plan_setting('withdraw_fund')==1){  ?>
          <li><a href="<?= $panel_path.'fund/withdrawal-history';?>" ><i class="zmdi zmdi-dot-circle-alt"></i> Withdrawal History</a></li>
          <?php } ?>
        </ul>
       </li>
        <?php } ?>
		
		
		
		 <?php
      if($this->conn->plan_setting('income_section')==1){
          ?>
       <li>
        <a href="<?= $panel_path.'income';?>" class="waves-effect">
          <i class="fa fa-money"></i> <span>Income</span>
         
        </a>
      </li>
	   <?php } ?>
	  
	  <li>
        <a href="<?= $panel_path.'team/single_leg_goal';?>" class="waves-effect">
          <i class="fa fa-bullseye"></i> <span> Goal</span>
         
        </a>
      </li>
	  
	   <?php
        if($this->conn->plan_setting('transactions_section')==1){
            ?>
	   <li>
        <a href="<?= $panel_path.'transactions';?>" class="waves-effect">
          <i class="fa fa-exchange"></i> <span>Transactions</span>
         
        </a>
      </li>
	  
	  <?php } ?>

        
      <?php
        if($this->conn->plan_setting('support_section')==1){
            ?>
	  
	   <li>
        <a href="<?= $panel_path.'support';?>" class="waves-effect">
          <i class="fa fa-life-ring"></i> <span>Support</span>
         
        </a>
      </li>
      <?php } ?>
    
     
    
      <li>
        <a href="<?= $panel_path.'logout';?>" class="waves-effect">
          <i class="fa fa-sign-out"></i> <span>Logout</span>
         
        </a>
      </li>
      

     
     
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav id="header-setting" class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    
    
    <div class="brand-logo ghost">
      <a href="<?= base_url();?>index">
       <img src="<?= $this->conn->company_info('logo');?>" class="logo-icon" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?php echo $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn->company_info('logo_height');?>;margin-left:80px">
       <!--<h5 class="logo-text"><?= $this->conn->company_info('company_name');?></h5>-->
     </a>
   </div>
    <!--<li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>-->
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    
    
    
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="<?= $panel_url;?>assets/images/avatars/avatar-13.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="<?= $panel_url;?>assets/images/avatars/avatar-13.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?= $this->session->userdata('profile')->name;?></h6>
            <p class="user-subtitle"><?= $this->session->userdata('profile')->email;?></p>
            </div>
           </div>
          </a>
        </li>
        <!--<li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>-->
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

</body>


</html>