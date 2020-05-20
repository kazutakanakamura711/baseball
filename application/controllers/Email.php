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
		// PHPMailerオブジェクト生成
		$mail = new PHPMailer(true);
		// 送信設定
		$mail->SMTPDebug = 0; // 0：デバッグOFF 1：デバッグON
		$mail->isSMTP();
		$mail->SMTPAuth = true; // SMTP認証を利用するか
		$mail->Host = 'smtp.gmail.com';
		$mail->Username = 'hogehoge@gmail.com';
		$mail->Password = 'hoge';
		$mail->SMTPSecure = 'tls'; // sslの場合はssl
		$mail->Port = 587; // sslの場合は465(普通は)
		// ここからがポイント
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				// 'allow_self_signed' => true
			)
		);
		// ここまで
		// 送信内容設定
		$mail->CharSet = 'utf-8';
		$mail->setFrom('noreply@yakyu.com', mb_encode_mimeheader('MBC User'));
		$mail->addAddress($_POST['battle_mail']);
		$mail->addbcc($_POST['mail']);
		$mail->Subject = $_POST['team'] . "様との試合申し込み";
		$mail->Body = $_POST['message'];
		// 送信
		$mail->send();
		//redirect("main/teams");
		exit(json_encode(['mailsend' =>'メール送信完了']));
	}
	//チーム仮登録
	public function signup_validation()
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
			// PHPMailerオブジェクト生成
			$mail = new PHPMailer(true);
			// 送信設定
			$mail->SMTPDebug = 0; // 0：デバッグOFF 1：デバッグON
			$mail->isSMTP();
			$mail->SMTPAuth = true; // SMTP認証を利用するか
			$mail->Host = 'smtp.gmail.com';
			$mail->Username = 'hogehoge@gmail.com';
			$mail->Password = 'hoge';
			$mail->SMTPSecure = 'tls'; // sslの場合はssl
			$mail->Port = 587; // sslの場合は465(普通は)
			// ここからがポイント
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					// 'allow_self_signed' => true
				)
			);
			// ここまで
			// 送信内容設定
			$mail->CharSet = 'utf-8';
			$mail->setFrom('noreply@gmail.com', mb_encode_mimeheader('送信元'));
			$mail->addAddress($_POST['mail']);
			$mail->Subject = $_POST['team']."の仮登録が完了しました。";
			$mail->Body = $_POST['skipper']."様、チーム登録ありがとうございます。";
			$mail->Body .=  "<'" . base_url() . "index.php/bms/check_signup_team/$key'>こちらをクリックして、パスワード登録を完了してください。";
			$this->load->model("model_teams");
			if ($this->model_teams->add_teams($key)) {
				if ($mail->send()) {
				//redirect("main/login");
					exit(json_encode(['signup_id' =>'登録完了']));
				} else {
					echo "メールを送信できませんでした。";
				}
			} else {
				echo "チーム登録できませんでした。";
			}
		} else {
			$this->load->view('register');
		}
	}
}
