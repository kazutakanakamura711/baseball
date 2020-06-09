<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_teams extends CI_Model
{
  public function add_teams($days)
  {
    //add_teamsのモデルの実行時に、以下のデータを取得して、$dataと紐づける
    $data = [
      "team" => $this->input->post("team"),
      "skipper" => $this->input->post("skipper"),
      "tel" => $this->input->post("tel"),
      "mail" => $this->input->post("mail"),
      "password" => password_hash($this->input->post("pass"), PASSWORD_DEFAULT),
      "insert_time" => $days
    ];
    //$dataをDB内のteamに挿入後に、$queryと紐づける
    $query = $this->db->insert("team", $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
  public function getteams()
  {
    $team = $this->db->get('team');
    return $team->result_array();  //登録チーム全て表示   
  }
  public function getteam($id)
  {
    $this->db->where('id', $id);
    $team = $this->db->get('team');
    return $team->row_array();  //特定チームを表示   
  }
  public function update_team($day)
  {
    //update_playerのモデルの実行時、以下のデータを取得して、$dateと紐づける
    $data=[
      "team" => $this->input->post("team"),
      "tel" => $this->input->post("tel"),
      "mail" => $this->input->post("mail"),
      "slogan" => $this->input->post("slogan"),
      "policy" => $this->input->post("policy"),
      "year" => $this->input->post("year"),
      "job" => $this->input->post("job"),
      "experience" => $this->input->post("experience"),
      "practice" => $this->input->post("practice"),
      "pr" => $this->input->post("pr"),
      "update_time" => $day 
    ];
    //$dateをDB内の特定playerに挿入(更新)する
    return $this->db->where('id', $this->input->post("id"))
      ->update('team',$data);
  }
}
