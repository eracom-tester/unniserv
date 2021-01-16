
<style> 
#logindiv {  
  background: #D6D7DF;
  animation: logindiv 3s infinite;
}

@keyframes logindiv {
  from {background-color: #D6D7DF;}
  to {background-color: #D3D4DA;}
}
</style>

<section class="banner-section">
    <div class="overlay">
        <div class="video-overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="<?= $panel_url;?>img/football.mp4" type="video/mp4">
        </video>

        <div class="container">
            <div class="total-slide">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div  class="row">    
                        <div class="col-lg-4"></div>
                                    <div id="logindiv" class="col-lg-4 card card-body  ">
                                        <div class="authorize_box">
                                            <div class="title_default_dark title_border text-center">
                                                <h3 class="animation" data-animation="fadeInUp" data-animation-delay="0.2s">Welcome</h3>
                                                <hr>
                                                <p class="animation" data-animation="fadeInUp" data-animation-delay="0.4s">Sign in to your account</p>
                                            </div>
                                            <div class="field_form authorize_form">
                                            <?php 
                         
                        
                                                $success['param']='success';
                                                $success['alert_class']='alert-success';
                                                $success['type']='success';
                                                $this->show->show_alert($success);
                                                ?>
                                                    <?php 
                                                $erroralert['param']='error';
                                                $erroralert['alert_class']='alert-danger';
                                                $erroralert['type']='error';
                                                $this->show->show_alert($erroralert);
                        
                                                echo form_open('login');
                        
                                                    
                                        
                                            ?>
                                
                                                
                        
                                                
                                                    <div class="form-group col-md-12 animation" data-animation="fadeInUp" data-animation-delay="0.6s">
                                                            <input type="text" class="form-control"  placeholder="Username" id="username" name="username" value="<?php echo set_value('username')?>">
                                                                <span class="text-danger"><?php echo form_error('username');?></span>
                                                    </div>
                                                    <div class="form-group col-md-12 animation" data-animation="fadeInUp" data-animation-delay="0.7s">
                                                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="<?php echo set_value('password')?>">
                                                        <span class="text-danger"><?php echo form_error('password');?></span>
                                                    </div>
                                                    <div class="form-group col-md-12 text-center animation" data-animation="fadeInUp" data-animation-delay="0.8s">
                                                        <button class="btn btn-primary btn-radius" type="submit"  name="login">Login</button>
                                                    </div>
                                                    <div class="form-group col-md-12 text-center animation" data-animation="fadeInUp" data-animation-delay="0.9s">
                                                        <a class="forgot_pass" href="<?= base_url('forgot');?>">Forgot Password?</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="divider small_divider"></div>
                                        <div class="text-center">
                                            <span class="animation" data-animation="fadeInUp" data-animation-delay="1s">Don't have an account?<a href="<?= base_url('register');?>"> Register</a></span>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                
            </div>
        </div>         
    </div>
</section>

  