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
            if($this->db->update('package_details',$update)){                
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
    
      public function send(){

        if(isset($_POST['pin_transfer_btn'])){

            if(isset($_SESSION['form_submitted']))
            {
                
                $this->session->set_flashdata("error", " <i class='fa fa-spinner fa-spin'></i> Please wait...");                        
                redirect(base_url(uri_string()));
                die('You have already submitted the form.');
            }
            else
            {
                
                $_SESSION['form_submitted'] = TRUE;
                $this->form_validation->set_rules('tx_username', 'Username', 'required|callback_valid_username');
                $this->form_validation->set_rules('selected_pin', 'Pin type', 'required|callback_pin_available');
                $this->form_validation->set_rules('no_of_pins', 'No of pins', 'required|greater_than[0]');
                if($this->form_validation->run() != False){
                    $tx_username=$_POST['tx_username'];
                    $tx_u_code =  $this->profile->id_by_username($tx_username);                
                    $no_of_pins = $_POST['no_of_pins'];
                    $pin_type = $_POST['selected_pin'];
                    $pin_details=$this->pin->package_details($pin_type);
                    $payout_id=$this->wallet->currenct_payout_id();
                    $epin['tx_type']='purchase';
                    $epin['u_code']=$tx_u_code;                        
                    $epin['status']=0; 
                    $epin['order_amount']=$pin_details->pin_rate;                                               
                    $epin['order_bv']=$pin_details->business_volumn;
                    $epin['payment_status']=1;
                    $epin['closing_status']=1;
                    $epin['payout_id']=$payout_id;
                    $this->db->insert('orders',$epin);
                        $this->session->set_flashdata("success", "Pin(s) Transfer success to $tx_username.");
                        redirect(base_url(uri_string()));
                }
                
            }

        }
        unset($_SESSION['form_submitted']);
        $this->show->admin_panel('package_send');
    }
    
    public function valid_pkg($str){
        $tx_username1=$_POST['tx_username'];
        $tx_u_code11=  $this->profile->id_by_username($tx_username1);
        $check_username=$this->conn->runQuery("id",'rank',"rank_id='$str' and u_code='$tx_u_code11'");
        if($check_username){
           $this->form_validation->set_message('valid_pkg', "Already achieve rank.");
               return false;
        }else{
             return true;  
        }
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

    public function pin_available($str){
        if($str!=''){
            if($this->pin->package_details($str)){
                return true;
            }else{
                $this->form_validation->set_message('pin_available', "Package Not Exists.Please Select valid Package Type.");
                return false;
            }
        }else{
            $this->form_validation->set_message('pin_available', "Please Select Package Type.");
            return false;
        }
    }
    
    
     public function rank(){

        if(isset($_POST['make_rank_btn'])){

            if(isset($_SESSION['form_submitted']))
            {
                
                $this->session->set_flashdata("error", " <i class='fa fa-spinner fa-spin'></i> Please wait...");                        
                redirect(base_url(uri_string()));
                die('You have already submitted the form.');
            }
            else
            {
                
                $_SESSION['form_submitted'] = TRUE;
                $this->form_validation->set_rules('tx_username', 'Username', 'required|callback_valid_username');
                $this->form_validation->set_rules('selected_pin', 'Pin type', 'required|callback_valid_pkg');
                
                if($this->form_validation->run() != False){
                    $tx_username=$_POST['tx_username'];
                    $tx_u_code =  $this->profile->id_by_username($tx_username);
                    $pin_type = $_POST['selected_pin'];
                   /* $pin_details=$this->pin->package_details($pin_type);
                    $payout_id=$this->wallet->currenct_payout_id();*/
                    
                    for($i=1;$i<=$pin_type;$i++){
                        
                        $check_rank_detail=$this->conn->runQuery("id",'rank',"rank_id='$i' and u_code='$tx_u_code'");
                        if(!$check_rank_detail){
                            $all_rank=$this->conn->runQuery("*",'plan',"id='$i'");
                            if($all_rank){
                            
                              $packs=$all_rank[0]->rank; 
                              $rank_ids=$all_rank[0]->id; 
                              $rank_per= $all_rank[0]->r_per; 
                              $epin['rank_per']=$rank_per;
                                $epin['rank_per']=$rank_per;
                                $epin['u_code']=$tx_u_code;                        
                                $epin['rank']=$packs; 
                                $epin['rank_id']=$rank_ids;                                               
                                $epin['added_on']=date('Y-m-d H:i:s');
                                $epin['is_complete']=1;
                                $epin['complete_date']=date('Y-m-d H:i:s');
                           
                                $this->db->insert('rank',$epin);
                                
                              
                            }else{
                                $this->session->set_flashdata("error", "Invalid Package.");
                                redirect(base_url(uri_string()));
                            }
                        }
                    }    
                    $this->session->set_flashdata("success", "Make rank successfully.");
                    redirect(base_url(uri_string()));
                    
                       
                }
                
            }

        }
        unset($_SESSION['form_submitted']);
        $this->show->admin_panel('package_rank');
    }
    
}