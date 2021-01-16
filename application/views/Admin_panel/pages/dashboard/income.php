 <style>
	  .loading {
         
          opacity: 0.7;
          background-color: #fff;
          z-index: 99;
          text-align: center;
        }
        
        .loading-image {
          
          background-image:url("<?= base_url('images/loader/ajax-loader.gif');?>");
          z-index: 100;
        }
	  </style>
	  
	  
          <div class="card">
            <div class="card-header">
                <span id="bv_title">Income Report</span>
                <!--<div class="card-action">

                <div class="form-group mb-0">
                    <select class="form-control form-control-sm">
                      <option>Jan 18</option>
                      <option>Feb 18</option>
                      <option>Mar 18</option>
                      <option>Apr 18</option>
                      <option>May 18</option>
                      <option>Jun 18</option>
                      <option>Jul 18</option>
                      <option>Aug 18</option>
                      <option selected>Sept 18</option>
                    </select>
                  </div>
                </div>-->
                
                <div class="card-action">
                 <div class="dropdown">
                 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                  <i class="icon-options"></i>
                 </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item change_income" href="javascript:void();" data-val="all">All</a>
                        <a class="dropdown-item change_income" href="javascript:void();" data-val="today">Today</a>
                        <a class="dropdown-item change_income" href="javascript:void();" data-val="24hour">24 Hours</a>
                        <a class="dropdown-item change_income" href="javascript:void();" data-val="lastweek">Last Week</a>
                        <a class="dropdown-item change_income" href="javascript:void();" data-val="lastmonth">Last Month</a>
                   </div>
                  </div>
                 </div>
                </div>
                <div class="card-body">
                     <div id="loader_section" class="">
                         <div id="loader_img_section" class="">
                             <div id="incomedata" class="" >
                                <?php
                                $admn_path=$this->conn->company_info('admin_directory');
                                $dta['type']='all';
                                $this->load->view($admn_path.'/pages/dashboard/income_table',$dta);
                                ?>
                            </div>
                        </div>
                    </div>
                  <!--<canvas id="dashboard-chart-1"></canvas>-->
                </div>
          </div>
        <script>
          $('.change_income').click(function(){
              
              //$("#loader_section").addClass("loading");
              //$("#loader_img_section").addClass("loading-image");
              
              $("#incomedata").html('<div class="loading"><img class="loading-image" src="<?= base_url('images/loader/ajax-loader.gif');?>"> </div>');
              var val =$(this).attr('data-val');
               $.ajax({
                type: "post",
                url: "<?= $admin_path.'dashboard/income';?>",
                data: {type:val},          
                success: function (response) {
                   $('#incomedata').html(response);
                   //$("#loader_section").removeClass("loading");
                  //$("#loader_img_section").removeClass("loading-image");
                }
              });
              
          });
        </script>