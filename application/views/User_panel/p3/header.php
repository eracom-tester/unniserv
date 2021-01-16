<?php
$u_code=$this->session->userdata('user_id');
$profile=$this->profile->profile_info($u_code);
?>

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
  <link rel="icon" href="" type="image/x-icon">
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
          background-color: #fff !important;
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
        
		
		
.wizard-steps-container {
  position: relative;
  margin: 0 30px;
}
.wizard-steps-container .progress-bar-container {
  left: 20px;
  right: 20px;
  position: absolute;
  height: 12px;
  background-color: #ECECEC;
  top: 50%;
  transform: translateY(-50%);
}
.wizard-steps-container .progress-bar-container .progress-bar {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  height: 100%;
  width: var (--newwth);
  background-color: #0E6CB5;
  transition: width 900ms ease;
}

.steps {
  display: flex;
  justify-content: space-between;
  margin: 60px 0 0;
}
.steps .step {
  height: 40px;
  width: 40px;
  background-color: #ECECEC;
  border-radius: 50%;
  position: relative;
}
.steps .step.done, .steps .step.active {
  background-color: #F5B041;
}
.steps .step.active:after {
  content: "";
  height: 16px;
  width: 16px;
  background-color: #ECECEC;
  position: absolute;
  border-radius: 50%;
  top: 50%;
  left: 50%;
  margin-top: -8px;
  margin-left: -8px;
}
.steps .step .label {
  position: absolute;
  bottom: 100%;
  left: 50%;
  width: 100px;
  margin-left: -50px;
  margin-bottom: 4px;
  text-align: center;
}

 .text{
  text-transform: uppercase;
}

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
        
		
		
.wizard-steps-container {
  position: relative;
  margin: 0 30px;
}
.wizard-steps-container .progress-bar-container {
  left: 20px;
  right: 20px;
  position: absolute;
  height: 12px;
  background-color: #ECECEC;
  top: 50%;
  transform: translateY(-50%);
}
.wizard-steps-container .progress-bar-container .progress-bar {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  height: 100%;
  width: var (--newwth);
  background-color: #0E6CB5;
  transition: width 900ms ease;
}

