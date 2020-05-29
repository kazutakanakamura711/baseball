<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Score extends CI_Controller
{
  //スコア入力へ
  public function score_signup()
  {
      $id = $this->input->get('id');
      $this->load->model("model_players");
      $player['row_array'] = $this->model_players->getplayer($id);
      $player['csrf'] = array(
          'name' => $this->security->get_csrf_token_name(),
          'hash' => $this->security->get_csrf_hash()
      );
      $this->load->view("score", $player);
  }
  //スコア入力処理
  public function score_register()
  {
      header("Content-type: application/json; charset=UTF-8");
      $day = date("Y-m-d H:i:s");
      $this->load->model("model_scores");
      if ($this->model_scores->add_scores($day)) {
          //redirect("main/players");
          exit(json_encode(['score' => 'スコア登録完了']));
      } else {
          echo "スコア登録できませんでした。";
      }
  }
  //チーム内登録選手スコア全て
  public function scores()
  {
      $this->load->model("model_scores");
      $score['score_array'] = $this->model_scores->getscores();
      $score['teamscore_array'] = $this->model_scores->getteamscore();
      $this->load->model("model_games");
      $score['game_array'] = $this->model_games->getgames();
      $this->load->view("scoreboard", $score);
  }
}