<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>チームプロフィール変更</title>
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
          'team': $('[name="team"]').val(),
          'skipper': $('[name="skipper"]').val(),
          'tel': $('[name="tel"]').val(),
          'slogan': $('[name="slogan"]').val(),
          'policy': $('[name="policy"]').val(),
          'year': $('[name="year"]').val(),
          'job': $('[name="job"]').val(),
          'experience': $('[name="experience"]').val(),
          'practice': $('[name="practice"]').val(),
          'pr': $('[name="pr"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/change/update_profile",
          data: postdata,
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8',
          success: function(data) {
            if (data.error) {
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
              Swal.fire({
                icon: 'error',
                title: '編集NG!',
                text: '入力内容をご確認下さい。',
              }).then((result) => {
                $("#update").prop('disabled', false);
              });
            }
            if (data.success) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '編集OK!',
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
      <h1>チーム情報変更</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">変更箇所を入力してください</p>
        <div class="input-group mb-3">
          <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
          <input type="hidden" class="form-control" name="id" value="<?= $team_array['id'] ?>">
        </div>
        <div class="error">
          <strong><span id="team_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="team" placeholder="※チーム名" value="<?= $team_array['team'] ?>" required>
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
          <input type="text" class="form-control" name="skipper" placeholder="※監督名" value="<?= $team_array['skipper'] ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-baseball-ball"></span>
            </div>
          </div>
        </div>
        <div class="error">
          <strong><span id="tel_error" class="text-danger"></span></strong>
        </div>
        <div class="input-group mb-3">
          <input type="tel" class="form-control" name="tel" placeholder="※電話番号" value="<?= $team_array['tel'] ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="slogan" class="form-control" name="slogan" placeholder="スローガン" value="<?= $team_array['slogan'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="policy" class="form-control" name="policy" placeholder="活動方針" value="<?= $team_array['policy'] ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="year">チーム結成</label>
              <select name="year" class="form-control" style="width: 100%;">
                <option><?= $team_array['year'] ?></option>
                <?php for ($i = 1950; $i < 2020; $i++) { ?>
                  <option><?= $i; ?>年</option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="job">選手層</label>
              <select name="job" class="form-control" style="width: 100%;">
                <option><?= $team_array['job'] ?></option>
                <option>学生多め</option>
                <option>社会人多め</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="experience">野球経験者</label>
              <select name="experience" class="form-control" style="width: 100%;">
                <option><?= $team_array['experience'] ?></option>
                <?php for ($i = 1; $i < 10; $i++) { ?>
                  <option>約<?= $i; ?>割</option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="practice">練習頻度</label>
              <select name="practice" class="form-control" style="width: 100%;">
                <option><?= $team_array['practice'] ?></option>
                <?php for ($i = 1; $i < 8; $i++) { ?>
                  <option>週<?= $i; ?>日</option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="pr">その他PR</label>
          <textarea name="pr" id="pr" cols="42" rows="10"><?= $team_array['pr'] ?></textarea>
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