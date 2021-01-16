<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'index';

    if($this->uri->segment(1)!='login' && $this->uri->segment(1)!='register'){
        $route['(:any)'] = 'Main/index/any/$1';
    }else{
        $route['(:any)'] = 'Main/$1';
    }
    

    $route['login/(:any)'] = 'Main/login/$1';
    $route['register/(:any)'] = 'Main/register/$1';

    $route['user/(:any)'] = 'User_panel/$1';
    $route['user/(:any)/(:any)'] = 'User_panel/$1/$2';

    $route['admin/(:any)'] = 'Admin_panel/$1';
    $route['admin/(:any)/(:any)'] = 'Admin_panel/$1/$2';
    
     $route['franchise/(:any)'] = 'Franchise_panel/$1';
    $route['franchise/(:any)/(:any)'] = 'Franchise_panel/$1/$2';
   // $route['errors/error_404'] = 'Errors/Error_404/index';
    
    $route['404_override'] = 'error_404';
    $route['translate_uri_dashes'] = True;
   
 
