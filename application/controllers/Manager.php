<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manager extends CI_Controller
{
  public function login()
  {
    if ($this->session->userdata("is_logged_in")) {
      redirect("manager/teams");
    } else {
      $data['csrf'] = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
      );
      $this->load->view('svlogin', $data);
    }
    $this->session->sess_destroy();
  }
  //ログイン処理
  public function login_validation()
  {
    header("Content-type: application/json; charset=UTF-8");
    $this->load->library("form_validation");
    $config = [
      [
        "field" => "pass",
        "label" => "パスワード",
        "rules" => "trim|required",
        "errors" => ["required" => "パスワードは入力必須です。",]
      ]
    ];
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run()) {
      //管理者パスワードの設定読込
      $config = parse_ini_file('config.ini', true);
      if ($this->input->post("pass") == $config['login']['password']) {
        $data = ["is_logged_in" => 1];
        $this->session->set_userdata($data);
        exit(json_encode($data));
      } else {
        $data["error"] = "メールアドレスかパスワードが不正です。";
        $this->load->view("login", $data);
      }
    } else {
      $this->load->view("login");
    }
  }
  public function teams()
  {
    if (!$this->session->userdata("is_logged_in")) {
      redirect("manager/login");
      return;
    }
    $this->output->set_header('X-Frame-Options: DENY');
    $this->load->model("model_teams");
    $team['team_array'] = $this->model_teams->getteams();
    $clean_team = html_escape($team);
    $clean_team['csrf'] = array(
      'name' => $this->security->get_csrf_token_name(),
      'hash' => $this->security->get_csrf_hash()
    );
    $this->load->view("supervisor", $clean_team);
  }
  public function contacts()
  {
    if (!$this->session->userdata("is_logged_in")) {
      redirect("manager/login");
      return;
    }
    $this->output->set_header('X-Frame-Options: DENY');
    $this->load->model("model_supports");
    $contact['message_array'] = $this->model_supports->getmessages();
    $clean_player = html_escape($contact);
    $clean_player['csrf'] = array(
      'name' => $this->security->get_csrf_token_name(),
      'hash' => $this->security->get_csrf_hash()
    );
    $this->load->view("svmessage", $clean_player);
  }
  public function sv_mail()
  {
    if (!$this->session->userdata("is_logged_in")) {
      redirect("manager/login");
      return;
    }
    $id = $this->input->get('id');
    $this->output->set_header('X-Frame-Options: DENY', false);
    $this->load->model("model_supports");
    $message['row_array'] = html_escape($this->model_supports->getmessage($id));
    $message['csrf'] = array(
      'name' => $this->security->get_csrf_token_name(),
      'hash' => $this->security->get_csrf_hash()
    );
    $this->load->view("svmail", $message);
  }
  public function sv_remail()
  {
    if (!$this->session->userdata("is_logged_in")) {
      redirect("manager/login");
      return;
    }
    $id = $this->input->get('id');
    $this->output->set_header('X-Frame-Options: DENY', false);
    $this->load->model("model_supports");
    $message['row_array'] = html_escape($this->model_supports->getmessage($id));
    $message['csrf'] = array(
      'name' => $this->security->get_csrf_token_name(),
      'hash' => $this->security->get_csrf_hash()
    );
    $this->load->view("svremail", $message);
  }
  public function notice()
  {
    if (!$this->session->userdata("is_logged_in")) {
      redirect("manager/login");
      return;
    }
    $this->output->set_header('X-Frame-Options: DENY');
    $data['csrf'] = array(
      'name' => $this->security->get_csrf_token_name(),
      'hash' => $this->security->get_csrf_hash()
    );
    $this->load->view("svnotice", $data);
  }
  public function news()
  {
    header("Content-type: application/json; charset=UTF-8");
    $this->load->library("form_validation");
    $config = [
      [
        "field" => "title",
        "label" => "問い合わせ内容",
        "rules" => 'trim|required',
        "errors" => ["required" => "件名は入力必須です。"]
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
      //$this->load->model("model_add_news");
      // $mails['mail'] = $this->model_manager->getmail();
      // foreach ($mails as $mail) {
      //   foreach ($mail as $value) {
      //     $to[] = $value['mail'];
      //   }
      // }
      $subject = $this->input->post("title");
      $body = $this->input->post("message");
      // $this->load->library('mailclass');
      // $this->mailclass->php_mailers($to, NULL, $subject, $body);
      $this->load->model("model_news");
      $this->model_news->add_news($subject,$body);
      $array = ['success' => true];
    } else {
      $array = [
        'error' => true,
        'title_error' => form_error('title'),
        'message_error' => form_error('message')
      ];
    }
    exit(json_encode($array));
  }
  public function newstopix()
    {
        if (!$this->session->userdata("is_logged_in")) {
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
        $this->load->view("svnews", $clean_news);
    }
}
