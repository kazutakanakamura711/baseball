<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url() ?>main/login" class="nav-link text-primary">ホーム<i class="fas fa-home"></i></a>
        <li class="nav-item d-none d-sm-inline-block">
        <a id="logout" href="<?= base_url() ?>main/logout" class="nav-link text-danger">ログアウト<i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <div class="float-center">　　<img src="<?= base_url() ?>assets/images/logo2.png" alt="MBC"></div>
      
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
            <li class="nav-header">baseball game</li>
            <li class="nav-item has-treeview">
              <a href="<?= base_url() ?>main/teams" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>試合マッチング</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>match/ground" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>グラウンド検索</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= base_url() ?>match/chat" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>チャット</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a href="<?= base_url() ?>match/recruit" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>選手募集</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>match/tactics" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>オーダー管理</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?= base_url() ?>match/game_result" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>試合結果登録</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li>
            <li class="nav-header">team management</li>
            <li class="nav-item has-treeview">
              <a href="<?= base_url() ?>main/players" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p>チーム・選手名鑑</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="<?= base_url() ?>score/scores" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p>スコア・試合一覧</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= base_url() ?>match/schedule" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p>チームスケジュール</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?= base_url() ?>match/rules" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p>管理人の野球コラム</p>
                <i class="right fas fa-angle-right"></i>
              </a>
            </li>
          </ul>
        </nav><!-- /.sidebar-menu -->
      </div><!-- /.sidebar -->
    </aside>