 
          <div class="row pt-2 pb-2">
            <div class="col-sm-9">
              <h4 class="page-title">Franchise Stock List</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Stock List</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Stock List</li>
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
           
             <form action="<?= $admin_path.'franchise/stock-list';?>" method="get">
             <div class="form-inline">
                 <div class="form-group m-1">
                      <div class="form-group ">                      
                    <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />                      
                 </div>                      
                    <input type="text" Placeholder="Enter Name" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />                       
                 </div>
                
                <div class="form-group ">                      
                    <input type="text" Placeholder="Enter Franchise name" name="franchise_name" class="form-control" value='<?= isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!='' ? $_REQUEST['franchise_name']:'';?>' />                      
                 </div>
               
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
                 <a href="<?= $admin_path.'franchise/stock-list';?>" class="btn btn-sm">Reset</a>
            </div>
        </form>
            <?php
                /* $ttl_pages=ceil($total_rows/$limit);
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
                 }*/
                ?>
               
             <?php
             
             
       $total_amts=$this->conn->runQuery('SUM(order_amount) as ttl,','franchise_orders','1=1')[0]->ttl;
       $total_bvs=$this->conn->runQuery('SUM(order_bv) as ttl','franchise_orders','1=1')[0]->ttl;
    ?>
 <div align="right">
    <div class="table table-responsive"> 
        <table>
            <tr>
              
              <th>Total Stock Bv(<?=round($total_bvs)?>)</th>
              <th>Total Stock Amount(<?=round($total_amts)?>)</th>
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
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>Franchise Name</th>
                      <th>Mobile Number</th>
                      <th>Stock bv</th>
                      <th>Stock Amount</th>
                     
                     
                    </tr>
                    <?php  
                    //print_r($table_data);
                      if(!empty($table_data)){
                          $sr=0;
                        foreach($table_data as $t_data){
                         $fcode=$t_data['u_code'];
                          
                         $f_detail=$this->conn->runQuery('*','franchise_users',"id='$fcode'");
                         $total_amts=$this->conn->runQuery('SUM(order_amount) as ttl,','franchise_orders',"f_code='$fcode'")[0]->ttl;
                         $total_bvs=$this->conn->runQuery('SUM(order_bv) as ttl','franchise_orders',"f_code='$fcode'")[0]->ttl;
                       
                          //$f_details=$this->conn->runQuery('*','products',"id='$product_id'");
                          
                         
                          ?>
                            <tr>
                              <td><?=$sr+1;?></td>
                              <td><?= $f_detail[0]->username;?></td>
                              <td><?= $f_detail[0]->name;?></td>
                              <td><?= $f_detail[0]->franchise_name;?></td>
                              <td><?= $f_detail[0]->mobile;?></td>
                              <td><?= round($total_bvs);?></td>
                              <td><?= round($total_amts);?></td>
                              
                              
                            </tr>
                          <?php
                          $sr++;
                        }
                      }
                    ?>           
                  </table>
                
                </div>
              </div>
           <!-- <?php  echo $this->pagination->create_links();?>   -->   
            </div><!--End Row-->

