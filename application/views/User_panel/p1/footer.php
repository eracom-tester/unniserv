
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © <?= date('Y');?> <?= $this->conn->company_info('company_name');?>
        </div>
      </div>
    </footer>
 
   
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
  <script src="<?= $panel_url;?>assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
  <script src="<?= $panel_url;?>assets/plugins/ion-rangeslider/js/range-slider-script.js"></script>
  <script src="<?= $panel_url;?>assets/js/index.js"></script>
  <script>
    $('.check_username_exist').change(function (e) { 
        var ths = $(this);
        var res_area = $(ths).attr('data-response');
        var username = $(this).val();        
        $.ajax({
          type: "post",
          url: "<?= $panel_path.'profile/verify_username';?>",
          data: {username:username},          
          success: function (response) {  
           // alert(response);
            var res = JSON.parse(response); 

            if(res.error==true){
              $('#'+res_area).html(res.msg).css('color','red');              
            }else{
              $('#'+res_area).html(res.msg).css('color','green');              
            }
          }
        });
    });

$('.send_otp').click(function (e) { 
  $(this).html('<i class="fa fa-refresh fa-spin"></i>'); 
  var res_area = $(this).attr('data-response_area');
  
  $.ajax({
          type: "post",
          url: "<?= $panel_path.'profile/send_otp';?>",
          data: {gen_otp:1},          
          success: function (response) {  
           // alert(response);
            $(this).html('Resend OTP'); 
            $('#'+res_area).css('display','block');
          }
        });

   
});

$('.pin_transfer_btn').click(function (e) { 
  $(this).html('<i class="fa fa-refresh fa-spin"></i>'); 
  //$(this).prop('disabled', true); 
  
  var tx_username = $(this).attr('data-tx_username');
  var selected_pin = $(this).attr('data-selected_pin');
  var no_of_pins = $(this).attr('data-no_of_pins');
  
  $.ajax({
          type: "post",
          url: "<?= $panel_path.'pin/ajax_pin_transfer';?>",
          data: {pin_transfer_btn:1,tx_username:$('#'+tx_username).val(),selected_pin:$('#'+selected_pin).val(),no_of_pins:$('#'+no_of_pins).val()},          
          success: function (response) {  
            alert(response);
            var resp = JSON.parse(response);
            if(resp.error==true){
              $('#'+tx_username+'_error').html(resp.tx_username);
              $('#'+selected_pin+'_error').html(resp.selected_pin);
              $('#'+no_of_pins+'_error').html(resp.no_of_pins);
              $(this).html('Transfer');
            }else{
              $('#message_success').html(resp.msg);
              $(this).hide();
              //location.reload();
            } 
                
          }
        });

   return false;
});

  function copyLink(iid) {
                  / Get the text field /
                  var copyText = document.getElementById("referral_link_right");
                
                  / Select the text field /
                  copyText.select();
                  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
                
                  / Copy the text inside the text field /
                  document.execCommand("copy");
                
                  / Alert the copied text /
                  alert("Copied the text: " + copyText.value);
                }


  </script>
  
</body>

</html>