
<?php
$date=date('Y-m-d');
?>

    <br>
  <h4>Dashboard</h4>
  <hr>
    <!-- End Breadcrumb-->
	
         <div class="row">
            <div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Active/Total Users</p>
				  <h4 class="text-primary">
                      <?php
                      echo $this->conn->runQuery('COUNT(id) as active','users',"active_status='1'")[0]->active;
                      echo '/'.$this->conn->runQuery('COUNT(id) as total','users','1=1')[0]->total;
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
				   <p class="mb-0">Active/Total Today</p>
				  <h4 class="text-primary">
                      <?php
                      
                      echo $this->conn->runQuery('COUNT(id) as active','users',"active_status='1' and DATE(active_date)=DATE('$date')")[0]->active;
                      echo '/'.$this->conn->runQuery('COUNT(id) as total','users',"DATE(added_on)=DATE('$date')")[0]->total;
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
				   <p class="mb-0">Total Business</p>
				  <h4 class="text-primary">
                      <?php
                      
                       
                      echo $this->conn->runQuery('SUM(order_bv) as total','orders',"status='1'")[0]->total;
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
				   <p class="mb-0">Total Payouts</p>
				  <h4 class="text-primary">
                      <?php
                      
                       
                      echo $this->conn->runQuery('SUM(amount) as total','transaction',"tx_type='payout'")[0]->total;
                      ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div>
            <!--<div class="col-12 col-lg-6 col-xl-6">
			  <div class="card">
			    <div class="card-body">
				<div class="media align-items-center">
				 <div class="media-body text-left">
				   <p class="mb-0">Total Pins by admin</p>
				  <h4 class="text-primary">
                      <?php
                      echo $this->conn->runQuery('COUNT(id) as total','epins',"created_by='admin'")[0]->total;
                     
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
				   <p class="mb-0">Today Pin by admin</p>
				  <h4 class="text-primary">
                      <?php
                      
                      
                      echo $this->conn->runQuery('COUNT(id) as total','epins',"created_by='admin' and DATE(added_on)=DATE('$date')")[0]->total;
                      ?>
                  </h4>
				 </div>
				 <div id="widget-chart-1"></div>
				</div>
				</div>
			  </div>
			</div>-->
			
          </div><!--End row-->
		  