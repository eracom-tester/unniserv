<?php
class Ad extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_treatment(){ 
        
        $data['title']='Add Treatment';
         
        if(isset($_POST['add_btn'])){
            $this->form_validation->set_rules('title','Title','required');
            if($this->form_validation->run()!=false){
               $insert['title']= $_POST['title'];
               
               $param['upload_path']='Ad';
               $upload_product=$this->upload_file->upload_image('file',$param);
               if($upload_product['upload_error']==false){
                   $insert['img']= $upload_product['full_path'];
               }
               $insert['description']= $_POST['desc'];
               
               $this->db->insert('ad_treatment',$insert);
               $this->session->set_flashdata('success',"Treatment added successfully.");
               redirect(base_url(uri_string()));
            }else{
                $this->session->set_flashdata('Error',"Invalid Request.");
            }
        }
         //$this->parser->parse('Admin_panel/pages/ad_add', $data);
        
        $this->show->admin_panel('ad_add',$data);
    }
    
    
    public function add_blog(){ 
        
        $data['title']='Add Blog';
         
        if(isset($_POST['add_btn'])){
            $this->form_validation->set_rules('title','Title','required');
            if($this->form_validation->run()!=false){
               $insert['title']= $_POST['title'];
               
               $param['upload_path']='Ad';
               $upload_product=$this->upload_file->upload_image('file',$param);
               if($upload_product['upload_error']==false){
                   $insert['img']= $upload_product['full_path'];
               }
               $insert['description']= $_POST['desc'];
               
               $this->db->insert('ad_blogs',$insert);
               $this->session->set_flashdata('success',"Blog added successfully.");
               redirect(base_url(uri_string()));
            }else{
                $this->session->set_flashdata('Error',"Invalid Request.");
            }
        }
         //$this->parser->parse('Admin_panel/pages/ad_add', $data);
        
        $this->show->admin_panel('ad_add',$data);
    }
    
    
    public function add_achiever(){ 
        
        $data['title']='Add Achiever';
         
        if(isset($_POST['add_btn'])){
            $this->form_validation->set_rules('title','Title','required');
            if($this->form_validation->run()!=false){
               $insert['title']= $_POST['title'];
               
               $param['upload_path']='Ad';
               $upload_product=$this->upload_file->upload_image('file',$param);
               if($upload_product['upload_error']==false){
                   $insert['img']= $upload_product['full_path'];
               }
               $insert['description']= $_POST['desc'];
               
               $this->db->insert('ad_achievers',$insert);
               $this->session->set_flashdata('success',"Achiever added successfully.");
               redirect(base_url(uri_string()));
            }else{
                $this->session->set_flashdata('Error',"Invalid Request.");
            }
        }
         //$this->parser->parse('Admin_panel/pages/ad_add', $data);
        
        $this->show->admin_panel('ad_add',$data);
    }
    
    public function treatments(){ 
        
            $data['title']='Treatments';
            $data['edit_page']='edit_treatment';
            $data['search_string']='admin_treatment_search';
            $data['limit']=25;
            $data['from_table']='ad_treatment';
            $data['base_url']=$this->panel_url.'ad/treatments';
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $this->show->admin_panel('ad_table',$data); 
    }
    public function blogs(){ 
        
            $data['title']='Blogs';
            $data['edit_page']='edit_blog';
            $data['search_string']='admin_blogs_search';
            $data['limit']=25;
            $data['from_table']='ad_blogs';
            $data['base_url']=$this->panel_url.'ad/blogs';
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $this->show->admin_panel('ad_table',$data); 
    }
    public function achievers(){ 
        
            $data['title']='Achievers';
            $data['edit_page']='edit_achiever';
            $data['search_string']='admin_achievers_search';
            $data['limit']=25;
            $data['from_table']='ad_achievers';
            $data['base_url']=$this->panel_url.'ad/achievers';
            $res=$this->paging->searching_data($data);
            $data['table_data']=$res['table_data'];
            $this->show->admin_panel('ad_table',$data); 
    }
    
    public function edit_treatment(){
        
        $id=$_GET['id'];
        $data['edit_page']='edit_treatment';
        $data['edit_id']=$id;
        $data['title']='Treatment';
        $data['data']=$this->conn->runQuery('*','ad_treatment',"id='$id'");
        
        if(isset($_POST['add_btn'])){
            $this->form_validation->set_rules('title','Title','required');
            if($this->form_validation->run()!=false){
               $insert['title']= $_POST['title'];
               
               $param['upload_path']='Ad';
               $upload_product=$this->upload_file->upload_image('file',$param);
               if($upload_product['upload_error']==false){
                   $insert['img']= $upload_product['full_path'];
               }
               $insert['description']= $_POST['desc'];
               
               $this->db->where('id',$id);
               $this->db->update('ad_treatment',$insert);
               $this->session->set_flashdata('success',"Treatment Updated successfully.");
               redirect(base_url(uri_string().'?id='.$id));
            }else{
                $this->session->set_flashdata('Error',"Invalid Request.");
            }
        }
        
        $this->show->admin_panel('ad_edit',$data);
        
    }
    public function edit_blog(){
        
        $id=$_GET['id'];
        $data['edit_page']='edit_blog';
        $data['edit_id']=$id;
        $data['title']='Blog';
        $data['data']=$this->conn->runQuery('*','ad_blogs',"id='$id'");
        
        if(isset($_POST['add_btn'])){
            $this->form_validation->set_rules('title','Title','required');
            if($this->form_validation->run()!=false){
               $insert['title']= $_POST['title'];
               
               $param['upload_path']='Ad';
               $upload_product=$this->upload_file->upload_image('file',$param);
               if($upload_product['upload_error']==false){
                   $insert['img']= $upload_product['full_path'];
               }
               $insert['description']= $_POST['desc'];
               
               $this->db->where('id',$id);
               $this->db->update('ad_blogs',$insert);
               $this->session->set_flashdata('success',"Blog Updated successfully.");
               redirect(base_url(uri_string().'?id='.$id));
            }else{
                $this->session->set_flashdata('Error',"Invalid Request.");
            }
        }
        
        $this->show->admin_panel('ad_edit',$data);
        
    }
    public function edit_achiever(){
        
        $id=$_GET['id'];
        $data['edit_page']='edit_achiever';
        $data['edit_id']=$id;
        $data['title']='Achiever';
        $data['data']=$this->conn->runQuery('*','ad_achievers',"id='$id'");
        
        if(isset($_POST['add_btn'])){
            $this->form_validation->set_rules('title','Title','required');
            if($this->form_validation->run()!=false){
               $insert['title']= $_POST['title'];
               
               $param['upload_path']='Ad';
               $upload_product=$this->upload_file->upload_image('file',$param);
               if($upload_product['upload_error']==false){
                   $insert['img']= $upload_product['full_path'];
               }
               $insert['description']= $_POST['desc'];
               
               $this->db->where('id',$id);
               $this->db->update('ad_achievers',$insert);
               $this->session->set_flashdata('success',"Achiever Updated successfully.");
               redirect(base_url(uri_string().'?id='.$id));
            }else{
                $this->session->set_flashdata('Error',"Invalid Request.");
            }
        }
        
        $this->show->admin_panel('ad_edit',$data);
        
    }
    
    public function delete(){
        
    }
    
    
}