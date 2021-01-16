<?php
include '../config.php';
if(isset($_POST['change_password'])){
 $otp_pass=$_SESSION['otp_pass'];
$pass=$_POST['otp'];
if($otp_pass==$pass){
$_SESSION['otp_matched']=true;
//$update=$db->run_query("update users set password='$pass' where sno='$sno'");
?>
<script>window.location="recover_password.php";</script>
<?php
}else{
	?>
<script>alert("Otp not match.");</script>
<?php
}
}
 ?>

<!doctype html>
<html lang="en">


<head>
   <?php include 'head.php';?>
</head>
<body>
     
    <section class="login-register bgimage biz_overlay overlay--secondary2">
        <div class="bg_image_holder">
            <img src="img/image3.jpg" alt="">
        </div>
        <div class="content_above">
            
    <!-- start menu area -->
    <?php include 'header.php';?>
    <!-- end menu area -->


            <div class="login-form d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                            <div class="form-wrapper">
                                <div class="card card-shadow">
                                    <div class="card-header">
                                        <h4 class="text-center">Set Otp</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action=""  method="post">
                                            <div class="form-group">
                                               <input class="form-control" placeholder="Enter OTP*" id="email" name="otp" type="text">
                                            </div>
                                           
                                            <div class="form-action d-flex justify-content-between">
                                                
                                                <a href="login.php" class="color-secondary">Cancel</a>
                                            </div>
                                            <div class="form-group text-center m-bottom-20">
                                                <button class="btn btn-secondary" type="submit" name="change_password">Submit</button>
                                            </div>
                                        </form>
                                        
                                        <!--<div class="d-flex other-logins justify-content-center">
                                            <a href="#"><span class="fab fa-facebook-f"></span> Facebook</a>
                                            <a href="#"><span class="fab fa-google-plus-g"></span> Google</a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- ends: .col-lg-6 -->
                    </div>
                </div>
            </div><!-- ends: .login-form -->

        </div>
    </section>


    <?php include 'script.php';?>
	<script>
	  $('#password, #new_password').on('keyup', function () {
  if ($('#password').val() == $('#new_password').val()) {
    $('#message').html('Match').css('color', 'green');
	$('#new_password').css('background-color','green');
	$('#change_password').attr('disabled', false);
  } else{ 
    $('#message').html('Not Match').css('color', 'red');
	$('#new_password').css('background-color','red');
	$('#change_password').attr('disabled',true);
  }
});
</script>
</body>


</html>