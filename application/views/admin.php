  <?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-6">
            <h1 class="m-0 text-dark">チーム情報</h1>
            <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
          </div><!-- /.col -->
          <div class="col-6">
            <button type="submit" onclick="location.href='/main/delete?id=<?= $_SESSION['id'] ?>'" class="float-right btn-danger">削除選手一覧</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- team profile -->
        <div class="card card-success collapsed-card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-baseball-ball"></i>【<?= $_SESSION['team'] ?>　プロフィール】</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <p><strong>チーム名：</strong><?= $player_array[0]['team'] ?></p>
                  <p><strong>監督：</strong><?= $_SESSION['skipper'] ?></p>
                  <p><strong>電話番号：</strong><?= $_SESSION['tel'] ?></p>
                  <p><strong>メールアドレス：</strong><?= $_SESSION['mail'] ?></p>
                  <p><strong>チームスローガン：</strong><?= $player_array[0]['slogan'] ?></p>
                  <p><strong>チーム結成：</strong><?= $player_array[0]['year'] ?></p>
                  <p><strong>選手層：</strong><?= $player_array[0]['job'] ?></p>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <p><strong>平均年齢：</strong>約<?= date("Y") - (round($age['sum(birth)'] / $count, 0)) ?>歳</p>
                  <p><strong>野球経験者：</strong><?= $player_array[0]['experience'] ?></p>
                  <p><strong>活動方針：</strong><?= $player_array[0]['policy'] ?></p>
                  <p><strong>練習頻度：</strong><?= $player_array[0]['practice'] ?></p>
                  <p><strong>年間試合数：</strong>約<?= $game ?>試合</p>
                  <p><strong>監督から一言：</strong><?= $player_array[0]['pr'] ?></p>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" onclick="location.href='/change/profile?id=<?= $_SESSION['id'] ?>'" class="btn btn-primary w-50 mt-2">プロフィール編集　<i class="fas fa-pencil-alt"></i></button>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-footer -->
        </div><!-- /.card -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i>【登録選手】</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-bordered table-striped table-head-fixed text-nowrap">
                  <thead>
                    <th>オーダー</th>
                    <th>背番号</th>
                    <th>名前</th>
                    <th>満年齢</th>
                    <th>投/打</th>
                    <th>守備</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th colspan="3">更新</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($player_array as $values) {
                        if ($values['delete_player'] === "0") { ?>
                          <tr>
                            <td><?= $values['turn'] ?></td>
                            <td><?= $values['number'] ?></td>
                            <td><?= $values['name'] ?></td>
                            <td><?= date("Y") - $values['birth'] ?></td>
                            <td><?= $values['arm'] ?></td>
                            <td><?= $values['position'] ?></td>
                            <td><?= $values['tel'] ?></td>
                            <td><?= $values['mail'] ?></td>
                            <td>
                              <button onclick="location.href='/score/score_signup?id=<?= $values['pid'] ?>'" type="submit" class="btn-primary">スコア入力 <i class="fas fa-pencil-alt"></i></button>
                            </td>
                            <td>
                              <button onclick="location.href='/change/update?id=<?= $values['pid'] ?>'" type="submit" class="btn-success">編集 <i class="fas fa-pencil-alt"></i></button>
                            </td>
                            <td>
                              <button name="delete_player" data-id="<?= $values['pid'] ?>" data-name="<?= $values['name'] ?>" type="submit" class="btn-danger">削除 <i class="far fa-trash-alt"></i></button>
                            </td>
                          </tr>
                        <?php  } ?>
                      <?php  } ?>
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="card card-primary ">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-baseball-ball"></i>【<?= $_SESSION['team'] ?>　選手登録】</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input type="hidden" class="form-control" name="team_id" placeholder="チーム番号" value="<?= $_SESSION['id'] ?>">
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="氏名">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="tel" class="form-control" name="tel" placeholder="電話番号">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" name="mail" placeholder="メールアドレス">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="number" class="col-3 col-form-label">背番号：</label>
                    <div class="col-9">
                      <select name="number" class="form-control" style="width: 100%;">
                        <?php for ($i = 0; $i < 100; $i++) { ?>
                          <option><?= $i; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div><!-- /.form-group -->
                </div><!-- /.form-group -->
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group row">
                  <label for="birth" class="col-3 col-form-label">生年：</label>
                  <div class="col-9">
                    <select name="birth" class="form-control" style="width: 100%;">
                      <?php for ($i = 1950; $i < 2010; $i++) { ?>
                        <option><?= $i; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div><!-- /.form-group -->
                <div class="form-group row">
                  <label for="arm" class="col-3 col-form-label">投/打：</label>
                  <div class="col-9">
                    <select name="arm" class="form-control" style="width: 100%;">
                      <option>右投/右打</option>
                      <option>右投/左打</option>
                      <option>右投/両打</option>
                      <option>左投/右打</option>
                      <option>左投/左打</option>
                      <option>左投/両打</option>
                    </select>
                  </div>
                </div><!-- /.form-group -->
                <div class="form-group row">
                  <label for="position" class="col-3 col-form-label">守備：</label>
                  <div class="col-9">
                    <select name="position" class="form-control" style="width: 100%;">
                      <option>先発投手</option>
                      <option>中継ぎ投手</option>
                      <option>抑え投手</option>
                      <option>捕手</option>
                      <option>一塁手</option>
                      <option>二塁手</option>
                      <option>三塁手</option>
                      <option>遊塁手</option>
                      <option>外野手</option>
                      <option>指名打者</option>
                    </select>
                  </div>
                </div><!-- /.form-group -->
                <div class="form-group row">
                  <label for="turn" class="col-3 col-form-label">打順：</label>
                  <div class="col-9">
                    <select name="turn" class="form-control" style="width: 100%;">
                      <option>H</option>
                      <option>P</option>
                      <?php for ($i = 1; $i < 10; $i++) { ?>
                        <option><?= $i; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <button id="register" type="submit" class="btn btn-primary w-50 mt-2">登録　<i class="fas fa-pencil-alt"></i></button>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-footer -->
        </div><!-- /.card -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>