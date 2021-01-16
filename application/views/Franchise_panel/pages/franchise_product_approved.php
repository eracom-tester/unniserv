    
    
    <div class="row pt-2 pb-2">
            <div class="col-sm-9">
              <h4 class="page-title">Franchise Delivery Product</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Franchise</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delivery Product</li>
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
            <form action="<?= $franchise_path.'products/product_approved';?>" method="post">
             <div class="form-inline">
                <div class="form-group"> 
                 <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />            
                  
                 </div> 
                  <div class="form-group"> 
                    <input type="text" Placeholder="Enter Name" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />            
                                          
                 </div>
                
               
               
               
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
            </div>
        </form>
            <br>
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
               
             <br>
            
            <div class="row">
              <div class="col-md-12 bg-light">
                <div class="table-responsive">
                  <table class="table table-condensed ">
                    <tr>
                      <th>Sr No.</th>
                      <th>USERID</th>
                      <th>FULL NAME </th>
                      <th>AMOUNT IN MRP</th>
                      <th>AMOUNT IN DP</th>
                      <th>TOTAL BV</th>
                       <th>REMARK</th>
                      <th>DELIVERY DATE</th>
                      <th>ACTION</th>
                     
                    </tr>
                    <?php  
                    
                      if(!empty($table_data)){  
                         
                        foreach($table_data as $t_data){
                            $fcode=$t_data['u_code'];
                            $f_detail=$this->conn->runQuery('username,name','users',"id='$fcode'");
                         
                        // print_r($f_detal);
                         $sr_no++;
                          ?>
                            <tr>
                              <td><?=$sr_no;?></td>
                              <td><?= $f_detail[0]->username;?></td>
                              <td><?= $f_detail[0]->name;?></td>
                              <td><?= $t_data['mrp'];?></td>
                              <td><?= $t_data['total_amt'];?></td>
                              <td><?= $t_data['total_bv'];?></td>
                              <td><?= $t_data['remark'];?></td>
                              <td><?= $t_data['delivery_date'];?></td>
                              <td><a href="<?= $franchise_path.'products/orders_product?order_id='.$t_data['id'];?>" class="btn btn-success btn-sm" >View</a></td>
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

