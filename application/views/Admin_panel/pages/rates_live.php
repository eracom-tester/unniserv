<div class="row pt-2 pb-2">
        <div class="col-sm-12">

		    <h4 class="page-title">  Live Rates</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">   Live Rates</li>
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

    <div class="row">
   
    
    <div class="col-md-8 card bg-light">
          
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>#  </th>
                    <th>Name   </th>
                    <th>Live rate   </th>
                    <th>Unit  </th>
                    <th>Action   </th>
                </tr>
                <?php
                $table_data=$this->conn->runQuery('*','live_rates',"status='1' order by tab_index asc");
                if(!empty($table_data)){
                    foreach($table_data as $t_data){
                        $dis_name=$t_data->full_name;//($t_data->metal_name=='gold' ? 'Gold rate 24kt':);
                        ?>
                        <tr>
                            <td>#<?= $t_data->tab_index;?></td>
                            <td><?= $dis_name;?></td>
                            <td><input type="text" name="" id="rate<?= $t_data->id;?>" class="form-control" value="<?= $t_data->unit_rate;?>" /></td>
                            <td><?= $t_data->unit_symbol;?></td>
                            <td><button id="" class="btn btn-success btn-sm save_rate" data-live_rate_data="<?= $t_data->id;?>" >Save</button></td>
                        </tr>
                        <?php
                    }
                }

                $get_rates=$this->conn->runQuery('*','product_add_features',"slug='diamond_option'");
                if($get_rates){

                    $val_from='diamond';
                    $feature_requirements=$get_rates[0]->feature_requirements;
                    
                    $requirements = $feature_requirements!='' ? json_decode($feature_requirements, true):array();
                    $all_diamond_type=!empty($requirements) && array_key_exists($val_from,$requirements) ? $requirements[$val_from]:array();
                    $all_diamond_type_options=!empty($requirements) && array_key_exists('option',$requirements) ? $requirements['option']:array();


                   /* if(!empty($all_diamond_type)){
                        foreach($all_diamond_type as $d_key=>$diamond_type){
                            ?>
                            <tr>
                                <td>#</td>
                                <td><?= $val_from.' '.$all_diamond_type_options[$d_key];?></td>
                                <td><input type="text" name="" id="diamond<?= $d_key;?>" class="form-control" value="<?= $diamond_type;?>" /></td>
                                <td><?= 'ct';?></td>
                                <td><button id="" class="btn btn-success btn-sm save_diamond_rate" data-diamond_type="<?= $d_key?>" >Save</button></td>
                            </tr>
                            <?php
                        }
                    }*/
                }

                ?>
            </table>
        </div>
        
        </div>
    

     
        
       
    </div><!--End Row-->

