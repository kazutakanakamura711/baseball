# baseball

## 初期設定

  `config.ini.sample` をコピーして `config.ini` に名前変更して中身を編集して下さい。

; メールの設定  
  [mail]  
    Host = メールの環境に合わせてください <例> `gmail：smtp.gmail.com`  
    Username = メールアドレス  
    Password = パスワード  
    Secure = SMTPSecure <例>`tls`や`ssl`  
    Port = ポート番号  

; 有効期限の設定  
  [expire]  
    day = 本登録リンクのアクセス期限 <例> `15分：+15 min`  
