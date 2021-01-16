<?php
if(isset($_GET['id'])){
 echo"<pre>";
 print_R($_GET);
}

?>

<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-language" content="en" />

<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/animate.min.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/boxicons.min.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/flaticon.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/nice-select.min.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/rangeSlider.min.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/fancybox.min.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/magnific-popup.min.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/style.css">
        <link rel="stylesheet" href="<?= $panel_url;?>assets/css/responsive.css">

        <!--<title><?php echo $this->conn->company_info('company_name');?></title>-->
        <title>Best Binary MLM Software | Binary MLM Plan Calculation</title>
        
        <meta name="description" content="MLM Binary Plan is affordable Simple MLM Plan. Free Binary MLM Software Demo India. Most popular and widely used MLM (Multi Level Marketing) plans in Haryana." />
       <link rel="canonical" href="<?= base_url();?>binary-plan" />
       <meta name="google-site-verification" content="tMik7ygs-T2-eOqWqBt1fOS1XTnJoF1m3eV5zVtfE4w" />
       <meta name="msvalidate.01" content="27BA8930FCC4EE47B1DFE6D2430C9130" />
       <meta property="og:title" content="MLM Software">
       <meta property="og:site_name" content="MLM Ready Made">
       <meta property="og:url" content="https://www.mlmreadymade.com/">
       <meta property="og:description" content="MLM Ready Made software is one of the best mlm software solutions available in the multi level marketing world to manage, control and organize your network marketing business.">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="https://www.mlmreadymade.com/" />
<meta name="twitter:title" content="MLM Software" />
<meta name="twitter:description" content="MLM Ready Made software is one of the best mlm software solutions available in the multi level marketing world to manage, control and organize your network marketing business." />
<meta name="twitter:image" content="" />

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-173916566-1');
</script>

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "MLM Ready Made",
    "url": "https://www.mlmreadymade.com/",
    "address": "Shastri Colony, Near HP Petrol Pump, Pehowa, Kurukshetra, 136128",
    "sameAs": [
      "https://www.facebook.com/mlmready.made",
      "https://twitter.com/mlmreadymade"
    ]
  }
</script>
        <link rel="icon" type="image/png" href="<?= $this->conn->company_info('symbol');?>">
        
        
        <style>
		.font{
			font-size:13px;
		}
		
		
		
		* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

ul {
    list-style-type: none;
}
a {
    color: white;
    text-decoration: none;
}
.submenu-icon {
    color: #111;
}
li a:hover {
    text-decoration: ;
    color: #ff5d22;
}

.menu {
    background-color: #ffffff;
}
.submenu {
   border-top: 3px solid #ff5d22;
   background-color: #dbfbff;
   
  
}
.menu li {
    padding: 10px;
}


.menu {
    display: flex;
    align-items: center;
    text-align: center;
    width: 90vw;
    margin: 10px 5vw;
    height: 60px;
    position: relative;
}
.menu-item {
    flex: ;
	margin: 18px;

  
  
  
}
.menu-item > a {
    line-height: 40px;
	color: black;
	top: 70px;
}
.submenu {
    width: 100vw;
    position: absolute;
    top: 90px;
    right: 0;
    text-align: left;
    display: flex;
    flex-direction: column;
}
.submenu-item {
    padding: 15px;
}
.submenu-top {
    display: flex;
    justify-content: space-around;
}
.submenu-bottom {
    display: flex;
}
.submenu-bottom-item {
    flex: 1;
}

.submenu-top li {
    padding-left: 0;
}
.submenu a {
    color: #111;
}
.submenu-top-item {
    max-width: 33.333%;
}
.submenu .submenu-title {
    font-weight: bold;
    color: darkslateblue;
}
.submenu .submenu-title:hover {
    text-decoration: none;
}
.submenu-list,
.submenu-bottom {
    margin-top: 10px;
}


.thumb-list .submenu-list > li {
    display: flex;
    align-items: center;
     
}
.submenu-thumbnail {
    margin-right: 10px;
}


.submenu-list li a{
    font-size:13px;
}


