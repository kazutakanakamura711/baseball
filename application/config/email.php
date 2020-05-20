<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config["protocol"] = "smtp";
$config["smtp_host"] = "ssl://smtp.googlemail.com";
$config["smtp_port"] = 587;
$config["smtp_user"] = "hogehoge@gmail.com";
$config["smtp_pass"] = "hoge";
$config['smtp_timeout'] = 30; // SMTP接続のタイムアウト(秒)
$config["mailtype"] = "html";