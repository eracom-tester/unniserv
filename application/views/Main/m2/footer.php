
     
    
        
      <footer class="footer5 footer--bw">
        <div class="footer__big">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="widget text_widget">
						 <img src="<?= base_url();?>images/logo/<?php echo $this->conn-> company_info('logo');?>" class="footer_logo" style="width:<?php echo $this->conn-> company_info('logo_width');?>;height:<?php echo $this->conn-> company_info('logo_height');?>" alt="<?php echo $this->conn-> company_info('company_name');?>">
                            
                            <p>Business With Us You Can Grow! </p> 
                            <p><?= $this->conn->company_info('company_name');?> network helps clients deliver <br> a fit-for-purpose financial planning and<br> performance management framework in<br> order to help the business to make better<br> decisions.</p>
                            <!--<a href="#">Read More About <span class="la la-chevron-right"></span></a>-->
                        </div><!-- ends: .widget -->
                    </div><!-- ends: .col-lg-3 -->

                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                        <div class="widget widget--links">
                            <h4 class="widget__title">quick links</h4>
                            <ul class="links">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="service.php">Services</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                                
                            </ul>
                        </div><!-- ends: .widget -->
                    </div><!-- ends: .col-lg-3 -->

                    <!--<div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                        <div class="widget widget--links">
                            <h4 class="widget__title">our services</h4>
                            <ul class="links">
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Marketing</a></li>
                                <li><a href="#">Management</a></li>
                                <li><a href="#">Accounting</a></li>
                                <li><a href="#">Training</a></li>
                                <li><a href="#">Consultation</a></li>
                            </ul>
                        </div>
                    </div><!-- ends: .col-lg-3 -->

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget subcribe--widget">
                            <h4 class="widget__title">Newsletter</h4>
                            <p>Subscribe to get update and information. Don't worry, we won't send spam!</p>
                            <form class="subscribe_form" action="#" method="post">
                                <div class="input_with_embed">
                                    <input type="text"  id="email" name="email" class="form-control-lg input--rounded border-0" placeholder="Enter email"required>
                                    <div class="embed_icon">
                                        <span class="la la-envelope"></span>
                                    </div>
									
                                </div>
								<p class="&bnsp">  </p>
								<button type="submit" class="btn btn-success">Submit</button>
                            </form>

                            <div class="widget__social">
                                
    

    <div class="social  ">
        <ul class="d-flex flex-wrap">
            <li><a href="#" class="facebook"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#" class="twitter"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#" class="linkedin"><span class="fab fa-linkedin-in"></span></a></li>
            <li><a href="#" class="gplus"><span class="fab fa-google-plus-g"></span></a></li>
        </ul>
    </div><!-- ends: .social -->

                            </div>
                        </div><!-- ends: .widget -->
                    </div><!-- ends: .col-lg-3 -->
                </div>
            </div>
        </div><!-- ends: .footer__big -->
        <div class="footer__small text-center">
            <p>©2020 <?php echo $this->conn->company_info('company_name');?>. All rights reserved. Created by <a href="index.php"><?php echo $this->conn->company_info('company_name');?></a></p>
        </div><!-- ends: .footer__small -->
    </footer>
    
    

<div class="go_top">
    <span class="la la-angle-up"></span>
</div>

     <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
     <!-- inject:js-->
     <script src="<?= $panel_url;?>js/plugins.min.js"></script>
     <script src="<?= $panel_url;?>js/script.min.js"></script>
     <!-- endinject-->
     
  <script>
    $('.check_sponsor_exist').change(function (e) { 
        var ths = $(this);
        var res_area = $(ths).attr('data-response');
        var sponsor = $(this).val();        
        $.ajax({
          type: "post",
          url: "<?= base_url('register/check_sponsor_exist');?>",
          data: {u_sponsor:sponsor},          
          success: function (response) {            
             var res = JSON.parse(response);          
            if(res.error==true){
              $('#'+res_area).html(res.msg).css('color','red');              
            }else{
              $('#'+res_area).html(res.msg).css('color','green');              
            }
          }
        });
    });

    $('.check_username_exist').change(function (e) { 
        var ths = $(this);
        var res_area = $(ths).attr('data-response');
        var username = $(this).val();        
        $.ajax({
          type: "post",
          url: "<?= base_url('register/check_username_exist');?>",
          data: {username:username},          
          success: function (response) {  
            //alert(response);
            var res = JSON.parse(response);          
            if(res.error==true){
              $('#'+res_area).html(res.msg).css('color','red');              
            }else{
              $('#'+res_area).html(res.msg).css('color','green');              
            }
          }
        });
    });

    $('.check_mobile_valid').change(function (e) {
         
        var ths = $(this);
        var res_area = $(ths).attr('data-response');
        var mobile = $(this).val();        
        $.ajax({
          type: "post",
          url: "<?= base_url('register/check_mobile_valid');?>",
          data: {mobile:mobile},          
          success: function (response) {  
            //alert(response);
            var res = JSON.parse(response);          
            if(res.error==true){
              $('#'+res_area).html(res.msg).css('color','red');              
            }else{
              $('#'+res_area).html(res.msg).css('color','green');              
            }
          }
        });
    });

    $('.check_email_valid').change(function (e) {
         
        var ths = $(this);
        var res_area = $(ths).attr('data-response');
        var email = $(this).val();        
        $.ajax({
          type: "post",
          url: "<?= base_url('register/check_email_valid');?>",
          data: {email:email},          
          success: function (response) {  
            //alert(response);
            var res = JSON.parse(response);          
            if(res.error==true){
              $('#'+res_area).html(res.msg).css('color','red');              
            }else{
              $('#'+res_area).html(res.msg).css('color','green');              
            }
          }
        });
    });

    $('.country').change(function (e) { 
       var rr = $(this).find(':selected').attr('data-phonecode');       
       var mobile_code_sec =  $(this).attr('data-response');      
       $('.'+mobile_code_sec).html(rr);
    });

    $('.no_space').keyup(function (e) {         
         var TCode = $(this).val();
        var res_area = $(this).attr('data-response');
		if( /[^a-zA-Z0-9\-\/]/.test( TCode ) ) {
			$(this).val('');
			
			$('#'+res_area).html('Space Not Allowed.').css('color','red');
			return false;
		}                
    });

  </script>
   
</body>


</html>