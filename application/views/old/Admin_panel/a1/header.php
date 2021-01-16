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
  <!--material datepicker css-->
  <link rel="stylesheet" href="<?= $panel_url;?>assets/plugins/material-datepicker/css/bootstrap-material-datetimepicker.min.css">
  <link href="<?= $panel_url;?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.css'>
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="<?= base_url();?>index">
       <img src="<?= $this->conn->company_info('logo');?>" class="logo-icon" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?= $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn-> company_info('logo_height');?>">
       <h5 class="logo-text"> Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <!--<li class="sidebar-header">MAIN NAVIGATION</li>-->
      <li><a href="<?= $admin_path.'dashboard';?>" class="waves-effect"><i class="zmdi zmdi-home"></i> <span>Dashboard</span></a></li>


      <li>
        <a href="" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="<?= $admin_path.'users';?>"><i class="zmdi zmdi-star-outline"></i>All Users</a></li>
          
        </ul>
      </li>
      <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-pin"></i> <span>Packages</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="<?= $admin_path.'packages';?>"><i class="zmdi zmdi-user"></i>All</a></li>
              <li><a href="<?= $admin_path.'packages/create';?>"><i class="zmdi zmdi-user"></i>Create</a></li>
            </ul>
          </li>
      <?php
      if($this->conn->plan_setting('pin_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-pin"></i> <span>E-pin</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="<?= $admin_path.'pin/send';?>"><i class="zmdi zmdi-user"></i>Send</a></li>
              
            
           
            <?php  if($this->conn->plan_setting('pin_history')==1){  ?>
              <li><a href="<?= $admin_path.'pin/pin-history';?>"><i class="zmdi zmdi-user"></i>History</a></li>
            <?php } ?>
             
              
            </ul>
          </li>
          <?php } ?>

          <?php
          if($this->conn->plan_setting('withdraw_fund')==1){
          ?>
            <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Withdrawals</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                <li><a href="<?= $admin_path.'withdrawal/pending';?>"><i class="zmdi zmdi-user"></i>Pending</a></li>
                <li><a href="<?= $admin_path.'withdrawal/approved';?>"><i class="zmdi zmdi-user"></i>Approved</a></li>
                <li><a href="<?= $admin_path.'withdrawal/cancelled';?>"><i class="zmdi zmdi-user"></i>Cancelled</a></li>
              </ul>
            </li>
          <?php } ?>
        <?php
            if($this->conn->plan_setting('kyc_section')==1){
          ?>
           <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Kyc</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                <li><a href="<?= $admin_path.'kyc/pending';?>"><i class="zmdi zmdi-user"></i>Pending</a></li>
                <li><a href="<?= $admin_path.'kyc/approved';?>"><i class="zmdi zmdi-user"></i>Approved</a></li>
                <li><a href="<?= $admin_path.'kyc/cancelled';?>"><i class="zmdi zmdi-user"></i>Cancelled</a></li>
              </ul>
            </li>
        
        <?php } ?>
        <?php
            if($this->conn->plan_setting('product_section')==1){
                ?>
                <li>
                  <a href="#" class="waves-effect">
                    <i class="zmdi zmdi-account-box-mail"></i> <span>Product</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="sidebar-submenu">
                    <li><a href="<?= $admin_path.'product';?>"><i class="zmdi zmdi-user"></i>All Products</a></li>
                    <li><a href="<?= $admin_path.'product/categories';?>"><i class="zmdi zmdi-user"></i>All Categories</a></li>
                    <li><a href="<?= $admin_path.'product/add-product';?>"><i class="zmdi zmdi-user"></i>Add Product</a></li>
                    
                    
                  </ul>
                </li>
          <?php } ?>
          <?php
            if($this->conn->plan_setting('income_section')==1){
                ?>
                <li>
                  <a href="<?= $admin_path.'income';?>" class="waves-effect">
                    <i class="zmdi zmdi-labels"></i> <span>Income</span>          
                  </a>
                </li> 
          <?php } ?>
          <?php
            if($this->conn->plan_setting('transactions_section')==1){
                ?>
                <li>
                  <a href="<?= $admin_path.'transactions';?>" class="waves-effect">
                    <i class="zmdi zmdi-receipt"></i> <span>Transactions</span>          
                  </a>
                </li> 
          <?php } ?>
          <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Fund</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                <li><a href="<?= $admin_path.'fund/fund_transfer';?>"><i class="zmdi zmdi-user"></i>Add Fund</a></li>
               
                
                
              </ul>
            </li>
             <li><a href="<?= $admin_path.'advance/alert';?>" class="waves-effect"><i class="zmdi zmdi-power "></i> <span>Alerts</span></a></li>
          <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Support</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                <li><a href="<?= $admin_path.'support/pending';?>"><i class="zmdi zmdi-user"></i>Pending</a></li>
                <li><a href="<?= $admin_path.'support/approved';?>"><i class="zmdi zmdi-user"></i>Approved</a></li>
                
                
              </ul>
            </li>
            <li><a href="<?= $admin_path.'users/change-password';?>" class="waves-effect"><i class="zmdi zmdi-power "></i> <span>Change Password</span></a></li>
           <li><a href="<?= $admin_path.'logout';?>" class="waves-effect"><i class="zmdi zmdi-power "></i> <span>Logout</span></a></li>

         
      
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
        admin
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       
       
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="<?= $admin_path.'logout';?>" class="waves-effect"><i class="zmdi zmdi-power mr-2"></i> <span>Logout</span></a></li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">