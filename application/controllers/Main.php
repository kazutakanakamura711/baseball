<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{
    public function index()
    {
        $this->load->model("model_teams");
        $data['team_array'] = $this->model_teams->getteams();
        $this->load->model("model_news");
        $data['news_array'] = $this->model_news->get_news();
        $clean_data = html_escape($data);
        $clean_data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('home/function', $clean_data);
    }
    public function login()
    {
        if ($this->session->userdata("is_logged_in")) {
            $id = $_SESSION["id"];
            $this->load->model("model_team");
            $row = $this->model_team->get_flag($id);
            if ($row == 0) {
                redirect("main/players");
            } else {
                $this->session->sess_destroy();        //セッションデータの削除
                redirect("main/index");
            }
        } else {
            $data['csrf'] = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $this->load->view('signup/login', $data);
        }
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
                "errors" => ["required" => "パスワードは入力必須です。",]
            ]
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $this->load->model("model_team");
            $rows = $this->model_team->login();
            if ($rows[0]["withdrawal"] == 0) {
                if (password_verify($this->input->post("pass", true), $rows[0]["password"]) == true) {
                    $data = [
                        "id" => $rows[0]["id"],
                        "team" => $rows[0]["team"],
                        "skipper" => $rows[0]["skipper"],
                        "tel" => $rows[0]["tel"],
                        "mail" => $this->input->post("mail"),
                        "withdrawal" => $rows[0]["withdrawal"],
                        "is_logged_in" => 1
                    ];
                    $this->session->set_userdata($data);
                    exit(json_encode($data));
                } else {
                    $data["error"] = "メールアドレスかパスワードが不正です。";
                    $this->load->view("login", $data);
                }
            }
        }
        $this->load->view("login");
    }
    //チーム内登録選手全て
    public function players()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY');
        $this->load->model("model_teams");
        $player['team_array'] = $this->model_teams->getteam($id);
        $this->load->model("model_players");
        $player['player_array'] = $this->model_players->getplayers($id);
        $player['age'] = $this->model_players->getplayerage($id);
        $player['count'] = $this->model_players->getplayercount($id);
        $this->load->model("model_games");
        $player['game'] = $this->model_games->getgamecount($id);
        $clean_player = html_escape($player);
        $clean_player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("home/admin", $clean_player);
    }
    //登録チーム全て
    public function teams()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $this->load->model("model_teams");
        $team['team_array'] = $this->model_teams->getteams();
        $clean_team = html_escape($team);
        $this->load->view("game/matching", $clean_team);
    }
    public function notices()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $this->load->model("model_news");
        $news['news_array'] = $this->model_news->get_news();
        $clean_news = html_escape($news);
        $clean_news['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("information/notice", $clean_news);
    }
}
