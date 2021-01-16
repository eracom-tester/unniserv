
        <footer class="footer-area bg-color" style="padding-top:30px">
            <div class="container-fluid">
                <div class="row">
				
				
				 <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget pl-4">
                            <h5>QUICK LINKS</h5>
                            <ul class="footer-links-list">
                                <li class="font"><a href="<?= base_url();?>index">Home</a></li>
                                <li class="font"><a href="<?= base_url();?>about">About Us</a></li>
                                <li class="font"><a href="<?= base_url();?>service">Services</a></li>
                                
                                <li class="font"><a href="<?= base_url();?>contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <!--<a href="<?= base_url();?>index" class="logo">
                                <img src="assets/img/logo.png" alt="logo">
                            </a>-->
							<h5>BINARY PLAN</h5>
                            <ul class="footer-links-list">
                                <li class="font"><a href="<?= base_url();?>binary-plan">Binary Plan</a></li>
                                <li class="font"><a href="<?= base_url();?>spillover-plan">Spill Over Binary Plan</a></li>
                                
                                <li class="font"><a href="<?= base_url();?>australian-plan">Australian X-Up Plan</a></li>
                                <li class="font"><a href="<?= base_url();?>hybrid-plan">Hyrid MLM Plan</a></li>
                                
								
                            </ul>
                           
                        </div>
                    </div>

                   

                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h5>LEVEL PLAN</h5>
                            <ul class="footer-links-list">
								<li class="font"><a href="<?= base_url();?>unilevel-plan">Unilevel Plan</a></li>
								<li class="font"><a href="<?= base_url();?>matrix-plan">Matrix Plan</a></li>
								<li class="font"><a href="<?= base_url();?>generation-plan">Generation MLM Plan</a></li>
								<li class="font"><a href="<?= base_url();?>monoline-plan">Monolive Plan</a></li>
								</ul>
                        </div>
                    </div>
					
					
					

						 <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h5>OTHER PLANS</h5>
                            <ul class="footer-links-list">
								<li class="font"><a href="<?= base_url();?>board-plan">Board Plan</a></li>
								<li class="font"><a href="<?= base_url();?>gift-plan">Gift Plan</a></li>
								<li class="font"><a href="<?= base_url();?>party-plan">Party Plan</a></li>
								<li class="font"><a href="<?= base_url();?>stair-plan">Stair Step Plan</a></li>
								
                            </ul>
                        </div>
                    </div>
					
					
							
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h5>ADDRESS</h5>
                            <ul class="footer-contact-info">
                                <li class="font"><i class='bx bx-map'></i><?php echo $this->conn->company_info('company_address');?></li>
                                <li class="font"><i class='bx bx-phone-call'></i><a href=""><?php echo $this->conn->company_info('company_mobile');?></a></li>
                                <li class="font"><i class='bx bx-envelope'></i><a href=""><?php echo $this->conn->company_info('company_email');?></a></li>
                                
                            </ul>
							
                        </div>
                    </div>
					
					
					 <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h5>SOCIAL MEDIA</h5> 
                              <ul class="social-link">
                                <li><a href="https://www.facebook.com/mlmready.made" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="https://twitter.com/mlmreadymade" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="https://in.pinterest.com/mlmreadymade1/" class="d-block" target="_blank"><i class='bx bxl-pinterest'></i></a></li>
                                <li><a href="https://www.linkedin.com/company/mlm-ready-made/" class="d-block" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom-area">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6">
                            <p><i class='bx bx-copyright'></i><?= date('Y');?> <strong><?php echo $this->conn->company_info('company_name');?></strong> is Proudly Powered by <a target="_blank" href="https://eracom.in/">Eracom Technologies Pvt. Ltd.</a></p>
                        </div>

                        <div class="col-lg-5 col-md-6">
                            <!--<ul>
                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="terms-of-service.html">Terms & Conditions</a></li>
                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-map"><img src="<?= $panel_url;?>assets/img/footer-map.png" alt="image"></div>
        </footer>
        <!-- End Footer Area -->

        <div class="go-top"><i class="flaticon-up"></i></div>

        <!-- Links of JS files -->
        <script src="<?= $panel_url;?>assets/js/jquery.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/popper.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/bootstrap.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/owl.carousel.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/magnific-popup.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/tilt.jquery.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/meanmenu.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/nice-select.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/rangeSlider.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/sticky-sidebar.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/fancybox.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/isotope.pkgd.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/TweenMax.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/ScrollMagic.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/animation.gsap.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/debug.addIndicators.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/wow.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/form-validator.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/contact-form-script.js"></script>
        <script src="<?= $panel_url;?>assets/js/ajaxchimp.min.js"></script>
        <script src="<?= $panel_url;?>assets/js/main.js"></script>
    </body>


</html>