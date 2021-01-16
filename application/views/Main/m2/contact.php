

     
    <section class="breadcrumb_area breadcrumb2 bgimage biz_overlay">
        <div class="bg_image_holder">
            <img src="<?= $panel_url;?>img/breadbg.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                        <h4 class="page_title">Contact Us </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-bottom-30">
                                <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div><!-- ends: .row -->
        </div>
    </section><!-- ends: .breadcrumb_area -->

    
    <section class="contact--four">
        
    <div class="list-inline-wrapper p-top-80 p-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="icon-list--three d-flex list--inline">
                        
    <li class="d-flex align-items-center">
        <div class="icon"><span><i class="la la-headphones"></i></span></div>
        <div class="contents">
            <h6><?php echo $this->conn->company_info('company_mobile');?></h6>
            <span class="sub-text">Mon-Sat 8am - 18pm</span>
        </div>
    </li>
 
                        
    <li class="d-flex align-items-center">
        <div class="icon"><span><i class="la la-envelope"></i></span></div>
        <div class="contents">
            <h6><?php echo $this->conn->company_info('company_email');?></h6>
            <span class="sub-text">Free enquiry</span>
        </div>
    </li>

                        
    <li class="d-flex align-items-center">
        <div class="icon"><span><i class="la la-map-marker"></i></span></div>
        <div class="contents">
            <h6><?php echo $this->conn->company_info('company_address');?></h6>
            <span class="sub-text"></span>
        </div>
    </li>

                    </ul><!-- ends: .icon-list--three -->
                </div>
            </div>
        </div>
    </div><!-- ends: .list-inline -->


        <div class="container p-top-100 p-bottom-110">
            <div class="row">
			<div class="col-lg-3">
			</div>
                <div class="col-lg-6">
                    
    <div class="form-wrapper">
        <div class="m-bottom-10">
            
    <div class="divider divider-simple text-left">
        <h3>Let&#39;s Get In Touch</h3>
    </div>

        </div>
        <p class="m-bottom-30">Just send us your questions or concerns by starting a new case and we will give you the help you need. Contact Us, We are here to help you with all of your queries. Get support by Call, Chat, Email or submit your feedback/complaints ...</p>
        <form action="#" method="post">
            <input type="text"  id="name" name="name" class="form-control form-outline mb-4" placeholder="Name" required>
            <input type="email" id="email" name="email" class="form-control form-outline mb-4" placeholder="Email" required>
            <input type="number" id="phone" name="phone" class="form-control form-outline mb-4" placeholder="Mobile" required>
            <input type="text" id="subject" name="subject" class="form-control form-outline mb-4" placeholder="Subject" required>
            <textarea id="message" name="message" class="form-control form-outline mb-4" placeholder="Messages" required></textarea>
            <button class="btn btn-primary" name="sb_btn">Submit Now</button>
        </form>
    </div><!-- end: .form-wrapper -->

                </div><!-- ends: .col-lg-6 -->
                <div class="col-lg-3">
                    <!--<div class="m-bottom-25">
                        
    <div class="divider divider-simple text-left">
        <h3>Google Map</h3>
    </div>

                    </div>
                    <div class="gmap2">
                        
    <div class="map" id="map3"></div>

                    </div>-->
                </div>
            </div>
        </div>
    </section><!-- ends: .contact--four -->

  