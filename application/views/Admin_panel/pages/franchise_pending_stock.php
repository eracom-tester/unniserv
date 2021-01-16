
<div class="row pt-2 pb-2">
<div class="col-sm-9">
  <h4 class="page-title">Franchise Pending Stock</h4>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Franchise</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pending Stock</li>
  </ol>
</div>
</div>
    <!-- End Breadcrumb-->

<!--End Row-->
            <?php 
                    $success['param']='alert_success';
                    $success['alert_class']='alert-success';
                    $success['type']='success';
                      $this->show->show_alert($success);
                      ?>
                        <?php 
                    $erroralert['param']='alert_error';
                    $erroralert['alert_class']='alert-danger';
                    $erroralert['type']='error';
                      $this->show->show_alert($erroralert);
                      ?>
            <!--End Row-->
            <?php
             $likecondition=($this->session->userdata($search_string) ? $this->session->userdata($search_string):array());
             ?>
             <form action="<?= $admin_path.'franchise/pending-stock';?>" method="get">
             <div class="form-inline">
                 
                
                 <div class="form-group"> 
                 <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />            
                  
                 </div> 
                  <div class="form-group"> 
                    <input type="text" Placeholder="Enter Name" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />            
                                          
                 </div>
                 <div class="form-group">
                     <input type="text" Placeholder="Enter Member name" name="franchise_name" class="form-control" value='<?= isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!='' ? $_REQUEST['franchise_name']:'';?>' />                                   
                   
                 </div>
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
                 <a href="<?= $admin_path.'franchise/pending-stock';?>" class="btn btn-sm">Reset</a>
            </div>
        </form>
            <?php
                 $ttl_pages=ceil($total_rows/$limit);
                 if($ttl_pages>1){
                     ?>
                      <form action="" method="get">
                        <div class="form-group">
                            
                            Go to Page : 
                            <input type="text" list="pages" name="page" value="<?= (isset($_REQUEST['page']) ? $_REQUEST['page']:'');?>" />
                            
                            <datalist id="pages">
                                 <?php
                                     for($pg=1;$pg<=$ttl_pages;$pg++){
                                         ?><option value="<?= $pg;?>" ><?= $pg;?></option><?php
                                     }
                                 ?>
                            </datalist>
                            <input type="submit" name="submit" class=" " value="Go" />
                        </div>
                    </form>
                     <?php
                 }
                ?>
             <?php
                         $ttl_qty=$this->conn->runQuery('SUM(quantity) as ttl_qty','franchise_order_items',"1=1")[0]->ttl_qty;
                         $ttl_amount=$this->conn->runQuery('SUM(sub_total) as ttl_amt','franchise_order_items',"1=1")[0]->ttl_amt;
                         $total_bv=$this->conn->runQuery('SUM(product_bv) as ttl_bv','franchise_order_items',"1=1")[0]->ttl_bv;
                          
                          
                             $ttl_qtys=$this->conn->runQuery('SUM(quantity) as ttl_qtys','order_items',"1=1")[0]->ttl_qtys;
                             $ttl_amounts=$this->conn->runQuery('SUM(sub_total) as ttl_amts','order_items',"1=1")[0]->ttl_amts;
                             $total_bvs=$this->conn->runQuery('SUM(product_bv) as tttl_bv','order_items',"1=1")[0]->tttl_bv;
                          
                          $qty_pd= $ttl_qty!='' ? ($ttl_qtys!='' ? $ttl_qty-$ttl_qtys:$ttl_qty):0;
                          $amnt_pd= $ttl_amount!='' ? ($ttl_amounts!='' ? $ttl_amount-$ttl_amounts:$ttl_amount):0;
                          $bv_pd= $total_bv!='' ? ($total_bvs!='' ? $total_bv-$total_bvs:$total_bv):0;       
?>
 <div align="right">
    <div class="table table-responsive"> 
        <table>
            <tr>
              <th>Total Amount Pending(<?=round($amnt_pd)?>)</th>
              <th>Total Bv Pending(<?=round($bv_pd)?>)</th>
          
           </tr>
        </table>
    </div>
</div>    
            
            <div class="row">
              <div class="col-md-12 bg-light">
                <div class="table-responsive">
                  <table class="table table-condensed ">
                    <tr>
                      <th>Sr no.</th>
                      <th>Franchise Username</th>
                      <th>Franchise Name</th>
                      <th>Member Name</th>
                      <th>Mobile Number</th>
                      <th>Total Qty</th>
                       
                      <th>Amount Pending</th>
                      <th>BV Pending</th>
                       
                      <th>Action</th>
                    </tr>
                    <?php 
                     
                      if(!empty($table_data)){  
                                            
                        foreach($table_data as $t_data){
                         $id=$t_data['id'];
                         
                        
                         $ttl_qty=$this->conn->runQuery('SUM(quantity) as ttl_qty','franchise_order_items',"f_code='$id'")[0]->ttl_qty;
                         $ttl_amount=$this->conn->runQuery('SUM(sub_total) as ttl_amt','franchise_order_items',"f_code='$id'")[0]->ttl_amt;
                         $total_bv=$this->conn->runQuery('SUM(product_bv) as ttl_bv','franchise_order_items',"f_code='$id'")[0]->ttl_bv;
                          
                          
                         $ttl_qtys=$this->conn->runQuery('SUM(quantity) as ttl_qtys','order_items',"franchise_id='$id'")[0]->ttl_qtys;
                         $ttl_amounts=$this->conn->runQuery('SUM(sub_total) as ttl_amts','order_items',"franchise_id='$id'")[0]->ttl_amts;
                         $total_bvs=$this->conn->runQuery('SUM(product_bv) as tttl_bv','order_items',"franchise_id='$id'")[0]->tttl_bv;
                          
                          $qty_pd= $ttl_qty!='' ? ($ttl_qtys!='' ? $ttl_qty-$ttl_qtys:$ttl_qty):0;
                          $amnt_pd= $ttl_amount!='' ? ($ttl_amounts!='' ? $ttl_amount-$ttl_amounts: round($ttl_amount)):0;
                          $bv_pd= $total_bv!='' ? ($total_bvs!='' ? $total_bv-$total_bvs:round($total_bv)):0;
                     
                         ?>
                            <tr>
                              <td><?= $t_data['id'];?></td>
                              <td><?= $t_data['username'];?></td>
                              <td><?= $t_data['name'];?></td>
                              <td><?= $t_data['franchise_name'];?></td>
                              <td><?= $t_data['mobile'];?></td>
                              <td><?= $qty_pd;?></td>
                              <td><?= $amnt_pd;?></td>
                              <td><?= $bv_pd;?></td>
                              
                              <td><a href="<?= $admin_path.'franchise/view?order_id='.$t_data['id'];?>" class="btn btn-success btn-sm" >View</a></td> 
                            </tr>
                          <?php
                        }
                      }
                    ?>           
                  </table>
                
                </div>
              </div>
            <?php  echo $this->pagination->create_links();?>      
            </div><!--End Row-->