.desc-list .submenu-list > li {
    display: flex;
    flex-direction: column;
    padding: 2px;
}
.submenu-desc {
    margin-top: 10px;
    color: #555;
}


.submenu-icon {
    width: 32px;
}

/* Submenu bottom */
.submenu-bottom-title {
    padding-left: 10px;
}
.submenu-bottom figcaption {
    margin-top: 5px;
    font-weight: bold;
}
.submenu-bottom a:hover {
    text-decoration: none;
}

.submenu { 
    display: none;
}
.menu-item:hover .submenu {
    display: flex;
}
.menu-item:hover > a {
    text-decoration: underline;
    color:#ff5d22;
}


.bc:hover{
    color:#ff5d22;
}



		</style>
    </head>
    <body>

        

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="tracer-responsive-nav">
                <div class="container">
                    <div class="tracer-responsive-menu">
                        <div class="logo">
                            <a href="<?= base_url();?>index">
                                <img src="<?= $this->conn->company_info('logo');?>" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?php echo $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn->company_info('logo_height');?>">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tracer-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="<?= base_url();?>index">
                            <img src="<?= $this->conn->company_info('logo');?>" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?php echo $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn->company_info('logo_height');?>">
                        </a>

                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="<?= base_url();?>index" class="nav-link active">Home <i class=''></i></a>
                                    
                                </li>

                                <li class="nav-item"><a href="#" class="nav-link">About Us <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="<?= base_url();?>about" class="nav-link">About Us </a></li>

                                        <!--<li class="nav-item"><a href="about-us-2.html" class="nav-link">About Us 2</a></li>-->

                                        <li class="nav-item"><a href="<?= base_url();?>choose-us" class="nav-link">Why choose us</a></li>


                                       
                                    </ul>
                                </li>
                                
                               
                                <li class="menu-item  d-none d-sm-block">
									<a href="#"><b>Mlm Plan</b></a><i class="bx bx-chevron-down "></i>
												  <ul class="submenu ">
													<li class="submenu-item ">
													  <ul class="submenu-top ">
														<li class="submenu-top-item desc-list">
														  <a href="#" class="submenu-title">MLM Plan Softwares</a>
														  	<b><ul class="submenu-list ">
														     <li><a href="<?= base_url();?>cryptocurrency-system">Cryptocurrency System</a></li>
															<li><a href="<?= base_url();?>crowd-funding-plan"> Crowdfunding MLM Plan</a></li>
															<li><a href="<?= base_url();?>binary-mlm-software"> Binary MLM Software</a></li>
															<li><a href="<?= base_url();?>matrix-mlm-software"> Matrix MLM Software</a></li>
															   <li><a href="<?= base_url();?>repurchase-mlm-software">Repurchase MLM Software </a></li>
								                               <li><a href="<?= base_url();?>mobile-recharge-software">Mobile Recharge Software </a></li>
															   <li><a href="<?= base_url();?>uni-level-mlm-software">Uni-Level MLM Software</a></li>
															   <li><a href="<?= base_url();?>donation-help-mlm-software">Donation Software/ Help Software </a></li>
															   <li><a href="<?= base_url();?>board-mlm-software">Board MLM Software </a></li>
															    <li><a href="<?= base_url();?>generation-mlm-software">Generation MLM Software </a></li>
															     <li><a href="<?= base_url();?>stair-step-mlm-software">Stair Step Software </a></li>
															      <li><a href="<?= base_url();?>australian-binary-mlm-software">Australian Binary Software </a></li>
															       <li><a href="<?= base_url();?>mlm-growth-plan-software">MLM Growth Plan Software </a></li>
														    
														    </ul>	</b>
														</li>
														<li class="submenu-top-item desc-list">
														  <a href="#" class="submenu-title">MLM Business Plans</a>
														 	<b> <ul class="submenu-list">
														   <li><a href="<?= base_url();?>binary-plan">Binary Plan</a></li>
															<li><a href="<?= base_url();?>spillover-plan">Spill Over Binary Plan</a></li>
															<li><a href="<?= base_url();?>australian-plan">Australian X-Up Plan</a></li>
															<li><a href="<?= base_url();?>hybrid-plan">Hybrid MLM Plan</a></li>
															   <li><a href="<?= base_url();?>unilevel-plan">Unilevel Plan</a></li>
								                               <li><a href="<?= base_url();?>matrix-plan">Matrix Plan</a></li>
															   <li><a href="<?= base_url();?>generation-plan">Generation mlm Plan</a></li>
															   <li><a href="<?= base_url();?>monoline-plan">Monolive Plan</a></li>
															   <li>
															 
															  <a href="<?= base_url();?>board-plan">Board Plan</a>
															</li>
															<li>
															  
															  <a href="<?= base_url();?>gift-plan">Gift Plan</a>
															</li>
															<li>
															  
															  <a href="<?= base_url();?>party-plan">Party Plan</a>
															</li>
															<li>
															  <a href="<?= base_url();?>stair-plan">Stair Step Plan</a>
															</li>
															<li>
															  <a href="<?= base_url();?>all"> Compensation Plans</a>
															</li>
															
															
														  </ul>
														  	</b>
														</li>
														<li class="submenu-top-item desc-list">
														  <a href="#" class="submenu-title">MLM Software Solutions</a>
														  	<b><ul class="submenu-list">
															<li><a href="<?= base_url();?>online-mlm-software"> Online MLM Software</a></li>
															<li><a href="<?= base_url();?>e-commerce"> E-Commerce, Shopping Website</a></li>
															<li><a href="<?= base_url();?>rd-fd-software"> RD FD Software</a></li>
															<li><a href="<?= base_url();?>nbfc-software"> NBFC Software</a></li>
															<li><a href="<?= base_url();?>mobile-banking"> Mobile Banking Software</a></li>
															<li><a href="<?= base_url();?>real-estate-management-software"> Real Estate Management Software</a></li>
															<li><a href="<?= base_url();?>cooperative-society-software"> Cooperative Society Software</a></li>
															<li><a href="<?= base_url();?>mlm-mobile-apps"> MLM Mobile Apps - Android, IPhone</a></li>
															<li><a href="<?= base_url();?>website-cms"> Content Management System (CMS)</a></li>
															<li><a href="<?= base_url();?>micro-finance-software"> Microfinance Software</a></li>
															<li><a href="<?= base_url();?>loan-management-software"> Loan Management Software</a></li>
															<li><a href="<?= base_url();?>sms-solutions"> To-Way SMS Solutions</a></li>
															<li><a href="<?= base_url();?>cheque-printing"> Cheque Printing Software</a></li>
															
														
														  </ul>
														  	</b>
														</li>
														<!--<li class="submenu-top-item">
														  <a href="#" class="submenu-title">Last minute offers</a>
														  <ul class="submenu-list">
															<li><a href="#">New York</a></li>
															<li><a href="#">Stockholm</a></li>
															<li><a href="#">Madrid</a></li>
															<li><a href="#">Buenos Aires</a></li>
															<li><a href="#">Tokyo</a></li>
														  </ul>
														</li>-->
													  </ul>
													  
													  <!-- End .submenu-top -->
													</li>
													<!-- End .submenu-item-->
												   
													<!-- End .submenu-item -->

												  </ul>
										</li>
                                
                                
                                

									<li class="nav-item d-lg-none"><a href="#" class="nav-link">Mlm Plans <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu" style="overflow:scroll;max-height: 400px">
                                        <li class="nav-item"><a href="<?= base_url();?>binary-plan" class="nav-link">BINARY PLAN</a></li>

                                        <li class="nav-item"><a href="<?= base_url();?>unilevel-plan" class="nav-link">UNILEVLE PLAN</a></li>

                                        <li class="nav-item"><a href="<?= base_url();?>matrix-plan" class="nav-link">MATRIX PLAN</a></li>

                                        <li class="nav-item"><a href="<?= base_url();?>board-plan" class="nav-link">BOARD PLAN</a></li>

                                        <li class="nav-item"><a href="<?= base_url();?>gift-plan" class="nav-link">GIFT PLAN</a></li>

                                        <li class="nav-item"><a href="<?= base_url();?>monoline-plan" class="nav-link">MONOLIVE PLAN</a></li>
                                        <li class="nav-item"><a href="<?= base_url();?>generation-plan" class="nav-link">GENERATION PLAN</a></li>
                                        <li class="nav-item"><a href="<?= base_url();?>party-plan" class="nav-link">PARTY PLAN</a></li>
                                        <li class="nav-item"><a href="<?= base_url();?>stair-plan" class="nav-link">STAIR STEP PLAN</a></li>
                                        <li class="nav-item"><a href="<?= base_url();?>spillover-plan" class="nav-link">SPILLOVER BINARY PLAN</a></li>
                                        <li class="nav-item"><a href="<?= base_url();?>australian-plan" class="nav-link">AUSTRALIAN X_UP PLAN</a></li>
                                        <li class="nav-item"><a href="<?= base_url();?>hybrid-plan" class="nav-link">HYBRID PLAN</a></li>
                                        <li class="nav-item"><a href="<?= base_url();?>all" class="nav-link">ALL MLM PLAN</a></li>

                                       
                                    </ul>
                                </li>
								
                                <li class="nav-item "><a href="<?= base_url();?>service" class="nav-link">Services <i class=''></i></a></li>
                                
                                
                                
                                 <li class="menu-item d-none d-sm-block">
									<a href="#"><b>Demo Plans </b></a><i class="bx bx-chevron-down  "></i>
												  <center><ul class="submenu " style="width:50%! important;right:0! importan;">
													<li class="submenu-item ">
													  <ul class="submenu-top ">
														<li class="submenu-top-item thumb-list">
														  <a href="#" class="submenu-title">DEMO PLANS</a>
														 	<b> <ul class="submenu-list ">
															<li>
															  
															  <a href="<?= base_url();?>plan-login?plan=binary" target="_blank">BINARY PLAN</a>
															</li>
															<li>
															  
															  <a href="<?= base_url();?>plan-login?plan=repurchase" target="_blank">REPURCHASE</a>
															</li>
															<li>
															  
															  <a href="<?= base_url();?>plan-login?plan=single_leg" target="_blank">SINGLE LEG</a>
															</li>
															<!--<li>
															 
															  <a href="#">Beach holidays</a>
															</li>-->
														  </ul>
														  	</b>
														</li>
														<li class="submenu-top-item desc-list">
														  <a href="#" class="submenu-title"> DEMO PLANS</a>
														  	<b><ul class="submenu-list">
														   
															   <li><a href="<?= base_url();?>plan-login?plan=donation" target="_blank">DONATION PLAN</a></li>
															   <li><a href="<?= base_url();?>plan-login?plan=universal" target="_blank">UNIVERSAL PLAN</a></li>

															
															
														  </ul>
														  	</b>
														</li>
														<!--<li class="submenu-top-item icon-list">
														  <a href="#" class="submenu-title">Our services</a>
														  <ul class="submenu-list">
															<li>
															  <i class="submenu-icon fas fa-plane-departure"></i>
															  <a href="#">Plane tickets</a>
															</li>
															<li>
															  
															  <a href="#">Car rental</a>
															</li>
															<li>
															  <i class="submenu-icon fas fa-luggage-cart"></i>
															  <a href="#">Luggage pickup</a>
															</li>
															<li>
															  <i class="submenu-icon fas fa-phone-alt"></i>
															  <a href="#">24/7 customer service</a>
															</li>
															<li>
															  <i class="submenu-icon fas fa-dollar-sign"></i>
															  <a href="#">30-day cancellation policy</a>
															</li>
														  </ul>
														</li>-->
														<!--<li class="submenu-top-item">
														  <a href="#" class="submenu-title">Last minute offers</a>
														  <ul class="submenu-list">
															<li><a href="#">New York</a></li>
															<li><a href="#">Stockholm</a></li>
															<li><a href="#">Madrid</a></li>
															<li><a href="#">Buenos Aires</a></li>
															<li><a href="#">Tokyo</a></li>
														  </ul>
														</li>-->
													  </ul>
													  <!-- End .submenu-top -->
													</li>
													<!-- End .submenu-item-->
												   
													<!-- End .submenu-item -->

												  </ul></center>
										</li>
                                    
                                 <li class="nav-item d-lg-none"><a href="#" class="nav-link">DEMO PLANS <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="<?= base_url();?>plan-login?plan=binary" class="nav-link" target="_blank">BINARY PLAN</a></li>

                                        <li class="nav-item"><a href="<?= base_url();?>plan-login?plan=repurchase" class="nav-link" target="_blank">REPURCHASE</a></li>

                                        <li class="nav-item"><a href="<?= base_url();?>plan-login?plan=single_leg" class="nav-link" target="_blank">SINGLE LEG</a></li>

                                        <li class="nav-item"><a href="<?= base_url();?>plan-login?plan=donation" class="nav-link" target="_blank">DONATION PLAN</a></li>

                                        <li class="nav-item"><a href="<?= base_url();?>plan-login?plan=universal" class="nav-link" target="_blank">UNIVERSAL PLAN</a></li>

                                       

                                        
                                    </ul>
                                </li>
								
								 <li class="nav-item"><a href="<?= base_url();?>contact" class="nav-link">Contact <i class=''></i></a></li>
                            </ul>

                            <!--<div class="others-option d-flex align-items-center">
                                <div class="option-item">
                                    <a href="contact.html" class="default-btn"><i class="flaticon-right"></i>Get Started<span></span></a>
                                </div>
                            </div>-->
                        </div>
                    </nav>
                </div>
            </div>

            <!--<div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    
                   <div class="container">
                        <div class="option-inner">
                            <div class="others-option">
                                <div class="option-item">
                                    <a href="contact.html" class="default-btn"><i class="flaticon-right"></i>Get Started<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>

        <!-- Start Page Title Area -->
        <section class="page-title-area">
            <div class="container">
                <div class="page-title-content text-center">
                    <h1>Binary Plan</h1>
                    <ul>
                        <li><a href="<?= base_url();?>index">Home</a></li>
                        <li>MLM Binary Software</li>
                    </ul>
                </div>
            </div>

            <div class="shape-img1"><img src="<?= $panel_url;?>assets/img/shape/shape1.svg" alt="image"></div>
            <div class="shape-img2"><img src="<?= $panel_url;?>assets/img/shape/shape2.png" alt="image"></div>
            <div class="shape-img3"><img src="<?= $panel_url;?>assets/img/shape/shape3.png" alt="image"></div>
        </section>
        <!-- End Page Title Area -->

        <!-- Start About Area -->
        <section class="about-area ptb-100">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img">
                            <img src="<?= $panel_url;?>assets/img/images/1.png" alt="About Binary Mlm Plan">
                            <div class="shape"><img src="<?= $panel_url;?>assets/img/about/shape1.png"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="about-content">
                            <div class="content">
                                <span class="sub-title"><img src="<?= $panel_url;?>assets/img/star-icon.png" alt="image"> Binary Plan</span>
                                <h2>All About Binary Mlm Plan</h2>
                                <p><b> The MLM binary is most popular plan among Multi-Level Marketing (MLM) Companies, community marketers, referral advertising business, part-timers people and contributors who favor to earn a lots in MLM commercial enterprise industry. Some organizations additionally use hybrid binary plan that is binary with some different MLM concept is implemented which boost the MLM leaders and makes easy to achieve the mission and target of MLM business. </b> </p>
                                
                                <p>Any Multi-Level Marketing (MLM) company business plan where new joiners introduced into binary tree structure. one on left and another on right sub-tree. Generally, one facet sub-tree is referred to as Power leg whilst different is Profit leg. Power leg grows with new member placement, even brought by means of beforehand enrolled or ancestors. New contributors in the electricity leg positioned beneath a leaf on hand node of the binary tree, when a member works to develop his Profit leg, some compensation allotted calculated with the aid of a method the usage of sure fee matched with Power leg that may additionally be based totally on 1:1 or 2:1 ratio.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Area -->

        <!-- Start Our Mission Area -->
        <section class="our-mission-area ptb-100">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="our-mission-content">
                            <div class="content">
                                <span class="sub-title"><img src="<?= $panel_url;?>assets/img/star-icon.png" alt="image"> Binary Plan</span>
                                <h2>How <?php echo $this->conn->company_info('company_name');?> Binary Compensation Plan Works?</h2>
                                <p>In Binary Compensation Model one member can recruit two humans to the first level. Most of the binary community advertising and marketing corporations supply binary compensations based totally on the least energetic leg(Weak Leg).To make the idea extra easy say if the left crew has fewer commercial enterprise income than the proper team, the binary bonus will be paid primarily based on the left group income amount. So the income margin relies upon absolutely on your down-line crew being active. That is if one of your crew is inactive, then you will now not earn a lot money. MLM Ready Made Binary MLM Program will assist to manipulate easily all ideas of a binary MLM plan.</p>
                                <!--<ul class="our-mission-list">
                                    <li>
                                        <span>
                                            <div class="icon">
                                                <i class="flaticon-tick"></i>
                                            </div>
                                            Global Experience
                                            <img src="<?= $panel_url;?>assets/img/our-mission/shape2.png" alt="image">
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <div class="icon">
                                                <i class="flaticon-tick"></i>
                                            </div>
                                            Value for Results
                                            <img src="<?= $panel_url;?>assets/img/our-mission/shape2.png" alt="image">
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <div class="icon">
                                                <i class="flaticon-tick"></i>
                                            </div>
                                            User Prespective
                                            <img src="<?= $panel_url;?>assets/img/our-mission/shape2.png" alt="image">
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <div class="icon">
                                                <i class="flaticon-tick"></i>
                                            </div>
                                            Business Prespective
                                            <img src="<?= $panel_url;?>assets/img/our-mission/shape2.png" alt="image">
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <div class="icon">
                                                <i class="flaticon-tick"></i>
                                            </div>
                                            Expert Prepective
                                            <img src="<?= $panel_url;?>assets/img/our-mission/shape2.png" alt="image">
                                        </span>
                                    </li>
                                    <li>
                                        <span>
                                            <div class="icon">
                                                <i class="flaticon-tick"></i>
                                            </div>
                                            Retail Solutions
                                            <img src="<?= $panel_url;?>assets/img/our-mission/shape2.png" alt="image">
                                        </span>
                                    </li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>-->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="our-mission-image">
                            <img src="<?= $panel_url;?>assets/img/images/2.png" class="wow fadeInUp" alt="image" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="shape"><img src="<?= $panel_url;?>assets/img/our-mission/shape1.png"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Mission Area -->

        <!-- Start Funfacts Area --
        <section class="funfacts-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-6 col-md-3">
                        <div class="single-funfacts-box">
                            <div class="icon">
                                <img src="<?= $panel_url;?>assets/img/funfacts/icon1.png" alt="image">
                            </div>
                            <h3>10 Years</h3>
                            <p>On the market</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-6 col-md-3">
                        <div class="single-funfacts-box">
                            <div class="icon">
                                <img src="<?= $panel_url;?>assets/img/funfacts/icon1.png" alt="image">
                            </div>
                            <h3>45+</h3>
                            <p>Team members</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-6 col-md-3">
                        <div class="single-funfacts-box">
                            <div class="icon">
                                <img src="<?= $panel_url;?>assets/img/funfacts/icon1.png" alt="image">
                            </div>
                            <h3>100%</h3>
                            <p>Satisfaction rate</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-6 col-md-3">
                        <div class="single-funfacts-box">
                            <div class="icon">
                                <img src="<?= $panel_url;?>assets/img/funfacts/icon1.png" alt="image">
                            </div>
                            <h3>80%</h3>
                            <p>Senior scientist</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Funfacts Area -->

        <!-- Start How It's Work Area --
        <section class="process-area ptb-100 bg-fafafb">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title"><img src="<?= $panel_url;?>assets/img/star-icon.png" alt="image"> How It's Work</span>
                    <h2>Our Data Analytics Process<span class="overlay"></span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>

                <div class="row align-items-center m-0">
                    <div class="col-lg-6 col-md-12 p-0">
                        <div class="process-image wow fadeInUp" data-tilt data-wow-delay="00ms" data-wow-duration="1500ms">
                            <img src="<?= $panel_url;?>assets/img/process/img7.png" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 p-0">
                        <div class="process-content">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="single-box-item wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                                        <div class="d-flex align-items-center">
                                            <div class="image">
                                                <img src="<?= $panel_url;?>assets/img/process/img-small1.png" alt="image">
                                            </div>
                                            <h3>Frame the Problem</h3>
                                            <div class="number">1</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="single-box-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                        <div class="d-flex align-items-center">
                                            <div class="image">
                                                <img src="<?= $panel_url;?>assets/img/process/img-small1.png" alt="image">
                                            </div>
                                            <h3>Collect the Raw Data</h3>
                                            <div class="number">2</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="single-box-item wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                                        <div class="d-flex align-items-center">
                                            <div class="image">
                                                <img src="<?= $panel_url;?>assets/img/process/img-small1.png" alt="image">
                                            </div>
                                            <h3>Process the Data</h3>
                                            <div class="number">3</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="single-box-item wow fadeInUp" data-wow-delay="700ms" data-wow-duration="1500ms">
                                        <div class="d-flex align-items-center">
                                            <div class="image">
                                                <img src="<?= $panel_url;?>assets/img/process/img-small4.png" alt="image">
                                            </div>
                                            <h3>Explore the Data</h3>
                                            <div class="number">4</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="single-box-item wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms">
                                        <div class="d-flex align-items-center">
                                            <div class="image">
                                                <img src="<?= $panel_url;?>assets/img/process/img-small5.png" alt="image">
                                            </div>
                                            <h3>Perform Analysis</h3>
                                            <div class="number">5</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="single-box-item wow fadeInUp" data-wow-delay="1100ms" data-wow-duration="1500ms">
                                        <div class="d-flex align-items-center">
                                            <div class="image">
                                                <img src="<?= $panel_url;?>assets/img/process/img-small6.png" alt="image">
                                            </div>
                                            <h3>Communicate Results</h3>
                                            <div class="number">6</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End How It's Work Area -->

        <!-- Start History Area -->
        <section class="history-area pt-100">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title"><img src="<?= $panel_url;?>assets/img/star-icon.png" alt="image"> </span>
                    <h2>Binary Compensation Model In MLM Ready Made Binary MLM Software<span class="overlay"></span></h2>
                </div>

                <ol class="timeline history-timeline history-timeline-style-two">
                    <li class="timeline-block">
                        <div class="timeline-date">
                            <span></span>
                             
                            <sup></sup>
                        </div>

                        <div class="timeline-icon">
                            <span class="dot-badge"></span>
                        </div>

                        <div class="timeline-content">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-12">
                                    <div class="image" data-tilt>
                                        <img src="<?= $panel_url;?>assets/img/images/3.png" alt="Sponsor Bonus">
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-12">
                                    <div class="content">
                                        <h3>1 Sponsor Bonus</h3>
                                        <p>The simple rule of a binary mlm software layout is to add or sponsor two individuals to the downline as this is the way to construct up a binary tree. The “sponsor bonus” or the “referral bonus” is the gain which the person receives via bringing new contributors to the network. Some agencies will have unique programs to pick whilst registration, so direct referral fee proportion will be calculated primarily based on the bundle your downlines choose. Commission quantity will be robotically credited to your e-wallet upon finishing the registration method of your downline. MLM Ready Made binary MLM plan software program helps in organizing the bonus shape perfectly. These picks add helpful fee to this system.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="timeline-block">
                        <div class="timeline-date">
                            <span></span>
                            
                            <sup></sup>
                        </div>

                        <div class="timeline-icon">
                            <span class="dot-badge"></span>
                        </div>

                        <div class="timeline-content">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-12">
                                    <div class="image" data-tilt>
                                        <img src="<?= $panel_url;?>assets/img/images/4.png" alt="Pairing Bonus">
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-12">
                                    <div class="content">
                                        <h3>2 Pairing Bonus</h3>
                                        <p>The pairing bonus is the paid quantity after finishing the binary tree, i.e, gaining the bonus primarily based on the downline members' sales. The most pairing bonus will be calculated with the aid of the layout you pick and the policies constant set with the aid of the company. An MLM binary software layout might also have a capping (the restriction or limit on pricing or expenditure) per day. This drawback is based totally on company's rules.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="timeline-block">
                        <div class="timeline-date">
                            <span></span>
                             
                            <sup></sup>
                        </div>

                        <div class="timeline-icon">
                            <span class="dot-badge"></span>
                        </div>

                        <div class="timeline-content">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-12">
                                    <div class="image" data-tilt>
                                        <img src="<?= $panel_url;?>assets/img/images/4.png" alt="Matching Bonus">
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-12">
                                    <div class="content">
                                        <h3>3 Matching Bonus</h3>
                                        <p>The Matching Bonus in the Binary MLM graph helps all the sponsors obtain nice earnings from their respective downline members. Briefly, it’s nothing however the bonus obtained for introducing new participants to the network. The guardian member who sponsors the downline individuals can earn profits which the downline contributors earn in the structure of the bonus and such revenue are regarded as matching bonus. The matching bonus will increase up to n generations and is definitely primarily based on the compensation graph which the binary system MLM Company chooses.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                   <!-- <li class="timeline-block">
                        <div class="timeline-date">
                            <span>2020</span>
                            December 10
                            <sup>th</sup>
                        </div>

                        <div class="timeline-icon">
                            <span class="dot-badge"></span>
                        </div>

                        <div class="timeline-content">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-12">
                                    <div class="image" data-tilt>
                                        <img src="<?= $panel_url;?>assets/img/history/img4.jpg" alt="image">
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-12">
                                    <div class="content">
                                        <h3>International Award</h3>
                                        <p>Real innovations and a positive customer experience are the heart of successful communication. Lorem ipsum dolor sit amet, sectetur adipiscing elit, tempor incididunt ut labore et dolore magna.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>-->
                </ol>
            </div>
        </section>
        <!-- End History Area -->

        <!-- Start Scientist Area --
        <section class="scientist-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="scientist-box-list">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-md-6 offset-lg-1">
                                    <div class="single-scientist-item wow fadeInUp" data-tilt data-wow-delay="00ms" data-wow-duration="1500ms">
                                        <img src="<?= $panel_url;?>assets/img/scientist/img9.jpg" alt="image">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6">
                                    <div class="single-scientist-item wow fadeInUp" data-tilt data-wow-delay="100ms" data-wow-duration="1500ms">
                                        <img src="<?= $panel_url;?>assets/img/scientist/img10.jpg" alt="image">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12 col-md-6 offset-lg-0 offset-md-3">
                                    <div class="single-scientist-item wow fadeInUp" data-tilt data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <img src="<?= $panel_url;?>assets/img/scientist/img11.jpg" alt="image">
                                    </div>
                                </div>
                            </div>

                            <div class="map-shape1"><img src="<?= $panel_url;?>assets/img/shape/map-shape1.png" alt="image"></div>
                            <div class="vector-shape5"><img src="<?= $panel_url;?>assets/img/shape/vector-shape5.png" alt="image"></div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12">
                        <div class="scientist-section-title">
                            <span class="sub-title"><img src="<?= $panel_url;?>assets/img/star-icon.png" alt="image"> Our Team</span>
                            <h2>Meet Our Data Scientist Preparing For Your Business Success</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="team-1.html" class="default-btn"><i class="flaticon-view"></i>View Our Team<span></span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="vector-shape4"><img src="<?= $panel_url;?>assets/img/shape/vector-shape4.png" alt="image"></div>
        </section>
        <!-- End Scientist Area -->

       
        

       

       