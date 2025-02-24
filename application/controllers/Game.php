<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Game extends CI_Controller
{
    public function game_result()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('game/game_result', $data);
    }
    public function game_register()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->library("form_validation");
        $config = [
            [
                "field" => "battleteam",
                "label" => "対戦相手",
                "rules" => 'trim|required',
                "errors" => ["required" => "対戦相手は入力必須です。"]
            ]
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
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
            if ($this->model_games->add_game($score, $loss, $battle)) {
                //redirect("main/players");
                $array = ['success' => true];
            } else {
                echo "試合結果登録できませんでした。";
            }
        } else {
            $array = [
                'error' => true,
                'battleteam_error' => form_error('battleteam')
            ];
        }
        exit(json_encode($array));
    }
    //試合結果変更へ
    public function game_update()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_games");
        $game['row_array'] = html_escape($this->model_games->get_game($id));
        $game['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("game/game_update", $game);
    }
    //試合結果変更処理
    public function update_game()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->library("form_validation");
        $config = [
            [
                "field" => "battle_team",
                "label" => "対戦相手",
                "rules" => 'trim|required',
                "errors" => ["required" => "チーム名は入力必須です。"]
            ]
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
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
            if ($this->model_games->update_game($score, $loss, $battle)) {
                //redirect("main/players");
                $array = ['success' => true];
            } else {
                echo "試合結果登録できませんでした。";
            }
        } else {
            $array = [
                'error' => true,
                'battleteam_error' => form_error('battle_team')
            ];
        }
        exit(json_encode($array));
    }
    //試合結果削除
    public function delete_game()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_games");
        if($this->model_games->game_delete($day)){
            exit(json_encode(['game' => '削除完了']));
        }else{
            echo "試合を削除できませんでした。";
        }   
    }
}
