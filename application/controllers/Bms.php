<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bms extends CI_Controller
{
    public function signup()
    {
        $this->load->view("signup");
    }
    //選手登録
    public function register_validation()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->library("form_validation");
        $config = [
            [
                "field" => "team_id",
                "label" => "チーム番号",
                "rules" => 'trim|required',
                "errors" => ["required" => "idは入力必須です。"]
            ],
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
            if ($this->model_players->add_players($day)) {
                //redirect("main/players");
                exit(json_encode(['register_id' =>'登録完了']));
            } else {
                echo "選手登録できませんでした。";
            }
        } else {
            $this->load->view('register');
        }
    }
    public function check_signup_team($key)
    {
        //add_temp_usersモデルが書かれている、model_uses.phpをロードする
        $this->load->model("model_teams");
        if ($this->model_teams->is_valid_key($key)) {    //キーが正しい場合は、以下を実行
            // echo "valid key";
            $data["key"] = $key;
            $this->load->view("master", $data);
        } else {
            echo "不正なキーが使われています。";
        }
    }
    public function register_password()
    {
        header("Content-type: application/json; charset=UTF-8");
        $key = $this->input->post("key");
        $this->load->model("model_teams");
        if ($this->model_teams->is_valid_key($key)) {
            $this->load->library("form_validation");
            $config = [
                [
                    "field" => "pass",
                    "label" => "パスワード",
                    "rules" => "trim|required",
                    "errors" => ["required" => "パスワードは入力必須です。"]
                ],
                [
                    "field" => "chkpass",
                    "label" => "パスワード確認",
                    "rules" => "trim|required",
                    "errors" => ["required" => "もう一度パスワードを入力してください。",]
                ]
            ];
            $this->form_validation->set_rules($config);
            $days = date("Y-m-d H:i:s");
            if ($this->form_validation->run()) {
                $this->model_teams->register_team($days);
                //redirect("main/login");
                exit(json_encode(['master_id' =>'登録完了']));
            } else {
                $data["key"] = $key;
                $this->load->view("register", $data);
            }
        } else {
            echo "不正なキーが使われています";
        }
    }
    //スコア入力へ
    public function score_update()
    {
        $id = $this->input->post('update_id');
        $this->load->model("model_players");
        $player['row_array'] =$this->model_players->getplayer($id);
        $this->load->view("score",$player);
    }
    //スコア入力処理
    public function score_update_bms()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_scores");
        if ($this->model_scores->add_scores($day)) {
            //redirect("main/players");
            exit(json_encode(['score' =>'スコア登録完了']));
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
        $this->load->view("scoreboard", $score);
    }
    //選手情報変更へ
    public function update()
    {
        $id = $this->input->post('update_id');
        $this->load->model("model_players");
        $player['row_array'] =$this->model_players->getplayer($id);
        $this->load->view("update",$player);
    }
    //選手情報変更処理
    public function update_bms()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_players");
        $this->model_players->update_player($day);
        //redirect("main/players");
        exit(json_encode(['player' =>'更新完了']));
    }
    //選手削除
    public function delete_bms()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_players");
        $this->model_players->delete_player($day);
        //redirect("main/players");
        exit(json_encode(['player' =>'削除完了']));
    }
}
