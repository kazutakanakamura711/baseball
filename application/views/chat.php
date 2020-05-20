  <?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1 class="m-0 text-dark">チャット</h1>
          </div><!-- /.col -->
          <div class="col-sm-2">
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
        <!-- Main row -->
        <div class="row">
          <div class="col-md-6">
            <div class="card card-info direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">チーム内チャット</h3>
                <div class="card-tools">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div><!-- /.card-tools -->
              </div><!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">工藤監督</span>
                      <span class="direct-chat-timestamp float-right">23 Mar 2:00 pm</span>
                    </div><!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="<?= base_url() ?>assets/images/pawapurokun1.jpg" alt="パワプロ君"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      今週土曜に練習試合を予定してます。
                    </div><!-- /.direct-chat-text -->
                  </div><!-- /.direct-chat-msg -->
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">和泉</span>
                      <span class="direct-chat-timestamp float-left">23 Mar 2:05 pm</span>
                    </div><!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="<?= base_url() ?>assets/images/sensyu1.jpg" alt="矢部君"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      了解です、参加します。
                    </div><!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">河崎</span>
                      <span class="direct-chat-timestamp float-left">23 Mar 5:37 pm</span>
                    </div><!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="<?= base_url() ?>assets/images/pawapurokun1.jpg" alt="パワプロ君"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      了解です、僕も行きます。
                    </div><!-- /.direct-chat-text -->
                  </div><!-- /.direct-chat-msg -->
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">櫻井</span>
                      <span class="direct-chat-timestamp float-left">23 Mar 6:10 pm</span>
                    </div><!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="<?= base_url() ?>assets/images/hakase.png" alt="ダイジョーブ博士"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      用事あるので欠席します。
                    </div><!-- /.direct-chat-text -->
                  </div><!-- /.direct-chat-msg -->
                </div><!--/.direct-chat-messages-->
                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user1-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user7-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg">I will be waiting for...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user3-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg">I'll call you back at...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user5-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg">Where is your new...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user6-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg">Can I take a look at...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user8-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                          <span class="contacts-list-msg">Never mind I found...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li><!-- /End Contact Item -->
                  </ul><!-- /.contacts-list -->
                </div><!-- /.direct-chat-pane -->
              </div><!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div><!-- /.card-footer-->
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-info direct-chat direct-chat-danger">
              <div class="card-header">
                <h3 class="card-title">個人チャット</h3>
                <div class="card-tools">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">河崎</span>
                      <span class="direct-chat-timestamp float-right">23 Mar 2:00 pm</span>
                    </div><!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="<?= base_url() ?>assets/images/pawapurokun1.jpg" alt="パワプロ君"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      今週末は試合ありますか？
                    </div><!-- /.direct-chat-text -->
                  </div><!-- /.direct-chat-msg -->
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">和泉</span>
                      <span class="direct-chat-timestamp float-left">23 Mar 2:05 pm</span>
                    </div><!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="<?= base_url() ?>assets/images/sensyu1.jpg" alt="矢部君"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      今週は試合はなくて、いつもの場所で練習だけですね。
                    </div><!-- /.direct-chat-text -->
                  </div><!-- /.direct-chat-msg -->
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">河崎</span>
                      <span class="direct-chat-timestamp float-right">23 Mar 5:37 pm</span>
                    </div><!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="<?= base_url() ?>assets/images/pawapurokun1.jpg" alt="パワプロ君"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      了解です、時間は何時からですか？
                    </div><!-- /.direct-chat-text -->
                  </div><!-- /.direct-chat-msg -->
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">和泉</span>
                      <span class="direct-chat-timestamp float-left">23 Mar 6:10 pm</span>
                    </div><!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="<?= base_url() ?>assets/images/sensyu1.jpg" alt="矢部君"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      9時ですね。
                    </div><!-- /.direct-chat-text -->
                  </div><!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->
                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user1-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user7-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg">I will be waiting for...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user3-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg">I'll call you back at...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user5-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg">Where is your new...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user6-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg">Can I take a look at...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/docs/3.0/assets/img/user8-128x128.jpg">
                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                          <span class="contacts-list-msg">Never mind I found...</span>
                        </div><!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul><!-- /.contacts-list -->
                </div><!-- /.direct-chat-pane -->
              </div><!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-danger">Send</button>
                    </span>
                  </div>
                </form>
              </div>
            </div><!-- /.card-footer-->
          </div>
          <!--/.direct-chat -->
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>