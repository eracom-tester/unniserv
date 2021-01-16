<?php
class Pin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('pin_section')!=1){
            $admin_path=$this->conn->company_info('admin_path');
            redirect(base_url($admin_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
        }
        $this->panel_url=$this->conn->company_info('admin_path');
    }

    public function index(){ 
        $this->pin_history();
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
                    $tx_pre_pins=$this->pin->user_pins_by_type($tx_u_code,$pin_type);
                    $cnt_tx_pre_pins = ($tx_pre_pins ? count($tx_pre_pins):0);

                    $pin_history = array(
                            'user_id'  => $tx_u_code,
                            'tx_user'  => null,
                            'debit'  => 0,
                            'prev_pin'  => $cnt_tx_pre_pins,
                            'curr_pin'  => ($cnt_tx_pre_pins+$no_of_pins),
                            'credit'  => $no_of_pins,
                            'pin_type'  => $pin_type,
                            'tx_type'  => 'credit',
                            'remark'  => "$tx_username recieve $no_of_pins pin(s) from Admin ."                  
                        
                    );

                    if($this->db->insert('pin_history', $pin_history)){
                        
                        for($n=0;$n<$_POST['no_of_pins'];$n++){               
                            
                                                

                            $epin['pin']=random_string($this->conn->setting('pin_gen_fun'), $this->conn->setting('pin_gen_digit'));
                            $epin['u_code']=$tx_u_code;                        
                            $epin['status']=1; 
                            $epin['created_by']='admin';                                               
                            $epin['pin_type']=$pin_type;
                            $this->db->insert('epins',$epin);

                        }

                        $this->session->set_flashdata("success", "Pin(s) Transfer success to $tx_username.");
                        
                        redirect(base_url(uri_string()));
                    }else{
                        $this->session->set_flashdata("error", " Something Wrong. Please try again.");
                    }

                }

                
            }

            

        }
        unset($_SESSION['form_submitted']);
        $this->show->admin_panel('pin_send');
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
            if($this->pin->pin_details($str)){
                return true;
            }else{
                $this->form_validation->set_message('pin_available', "Pin Not Exists.Please Select valid pin Type.");
                return false;
            }
        }else{
            $this->form_validation->set_message('pin_available', "Please Select pin Type.");
            return false;
        }
    }

    public function pin_history(){ 
        $data['limit']=25;
        $data['search_string']='pin_history_search'; 
        $data['from_table']='pin_history';
        $data['base_url']=$this->panel_url.'/pin/pin-history'; 
        $res=$this->paging->searching_data($data);
        $data['table_data']=$res['table_data'];
        $data['total_rows']=$res['total_rows'];
        $data['sr_no']=$res['sr_no'];
        $this->show->admin_panel('pin_history',$data);
    }

          
}