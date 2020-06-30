<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>パスワード変更</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    $(function() {
      $("#password").on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
        var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
        var postdata = {
          'mail': $('[name="mail"]').val(),
          'pass': $('[name="pass"]').val(),
          'chkpass': $('[name="chkpass"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/change/update_password",
          data: postdata,
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8',
          success: function(data) {
            if (data.error) {
              if (data.mail_error != '') {
                $('#mail_error').html(data.mail_error);
              } else {
                $('#mail_error').html('');
              }
              if (data.pass_error != '') {
                $('#pass_error').html(data.pass_error);
              } else {
                $('#pass_error').html('');
              }
              if (data.chkpass_error != '') {
                $('#chkpass_error').html(data.chkpass_error);
              } else {
                $('#chkpass_error').html('');
              }
              Swal.fire({
                icon: 'error',
                title: 'パスワード変更出来ませんでした。',
                text: '入力内容をご確認下さい。',
              }).then((result) => {
                $("#password").prop('disabled', false);
              });
            }
            if (data.success) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'パスワード変更出来ました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/main/login";
              });
            }
          }
        });
        return false;
      });
    });
  </script>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <h1>パスワード変更</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">下記に入力後、変更してください。</p>
        <div class="input-group mb-3">
          <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
        </div>
        <div class="error">
          <strong><span id="mail_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="mail" placeholder="※メールアドレス">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>       
        <div class="error">
          <strong><span id="pass_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="pass" class="form-control" name="pass" placeholder="※パスワード" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="error">
          <strong><span id="chkpass_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="pass" class="form-control" name="chkpass" placeholder="※パスワード確認" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <button id="password" type="submit" class="btn btn-primary btn-block">登録</button>
          </div>
          <br>
          <div class="row">
            <div class="col-6">
              <p class="float-left"><?= anchor('main/login/', 'ログインへ　>>'); ?></p>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
</body>

</html>