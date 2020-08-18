<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MBCユーザーガイド</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="<?= base_url() ?>assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
  <!-- header style -->
  <link href="<?= base_url() ?>dist/css/user_header.css" rel="stylesheet" >
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
    <!-- headerボタン -->
    <div class="header_userguide">
      <div class="button_userguide">
        <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>main/index" class="nav-link text-primary">ホーム<i class="fas fa-home"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>form/signup" class="nav-link text-success">新規登録<i class="fas fa-sign-out-alt"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a id="logout" href="<?= base_url() ?>main/login" class="nav-link text-secondary">ログイン<i class="fas fa-check"></i></a>
        </li>
      </div>
      <h2>ユーザーガイド一覧</h2>
    </div>
        <section class="content">
        <div class="container-fluid">
                <!-- タブ型ナビゲーション -->
        <div class="nav nav-tabs" id="tab-menu1" role="tablist">
                    <!-- タブ01 -->
                    <a class="nav-item nav-link active" id="tab-menu01" data-toggle="tab" href="#panel-menu01" role="tab" aria-controls="panel-menu01" aria-selected="true">新規登録とログイン</a>
          <!-- タブ02 -->
          <a class="nav-item nav-link" id="tab-menu02" data-toggle="tab" href="#panel-menu02" role="tab" aria-controls="panel-menu02" aria-selected="false">選手登録</a>
          <!-- タブ03 -->
          <a class="nav-item nav-link" id="tab-menu03" data-toggle="tab" href="#panel-menu03" role="tab" aria-controls="panel-menu03" aria-selected="false">スコア入力</a>
          <!-- タブ04 -->
          <a class="nav-item nav-link" id="tab-menu04" data-toggle="tab" href="#panel-menu04" role="tab" aria-controls="panel-menu04" aria-selected="false">試合マッチング</a>
          <!-- タブ05 -->
          <a class="nav-item nav-link" id="tab-menu05" data-toggle="tab" href="#panel-menu05" role="tab" aria-controls="panel-menu05" aria-selected="false">試合結果</a>
          <!-- タブ06 -->
          <a class="nav-item nav-link" id="tab-menu06" data-toggle="tab" href="#panel-menu06" role="tab" aria-controls="panel-menu06" aria-selected="false">メールアドレス変更</a>
          <!-- タブ07 -->
          <a class="nav-item nav-link" id="tab-menu06" data-toggle="tab" href="#panel-menu07" role="tab" aria-controls="panel-menu07" aria-selected="false">パスワード変更</a>
        </div>
        <!-- /タブ型ナビゲーション -->
        <!-- パネル -->
        <div class="tab-content" id="panel-menu1">
            <!-- パネル01 -->
          <div class="tab-pane fade show active border border-top-0" id="panel-menu01" role="tabpanel" aria-labelledby="tab-menu01">
            <div class="row p-3">
                <h3>【新規登録からログインまで】</h3>
                <div class="col-md-8 order-md-2">
              </div><!-- /.col -->
              <div class="col-md-12">
                <img src="<?= base_url() ?>assets/images/sign_up.png" alt="新規チーム登録" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/team_entry.png" alt="チーム本登録" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/login.png" alt="ログイン画面" class="img-fluid">
                <div class="w-100"></div>
                <br>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル02 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu02" role="tabpanel" aria-labelledby="tab-menu02">
              <div class="row p-3">
                <h3>【選手登録について】</h3>
                <div class="col-md-8 order-md-2">
                    </div><!-- /.col -->
                    <div class="col-md-12">
                        <img src="<?= base_url() ?>assets/images/player_register_first.png" alt="ホームページ画面" class="img-fluid">
                        <div class="w-100"></div>
                        <br>
                        <img src="<?= base_url() ?>assets/images/player_register_second.png" alt="選手登録" class="img-fluid">
                        <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/player_register_infomation.png" alt="試合結果(結果・削除)" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/delete_player.png" alt="選手削除" class="img-fluid">
                <div class="w-100"></div>
                <br>
            </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル03 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu03" role="tabpanel" aria-labelledby="tab-menu03">
              <div class="row p-3">
                <h3>【選手スコア登録について】</h3>
              <div class="col-md-8 order-md-2">
                </div><!-- /.col -->
              <div class="col-md-12">
                <img src="<?= base_url() ?>assets/images/score_firstpage.png" alt="チーム情報ページ" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/score_batter.png" alt="打者スコア入力" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/pitcher_score.png" alt="投手スコア入力" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/score_first.png" alt="スコアボード画面" class="img-fluid">
                <div class="w-100"></div>
                <br>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル04 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu04" role="tabpanel" aria-labelledby="tab-menu04">
              <div class="row p-3">
                <h3>【試合マッチング機能】</h3>
                <div class="col-md-8 order-md-2">
                    </div><!-- /.row -->
                    <div class="col-md-12">
                        <img src="<?= base_url() ?>assets/images/game_matching_first.png" alt="試合マッチング" class="img-fluid">
                        <div class="w-100"></div>
                        <br>
                        <img src="<?= base_url() ?>assets/images/game_matiching_message.png" alt="試合申し込み" class="img-fluid">
                        <div class="w-100"></div>
                        <br>
                        <img src="<?= base_url() ?>assets/images/game_matching_mail1.png" alt="試合申し込みメール" class="img-fluid">
                        <div class="w-100"></div>
                        <br>
                        <img src="<?= base_url() ?>assets/images/game_matching_form.png" alt="連絡フォーム" class="img-fluid">
                        <div class="w-100"></div>
                        <br>
                    </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル05 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu05" role="tabpanel" aria-labelledby="tab-menu05">
              <div class="row p-3">
                  <h3>【試合結果登録について】</h3>
              <div class="col-md-8 order-md-2">
                  </div><!-- /.col -->
                  <div class="col-md-12">
                      <img src="<?= base_url() ?>assets/images/game_result1.png" alt="試合結果登録1" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/game_result(2).png" alt="試合結果登録2" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/game_result_second.png" alt="試合結果登録3" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/game_result_deleat.png" alt="試合結果登録4" class="img-fluid">
                <div class="w-100"></div>
                <br>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          
          <div class="tab-pane fade border border-top-0" id="panel-menu06" role="tabpanel" aria-labelledby="tab-menu06">
              <div class="row p-3">
                <h3>【メールアドレス変更】</h3>
                <div class="col-md-8 order-md-2">
              </div><!-- /.col -->
              <div class="col-md-12">
                <img src="<?= base_url() ?>assets/images/mail_change_first.png" alt="メールアドレス変更" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/mail_change_second.png" alt="変更先メールアドレス登録" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/mail_change_mail.png" alt="メールアドレス仮登録" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/mail_change_final.png" alt="メールアドレス変更完了" class="img-fluid">
                <div class="w-100"></div>
                <br>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
          <div class="tab-pane fade border border-top-0" id="panel-menu07" role="tabpanel" aria-labelledby="tab-menu07">
              <div class="row p-3">
                <h3>【パスワード変更】</h3>
                <div class="col-md-8 order-md-2">
                    </div><!-- /.col -->
                    <div class="col-md-12">
                        <img src="<?= base_url() ?>assets/images/password_forget (2).png" alt="パスワード変更1" class="img-fluid">
                        <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/password_change (2).png" alt="パスワード変更2" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/password_change_mail.png" alt="パスワード変更3" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <img src="<?= base_url() ?>assets/images/password_change1 (2).png" alt="パスワード変更4" class="img-fluid">
                <div class="w-100"></div>
                <br>
              </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        
    </div><!-- /.tab-content -->
</div><!-- /.container-fluid -->
</div>
</section><!-- /.content -->
</body>
<?php $this->load->view('common/footer'); ?>
  <!-- jQuery -->
  <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>

</body>

</html>