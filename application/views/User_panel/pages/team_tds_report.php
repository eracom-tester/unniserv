            
                        <div class="row pt-2 pb-2">
                            <div class="col-sm-12">
                                   
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>            
                                    <li class="breadcrumb-item active" aria-current="page"> TDS Report</li>
                                </ol>
                            </div>
                          
                        </div>
                	<div class="card card-body card-bg-1">       
                        <?php 

                        $success['param']='success';
                        $success['alert_class']='alert-success';
                        $success['type']='success';
                        $this->show->show_alert($success);
                        ?>
                            <?php 
                        $erroralert['param']='error';
                        $erroralert['alert_class']='alert-danger';
                        $erroralert['type']='error';
                        $this->show->show_alert($erroralert);
                    ?>
                        <div class="row">
					<div class="col-md-12">

						<!-- Horizontal form -->
						<div class="panel">
						
                            

						
							
	
		<div class="">
	   <div class="row">
	   <h4 class="mt-0 header-title">TDS Report</h4>
          <div class="table-responsive">
                                <table class="<?= $this->conn->setting('table_classes'); ?>">
                                    <thead>
                                    <tr>
                                        <th>Sr No</th>
                                       
                                        <th>Payout</th>
                                        <th>Tds </th>
                                        <th>Date</th>
										
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $userid=$this->session->userdata('user_id');
                                    $arr = $this->conn->runQuery("*",'transaction',"u_code='$userid' and tx_type='payout'");
                                    if($arr){
                                    $sr=0;    
									foreach($arr as $arr){
									?>
                                    <tr>
                                        <td><?= $sr+1;?></td>
                                        <td><?= $arr->amount;?></td>
                                     <td><?= $arr->amount*5/100;?></td>
                                      
                                       <td><?= $arr->date;?></td>
                                    </tr>
                                    <?php 
									    $sr++;
									} 
                                    } ?>
                                    
                                    </tbody>
                                </table>
								</div>
        
        </div>
        </div>
		 
							</div>
						</div>
					

					</div>

					
				</div>
    