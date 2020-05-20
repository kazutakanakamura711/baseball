<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_players extends CI_Model
{
  public function add_players($day)
  {
    //add_playersのモデルの実行時に、以下のデータを取得して、$dataと紐づける
    $data = [
      "team_id" => $this->input->post("team_id"),
      "name" => $this->input->post("name"),
      "tel" => $this->input->post("tel"),
      "mail" => $this->input->post("mail"),
      "year" => $this->input->post("year"),
      "arm" => $this->input->post("arm"),
      "position" => $this->input->post("position"),
      "flag" => 0,
      "insert_time" => $day
    ];
    //$dataをDB内のplayerに挿入後に、$queryと紐づける
    $query = $this->db->insert("player", $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
  public function getplayers()
  {
    $player = $this->db->get('player');
    return $player->result_array();  //ログインチーム登録選手全て表示   
  }
  public function getplayer($id)
  {
    $this->db->where('id', $id);
    $guest = $this->db->get('player');
    return $guest->row_array();  //特定選手を表示   
  }
  public function update_player($day)
  {
    //update_playerのモデルの実行時、以下のデータを取得して、$dateと紐づける
    $date=[
      "name" => $this->input->post("name"),
      "tel" => $this->input->post("tel"),
      "mail" => $this->input->post("mail"),
      "year" => $this->input->post("year"),
      "arm" => $this->input->post("arm"),
      "position" => $this->input->post("position"),
      "flag" => 0,
      "update_time" => $day     
    ];
    //$dateをDB内の特定playerに挿入(更新)する
    return $this->db->where('id', $this->input->post("id"))
      ->update('player',$date);
  }
  public function delete_player($day)
  {
    //フラグを立てて画面非表示にする
    $date=[
      "flag" => 1,
      "update_time" => $day     
    ];
    return $this->db->where('id', $this->input->post("delete_id"))
      ->update('player',$date);
  }
}
