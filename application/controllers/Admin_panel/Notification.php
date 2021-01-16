<?php
class Notification extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->limit=10;
        $this->admin_url=$this->conn->company_info('admin_path');
    }

    public function index(){
        
        $searchdata['from_table']='notifications_list';
         
        
        $data = $this->paging->search_response($searchdata,$this->limit,$this->admin_url.'/notification');
       
        $this->show->admin_panel('notifications/list',$data);
        
         
    }
    
    public function add(){
        if(isset($_POST['add_btn'])){
            $this->form_validation->set_rules('user_type','User Type','required');
            if($_POST['user_type']=='single_user'){
                $this->form_validation->set_rules('tx_username', 'Username', 'required|callback_valid_username');
            }
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('message','Message','required');
            if($this->form_validation->run() != false){
                $arr=array();
                $user_type=$_POST['user_type'];
                $arr['type']=$user_type;
                if($user_type=='single_user'){
                    $get_id=$this->profile->id_by_username($_POST['tx_username']);
                    $arr['u_code']=$get_id;
                }
                $arr['title']=$_POST['title'];
                $arr['message']=$_POST['message'];
                if($this->db->insert('notifications_list',$arr)){
                    
                    $this->db->set('notifications', "notifications+1", FALSE);
                    if($user_type=='single_user'){
                        $this->db->where('id', $get_id);
                    }
                    $this->db->where("1=1");
                    $this->db->update('users');
                    $this->session->set_flashdata('success',"Notification added Successfully.");
                }else{
                    $this->session->set_flashdata('error',"Something Wrong.");
                }
                $admin_path=$this->conn->company_info('admin_path');
                redirect(base_url($admin_path.'/notification/add'));
            }else{
                $this->session->set_flashdata('error',"Something Wrong.");
            }
        }
        $this->show->admin_panel('notifications/add_notification');
    }
    
     public function valid_username($str){
        $check_username=$this->conn->runQuery("id",'users',"username='$str'");
        if($check_username){
            return true;
        }else{
              $this->form_validation->set_message('valid_username', "Invalid Username! Please check username.");
               return false;
        }
    }
    
}