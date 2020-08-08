<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>試合結果入力</title>
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
      $("#register").on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
        var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
        var postdata = {
          'team_id': $('[name="team_id"]').val(),
          'battleteam': $('[name="battleteam"]').val(),
          'score': $('[name="score"]').val(),
          'loss': $('[name="loss"]').val(),
          'consideration': $('[name="consideration"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/game/game_register",
          data: postdata,
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8',
          success: function(data) {
            if (data.error) {
              if (data.battleteam_error != '') {
                $('#battleteam_error').html(data.battleteam_error);
              } else {
                $('#battleteam_error').html('');
              }
              Swal.fire({
                icon: 'error',
                title: '試合結果登録出来ませんでした。',
                text: '入力内容をご確認下さい。',
              }).then((result) => {
                $("#register").prop('disabled', false);
              });
            }
            if (data.success) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '試合結果登録しました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/score/scores";
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
      <h1>試合結果</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">入力し登録してください</p>
        <div class="input-group mb-3">
          <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
          <input type="hidden" class="form-control" name="team_id" value="<?= $_SESSION['id'] ?>">
        </div>
        <div class="error">
          <strong><span id="battleteam_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="battleteam" placeholder="対戦相手">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="score">得点</label>
              <select name="score" class="form-control" style="width: 100%;">
                <?php for ($i = 0; $i < 20; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="loss">失点</label>
              <select name="loss" class="form-control" style="width: 100%;">
                <?php for ($i = 0; $i < 20; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="consideration">試合考察</label>
          <textarea name="consideration" id="consideration" cols="40" rows="15"></textarea>
        </div>
        <div class="row">
          <button id="register" type="submit" class="btn btn-primary btn-block">登録</button>
        </div>
        <br>
        <p><?= anchor('score/scores', '一覧に戻る　>>'); ?></p>
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