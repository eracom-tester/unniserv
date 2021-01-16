<br>
<div class="row">
<div class="col-lg-3"></div>
    <div id="content" class="col-lg-6">
        <center>
    <div  class="card card-body">
      <h1>Success</h1>
             
      <?php 
         $success['param']='success';
         $success['alert_class']='alert-success';
         $success['type']='success';
         echo "<h4 style='color:black;'> Your Account has been registered. You can login now. Username : ".$_GET['username']." & Password :".$_GET['pass']."</h4>";
          //$this->show->show_alert($success);
           ?>
         <a class="btn btn-info" href="login">Login</a><a class="btn btn-info" href="register">Register</a>    
      </div>
            </center>
      </div>
    	
</div>
<br>
