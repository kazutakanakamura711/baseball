  <?php $this->load->view('common/svheader'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0 text-dark">チーム一覧</h1>
        <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- team profile -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i>【登録チーム】</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-bordered table-striped table-head-fixed text-nowrap">
                  <thead>
                    <th>チーム名</th>
                    <th>監督</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                    <th>更新</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($team_array as $values) {
                      if ($values['withdrawal'] === "0") { ?>
                        <tr>
                          <td><?= $values['team'] ?></td>
                          <td><?= $values['skipper'] ?></td>
                          <td><?= $values['tel'] ?></td>
                          <td><?= $values['mail'] ?></td>
                          <td>
                            <button name="stop_team" data-id="<?= $values['id'] ?>" data-name="<?= $values['team'] ?>" type="submit" class="btn-danger">削除 <i class="far fa-trash-alt"></i></button>
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
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>