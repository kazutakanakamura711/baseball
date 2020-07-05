<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>運営お問い合わせ</title>
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
      $("#contact").on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
        var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
        var postdata = {
          'team_id': $('[name="team_id"]').val(),
          'name': $('[name="name"]').val(),
          'mail': $('[name="mail"]').val(),
          'title': $('[name="title"]').val(),
          'message': $('[name="message"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/support/contacts",
          data: postdata,
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8',
          success: function(data) {
            if (data.error) {
              if (data.message_error != '') {
                $('#message_error').html(data.message_error);
              } else {
                $('#message_error').html('');
              }
              Swal.fire({
                icon: 'error',
                title: 'メール送信出来ませんでした。',
                text: '入力内容をご確認下さい。',
              }).then((result) => {
                $("#contact").prop('disabled', false);
              });
            }
            if (data.success) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'メール送信しました。',
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
      <h1>お問い合わせ</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">下記に入力し、送信してください。</p>
        <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
        <div class="input-group">
          <input type="hidden" class="form-control" name="team_id" placeholder="店番" value="<?= $_SESSION['id'] ?>">
        </div>
        <div class="input-group">
          <input type="hidden" class="form-control" name="name" placeholder="監督名" value="<?= $_SESSION['skipper'] ?>">
        </div>
        <div class="input-group">
          <input type="hidden" class="form-control" name="mail" placeholder="店番" value="<?= $_SESSION['mail'] ?>">
        </div>
        <div class="error">
          <strong><span id="message_error" class="text-danger"></span></strong>
        </div>
        <div class="form-group row">
          <label for="title" class="col-3 col-form-label">項目：</label>
          <div class="col-9">
            <select name="title" class="form-control" style="width: 100%;">
              <option>不具合報告</option>
              <option>悪質チーム通報</option>
              <option>ご意見・要望</option>
              <option>その他</option>
            </select>
          </div>
        </div><!-- /.form-group -->
        <div class="error">
          <strong><span id="message_error" class="text-danger"></span></strong>
        </div>
        <div class="form-group mb-3">
          <textarea name="message" id="message" cols="42" rows="10" placeholder="※ここに内容を入力してください"></textarea>
        </div>
        <div class="row">
          <button id="contact" type="submit" class="btn btn-primary btn-block">送信する</button>
        </div>
        <br>
        <p><?= anchor('main/players', '一覧に戻る　>>'); ?></p>
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