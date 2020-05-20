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
        $.ajax({
          type: "POST",
          url: "/bms/register_validation",
          data: {
            'team_id': $('[name="team_id"]').val(),
            'name': $('[name="name"]').val(),
            'tel': $('[name="tel"]').val(),
            'mail': $('[name="mail"]').val(),
            'year': $('[name="year"]').val(),
            'arm': $('[name="arm"]').val(),
            'position': $('[name="position"]').val()
            //'order': $('[name="order"]').val()
          },
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8'
        }).done(function(data) {
          alert("選手登録OK!");
          window.location.href = "/main/players";
        }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
          alert("選手登録NG!");
          window.location.href = "/main/players";
        });
        return false;
      });
    });
    $(function() {
      $(".btn-danger").on('click', function(event) {
        event.preventDefault();
        $.ajax({
          type: "POST",
          url: "/bms/delete_bms",
          data: {
            'delete_id': $(this).data('id')
          },
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8'
        }).done(function(data) {
          alert("削除完了しました!");
          window.location.href = "/main/players";
        }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
          alert("削除出来ませんでした!");
        });
        return false;
      });
    });
  </script>
</head>
<?php $this->load->view('common/sidebar'); ?>