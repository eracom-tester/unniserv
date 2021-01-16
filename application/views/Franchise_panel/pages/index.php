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
            
          </ul> <br>
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
                 <th>Amount <?= $this->conn->company_info('currency');?></th>
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
           
           <div class="col-12 col-lg-6 col-xl-6">
            <?php
                $source="repurchase";
               
                $ttl_payout=$this->conn->runQuery('SUM(amount) as amnt','transaction_franchise',"u_code='$user_id' and tx_type='income'");
                $ttl_gen_payout=$this->conn->runQuery('SUM(amount) as amnt','transaction_franchise',"u_code='$user_id' and tx_type='payout'");
            ?>   
            <ul class="list-group">
                <li class="list-group-item text-muted">Income Detail</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Total Business Volumn:</strong></span><?=round($bv)?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Total Payout:</strong></span><?=round($ttl_payout[0]->amnt)?></li>
                
                <li class="list-group-item text-right"><span class="pull-left"><strong>Generated Payout:</strong></span>  <?= $ttl_gen_payout[0]->amnt!='' ? $ttl_gen_payout[0]->amnt :0 ;?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Expected Payout:</strong></span> <?= $ttl_payout[0]->amnt-$ttl_gen_payout[0]->amnt;?></li>
            </ul> 
          <br>
                  </div>
         </div>
          
          </div> 
          </div><!--End row-->
		  