<?php 
session_start();

//echo $_GET['show'];

if($_GET['show']=='with_reffer'){
?>	
<div class="">
	<form id="regfrm"  action="" method="post"  >
	
		<div class="">
		 <div class="form-group">
				<label class="control-label required" for="name"> Sponsor Id<sup style="color:red">*</sup></label>
			<div class="input-group">					
			<span class="input-group-addon span_set">
			<i class="glyphicon glyphicon-user"></i></span>		
			<input  name="u_sponsor"  id="u_sponsor" type="text" class="form-control" placeholder=" Sponsor Id" value="<?php echo $_SESSION['ref']; ?>"   size="40"  onchange="return verify_id();" required>	
				<br>	
            <span class="pull-left" id="result_user"></span>	
			</div>		
			</div>
			
			<span class="" style="color:red" id="spr_err"></span>
		</div>
		<div id="basic_info" style="display:none;">
			<!--<div class="form-group">
			   <div class="input-group">
			   
				<select   class="form-control shadow p-3 mb-3 bg-white rounded" name="position_name" style="height:55px;" id="position" required>
				<?php if(!empty($_SESSION['position'])){ 
				?>
				<option  class="form-control"value='<?php echo $_SESSION['position'];?>' selected ><?php if($_SESSION['position']=="position_left"){echo $test1="Left";}else { echo $test2="Right";}?></option>
				<?php  } ?>
													
					<option id="op_left" value='position_left'>Left</option>
					<option id="op_right" value='position_right'>Right</option>
				</select>
				
			</div>		
			</div>	-->	
			<div class="form-group">
			<div class="input-group">					
			<span class="input-group-addon span_set">
			<i class="glyphicon glyphicon-user"></i></span>		
			<input type="text" name="reffer_id" size="40"  id="reffer_id" class="form-control" placeholder="Reffer id" onkeypress="if (this.value.match(/[^a-zA-Z0-9\-\/]/)) {this.value = this.value.replace(/[^a-zA-Z0-9\-\/]/, '');}"  onkeyup="verify_reffer();"  required >	
				<br>	
            <span class="pull-left" id="reffer_res"></span>	
			</div>		
			</div>
			
			<div class="form-group">
			<div class="input-group">					
			<span class="input-group-addon span_set">
			<i class="glyphicon glyphicon-user"></i></span>		
			<input type="text" name="username" size="40"  id="username_id" class="form-control" placeholder="Username" onkeypress="if (this.value.match(/[^a-zA-Z0-9\-\/]/)) {this.value = this.value.replace(/[^a-zA-Z0-9\-\/]/, '');}"  onkeyup="verify_user();" required >	
				<br>	
            <span class="pull-left" id="user_name"></span>	
			</div>		
			</div>
			
			<div class="form-group">
			<div class="input-group">					
			<span class="input-group-addon span_set">
			<i class="glyphicon glyphicon-user"></i></span>		
				<input type="text" name="first_name" size="40"  id="first_name" class="form-control" placeholder="Name" required >	
				<br>	
            <span class="pull-left" id=""></span>	
			</div>		
			</div>		
			
						
			<div class="form-group">
				<div class="input-group">
					<input type="hidden" name="mob_code" id="mob_code">
					<span class="input-group-addon span_set"><i class="fa fa-envelope-o" style="font-size:15px"></i></span>
					<input type="email" name="u_email" id="" size="40"  class="form-control" placeholder="Enter Email Address"  required>
						<small class="pull-left" id='message'></small>
				</div>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<input type="hidden" name="mob_code" id="mob_code">
					<span class="input-group-addon span_set"><i class="fa fa-mobile" style="font-size:30px"></i></span>
					<input type="text" name="u_mobile" id="mobile" size="40"  class="form-control" placeholder="Mobile Number" >
						<small class="pull-left" id='message'></small>
				</div>
			</div>
			<div class="form-group"> 
				<div class="input-group">
					<span class="input-group-addon span_set"><i class="glyphicon glyphicon-lock"></i></span>
					<input  type="password" name="password1" size="40"  id="password" class="form-control" placeholder="password"  required>
					<small class="pull-left" id='message'></small>
				</div>
			</div>
		
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon span_set"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" name="u_confirm_password" size="40"  id="password_confirm" class="form-control" placeholder="Confirm Password"  onkeyup="checkPass1(); return false;" required ><br>
					<small class="pull-left" id='message'></small>
				</div>
				
			</div>
			
			
			<div id="form_actions" class="form-group">
				<button name="btn_register" id="submit_btn" class="form-control"style="color:white;background-color:#33e2a0;" onclick="return register();">Register</button>
			</div>
		</div>
	</form>
</div>
						<?php 
}elseif($_GET['show']=="without_reffer"){
	?>
	<center><h5>You can't register without sponsor id, Please contact to upline for getting sponsor id.</h5></center>
	<!--
		<form id="regfrm" method="post" action="reg.php" class="">		
		<div class="form-group">			<div class="input-group">					<span class="input-group-addon span_set"><i class="glyphicon glyphicon-user"></i></span>					<input type="text" name="username" id="username_id" class="form-control" placeholder="Username" onkeypress="if (this.value.match(/[^a-zA-Z0-9\-\/]/)) {						this.value = this.value.replace(/[^a-zA-Z0-9\-\/]/, '');						}"  onkeyup="verify_user();" required >				<span id="result_user"></span>			</div>			</div>			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon span_set"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" name="first_name" id="first_name" class="form-control" placeholder="Name" required >
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon span_set"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="email" name="u_email" id="" class="form-control" placeholder="Enter Email Address" onchange="return verify_email();" required>
				</div>					
			<span id="eml_err"></span>	
			</div>	
			<div class="form-group">
				<div class="input-group">
					<input type="hidden" name="mob_code" id="mob_code">
					<span class="input-group-addon span_set"><i class="glyphicon glyphicon-phone"></i></span>
					<input type="text" name="u_mobile" id="mobile" class="form-control" placeholder="Mobile Number" pattern="^\+?1?\d{9,15}$" required data-validation-required-message="Please enter mobile number." data-validation-pattern-message="Please enter valid mobile number." aria-describedby="countryCode">
					<div class="form-control-position">
						<i class="icon-mobile"></i>
					</div>
				</div>
			</div>
			<div class="form-group"> 
				<div class="input-group">
					<span class="input-group-addon span_set"><i class="glyphicon glyphicon-lock"></i></span>
					<input  type="password" name="password1" id="password" class="form-control" placeholder="password"  required>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon span_set"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" name="u_confirm_password" id="password_confirm" class="form-control" placeholder="Confirm Password"  onkeyup="checkPass1(); return false;" required >
				</div>
				<small id='message'></small>
			</div>								
			<div class="form-group">
				<button type="submit" name="btn_register" id="submit_btn" class="btn btn-primary btn-block">Register</button>
			</div>
		</form>	-->
	<?php 
}
?>
<script>
	<?php
if($_SESSION['ref']!=''){
	?> 	
	  $('#basic_info').css("display","block");
	<?php 
}
?>
	
	/////////////////// for password check //////////	
	
	
$('#password, #password_confirm').on('keyup', function () {
  if ($('#password').val() == $('#password_confirm').val()) {
    $('#message').html('Match').css('color', 'green');
	$('#password_confirm').css('background-color','green');
	$('#submit_btn').attr('disabled', false);
  } else{ 
    $('#message').html('Not Match').css('color', 'red');
	$('#password_confirm').css('background-color','red');
	$('#submit_btn').attr('disabled',true);
  }
});

	/////////////////// for password check //////////
</script>
