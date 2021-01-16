
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

  <script src="<?= $panel_url;?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
  <script src="<?= $panel_url;?>assets/plugins/bootstrap-touchspin/js/bootstrap-touchspin-script.js"></script>

  <!--Select Plugins Js-->
  <script src="<?= $panel_url;?>assets/plugins/select2/js/select2.min.js"></script>
  <!--Inputtags Js-->
  <script src="<?= $panel_url;?>assets/plugins/inputtags/js/bootstrap-tagsinput.js"></script>

  <!--Bootstrap Datepicker Js-->
  <script src="<?= $panel_url;?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo $panel_url;?>assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
    <script>
      $('#default-datepicker').datepicker({
        todayHighlight: true
      });
      $('#autoclose-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
      });

      $('#inline-datepicker').datepicker({
         todayHighlight: true
      });

      $('#dateragne-picker .input-daterange').datepicker({
       });

    </script>


  <!-- Chart js -->
  <script src="<?= $panel_url;?>assets/plugins/Chart.js/Chart.min.js"></script>
  <!--Peity Chart -->
  <script src="<?= $panel_url;?>assets/plugins/peity/jquery.peity.min.js"></script>
  <!-- Index js -->
  <script src="<?= $panel_url;?>assets/js/index.js"></script>
  <script>
    $('.check_username_exist').change(function (e) { 
        var ths = $(this);
        var res_area = $(ths).attr('data-response');
        var username = $(this).val();        
        $.ajax({
          type: "post",
          url: "<?= $admin_path.'users/verify_username';?>",
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
            url: "<?= $admin_path.'fund/send_otp';?>",
            data: {gen_otp:1},          
            success: function (response) {  
            // alert(response);
              $(this).html('Resend OTP'); 
              $('#'+res_area).css('display','block');
            }
          });

    
  });
  $('#selectAll').click(function(e){
    var table= $(e.target).closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
});
  </script>
 
  <script src="<?= $panel_url;?>assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
  <script src="<?= $panel_url;?>assets/js/widgets.js"></script>
  
  
<script src="<?php echo $panel_url;?>assets/plugins/switchery/js/switchery.min.js"></script>


    <script>
      var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
      $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
       });

      

    </script>

    <!--Bootstrap Switch Buttons-->
    <script src="<?php echo $panel_url;?>assets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>


<script src="<?php echo $panel_url;?>assets/plugins/jquery-multi-select/jquery.multi-select.js"></script>
    <script src="<?php echo $panel_url;?>assets/plugins/jquery-multi-select/jquery.quicksearch.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.single-select').select2();
      
            $('.multiple-select').select2();

        //multiselect start

            $('#my_multi_select1').multiSelect();
            $('#my_multi_select2').multiSelect({
                selectableOptgroup: true
            });

            $('#my_multi_select3').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                afterInit: function (ms) {
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });

         $('.custom-header').multiSelect({
              selectableHeader: "<div class='custom-header'>Selectable items</div>",
              selectionHeader: "<div class='custom-header'>Selection items</div>",
              selectableFooter: "<div class='custom-header'>Selectable footer</div>",
              selectionFooter: "<div class='custom-header'>Selection footer</div>"
            });



          });

    </script>
</body>

</html>