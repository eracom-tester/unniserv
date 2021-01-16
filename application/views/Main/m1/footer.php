
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	<!-- <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © <?= date('Y');?> <?= $this->conn->company_info('company_name');?>
        </div>
      </div>
    </footer> -->
 
   
  </div> 

 
  <script src="<?= $panel_url;?>assets/js/jquery.min.js"></script>
  <script src="<?= $panel_url;?>assets/js/popper.min.js"></script>
  <script src="<?= $panel_url;?>assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="<?= $panel_url;?>assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="<?= $panel_url;?>assets/js/waves.js"></script>
  <!-- sidebar-menu js -->
  <script src="<?= $panel_url;?>assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="<?= $panel_url;?>assets/js/app-script.js"></script>
  <!-- Chart js -->
  <script src="<?= $panel_url;?>assets/plugins/Chart.js/Chart.min.js"></script>
  <!--Peity Chart -->
  <script src="<?= $panel_url;?>assets/plugins/peity/jquery.peity.min.js"></script>
  <!-- Index js -->
  <script src="<?= $panel_url;?>assets/js/index.js"></script>

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
            if(response){
              $('#'+res_area).html(response).css('color','green');
            }else{
              $('#'+res_area).html("User Not exists!").css('color','red');
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

    $('.country').change(function (e) { 
       var rr = $(this).find(':selected').attr('data-phonecode');       
       var mobile_code_sec =  $(this).attr('data-response');      
       $('.'+mobile_code_sec).html(rr);
    });

    
  </script>
</body>

</html>