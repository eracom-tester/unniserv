<?php

  $plan=$this->session->userdata('reg_plan');
  if($plan=='binary'){
    $this->load->view('User_panel/pages/dashboard/binary');
  }

?>