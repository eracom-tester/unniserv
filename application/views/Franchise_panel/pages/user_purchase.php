
          <div class="row pt-2 pb-2">
            <div class="col-sm-9">
              <h4 class="page-title">User  purchase</h4>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Purchase</li>
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
             <form action="<?= $franchise_path.'products/purchase';?>" method="post">
             <div class="form-inline">
                 <div class="form-group"> 
                 <input type="text" Placeholder="Enter Username" name="username" class="form-control" value='<?= isset($_REQUEST['username']) && $_REQUEST['username']!='' ? $_REQUEST['username']:'';?>' />            
                  
                 </div> 
                  <div class="form-group"> 
                    <input type="text" Placeholder="Enter Name" name="name" class="form-control" value='<?= isset($_REQUEST['name']) && $_REQUEST['name']!='' ? $_REQUEST['name']:'';?>' />            
                                          
                 </div>
                 <!--<div class="form-group">
                     <input type="text" Placeholder="Enter Franchise username" name="franchise_username" class="form-control" value='<?= isset($_REQUEST['franchise_username']) && $_REQUEST['franchise_username']!='' ? $_REQUEST['franchise_username']:'';?>' />                                   
                   
                 </div>
                 <div class="form-group">
                     <input type="text" Placeholder="Enter Franchise name" name="franchise_name" class="form-control" value='<?= isset($_REQUEST['franchise_name']) && $_REQUEST['franchise_name']!='' ? $_REQUEST['franchise_name']:'';?>' />                                   
                   
                 </div>-->
               
               
               
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
            </div>
        </form>
        
            <!-- <form action="" method="post">
             <div class="form-inline" >
                <div class="form-group" style="padding: 2px;">
                
                   <input type="text" Placeholder="Search" name="<?= $search_string;?>[name]" class="form-control" value='<?= (array_key_exists("name", $likecondition) ? $likecondition['name']:'');?>'> 
                </div>
                <div class="form-group" style="padding: 2px;">
                  <input type="submit" name="submit" class="btn" value="search"> 
                </div>
             </div>
              
              
            </form>-->
           
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
                               <td><?= $t_data['order_amount'];?></td>
                             
                               <td><?= $t_data['order_bv'];?></td>
                               <td><?= $t_data['added_on'];?></td>
                               <td><a href="<?= $franchise_path.'/products/user-sale?order_id='.$t_data['id'];?>" class="btn btn-success btn-sm" >View</a>
                               <a href="<?= $franchise_path.'/products/bill?order_id='.$t_data['id'];?>" class="btn btn-success btn-sm" >Bill</a>
                               </td> 
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

