<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bms extends CI_Controller
{
    public function signup()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
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
                "field" => "name",
                "label" => "氏名",
                "rules" => 'trim|required',
                "errors" => ["required" => "氏名は入力必須です。"]
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
                //$this->output->set_status_header(200);
                $array = ['success' => true];
            } else {
                echo "選手登録できませんでした。";
            }
        } else {
            //$this->output->set_status_header(520);
            $array = [
                'error' => true,
                'name_error' => form_error('name'),
                'tel_error' => form_error('tel'),
                'mail_error' => form_error('mail')
            ];
        }
        exit(json_encode($array));
    }
    public function check_signup_team($key)
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
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
                "errors" => ["required" => "チーム名は入力必須です。"]
            ],
            [
                "field" => "skipper",
                "label" => "監督名",
                "rules" => 'trim|required',
                "errors" => [
                    "required" => "監督名は入力必須です。",
                    "errors" => ["required" => "監督名は入力必須です。"]
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
                "field" => "pass",
                "label" => "パスワード",
                "rules" => "trim|required|min_length[6]|alpha_numeric",
                "errors" => [
                    "required" => "パスワードは入力必須です。",
                    "min_length" => "パスワードは最低6文字以上にしてください。",
                    "alpha_numeric" => "パスワードは半角英数字のみにしてください。"
                ]
            ],
            [
                "field" => "chkpass",
                "label" => "パスワード確認",
                "rules" => "trim|required|matches[pass]",
                "errors" => [
                    "required" => "確認パスワードは入力必須です。",
                    "matches" => "上記と同じパスワードを入力してください。"
                ]
            ]
        ];
        $this->form_validation->set_rules($config);
        $days = date("Y-m-d H:i:s");
        if ($this->form_validation->run()) {
            $this->load->model("model_teams");
            if($this->model_teams->add_teams($days)){
                $array = ['success' => true];
            } else {
                echo "チーム登録できませんでした。";
            }
        } else {
            $array = [
                'error' => true,
                'team_error' => form_error('team'),
                'skipper_error' => form_error('skipper'),
                'tel_error' => form_error('tel'),
                'mail_error' => form_error('mail'),
                'pass_error' => form_error('pass'),
                'chkpass_error' => form_error('chkpass')
            ];
        }
        exit(json_encode($array));
    }
}
