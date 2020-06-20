<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>スコア入力</title>
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
      $("#score").on('click', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
        var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
        var postdata = {
          'id': $('[name="id"]').val(),
          'atbat': $('[name="atbat"]').val(),
          'hit': $('[name="hit"]').val(),
          'homerun': $('[name="homerun"]').val(),
          'rbi': $('[name="rbi"]').val(),
          'steal': $('[name="steal"]').val(),
          'walk': $('[name="walk"]').val(),
          'sacrifice': $('[name="sacrifice"]').val(),
          'inning': $('[name="inning"]').val(),
          'h_hit': $('[name="h_hit"]').val(),
          'strikeout': $('[name="strikeout"]').val(),
          'h_homerun': $('[name="h_homerun"]').val(),
          'er': $('[name="er"]').val(),
          'h_walk': $('[name="h_walk"]').val()
        };
        postdata[csrf_name] = csrf_hash;
        $.ajax({
          type: "POST",
          url: "/score/update_score",
          data: postdata,
          crossDomain: false,
          dataType: "json",
          scriptCharset: 'utf-8'
        }).done(function(data) {
          Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'スコア入力OK!',
            showConfirmButton: false,
            timer: 1500
          }).then((result) => {
            window.location.href = "/score/scores";
          });
        }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'スコア入力NG',
            text: '入力内容をご確認下さい。',
          }).then((result) => {
            $("#score").prop('disabled', false);
          });
        });
        return false;
      });
    });
  </script>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <h1>スコア修正</h1>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <h5 class="text-center"><strong>下記から修正して下さい。</strong></h5>
        <div class="input-group mb-3">
          <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
          <input type="hidden" class="form-control" name="id" value="<?= $row_array['score_id'] ?>">
        </div>
        <div class="form-group text-center">
          <label>【野手スコア】</label>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>打席</label>
              <select name="atbat" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['atbat'] ?></option>
                <?php for ($i = 1; $i < 10; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>安打</label>
              <select name="hit" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['hit'] ?></option>
                <?php for ($i = 0; $i < 10; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>本塁打</label>
              <select name="homerun" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['homerun'] ?></option>
                <?php for ($i = 0; $i < 10; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>打点</label>
              <select name="rbi" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['rbi'] ?></option>
                <?php for ($i = 0; $i < 10; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>盗塁</label>
              <select name="steal" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['steal'] ?></option>
                <?php for ($i = 0; $i < 10; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>四死球</label>
              <select name="walk" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['walk'] ?></option>
                <?php for ($i = 0; $i < 10; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>犠打(犠飛)</label>
              <select name="sacrifice" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['sacrifice'] ?></option>
                <?php for ($i = 0; $i < 10; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="form-group text-center">
          <label>【投手スコア】</label>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>投球イニング</label>
              <select name="inning" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['inning'] ?></option>
                <?php $k = 0; ?>
                <?php for ($i = 0; $i < 10; $i++) { ?>
                  <?php for ($j = 0; $j < 3; $j++) { ?>
                    <option value=<?= $k ?>><?= $i . "回" . $j . "/ 3"; ?></option>
                    <?php $k++; ?>
                  <?php } ?>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>被安打</label>
              <select name="h_hit" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['h_hit'] ?></option>
                <?php for ($i = 0; $i < 20; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>奪三振</label>
              <select name="strikeout" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['strikeout'] ?></option>
                <?php for ($i = 0; $i < 20; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>被本塁打</label>
              <select name="h_homerun" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['h_homerun'] ?></option>
                <?php for ($i = 0; $i < 20; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>自責点</label>
              <select name="er" class="form-control select2" style="width: 100%;">
                <option><?= $row_array['er'] ?></option>
                <?php for ($i = 0; $i < 20; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
          <div class="col-6">
            <div class="form-group">
              <label>被四死球</label>
              <select name="h_walk" class="form-control select2" style="width: 100%;">
              <option><?= $row_array['h_walk'] ?></option>
                <?php for ($i = 0; $i < 20; $i++) { ?>
                  <option><?= $i; ?></option>
                <?php } ?>
              </select>
            </div><!-- /.form-group -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="container">
          <div class="row">
            <button id="score" type="submit" class="btn btn-primary btn-block">変更</button>
          </div>
          <br>
          <div class="row">
            <div class="col-6">
              <p class="float-left"><?= anchor('score/scores', 'スコア一覧へ　>>'); ?></p>
            </div><!-- /.col -->
            <div class="col-6">
              <p class="float-right"><?= anchor('main/players', '選手一覧へ　>>'); ?></p>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container -->
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