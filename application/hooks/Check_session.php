<?php
class Check_Session {    

    public function CheckSession($param){
        $session_userdata = $this->CI->session->userdata('logged_in');
        print_r($session_userdata);
        die();
            
         
            }
    }