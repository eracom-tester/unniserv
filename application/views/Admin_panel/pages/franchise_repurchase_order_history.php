
          <div class="row pt-2 pb-2">
            <div class="col-sm-9">
              <h4 class="page-title">Franchise repurchase order history</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="#">repurchase order</a></li>
                <li class="breadcrumb-item active" aria-current="page"> history</li>
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
            // $likecondition=($this->session->userdata($search_string) ? $this->session->userdata($search_string):array());
             ?>
              <form action="<?= $admin_path.'franchise/repurchase-order-history';?>" method="get">
             <div class="form-inline">
                 <div class="form-group"> 
                 <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />            
                  
                 </div> 
                  <div class="form-group"> 
                    <input type="text" Placeholder="Enter Name" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />            
                                          
                 </div>
              
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
                 <a href="<?=$admin_path.'franchise/repurchase-order-history';?>" class="btn btn-sm">Reset</a>
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
               
                <?php
                    $ttl=$this->conn->runQuery('sum(order_amount) as total,sum(order_bv) as bv','orders',"tx_type='repurchase'");
                    $ttl_amnt=$ttl[0]->total;
                    $ttl_bv=$ttl[0]->bv;
           ?>
         <div align="right">
            <div class="table table-responsive"> 
                <table>
                    <tr>
                      <th>Total Amount(<?=round($ttl_amnt)?>)</th>
                      <th>Total Bv(<?=round($ttl_bv)?>)</th>
                  
                   </tr>
                </table>
            </div>
        </div>    
            
            <div class="row">
              <div class="col-md-12 bg-light">
                <div class="table-responsive">
                   <table class="table table-condensed ">
                    <tr>
                      <th>Sr No.</th>
                      <th>Username</th>
                      <th>Full name</th>
                      <th>Total Amount</th>
                      <th>Total bv</th>
                      <th>Date & time</th>
                      <th>Action</th>
                    </tr>
                    <?php  
               
                      if(!empty($table_data)){             
                        foreach($table_data as $t_data){
                        $u_code=$t_data['u_code'];
                        $user_detail=$this->conn->runQuery('*','users',"id='$u_code'");
                        
                          ?>
                            <tr>
                              <td><?= $t_data['id'];?></td>
                               <td><?= $user_detail[0]->username;?></td>
                               <td><?= $user_detail[0]->name;?></td>
                               <td><?= round($t_data['order_amount']);?></td>
                             
                               <td><?= round($t_data['order_bv']);?></td>
                               <td><?= $t_data['added_on'];?></td>
                               <td><a href="<?= $admin_path.'/franchise/user-sale?order_id='.$t_data['id'];?>" class="btn btn-success btn-sm" >View</a></td> 
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

