            <br>
            <nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="#">Notification</a>
					</li>
				 
				</ol>
			</nav>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
    			<table class="table">
    				<thead>
    					<tr>
    						<th>
    							#
    						</th>
    						<th>
    							Title
    						</th>
    						<th>
    							Views
    						</th>
    						 
    						<th>
    							Date
    						</th>
    					</tr>
    				</thead>
    				<tbody>
    				    <?php
    				    
    				     if($table_data){
                            foreach($table_data as $t_data){
                                $sr_no++;
                                $notification_views=$this->notification->notification_views($t_data['id']);
    				    ?>
    					<tr>
    						<td>
    							<?= $sr_no;?>
    						</td>
    						<td>
    							<?= $t_data['title'];?>
    						</td>
    						<td>
    							<?= $notification_views;?>
    						</td>
    						
    						<td>
    						    <?= $t_data['added_on'];?>
    						</td>
    					</tr>
    					<?php }
    					}
    					?>
    				</tbody>
    			</table>
			</div>
			<?php 
    
    echo $this->pagination->create_links();?>
		</div>
	</div>
 