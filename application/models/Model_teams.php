<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_teams extends CI_Model
{
  public function add_teams($key)
  {
    //add_teamsのモデルの実行時に、以下のデータを取得して、$dataと紐づける
    $data = [
      "team_name" => $this->input->post("team"),
      "skipper" => $this->input->post("skipper"),
      "tel" => $this->input->post("tel"),
      "mail" => $this->input->post("mail"),
      "pass_tmp" => $key,
      "game" => 0,
      "flag" => 0
    ];
    //$dataをDB内のteamに挿入後に、$queryと紐づける
    $query = $this->db->insert("team", $data);
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
  public function is_valid_key($key)
  {
    $this->db->where("pass_tmp", $key);
    $query = $this->db->get("team");
    $day = date("Y-m-d H:i:s");
    if ($query->num_rows() == 1 && $query->first_row()["expire"]) {
      return true;
    } else {
      return false;
    }
  }

  public function register_team($days)
  {
    //update_playerのモデルの実行時、以下のデータを取得して、$dateと紐づける
    $data = [
      "password" => password_hash($this->input->post("pass"), PASSWORD_DEFAULT),
      "insert_time" => $days
    ];
    //$dateをDB内の特定playerに挿入(更新)する
    return $this->db->where("pass_tmp", $this->input->post("key"))
      ->update('team', $data);
  }
  public function getteams()
  {
    $team = $this->db->get('team');
    return $team->result_array();  //登録チーム全て表示   
  }
  public function getteam($id)
  {
    $this->db->where('id', $id);
    $guest = $this->db->get('team');
    return $guest->row_array();  //特定チームを表示   
  }
}
