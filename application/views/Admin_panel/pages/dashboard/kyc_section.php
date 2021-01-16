<?php
$total_kyc=$this->conn->runQuery('COUNT(*) as cnt','user_accounts',"1=1")[0]->cnt;

$approved_kyc=$this->conn->runQuery('COUNT(*) as cnt','user_accounts',"pan_kyc_status='approved' OR adhaar_kyc_status='approved' OR bank_kyc_status='approved'")[0]->cnt;
$rejected_kyc=$this->conn->runQuery('COUNT(*) as cnt','user_accounts',"pan_kyc_status='rejected' OR adhaar_kyc_status='rejected' OR bank_kyc_status='rejected'")[0]->cnt;
$pending_kyc=$this->conn->runQuery('COUNT(*) as cnt','user_accounts',"pan_kyc_status='submitted' OR adhaar_kyc_status='submitted' OR bank_kyc_status='submitted'")[0]->cnt;

?>
<div class="card">
        <div class="card-content">
          <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="card-body">
                 <div class="media align-items-center">
				  <div class="media-body">
					<p class="text-primary">Total Kyc</p>
					<h4 class="line-height-5"><?= $total_kyc!='' ? $total_kyc:0;?></h4>
				  </div>
				  <div class="w-circle-icon rounded border border-primary shadow-primary">
					<i class="fa fa-file text-primary"></i></div>
				</div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="card-body">
                 <div class="media align-items-center">
				  <div class="media-body">
					<p class="text-success">Approved</p>
					<h4 class="line-height-5"><?= $approved_kyc!='' ? $approved_kyc:0;?></h4>
				  </div>
				  <div class="w-circle-icon rounded border border-success shadow-success">
					<a href="<?= $admin_path.'kyc/approved';?>"><i class="fa fa-check text-success"></i></a></div>
				</div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="card-body">
                 <div class="media align-items-center">
				  <div class="media-body">
					<p class="text-secondary">Rejected</p>
					<h4 class="line-height-5"><?= $rejected_kyc!='' ? $rejected_kyc:0;?></h4>
				  </div>
				  <div class="w-circle-icon rounded border border-secondary shadow-secondary">
					<a href="<?= $admin_path.'kyc/cancelled';?>"><i class="fa fa-times text-secondary"></i></a></div>
				</div>
              </div>
            </div>
             <div class="col-12 col-lg-6 col-xl-3">
              <div class="card-body">
                 <div class="media align-items-center">
				  <div class="media-body">
					<p class="text-info">Pending</p>
					<h4 class="line-height-5"><?= $pending_kyc!='' ? $pending_kyc:0;?></h4>
				  </div>
				  <div class="w-circle-icon rounded border border-info shadow-info">
					<a href="<?= $admin_path.'kyc/pending';?>"><i class="fa fa-question text-info"></i></a></div>
				</div>
              </div>
            </div>
          </div><!--End Row-->
        </div>
      </div>