<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_games extends CI_Model
{
  public function add_game($day)
  {
    //add_playersのモデルの実行時に、以下のデータを取得して、$dataと紐づける
    $data = [
      "team_id" => $this->input->post("team_id"),
      "battle_team" => $this->input->post("battle_team"),
      "score" => $this->input->post("score"),
      "loss" => $this->input->post("loss"),
      "battle" => $this->input->post("battle"),
      "consideration" => $this->input->post("consideration"),
      "insert_time" => $day
    ];
    $data = $this->security->xss_clean($data);
    //$dataをDB内のplayerに挿入後に、$queryと紐づける
    $query = $this->db->insert("game", $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
  public function getgames($id)
  {
    $this->db->where('team_id', $id);
    $games = $this->db->get('game');
    return $games->result_array();    
  }
  public function getgamecount($id)
  {
    $this->db->where('team_id', $id);
    $game = $this->db->count_all_results('game');
    return $game;  //試合数   
  }
  public function get_game($id)
  {
    $this->db->where('id', $id);
    $player = $this->db->get('game');
    return $player->row_array();  //特定選手を表示   
  }
  public function update_game($day)
  {
    //update_playerのモデルの実行時、以下のデータを取得して、$dateと紐づける
    $date = [
      "team_id" => $this->input->post("team_id"),
      "battle_team" => $this->input->post("battle_team"),
      "score" => $this->input->post("score"),
      "loss" => $this->input->post("loss"),
      "battle" => $this->input->post("battle"),
      "consideration" => $this->input->post("consideration"),
      "update_time" => $day
    ];
    $date = $this->security->xss_clean($date);
    //$dateをDB内の特定playerに挿入(更新)する
    return $this->db->where('id', $this->input->post("id"))
      ->update('game', $date);
  }
  public function game_delete($day)
  {
    //フラグを立てて画面非表示にする
    $date = [
      "delete_game" => 1,
      "update_time" => $day
    ];
    return $this->db->where('id', $this->input->post("delete_id"))
      ->update('game', $date);
  }
}