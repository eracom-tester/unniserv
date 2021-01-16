<?php
class Notification_model extends CI_Model{
    
    public function notifications_count($u_code){
        $get_my_notifications=$this->conn->runQuery('notifications','users',"id='$u_code'");
        return $get_my_notifications ? $get_my_notifications[0]->notifications : 0;
    }
    
    public function all_notifications($u_code){
        $get_my_notifications=$this->conn->runQuery('*','notifications_list',"u_code = '$u_code' or (type='all_users') order by id desc");
        return $get_my_notifications ?  $get_my_notifications : array();
    }
    
    public function read_status($u_code,$n_id){
        $get_my_notifications=$this->conn->runQuery('*','notifications_viewers',"u_code = '$u_code' and n_id='$n_id'");
        return $get_my_notifications ?  true : false;
    }
    
    public function notification_details($n_id){
        $get_my_notifications=$this->conn->runQuery('*','notifications_list',"id='$n_id'");
        return $get_my_notifications ?  $get_my_notifications[0] : false;
    }
    
    public function notification_views($n_id){
        $get_my_notifications=$this->conn->runQuery('COUNT(*) as cnt','notifications_viewers',"n_id='$n_id'")[0]->cnt;
        return $get_my_notifications!='' ?  $get_my_notifications : 0;
    }
    
    
}
