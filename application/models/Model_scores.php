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
  public function getscores()
  {

    $this->db->select('id,team_id,number,turn,name,delete_player,player_id,sum(atbat),sum(hit),sum(homerun),sum(rbi),sum(steal),sum(walk),sum(sacrifice),sum(inning),sum(h_hit),sum(h_homerun),sum(er),sum(strikeout),sum(h_walk)');
    $this->db->from('score');
    $this->db->join('player', 'player.id = score.player_id');
    $this->db->group_by("player_id");   //選手別にスコアグループ分け
    $this->db->order_by('turn');
    $score = $this->db->get();
    return $score->result_array();  //ログインチーム登録選手スコア全て表示   
  }
  public function getteamscore()
  {
    $this->db->select('id,team_id,delete_player,sum(atbat),sum(hit),sum(homerun),sum(rbi),sum(steal),sum(walk),sum(sacrifice),sum(inning),sum(h_hit),sum(h_homerun),sum(er),sum(strikeout),sum(h_walk)');
    $this->db->from('score');
    $this->db->join('player', 'player.id = score.player_id');
    $this->db->group_by("team_id");   //チームスコアにグループ分け
    $score = $this->db->get();
    return $score->result_array();  //ログインチーム登録選手スコア全て表示   
  }
}
