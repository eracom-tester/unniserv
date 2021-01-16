            	<div class="nk-content nk-content-fluid">
                	<div class="container-xl wide-lg">
            	    	<div class="nk-content-body">
            		    	<div class="components-preview wide-md mx-auto">
            			
            		      	<br>
                        			   <div class="card card-body  card-bg-1" style="background-color:<?= $this->config->item('user_back_color')?>;">
                                    <form action="" method="get">
                                         <div class="form-inline1">
                                              
                                             <select name="status">
                                                 <option value="all">Select Status</option>
                                                 <option value="0">Pending</option>
                                                 <option value="1">Approved</option>
                                                 <option value="2">Rejected</option>
                                                 
                                             </select>
                                             <select name="limit">
                                                 <option value="20" <?= isset($_REQUEST['limit']) && $_REQUEST['limit']==20 ? 'selected':'';?> >20</option>
                                                 <option value="50" <?= isset($_REQUEST['limit']) && $_REQUEST['limit']==50 ? 'selected':'';?> >50</option>
                                                 <option value="100" <?= isset($_REQUEST['limit']) && $_REQUEST['limit']==100 ? 'selected':'';?> >100</option>
                                                 <option value="200" <?= isset($_REQUEST['limit']) && $_REQUEST['limit']==200 ? 'selected':'';?> >200</option>
                                             </select>
                                            
                                             
                                            <input type="date" class=" "  Placeholder="From"  name="start_date" value="<?= (isset($_REQUEST['start_date']) ? $_REQUEST['start_date']:''); ?>"/>
                                            <input type="date" class=" "  Placeholder="End date"  name="end_date" value="<?= (isset($_REQUEST['end_date']) ? $_REQUEST['end_date']:''); ?>" />
                                                 
                                             
                                             
                                             <input type="submit" name="submit" class=" " value="filter" />
                                             <input type="submit" name="reset" class=" " value="Reset" />
                                             <!--<a href="<?= $base_url;?>" class=" " > Reset </a>-->
                                             <!--<input type="submit" name="export_to_excel" class="btn btn-sm m-1" value="Export to excel" />-->
                                              
                                        </div>
                                    </form>
                                </div>
                        		  
			 
                 
                                <div class="nk-block nk-block-lg">
                                   <div class="nk-block-head nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title"></h4>
                                            <!--<div class="nk-block-des">
                                                <p>Similar to others table, use the modifier classes <code class="code-class">.thead-light</code> or <code class="code-class">.thead-dark</code> to make <code class="code-tag">&lt;thead&gt;</code> appear light or dark.</p>
                                            </div>--->
                                        </div>
                                    </div>
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <div class="table-responsive" >
                                                <table class="<?= $this->conn->setting('table_classes'); ?>">
											<thead>
												<tr>
													<th class="text-left border-right" >S No.</th>
													 
												   
													<th  class="text-right" >Amount (<?= $this->conn->company_info('currency');?>)</th>
													<th  class="text-right" > Method</th>
														<th  class="text-right" > Type</th>
													<th  class="text-right" >UTR Number</th>
													<th  class="text-right" >Payment Slip</th>
													 <th  class="text-left" >Status</th>
													<th  class="text-left" >Reason</th>
													<th  class="text-left" >Date </th>
													 
												</tr>
											</thead>
													 <tbody>
															<?php
														$user=$this->session->userdata('profile');
														if($table_data){
															
															foreach($table_data as $t_data){
																$tx_profile=false;
																$tx_profile=$this->profile->profile_info($t_data['tx_u_code']);
																$sr_no++;
																?>
																<tr>
																	<td class="text-left border-right"><?= $sr_no;?></td>
																	 
																	 
																							 
																	<td class="text-right"><?= $t_data['amount'];?></td> 
																	<td class="text-right"><?= $t_data['cripto_type'];?></td>                              
																	<td class="text-right"><?= $t_data['payment_type'];?></td>                              
																	<td class="text-right"><?= $t_data['cripto_address'];?></td>
																	<td class="text-right"><a href="<?= $t_data['payment_slip'];?>" target="_blank"><img src="<?= $t_data['payment_slip'];?>" style="height:50px;width:50px;"></td>
																	<td class="text-right">
																		<?php 
																		switch($t_data['status']){
																			case $t_data['status']=='1' :
																				echo 'Approved';
																				break;
																			case $t_data['status']=='0' :
																				echo 'Pending';
																				break;
																			case $t_data['status']=='2' :
																				echo 'Rejected';
																				break;
																		}
																		?>
																	</td>
																	<td class="text-left"><small><?= $t_data['reason'];?></small></td>                                
																	<td class="text-left"><?= $t_data['updated_on'];?></td>                                
																			   
																</tr>
																<?php
															}
														}
															?>
															
														</tbody>                                
                                                </table>
                                            </div>
                                        </div>
                                    </div><!-- .card-preview -->
                                   
                                </div><!-- .nk-block -->
								
                            </div><!-- .components-preview -->
                        </div>
                    </div>
                </div>
    <?php echo $this->pagination->create_links();?>