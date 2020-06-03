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
            <button type="submit" onclick="location.href='/main/players'" class="float-right btn-primary">登録選手一覧</button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i>【削除選手】</h3>
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
                    <th colspan="2">更新</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($player_array as $values) {
                        if ($values['delete_player'] === "1") { ?>
                          <tr>
                            <td><?= $values['turn'] ?></td>
                            <td><?= $values['number'] ?></td>
                            <td><?= $values['name'] ?></td>
                            <td><?= $values['year'] ?></td>
                            <td><?= $values['arm'] ?></td>
                            <td><?= $values['position'] ?></td>
                            <td><?= $values['tel'] ?></td>
                            <td><?= $values['mail'] ?></td>
                            <td>
                              <button name="return" data-id="<?= $values['id'] ?>" data-name="<?= $values['name'] ?>" type="submit" class="btn-primary">再登録 <i class="fas fa-pencil-alt"></i></button>
                            </td>
                            <td>
                              <button name="real_delete" data-id="<?= $values['id'] ?>" data-name="<?= $values['name'] ?>" type="submit" class="btn-danger">データ削除 <i class="far fa-trash-alt"></i></button>
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