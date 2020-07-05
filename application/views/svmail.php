<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>運営返信フォーム</title>
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
      $("#response").on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
        var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
        var postdata = {
          'id': $('[name="id"]').val(),
          'name': $('[name="name"]').val(),
          'mail': $('[name="mail"]').val(),
          'message': $('[name="message"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/support/response",
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
                $("#response").prop('disabled', false);
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
                window.location.href = "/manager/contacts";
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
      <h1>運営から返信</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">下記に入力し、返信してください。</p>
        <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
        <p class="text-group mb-3">氏名　 <span class="fas fa-user"></span> : <strong><?= $row_array['name'] ?></strong></p>
        <p class="text-group mb-3">メール <span class="fas fa-envelope"></span> : <strong><?= $row_array['mail'] ?></strong></p>
        <div class="input-group mb-3">
          <input type="hidden" class="form-control" name="id" value="<?= $row_array['id'] ?>">
          <input type="hidden" class="form-control" name="name" value="<?= $row_array['name'] ?>">
          <input type="hidden" class="form-control" name="mail" value="<?= $row_array['mail'] ?>">
        </div>
        <div class="error">
          <strong><span id="message_error" class="text-danger"></span></strong>
        </div>
        <div class="error">
          <strong><span id="message_error" class="text-danger"></span></strong>
        </div>
        <div class="form-group mb-3">
          <textarea name="message" id="message" cols="42" rows="10" placeholder="※ここに内容を入力してください"></textarea>
        </div>
        <div class="row">
          <button id="response" type="submit" class="btn btn-primary btn-block">送信する</button>
        </div>
        <br>
        <p><?= anchor('manager/teams', '一覧に戻る　>>'); ?></p>
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