<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
defined('BASEPATH') or exit('No direct script access allowed');
class Mailclass
{
  public function php_mailer()
  {
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
  }
  //githubにあげる時に役に立つ
  // {
  //   “smtp” : {
  //   “host” : “”,
  //   “Port”: 0,
  //   “Angora”:”tsl”,
  //   “Mail”:”hoge@gmail.com”,
  //   “Account”:”hoge@gmail.com”,
  //   “Password”:””,
  //   :
  //   },
  //   “_expire”: 15
  //   }
    
}
