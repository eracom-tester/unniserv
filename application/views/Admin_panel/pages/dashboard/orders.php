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
              <div class="card-header border-0">
                        Recent Orders Table <a href="<?= $admin_path.'order'?>" class=" btn-outline-success btn-round  ">All </a>
                <div class="card-action">
                    
                    <div class="form-group mb-0">
                        <select id="rec_ord" class="form-control form-control-sm">
                          <option value="all">All</option>
                          <option value="pending">Pending</option>
                          <option value="accepted">Accepted</option>
                          <option value="rejected">Rejected</option>
                          <option value="approved">Delivered</option>
                          <!--<option value="emi">EMI</option>-->
                           
                           
                          
                        </select>
                      </div>
                    </div>
                </div>
               <div id="rc_order" class="table-responsive">
         
                 <?php
                    $admn_path=$this->conn->company_info('admin_directory');
                    $dta['type']='all';
                    $this->load->view($admn_path.'/pages/dashboard/order_table',$dta);
                ?>
               </div>
          </div>
           <script>
          $('#rec_ord').change(function(){
              var val = $('#rec_ord :selected').val();
              //$("#loader_section").addClass("loading");
              //$("#loader_img_section").addClass("loading-image");
              
              $("#rc_order").html('<div class="loading"><img class="loading-image" src="<?= base_url('images/loader/ajax-loader.gif');?>"> </div>');
              
              
               $.ajax({
                type: "post",
                url: "<?= $admin_path.'dashboard/orders';?>",
                data: {type:val},          
                success: function (response) {
                   $('#rc_order').html(response);
                   //$("#loader_section").removeClass("loading");
                  //$("#loader_img_section").removeClass("loading-image");
                }
              });
              
          });
        </script>