  <?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h1 class="m-0 text-dark">対戦チーム一覧</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h3>【愛媛県】</h3>
        <!-- SELECT2 EXAMPLE -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">登録チーム一覧</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                    <div class="input-group-append">
                      <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                    </div><!-- /.input-group-append -->
                  </div><!-- /.input-group input-group-sm -->
                </div><!-- /.card-tools -->
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>チーム名</th>
                      <th>監督</th>
                      <th>選手層</th>
                      <th>野球経験</th>
                      <th>練習頻度</th>
                      <th colspan="3">申し込み</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($team_array as $values) {
                      if ($values['withdrawal'] == "0") {
                        if ($values['id'] != $_SESSION['id']) { ?>
                          <tr>
                            <td><?= $values['team'] ?></td>
                            <td><?= $values['skipper'] ?></td>
                            <td><?= $values['job'] ?></td>
                            <td><?= $values['experience'] ?></td>
                            <td><?= $values['practice'] ?></td>
                            <td>
                              <button onclick="location.href='/match/game?id=<?= $values['id'] ?>'" id="button1" type="submit" class="btn-primary">試合申し込み <i class="fas fa-baseball-ball"></i></button>
                            </td>
                            <td>
                              <button onclick="location.href='/match/contact?id=<?= $values['id'] ?>'" id="button2" type="submit" class="btn-info">連絡する <i class="fas fa-envelope"></i></button>
                            </td>
                            <td>
                              <button onclick="location.href='/match/team_details?id=<?= $values['id'] ?>'" id="button3" type="submit" class="btn-success">スコア詳細 <i class="fas fa-pencil-alt"></i></button>
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
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>