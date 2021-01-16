<?php
class Income extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        if($this->conn->plan_setting('income_section')!=1){
            $panel_path=$this->conn->company_info('panel_path');
            redirect(base_url($panel_path.'/dashboard'));
            $this->currency=$this->conn->company_info('currency');
           
        }
         $this->panel_url=$this->conn->company_info('panel_path');
         $this->limit=20;
    }

    
    public function details(){
        $source='';
        if(isset($_REQUEST['source'])){
            $this->session->set_userdata('income_source',$_REQUEST['source']);
        }
        if($this->session->has_userdata('income_source')){
            $source=$this->session->userdata('income_source');
        }
        
        $data=array();
        $slug=$source;
        $limit=$this->limit;
        
        $conditions['u_code'] = $this->session->userdata('user_id');        
        $data['from_table']='transaction';
        $data['base_url']=$base_url=$this->panel_url.'/income/details';  
        $conditions['source']=$slug;
        $conditions['tx_type']='income';
        
        if(isset($_REQUEST['reset'])){
             redirect(base_url($base_url));
        }
        if(isset($_REQUEST['name']) && $_REQUEST['name']!=''){
            $idsn=$this->profile->column_like($_REQUEST['name'],'name');
            if(!empty($idsn)){
                $conditions['tx_u_code']=$idsn;
            }else{
                $conditions['tx_u_code']='';
            }
        }
        if(isset($_REQUEST['username']) && $_REQUEST['username']!=''){
            $ids=$this->profile->column_like($_REQUEST['username'],'username');
            if(!empty($ids)){
                $conditions['tx_u_code']=$ids;
            }else{
                $conditions['tx_u_code']='';
            }
            
        }
        if(isset($_REQUEST['select_level']) && $_REQUEST['select_level']!=''){
            $conditions['tx_record']=$_REQUEST['select_level'];
        }
        if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!='' && isset($_REQUEST['end_date']) && $_REQUEST['end_date']!=''){
            $data['where']="date>='".$_REQUEST['start_date']."' and date<='".$_REQUEST['end_date']."'";
        }
        if(isset($_REQUEST['limit']) && $_REQUEST['limit']!=''){
            $limit=$_REQUEST['limit'];
        }
        
        $data['conditions']=$conditions;
        //$res=$this->paging->searching_data($data);
        $data = $this->paging->search_response($data,$limit,$base_url);
        
        $data['base_url']=$base_url;
        $data['income_name']=ucfirst($slug);
        $data['income_slug']=$slug;
        $this->show->user_panel('income_view',$data);
    }
    
     
    
    
    public function level_report(){
        $data=array();
        $where=" AND";
        if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && $_REQUEST['start_date']!='' && $_REQUEST['end_date']!='' ){
            $start_date=date('Y-m-d 00:00:00',strtotime($_REQUEST['start_date']));
            $end_date=date('Y-m-d 23:59:00',strtotime($_REQUEST['end_date']));
        	          
			$where .= " date>='$start_date' and date<='$end_date' AND";
		}
        $data['whr'] = rtrim($where,"AND");
        $this->show->user_panel('income_level_report',$data);
    }
    
    public function repurchase_report(){ 
        $data=array();
        $where=" AND";
        if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && $_REQUEST['start_date']!='' && $_REQUEST['end_date']!='' ){
            $start_date=date('Y-m-d 00:00:00',strtotime($_REQUEST['start_date']));
            $end_date=date('Y-m-d 23:59:00',strtotime($_REQUEST['end_date']));
        	          
			$where .= " date>='$start_date' and date<='$end_date' AND";
		}
        $data['whr'] = rtrim($where,"AND");
        $this->show->user_panel('income_repurchase_report',$data);
    }
    
    public function royalty_report(){
        
        $data=array();
        $where=" AND";
        if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && $_REQUEST['start_date']!='' && $_REQUEST['end_date']!='' ){
            $start_date=date('Y-m-d 00:00:00',strtotime($_REQUEST['start_date']));
            $end_date=date('Y-m-d 23:59:00',strtotime($_REQUEST['end_date']));
        	          
			$where .= " date>='$start_date' and date<='$end_date' AND";
		}
        $data['whr'] = rtrim($where,"AND");
        $this->show->user_panel('income_royalty_report',$data);
        
    }
    
    public function repurchase_report_old(){
       
      $conditions=array();
        if(isset($_REQUEST['income'])){
            $this->session->set_userdata('show_income',$_REQUEST['income']);
        }

        if(isset($_POST['reset'])){
            $this->session->unset_userdata($data['search_string']);
        }
        
       $searchdata['from_table']='plan'; 
        
        if(isset($_REQUEST['start_date']) && isset($_REQUEST['end_date']) && $_REQUEST['start_date']!='' && $_REQUEST['end_date']!='' ){
			$start_date=date('Y-m-d 00:00:00',strtotime($_REQUEST['start_date']));
		    $end_date=date('Y-m-d 23:59:00',strtotime($_REQUEST['end_date']));
		    $this->session->set_userdata('start_date',$start_date);
		    $this->session->set_userdata('end_date',$end_date);
		}else{
		     $date = date('d'); 
         if($date >= "01" && $date <= "15"){
        	          $start_date=date('Y-m-01 00:00:01');
        	          $end_date=date('Y-m-15 23:59:59');
        	           $dateStr3=date('Y-m-d 23:59:59', strtotime('last day of previous month'));
        	           $this->session->set_userdata('start_date',$start_date);
        		    $this->session->set_userdata('end_date',$end_date);
        	         //die();
        	}else if($date >= "16" && $date <= "31"){
        	              
        	         $start_date=date('Y-m-16 00:00:01');
        	         $end_date = date('Y-m-d 23:59:59', strtotime("last day of this month"));
        	         $dateStr= date('Y-m-d 00:00:01', strtotime('first day of this month'));
        	         $dateStr3= date('Y-m-d 23:59:59', strtotime("+14 days ".$dateStr));
        	         $this->session->set_userdata('start_date',$start_date);
        		    $this->session->set_userdata('end_date',$end_date);
        	         
        	}
		}
	
        
	
        
        if(!empty($likeconditions)){
            $searchdata['likecondition'] = $likeconditions;
        }
        
        if(!empty($conditions)){
            $searchdata['conditions'] = $conditions;
        }
        $data = $this->paging->search_response($searchdata,$this->limit,$this->panel_url.'income/repurchase_report'); 
        $this->show->user_panel('income_repurchase_report',$data);    
           
       
       
    }
}