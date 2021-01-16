 <div class="row pt-2 pb-2">
        <div class="col-sm-12">
		    <h4 class="page-title">Notifications</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $panel_path.'dashboard';?>">Home</a></li>
            <li class="breadcrumb-item"><a href="">Notifications</a></li>
             
         </ol>
	   </div>
	    
</div>
	<div class="row ">
		<div class="col-md-12">
		    <?php
		    $u_code=$this->session->userdata('user_id');
		    $all_notifications=$this->notification->all_notifications($u_code);
		     if(!empty($all_notifications)){
              $nn=0;
              foreach($all_notifications as $notification){
                  $nn++;
                  $n_id=$notification->id;
                  $check_read=$this->notification->read_status($u_code,$n_id);
                  
                  $bg_no= $check_read===true ? '':'#dddddd';

        		    ?>
        		    
            			 <a href="<?= $panel_path.'notification/view?id='.$n_id;?>">
                			<div style="background-color:<?= $bg_no;?>;" class="card card-body">
                			    <blockquote class="blockquote">
                    				<p class="mb-0">
                    					<strong> <?= $notification->title;?> </strong><?= $notification->message;?>
                    				</p>
                    				<footer class="blockquote-footer">
                    				 <cite><?= $notification->added_on;?></cite>
                    				</footer>
                    			</blockquote>
                			</div>
            			 </a>
        			<?php
              }
		     }
			?>
		
		</div>
	</div>
 