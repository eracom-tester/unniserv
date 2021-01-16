  <?php
  $currecny=$this->config->item('currency');
  
  $currenct_payout_id=$this->wallet->currenct_payout_id();
  $last_payout_id=$currenct_payout_id-1;
  
  $current_payout_qr=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='income' and payout_id='$currenct_payout_id' and status='1'")[0]->amnt;
  $current_payout=$current_payout_qr!='' ? $current_payout_qr:0;
  
  $last_payout_paid_qr=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='payout' and payout_id='$last_payout_id' and status='1'")[0]->amnt;
  $last_payout_paid=$last_payout_paid_qr!='' ? $last_payout_paid_qr:0;
  
  $last_payout_pending_qr=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='payout' and payout_id='$last_payout_id' and status='0'")[0]->amnt;
  $last_payout_pending=$last_payout_pending_qr!='' ? $last_payout_pending_qr:0;
  
  $last_payout_rejected_qr=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='payout' and payout_id='$last_payout_id' and status='2'")[0]->amnt;
  $last_payout_rejected=$last_payout_rejected_qr!='' ? $last_payout_rejected_qr:0;
  
  $total_payout_paid_qr=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='payout' and payout_id<='$currenct_payout_id' and status='1'")[0]->amnt;
  $total_payout_paid=$total_payout_paid_qr!='' ? $total_payout_paid_qr:0;
  
  $total_payout_pending_qr=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='payout' and payout_id<='$currenct_payout_id' and status='0'")[0]->amnt;
  $total_payout_pending=$total_payout_pending_qr!='' ? $total_payout_pending_qr:0;
  
  
  
  
  ?>
  <div class="row">
        <div class="col-lg-4">
		  <div class="card bg-danger">
		   <div class="card-body text-center">
		     <i class="fa fa fa-money fa-2x text-white"></i>
			 <h5 class="mt-2 text-white">Expected Payout</h5>
			 <hr class="border-light-2">
			 <div class="row">
			  <div class="col-12  border-light-2">
			    <p class="mb-0 text-white">Total</p>
				<div class="font-weight-bold text-white"><?= $currecny;?> <?= $current_payout;?></div>
			  </div>
			   
			 </div>
		   </div>
		  </div>
        </div>
		<div class="col-lg-4">
		  <div class="card bg-info">
		   <div class="card-body text-center">
		     <i class="fa fa-money fa-2x text-white"></i>
			 <h5 class="mt-2 text-white">Last Payout</h5>
			 <hr class="border-light-2">
			 <div class="row">
			  <div class="col-6 border-right border-light-2">
			      <a href="<?= $admin_path.'transactions/payouts?payout_id='.$last_payout_id;?>">
        			    <p class="mb-0 text-white">Paid</p>
        				<div class="font-weight-bold text-white"><?= $currecny;?> <?= $last_payout_paid_qr;?></div>
				    </a>
			  </div>
			  <div class="col-6 ">
			      <a href="<?= $admin_path.'transactions/pending_payouts?payout_id='.$last_payout_id;?>">
    			    <p class="mb-0 text-white">Pending</p>
    				<div class="font-weight-bold text-white"><?= $currecny;?> <?= $last_payout_pending;?></div>
				</a>
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
		  <div class="card bg-success">
		   <div class="card-body text-center">
		     <i class="fa fa-money fa-2x text-white"></i>
			 <h5 class="mt-2 text-white">Total Payout</h5>
			 <hr class="border-light-2">
			 <div class="row">
			  <div class="col-6 border-right border-light-2">
			      <a href="<?= $admin_path.'transactions/payouts';?>">
    			    <p class="mb-0 text-white">Paid</p>
    				<div class="font-weight-bold text-white"><?= $currecny;?> <?= $total_payout_paid;?></div>
    				</a>
			  </div>
			  <div class="col-6">
			      <a href="<?= $admin_path.'transactions/pending_payouts';?>">
    			    <p class="mb-0 text-white">Pending</p>
    				<div class="font-weight-bold text-white"><?= $currecny;?> <?= $total_payout_pending;?></div>
    				</a>
			  </div>
			 </div>
			 
		   </div>
		  </div>
        </div>
    </div>
          