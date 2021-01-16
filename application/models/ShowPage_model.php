<?php
class ShowPage_model extends CI_Model{
   
     public function user_panel($page,$data=array()){
        
         if($this->session->has_userdata('user_login')){
            
			$data['search_parameter']="search";
            $data['panel']=$panel=$this->conn->company_info('user_panel');
            $data['panel_directory']=$panel_directory=$this->conn->company_info('panel_directory');
            $data['panel_url']=base_url().$panel_directory.'/'.$panel.'/';
            $data['panel_path']=base_url().$this->conn->company_info('panel_path').'/';
            
            $this->load->view($panel_directory.'/'.$panel.'/header',$data);
             
            $this->load->view($panel_directory.'/pages/'.$page,$data);
            
            $this->load->view($panel_directory.'/'.$panel.'/footer',$data);
           // echo 'sdf';

         }else{

            $this->session->set_userdata('login_redirect',base_url(uri_string()));
            $this->session->set_flashdata('error'," Please Login First.");
            redirect(base_url('login'));
            die();
         }
     }
     
     public function admin_panel($page,$data=array()){
        
        if($this->session->has_userdata('admin_login')){
			$data['search_parameter']="search";
			$admin_path1 = $this->conn->company_info('admin_path');
            $data['panel']=$panel=$this->conn->company_info('admin_panel');
            $data['admin_directory']=$admin_directory=$this->conn->company_info('admin_directory');
            $data['panel_url']=base_url().$admin_directory.'/'.$panel.'/';
            $admin_path=$this->conn->company_info('admin_path').'/';
            $data['admin_path']=base_url().$admin_path;
            $sub_admin=$this->session->userdata("admin_type"); 
            if($sub_admin=='subadmin'){
                $admin_rights=$this->session->userdata("admin_rights");
                 $page_path=uri_string();
                //die();
                $my_admin_path=str_replace($admin_path,"",$page_path);
                $all_admin_rights=json_decode($admin_rights);
                if(in_array($my_admin_path,$all_admin_rights)){
                    $this->parser->parse($admin_directory.'/'.$panel.'/header',$data);
                    $this->parser->parse($admin_directory.'/pages/'.$page,$data);
                    $this->parser->parse($admin_directory.'/'.$panel.'/footer',$data);
                    
                }else{
                    redirect(base_url($admin_path1.'/dashboard'));
                    die();  
                }
            }else{
                
                $this->parser->parse($admin_directory.'/'.$panel.'/header',$data);
                $this->parser->parse($admin_directory.'/pages/'.$page,$data);
                $this->parser->parse($admin_directory.'/'.$panel.'/footer',$data); 
            }
            
        }else{
            $this->session->set_userdata('login_redirect',base_url(uri_string()));
            $this->session->set_flashdata('error'," Please Login First.");
            redirect(base_url($admin_path1.'/login'));
            die();
        }
        
     }
     
    /* public function admin_panel($page,$data=array()){
        
        if($this->session->has_userdata('admin_login')){
			$data['search_parameter']="search";
            $data['panel']=$panel=$this->conn->company_info('admin_panel');
            $data['admin_directory']=$admin_directory=$this->conn->company_info('admin_directory');
            $data['panel_url']=base_url().$admin_directory.'/'.$panel.'/';
            $data['admin_path']=base_url().$this->conn->company_info('admin_path').'/';
            $this->parser->parse($admin_directory.'/'.$panel.'/header',$data);
            $this->parser->parse($admin_directory.'/pages/'.$page,$data);
            $this->parser->parse($admin_directory.'/'.$panel.'/footer',$data);
        }else{
            $this->session->set_userdata('login_redirect',base_url(uri_string()));
            $this->session->set_flashdata('error'," Please Login First.");
            $admin_path1 = $this->conn->company_info('admin_path');
            redirect(base_url($admin_path1.'/login'));
            die();
        }
        
     }*/
    
      public function franchise_panel($page,$data=array()){
       
       if($this->session->has_userdata('franchise_login')){
			$data['search_parameter']="search";
           $data['panel']=$panel=$this->conn->company_info('franchise_panel');
           $data['franchise_directory']=$admin_directory=$this->conn->company_info('franchise_directory');
           $data['panel_url']=base_url().$admin_directory.'/'.$panel.'/';
           $data['franchise_path']=base_url().$this->conn->company_info('franchise_path').'/';
           $this->load->view($admin_directory.'/'.$panel.'/header',$data);
           $this->load->view($admin_directory.'/pages/'.$page,$data);
           $this->load->view($admin_directory.'/'.$panel.'/footer',$data);
       }else{
           $this->session->set_userdata('login_redirect',base_url(uri_string()));
           $this->session->set_flashdata('error'," Please Login First.");
           $admin_path1 = $this->conn->company_info('franchise_path');
           redirect(base_url($admin_path1.'/login'));
           die();
       }
       
    }
     public function main($page,$data=array()){
        $data['search_parameter']="search";
        $data['panel']=$panel=$this->conn->company_info('main_theme');
        $data['admin_directory']=$main_directory=$this->conn->company_info('main_directory');
        $data['panel_url']=base_url().$main_directory.'/'.$panel.'/';

        $mainpages=array('register','login','forgot','verify','change_password');

        $this->parser->parse($main_directory.'/'.$panel.'/header',$data);
        if(in_array($page,$mainpages)){
            $this->parser->parse($main_directory.'/pages/'.$page,$data);
        }else{
            $this->parser->parse($main_directory.'/'.$panel.'/'.$page,$data);
        }
       

        $this->parser->parse($main_directory.'/'.$panel.'/footer',$data);
        
        
     }

     public function show_alert($params){
      if(array_key_exists("param", $params)){
          $string_nm=$params['param'];
          if(array_key_exists("alert_class", $params)){
              $alert_class=$params['alert_class'];
          }else{
              $alert_class='alert-danger';
          }   
          if(array_key_exists("type", $params)){
              $type=$params['type'];
          }else{
              $type='error';
          }
          
          if(array_key_exists("icon", $params)){
              $icon=$params['icon'];
          }else{
              $icon='<i class="fa fa-check"></i>';
          }

          if(isset($_SESSION[$string_nm])){
          ?>
          <div class="alert <?= $alert_class;?> alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <div class="alert-icon">

              <?= $icon;?>

              </div>
              <div class="alert-message">
              <span><strong><?= ucfirst($type);?>!</strong><?php echo $_SESSION[$string_nm];?></span>
              </div>
          </div>
          <?php
          }
      }
  }

  

}

