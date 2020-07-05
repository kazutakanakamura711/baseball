<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_supports extends CI_Model
{
  public function add_contact($name, $mail, $message)
  {
    //add_playersのモデルの実行時に、以下のデータを取得して、$dataと紐づける
    $data = [
      "team_id" => 0,
      "name" => $name,
      "mail" => $mail,
      "title" => "新規",
      "message" => $message,
      "insert_time" => date("Y-m-d H:i:s")
    ];
    //$dataをDB内のplayerに挿入後に、$queryと紐づける
    $query = $this->db->insert("support", $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
  public function add_teamcontact($name, $mail, $message)
  {
    //add_playersのモデルの実行時に、以下のデータを取得して、$dataと紐づける
    $data = [
      "team_id" => $this->input->post("team_id"),
      "name" => $name,
      "mail" => $mail,
      "title" => $this->input->post("title"),
      "message" => $message,
      "insert_time" => date("Y-m-d H:i:s")
    ];
    //$dataをDB内のplayerに挿入後に、$queryと紐づける
    $query = $this->db->insert("support", $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
  public function getmessages()
  {
    $team = $this->db->get('support');
    return $team->result_array();  //問い合わせ全て表示   
  }
  public function getmessage($id)
  {
    $this->db->where('id', $id);
    $team = $this->db->get('support');
    return $team->row_array();  //特定の問い合わせ表示   
  }
  public function update_message($day)
  {
    //フラグを立てて画面非表示にする
    $date = [
      "delete_message" => 1,
      "update_time" => $day
    ];
    return $this->db->where('id', $this->input->post("id"))
      ->update('support', $date);
  }
  public function delete_message($day)
  {
    //フラグを立てて画面非表示にする
    $date = [
      "delete_message" => 2,
      "update_time" => $day
    ];
    return $this->db->where('id', $this->input->post("id"))
      ->update('support', $date);
  }
}
