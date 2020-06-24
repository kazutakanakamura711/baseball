<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Score extends CI_Controller
{
    //スコア入力へ
    public function score_signup()
    {
        $id = $this->input->get('id');
        $this->load->model("model_players");
        $player['row_array'] = html_escape($this->model_players->getplayer($id));
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
        $atbat = $this->input->post("atbat");
        $hit = $this->input->post("hit");
        $this->load->model("model_scores");
        if ($atbat >= $hit) {
            $this->model_scores->add_scores($atbat, $hit);
            //redirect("main/players");
            exit(json_encode(['score' => 'スコア登録完了']));
        } else {
            echo "スコアが不正である為、登録できませんでした。";
        }
    }
    //チーム内登録選手スコア全て
    public function scores()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $_SESSION['id'];
        $this->load->model("model_scores");
        $score['score_array'] = $this->model_scores->getscores($id);
        $score['teamscore_array'] = $this->model_scores->getteamscore($id);
        $this->load->model("model_games");
        $score['game_array'] = $this->model_games->getgames($id);
        $score['game'] = $this->model_games->getgamecount($id);
        $clean_score = html_escape($score);
        $clean_score['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->library('pagination');
        $config['base_url'] = 'http://yakyu.com/index.php/score/scores/';
        $config['total_rows'] = 10;
        $config['per_page'] = 3;
        $config["num_links"] = 2;
        $this->pagination->initialize($config);
        $this->load->view("scoreboard", $clean_score);
    }
    //スコア詳細へ
    public function score_details()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_scores");
        $scores['score_array'] = html_escape($this->model_scores->getscore($id));
        $scores['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("score_details", $scores);
    }
    //選手スコア変更へ
    public function score_update()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_scores");
        $score['row_array'] = html_escape($this->model_scores->get_score($id));
        $score['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("score_update", $score);
    }
    //選手スコア変更処理
    public function update_score()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_scores");
        $this->model_scores->update_score($day);
        exit(json_encode(['score' => '更新完了']));
    }
    //スコア削除
    public function delete_score()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_scores");
        $this->model_scores->score_delete($day);
        exit(json_encode(['score' => '削除完了']));
    }
}
