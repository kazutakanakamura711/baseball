<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>野球管理システム</title>
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
      $("#register").on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
        var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
        var postdata = {
          'team_id': $('[name="team_id"]').val(),
          'name': $('[name="name"]').val(),
          'tel': $('[name="tel"]').val(),
          'mail': $('[name="mail"]').val(),
          'birth': $('[name="birth"]').val(),
          'arm': $('[name="arm"]').val(),
          'position': $('[name="position"]').val(),
          'number': $('[name="number"]').val(),
          'turn': $('[name="turn"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/bms/register_validation",
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
                title: '選手登録出来ませんでした。',
                text: '入力内容をご確認下さい。',
              }).then((result) => {
                $("#register").prop('disabled', false);
              });
            }
            if (data.success) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '選手登録しました。',
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
    $(function() {
      $('[name="delete_player"]').on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        Swal.fire({
          title: '本当に削除してもいいですか?',
          text: '削除選手：' + $(this).data('name'),
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
              url: "/dust/delete_player",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '選手削除しました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/main/players";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: '選手削除出来ませんでした。',
              }).then((result) => {
                $('[name="delete_player"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="delete_player"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
    $(function() {
      $('[name="delete_score"]').on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        Swal.fire({
          title: '本当に削除してもいいですか?',
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
              'delete_id': $(this).data('id')
            };
            postdata[csrf_name] = csrf_hash;
            $.ajax({
              type: "POST",
              url: "/dust/delete_score",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'スコア削除しました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/score/scores";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: 'スコア削除出来ませんでした。',
              }).then((result) => {
                $('[name="delete_score"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="delete_score"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
    $(function() {
      $('[name="delete_game"]').on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        Swal.fire({
          title: '本当に削除してもいいですか?',
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
              'delete_id': $(this).data('id')
            };
            postdata[csrf_name] = csrf_hash;
            $.ajax({
              type: "POST",
              url: "/game/delete_game",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '試合削除しました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/score/scores";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: '試合削除出来ませんでした。',
              }).then((result) => {
                $('[name="delete_game"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="delete_game"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
    $(function() {
      $('[name="return"]').on('click', function(event) {
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
              url: "/dust/player_return",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '削除選手復帰しました。',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/main/players";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: '削除選手復帰出来ませんでした。',
              }).then((result) => {
                $('[name="return"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="return"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
    $(function() {
      $('[name="real_delete"]').on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        Swal.fire({
          title: '本当にデータ削除してもいいですか?',
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
              url: "/dust/delete_real",
              data: postdata,
              crossDomain: false,
              dataType: "json",
              scriptCharset: 'utf-8'
            }).done(function(data) {
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: '選手削除OK!',
                showConfirmButton: false,
                timer: 1500
              }).then((result) => {
                window.location.href = "/main/delete";
              });
            }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: '削除出来ませんでした!',
              }).then((result) => {
                $('[name="real_delete"]').prop('disabled', false);
              });
            });
          } else {
            $('[name="real_delete"]').prop('disabled', false);
          }
        });
        return false;
      });
    });
  </script>
</head>
<?php $this->load->view('common/sidebar'); ?>