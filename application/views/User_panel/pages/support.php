            
                        <div class="row pt-2 pb-2">
                            <div class="col-sm-12">
                                   
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="">Home</a></li>            
                                    <li class="breadcrumb-item active" aria-current="page"> Support</li>
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
						
                            <div class="card-header header-elements-inline">
                                <h5 class="panel-title">NEW SUPPORT TICKET</h5>
                                <p class="">Would you like to speak to one of our financial advisers over the phone? Just submit your details and we’ll be in touch shortly. You can also email us if you would prefer.</p>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="reload"></a>
                                        <a class="list-icons-item" data-action="remove"></a>
                                    </div>
                                </div>
                            </div>

						
							
		<form method="post" action="">
       <div class="row">
          <div class="col-lg-6">
            <fieldset class="form-group">
              <label>Name</label>
             <input type="text" class="form-control" value="<?= $this->session->userdata('profile')->username; ?>" readonly />
            </fieldset>
          </div>
          <div class="col-lg-6">
            <fieldset class="form-group">
              <label>E-Mail</label>
            <input type="email" class="form-control" value="<?= $this->session->userdata('profile')->email; ?>" readonly />
            </fieldset>
          </div>
          <div class="col-lg-6">
            <fieldset class="form-group">
              <label>Description</label>
             <textarea required class="form-control" rows="5" name="description"></textarea>
            </fieldset>
          </div>
          <div style="margin-top:40px" class="col-lg-6">
            <fieldset class="form-group">
                <input type="submit" class="btn btn-warning " name="send" value="Send" />
                                                
                                            
              <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                Cancel
                                            </button>
            </fieldset>
          </div>
        
        </div>
		</form>
		<div class="">
	   <div class="row">
	   <h4 class="mt-0 header-title">Support Ticket</h4>
          <div class="table-responsive">
                                <table class="<?= $this->conn->setting('table_classes'); ?>">
                                    <thead>
                                    <tr>
                                       
                                        <th>Ticket Id</th>
                                        <th>Description</th>
                                        <th>Create Date</th>
                                        <th>Status</th>
                                        <th>Reply</th>
										
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $userid=$this->session->userdata('user_id');
                                    $arr = $this->conn->runQuery("*",'support',"u_code='$userid'");
                                    if($arr){
									foreach($arr as $arr){
									?>
                                    <tr>
                                        <td><?= $arr->ticket;?></td>
                                        <td><?= $arr->message;?></td>
                                     <td><?= $arr->updated_on;?></td>
                                        <td><?php $rst=$arr->reply_status;
										if($rst==0){
											?>
										<button class="btn btn-danger">Not Replied</button>	
											<?php
										}else{
											?>
										<button class="btn btn-success">Replied</button>	
											<?php
										}
										?></td>
                                       <td><?= $arr->reply;?></td>
                                    </tr>
                                    <?php } 
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
    