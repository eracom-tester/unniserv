
<?php 
$profile=$this->session->userdata("profile"); 
$user_id=$this->session->userdata("user_id"); 
?>
<div class="row pt-2 pb-2">
        <div class="col-sm-12">
		
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="#">Generation Orders</a></li>            
            <li class="breadcrumb-item active" aria-current="page">Generation Order details</li>
         </ol>
	   </div>
	 
</div>

 
             <div class="card card-body card-bg-1">
<div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                     <form action="<?= $panel_path.'orders/gen_details'?>" method="post">
             <div class="form-inline">
             
                 
                
                 
                  
                   <div id="dateragne-picker">
                    <div class="input-daterange input-group">
                    <input type="date" class="form-control"  Placeholder="From"  name="start_date" value="<?= (isset($_REQUEST['start_date']) ? $_REQUEST['start_date']:''); ?>"/>
                    <div class="input-group-prepend">
                    <span class="input-group-text">to</span>
                    </div>
                    <input type="date" class="form-control"  Placeholder="End date"  name="end_date" value="<?= (isset($_REQUEST['end_date']) ? $_REQUEST['end_date']:''); ?>" />
                    </div>
               </div>  
                 
                 <input type="submit" name="submit" class="btn btn-primary btn-sm m-1" value="filter" />
                 <a href="<?= $panel_path.'orders/gen_details'?>"  class="btn btn-primary btn-sm">Reset</a>
                 
            </div>
        </form>
                    
<div class="table-responsive">
    <table class="<?= $this->conn->setting('table_classes'); ?>">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Order ID</th>
                <th>Order amount</th>              
                <th>Order BV</th>                
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Action</th>
                 
            </tr>
            <?php
            
        // print_r($table_data);
            
            if($table_data){
                $sno=0;
                foreach($table_data as $t_data){
                   
                    $sno++;
                    ?>
                    <tr>
                        <td><?= $sno;?></td>
                        <td>#<?= $t_data['id'];?></td>
                        <td><?= $t_data['order_amount'];?></td>
                        <td><?= $t_data['order_bv'];?></td>
                        <td><?= $t_data['added_on'];?></td>
                        <td>Pending</td>
                        <td><a href="<?= $panel_path.'orders/details?id='.$t_data['id'];?>">View Details</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </thead>
        
    </table>
</div>


    
    </div>
</div>
</div>