.steps {
  display: flex;
  justify-content: space-between;
  margin: 60px 0 0;
}
.steps .step {
  height: 40px;
  width: 40px;
  background-color: #ECECEC;
  border-radius: 50%;
  position: relative;
}
.steps .step.done, .steps .step.active {
  background-color: #F5B041;
}
.steps .step.active:after {
  content: "";
  height: 16px;
  width: 16px;
  background-color: #ECECEC;
  position: absolute;
  border-radius: 50%;
  top: 50%;
  left: 50%;
  margin-top: -8px;
  margin-left: -8px;
}
.steps .step .label {
  position: absolute;
  bottom: 100%;
  left: 50%;
  width: 100px;
  margin-left: -50px;
  margin-bottom: 4px;
  text-align: center;
}

 .text{
  text-transform: uppercase;
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
    .form-inline1 > input,select,button {
      vertical-align: middle;
      margin: 5px 5px 5px 0;
      padding: 5px;
      background-color: #fff;
      border: 1px solid #ddd;
    }
    
    
    .form-inline1 > a input,select,button {
      vertical-align: middle;
      margin: 5px 5px 5px 0;
      padding: 5px;
      background-color: #fff;
      border: 1px solid #ddd;
    }
    
    /* Style the submit button */
    /*.form-inline1 button {
      padding: 10px 20px;
      background-color: dodgerblue;
      border: 1px solid #ddd;
      color: white;
    }*/
    
    
    
    .form-inline1 button:hover {
      background-color: royalblue;
    }
    
    /* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
    @media (max-width: 800px) {
      .form-inline1 input {
        margin: 5px 0;
        width:100%;
      }
    
      .form-inline1 {
        flex-direction: column;
        align-items: stretch;
      }
    }


body{
    margin-top:20px;
    background:#688AA0;
}
/**
 * Panels
 */
/*** General styles ***/
.panel {
  box-shadow: none;
}
.panel-heading {
  border-bottom:1px;
}
.panel-title {
  font-size: 17px;
}
.panel-title > small {
  font-size: .75em;
  color: #999999;
}
.panel-body *:first-child {
  margin-top: 0;
  
}
.corner{
    border-radius: 15px;
}
.panel-footer {
  border-top: 0;
}

.panel-default > .panel-heading {
    color: #333333;
    background-color: transparent;
    border-color: rgba(0, 0, 0, 0.07);
}

/**
 * Profile
 */
/*** Profile: Header  ***/
.profile__avatar {
  text-center;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  margin-left: 20px;
  margin-top: 4px;
  overflow: hidden;
}
/*table {
  border-collapse: collapse;
  border-radius: 1em;
  overflow: hidden;
}*/
@media (min-width: 768px) {
  .profile__avatar {
   
    width: 120px;
    height: 120px;
    background:white;
  }
}
.profile__avatar > img {
   
  width: 100%;
  height: 100%;
}
.profile__header {
 
}
.profile__header p {
  margin: 20px 0;
}
/*** Profile: Table ***/
@media (min-width: 992px) {
  .profile__table tbody th {
    width: 200px;
  }
}
/*** Profile: Recent activity ***/
.profile-comments__item {
  position: relative;
  padding: 15px 16px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.profile-comments__item:last-child {
  border-bottom: 0;
}
.profile-comments__item:hover,
.profile-comments__item:focus {
  background-color: #f5f5f5;
}
 hr{
       border: 1px solid #232524; 
                margin: 0;
                width: 295%;
                 border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            } 
            hr:last-child {
display: none;
}

.balance{
    margin-left:10px;
    color:black;

}
.profile-comments__item:hover .profile-comments__controls,
.profile-comments__item:focus .profile-comments__controls {
  visibility: visible;
}
.profile-comments__controls {
  position: absolute;
  top: 0;
  right: 0;
  padding: 5px;
  visibility: hidden;
}
.profile-comments__controls > a {
  display: inline-block;
  padding: 2px;
  color: #999999;
}
.profile-comments__controls > a:hover,
.profile-comments__controls > a:focus {
  color: #333333;
}
/*.profile-comments__avatar {
  display: block;
  float: left;
  margin-right: 20px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  overflow: hidden;
}*/
.profile-comments__avatar > img {
  width: 100%;
  height: auto;
  
}
.profile-comments__body {
  overflow: hidden;
 
}
.profile-comments__sender {
  color: #333333;
  font-weight: 500;
  margin: 5px 0;
}
.profile-comments__sender > small {
  margin-left: 5px;
  font-size: 12px;
  font-weight: 400;
  color: #999999;
}
@media (max-width: 767px) {
  .profile-comments__sender > small {
    display: block;
    margin: 5px 0 10px;
  }
}
.profile-comments__content {
  color: #999999;
}
/*** Profile: Contact ***/
.profile__contact-btn {
  padding: 12px 20px;
  margin-bottom: 20px;
}
.profile__contact-hr {
  position: relative;
  border-color: rgba(0, 0, 0, 0.1);
  margin: 40px 0;
}
.profile__contact-hr:before {
  content: "OR";
  display: block;
  padding: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background-color: #f5f5f5;
  color: #c6c6cc;
}
.profile__contact-info-item {
  margin-bottom: 30px;
}
.profile__contact-info-item:before,
.profile__contact-info-item:after {
  content: " ";
  display: table;
}
.profile__contact-info-item:after {
  clear: both;
}
.profile__contact-info-item:before,
.profile__contact-info-item:after {
  content: " ";
  display: table;
}
.profile__contact-info-item:after {
  clear: both;
}
.profile__contact-info-icon {
  float: left;
  font-size: 18px;
  color: #999999;
}
.profile__contact-info-body {
  overflow: hidden;
  padding-left: 20px;
  color: #999999;
}
.profile__contact-info-body a {
  color: #999999;
}
.profile__contact-info-body a:hover,
.profile__contact-info-body a:focus {
  color: #999999;
  text-decoration: none;
}
.profile__contact-info-heading {
  margin-top: 2px;
  margin-bottom: 5px;
  font-weight: 500;
  color: #999999;
}
.pie-chart {
	background:
		radial-gradient(
			circle closest-side,
			transparent 66%,
			white 0
		),
		conic-gradient(
			#4e79a7 0,
			#4e79a7 38%,
			#f28e2c 0,
			#f28e2c 61%,
			#e15759 0,
			#e15759 77%,
			#76b7b2 0,
			#76b7b2 87%,
			#59a14f 0,
			#59a14f 93%,
			#edc949 0,
			#edc949 100%
	);
	position: relative;
	width: 500px;
	min-height: 350px;
	margin: 0;
	outline: 1px solid #ccc;
}
.pie-chart h2 {
	position: absolute;
	margin: 1rem;
}
.pie-chart cite {
	position: absolute;
	bottom: 0;
	font-size: 80%;
	padding: 1rem;
	color: gray;
}
.pie-chart figcaption {
	position: absolute;
	bottom: 1em;
	right: 1em;
	font-size: smaller;
	text-align: right;
}
.pie-chart span:after {
	display: inline-block;
	content: "";
	width: 0.8em;
	height: 0.8em;
	margin-left: 0.4em;
	height: 0.8em;
	border-radius: 0.2em;
	background: currentColor;
}
#chart_wrap {
    position: relative;
    padding-bottom: 100%;
    height: 0;
    overflow:hidden;
}

#chart_div {
    position: absolute;
    top: 0;
    left: 0;
    width:100%;
    height:100%;
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
    
</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">
  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="<?= base_url();?>index">
       <img src="<?= $this->conn->company_info('logo');?>" class="logo-icon" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?= $this->conn->company_info('logo_width');?>;height:<?= $this->conn->company_info('logo_height');?>">
       <!--<h5 class="logo-text"> <?= $this->conn->company_info('company_name');?></h5>-->
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <!--<li class="sidebar-header">MAIN NAVIGATION</li>-->
      <li>
        <a href="<?= $panel_path.'dashboard';?>" class="waves-effect text">
          <i class="zmdi zmdi-home"></i> <span>Dashboard</span>          
        </a>
      </li>
      
      <?php
      if($this->conn->plan_setting('profile_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect text">
              <i class="zmdi zmdi-account"></i> <span>My Account</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('profile_page')==1){  ?>
              <li><a href="<?= $panel_path.'profile';?>" class="text"><i class="zmdi zmdi-user "></i>Profile</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('profile_page')==1){  ?>
              <li><a href="<?= $panel_path.'profile/edit-profile';?>" class="text"><i class="zmdi zmdi-user"></i>Edit Profile</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('change_password')==1){  ?>
              <li><a href="<?= $panel_path.'profile/change-password';?>" class="text"><i class="zmdi zmdi-user"></i>Change Password</a></li>
            <?php } ?>
              
            </ul>
          </li>
          <?php } ?>
      
      <?php
      if($this->conn->plan_setting('fund_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect text">
              <i class="fa fa-credit-card"></i> <span>Fund</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('add_fund')==1){  ?>
              <li><a href="<?= $panel_path.'fund/fund-add';?>" class="text"><i class="zmdi zmdi-user"></i>Add Fund</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('fund_deposit')==1){  ?>
              <li><a href="<?= $panel_path.'fund/fund-deposit';?>" class="text"><i class="zmdi zmdi-user"></i>Deposit Fund</a></li>
            <?php } ?>
             <?php  if($this->conn->plan_setting('fund_request')==1){  ?>
              <li><a href="<?= $panel_path.'fund/fund-request';?>" class="text"><i class="zmdi zmdi-user"></i>Fund request</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('transfer_fund')==1){  ?>
              <li><a href="<?= $panel_path.'fund/fund-transfer';?>" class="text"><i class="zmdi zmdi-user"></i>Transfer Fund</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('fund_convert')==1){  ?>
             <li><a href="<?= $panel_path.'fund/fund-convert';?>" class="text"><i class="zmdi zmdi-user"></i>Fund Convert</a></li>
             
		    <?php } ?>
            <?php  if($this->conn->plan_setting('withdraw_fund')==1 && $this->conn->setting('earning_type')=='withdrawal'){  ?>
              <li><a href="<?= $panel_path.'fund/fund-withdraw';?>" class="text"><i class="zmdi zmdi-user"></i>Withdrawal</a></li>
            <?php } ?>
             
            <?php  if($this->conn->plan_setting('fund_request')==1){  ?>
               <li><a href="<?= $panel_path.'fund/request_history';?>"><i class="zmdi zmdi-user"></i> FUND REQUEST HISTORY</a></li>
		    <?php } ?>
		    
            </ul>
          </li>
          <?php } ?>
      
      <?php
      if($this->conn->plan_setting('team_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect text">
              <i class="fa fa-users"></i> <span>Team</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('direct_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-direct';?>" class="text"><i class="zmdi zmdi-user"></i>Direct</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('generation_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-generation';?>" class="text"><i class="zmdi zmdi-user"></i>Generation</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('single_leg_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-single-leg';?>" class="text"><i class="zmdi zmdi-user"></i>Single Leg</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('left_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-left';?>" class="text"><i class="zmdi zmdi-user"></i>Left Team</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('right_team')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-right';?>" class="text"><i class="zmdi zmdi-user"></i>Right Team</a></li>
            <?php } ?>
              
            <?php  if($this->conn->plan_setting('tree')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-tree';?>" class="text"><i class="zmdi zmdi-user"></i>Tree</a></li>
            <?php } ?>
               <?php  if($this->conn->plan_setting('matrix')==1){  ?>
              <li><a href="<?= $panel_path.'team/team-matrix';?>" class="text"><i class="zmdi zmdi-user"></i>Matrix</a></li>
            <?php } ?>
              
            </ul>
          </li>
          <?php } ?>
      <?php
      if($this->conn->plan_setting('kyc_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect text">
              <i class="fa fa-file"></i> <span>KYC</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('adhaar_kyc')==1){  ?>
              <li><a href="<?= $panel_path.'kyc/adhaar';?>" class="text"><i class="zmdi zmdi-user"></i>Adhaar</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('pan_kyc')==1){  ?>
              <li><a href="<?= $panel_path.'kyc/pan';?>" class="text"><i class="zmdi zmdi-user"></i>Pan</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('bank_kyc')==1){  ?>
              <li><a href="<?= $panel_path.'kyc/bank';?>" class="text"><i class="zmdi zmdi-user"></i>Bank</a></li>
            <?php } ?>
             
              
            </ul>
          </li>
          <?php } ?>
      <?php
      if($this->conn->plan_setting('pin_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect text">
              <i class="fa fa-thumb-tack"></i> <span>E-pin</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('generate_pin')==1){  ?>
              <li><a href="<?= $panel_path.'pin/pin-generate';?>" class="text"><i class="zmdi zmdi-user"></i>Generate pin</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('transfer_pin')==1){  ?>
              <li><a href="<?= $panel_path.'pin/pin-transfer';?>" class="text"><i class="zmdi zmdi-user"></i>Transfer</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('pin_history')==1){  ?>
              <li><a href="<?= $panel_path.'pin/pin-history';?>" class="text"><i class="zmdi zmdi-user"></i>History</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('pin_box')==1){  ?>
              <li><a href="<?= $panel_path.'pin/pin-box';?>" class="text"><i class="zmdi zmdi-user"></i>Pinbox</a></li>
            <?php } ?>
             
              
            </ul>
          </li>
          <?php } ?>
      
      <?php
      if($this->conn->plan_setting('invest_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect text">
              <i class="zmdi zmdi-accounts-add"></i> <span>Membership</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
            <?php  if($this->conn->plan_setting('investment')==1){  ?>
              <li><a href="<?= $panel_path.'invest/investment';?>" class="text"><i class="zmdi zmdi-user"></i>Topup</a></li>
            <?php } ?>
            <?php  if($this->conn->plan_setting('reinvestment')==1){  ?>
              <li><a href="<?= $panel_path.'invest/reinvestment';?>" class="text"><i class="zmdi zmdi-user"></i>Re-Topup</a></li>
            <?php } ?>
            </ul>
          </li>
        <?php } ?>
      
       <!-- <li>
            <a href="#" class="waves-effect text">
              <i class="zmdi zmdi-accounts-add"></i> <span>Orders</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
           
              <li><a href="<?= $panel_path.'orders';?>" class="text"><i class="zmdi zmdi-user"></i>My Orders</a></li>
          
              <li><a href="<?= $panel_path.'orders/gen_details';?>" class="text"><i class="zmdi zmdi-user"></i>Generation Order</a></li>
           
            </ul>
          </li>-->
      
        <!--<li>
            <a href="#" class="waves-effect text">
              <i class="zmdi zmdi-accounts-add"></i> <span>Report</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="<?= $panel_path.'transactions/paid_payout';?>" class="text"><i class="zmdi zmdi-user"></i>Paid Payout</a></li>
            </ul>
          </li> -->
          <?php
      if($this->conn->plan_setting('product_section')==1){
          ?>
          <li>
            <a href="<?= base_url();?>products" class="waves-effect text">
              <i class="fa fa-cart-plus"></i> <span>Shopping</span>          
            </a>
          </li> 
        <li>
            <a href="<?= $panel_path.'orders';?>" class="waves-effect text">
              <i class="fa fa-money"></i> <span>Orders</span>          
            </a>
          </li>
      <?php
      }
      if($this->conn->plan_setting('income_section')==1){
          ?>
          <li>
            <a href="#" class="waves-effect text">
              <i class="zmdi zmdi-accounts-add"></i> <span>Incomes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
           <?php
            $reg_plan=$this->session->userdata('reg_plan');
           
               $all_income=$this->conn->runQuery('*','wallet_types',"wallet_type='income' and status='1' and $reg_plan='1' ");
               if($all_income){
                   foreach($all_income as $income){
                       ?>
                       <li><a href="<?= $panel_path.'income/details?source='.$income->slug;?>" class="text"><i class="fa fa-money"></i><?= $income->name;?></a></li>
                       <?php
                   }
               }
               ?>
            </ul>
          </li>
          
          
        <?php } ?>
       <li>
            <a href="#" class="waves-effect text">
              <i class="zmdi zmdi-accounts-add"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
           
              <li><a href="<?= $panel_path.'income/level_report';?>" class="text"><i class="zmdi zmdi-user"></i>Level Report</a></li>
              <li><a href="<?= $panel_path.'income/repurchase_report';?>" class="text"><i class="zmdi zmdi-user"></i>Repurchase Report</a></li>
              <li><a href="<?= $panel_path.'income/royalty_report';?>" class="text"><i class="zmdi zmdi-user"></i>Royalty Report</a></li>
              
            <?php  if($this->conn->setting('earning_type')=='payout'){  ?>
              <li><a href="<?= $panel_path.'transactions/payouts';?>" class="text"><i class="zmdi zmdi-user"></i>Payout Report</a></li>
            <?php } ?>
            <?php  if($this->conn->setting('earning_type')=='withdrawal'){  ?>
              <li><a href="<?= $panel_path.'transactions/withdrawals';?>" class="text"><i class="zmdi zmdi-user"></i>Withdrawal Report</a></li>
            <?php } ?>
            
           
            </ul>
          </li>
          
      <?php
        /*if($this->conn->plan_setting('transactions_section')==1){
            ?>
            <li>
              <a href="<?= $panel_path.'transactions';?>" class="waves-effect text">
                <i class="fa fa-exchange"></i> <span>Transactions</span>          
              </a>
            </li> 
      <?php }*/ ?>
        
        
         <li>
              <a href="<?= $panel_path.'team/reward';?>" class="waves-effect text">
                <i class="fa fa-ticket"></i> <span>Reward</span>          
              </a>
            </li> 
          
      <?php
        if($this->conn->plan_setting('support_section')==1){
            ?>
            <li>
              <a href="<?= $panel_path.'support';?>" class="waves-effect text">
                <i class="fa fa-ticket"></i> <span>Support</span>          
              </a>
            </li> 
      <?php } ?>
      
        
      
      
      
    
         
      <li><a href="<?= $panel_path.'logout';?>" class="waves-effect text"><i class="fa fa-sign-out "></i> <span>Logout</span></a></li>
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
     <div class="nk-news-text" style="color:black;">
         <?php 
            echo $this->conn->server_time();
        ?>
    </div>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
       &nbsp;&nbsp;
    <script type="text/javascript">
         function googleTranslateElementInit() {
         new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    </script>
    <!--<script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
        </script>-->
        
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
         <li class="nav-item"><div id="google_translate_element"></div></li>
     <li class="nav-item dropdown-lg">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
            <i class="zmdi zmdi-notifications-active"></i><span class="badge badge-info badge-up"></span></a>
              <div class="dropdown-menu dropdown-menu-right">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                  <?php $cnt_notifications=$this->notification->notifications_count($u_code);
                  if($cnt_notifications>0){
                      ?>
                      You have <?= $cnt_notifications;?> Notifications
                      <span class="badge badge-info"><?= $cnt_notifications;?></span>
                      <?php
                  }else{
                      echo "No Notification.";
                  }
                  ?>
                  
                  </li>
                  <?php
                  
                   
                  if($cnt_notifications>0){
                      
                      $all_notifications=$this->notification->all_notifications($u_code);
                      
                      if(!empty($all_notifications)){
                          $nn=0;
                          foreach($all_notifications as $notification){
                              $nn++;
                              $n_id=$notification->id;
                              $check_read=$this->notification->read_status($u_code,$n_id);
                              
                              $bg_no= $check_read===true ? '':'#dddddd';
                              ?>
                                <li style="background-color:<?= $bg_no;?>;" class="  list-group-item">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <i class="zmdi zmdi-notifications-active fa-2x mr-3 text-danger"></i>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title"><?= $notification->title;?></h6>
                                                <p class="msg-info"><?= $notification->message;?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                              <?php
                              if($nn>2){
                                  break;
                              }
                          }
                      }
                      ?>
                  <li class="list-group-item text-center"><a href="<?= $panel_path.'notification';?>">See All Notifications</a></li>
                  <?php }?>
                </ul>
              </div>
        </li> 
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <?php  if($profile->img!=''){?>
        <span class="user-profile"><img src="<?=base_url('images/users/').$profile->img;?>" class="img-circle" alt="user avatar"></span>
         <?php }else{ ?>
         <span class="user-profile"><img src="<?= $this->conn->company_info('logo');?>" class="img-circle" alt="user avatar"></span>
         	<?php } ?>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="<?= $panel_path.'profile';?>">
           <div class="media">
            <?php  if($profile->img!=''){?>
             <div class="avatar"><img class="align-self-start mr-3" src="<?=base_url('images/users/').$profile->img;?>" alt="user avatar"></div>
             <?php }else{ ?>
              <div class="avatar"><img class="align-self-start mr-3" src="<?= $this->conn->company_info('logo');?>" alt="user avatar"></div>
             <?php } ?>
             
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