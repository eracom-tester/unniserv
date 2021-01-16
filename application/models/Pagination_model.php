<?php
class Pagination_model extends CI_Model {
    
    public function pagination($data){
        $uri_segment=(array_key_exists("uri_segment", $data) ? $data['uri_segment']:0);
        $total_rows=(array_key_exists("total_rows", $data) ? $data['total_rows']:0);
        $limit=(array_key_exists("limit", $data) ? $data['limit']:0);
        $base_url=(array_key_exists("base_url", $data) ? $data['base_url']:'');
        
        $sfx=$_GET;
        if(array_key_exists('page',$_GET)){
            unset($sfx['page']);
        }
        $sfxpre = '&';
        
        $pging['suffix'] =  $sfxpre.http_build_query($sfx, '', "&");
        
        $pging['first_url'] =  base_url().$base_url.'?'.http_build_query($sfx, '', "&");
        
        $pging['base_url'] = base_url().$base_url;
        $pging['uri_segment'] = $uri_segment;
        $pging['total_rows'] = $total_rows;
        $pging['per_page'] = $limit;
        $pging['reuse_query_string'] = FALSE;
        $pging['use_page_numbers'] = TRUE;
        $pging['page_query_string'] = TRUE;
        $pging['query_string_segment'] = 'page';
        $pging['first_link']       = 'First';
        $pging['last_link']        = 'Last';
        $pging['next_link']        = 'Next';
        $pging['prev_link']        = 'Prev';
        $pging['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $pging['full_tag_close']   = '</ul></nav></div>';
        $pging['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $pging['num_tag_close']    = '</span></li>';
        $pging['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $pging['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $pging['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $pging['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $pging['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $pging['prev_tagl_close']  = '</span>Next</li>';
        $pging['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $pging['first_tagl_close'] = '</span></li>';
        $pging['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $pging['last_tagl_close']  = '</span></li>';
        return $pging;
    }

public function search_data($data){
    $retdata=array();
    if(!empty($data)){
        foreach($data as $key=>$vl ){
          if($vl!=''){                        
            $retdata[$key]=$vl; 
          }
          
        }
      }
    return $retdata;  
}

public function searching_data($datasearch){
	//$this->session->sess_destroy();
        $likecondition=array();
        $page_string=$datasearch['search_string'];        
        $limit=(array_key_exists("limit", $datasearch) ? $datasearch['limit']:25);
        $prmtr = "search";
		$arr=array();
		if($this->input->post('reset') != NULL ){
			$this->session->unset_userdata($prmtr);
		}
		 
		
        if($this->input->post('submit') != NULL ){
              $this->session->unset_userdata($prmtr);
              $likedata = $this->input->post($page_string);
              $likecondition=$this->paging->search_data($likedata);
			  
			  $arr[$page_string]=$likecondition;
              $this->session->set_userdata($prmtr,$arr);

        }else{
              if($this->session->has_userdata($prmtr)){
					
                $likedata=$this->session->userdata($prmtr);
				if(array_key_exists($page_string,$likedata)){
					$srcdata=$likedata[$page_string];
					$likecondition=$this->paging->search_data($srcdata);
				}               
              }
        }

        $pg=(isset($_REQUEST['page']) ? $_REQUEST['page']:1);
        $datasearch['start']=($limit*$pg)-$limit;
        $datasearch['limit']=$limit;
        $data['sr_no']=$datasearch['start'];
         

        if(!empty($likecondition)){
            $datasearch['likecondition'] = $likecondition;
        }
        
        $get_pinBox=$this->conn->getRows($datasearch);            
        $datasearch['returnType']='count';
        $ttlrw=$this->conn->getRows($datasearch);
        $data['table_data']=$get_pinBox;
        
        $pagination['base_url']=$datasearch['base_url'];
        $pagination['total_rows']=$ttlrw;
        $data['total_rows']=$ttlrw;
        //$pagination['uri_segment']=4;
        $pagination['limit']=$limit;

        $pging=$this->paging->pagination($pagination);
        $this->pagination->initialize($pging);            

  return $data;
}
 public function search_response($searchdata,$limit,$base_url){
        $data['limit']=$limit;
        $pg=(isset($_REQUEST['page']) && $_REQUEST['page']!='' ? $_REQUEST['page']:1);
        $searchdata['start']=($limit*$pg)-$limit;
        $searchdata['limit']=$limit;
        $data['sr_no']=$searchdata['start'];
        
        $get_pinBox=$this->conn->getRows($searchdata);
        $data['table_data']=$get_pinBox;
        
        $searchdata['returnType']='count';
        $ttlrw=$this->conn->getRows($searchdata);
        
        $pagination['base_url']=$base_url;
        $pagination['total_rows']=$ttlrw;
        $data['total_rows']=$ttlrw;
        
        $pagination['limit']=$limit;

        $pging=$this->paging->pagination($pagination);
        $this->pagination->initialize($pging);
        
        return $data;
    }

}