<?php
class Error_404 extends CI_controller
{
  public function index()
  {
    $this->output->set_status_header('404');
            // Make sure you actually have some view file named 404.php
            $this->load->view('error_404');
  }
}
