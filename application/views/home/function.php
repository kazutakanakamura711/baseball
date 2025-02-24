<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  -->
    <!--    Document Title-->
    <!-- =============================================-->
    <title>【MBC】愛媛初!野球管理システム</title>
    <meta name="description" content="野球の試合マッチングやスコア成績一括管理が可能。他チームとの交流システムによるコミュニティーをサポートします。">
    <!--  -->
    <!--    Favicons-->
    <!--    =============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/images/favicons/fabicon1.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/images/favicons/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/favicons/favicon16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/favicons/fabicon1.ico">
    <link rel="manifest" href="<?= base_url() ?>assets/images/favicons/manifest.json">
    <link rel="mask-icon" href="<?= base_url() ?>assets/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>assets/images/favicons/fabicon1.png">
    <meta name="theme-color" content="#ffffff">
    <!--  -->
    <!--    Stylesheets-->
    <!--    =============================================-->
    <!-- Default stylesheets-->
    <link href="<?= base_url() ?>assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="<?= base_url() ?>assets/lib/loaders.css/loaders.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/iconsmind/iconsmind.css" rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/hamburgers/dist/hamburgers.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/remodal/dist/remodal.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/remodal/dist/remodal-default-theme.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/lightbox2/dist/css/lightbox.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body data-spy="scroll" data-target=".inner-link" data-offset="60">
    <main>
        <section class="background-primary py-3 d-none d-sm-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
                        <img src="<?= base_url() ?>assets/images/logo2.png" alt="MBC">
                        <a class="ml-2 mb-0 fs--1 d-inline color-white fw-700" href="<?= base_url() ?>main/index"></a>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </section>
        <div class="znav-white znav-container sticky-top navbar-elixir" id="znav-container">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="hamburger hamburger--emphatic">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav fs-0 fw-700">
                            <li>
                                <a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700" href="#about">MBCとは</a>
                            </li>
                            <li>
                                <a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700" href="#profile">MBCで出来ること</a>
                            </li>
                            <li>
                                <a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700" href="#team">チーム使用例</a>
                            </li>
                            <li>
                                <a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700" href="#question">よくある質問</a>
                            </li>
                            <li>
                                <a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700" href="#news">お知らせ</a>
                            </li>
                            <li>
                                <a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700" href="#contact">お問い合わせ</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-lg-auto">
                            <li>
                                <a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700" href="<?= base_url() ?>main/login" target="_blank">ログイン</a>
                            </li>
                            <li>
                                <a class="btn btn-outline-primary btn-capsule btn-sm border-2x fw-700" href="<?= base_url() ?>form/signup" target="_blank">新規登録</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="flexslider flexslider-simple h-full loading">
            <ul class="slides">
                <li data-zanim-timeline="{}">
                    <section class="py-0">
                        <div>
                            <div class="background-holder elixir-zanimm-scale" style="background-image:url(<?= base_url('assets/images/stadium.png'); ?>);" data-zanimm='{"from":{"opacity":0.1,"filter":"blur(10px)","scale":1.05},"to":{"opacity":1,"filter":"blur(0px)","scale":1}}'>
                            </div>
                            <!--/.background-holder-->
                            <div class="container" style="font-size: 2.7rem;">
                                <div class="row h-full py-8 align-items-center" data-inertia='{"weight":1.5}'>
                                    <div class="col-sm-12 col-lg-12 px-5 px-sm-3">
                                        <div class="overflow-hidden">
                                            <h1 class="fs-4 fs-md-5 zopacity" data-zanim='{"delay":0}'>
                                                やきゅう<br class="d-inline d-sm-none">しようよ！</h1>
                                        </div>
                                        <div class="overflow-hidden">
                                            <div class="readmore" data-zanim='{"delay":0.2}'>
                                                <a class="btn btn-primary mr-3 mt-3" href="#about">READ MORE
                                                    <span class="fa fa-chevron-down ml-2"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.row-->
                        </div>
                        <!--/.container-->
                    </section>
                </li>
            </ul>
        </div>
        <section id="about" class="background-white  text-center">
            <div class="container" style="line-height: 2.25;">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-6">
                        <h3 class="color-primary fs-2 fs-lg-3">MBCとは</h3>
                        <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll">
                    </div>
                </div>
                <div class="row mt-4 mt-md-5">
                    <div class="col-sm-12 col-lg-12 mt-4" data-zanim-timeline='{"delay":0.1}' data-zanim-trigger="scroll">
                        <div class="col-md-12 text-center"><img src="<?= base_url() ?>assets/images/kantoku.png" class="img-responsive">
                        </div>
                        <h5 class="mt-4" data-zanim='{"delay":0.1}' style="font-size: 2.3rem;">
                            「こんなのあったらいいな」が叶う野球チーム管理システム</h5>
                        <p class="mb-0 mt-3 px-3 " data-zanim='{"delay":0.2}' style="font-size: 1.1rem">
                            熱闘の記憶、仲間との思い出、チームの全てを好きなだけ記録し管理できるチームマネジメントツール。<br>マッチングシステムにより、気軽に試合が出来る。<br>チーム間のコミュニティーを可能にする交流システム。
                        </p>
                        <div class="overflow-hidden">
                            <div class="zopacity" data-zanim='{"delay":0.2}'>
                                <a class="btn btn-primary mr-3 mt-3" href="#profile">READ MORE
                                    <span class="fa fa-chevron-down ml-2"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </section>
        <section id="profile" class="background-11">
            <div class="container">
                <h3 class="text-center fs-2 fs-md-3">MBCで出来ること</h3>
                <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
                <div class="row no-gutters pos-relative mt-6">
                    <div class="elixir-caret d-none d-lg-block"></div>
                    <div class="col-lg-6 py-3 py-lg-0 mb-0" style="min-height:400px;">
                        <div class="background-holder radius-tl-secondary radius-tr-secondary radius-tr-lg-0" style="background-image:url(<?= base_url('assets/images/yakyu1.png') ?>);"> </div>
                        <!--/.background-holder-->
                    </div>
                    <div class="col-lg-6 px-lg-5 py-lg-6 p-4 my-lg-0 background-white radius-bl-secondary radius-bl-lg-0 radius-br-secondary radius-br-lg-0 radius-tr-lg-secondary">
                        <div class="d-flex align-items-center h-100">
                            <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <h5 data-zanim='{"delay":0}'>マッチングによる試合設定が簡単に出来る。</h5>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim='{"delay":0.1}'>
                                        他チームとの試合マッチングやグラウンド検索機能により、気軽に試合をセッティングすることが可能です。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters pos-relative mt-4 mt-lg-0">
                    <div class="elixir-caret d-none d-lg-block"></div>
                    <div class="col-lg-6 py-3 py-lg-0 mb-0 order-lg-2" style="min-height:400px;">
                        <div class="background-holder radius-tl-secondary radius-tl-lg-0 radius-tr-secondary radius-tr-lg-0" style="background-image:url(<?= base_url('assets/images/yakyu2.jpg') ?>);"> </div>
                        <!--/.background-holder-->
                    </div>
                    <div class="col-lg-6 px-lg-5 py-lg-6 p-4 my-lg-0 background-white radius-bl-secondary radius-bl-lg-0 radius-br-secondary radius-br-lg-0">
                        <div class="d-flex align-items-center h-100">
                            <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <h5 data-zanim='{"delay":0}'>試合結果・成績の管理</h5>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim='{"delay":0.1}'>
                                        選手名鑑を作成し成績を登録するとチーム・個人成績管理がすぐにできます。それぞれチームに応じた成績管理が可能です。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters pos-relative mt-4 mt-lg-0">
                    <div class="elixir-caret d-none d-lg-block"></div>
                    <div class="col-lg-6 py-3 py-lg-0 mb-0" style="min-height:400px;">
                        <div class="background-holder radius-tl-secondary radius-tr-secondary radius-tr-lg-0 radius-tl-lg-0 radius-bl-0 radius-bl-lg-secondary" style="background-image:url(<?= base_url('assets/images/yakyu3.jpg') ?>);"> </div>
                        <!--/.background-holder-->
                    </div>
                    <div class="col-lg-6 px-lg-5 py-lg-6 p-4 my-lg-0 background-white radius-bl-secondary radius-bl-lg-0 radius-br-secondary">
                        <div class="d-flex align-items-center h-100">
                            <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="overflow-hidden">
                                    <h5 data-zanim='{"delay":0}'>野球を通じてコミュニティーの和が拡がる。</h5>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="mt-3" data-zanim='{"delay":0.1}'>
                                        他チームとの交流の機会が増えることで、新たな球友との思い出を記録だけでなく記憶にも沢山残すことが可能です。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 py-0 mt-4 mt-lg-0" style="text-align: center">
                    <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden">
                            <div class="zopacity" data-zanim='{"delay":0.2}'>
                                <a class="btn btn-primary mr-3 mt-3" href="<?= base_url() ?>Match/userguide">ユーザーガイドへ
                                    <span class="fa fa-chevron-right ml-2"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 py-0 mt-4 mt-lg-0" style="text-align: center">
                    <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden">
                            <div class="zopacity" data-zanim='{"delay":0.2}'>
                                <a class="btn btn-primary mr-3 mt-3" href="#news">READ MORE
                                    <span class="fa fa-chevron-down ml-2"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.container-->
        </section>
        <section id="team" class="background-11  text-center">
            <div class="container">
                <div class="row mb-6">
                    <div class="col">
                        <h3 class="fs-2 fs-md-3">チーム使用例</h3>
                        <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll">
                    </div>
                </div>
                <div class="row">
                    <div class="swiper-container">
                        <!-- Swiper START -->
                        <div class="swiper-wrapper">
                            <!-- メイン表示部分 -->
                            <?php foreach ($team_array as $value) {
                                if ($value['withdrawal'] === "0" && $value['open_to'] === "公開") { ?>
                                    <div class="swiper-slide">
                                        <!-- 各スライド -->
                                        <div class="col-12 mt-4 mt-sm-0">
                                            <div class="background-white pb-4 h-100 radius-secondary">
                                                <img class="mb-4 radius-tr-secondary radius-tl-secondary" src="<?= base_url() ?>assets/<?= $value['img'] ?>" alt="Profile Picture" />
                                                <div class="px-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                                    <div class="overflow-hidden">
                                                        <h5 data-zanim='{"delay":0}'>チーム名：<?= $value['team'] ?></h5>
                                                    </div>
                                                    <div class="overflow-hidden">
                                                        <h6 class="fw-400 color-7" data-zanim='{"delay":0.1}'>監督名：<?= $value['skipper'] ?></h6>
                                                    </div>
                                                    <div class="overflow-hidden">
                                                        <p class="py-3 mb-0 text-truncate" data-zanim='{"delay":0.2}'>結成:
                                                            <?= $value['year'] ?>年</p>
                                                        <p class="py-3 mb-0 text-truncate" data-zanim='{"delay":0.2}'>選手層:
                                                            <?= $value['job'] ?></p>
                                                        <p class="py-3 mb-0 text-truncate" title="<?= $value['pr'] ?>" data-zanim='{"delay":0.2}'>PR:
                                                            <?= $value['pr'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php  } ?>
                            <?php  } ?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-pagination"></div>
                    </div><!-- Swiper END -->
                </div>
                <div class="col-md-12 col-lg-12 py-0 mt-4 mt-lg-0" style="text-align: center">
                    <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden">
                            <div class="zopacity" data-zanim='{"delay":0.2}'>
                                <a class="btn btn-primary mr-3 mt-3" href="#question">READ MORE
                                    <span class="fa fa-chevron-down ml-2"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </section>
        <section id="question" class="background-white  text-center" style="position: relative; ">
            <div class="container">
                <div class="row mb-6">
                    <div class="col">
                        <h3 class="fs-2 fs-md-3">よくある質問</h3>
                        <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll">
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="oneArea">
                    <div class="row onebox">
                        <div class="col-3 col-md-2 imgArea"><img class="direct-chat-img" src="<?= base_url() ?>assets/images/player1.png" alt="player"></div>
                        <div class="col-8 col-md-8 fukiArea">
                            <div class="fukidasi">試合マッチングはどういう流れで行われますか？</div>
                        </div>
                    </div>
                    <div class="row onebox">
                        <div class="col-3 col-md-2 imgArea"><img class="direct-chat-img" src="<?= base_url() ?>assets/images/skipper1.png" alt="skipper"></div>
                        <div class="col-8 col-md-8 fukiArea">
                            <div class="fukidasi">対戦チーム一覧から選んで試合を申し込む形になります。各チームの成績も確認出来ますので、選考の参考にして下さい。</div>
                        </div>
                    </div>
                </div>
                <div class="oneArea">
                    <div class="row onebox">
                        <div class="col-3 col-md-2 imgArea"><img class="direct-chat-img" src="<?= base_url() ?>assets/images/player1.png" alt="player"></div>
                        <div class="col-8 col-md-8 fukiArea">
                            <div class="fukidasi">チームHPを外部に非公開にできますか？
                            </div>
                        </div>
                    </div>
                    <div class="row onebox">
                        <div class="col-3 col-md-2 imgArea"><img class="direct-chat-img" src="<?= base_url() ?>assets/images/skipper1.png" alt="skipper"></div>
                        <div class="col-8 col-md-8 fukiArea">
                            <div class="fukidasi">ダイジョーブです。公開・非公開設定を選択できます。非公開設定にするとトップ画面には掲載しませんので安心してご利用頂けます。</div>
                        </div>
                    </div>
                </div>
                <div class="oneArea">
                    <div class="row onebox">
                        <div class="col-3 col-md-2 imgArea"><img class="direct-chat-img" src="<?= base_url() ?>assets/images/player1.png" alt="player"></div>
                        <div class="col-8 col-md-8 fukiArea">
                            <div class="fukidasi">スコア管理は充実してますか？</div>
                        </div>
                    </div>
                    <div class="row onebox">
                        <div class="col-3 col-md-2 imgArea"><img class="direct-chat-img" src="<?= base_url() ?>assets/images/skipper1.png" alt="skipper"></div>
                        <div class="col-8 col-md-8 fukiArea">
                            <div class="fukidasi">個人成績については通算で管理してますが、各試合ごとの成績も確認出来ます。また、チーム単位の通算成績も管理されてます。</div>
                        </div>
                    </div>
                </div>
                <div class="oneArea">
                    <div class="row onebox">
                        <div class="col-3 col-md-2 imgArea"><img class="direct-chat-img" src="<?= base_url() ?>assets/images/player1.png" alt="player"></div>
                        <div class="col-8 col-md-8 fukiArea">
                            <div class="fukidasi">スマホからでも操作可能ですか？</div>
                        </div>
                    </div>
                    <div class="row onebox">
                        <div class="col-3 col-md-2 imgArea"><img class="direct-chat-img" src="<?= base_url() ?>assets/images/skipper1.png" alt="skipper"></div>
                        <div class="col-8 col-md-8 fukiArea">
                            <div class="fukidasi">はい。PC・スマホどちらにも対応しており操作可能です。</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 py-0 mt-4 mt-lg-0" style="text-align: center">
                    <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <div class="overflow-hidden">
                            <div class="zopacity" data-zanim='{"delay":0.2}'>
                                <a class="btn btn-primary mr-3 mt-3" href="#news">READ MORE
                                    <span class="fa fa-chevron-down ml-2"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="news" class="background-11  text-center">
            <div class="container-fluid">
                <div class="row mb-6">
                    <div class="col">
                        <h3 class="fs-2 fs-md-3">お知らせ</h3>
                        <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll">
                    </div>
                </div>
                <!-- SELECT2 EXAMPLE -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->
                                        <div class="input-group-append">
                                            <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                                        </div><!-- /.input-group-append -->
                                    </div><!-- /.input-group input-group-sm -->
                                </div><!-- /.card-tools -->
                            </div><!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>日時</th>
                                            <th>項目</th>
                                            <th>内容</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($news_array as $notice) {
                                            if ($notice['delete_message'] === "0") { ?>
                                                <tr>
                                                    <td><?= $notice['insert_time'] ?></td>
                                                    <td><?= $notice['title'] ?></td>
                                                    <td title="<?= $notice['message'] ?>" class="text-truncate" style="max-width: 500px;"><?= $notice['message'] ?></td>
                                                </tr>
                                            <?php  } ?>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.col -->
                    <div class="col-md-12 col-lg-12 py-0 mt-4 mt-lg-0" style="text-align: center">
                        <div class="px-4 pt-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="overflow-hidden">
                                <div class="zopacity" data-zanim='{"delay":0.2}'>
                                    <a class="btn btn-primary mr-3 mt-3" href="#question">READ MORE
                                        <span class="fa fa-chevron-down ml-2"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <section id="form" style="background-color: white;">
            <div class="container">
                <div class="text-center">
                    <div class="row mb-6">
                        <div class="col">
                            <h3 class="fs-2 fs-md-3"> お問い合わせ</h3>
                            <hr class="short" data-zanim='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll">
                        </div>
                    </div>
                    <h3>氏名・メールアドレス・お問い合わせ内容を入力の上、「送信」ボタンを押してください。</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="error">
                                <strong><span id="name_error" class="text-danger"></span></strong>
                            </div>
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" placeholder="氏名">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="error">
                                <strong><span id="mail_error" class="text-danger"></span></strong>
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" placeholder="メールアドレス">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="error">
                        <strong><span id="message_error" class="text-danger"></span></strong>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="お問い合わせ内容"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <button type="submit" id="contact" class="btn btn-primary">送信<span class="fa fa-chevron-right ml-2"></span></button>
                </div>
            </div>
            <br>
            <div style="display: flex; justify-content: center;">
                <a class="twitter" href=""><img src="<?= base_url() ?>assets/images/twitter.png" alt="twitter"></a>
                <a href=""><img src="<?= base_url() ?>assets/images/facebook.png" alt="facebook"></a>
                <a class="instagram" href=""><img src="<?= base_url() ?>assets/images/instagram.png" alt="instagram"></a>
            </div>
        </section>
        <section class="background-primary text-center py-4">
            <div class="container">
                <p class="color-white lh-6 mb-0 fw-600">&copy; みくろす All rights reserved</p>
            </div>
            <!--/.container-->
        </section>
    </main>
    <!--  -->
    <!--    JavaScripts-->
    <!--    =============================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/gsap/src/minified/TweenMax.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>
    
    <script src="<?= base_url() ?>assets/lib/CustomEase.min.js"></script>
    <script src="<?= base_url() ?>assets/js/config.js"></script>
    <script src="<?= base_url() ?>assets/js/zanimation.js"></script>
    <script src="<?= base_url() ?>assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/remodal/dist/remodal.js"></script>
    <script src="<?= base_url() ?>assets/lib/lightbox2/dist/js/lightbox.js"></script>
    <script src="<?= base_url() ?>assets/lib/flexslider/jquery.flexslider-min.js"></script>
    <script src="<?= base_url() ?>assets/js/core.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script> -->
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            autoplay: {
                delay: 3000,
                stopOnLastSlide: false,
                disableOnInteraction: false,
                reverseDirection: false
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            }
        });
        $(function() {
            $("#contact").on('click', function(event) {
                event.preventDefault();
                $(this).prop('disabled', true);
                var csrf_name = $("#token").attr('name'); // viewに生成されたトークンのname取得
                var csrf_hash = $("#token").val(); // viewに生成されたトークンのハッシュ取得
                var postdata = {
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'message': $('#message').val()
                };
                postdata[csrf_name] = csrf_hash;
                $.ajax({
                    type: "POST",
                    url: "/support/contact",
                    data: postdata,
                    crossDomain: false,
                    dataType: "json",
                    scriptCharset: 'utf-8',
                    success: function(data) {
                        if (data.error) {
                            if (data.name_error != '') {
                                $('#name_error').html(data.name_error);
                            } else {
                                $('#name_error').html('');
                            }
                            if (data.mail_error != '') {
                                $('#mail_error').html(data.mail_error);
                            } else {
                                $('#mail_error').html('');
                            }
                            if (data.message_error != '') {
                                $('#message_error').html(data.message_error);
                            } else {
                                $('#message_error').html('');
                            }
                            Swal.fire({
                                icon: 'error',
                                title: '問い合わせ出来ませんでした。',
                                text: '入力内容をご確認下さい。',
                            }).then((result) => {
                                $("#contact").prop('disabled', false);
                            });
                        }
                        if (data.success) {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: '問い合わせありがとうございます。',
                                text: '返信までしばらくお待ち下さい。',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                window.location.href = "/main/index";
                            });
                        }
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>