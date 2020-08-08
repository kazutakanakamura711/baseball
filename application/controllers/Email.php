<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Email extends CI_Controller
{
	public function index()
	{
		header("Content-type: application/json; charset=UTF-8");
		$this->load->library("form_validation");
		$config = [
			[
				"field" => "message",
				"label" => "メッセージ",
				"rules" => 'trim|required',
				"errors" => ["required" => "メール本文は入力必須です。"]
			]
		];
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {
			$to = $_POST['battle_mail'];
			$bcc =	$_POST['mail'];
			$subject =	$_POST['team'] . "様との試合申し込み";
			$body =	$_POST['message'];
			$this->load->library('mailclass');
			$this->mailclass->php_mailer($to, $bcc, $subject, $body);
			$array = ['success' => true];
		} else {
			$array = [
				'error' => true,
				'message_error' => form_error('message')
			];
		}
		exit(json_encode($array));
	}
	//チーム仮登録
	public function signup_validation()
	{
		header("Content-type: application/json; charset=UTF-8");
		$this->load->library("form_validation");
		$config = [
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
			//ランダムキーを生成する
			$key = md5(uniqid());
			$to = $_POST['mail'];
			$subject = "仮登録完了しました。";
			$body = "メール登録ありがとうございます。";
			$body .= "<'" . base_url() . "index.php/bms/check_signup_team/$key'>こちらをクリックして、本登録を完了してください。ただし、こちらのURLは60分を過ぎると無効になりますのでご注意下さい。";
			$this->load->library('mailclass');
			$this->mailclass->php_mailer($to, NULL, $subject, $body);
			$this->load->model("model_temporary");
			if ($this->model_temporary->add_team($key)) {
				//$this->output->set_status_header(200);
				$array = ['success' => true];
			} else {
				echo "仮登録できませんでした。";
			}
		} else {
			$array = [
				'error' => true,
				'mail_error' => form_error('mail')
			];
		}
		exit(json_encode($array));
	}
	//メール変更
	public function mail_validation()
	{
		header("Content-type: application/json; charset=UTF-8");
		$this->load->library("form_validation");
		$config = [
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
			//ランダムキーを生成する
			$key = md5(uniqid());
			$to = $_POST['mail'];
			$subject = "メール変更について。";
			$body = "メール変更受け付けました。";
			$body .= "<'" . base_url() . "index.php/change/check_team_mail/$key'>こちらをクリックして、登録を完了してください。ただし、こちらのURLは60分を過ぎると無効になりますのでご注意下さい。";
			$this->load->library('mailclass');
			$this->mailclass->php_mailer($to, NULL, $subject, $body);
			$team['id'] = $this->input->post("id");
			$this->load->model("model_temporary");
			if ($this->model_temporary->add_mail($key, $team)) {
				//$this->output->set_status_header(200);
				$array = ['success' => true];
			} else {
				echo "送信できませんでした。";
			}
		} else {
			$array = [
				'error' => true,
				'mail_error' => form_error('mail')
			];
		}
		exit(json_encode($array));
	}
	//password変更
	public function email_validation()
	{
		header("Content-type: application/json; charset=UTF-8");
		$this->load->library("form_validation");
		$config = [
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
			//ランダムキーを生成する
			$key = md5(uniqid());
			$to = $_POST['mail'];
			$subject = "パスワード変更について";
			$body = "パスワード変更受け付けました";
			$body .= "<'" . base_url() . "index.php/change/check_team_pass/$key'>こちらをクリックして、登録を完了してください。ただし、こちらのURLは60分を過ぎると無効になりますのでご注意下さい。";
			$this->load->library('mailclass');
			$this->mailclass->php_mailer($to, NULL, $subject, $body);
			$this->load->model("model_team");
			$team['id'] = $this->model_team->getteamid();
			$this->load->model("model_temporary");
			if ($this->model_temporary->add_mail($key, $team)) {
				//$this->output->set_status_header(200);
				$array = ['success' => true];
			} else {
				echo "送信できませんでした。";
			}
		} else {
			$array = [
				'error' => true,
				'mail_error' => form_error('mail')
			];
		}
		exit(json_encode($array));
	}
}
