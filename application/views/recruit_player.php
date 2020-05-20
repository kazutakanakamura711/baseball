  <?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10 col-xs-6">
            <h1 class="m-0 text-dark">選手募集</h1>
          </div><!-- /.col -->
          <div class="col-sm-2 col-xs-6">
            <?= form_open("main/logout"); ?>
            <button class="float-right btn-info" type="submit">ログアウト</button>
            <?= form_close(); ?>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h3>【愛媛県】</h3>
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-search"></i>【下記に入力し、募集をクリックしてください。】</h3>
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
                  <label>対戦チーム</label>
                  <input type="text" class="form-control" name="team" placeholder="対戦チーム入力して下さい。">
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary w-50 mt-2">募集する <i class="fas fa-search"></i></button>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-footer -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>