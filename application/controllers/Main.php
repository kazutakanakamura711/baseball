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
            redirect("score/scores");
        } else {
            $data['csrf'] = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $this->load->view('login', $data);
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
            if (password_verify($this->input->post("pass", true), $rows[0]["password"]) == true) {
                $data = [
                    "id" => $rows[0]["id"],
                    "team" => $rows[0]["team"],
                    "skipper" => $rows[0]["skipper"],
                    "tel" => $rows[0]["tel"],
                    "mail" => $this->input->post("mail"),
                    "slogan" => $rows[0]["slogan"],
                    "year" => $rows[0]["year"],
                    "job" => $rows[0]["job"],
                    "experience" => $rows[0]["experience"],
                    "policy" => $rows[0]["policy"],
                    "practice" => $rows[0]["practice"],
                    "pr" => $rows[0]["pr"],
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
        $this->output->set_header('X-Frame-Options: DENY');
        $id = $_SESSION['id'];
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
        $this->load->view("admin", $clean_player);
    }
    //登録チーム全て
    public function teams()
    {
        $this->output->set_header('X-Frame-Options: DENY',false);
        $this->load->model("model_scores");
        $team['teamscore_array'] = $this->model_scores->getallteamscore();
        $clean_team = html_escape($team);
        $this->load->view("matching", $clean_team);
    }
    public function delete()
    {
        $this->output->set_header('X-Frame-Options: DENY',false);
        $id = $this->input->get('id');
        $this->load->model("model_players");
        $player['player_array'] = html_escape($this->model_players->getplayers($id));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("delete", $player);
    }
}
