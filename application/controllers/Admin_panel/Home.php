<?php
class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(){

        
        $this->show->admin_panel('index');
    }
    public function banners(){
        $this->show->admin_panel('home_banners');
    }
    
    public function change_banner(){
        $b_id=$data['b_id']=$_GET['id'];
        
        if(isset($_POST['update_btn'])){
            
            $single_imgs=$this->conn->runQuery('*','home_sliders',"id='$b_id'");
            if($single_imgs[0]->type=='single'){
                $prm['height']=280;
                $prm['width']=280;
            }
            if($single_imgs[0]->type=='slider'){
                $prm['height']=500;
                $prm['width']=1024;
            }
            $upload_path=$prm['upload_path']='banners';
            
            $res = $this->upload_file->upload_image('new_file',$prm);
            $up=array();
				if($res['upload_error']==false){
				    $up['img']=base_url().'images/'.$upload_path.'/'.$res['file_name'];;
				}
			$up['sl_desc']=$_POST['desc_sl'];	
			$this->db->where('id',$b_id);
			$this->db->update('home_sliders',$up);
			 $this->session->set_flashdata("success", "Banner Updated Successfully.");
			 
        }
        
        $this->show->admin_panel('home_banner_change',$data);
    }
}