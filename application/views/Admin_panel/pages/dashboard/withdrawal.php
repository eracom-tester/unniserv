  <?php
  $currecny=$this->config->item('currency');
  
   
  
  $approved_wd=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='withdrawal' and status='1'")[0]->amnt;
  $approved_amnt=$approved_wd!='' ? $approved_wd:0;
  $pending_wd=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='withdrawal' and status='0'")[0]->amnt;
  $pending_amnt=$pending_wd!='' ? $pending_wd:0;
  $rejected_wd=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='withdrawal' and status='2'")[0]->amnt;
  $rejected_amnt=$rejected_wd!='' ? $rejected_wd:0;
  
   
  
  
  
  
  ?>
  <div class="row">
        <div class="col-lg-4">
		  <div class="card bg-success">
		   <div class="card-body text-center">
		     <i class="fa fa fa-money fa-2x text-white"></i>
			 <h5 class="mt-2 text-white">Withdrawal</h5>
			 <hr class="border-light-2">
			 <div class="row">
			  <div class="col-12  border-light-2">
			    <p class="mb-0 text-white">Approved</p>
				<div class="font-weight-bold text-white"><?= $currecny;?> <?= $approved_amnt;?></div>
			  </div>
			   
			 </div>
		   </div>
		  </div>
        </div>
		<div class="col-lg-4">
		  <div class="card bg-info">
		   <div class="card-body text-center">
		     <i class="fa fa-money fa-2x text-white"></i>
			 <h5 class="mt-2 text-white">Withdrawal</h5>
			 <hr class="border-light-2">
			 <div class="row">
			 <div class="col-12  border-light-2">
			    <p class="mb-0 text-white">Pending</p>
				<div class="font-weight-bold text-white"><?= $currecny;?> <?= $pending_amnt;?></div>
			  </div>
			 <!-- <div class="col-4">
			    <p class="mb-0 text-white">Rejected</p>
				<div class="font-weight-bold text-white"><?= $currecny;?> <?= $last_payout_rejected;?></div>
			  </div>-->
			 </div>
		   </div>
		  </div>
        </div>
		<div class="col-lg-4">
		  <div class="card bg-danger">
		   <div class="card-body text-center">
		     <i class="fa fa-money fa-2x text-white"></i>
			 <h5 class="mt-2 text-white">Withdrawal</h5>
			 <hr class="border-light-2">
			 <div class="row">
			 <div class="col-12  border-light-2">
			    <p class="mb-0 text-white">Rejected</p>
				<div class="font-weight-bold text-white"><?= $currecny;?> <?= $rejected_amnt;?></div>
			  </div>
			 </div>
			 
		   </div>
		  </div>
        </div>
    </div>
          