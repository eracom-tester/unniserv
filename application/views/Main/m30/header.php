<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->conn->company_info('company_name');?></title>
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="<?= $this->conn->company_info('symbol');?>">
    <!--icofont icon css-->
    <link rel="stylesheet" href="<?= $panel_url;?>css/icofont.min.css">
    <!--magnific popup css-->
    <link rel="stylesheet" href="<?= $panel_url;?>css/magnific-popup.css">
    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <!--main css-->
    <link rel="stylesheet" href="<?= $panel_url;?>css/app.css">
	<style>
	input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

	</style>
</head>
<body>



<!-- header top begin -->
<header class="header-section" id="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 d-flex justify-content-start reunir-content-center">
                    <div class="header-left">
                        <ul>
                            <li class="header-left-list">
                                <p class="header-left-text">
                                    <span class="header-left-icon">
                                        <i class="icofont-headphone-alt"></i>
                                    </span><?= $this->conn->company_info('company_mobile');?>
                                </p>
                            </li>
                            <li class="header-left-list">
                                <p class="header-left-text">
                                    <span class="header-left-icon">
                                        <i class="icofont-email"></i>
                                    </span><?= $this->conn->company_info('company_email');?>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--<div class="col-lg-6 col-md-6 d-flex justify-content-end reunir-content-center">
                    <div class="header-right">
                        <ul>
                            <li class="header-right-list">
                                <div class="dropdown show header-dropdown">
                                    <span class="header-left-icon"><i class="icofont-web"></i></span>
                                    <select class="selectpicker" name="languages" tabindex="-98">
                                        <option value="">English</option>
                                        <option value="1">Bengali</option>
                                        <option value="2">Dutch</option>
                                    </select>
                                </div>
                            </li>
                            <li class="header-right-list">
                                <p class="header-right-text"><span class="header-right-icon carticon"><i class="icofont-shopping-cart"></i></span>My cart (0)</p>
                            </li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!-- nav top begin -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light reunir-navbar">
        <div class="container">

            <div class="logo-section">
                <a class="logo-title navbar-brand" href="#"><img src="<?= $this->conn->company_info('logo');?>" alt="<?= $this->conn->company_info('company_name');?>" style="width:<?php echo $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn->company_info('logo_height');?>"></a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icofont-navigation-menu text-white"></i>
            </button>
            <div class="collapse navbar-collapse nav-main justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="primary-menu">
                    <li class="nav-item active">
                        <a class="nav-link active" href="<?= base_url();?>index#header-section">HOME
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url();?>index#about-section">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url();?>index#affiliate-section">AFFILIATES</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#investment-section">PLANS</a>
                    </li>-->
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url();?>index#contact-us-section">CONTACT</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="<?= base_url();?>login">LOGIN</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="<?= base_url();?>register">REGISTER</a>
                    </li>
                </ul>
            </div>
            <!--<div class="right-side-box">
                <a class="join-btn" href="#">JOIN US</a>
            </div>-->
        </div>
    </nav>
    <!-- nav top end -->
</header>
<!-- header top end -->