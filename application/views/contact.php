<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>対戦連絡</title>
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
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <h1>連絡フォーム</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">下記に入力し、申し込んでください。</p>
        <?= form_open("email/index"); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="battle_team" placeholder="チーム名" value="<?= $row_array['team_name'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-baseball-ball"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="battle_skipper" placeholder="監督名" value="<?= $row_array['skipper'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="hidden" class="form-control" name="battle_mail" placeholder="メールアドレス" value="<?= $row_array['mail'] ?>">
        </div>
        <div class="input-group">
          <input type="hidden" class="form-control" name="team" placeholder="店番" value="<?= $_SESSION['name'] ?>">
        </div>
        <div class="input-group">
          <input type="hidden" class="form-control" name="skipper" placeholder="監督名" value="<?= $_SESSION['skipper'] ?>">
        </div>
        <div class="input-group">
          <input type="hidden" class="form-control" name="mail" placeholder="店番" value="<?= $_SESSION['mail'] ?>">
        </div>
        <div class="form-group mb-3">
          <textarea name="message" id="message" cols="42" rows="10"></textarea>
        </div>
        <div class="row">
          <button type="submit" class="btn btn-primary btn-block">送信する</button>
        </div>
        <br>
        <?= form_close(); ?>
        <p><?= anchor('main/teams', '一覧に戻る　>>'); ?></p>
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