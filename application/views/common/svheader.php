<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MBC運営</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!--    Favicons-->
  <!--    =============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/images/favicons/fabicon1.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/images/favicons/favicon32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/favicons/favicon16.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/favicons/fabicon1.ico">
  <link rel="manifest" href="<?= base_url() ?>assets/images/favicons/manifest.json">
  <link rel="mask-icon" href="<?= base_url() ?>assets/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileImage" content="<?= base_url() ?>assets/images/favicons/fabicon1.png">
  <meta name="theme-color" content="#ffffff">
  <!--  -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    $(function() {
      $('[name="stop_team"]').on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        Swal.fire({
          title: '本当に利用停止してもいいですか?',
          text: '利用停止チーム：' + $(this).data('name'),
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'はい!',
          cancelButtonText: 'いいえ！',
        }).then((result) => {
          if (result.value) { //はい！の場合
            var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
            var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
            var postdata = {
              'stop_id': $(this).data('id')
            };
            postdata[csrf_name] = csrf_hash;
            $.ajax({
              type: "POST",
              url: "/dust/stop_team",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'チーム利用停止しました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/manager/teams";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: 'チーム利用停止出来ませんでした。',
              }).then((result) => {
                $('[name="stop_team"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="stop_team"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
    $(function() {
      $('[name="return_team"]').on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        Swal.fire({
          title: '本当に復帰してもいいですか?',
          text: $(this).data('name'),
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'はい!',
          cancelButtonText: 'いいえ！',
        }).then((result) => {
          if (result.value) { //はい！の場合
            var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
            var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
            var postdata = {
              'return_id': $(this).data('id')
            };
            postdata[csrf_name] = csrf_hash;
            $.ajax({
              type: "POST",
              url: "/dust/team_return",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '削除チーム復帰しました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/dust/stop_teams";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: '削除チーム復帰出来ませんでした。',
              }).then((result) => {
                $('[name="return_team"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="return_team"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
    $(function() {
      $('[name="delete_team"]').on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        Swal.fire({
          title: '本当にデータから削除してもいいですか?',
          text: $(this).data('name') + 'は復帰出来なくなります',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'はい!',
          cancelButtonText: 'いいえ！',
        }).then((result) => {
          if (result.value) { //はい！の場合
            var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
            var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
            var postdata = {
              'delete_id': $(this).data('id')
            };
            postdata[csrf_name] = csrf_hash;
            $.ajax({
              type: "POST",
              url: "/dust/delete_team",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'チーム削除OK!',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/dust/stop_teams";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: 'チーム削除出来ませんでした!',
              }).then((result) => {
                $('[name="delete_team"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="delete_team"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
    $(function() {
      $('[name="end_message"]').on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        Swal.fire({
          title: '本当に対応済ですか?',
          text: '一度処理すると戻れません。',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'はい!',
          cancelButtonText: 'いいえ！',
        }).then((result) => {
          if (result.value) { //はい！の場合
            var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
            var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
            var postdata = {
              'end_id': $(this).data('id')
            };
            postdata[csrf_name] = csrf_hash;
            $.ajax({
              type: "POST",
              url: "/dust/end_message",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '対応済にしました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/manager/contacts";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: '対応済に出来ませんでした。',
              }).then((result) => {
                $('[name="end_message"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="end_message"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
    $(function() {
      $('[name="delete_message"]').on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        Swal.fire({
          title: '本当に削除してもいいですか?',
          text: 'データ消去するので処理すると二度と表示出来ません。',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'はい!',
          cancelButtonText: 'いいえ！',
        }).then((result) => {
          if (result.value) { //はい！の場合
            var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
            var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
            var postdata = {
              'delete_id': $(this).data('id')
            };
            postdata[csrf_name] = csrf_hash;
            $.ajax({
              type: "POST",
              url: "/dust/delete_message",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '削除しました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/manager/contacts";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: '削除出来ませんでした。',
              }).then((result) => {
                $('[name="end_message"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="end_message"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
    $(function() {
      $("#news").on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
        var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
        var postdata = {
          'title': $('[name="title"]').val(),
          'message': $('[name="message"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/manager/news",
          data: postdata,
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8',
          success: function(data) {
            if (data.error) {
              if (data.title_error != '') {
                $('#title_error').html(data.title_error);
              } else {
                $('#title_error').html('');
              }
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
                window.location.href = "/manager/teams";
              });
            }
          }
        });
        return false;
      });
    });
  </script>
</head>
<?php $this->load->view('common/svsidebar'); ?>