  <?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h1 class="m-0 text-dark">対戦チーム募集</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h3>【愛媛県】</h3>
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-info collapsed-card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-search"></i>【対戦チーム条件絞り込み】</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>エリア</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">松山市</option>
                    <option>伊予市</option>
                    <option>東温市</option>
                    <option>砥部町</option>
                    <option>今治市</option>
                    <option>西条市</option>
                    <option>新居浜市</option>
                    <option>宇和島市</option>
                  </select>
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>グラウンド</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">坊っちゃんスタジアム</option>
                    <option>マドンナスタジアム</option>
                    <option>県立総合運動公園</option>
                    <option>しおさい公園</option>
                    <option>ウェルピア伊予</option>
                    <option>五色浜公園</option>
                    <option>ゆとり公園</option>
                    <option>文化の森公園</option>
                    <option>東温市総合公園</option>
                    <option>松前公園</option>
                  </select>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>試合形式</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">5回裏まで</option>
                    <option>6回裏まで</option>
                    <option>7回裏まで</option>
                    <option>8回裏まで</option>
                    <option>9回裏まで</option>
                  </select>
                </div><!-- /.form-group -->
                <div class="form-group">
                  <label>チームランク(複数選択可)</label>
                  <div class="form-inline">
                    <label class="checkbox-inline"><input type="checkbox">Aランク　</label>
                    <label class="checkbox-inline"><input type="checkbox">Bランク　</label>
                    <label class="checkbox-inline"><input type="checkbox">Cランク　</label>
                  </div><!-- /.form-inline -->
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary w-50 mt-2">検索する <i class="fas fa-search"></i></button>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-footer -->
        </div><!-- /.card -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">登録チーム一覧</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div><!-- /.input-group-append -->
                  </div><!-- /.input-group input-group-sm -->
                </div><!-- /.card-tools -->
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>年間試合数</th>
                      <th>チーム名</th>
                      <th>監督</th>
                      <th>チーム成績(攻)</th>
                      <th>チーム成績(守)</th>
                      <th colspan="2">申し込み</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($team_array as $values) {
                      if ($values['withdrawal'] === "0") {
                        if ($values['id'] !== $_SESSION['id']) { ?>
                          <tr>
                            <td></td>
                            <td><?= $values['team'] ?></td>
                            <td><?= $values['skipper'] ?></td>
                            <td></td>
                            <td></td>
                            <td>
                              <button onclick="location.href='/match/game?id=<?= $values['id'] ?>'" id="button1" type="submit" class="btn-primary">試合申し込み <i class="fas fa-baseball-ball"></i></button>
                            </td>
                            <td>
                              <button onclick="location.href='/match/contact?id=<?= $values['id'] ?>'" id="button2" type="submit" class="btn-success">連絡する <i class="fas fa-envelope"></i></button>
                            </td>
                          </tr>
                        <?php  } ?>
                      <?php  } ?>
                    <?php  } ?>
                    <tr>
                      <td>A</td>
                      <td>techis-A</td>
                      <td>植松</td>
                      <td>打率：.300 , 本塁打：30本 , 得点：70点 </td>
                      <td>防御率：2.20 , 奪三振：40個 , </td>
                      <td>
                        <?= form_open("#"); ?>
                        <input type="hidden" name="update_id" value="">
                        <button id="button1" type="submit" class="btn-primary">試合申し込み <i class="fas fa-baseball-ball"></i></button>
                        <?= form_close(); ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>