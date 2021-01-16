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
  <link rel="icon" href="<?= $panel_url;?>assets/images/favicon2.png" type="image/x-icon">
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
  
  
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo bg-white">
      <a href="<?= base_url();?>index">
       <img src="<?= $this->conn->company_info('logo');?>" class="logo-icon" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?= $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn-> company_info('logo_height');?>">
       <h5 class="logo-text"> </h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
       
      <!--<li class="sidebar-header">MAIN NAVIGATION</li>-->
      <li><a href="<?= $franchise_path.'dashboard';?>" class="waves-effect"><i class="zmdi zmdi-home"></i> <span>Dashboard</span></a></li>


      <!-- <li>
        <a href="" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="<?= $franchise_path.'users';?>"><i class="zmdi zmdi-star-outline"></i>All Users</a></li>
          <li><a href="<?= $franchise_path.'users/pin-users';?>"><i class="zmdi zmdi-star-outline"></i>Available pins</a></li>
          <li><a href="<?= $franchise_path.'users/single_leg_status';?>"><i class="zmdi zmdi-star-outline"></i>Change Rank status</a></li>
          
        </ul>
      </li> -->
        
      <li>
        <a href="<?= $franchise_path.'products';?>" class="waves-effect">
          <i class="zmdi zmdi-labels"></i> <span>Products</span>          
        </a>
      </li>
     <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                <li><a href="<?= $franchise_path.'products/purchase';?>"><i class="zmdi zmdi-user"></i>User Purchase</a></li>
                <li><a href="<?= $franchise_path.'products/stock-history';?>"><i class="zmdi zmdi-user"></i>Franchise Stock history</a></li>
                <li><a href="<?= $franchise_path.'products/payouts';?>"><i class="zmdi zmdi-user"></i>Payout Report</a></li>
                 
              </ul>
            </li>
             <!-- <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Delivery Status</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                <li><a href="<?= $franchise_path.'products/product_pending';?>"><i class="zmdi zmdi-user"></i>Pending Products</a></li>
                <li><a href="<?= $franchise_path.'products/product_approved';?>"><i class="zmdi zmdi-user"></i>Delivery Products</a></li>
                 
              </ul>
            </li>-->
             
             <li>
        <a href="<?= $franchise_path.'profile/change_password';?>" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Change Password</span>
        </a>
      </li>
      <li>
        <a href="<?= $franchise_path.'logout';?>" class="waves-effect">
          <i class="zmdi zmdi-power "></i> <span>Logout</span>
        </a>
      </li>

         
      
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
      Franchise
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