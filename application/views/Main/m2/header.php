<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $this->conn->company_info('company_name');?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,900|Mirza:400,700&amp;subset=arabic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">

    <!-- inject:css-->
    <link rel="stylesheet" href="<?= $panel_url;?>css/plugin.min.css">
    <link rel="stylesheet" href="<?= $panel_url;?>style.css">
    <!-- endinject -->
    <link rel="icon" type="" sizes="32x32" href="">
</head>

<body>


     
    <!-- header area -->
   
 <section class="header header--2">
        
    <div class="top_bar top--bar2 d-flex align-items-center bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex topbar_content justify-content-between">
                        <!--<div class="top_bar--lang align-self-center order-2">
                            <div class="dropdown">
                                <div class="dropdown-toggle d-flex align-items-center" id="dropdownMenuButton1" role="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="lang">en</span>
                                    <img class="lang_flag" src="img/en.jpg" alt="English">
                                    <span class="la la-angle-down"></span>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <a class="dropdown-item" data-lang="en" href="#"><img src="img/en.jpg" alt="">English</a>
                                    <a class="dropdown-item" data-lang="fr" href="#"><img src="img/fr.jpg" alt="">Français</a>
                                    <a class="dropdown-item" data-lang="tr" href="#"><img src="img/tr.jpg" alt="">Türkçee</a>
                                    <a class="dropdown-item" data-lang="es" href="#"><img src="img/es.jpg" alt="">Español</a>
                                </div>
                            </div>
                        </div>-->
                        <div class="top_bar--info order-0 d-none d-lg-block align-self-center">
                            <ul>
                                <li><span class="la la-envelope"></span> <p><?php echo $this->conn->company_info('company_email');?></p></li>
                                <li><span class="la la-headphones"></span> <p><?php echo $this->conn->company_info('company_mobile');?></p></li>
                                <li><span class="la la-clock-o"></span> <p>Mon-Sat 8.00 - 18.00</p></li>
                            </ul>
                        </div>
                        <div class="top_bar--social">
                            <ul>
                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
    <!-- start menu area -->
    <div class="menu_area menu1">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-0">
                <a class="navbar-brand order-sm-1 order-1" href="index.php"> <img src="<?= $this->conn->company_info('logo');?>" class="logo" style="width:<?= $this->conn->company_info('logo_width');?>;height:<?php echo $this->conn-> company_info('logo_height');?>" alt="<?php echo $this->conn->company_info('company_name');?>"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="la la-bars"></span>
                </button>

                <div class="collapse navbar-collapse order-md-1" id="navbarSupportedContent2">
                    
    
        
    
    <ul class="navbar-nav m-auto">
        <li class="nav-item active ">
            <a class="nav-link" href="<?= base_url();?>">Home
                <span class="sr-only">(current)</span>
            </a>
            
            <!-- end: .mega-menu -->
        </li>
        <!--<li class="nav-item has_mega-lg dropdown">
            <a class="nav-link" href="#">Pages</a>
            <div class="mega-menu mega-menu-lg d-lg-flex flex-wrap">
                <ul>
                    <li>
                        <h6>Services</h6>
                    </li>
                    <li>
                        <a href="services-one.html">Service One</a>
                    </li>
                    <li>
                        <a href="services-two.html">Service Two</a>
                    </li>
                    <li>
                        <a href="services-three.html">Service Three</a>
                    </li>
                    <li>
                        <a href="services-with-image.html">Services With Image</a>
                    </li>
                    <li>
                        <a href="services-with-icon.html">Services With Icon</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <h6>Projects</h6>
                    </li>
                    <li>
                        <a href="project-grid-1-column.html">Project Grid 1 Column</a>
                    </li>
                    <li>
                        <a href="project-grid-2-column.html">Project Grid 2 Column</a>
                    </li>
                    <li>
                        <a href="project-grid-3-column.html">Project Grid 3 Column</a>
                    </li>
                    <li>
                        <a href="project-grid-2-filter.html">Project Grid 2 Filter</a>
                    </li>
                    <li>
                        <a href="project-grid-3-filter.html">Project Grid 3 Filter</a>
                    </li>
                    <li>
                        <a href="project-masonry.html">Project Masonry</a>
                    </li>
                    <li>
                        <a href="project-single1.html">Project Single 1</a>
                    </li>
                    <li>
                        <a href="project-single2.html">Project Single 2</a>
                    </li>
                    <li>
                        <a href="project-single3.html">Project Single 3</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <h6>Team</h6>
                    </li>
                    <li>
                        <a href="team-grid.html">Team Grid</a>
                    </li>
                    <li>
                        <a href="team-list.html">Team List</a>
                    </li>
                    <li>
                        <a href="team-single.html">Team Single</a>
                    </li>
                    <li>
                        <h6>Events</h6>
                    </li>
                    <li>
                        <a href="event-grid.html">Event Grid</a>
                    </li>
                    <li>
                        <a href="event-list.html">Event List</a>
                    </li>
                    <li>
                        <a href="event-details.html">Event Details</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <h6>Others</h6>
                    </li>
                    <li>
                        <a href="404.html">404</a>
                    </li>
                    <li>
                        <a href="faqs.html">Faqs</a>
                    </li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="register.html">Register</a>
                    </li>
                    <li>
                        <a href="pricing.html">Pricing</a>
                    </li>
                    <li>
                        <a href="testimonial.html">Testimonial</a>
                    </li>
                    <li>
                        <a href="working-process.html">Working Process</a>
                    </li>
                    <li>
                        <a href="careers.html">Careers</a>
                    </li>
                    <li>
                        <a href="career-single.html">Career Single</a>
                    </li>
                    <li>
                        <a href="apply-form.html">Apply Form</a>
                    </li>
                    <li>
                        <a href="coming-soon.html">Coming Soon</a>
                    </li>
                </ul>
            </div>
            
        </li>-->
        
        <li class="nav-item ">
            <a class="nav-link dropdown-toggle" href="<?= base_url();?>about" >About</a>
           
        </li>
		
		
		 <li class="nav-item ">
            <a class="nav-link dropdown-toggle" href="<?= base_url();?>legal" >Legal</a>
           
        </li>
		
		<li class="nav-item ">
            <a class="nav-link dropdown-toggle" href="<?= base_url();?>service" >Services</a>
           
        </li>
        <li class="nav-item ">
            <a class="nav-link dropdown-toggle" href="<?= base_url();?>contact" >Contact</a>
            
        </li>
       
	   <li class="nav-item ">
            <a class="nav-link dropdown-toggle" href="<?= base_url();?>login" >login</a>
            
        </li>
        
		<li class="nav-item ">
            <a class="nav-link dropdown-toggle" href="<?= base_url();?>register" >Register</a>
            
        </li>
    </ul>
    <!-- end: .navbar-nav -->

                </div>

                <!--<div class="nav_right_content d-flex align-items-center order-2 order-sm-2">
                    <div class="nav_right_module cart_module">
                        <div class="cart__icon">
                            <span class="la la-shopping-cart"></span>
                            <span class="cart_count">2</span>
                        </div>

                        <div class="cart__items shadow-lg-2">
                            <div class="items">
                                <div class="item_thumb">
                                    <img src="img/ci1.jpg" alt="hukka miyan">
                                </div>
                                <div class="item_info">
                                    <a href="single-product.html">Business Marketing Presentation</a>
                                    <span class="color-primary">$250.00</span>
                                </div>
                                <a href="#" class="item_remove">
                                    <span class="la la-close"></span></a>
                            </div>
                            

                            <div class="items">
                                <div class="item_thumb">
                                    <img src="img/ci2.jpg" alt="hukka miyan">
                                </div>
                                <div class="item_info">
                                    <a href="single-product.html">Business Marketing Presentation</a>
                                    <span class="color-primary">$75.00</span>
                                </div>
                                <a href="#" class="item_remove">
                                    <span class="la la-close"></span></a>
                            </div>
                            

                            <div class="cart_info text-md-right">
                                <p>Subtotal:
                                    <span class="color-primary">$325.00</span></p>
                                <a class="btn btn-outline-secondary btn-sm" href="shopping-cart.html">View Cart</a>
                                <a class="btn btn-primary btn-sm" href="checkout.html">Checkout</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="nav_right_module search_module">
                        <span class="la la-search search_trigger"></span>

                        <div class="search_area">
                            <form action="http://aazztech.com/">
                                <div class="input-group input-group-light">
                                    <span class="icon-left">
                                        <i class="la la-search"></i>
                                    </span>
                                    <input type="text" class="form-control search_field" placeholder="Type words and hit enter...">
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>-->
            </nav>
        </div>
    </div>
	</section>
    <!-- end menu area -->
    <!-- end: .header -->

     