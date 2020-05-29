<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Change extends CI_Controller
{
  //選手情報変更へ
  public function update()
  {
      $id = $this->input->get('id');
      $this->load->model("model_players");
      $player['row_array'] = $this->model_players->getplayer($id);
      $player['csrf'] = array(
          'name' => $this->security->get_csrf_token_name(),
          'hash' => $this->security->get_csrf_hash()
      );
      $this->load->view("update", $player);
  }
  //選手情報変更処理
  public function update_bms()
  {
      header("Content-type: application/json; charset=UTF-8");
      $day = date("Y-m-d H:i:s");
      $this->load->model("model_players");
      $this->model_players->update_player($day);
      //redirect("main/players");
      exit(json_encode(['player' => '更新完了']));
  }
  //選手削除
  public function delete_bms()
  {
      header("Content-type: application/json; charset=UTF-8");
      $day = date("Y-m-d H:i:s");
      $this->load->model("model_players");
      $this->model_players->delete_player($day);
      //redirect("main/players");
      exit(json_encode(['player' => '削除完了']));
  }
  public function profile()
  {
      $id = $this->input->get('id');
      $this->load->model("model_teams");
      $team['team_array'] = $this->model_teams->getteam($id);
      $team['csrf'] = array(
          'name' => $this->security->get_csrf_token_name(),
          'hash' => $this->security->get_csrf_hash()
      );
      $this->load->view('profile',$team);
  }
  public function update_profile()
  {
      header("Content-type: application/json; charset=UTF-8");
      $day = date("Y-m-d H:i:s");
      $this->load->model("model_teams");
      $this->model_teams->update_team($day);
      //redirect("main/players");
      exit(json_encode(['team' => '更新完了']));
  }
}