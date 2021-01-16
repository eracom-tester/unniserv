
<section class="advantage-section">
    <div class="overlay">
        <section class="contact-us-section" id="contact-us-section">
    <div class="container" style="padding: 0px ! important">
        
        <div class="row">
            <div class="col-lg-3">
                
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
				
                    <form id="contactForm" method="post" class="contact-form-aqua" action="">
                        <h2 class="contact-head text-center">Success</h2>
						<div class="form-group">
										<center>	<?php 
							 $success['param']='success';
							 $success['alert_class']='alert-success';
							 $success['type']='success';
							 echo "<h4 style='color:black;'> Your Account has been registered.<br> You can login now.<br>Name : ".$_GET['name']." <br> Username : ".$_GET['username']." <br> Password :".$_GET['pass']."</h4>";
							  //$this->show->show_alert($success);
								?></center>
										</div>
									
									
									
									
									<div class="col-12">
										 <a class="btn btn-success btn-block" href="login">Login</a><br><a class="btn btn-success btn-block" href="register">Register</a>   
									</div>
                        
                    </form>
					
                </div>
            </div>
			<div class="col-lg-3">
                
            </div>
        </div>
    </div>
</section>
    </div>
</section>


<!-- contact-us section begin -->

<!-- contact-us section end -->