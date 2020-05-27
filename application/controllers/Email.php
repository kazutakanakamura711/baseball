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
			$mail->Subject = "仮登録完了しました。";
			$mail->Body = "メール登録ありがとうございます。";
			$mail->Body .=  "<'" . base_url() . "index.php/bms/check_signup_team/$key'>こちらをクリックして、本登録を完了してください。ただし、こちらのURLは15分過ぎると無効になりますのでご注意下さい。";
			$this->load->model("model_temporary");
			if ($this->model_temporary->add_team($key)) {
				if ($mail->send()) {
					//redirect("main/login");
					exit(json_encode(['signup_id' => '登録完了']));
				} else {
					echo "メールを送信できませんでした。";
				}
			} else {
				echo "チーム登録できませんでした。";
			}
		} else {
			$this->load->view('signup');
		}
	}
}
