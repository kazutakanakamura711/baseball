<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>新規チーム登録</title>
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
      $("#master").on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
        var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
        var postdata = {
          'team': $('[name="team"]').val(),
          'skipper': $('[name="skipper"]').val(),
          'tel': $('[name="tel"]').val(),
          'mail': $('[name="mail"]').val(),
          'pass': $('[name="pass"]').val(),
          'chkpass': $('[name="chkpass"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/bms/register_password",
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
              if (data.team_error != '') {
                $('#team_error').html(data.team_error);
              } else {
                $('#team_error').html('');
              }
              if (data.skipper_error != '') {
                $('#skipper_error').html(data.skipper_error);
              } else {
                $('#skipper_error').html('');
              }
              if (data.tel_error != '') {
                $('#tel_error').html(data.tel_error);
              } else {
                $('#tel_error').html('');
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
                title: 'チーム登録出来ませんでした。',
                text: '入力内容をご確認下さい。',
              }).then((result) => {
                $("#master").prop('disabled', false);
              });
            }
            if (data.success) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'チーム登録出来ました。',
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
      <h1>チーム本登録</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">下記に入力後、登録してください。</p>
        <div class="input-group mb-3">
          <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
        </div>
        <div class="error">
          <input type="hidden" class="form-control" name="mail" value="<?= $row_array['mail'] ?>">
          <strong><span id="mail_error" class="text-danger"></span></strong>
        </div>
        <div class="error">
          <strong><span id="team_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="team" placeholder="※チーム名" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-baseball-ball"></span>
            </div>
          </div>
        </div>
        <div class="error">
          <strong><span id="skipper_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="skipper" placeholder="※監督名" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="error">
          <strong><span id="tel_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="tel" class="form-control" name="tel" placeholder="※電話番号" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
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
            <button id="master" type="submit" class="btn btn-primary btn-block">登録</button>
          </div>
          <br>
          <div class="row">
            <div class="col-6">
              <p class="float-left"><?= anchor('main/login/', 'ログインへ　>>'); ?></p>
            </div><!-- /.col -->
            <div class="col-6">
              <p class="float-right"><?= anchor('bms/signup', '仮登録へ　>>'); ?></p>
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