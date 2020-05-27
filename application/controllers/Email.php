<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

defined('BASEPATH') or exit('No direct script access allowed');
class Email extends CI_Controller
{
	public function index()
	{
		header("Content-type: application/json; charset=UTF-8");
		$to=$_POST['battle_mail'];
		$bcc=	$_POST['mail'];
		$subject=	$_POST['team'] . "様との試合申し込み";
		$body=	$_POST['message'];
		$this->load->library('mailclass');
		$this->mailclass->php_mailer($to,$bcc,$subject,$body);
		exit(json_encode(['mailsend' => 'メール送信完了']));
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
			$body .=  "<'" . base_url() . "index.php/bms/check_signup_team/$key'>こちらをクリックして、本登録を完了してください。ただし、こちらのURLは15分過ぎると無効になりますのでご注意下さい。";
			$this->load->library('mailclass');
			$this->mailclass->php_mailer($to,NULL,$subject,$body);
			$this->load->model("model_temporary");
			if ($this->model_temporary->add_team($key)) {
				exit(json_encode(['mailsend' => 'メール送信完了']));
			} else {
				echo "チーム登録できませんでした。";
			}
		} else {
			$this->load->view('signup');
		}
	}
}
