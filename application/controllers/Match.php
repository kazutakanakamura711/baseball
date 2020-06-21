<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Match extends CI_Controller
{
    //試合申し込みへ
    public function game()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_teams");
        $player['row_array'] = html_escape($this->model_teams->getteam($id));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('game', $player);
    }
    //連絡フォームへ
    public function contact()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_teams");
        $player['row_array'] = html_escape($this->model_teams->getteam($id));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('contact', $player);
    }
    public function game_result()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('game_result', $data);
    }
    public function game_register()
    {
        header("Content-type: application/json; charset=UTF-8");
        $score = $this->input->post("score");
        $loss = $this->input->post("loss");
        if ($score > $loss) {
            $battle = "勝ち";
        } elseif ($score == $loss) {
            $battle = "引き分け";
        } else {
            $battle = "負け";
        }
        $this->load->model("model_games");
        $this->model_games->add_game($score, $loss,$battle);
        //redirect("main/players");
        exit(json_encode(['player' => '更新完了']));
    }
    //試合結果変更へ
    public function game_update()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_games");
        $game['row_array'] = html_escape($this->model_games->get_game($id));
        $game['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("game_update", $game);
    }
    //試合結果変更処理
    public function update_game()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_games");
        $this->model_games->update_game($day);
        exit(json_encode(['game' => '更新完了']));
    }
    //試合結果削除
    public function delete_game()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_games");
        $this->model_games->game_delete($day);
        exit(json_encode(['game' => '削除完了']));
    }
    public function ground()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $this->load->view('ground');
    }
    public function schedule()
    {
        $this->load->view('schedule');
    }
    public function recruit()
    {
        $this->load->view('recruit_player');
    }
    public function chat()
    {
        $this->load->view('chat');
    }
    public function tactics()
    {
        $this->load->view('tactics');
    }
    public function rules()
    {
        $this->output->set_header('X-Frame-Options: DENY');
        $this->load->view('rules');
    }
}
