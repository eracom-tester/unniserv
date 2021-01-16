<?php
$date=date('Y-m-d');
  $user_id= $this->session->userdata('franchise_id');
  $franschise_detail=$this->conn->runQuery('*','franchise_users',"id='$user_id'");
  
?>

    <br>
  <h4>Dashboard</h4>
  <hr>
    <!-- End Breadcrumb-->

    <!-- End Breadcrumb-->
	   
          
           <div class="col-12 col-lg-12 col-xl-12">
               <div class="row">
                    <div class="col-12 col-lg-6 col-xl-6">
                   <ul class="list-group">
                        <li class="list-group-item text-muted">Franchise User Profile</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Username:</strong></span><?php echo $franschise_detail[0]->username?></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Name:</strong></span> <?php echo $franschise_detail[0]->name?></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Franchise Name:</strong></span><?php echo $franschise_detail[0]->franchise_name?></li>
                         <li class="list-group-item text-right"><span class="pull-left"><strong>Mobile Number:</strong></span><?php echo $franschise_detail[0]->mobile?></li>
                        
                    </ul> 
                   <br>
                
                  </div>
           
            <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Purchase Product</p>
				  <h4 class="text-primary">
                    <?php
                    echo $ttl_purchase=$this->conn->runQuery('SUM(quantity) as total','franchise_order_items',"f_code='$user_id'")[0]->total;?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
			<div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Sales Product</p>
				  <h4 class="text-primary">
                    <?php $ttl_sale=$this->conn->runQuery('SUM(quantity) as total','order_items',"franchise_id='$user_id'")[0]->total;
                          echo $ttl_sale!='' ? $ttl_sale:0;
                        
                    ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
			<div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Product in Stock</p>
				  <h4 class="text-primary">
                    <?php
                   echo $ttl_purchase-$ttl_sale;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
            <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Business Volume</p>
				  <h4 class="text-primary">
                   <?php  $ttl_sale=$this->conn->runQuery('SUM(order_bv) as total','franchise_orders',"f_code='$user_id'")[0]->total;
                   echo $ttl_sale!='' ? $ttl_sale:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
            
             <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Sales Amount</p>
				  <h4 class="text-primary">
                 <?php 
                    $ttl_mrp=$this->conn->runQuery('SUM(order_amount) as total','orders',"tx_user_id='$user_id'")[0]->total;
                   
                   echo $ttl_mrp!='' ? $ttl_mrp:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
             <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Sales in Bv</p>
				  <h4 class="text-primary">
                   <?php 
                    $ttl_mrp11=$this->conn->runQuery('SUM(order_bv) as total','orders',"tx_user_id='$user_id'")[0]->total;
                   
                    echo $ttl_mrp11!='' ? $ttl_mrp11:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
             
             <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Today Sales Amount</p>
				  <h4 class="text-primary">
                   <?php
                    $ttl_bv_v=$this->conn->runQuery('SUM(order_amount) as total','orders',"tx_user_id='$user_id' and DATE(added_on)=DATE('$date')")[0]->total;
                     echo $ttl_bv_v!='' ? $ttl_bv_v:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
            <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Today Sales in Bv</p>
				  <h4 class="text-primary">
                   <?php 
                   $ttl_mrp_yyy=$this->conn->runQuery('SUM(order_bv) as total','orders',"tx_user_id='$user_id' and DATE(added_on)=DATE('$date')")[0]->total;
                   echo $ttl_mrp_yyy!='' ? $ttl_mrp_yyy:0;
                   
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
			 
			 <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Available Amount </p>
				  <h4 class="text-primary">
                   <?php 
                   $ttl_amount=$this->conn->runQuery('SUM(order_amount) as ttl_amt','franchise_orders',"f_code='$user_id'");
                   $ttl_amounts=$this->conn->runQuery('SUM(order_amount) as ttl_amts','orders',"tx_user_id='$user_id'");
                  
                   $today_av_dp=$ttl_amount[0]->ttl_amt-$ttl_amounts[0]->ttl_amts;
                    echo $today_av_dp!='' ? $today_av_dp:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
			 <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Available in Bv</p>
				  <h4 class="text-primary">
                   <?php 
                   $total_bv=$this->conn->runQuery('SUM(order_bv) as ttl_bv','franchise_orders',"f_code='$user_id'");
                   $total_bvs=$this->conn->runQuery('SUM(order_bv) as tttl_bv','orders',"tx_user_id='$user_id'");
                  
                   $ttl_avail_bv= $total_bv[0]->ttl_bv-$total_bvs[0]->tttl_bv;
                   echo $ttl_avail_bv!='' ? $ttl_avail_bv:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
      </div>
      </div><!--End Row-->
 <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Purchase Product</p>
				  <h4 class="text-primary">
                    <?php
                    echo $ttl_purchase=$this->conn->runQuery('SUM(quantity) as total','franchise_order_items',"f_code='$user_id'")[0]->total;?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
			<div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Sales Product</p>
				  <h4 class="text-primary">
                    <?php $ttl_sale=$this->conn->runQuery('SUM(quantity) as total','order_items',"franchise_id='$user_id'")[0]->total;
                          echo $ttl_sale!='' ? $ttl_sale:0;
                        
                    ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
			<div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Product in Stock</p>
				  <h4 class="text-primary">
                    <?php
                   echo $ttl_purchase-$ttl_sale;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
            <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Business Volume</p>
				  <h4 class="text-primary">
                   <?php  $ttl_sale=$this->conn->runQuery('SUM(order_bv) as total','franchise_orders',"f_code='$user_id'")[0]->total;
                   echo $ttl_sale!='' ? $ttl_sale:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
            
             <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Sales Amount</p>
				  <h4 class="text-primary">
                 <?php 
                    $ttl_mrp=$this->conn->runQuery('SUM(order_amount) as total','orders',"tx_user_id='$user_id'")[0]->total;
                   
                   echo $ttl_mrp!='' ? $ttl_mrp:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
             <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Sales in Bv</p>
				  <h4 class="text-primary">
                   <?php 
                    $ttl_mrp11=$this->conn->runQuery('SUM(order_bv) as total','orders',"tx_user_id='$user_id'")[0]->total;
                   
                    echo $ttl_mrp11!='' ? $ttl_mrp11:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
             
             <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Today Sales Amount</p>
				  <h4 class="text-primary">
                   <?php
                    $ttl_bv_v=$this->conn->runQuery('SUM(order_amount) as total','orders',"tx_user_id='$user_id' and DATE(added_on)=DATE('$date')")[0]->total;
                     echo $ttl_bv_v!='' ? $ttl_bv_v:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
            <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Today Sales in Bv</p>
				  <h4 class="text-primary">
                   <?php 
                   $ttl_mrp_yyy=$this->conn->runQuery('SUM(order_bv) as total','orders',"tx_user_id='$user_id' and DATE(added_on)=DATE('$date')")[0]->total;
                   echo $ttl_mrp_yyy!='' ? $ttl_mrp_yyy:0;
                   
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
			 
			 <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Available Amount </p>
				  <h4 class="text-primary">
                   <?php 
                   $ttl_amount=$this->conn->runQuery('SUM(order_amount) as ttl_amt','franchise_orders',"f_code='$user_id'");
                   $ttl_amounts=$this->conn->runQuery('SUM(order_amount) as ttl_amts','orders',"tx_user_id='$user_id'");
                  
                   $today_av_dp=$ttl_amount[0]->ttl_amt-$ttl_amounts[0]->ttl_amts;
                    echo $today_av_dp!='' ? $today_av_dp:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div> 
			 <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Available in Bv</p>
				  <h4 class="text-primary">
                   <?php 
                   $total_bv=$this->conn->runQuery('SUM(order_bv) as ttl_bv','franchise_orders',"f_code='$user_id'");
                   $total_bvs=$this->conn->runQuery('SUM(order_bv) as tttl_bv','orders',"tx_user_id='$user_id'");
                  
                   $ttl_avail_bv= $total_bv[0]->ttl_bv-$total_bvs[0]->tttl_bv;
                   echo $ttl_avail_bv!='' ? $ttl_avail_bv:0;
                   ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
		
           <div class="card">
            <div class="card-header border-0">
             Stock Detail
            <div class="card-action">
              
             </div>
            </div>
            <div class="table-responsive">
             <table class="table align-items-center table-flush">
               <thead>
                <tr>
                 <th>#</th>
                 <th>Quantity</th>
                 <th>Amount</th>
                 <th>Business Volume</th>
                 
                </tr>
               </thead>
               <tbody>
                   <?php
                         $ttl_quantity=$this->conn->runQuery('SUM(quantity) as total,SUM(product_bv) as bv,SUM(sub_total) as sb_ttl','franchise_order_items',"f_code='$user_id'");
                         $qty= $ttl_quantity[0]->total;  $bv= $ttl_quantity[0]->bv;  $amt= $ttl_quantity[0]->sb_ttl;
                         
                         $ttl_quantitys=$this->conn->runQuery('SUM(quantity) as qty,SUM(product_bv) as bvs,SUM(sub_total) as amnt','order_items',"franchise_id='$user_id'");
                         $qtys= $ttl_quantitys[0]->qty;  $bvs= $ttl_quantitys[0]->bvs;  $amts= $ttl_quantitys[0]->amnt;
                         
                         $avalable_quantity=$qty-$qtys;
                         $avalable_bv= $bv-$bvs;
                         $avalable_amnt=$amt-$amts;
                           ?>
                           <tr>
                                   <td>Stock</td>
                                   <td><?=round($qty)?></td>
                                   <td><?=round($amt)?></td>
                                   <td><?=round($bv)?></td>
                               </tr>
                              <tr>
                                   <td>Sale</td>
                                   <td><?=round($qtys)?></td>
                                   <td><?=round($amts)?></td>
                                   <td><?=round($bvs)?></td>
                               </tr>
                              <tr>
                                   <td>Available</td>
                                   <td><?=round($avalable_quantity)?></td>
                                   <td><?=round($avalable_amnt)?></td>
                                   <td><?=round($avalable_bv)?></td>
                               </tr>
                    </tbody>
             </table>
           </div>
           </div>
         </div>
          
      </div>
      </div><!--End Row-->
