<?php
class Advance extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
         $this->panel_url=$this->conn->company_info('admin_path');
    }

   public function alert(){
            $data['search_string']='admin_advance_search';
            $data['limit']=25;
            $data['from_table']='notice_board';
            $data['base_url']=$this->panel_url.'advance/alert';
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $data['sr_no']=$res['sr_no'];
            $this->show->admin_panel('advance_alert',$data);
   }
   
   public function add_alert(){
          $data=array();
          if(isset($_POST['alert_btn'])){
              
              
			$this->form_validation->set_rules('alert_type', 'Alert type', 'required');
			 

			if($_POST['alert_type']=='marquee'){
				$this->form_validation->set_rules('title', 'Title', 'required');
			    $this->form_validation->set_rules('description', 'Description', 'required');
			}
			
			if($this->form_validation->run()){ 
			    $alert['type']=	isset($_POST['alert_type']) ? $_POST['alert_type']:'';	 
			    $alert['title']=	isset($_POST['title']) ? $_POST['title']:'';	 
			    $alert['description']=	isset($_POST['description']) ? $_POST['description']:'';
			    $params['upload_path']= 'alerts'; 
                $upload_pic=$this->upload_file->upload_image('file',$params);
			     
			    $alert['img_path']=	$upload_pic['upload_error']==false ? base_url().'images/alerts/'.$upload_pic['file_name']:'';
			    $this->db->insert('notice_board',$alert);
			    
			    $this->session->set_flashdata("alert_success", "Alert Added Successfully.");
			    redirect($_SERVER['HTTP_REFERER']); 
			}			
		}
          
          
          $this->show->admin_panel('alert',$data);
          
          
      } 
      public function delete(){
        if(isset($_REQUEST['alert'])){
          $this->db->delete('notice_board', array('id' => $_REQUEST['alert']));
          $admin_path=$this->conn->company_info('admin_path');
          $this->session->set_flashdata("alert_success", "Alert Deleted successfully.");
          redirect($_SERVER['HTTP_REFERER']); 
        }
    
         
      }
   
}