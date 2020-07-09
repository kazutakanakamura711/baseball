<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Change extends CI_Controller
{
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
            if ($this->model_players->update_player($day)) {
                $array = ['success' => true];
            } else {
                echo "選手情報変更できませんでした。";
            }
        } else {
            $array = [
                'error' => true,
                'name_error' => form_error('name'),
                'tel_error' => form_error('tel'),
                'mail_error' => form_error('mail')
            ];
        }
        exit(json_encode($array));
    }
    public function update_profile()
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
            ]
        ];
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run()) {
            $day = date("Y-m-d H:i:s");
            $this->load->model("model_teams");
            if ($this->model_teams->update_team($day)) {
                $array = ['success' => true];
            } else {
                echo "チーム編集できませんでした。";
            }
        } else {
            $array = [
                'error' => true,
                'team_error' => form_error('team'),
                'skipper_error' => form_error('skipper'),
                'tel_error' => form_error('tel')
            ];
        }
        exit(json_encode($array));
    }
    public function update_password()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->library("form_validation");
        $config = [
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
            if ($this->model_teams->update_password($days)) {
                $array = ['success' => true];
            } else {
                echo "チーム登録できませんでした。";
            }
        } else {
            $array = [
                'error' => true,
                'pass_error' => form_error('pass'),
                'chkpass_error' => form_error('chkpass')
            ];
        }
        exit(json_encode($array));
    }
    public function check_team_mail($key)
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        //add_temp_usersモデルが書かれている、model_uses.phpをロードする
        $this->load->model("model_temporary");
        if ($this->model_temporary->is_valid_key($key)) {    //キーが正しい場合は、以下を実行
            $data["row_array"] = $this->model_temporary->is_valid_key($key);
            $data['csrf'] = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $this->load->view("signup/mail_update", $data);
        } else {
            echo "URLが間違っているか、アクセス期限が過ぎています。";
        }
    }
    public function mail_update()
    {
        header("Content-type: application/json; charset=UTF-8");
        $id = $this->input->post('id');
        $this->load->model("model_teams");
        if ($this->model_teams->mail_update($id)) {
            $array = ['success' => true];
        } else {
            $array = ['error' => true];
        }
        exit(json_encode($array));
    }
    public function check_team_pass($key)
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        //add_temp_usersモデルが書かれている、model_uses.phpをロードする
        $this->load->model("model_temporary");
        if ($this->model_temporary->is_valid_key($key)) {    //キーが正しい場合は、以下を実行
            $data["row_array"] = $this->model_temporary->is_valid_key($key);
            $data['csrf'] = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            $this->load->view("signup/pass_update", $data);
        } else {
            echo "URLが間違っているか、アクセス期限が過ぎています。";
        }
    }
}
