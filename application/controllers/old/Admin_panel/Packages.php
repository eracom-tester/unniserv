<?php
class Packages extends CI_Controller{
    public function __construct()
    {
        parent::__construct();        
        $this->panel_url=$this->conn->company_info('admin_path');
    }

    public function index(){ 
        $this->show->admin_panel('packages');
    }

    public function edit(){
        if(isset($_REQUEST['id'])){
            $this->session->set_userdata('admin_edit_package',$_REQUEST['id']);
        }
        $package_id=$this->session->userdata('admin_edit_package');

        if(isset($_POST['edit_btn'])){
            $update['pin_rate']=$this->input->post('pin_rate');
            $update['pin_type']=$this->input->post('pin_type');
            $update['business_volumn']=$this->input->post('business_volumn');
            $update['pin_value']=$this->input->post('pin_value');

            $this->db->where('id',$package_id);
            if($this->db->update('pin_details',$update)){                
                $this->session->set_flashdata("success", "Package Updated successfully.");
                redirect(base_url(uri_string()));
            }else{                
                $this->session->set_flashdata("error", "Something Wrong.");
                redirect(base_url(uri_string()));
            }             
        }

        $data['package_details']=$this->conn->runQuery('*','pin_details',"id='$package_id' and status='1'")[0];
        $this->show->admin_panel('package_edit',$data);
    }

    public function create(){

        if(isset($_POST['add_btn'])){

            $this->form_validation->set_rules('pin_rate', 'Package rate', 'required|greater_than[0]');
            $this->form_validation->set_rules('pin_type', 'Package Name', 'required');
            $this->form_validation->set_rules('business_volumn', 'Package business volumn', 'required|greater_than[0]');
            $this->form_validation->set_rules('pin_value', 'Package Value', 'required|greater_than[0]');
            if($this->form_validation->run() != False){
                $insert['pin_rate']=$this->input->post('pin_rate');
                $insert['pin_type']=$this->input->post('pin_type');
                $insert['business_volumn']=$this->input->post('business_volumn');
                $insert['pin_value']=$this->input->post('pin_value');    
                
                if($this->db->insert('pin_details',$insert)){                
                    $this->session->set_flashdata("success", "Package Updated successfully.");
                    redirect(base_url(uri_string()));
                }else{                
                    $this->session->set_flashdata("error", "Something Wrong.");
                    redirect(base_url(uri_string()));
                } 
            }else{
                $this->session->set_flashdata("error", "Something Wrong.");
                
            }                       
        }

        $this->show->admin_panel('package_create');
    }   
}