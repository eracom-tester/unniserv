<!-- footer section begin -->
<footer class="footer-section">
    <div class="overlay">

        <div class="waveWrapper waveAnimation">
            <div class="waveWrapperInner bgTop">
                <div class="wave waveTop"></div>
            </div>
            <div class="waveWrapperInner bgMiddle">
                <div class="wave waveMiddle"></div>
            </div>
            <div class="waveWrapperInner bgBottom">
                <div class="wave waveBottom"></div>
            </div>
        </div>

        <div class="footer-content">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="social-icon">
                            <ul class="icon-area">
                                <li class="social-nav">
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li class="social-nav">
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li class="social-nav">
                                    <a href="#"><i class="icofont-pinterest"></i></a>
                                </li>
                                <li class="social-nav">
                                    <a href="#"><i class="icofont-rss"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-text">
                            <h5 class="footer-title">Subscribe to <?php echo $this->conn->company_info('company_name');?></h5>
                            <h2 class="footer-subtitle">To Get Exclusive benefits</h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7">
                        <div class="subscribe">
                            <input type="email"  id="email" name="email" placeholder=" Email " class="input-subscribe" value="<?php echo set_value('email');?>">
                            <button  name="register" class="subscribe-btn">Subscribe</button>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 col-md-12 d-flex justify-content-start reunir-content-center">
                            <div class="footer-bottom-left">
                                <p>Copyright © <?= date('Y');?>.All Rights Reserved By <a href="#"><?= $this->conn->company_info('company_name');?></a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 d-flex justify-content-end reunir-content-center">
                            <div class="footer-bottom-right">
                                <ul>
                                    <li>
                                        <a href="<?= base_url();?>index">Home</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url();?>login">Login</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url();?>register">Register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer section end -->

    <script src="<?= $panel_url;?>js/app.js"></script>
	
	
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
	    if( /[^a-zA-Z0-9@!#$%&?|_\-\/]/.test( TCode ) ) {
			$(this).val('');
			
			$('#'+res_area).html('Space Not Allowed.').css('color','red');
			return false;
		}                
    });

  </script>
</body>

</html>