<?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10 col-xs-6">
            <h1 class="m-0 text-dark">オーダー管理</h1>
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
        <h3>【スタメン表】</h3>
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-search"></i>【<?= $_SESSION['name'] ?>】</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            
          </div><!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary w-50 mt-2">保存する <i class="fas fa-search"></i></button>
                </div><!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-footer -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>