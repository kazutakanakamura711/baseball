  <?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10 col-xs-6">
            <h1 class="m-0 text-dark">チーム情報</h1>
          </div><!-- /.col -->
          <div class="col-sm-2 col-xs-6">
            <?= form_open("main/logout"); ?>
            <button class="float-right btn-info" type="submit">ログアウト <i class="fas fa-sign-out-alt"></i></button>
            <?= form_close(); ?>
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
            <h3 class="card-title"><i class="fas fa-baseball-ball"></i>【<?= $_SESSION['name'] ?>　プロフィール】</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <p><strong>チーム名：</strong><?= $_SESSION['name'] ?></p>
                  <p><strong>監督：</strong><?= $_SESSION['skipper'] ?></p>
                  <p><strong>電話番号：</strong><?= $_SESSION['tel'] ?></p>
                  <p><strong>メールアドレス：</strong><?= $_SESSION['mail'] ?></p>
                  <p><strong>チーム結成：</strong>2020年4月</p>
                  <p><strong>チームスローガン：</strong>とにかく楽しく</p>
                  <p><strong>チーム内選手：</strong>社会人多め</p>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <p><strong>選手平均年齢：</strong>35才</p>
                  <p><strong>選手野球経験：</strong>経験者5割弱(未経験者も多数在籍)</p>
                  <p><strong>活動方針：</strong>リアル優先でまったりと</p>
                  <p><strong>練習頻度：</strong>週2日(火曜・木曜)</p>
                  <p><strong>主な練習場所：</strong>垣生小学校・五色浜公園など</p>
                  <p><strong>年間試合数：</strong>約6試合</p>
                  <p><strong>監督から一言：</strong>結果にこだわらず、楽しく体を動かしましょう。</p>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary w-50 mt-2">プロフィール編集　<i class="fas fa-pencil-alt"></i></button>
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
                    <th>名前</th>
                    <th>生年</th>
                    <th>投/打</th>
                    <th>守備</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th colspan="3">更新</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($player_array as $values) {
                      if ($_SESSION['id'] === $values['team_id']) {
                        if ($values['flag'] === "0") { ?>
                          <tr>
                            <td><?= $values['id'] ?></td>
                            <td><?= $values['name'] ?></td>
                            <td><?= $values['year'] ?></td>
                            <td><?= $values['arm'] ?></td>
                            <td><?= $values['position'] ?></td>
                            <td><?= $values['tel'] ?></td>
                            <td><?= $values['mail'] ?></td>
                            <td>
                              <?= form_open("bms/score_update"); ?>
                              <input type="hidden" name="update_id" value="<?= $values['id'] ?>">
                              <button type="submit" class="btn-primary">スコア入力 <i class="fas fa-pencil-alt"></i></button>
                              <?= form_close(); ?>
                            </td>
                            <td>
                              <?= form_open("bms/update"); ?>
                              <input type="hidden" name="update_id" value="<?= $values['id'] ?>">
                              <button onclick="" type="submit" class="btn-success">編集 <i class="fas fa-pencil-alt"></i></button>
                              <?= form_close(); ?>
                            </td>
                            <td>
                              <button data-id="<?= $values['id'] ?>" type="submit" class="btn-danger">削除 <i class="far fa-trash-alt"></i></button>
                            </td>
                          </tr>
                        <?php  } ?>
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
            <h3 class="card-title"><i class="fas fa-baseball-ball"></i>【<?= $_SESSION['name'] ?>　選手登録】</h3>
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
                </div><!-- /.form-group -->
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group row">
                  <label for="year" class="col-3 col-form-label">生年：</label>
                  <div class="col-9">
                    <select name="year" class="form-control" style="width: 100%;">
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
                      <option>投手</option>
                      <option>捕手</option>
                      <option>内野手</option>
                      <option>外野手</option>
                      <option>指名打者</option>
                    </select>
                  </div>
                </div><!-- /.form-group -->
                <div class="form-group row">
                  <label for="order" class="col-3 col-form-label">打順：</label>
                  <div class="col-9">
                    <select name="order" class="form-control" style="width: 100%;">
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