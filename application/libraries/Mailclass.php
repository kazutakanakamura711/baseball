<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

defined('BASEPATH') or exit('No direct script access allowed');
class Mailclass
{
  public function php_mailer($to, $bcc, $subject, $body)
  {
    //メールの設定読込
    $config = parse_ini_file('config.ini', true);
    // PHPMailerオブジェクト生成
    $mail = new PHPMailer(true);
    // 送信設定
    $mail->SMTPDebug = 0; // 0：デバッグOFF 1：デバッグON
    $mail->isSMTP();
    $mail->SMTPAuth = true; // SMTP認証を利用するか
    $mail->Host = $config['mail']['Host'];
    $mail->Username = $config['mail']['Username'];
    $mail->Password = $config['mail']['Password'];
    $mail->SMTPSecure = $config['mail']['Secure']; // sslの場合はssl
    $mail->Port = $config['mail']['Port']; // sslの場合は465(普通は)
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
    $mail->setFrom($config['mail']['Setfrom'], mb_encode_mimeheader('MBC User'));
    $mail->addAddress($to);
    if (isset($bcc)) {
      $mail->addBcc($bcc);
    }
    $mail->Subject = mb_encode_mimeheader($subject);
    $mail->Body = sprintf($body);
    // 送信
    $mail->send();
  }
  public function php_mailers($to, $bcc, $subject, $body)
  {
    //メールの設定読込
    $config = parse_ini_file('config.ini', true);
    // PHPMailerオブジェクト生成
    $mail = new PHPMailer(true);
    // 送信設定
    $mail->SMTPDebug = 0; // 0：デバッグOFF 1：デバッグON
    $mail->isSMTP();
    $mail->SMTPAuth = true; // SMTP認証を利用するか
    $mail->Host = $config['mail']['Host'];
    $mail->Username = $config['mail']['Username'];
    $mail->Password = $config['mail']['Password'];
    $mail->SMTPSecure = $config['mail']['Secure']; // sslの場合はssl
    $mail->Port = $config['mail']['Port']; // sslの場合は465(普通は)
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
    $mail->setFrom($config['mail']['Setfrom'], mb_encode_mimeheader('MBC User'));
    //$mail->clearAddress();
    $mail->addAddress($to);
    foreach ($bcc as $address) {
      $mail->addBcc($address);
    }
    $mail->Subject = mb_encode_mimeheader($subject);
    $mail->Body = sprintf($body);
    // 送信
    $mail->send();
  }
}
