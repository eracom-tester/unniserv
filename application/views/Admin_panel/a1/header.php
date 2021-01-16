<?php 
$pend_sup_tk=$this->conn->runQuery('COUNT(id) as suppt','support',"status='0'")[0]->suppt;
$pend_widrawal_notification=$this->conn->runQuery('COUNT(id) as widrawal','transaction',"tx_type='withdrawal' and status='0'")[0]->widrawal;
$pend_kyc_notification=$this->conn->runQuery('COUNT(id) as kyc_id','user_accounts',"pan_kyc_status='submitted' or bank_kyc_status='submitted' or adhaar_kyc_status='submitted'")[0]->kyc_id;
//$pend_epin_notification=$this->conn->runQuery('COUNT(id) as pin_id','epin_requests',"status='0'")[0]->pin_id;
?>

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
    <link rel="stylesheet" href="<?= $panel_url;?>assets/plugins/summernote/dist/summernote-bs4.css"/>
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
    <style>
    .topright {
     // border: 1px solid black;
    }    
        
    .form-inline1 {
      display: flex;
      flex-flow: row wrap;
      align-items: center;
    }
    
    /* Add some margins for each label */
    .form-inline1 label {
      margin: 5px 5px 5px 0;
    }
    
    /* Style the input fields */
    .form-inline1 input,select {
      vertical-align: middle;
      margin: 5px 5px 5px 0;
      padding: 5px;
      background-color: #fff;
      border: 1px solid #ddd;
      
    }
    
    /* Style the submit button */
    .form-inline1 button {
      padding: 10px 20px;
      background-color: dodgerblue;
      border: 1px solid #ddd;
      color: white;
    }
    
    
    
    .form-inline1 button:hover {
      background-color: royalblue;
    }
    
    /* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
    @media (max-width: 800px) {
      .form-inline1 input {
        margin: 5px 0;
        width:100% !important;
        
      }
    
      .form-inline1 {
        flex-direction: column;
        align-items: stretch;
      }
    }
    @media (min-width: 800px) {
      .form-inline1 input,select {
        max-width:150px;
      }
    }

 
        
    </style>
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo bg-white">
      <a href="<?= base_url();?>index">
       <img src="<?= $this->conn->company_info('logo');?>" class="logo-icon" alt="<?= $this->conn->company_info('company_name');?>" style="width:60px;height:">
       <h5 class="logo-text text-muted"> Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <!--<li class="sidebar-header">MAIN NAVIGATION</li>-->
      
       <?php
        $sub_admin=$this->session->userdata("admin_type"); 
        $admin_rights=$this->session->userdata("admin_rights");
        $all_admin_rights=$admin_rights!='' ? json_decode($admin_rights):false;
        //print_R($all_admin_rights);
        if(($all_admin_rights && (in_array('dashboard',$all_admin_rights) && $sub_admin=='subadmin')) || $sub_admin=='admin' || $sub_admin=='controller'){
      ?>
      <li><a href="<?= $admin_path.'dashboard';?>" class="waves-effect"><i class="zmdi zmdi-home"></i> <span>Dashboard</span></a></li>

<?php }
 if(($all_admin_rights && (in_array('users',$all_admin_rights) && $sub_admin=='subadmin')) || $sub_admin=='admin' || $sub_admin=='controller'){
      ?>
      <li>
          
        <a href="" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="<?= $admin_path.'users';?>"><i class="zmdi zmdi-star-outline"></i>All Users</a></li>
          
        </ul>
      </li>
           <?php
      if($this->conn->plan_setting('team_section')==1){
          ?>
            <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Network</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                 <?php  if($this->conn->plan_setting('generation_team')==1){  ?>
                <li><a href="<?= $admin_path.'team/team-generation';?>"><i class="zmdi zmdi-user"></i>Generation Team</a></li>
                 <?php
               
                }
               ?>
                
                <?php  if($this->conn->plan_setting('matrix')==1){  ?>
                <li><a href="<?= $admin_path.'team/team_matrix';?>"><i class="zmdi zmdi-user"></i>Matrix</a></li>
               <?php
               
                }
               ?>
               </ul>
            </li>
           <?php
               
                }
               ?>

     <?php } ?>
     <!-- <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-pin"></i> <span>Packages</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="<?= $admin_path.'packages';?>"><i class="zmdi zmdi-user"></i>All</a></li>
              <li><a href="<?= $admin_path.'packages/create';?>"><i class="zmdi zmdi-user"></i>Create</a></li>
            </ul>
          </li>-->
      <?php
      if($this->conn->plan_setting('pin_section')==1){
        
                
            if(((in_array('pin/pin-history',$all_admin_rights) || in_array('packages/create',$all_admin_rights) || in_array('packages',$all_admin_rights) || in_array('pin/pin-box',$all_admin_rights) || in_array('pin/send',$all_admin_rights)) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
             
          ?>
          <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-pin"></i> <span>E-pin</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <?php
                 if((in_array('pin/send',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
               ?>
                
              <li><a href="<?= $admin_path.'pin/send';?>"><i class="zmdi zmdi-user"></i>Send</a></li>
              <?php } ?>
             <?php
                if($this->conn->plan_setting('pin_retrieve')==1){
                if((in_array('pin/retrieve',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
               ?>
                
              <li><a href="<?= $admin_path.'pin/retrieve';?>"><i class="zmdi zmdi-user"></i>Pin Retrieve</a></li>
              <li><a href="<?= $admin_path.'pin/pin-retreive-detail';?>"><i class="zmdi zmdi-user"></i>Pin Retrieve History</a></li>
              <?php } } ?>
           
            <?php  if($this->conn->plan_setting('pin_history')==1){  ?>
            <?php
                 if((in_array('pin/pin-history',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
               ?>
              <li><a href="<?= $admin_path.'pin/pin-history';?>"><i class="zmdi zmdi-user"></i>History</a></li>
              
              <?php
                 }
                 if((in_array('pin/pin-box',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
               ?>
              <li><a href="<?= $admin_path.'pin/pin-box';?>"><i class="zmdi zmdi-user"></i>Pin Box</a></li>
            <?php } }?>
            <?php
      
                 if((in_array('packages',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
               ?>
               <li><a href="<?= $admin_path.'packages';?>"><i class="zmdi zmdi-user"></i>All</a></li>
               <?php
                 }
                 if((in_array('packages/create',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
               ?>
              <li><a href="<?= $admin_path.'packages/create';?>"><i class="zmdi zmdi-user"></i>Create</a></li>
              <?php } ?>
            </ul>
          </li>
          <?php }} ?>
             
           <!--  <li>
            <a href="#" class="waves-effect">
              <i class="zmdi zmdi-pin"></i> <span>Package</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="<?= $admin_path.'packages/send';?>"><i class="zmdi zmdi-user"></i>Send</a></li>
               <li><a href="<?= $admin_path.'packages';?>"><i class="zmdi zmdi-user"></i>All</a></li>
              <li><a href="<?= $admin_path.'packages/create';?>"><i class="zmdi zmdi-user"></i>Create</a></li>
             
              
            </ul>
          </li> -->
            <!--<li>
                  <a href="<?= $admin_path.'packages/rank';?>" class="waves-effect">
                    <i class="zmdi zmdi-receipt"></i> <span>Make Rank</span>          
                  </a>
            </li> -->  
           <?php
             if(((in_array('franchise/pending_payouts',$all_admin_rights) || in_array('franchise/payouts',$all_admin_rights) || in_array('franchise/pending-stock',$all_admin_rights) || in_array('franchise/repurchase-order-history',$all_admin_rights) || in_array('franchise/add',$all_admin_rights) || in_array('franchise/users',$all_admin_rights) || in_array('franchise/sale',$all_admin_rights) || in_array('franchise/purchase',$all_admin_rights) || in_array('franchise/stock-list',$all_admin_rights)) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
             ?>
            
            <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Franchise</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                <?php
                    if((in_array('franchise/add',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                  ?>  
                  
                <li><a href="<?= $admin_path.'franchise/add';?>"><i class="zmdi zmdi-user"></i>Add franchise</a></li>
                <?php }
                  if((in_array('franchise/users',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                
                <li><a href="<?= $admin_path.'franchise/users';?>"><i class="zmdi zmdi-user"></i>Franchise Details</a></li>
                <?php }
                 if((in_array('franchise/pending-stock',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
               <li><a href="<?= $admin_path.'franchise/pending-stock';?>"><i class="zmdi zmdi-user"></i>Franchise Pending Stock</a></li>
               <?php }
                if((in_array('franchise/purchase',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
               <li><a href="<?= $admin_path.'franchise/purchase';?>"><i class="zmdi zmdi-user"></i>Franchise Purchase</a></li>
               <?php }
                if((in_array('franchise/repurchase-order-history',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
               <li><a href="<?= $admin_path.'franchise/repurchase-order-history';?>"><i class="zmdi zmdi-user"></i>Repurchase Order History</a></li>
               <?php }
                  if((in_array('franchise/sale',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                
               <li><a href="<?= $admin_path.'franchise/sale';?>"><i class="zmdi zmdi-user"></i>Sale Product</a></li>
               <?php }
                  
                  if((in_array('franchise/stock-list',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
              <!-- <li><a href="<?= $admin_path.'franchise/stock-list';?>"><i class="zmdi zmdi-user"></i>Stock List</a></li>-->
               <?php }
                   if($this->conn->plan_setting('franchise_payout')==0){
                 
                  if((in_array('franchise/payouts',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li><a href="<?= $admin_path.'franchise/payouts';?>"><i class="zmdi zmdi-user"></i>Paid Payout</a></li>
                <?php }
                  if((in_array('franchise/pending_payouts',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li><a href="<?= $admin_path.'franchise/pending_payouts';?>"><i class="zmdi zmdi-user"></i>Pending Payout</a></li>
                <?php } 
                  }
                ?>
              </ul>
            </li>
            <?php } ?> 
            
            
           <?php
            if($this->conn->plan_setting('withdraw_fund')==1 && $this->conn->setting('earning_type')=='withdrawal'){
          ?>
            <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Withdrawals&nbsp;<span class="badge badge-danger"><?php if($pend_widrawal_notification){ echo $pend_widrawal_notification;}else{ echo'';} ?></span></span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                  <?php
                  if((in_array('withdrawal/pending',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li><a href="<?= $admin_path.'withdrawal/pending';?>"><i class="zmdi zmdi-user"></i>Pending</a></li>
                <?php }
                  if((in_array('withdrawal/approved',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li><a href="<?= $admin_path.'withdrawal/approved';?>"><i class="zmdi zmdi-user"></i>Approved</a></li>
                <?php }
                  if((in_array('withdrawal/cancelled',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li><a href="<?= $admin_path.'withdrawal/cancelled';?>"><i class="zmdi zmdi-user"></i>Cancelled</a></li>
                <?php }
                 
                ?>
              </ul>
            </li>
          <?php } ?>  
          
          <?php
            if($this->conn->plan_setting('kyc_section')==1){
                 if(((in_array('kyc/pending',$all_admin_rights) || in_array('kyc/approved',$all_admin_rights) || in_array('kyc/cancelled',$all_admin_rights)) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
          ?>
           <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Kyc&nbsp;<span class="badge badge-danger"><?php if($pend_kyc_notification){ echo $pend_kyc_notification;}else{ echo'';} ?></span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                   <?php
                  if((in_array('kyc/pending',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li><a href="<?= $admin_path.'kyc/pending';?>"><i class="zmdi zmdi-user"></i>Pending</a></li>
                 <?php }
                  if((in_array('kyc/approved',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li><a href="<?= $admin_path.'kyc/approved';?>"><i class="zmdi zmdi-user"></i>Approved</a></li>
                 <?php }
                  if((in_array('kyc/cancelled',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li><a href="<?= $admin_path.'kyc/cancelled';?>"><i class="zmdi zmdi-user"></i>Cancelled</a></li>
                 <?php }
                 
                ?>
              </ul>
            </li>
        
        <?php } }?>  
             
         
       
       <!-- <li>
          <a href="<?= $admin_path.'rates';?>" class="waves-effect">
            <i class="zmdi zmdi-receipt"></i> <span>Live rates</span>          
          </a>
        </li> 
        <li>
                  <a href="#" class="waves-effect">
                    <i class="zmdi zmdi-account-box-mail"></i> <span>Feature</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="sidebar-submenu">
                    <li><a href="<?= $admin_path.'product/features';?>"><i class="zmdi zmdi-user"></i>All features</a></li>
                     
                    
                    
                  </ul>
                </li>-->
        <?php
            if($this->conn->plan_setting('product_section')==1){
                 if(((in_array('product',$all_admin_rights) || in_array('product/categories',$all_admin_rights) || in_array('product/add-product',$all_admin_rights)) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li>
                  <a href="#" class="waves-effect">
                    <i class="zmdi zmdi-label"></i> <span>Product</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="sidebar-submenu">
                      <?php
                  if((in_array('product',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                    <li><a href="<?= $admin_path.'product';?>"><i class="zmdi zmdi-user"></i>All Products</a></li>
                    <?php }
                  if((in_array('product/categories',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                    <li><a href="<?= $admin_path.'product/categories';?>"><i class="zmdi zmdi-user"></i>All Categories</a></li>
                    <?php }
                  if((in_array('product/add-product',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                    <li><a href="<?= $admin_path.'product/add-product';?>"><i class="zmdi zmdi-user"></i>Add Product</a></li>
                     <?php } ?>
                    
                  </ul>
                </li>
          <?php } } ?>        
        
      
         <?php
            if($this->conn->plan_setting('income_section')==1){
                ?>
                <?php
                  if((in_array('income',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li>
                  <a href="<?= $admin_path.'income';?>" class="waves-effect">
                    <i class="zmdi zmdi-labels"></i> <span>Income</span>          
                  </a>
                </li> 
                 <?php } ?>
          <?php } ?>
          <?php
            if($this->conn->plan_setting('transactions_section')==1){
                ?>
                <?php
                  if((in_array('transactions',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                <li>
                  <a href="<?= $admin_path.'transactions';?>" class="waves-effect">
                    <i class="zmdi zmdi-receipt"></i> <span>Transactions</span>          
                  </a>
                </li> 
                 <?php } ?>
          <?php }
            if((in_array('fund/fund_transfer',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
           <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Fund</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                <li><a href="<?= $admin_path.'fund/fund_transfer';?>"><i class="zmdi zmdi-user"></i>Add Fund</a></li>
                <?php
            if($this->conn->plan_setting('fund_request')==1){
                ?>
                 <li><a href="<?= $admin_path.'fund/pending';?>"><i class="zmdi zmdi-user"></i>Pending Fund Request</a></li>
                 <li><a href="<?= $admin_path.'fund/approved';?>"><i class="zmdi zmdi-user"></i>Approved Fund Request</a></li>
                  <li><a href="<?= $admin_path.'fund/cancelled';?>"><i class="zmdi zmdi-user"></i>Cancelled Fund Request</a></li>
                <?php } ?>
              </ul>
            </li>
            <?php } ?>
         
         
          
          
            <!--<li>
                  <a href="<?= $admin_path.'transactions';?>" class="waves-effect">
                    <i class="zmdi zmdi-receipt"></i> <span>Commission</span>          
                  </a>
                </li> -->
                <?php  if($this->conn->setting('earning_type')=='payout'){  ?>
             <?php
                 if(((in_array('transactions/payouts',$all_admin_rights) || in_array('transactions/pending_payouts',$all_admin_rights)) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                 ?>
             <li>
                  <a href="#" class="waves-effect">
                    <i class="zmdi zmdi-label"></i> <span>Payout</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="sidebar-submenu">
                    <?php 
            if((in_array('transactions/payouts',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>  
                    <li><a href="<?= $admin_path.'transactions/payouts';?>"><i class="zmdi zmdi-user"></i>Paid Payout</a></li>
                    <?php }
            if((in_array('transactions/pending_payouts',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>
                    <li><a href="<?= $admin_path.'transactions/pending_payouts';?>"><i class="zmdi zmdi-user"></i>Pending Payout</a></li>
                    <?php }
           
                ?>
                  </ul>
                </li>    
                <?php } ?> 
                <?php }?>
           <!-- <li>
                  <a href="<?= $admin_path.'transactions/payouts';?>" class="waves-effect">
                    <i class="zmdi zmdi-receipt"></i> <span>Payouts</span>          
                  </a>
                </li> -->
            <?php 
            if((in_array('advance/alert',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>  
             <li><a href="<?= $admin_path.'advance/alert';?>" class="waves-effect"><i class="zmdi zmdi-notifications-active "></i> <span>Alerts</span></a></li>
              <?php 
            }
            if((in_array('home/banners',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>  
             <li><a href="<?= $admin_path.'home/banners';?>" class="waves-effect"><i class="zmdi zmdi-flag "></i> <span>Banners</span></a></li>
             <?php 
            }
            if(((in_array('ad/add_treatment',$all_admin_rights) || in_array('ad/treatments',$all_admin_rights)) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>   
             
             <li>
                 
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Treatment</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                <?php 
            
            if((in_array('ad/add_treatment',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>      
                <li><a href="<?= $admin_path.'ad/add_treatment';?>"><i class="zmdi zmdi-user"></i>Add treatment</a></li>
                 <?php 
            }
            if((in_array('ad/treatments',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>   
                <li><a href="<?= $admin_path.'ad/treatments';?>"><i class="zmdi zmdi-user"></i>Treatments</a></li>
                
                <?php 
            } ?>
              </ul>
            </li>
             <?php 
            }
            if((in_array('ad/add_blog',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?> 
             <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Blog</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                   <?php 
          
            if((in_array('ad/add_blog',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?> 
                <li><a href="<?= $admin_path.'ad/add_blog';?>"><i class="zmdi zmdi-user"></i>Add Blog</a></li>
                <?php 
            }
            if((in_array('ad/blogs',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?> 
                <li><a href="<?= $admin_path.'ad/blogs';?>"><i class="zmdi zmdi-user"></i>Blogs</a></li>
              <?php }
            
            ?>  
                
              </ul>
            </li>
            <?php }
            
            ?>
            <?php 
           
            if((in_array('ad/add_achiever',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?> 
             <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Achiever</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                   <?php 
           
            if((in_array('ad/add_achiever',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?> 
                <li><a href="<?= $admin_path.'ad/add_achiever';?>"><i class="zmdi zmdi-user"></i>Add Achiever</a></li>
                 <?php 
            }
            if((in_array('ad/achievers',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?> 
                <li><a href="<?= $admin_path.'ad/achievers';?>"><i class="zmdi zmdi-user"></i>Achievers</a></li>
                <?php } ?>
                
              </ul>
            </li>
            <?php } ?>
            <?php 
           
            if((in_array('support/pending',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>   
          <li>
              <a href="#" class="waves-effect">
                <i class="zmdi zmdi-account-box-mail"></i> <span>Support&nbsp;<span class="badge badge-danger"><?php if($pend_sup_tk){ echo $pend_sup_tk;}else{ echo'';} ?></span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="sidebar-submenu">
                  <?php 
           
            if((in_array('support/pending',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>   
                <li><a href="<?= $admin_path.'support/pending';?>"><i class="zmdi zmdi-user"></i>Pending</a></li>
                <?php 
            }
             
           
            if((in_array('support/approved',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?> 
                <li><a href="<?= $admin_path.'support/approved';?>"><i class="zmdi zmdi-user"></i>Approved</a></li>
                <?php } ?>
                
              </ul>
            </li>
             <?php 
            }
                ?> 
                
             <?php 
           
            if((in_array('order',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?>      
            <li><a href="<?= $admin_path.'order';?>" class="waves-effect"><i class="zmdi zmdi-storage "></i> <span>Orders</span></a></li>
            <?php 
            }
            ?>
           <!-- <li><a href="<?= $admin_path.'register';?>" class="waves-effect"><i class="zmdi zmdi-account-add "></i> <span>Register</span></a></li>-->
           <li>
                  <a href="#" class="waves-effect">
                    <i class="zmdi zmdi-account-box-mail"></i> <span>Notifications</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="sidebar-submenu">
                    <li><a href="<?= $admin_path.'notification';?>"><i class="zmdi zmdi-user"></i>All</a></li>
                    <li><a href="<?= $admin_path.'notification/add';?>"><i class="zmdi zmdi-user"></i>Add New</a></li>
                  </ul>
                </li> 
            <?php
            if($this->conn->plan_setting('subadmin')==1){
                 if((in_array('admin/subadmin',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
            ?>
            <li><a href="<?= $admin_path.'admin/subadmin';?>" class="waves-effect"><i class="zmdi zmdi-account-add "></i> <span>Create Subadmin</span></a></li>
           <?php } } ?>
           
            <?php
            if($this->conn->plan_setting('auto_register')==1){
                 if((in_array('admin/subadmin',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
            ?>
            <li><a href="<?= $admin_path.'users/auto_register';?>" class="waves-effect"><i class="zmdi zmdi-account-add "></i> <span>Auto Register</span></a></li>
           <?php } } ?>
           
           <!-- <li><a href="<?= $admin_path.'register';?>" class="waves-effect"><i class="zmdi zmdi-account-add "></i> <span>Register</span></a></li>-->
           <?php
            if((in_array('users/change-password',$all_admin_rights) && $sub_admin=='subadmin') || $sub_admin=='admin' || $sub_admin=='controller'){
                ?> 
            <li><a href="<?= $admin_path.'users/change-password';?>" class="waves-effect"><i class="zmdi zmdi-key "></i> <span>Change Password</span></a></li>
            <?php } ?>
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