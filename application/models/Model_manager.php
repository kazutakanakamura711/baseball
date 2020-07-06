<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_manager extends CI_Model
{
  public function stop_team($day)
  {
    //フラグを立てて画面非表示にする
    $data = [
      "withdrawal" => 1,
      "update_time" => $day
    ];
    return $this->db->where('id', $this->input->post("stop_id"))
      ->update('team', $data);
  }
  public function return_team($day)
  {
    //フラグを立てて画面非表示にする
    $date = [
      "withdrawal" => 0,
      "update_time" => $day
    ];
    return $this->db->where('id', $this->input->post("return_id"))
      ->update('team', $date);
  }
  public function delete_team()
  {
    return $this->db->where('id', $this->input->post("delete_id"))
      ->delete('team');
  }
  public function getmail()
  {
    $this->db->select('mail');
    $mail = $this->db->get('team');
    return $mail->result();  //メールアドレス全部   
  }
}