  <?php $this->load->view('common/svheader'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0 text-dark">問い合わせ一覧</h1>
        <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- contacts -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i>【未対応】</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-bordered table-striped table-head-fixed text-nowrap">
                  <thead>
                    <th>監督</th>
                    <th>メールアドレス</th>
                    <th>項目</th>
                    <th>内容</th>
                    <th>更新</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($message_array as $values) {
                      if ($values['delete_message'] === "0") { ?>
                        <tr>
                          <td><?= $values['name'] ?></td>
                          <td><?= $values['mail'] ?></td>
                          <td><?= $values['title'] ?></td>
                          <td><?= $values['message'] ?></td>
                          <td>
                            <button onclick="location.href='/manager/sv_mail?id=<?= $values['id'] ?>'" type="submit" class="btn-primary">返信 <i class="fas fa-users"></i></button>
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
    <section class="content">
      <div class="container-fluid">
        <!-- contacts -->
        <div class="row">
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i>【対応中】</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-bordered table-striped table-head-fixed text-nowrap">
                  <thead>
                    <th>監督</th>
                    <th>メールアドレス</th>
                    <th>項目</th>
                    <th>内容</th>
                    <th colspan="2">更新</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($message_array as $values) {
                      if ($values['delete_message'] === "1") { ?>
                        <tr>
                          <td><?= $values['name'] ?></td>
                          <td><?= $values['mail'] ?></td>
                          <td><?= $values['title'] ?></td>
                          <td><?= $values['message'] ?></td>
                          <td>
                            <button onclick="location.href='/manager/sv_mail?id=<?= $values['id'] ?>'" type="submit" class="btn-primary">返信 <i class="fas fa-users"></i></button>
                          </td>
                          <td>
                            <button name="delete_team" data-id="<?= $values['id'] ?>" data-name="<?= $values['name'] ?>" type="submit" class="btn-danger">削除 <i class="far fa-trash-alt"></i></button>
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
    <section class="content">
      <div class="container-fluid">
        <!-- contacts -->
        <div class="row">
          <div class="col-12">
            <div class="card card-danger collapsed-card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i>【対応済】</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-bordered table-striped table-head-fixed text-nowrap">
                  <thead>
                    <th>監督</th>
                    <th>メールアドレス</th>
                    <th>項目</th>
                    <th>内容</th>
                    <th>更新</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($message_array as $values) {
                      if ($values['delete_message'] === "2") { ?>
                        <tr>
                          <td><?= $values['name'] ?></td>
                          <td><?= $values['mail'] ?></td>
                          <td><?= $values['title'] ?></td>
                          <td><?= $values['message'] ?></td>
                          <td>
                            <button name="delete_team" data-id="<?= $values['id'] ?>" data-name="<?= $values['name'] ?>" type="submit" class="btn-danger">削除 <i class="far fa-trash-alt"></i></button>
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