<?php
class File_upload extends CI_Model{
    public function upload_product($file){

        $config['upload_path']= 'images/products/';
        $config['allowed_types']= 'jpg|jpeg|png|gif';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if($this->upload->do_upload($file)){
            
            $data = $this->upload->data();
            $img_name=$data['file_name'];
            $new_image=$img_name;
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'images/products/'.$img_name;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality']         =  '80%' ;
            $config['width']         = 1000;
            $config['height']       = 1000;
            $config['new_image']       = 'images/products/'.$new_image;

            $this->load->library('image_lib', $config);
              
            if($this->image_lib->resize()){
                $ret['file_name']= $new_image;
                $ret['upload_error']= false;
            }else{
                $ret['upload_error']= true;
                $ret['display_error']= $this->image_lib->display_errors();
            }          

        }else{
            $ret['upload_error']= true;
            $ret['display_error']= $this->upload->display_errors();
        }
        return $ret;
    }

    public function upload_image($file,$params=array()){

        if(array_key_exists("upload_path", $params)){
			$ipth = 'images/'.$params['upload_path'].'/';            
        }else{
            $ipth = 'images/';
        }
        

        $config['upload_path'] =  $ipth;
        $config['allowed_types']= 'jpg|jpeg|png|gif';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if($this->upload->do_upload($file)){
            
            $data = $this->upload->data();

            $img_name=$data['file_name'];
            $new_image=$img_name;

            if(array_key_exists("height", $params) && array_key_exists("width", $params)){


                $config['image_library'] = 'gd2';
                $config['source_image'] = $ipth.$img_name;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality']         =  '100%' ;            
                $config['new_image']       = $ipth.$new_image;
                $config['width']         = $params['width'];
                $config['height']       = $params['height'];
                
                if(array_key_exists("crop", $params)){
                    $functionname= 'crop'; 
                }else{
                    $functionname= 'resize';
                }

                $this->load->library('image_lib', $config);
                  
                if($this->image_lib->$functionname()){
                    $ret['file_name']= $new_image;
                    $ret['upload_error']= false;
                }else{
                    $ret['upload_error']= true;
                    $ret['display_error']= $this->image_lib->display_errors();
                }           
            }else{
                $ret['file_name']= $new_image;
                $ret['upload_error']= false;
            }

                      

        }else{
            $ret['upload_error']= true;
            $ret['display_error']= $this->upload->display_errors();
        }
        return $ret;
    }

    public function upload_multiple($file){
        $count = count($_FILES[$file]['name']);
        $uploaded=array();
        for($i=0;$i<$count;$i++){
    
            if(!empty($_FILES[$file]['name'][$i])){
        
                $_FILES['file']['name'] = $_FILES[$file]['name'][$i];
                $_FILES['file']['type'] = $_FILES[$file]['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES[$file]['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES[$file]['error'][$i];
                $_FILES['file']['size'] = $_FILES[$file]['size'][$i];
      
                $config['upload_path']= 'images/products/';
                $config['allowed_types']= 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';                
       
                $this->load->library('upload',$config); 

                if($this->upload->do_upload('file')){                  

                    $data = $this->upload->data();
                    $img_name=$data['file_name'];
                    $new_image=$img_name;
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'images/products/'.$img_name;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality']         =  '80%' ;
                    $config['width']         = 1000;
                    $config['height']       = 1000;
                    $config['new_image']       = 'images/products/'.$new_image;
        
                    $this->load->library('image_lib', $config);                      
                    if($this->image_lib->crop()){
                        $uploaded[] = $new_image;
                    }
                }
            }
       
          }
          return json_encode($uploaded);
    }
}

