<?php
defined('BASEPATH') or exit('No direct script access allowed');
class support extends CI_Controller
{
  public function contact()
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
        "field" => "email",
        "label" => "メールアドレス",
        "rules" => "trim|required|valid_email",
        "errors" => [
          "required" => "メールアドレスは入力必須です。",
          "valid_email" => "メールアドレスが不正です。"
        ]
      ],
      [
        "field" => "message",
        "label" => "問い合わせ内容",
        "rules" => 'trim|required',
        "errors" => ["required" => "問い合わせ内容は入力必須です。"]
      ]
    ];
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $name = $this->input->post("name");
      $mail = $this->input->post("email");
      $message = $this->input->post("message");
      //メールの設定読込
      $config = parse_ini_file('config.ini', true);
      $to = $config['contact']['Username'];
      $subject =  $name . "様からの問い合わせ";
      $body =  $message;
      $body .= "返信先：" . $mail;
      $this->load->library('mailclass');
      $this->mailclass->php_mailer($to, NULL, $subject, $body);
      $this->load->model("model_supports");
      if ($this->model_supports->add_contact($name, $mail, $message)) {
        $array = ['success' => true];
      } else {
        echo "問い合わせできませんでした。";
      }
    } else {
      $array = [
        'error' => true,
        'name_error' => form_error('name'),
        'mail_error' => form_error('email'),
        'message_error' => form_error('message')
      ];
    }
    exit(json_encode($array));
  }
  public function supports()
  {
    if (!$this->session->userdata("is_logged_in")) {
      redirect("main/login");
      return;
    }
    $this->output->set_header('X-Frame-Options: DENY', false);
    $data['csrf'] = array(
      'name' => $this->security->get_csrf_token_name(),
      'hash' => $this->security->get_csrf_hash()
    );
    $this->load->view('support', $data);
  }
  public function contacts()
  {
    header("Content-type: application/json; charset=UTF-8");
    $this->load->library("form_validation");
    $config = [
      [
        "field" => "message",
        "label" => "問い合わせ内容",
        "rules" => 'trim|required',
        "errors" => ["required" => "問い合わせ内容は入力必須です。"]
      ]
    ];
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $name = $this->input->post("name");
      $mail = $this->input->post("mail");
      $message = $this->input->post("message");
      //メールの設定読込
      $config = parse_ini_file('config.ini', true);
      $to = $config['contact']['Username'];
      $subject =  $name . "様から問い合わせ";
      $body =  $message;
      $body .= "返信先：" . $mail;
      $this->load->library('mailclass');
      $this->mailclass->php_mailer($to, NULL, $subject, $body);
      $this->load->model("model_supports");
      if ($this->model_supports->add_teamcontact($name, $mail, $message)) {
        $array = ['success' => true];
      } else {
        echo "問い合わせできませんでした。";
      }
    } else {
      $array = [
        'error' => true,
        'message_error' => form_error('message')
      ];
    }
    exit(json_encode($array));
  }
  public function response()
  {
    header("Content-type: application/json; charset=UTF-8");
    $this->load->library("form_validation");
    $config = [
      [
        "field" => "message",
        "label" => "問い合わせ内容",
        "rules" => 'trim|required',
        "errors" => ["required" => "問い合わせ内容は入力必須です。"]
      ]
    ];
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $name = $this->input->post("name");
      $to = $this->input->post("mail");
      $body = $this->input->post("message");
      $subject =  $name . "様、問い合わせありがとうございます。";
      $this->load->library('mailclass');
      $this->mailclass->php_mailer($to, NULL, $subject, $body);
      $day = date("Y-m-d H:i:s");
      $this->load->model("model_supports");
			if ($this->model_supports->update_message($day)) {
				$array = ['success' => true];
			} else {
				echo "送信できませんでした。";
			}
    } else {
      $array = [
        'error' => true,
        'message_error' => form_error('message')
      ];
    }
    exit(json_encode($array));
  }
  public function end_response()
  {
    header("Content-type: application/json; charset=UTF-8");
    $this->load->library("form_validation");
    $config = [
      [
        "field" => "message",
        "label" => "問い合わせ内容",
        "rules" => 'trim|required',
        "errors" => ["required" => "問い合わせ内容は入力必須です。"]
      ]
    ];
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      $name = $this->input->post("name");
      $to = $this->input->post("mail");
      $body = $this->input->post("message");
      $subject =  $name . "様、問い合わせありがとうございます。";
      $this->load->library('mailclass');
      $this->mailclass->php_mailer($to, NULL, $subject, $body);
      $day = date("Y-m-d H:i:s");
      $this->load->model("model_supports");
			if ($this->model_supports->end_message($day)) {
				$array = ['success' => true];
			} else {
				echo "送信できませんでした。";
			}
    } else {
      $array = [
        'error' => true,
        'message_error' => form_error('message')
      ];
    }
    exit(json_encode($array));
  }
}