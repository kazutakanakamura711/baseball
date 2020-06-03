<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_temporary extends CI_Model
{
  public function add_team($key)
  {
    $config = parse_ini_file('config.ini', true);
    //add_teamのモデルの実行時に、以下のデータを取得して、$dataと紐づける
    $day = date("Y-m-d H:i:s",strtotime("+".$config['expire']['minutes']." min")); 
    $data = [
      "mail" => $this->input->post("mail"),
      "pass_tmp" => $key,
      "expire_time" => $day 
    ];
    $data = $this->security->xss_clean($data);
    //$dataをDB内のtemporaryに挿入後に、$queryと紐づける
    $query = $this->db->insert("temporary", $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
  public function is_valid_key($key)
  {
    $days = date("Y-m-d H:i:s");
    $this->db->where("pass_tmp", $key);
    $team = $this->db->get("temporary");
    if ($team->num_rows() == 1 && $days < $team->first_row()->expire_time) {
      return $team->row_array();
    } else {
      return false;
    }
  }
}