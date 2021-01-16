<?php
$notification_details=$this->notification->notification_details($n_id);
?>
 <br>
	<div class="row">
		<div class="col-md-12">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?= $panel_path.'dashboard';?>">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="<?= $panel_path.'notification';?>">Notifications</a>
					</li>
					<li class="breadcrumb-item active">
						<?= $notification_details->title;?>
					</li>
				</ol>
			</nav>
			<div class="jumbotron">
				<h2>
					<?= $notification_details->title;?>
				</h2>
				<span style="color:black;">
					<?= $notification_details->message;?>
				</span>
			</div>
		</div>
	</div>
 <?php
 $u_code=$this->session->userdata('user_id');
 $check_status=$this->notification->read_status($u_code,$n_id);
 if($check_status===false){
     $arr=array();
     $arr['n_id']=$n_id;
     $arr['u_code']=$u_code;
     $this->db->insert('notifications_viewers',$arr);
      
      $this->db->set('notifications', "notifications-1", FALSE);
      $this->db->where('id', $u_code);
      $this->db->update('users'); 
 }
 ?>