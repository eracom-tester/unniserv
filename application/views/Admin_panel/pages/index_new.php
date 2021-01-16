<?php
$date=date('Y-m-d H:i:s');
$currency=$this->conn->company_info('currency');
$admn_path=$this->conn->company_info('admin_directory');
if(isset($_REQUEST['shw']) && $_REQUEST['shw']=='all'){
    
}

$data=$this->conn->setting('reg_type');
$total_investment=$this->conn->runQuery('SUM(order_amount) as orders','orders',"1=1")[0]->orders;
$total_orders=$this->conn->runQuery('count(id) as orders','orders',"1=1")[0]->orders;
$total_income=$this->conn->runQuery('SUM(amount) as amnt','transaction',"tx_type='income'")[0]->amnt;
$total_users=$this->conn->runQuery('count(id) as ttl','users',"1=1")[0]->ttl;
$total_actives=$this->conn->runQuery('count(id) as ttl','users',"active_status=1")[0]->ttl;
$list_new_users=$this->conn->runQuery('*','users',"1='1' order by id desc limit 6");

?>
      <!--Start Dashboard Content-->
	 
      <div class="row mt-3">
         
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-blooker">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white">Total Users</p>
                <h4 class="text-white line-height-5"><?= $total_users;?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-users text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-ohhappiness">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white">Active</p>
                <h4 class="text-white line-height-5"><?= $total_actives;?></h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-pie-chart text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-bloody">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white">
                <?php if ($data=='product_base') {
                         echo "Total Orders";
                     
                     
                    } elseif($data=='single_leg') {
                    
                     echo "Total Investment";
                    } else {
                     echo "Total Investment";
                    }
             
                 
                ?>
                </p>
                <h4 class="text-white line-height-5"> <?php
                    if ($data=='product_base') {
                     echo  $total_orders;
                 
                 
                } elseif($data=='single_leg') {
                
                 echo $total_investment;
                } else {
                echo $total_investment;
                }
               ?>
            </h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-cart-plus text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-3">
          <div class="card gradient-scooter">
            <div class="card-body">
              <div class="media align-items-center">
              <div class="media-body">
                <p class="text-white">Total Income  </p>
               <h4 class="text-white line-height-5"><?php // $currency;?> 
               <?= $total_income;?> </h4>
              </div>
              <div class="w-circle-icon rounded-circle border border-white">
                <i class="fa fa-money text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
      
      <!---- withdrawal section---->
     <?php
     $dta['admin_path']=$admin_path;
        if ($data=='product_base') {
                     if($this->conn->setting('earning_type')=='payout'){
            
                    $this->load->view($admn_path.'/pages/dashboard/payout',$dta);
                }   
                if($this->conn->setting('earning_type')=='withdrawal'){
                    
                    $this->load->view($admn_path.'/pages/dashboard/withdrawal',$dta);
                }   
                 
                 
                } elseif($data=='single_leg') {
                
                  if($this->conn->setting('earning_type')=='payout'){
            
                  $this->load->view($admn_path.'/pages/dashboard/payout',$dta);
               }   
                    if($this->conn->setting('earning_type')=='withdrawal'){
                        
                        $this->load->view($admn_path.'/pages/dashboard/withdrawal',$dta);
                    }   
                } else {
                  
                  if($this->conn->setting('earning_type')=='payout'){
            
                  $this->load->view($admn_path.'/pages/dashboard/payout',$dta);
               }   
                    if($this->conn->setting('earning_type')=='withdrawal'){
                        
                        $this->load->view($admn_path.'/pages/dashboard/withdrawal',$dta);
                    }  
                     
                }
        
             ?>  
         <?php
       
        if ($data=='product_base') {
           $this->load->view($admn_path.'/pages/dashboard/kyc_section',$dta);
         
         
        } elseif($data=='single_leg') {
          
        } else {
        
        }
         
     ?>  
     <div class="row">
        <div class="col-12 col-lg-6">
            <?php
            if ($data=='product_base') {
           $this->load->view($admn_path.'/pages/dashboard/bv');
         
         
            } elseif($data=='single_leg') {
               $this->load->view($admn_path.'/pages/dashboard/invest');
            } else {
             $this->load->view($admn_path.'/pages/dashboard/invest');
            }
            ?>
        </div>
        <div class="col-12 col-lg-6">
        <?php
             if ($data=='product_base') {
             $this->load->view($admn_path.'/pages/dashboard/income');
                 
             } elseif($data=='single_leg') {
              $this->load->view($admn_path.'/pages/dashboard/income');
            } else {
               $this->load->view($admn_path.'/pages/dashboard/income');
            }
           ?>
             
        </div>
      </div><!--End Row-->
	 <div class="row">
         <div class="col-12 col-lg-12 col-xl-12">
           <?php
            if ($data=='product_base') {
           $this->load->view($admn_path.'/pages/dashboard/epin_section');
         
         
        } elseif($data=='single_leg') {
          
        } else {
        
        }
            
            ?>
         </div>
          
      </div><!--End Row-->	  
	<div class="row">
        <div class="col-lg-12">
         <?php
            
         if ($data=='product_base') {
          $this->load->view($admn_path.'/pages/dashboard/orders');
         
         
        } elseif($data=='single_leg') {
          
        } else {
        
        }
               
            
            ?>
        </div>
      </div><!--End Row-->	  
      

      <div class="row">
         <div class="col-12 col-lg-12 col-xl-12">
           <div class="card">
             <div class="card-header border-0">
              New Customer List
            <div class="card-action">
              <a href="<?= $admin_path.'users'?>" class="btn btn-sm btn-outline-success btn-round btn-block">All</a>
             </div>
            </div>
            <div class="table-responsive">
             <table class="table align-items-center table-flush">
               <thead>
                <tr>
                 <th>Sr no.</th>
                 <th>Name</th>
                 <th>Username</th>
                 <th>Email</th>
                 <th>Join date</th>
                </tr>
               </thead>
               <tbody>
                   <?php
                   $logo=$this->conn->company_info('logo');
                   if($list_new_users){
                       foreach($list_new_users as $new_user){
						  // print_r($new_user);
                           $img= $new_user->img? $new_user->img:$logo;
                           ?>
                           <tr>
                               <td><img src="<?= $img;?>" class="rounded-circle customer-img" alt="<?= $new_user->name;?>"></td>
                               <td><?= $new_user->name;?></td>
                               <td><?= $new_user->username;?></td>
                               <td><?= $new_user->email;?></td>
                               <td><?= $new_user->added_on;?></td>
                             </tr>
                           <?php
                       }
                   }
                   ?>
                 
                  
               </tbody>
             </table>
           </div>
           </div>
         </div>
          
      </div><!--End Row-->

     

       


      

      <!--End Dashboard Content-->