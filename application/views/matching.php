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
                      <th>日時</th>
                      <th>チーム名</th>
                      <th>監督</th>
                      <th colspan="3">チーム成績(攻)</th>
                      <th colspan="3">チーム成績(守)</th>
                      <th colspan="2">申し込み</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($teamscore_array as $values) {
                      if ($values['withdrawal'] === "0") {
                        if ($values['team_id'] !== $_SESSION['id']) { ?>
                          <tr>
                            <td><?= $values['count'] ?></td>
                            <td><?= $values['team'] ?></td>
                            <td><?= $values['skipper'] ?></td>
                            <td>打率：<?= number_format(round($values['sum(hit)'] / $values['sum(atbat)'], 3), 3) ?></td>
                            <td>本塁打：<?= $values['sum(homerun)'] ?></td>
                            <td>得点：<?= $values['sum(rbi)'] ?></td>
                            <td>防御率：<?= number_format(round($values['sum(er)'] * 27 / $values['sum(inning)'], 3), 3) ?></td>
                            <td>失点：<?= $values['sum(er)'] ?></td>
                            <td>奪三振：<?= $values['sum(strikeout)'] ?></td>
                            <td>
                              <button onclick="location.href='/match/game?id=<?= $values['team_id'] ?>'" id="button1" type="submit" class="btn-primary">試合申し込み <i class="fas fa-baseball-ball"></i></button>
                            </td>
                            <td>
                              <button onclick="location.href='/match/contact?id=<?= $values['team_id'] ?>'" id="button2" type="submit" class="btn-success">連絡する <i class="fas fa-envelope"></i></button>
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