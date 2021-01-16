<!--Start footer-->
<div class="overlay toggle-menu"></div>
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © <?= date('Y');?> <?= $this->conn->company_info('company_name');?>
        </div>
      </div>
    </footer>
	<!--End footer-->
	
	
	
	
	
	 <!-- Bootstrap core JavaScript-->
  <script src="<?= $panel_url;?>assets/js/jquery.min.js"></script>
  <script src="<?= $panel_url;?>assets/js/popper.min.js"></script>
  <script src="<?= $panel_url;?>assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="<?= $panel_url;?>assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="<?= $panel_url;?>assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="<?= $panel_url;?>assets/js/jquery.loading-indicator.html"></script>
  <!-- Custom scripts -->
  <script src="<?= $panel_url;?>assets/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="<?= $panel_url;?>assets/plugins/Chart.js/Chart.min.js"></script>
  <!-- Vector map JavaScript -->
  <script src="<?= $panel_url;?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="<?= $panel_url;?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Easy Pie Chart JS -->
  <script src="<?= $panel_url;?>assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
  <!-- Sparkline JS -->
  <script src="<?= $panel_url;?>assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
  <script src="<?= $panel_url;?>assets/plugins/jquery-knob/excanvas.js"></script>
  <script src="<?= $panel_url;?>assets/plugins/jquery-knob/jquery.knob.js"></script>
      <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
			<script>
$(document).ready(function(){
    $('[data-toggle="popover1"]').popover();   
});
</script>
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
  <!-- Index js -->
  <script src="<?= $panel_url;?>assets/js/index.js"></script>
  
  
  
   <script>
   $('.select_address').change(function(){
            var ths = $(this);
            var res_area = $(ths).attr('data-response');
            var s =$(this).children('option:selected').attr('value');
            $.ajax({
              type: "post",
              url: "<?= $panel_path.'fund/get_payment_method';?>",
              data: {connection_type:s},          
              success: function (response) {  
                //alert(response);
                $('#'+res_area).html(response);  
                
              }
            });
        });
   
   
    $('.payment_type').change(function(){
            // alert(s);
            var ths = $(this);
            var res_area = $(ths).attr('data-response');            
            var s =$(this).children('option:selected').attr('value');
            $.ajax({
              type: "post",
              url: "<?= $panel_path.'fund/get_payment_method_image';?>",
              data: {connection_type:s},          
              success: function (response) {  
                //alert(res_area);
                 //var loc = $(this).attr("src");
                $('#'+res_area).attr("src",response);
                //$('#'+res_area).html(response);  
                
              }
            });
           
        }); 
   
   
   
   
   $('.selected_cripto').change(function(){
           
            var ths = $(this);
            var res_area = $(ths).attr('data-response');
            
            var s =$(this).children('option:selected').attr('value');
            //alert(s);
            $.ajax({
              type: "post",
              url: "<?= $panel_path.'fund/cripto_detail';?>",
              data: {selected_address:s},          
              success: function (response) {  
                //alert(response);
                $('#'+res_area).html(response);  
                
              }
            });
        });
   
   
   
   
   
   
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

        $('.selected_pins').change(function(){
            
            var ths = $(this);
            var res_area = $(ths).attr('data-response');
            var s =$(this).children('option:selected').attr('value');
            //alert(s);
            $.ajax({
              type: "post",
              url: "<?= $panel_path.'invest/pin_detail';?>",
              data: {selected_pin:s},          
              success: function (response) {  
                //alert(response);
                $('#'+res_area).html(response);  
                
              }
            });
        });
        
        $('.check_balance').change(function (e) {
         
            var ths = $(this);
            var res_area = $(ths).attr('data-response');
            var wallet = $(this).val();  
            //alert(res_area);      
            $.ajax({
              type: "post",
              url: "<?= $panel_path.'fund/wallet_balance';?>",
              data: {wallet:wallet},          
              success: function (response) {  
                //alert(response);
                var res = JSON.parse(response);          
                if(res.error==true){
                  $('#'+res_area).html(res.message).css('color','red');              
                }else{
                  $('#'+res_area).html(res.message).css('color','green');              
                }
              }
            });
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
  <?php
    	$get_alert=$this->conn->runQuery('*','notice_board',"type='popup' and status='1'");
    	
    	if($get_alert){
    	    ?>
    	    
    	   	$("#panel_popup").modal();
    	    <?php
    	}
    	?>


  </script>
  
  

    </body>


</html>