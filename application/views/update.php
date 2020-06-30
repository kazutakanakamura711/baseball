<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>スコア入力・選手情報変更</title>
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
      $("#update").on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
        var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
        var postdata = {
          'id': $('[name="id"]').val(),
          'name': $('[name="name"]').val(),
          'tel': $('[name="tel"]').val(),
          'mail': $('[name="mail"]').val(),
          'birth': $('[name="birth"]').val(),
          'number': $('[name="number"]').val(),
          'turn': $('[name="turn"]').val(),
          'arm': $('[name="arm"]').val(),
          'position': $('[name="position"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/change/update_bms",
          data: postdata,
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8',
          success: function(data) {
            if (data.error) {
              if (data.name_error != '') {
                $('#name_error').html(data.name_error);
              } else {
                $('#name_error').html('');
              }
              if (data.tel_error != '') {
                $('#tel_error').html(data.tel_error);
              } else {
                $('#tel_error').html('');
              }
              if (data.mail_error != '') {
                $('#mail_error').html(data.mail_error);
              } else {
                $('#mail_error').html('');
              }
              Swal.fire({
                icon: 'error',
                title: '更新出来ませんでした。',
                text: '入力内容をご確認下さい。',
              }).then((result) => {
                $("#update").prop('disabled', false);
              });
            }
            if (data.success) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '更新しました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/main/players";
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
      <h1>選手情報変更</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">入力してください</p>
        <div class="input-group mb-3">
          <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
          <input type="hidden" class="form-control" name="id" value="<?= $row_array['pid'] ?>">
        </div>
        <div class="error">
          <strong><span id="name_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" value="<?= $row_array['name'] ?>">
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
          <input type="tel" class="form-control" name="tel" value="<?= $row_array['tel'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="error">
          <strong><span id="mail_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="mail" value="<?= $row_array['mail'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="birth">生年</label>
              <select name="birth" class="form-control" style="width: 100%;">
                <option><?= $row_array['birth'] ?></option>
                <?php for ($i = 1950; $i < 2010; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="turn">打順</label>
              <select name="turn" class="form-control" style="width: 100%;">
                <option><?= $row_array['turn'] ?></option>
                <option>H</option>
                <option>P</option>
                <?php for ($i = 1; $i < 10; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="number">背番号</label>
              <select name="number" class="form-control" style="width: 100%;">
                <option><?= $row_array['number'] ?></option>
                <?php for ($i = 0; $i < 100; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="arm">投/打</label>
              <select name="arm" class="form-control" style="width: 100%;">
                <option><?= $row_array['arm'] ?></option>
                <option>右投/右打</option>
                <option>右投/左打</option>
                <option>右投/両打</option>
                <option>左投/右打</option>
                <option>左投/左打</option>
                <option>左投/両打</option>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="position">守備</label>
              <select name="position" class="form-control" style="width: 100%;">
                <option><?= $row_array['position'] ?></option>
                <option>先発投手</option>
                <option>中継ぎ投手</option>
                <option>抑え投手</option>
                <option>捕手</option>
                <option>一塁手</option>
                <option>二塁手</option>
                <option>三塁手</option>
                <option>遊塁手</option>
                <option>外野手</option>
                <option>指名打者</option>
              </select>
            </div><!-- /.form-group -->
          </div>
        </div>
        <div class="container">
          <div class="row">
            <button id="update" type="submit" class="btn btn-primary btn-block">変更</button>
          </div>
          <br>
          <p><?= anchor('main/players', '一覧に戻る　>>'); ?></p>
        </div>
      </div><!-- /.form-box -->
    </div><!-- /.card -->
  </div><!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
</body>

</html>