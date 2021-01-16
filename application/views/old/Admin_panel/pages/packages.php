<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Packages</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="<?= $admin_path.'packages';?>">Packages</a></li>            
            
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Packages</h6>
<hr>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                
                <th>ID</th>
                <th>Action</th>
                <th>Name</th>
                <th>Rate (<?= $this->conn->company_info('currency');?>)</th>
                <th>BV</th>
                <th>PV</th>
               
                <th>Active Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $package_info=$this->conn->runQuery('*','pin_details',"status='1'");
            if($package_info){            
            foreach($package_info as $t_data){
            ?>
            <tr>
                <td>#<?= $t_data->id;?></td>
                <td><a class="btn btn-warning btn-sm" href="<?= $admin_path.'packages/edit?id='.$t_data->id;?>"><i class="fa fa-edit    "></i> </a></td>
                <td><?= $t_data->pin_type;?></td>
                <td><?= $t_data->pin_rate;?>  </td>
                <td><?= $t_data->business_volumn;?></td>
                <td><?= $t_data->pin_value;?></td>
                           
                <td><?php
                if($t_data->status==1){
                    echo "Active<br>";
                   
                }else{
                    echo "Inactive";
                }
                ?></td>               
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
