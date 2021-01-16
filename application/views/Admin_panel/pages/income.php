<div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"> Income</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $admin_path.'dashboard';?>">home</a></li>            
            <li class="breadcrumb-item"><a href="">Income</a></li>            
           
         </ol>
	   </div>
	   <div class="col-sm-3">
       
     </div>
</div>
<h6 class="text-uppercase"> Income</h6>
<hr>

<center>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <form action="<?= $admin_path.'income';?>" method="post">
             <div class="form-inline">
                 <!--<div class="form-group">                      
                    <input type="text" id="default-datepicker" Placeholder="Enter Date" name="date" class="form-control" value='<?= (isset($_POST['date']) ? $_POST['date']:''); ?>'>                       
                 </div>-->
                 <div class="form-group">                      
                   <select name="select_month" class="form-control" id="">
                    <option value="">Select Month</option>
                    <?php
                        $current_month=date('m');
                        for($m=$current_month; $m>$current_month-12; --$m){
                            echo '<option value="'.date('Y-m-d', mktime(0, 0, 0, $m, 1)).'" '. (isset($_POST['select_month']) && $_POST['select_month']==date('Y-m-d', mktime(0, 0, 0, $m, 1)) ? 'selected':'').' >'.date('F-Y', mktime(0, 0, 0, $m, 1)).'</option>';                           

                        }   
                        ?>
                   </select>                      
                 </div>
                <!-- <div id="dateragne-picker">
                    <div class="input-daterange input-group">
                    <input type="text" class="form-control"  Placeholder="From"  name="start_date" value="<?= (isset($_POST['start_date']) ? $_POST['start_date']:''); ?>"/>
                    <div class="input-group-prepend">
                    <span class="input-group-text">to</span>
                    </div>
                    <input type="text" class="form-control"  Placeholder="End date"  name="end_date" value="<?= (isset($_POST['end_date']) ? $_POST['end_date']:''); ?>" />
                    </div>
               </div>    --> &nbsp;  
                 
                 <input type="submit" name="submit" class="btn btn-sm" value="filter" />
            </div>
        </form>
<br>
        <div class="panel panel-warning ti-panel ">
              <div class="panel-heading">
                    <h4 class="panel-title">Income Section</h4>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                        
                        <thead>
                                <tr>
                                
                                
                                <?php
                                $usrid=$this->session->userdata('user_id');
                                $reg_plan=$this->session->userdata('reg_plan');
                                $all_incomes=$this->conn->runQuery("*",'wallet_types',"wallet_type='income' and $reg_plan=1");
                                if($all_incomes){
                                    foreach($all_incomes as $income){                           
                                        ?>
                                        <th><?= $income->name;?></th>                            
                                        <?php
                                    }
                                }
                                ?>
                            
                                </tr>
                            </thead> 
                                <tbody>
                                    <tr>
                                <?php
                            $ttl_income=array();
                                if($all_incomes){
                                    foreach($all_incomes as $income){
                                        $slug= $income->slug;
                                        $total = $this->conn->runQuery('SUM(amount) as amnt','transaction',"source='$slug' and $query_where")[0]->amnt;
                                        
                                    $ttl_income[]=$total ? round($total):0;
                                        ?>
                                            <td><a href="<?= $admin_path."incomes?income=$slug";?>"><?= round(($total ? $total:0),2);?></a></td>
                                        <?php
                                    }
                                }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              </div>
        </div>
        
     <br>   
        <p>
            <strong>Total Income :</strong><?= array_sum($ttl_income);?>
                            </p>
        
    </div>
</div>
</center>

