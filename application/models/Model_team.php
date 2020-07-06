<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_team extends CI_Model
{
  public function login()
  {
    $this->db->where("mail", $this->input->post("mail", true));
    $query = $this->db->get('team');
    if ($query->num_rows() == 1) {
      return $query->result_array();
    } else {
      return false;
    }
  }
  public function getteamid()
  {
    $this->db->select('id');
    $this->db->where("mail", $this->input->post("mail"));
    $teamid = $this->db->get('team');
    return $teamid->first_row()->id;  //特定チームid   
  }
}