<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{
    public function index()
    {
        $this->load->view('function');
    }
    public function login()
    {
        if ($this->session->userdata("is_logged_in")) {
            $this->load->model("model_players");
            $player['player_array'] = $this->model_players->getplayers();
            $this->load->view("admin", $player);
        } else {
            $this->load->view('login');
        }
        $this->session->sess_destroy();
    }
    public function logout()
    {
        $this->session->sess_destroy();        //セッションデータの削除
        redirect("main/index");
    }
    //ログイン処理
    public function login_validation()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->library("form_validation");
        $config = [
            [
                "field" => "mail",
                "label" => "メールアドレス",
                "rules" => "trim|required",
                "errors" => ["required" => "メールアドレスは入力必須です。"]
            ],
            [
                "field" => "pass",
                "label" => "パスワード",
                "rules" => "trim|required",
                "errors" => ["required" => "パスワードを入力してください。",]
            ]
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->load->model("model_team");
            $rows = $this->model_team->login();
            if (password_verify($this->input->post("pass"), $rows[0]["password"]) == true) {
                $data = [
                    "id" => $rows[0]["id"],
                    "name" => $rows[0]["team_name"],
                    "skipper" => $rows[0]["skipper"],
                    "tel" => $rows[0]["tel"],
                    "mail" => $this->input->post("mail"),
                    "game" => $rows[0]["game"],
                    "is_logged_in" => 1
                ];
                $this->session->set_userdata($data);
                exit(json_encode($data));
            } else {
                $data["error"] = "メールアドレスかパスワードが不正です";
                $this->load->view("login", $data);
            }
        } else {
            $this->load->view("login");
        }
    }
    //チーム内登録選手全て
    public function players()
    {
        $this->load->model("model_players");
        $player['player_array'] = $this->model_players->getplayers();
        $this->load->view("admin", $player);
    }
    //登録チーム全て
    public function teams()
    {
        $this->load->model("model_teams");
        $team['team_array'] = $this->model_teams->getteams();
        $this->load->view("matching", $team);
    }
}
