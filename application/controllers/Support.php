<?php
defined('BASEPATH') or exit('No direct script access allowed');
class support extends CI_Controller
{
  public function contact()
  {
    if (!$this->session->userdata("is_logged_in")) {
      redirect("main/login");
      return;
    }
    $this->output->set_header('X-Frame-Options: DENY', false);
    $data['csrf'] = array(
      'name' => $this->security->get_csrf_token_name(),
      'hash' => $this->security->get_csrf_hash()
    );
    $this->load->view('contact', $data);
  }
}
