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
      "birth" => $this->input->post("birth"),
      "arm" => $this->input->post("arm"),
      "position" => $this->input->post("position"),
      "turn" => $this->input->post("turn"),
      "number" => $this->input->post("number"),
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
  public function getplayers($id)
  {
    $this->db->select('*');
    $this->db->from('player');
    $this->db->where('team_id', $id);
    $players = $this->db->get();
    return $players->result_array();  //ログインチーム登録選手全て表示   
  }
  public function getplayerage($id)
  {
    $this->db->select('sum(birth)');
    $this->db->from('player');
    $this->db->where('delete_player', 0);
    $this->db->where('team_id', $id);
    $age = $this->db->get();
    return $age->row_array();  
  }
  public function getplayercount($id)
  {
    $this->db->where('team_id', $id);
    $this->db->where('delete_player', 0);
    $count = $this->db->count_all_results('player');
    return $count;  
  }
  public function getplayer($playerid)
  {
    $this->db->where('pid', $playerid);
    $player = $this->db->get('player');
    return $player->row_array();  //特定選手を表示   
  }
  public function update_player($day)
  {
    //update_playerのモデルの実行時、以下のデータを取得して、$dateと紐づける
    $date = [
      "name" => $this->input->post("name"),
      "tel" => $this->input->post("tel"),
      "mail" => $this->input->post("mail"),
      "birth" => $this->input->post("birth"),
      "arm" => $this->input->post("arm"),
      "position" => $this->input->post("position"),
      "turn" => $this->input->post("turn"),
      "number" => $this->input->post("number"),
      "update_time" => $day
    ];
    //$dateをDB内の特定playerに挿入(更新)する
    return $this->db->where('pid', $this->input->post("id"))
      ->update('player', $date);
  }
  public function delete_player($day)
  {
    //フラグを立てて画面非表示にする
    $date = [
      "delete_player" => 1,
      "update_time" => $day
    ];
    return $this->db->where('pid', $this->input->post("delete_id"))
      ->update('player', $date);
  }
  public function return_player($day)
  {
    //フラグを立てて画面非表示にする
    $date = [
      "delete_player" => 0,
      "update_time" => $day
    ];
    return $this->db->where('pid', $this->input->post("return_id"))
      ->update('player', $date);
  }
  public function real_delete()
  {
    return $this->db->where('pid', $this->input->post("delete_id"))
      ->delete('player');;
  }
}
