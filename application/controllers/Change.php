<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Change extends CI_Controller
{
    //選手情報変更へ
    public function update()
    {
        if (!$this->session->userdata("is_logged_in")) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_players");
        $player['row_array'] = html_escape($this->model_players->getplayer($id));
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
        $this->load->library("form_validation");
        $config = [
            [
                "field" => "name",
                "label" => "氏名",
                "rules" => 'trim|required',
                "errors" => ["required" => "名前は入力必須です。"]
            ],
            [
                "field" => "tel",
                "label" => "電話番号",
                "rules" => "trim|required|regex_match[/^[0-9]+$/]",
                "errors" => [
                    "required" => "電話番号は入力必須です。",
                    "regex_match" => "電話番号が不正です。"
                ]
            ],
            [
                "field" => "mail",
                "label" => "メールアドレス",
                "rules" => "trim|required|valid_email",
                "errors" => [
                    "required" => "メールアドレスは入力必須です。",
                    "valid_email" => "メールアドレスが不正です。"
                ]
            ]
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $day = date("Y-m-d H:i:s");
            $this->load->model("model_players");
            $this->model_players->update_player($day);
            //redirect("main/players");
            exit(json_encode(['player' => '更新完了']));
        } else {
            redirect("main/players");
        }
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
        if (!$this->session->userdata("is_logged_in")) {
            redirect("main/login");
            return;
        }
        $id = $this->input->get('id');
        $this->load->model("model_teams");
        $team['team_array'] = html_escape($this->model_teams->getteam($id));
        $team['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('profile', $team);
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
    public function player_return()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_players");
        $this->model_players->return_player($day);
        //redirect("main/players");
        exit(json_encode(['player' => '削除完了']));
    }
    public function delete_real()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->model("model_players");
        $this->model_players->real_delete();
        //redirect("main/players");
        exit(json_encode(['player' => '削除完了']));
    }
}
