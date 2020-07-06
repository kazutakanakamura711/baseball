  <?php $this->load->view('common/svheader'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0 text-dark">お知らせ</h1>
        <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="register-box">
          <div class="register-logo">
            <h1>運営からお知らせ</h1>
          </div>
          <div class="card">
            <div class="card-body register-card-body">
              <p class="login-box-msg">下記に入力し、送信してください。</p>
              <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
              <div class="error">
                <strong><span id="title_error" class="text-danger"></span></strong>
              </div>
              <div class="input-group mb-3">
                <input type="hidden" class="form-control" name="title" placeholder="※ここに件名を入力してください">
              </div>
              <div class="error">
                <strong><span id="message_error" class="text-danger"></span></strong>
              </div>
              <div class="form-group mb-3">
                <textarea name="message" id="message" cols="42" rows="10" placeholder="※ここに内容を入力してください"></textarea>
              </div>
              <div class="row">
                <button id="news" type="submit" class="btn btn-primary btn-block">送信する</button>
              </div>
              <br>
              <p><?= anchor('manager/contacts', '一覧に戻る　>>'); ?></p>
            </div>
            <!-- /.form-box -->
          </div><!-- /.card -->
        </div>
        <!-- /.register-box -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>