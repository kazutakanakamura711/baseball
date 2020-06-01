<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_scores extends CI_Model
{
  public function add_scores($day)
  {
    //add_playersのモデルの実行時に、以下のデータを取得して、$dataと紐づける
    $data = [
      "player_id" => $this->input->post("id"),
      "atbat" => $this->input->post("atbat"),
      "hit" => $this->input->post("hit"),
      "homerun" => $this->input->post("homerun"),
      "rbi" => $this->input->post("rbi"),
      "steal" => $this->input->post("steal"),
      "walk" => $this->input->post("walk"),
      "sacrifice" => $this->input->post("sacrifice"),
      "inning" => $this->input->post("inning"),
      "h_hit" => $this->input->post("h_hit"),
      "h_homerun" => $this->input->post("h_homerun"),
      "er" => $this->input->post("er"),
      "strikeout" => $this->input->post("strikeout"),
      "h_walk" => $this->input->post("h_walk"),
      "insert_time" => $day
    ];
    //$dataをDB内のplayerに挿入後に、$queryと紐づける
    $query = $this->db->insert("score", $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
  public function getscores($id)
  {

    $this->db->select('id,team_id,number,turn,position,name,delete_player,player_id,sum(atbat),sum(hit),sum(homerun),sum(rbi),sum(steal),sum(walk),sum(sacrifice),sum(inning),sum(h_hit),sum(h_homerun),sum(er),sum(strikeout),sum(h_walk),delete_score');
    $this->db->from('score');
    $this->db->join('player', 'player.id = score.player_id');
    $this->db->where('team_id', $id);
    $this->db->where('delete_score', 0);
    $this->db->group_by("player_id");   //選手別にスコアグループ分け
    $this->db->order_by('turn');
    $score = $this->db->get();
    return $score->result_array();  //ログインチーム登録選手スコア全て表示   
  }
  public function getteamscore($id)
  {
    $this->db->select('id,team_id,delete_player,sum(atbat),sum(hit),sum(homerun),sum(rbi),sum(steal),sum(walk),sum(sacrifice),sum(inning),sum(h_hit),sum(h_homerun),sum(er),sum(strikeout),sum(h_walk),delete_score');
    $this->db->from('score');
    $this->db->join('player', 'player.id = score.player_id');
    $this->db->where('team_id', $id);
    $this->db->where('delete_score', 0);
    $score = $this->db->get();
    return $score->result_array();  //ログインチーム登録選手スコア全て表示   
  }
  public function getscore($id)
  {
    $this->db->from('score');
    $this->db->join('player', 'player.id = score.player_id');
    $this->db->where('player_id', $id);
    $this->db->where('delete_score', 0);
    $score = $this->db->get();
    return $score->result_array();  //ログインチーム登録選手スコア全て表示   
  }
  public function get_score($id)
  {
    $this->db->where('score_id', $id);
    $player = $this->db->get('score');
    return $player->row_array();  //特定選手を表示   
  }
  public function update_score($day)
  {
    //update_playerのモデルの実行時、以下のデータを取得して、$dateと紐づける
    $date = [
      "atbat" => $this->input->post("atbat"),
      "hit" => $this->input->post("hit"),
      "homerun" => $this->input->post("homerun"),
      "rbi" => $this->input->post("rbi"),
      "steal" => $this->input->post("steal"),
      "walk" => $this->input->post("walk"),
      "sacrifice" => $this->input->post("sacrifice"),
      "inning" => $this->input->post("inning"),
      "h_hit" => $this->input->post("h_hit"),
      "h_homerun" => $this->input->post("h_homerun"),
      "er" => $this->input->post("er"),
      "strikeout" => $this->input->post("strikeout"),
      "h_walk" => $this->input->post("h_walk"),
      "insert_time" => $day
    ];
    $date = $this->security->xss_clean($date);
    //$dateをDB内の特定playerに挿入(更新)する
    return $this->db->where('score_id', $this->input->post("id"))
      ->update('score', $date);
  }
  public function score_delete($day)
  {
    //フラグを立てて画面非表示にする
    $date = [
      "delete_score" => 1,
      "update_time" => $day
    ];
    return $this->db->where('score_id', $this->input->post("delete_id"))
      ->update('score', $date);
  }
}
