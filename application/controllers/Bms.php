<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bms extends CI_Controller
{
    public function signup()
    {
        $this->output->set_header('X-Frame-Options: DENY',false);
        $data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("signup", $data);
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
                exit(json_encode(['register_id' => '登録完了']));
            } else {
                echo "選手登録できませんでした。";
            }
        } else {
            redirect("main/players");
        }
    }
    public function check_signup_team($key)
    {
        $this->output->set_header('X-Frame-Options: DENY',false);
        //add_temp_usersモデルが書かれている、model_uses.phpをロードする
        $this->load->model("model_temporary");
        if ($this->model_temporary->is_valid_key($key)) {    //キーが正しい場合は、以下を実行
            // echo "valid key";
            $data["row_array"] = $this->model_temporary->is_valid_key($key);
            $data['csrf'] = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $this->load->view("master", $data);
        } else {
            echo "URLが間違っているか、アクセス期限が過ぎています。";
        }
    }
    public function register_password()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->library("form_validation");
        $config = [
            [
                "field" => "team",
                "label" => "チーム名",
                "rules" => 'trim|required',
                "errors" => ["required" => "事業所名は入力必須です。"]
            ],
            [
                "field" => "skipper",
                "label" => "監督名",
                "rules" => 'trim|required',
                "errors" => [
                    "required" => "住所は入力必須です。",
                    "errors" => ["required" => "住所は入力必須です。"]
                ],
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
                "rules" => "trim|required|valid_email|is_unique[team.mail]",
                "errors" => [
                    "required" => "メールアドレスは入力必須です。",
                    "valid_email" => "メールアドレスが不正です。"
                ]
            ],
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
            $this->load->model("model_teams");
            $this->model_teams->add_teams($days);
            //redirect("main/login");
            exit(json_encode(['master_id' => '登録完了']));
        } else {
            echo "入力内容に誤りがあるか、既に使われているメールアドレスの可能性がある為、チーム登録できませんでした。";
        }
    }
}