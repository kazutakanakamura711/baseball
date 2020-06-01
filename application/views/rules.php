<?php $this->load->view('common/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-10 col-xs-6">
          <h1 class="m-0 text-dark">野球豆知識コーナー</h1>
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
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-search"></i>【youtubeで野球を知る・学ぶ】</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="row p-3">
            <div class="col-md-6 order-md-2">
              <h4>振り逃げで3ラン！</h4>
              <p>こんなことあるんですね？というよりそんなルールあったんですね！と驚きました。</p>
              <p>プレイの状況などについては、動画の中で解説者がおっしゃってる通りだと思います。テレビ等で観戦してる方は解説者の説明で理解出来たかと思いますが、審判の方が場内アナウンスでもうちょっと丁寧に説明したらいいかなと個人的には思いました。</p>
            </div><!-- /.col -->
            <div class="col-md-6">
              <div class="youtube">
                <iframe width="400" height="225" src="https://www.youtube.com/embed/MZApx022H1Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row p-3">
            <div class="col-md-6 order-md-2">
              <h4>インフィールドフライでサヨナラ！</h4>
              <p>これも衝撃的でしたね。一瞬のスキをついた見事な走塁というべきでしょうか！</p>
              <p>動画のなかで解説者がおっしゃってる通りインフィールドフライはインプレイのようなので、守備側がタイムを取るか走者に気を配らないといけなかったですね。これも個人的には審判の方の解説だけでは分かりにくいかなと感じました。</p>
            </div><!-- /.col -->
            <div class="col-md-6">
              <div class="youtube">
                <iframe width="400" height="225" src="https://www.youtube.com/embed/VmnC5nJoFiE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row p-3">
            <div class="col-md-6 order-md-2">
              <h4>インフィールドフライでサヨナラ(プロ野球)！</h4>
              <p>プロでもこんなことあるんですね！と思いましたが、これはどちらかと言えば審判の宣告が皆に伝わっていないことから起きてると思いますね。</p>
              <p>三塁塁審の宣告が主審にも伝わってないのですから、当然巨人の選手にも伝わってないですよね。解説者もおっしゃってますが、主審も宣告すべきだと思いますね。</p>
              <p></p>
            </div><!-- /.col -->
            <div class="col-md-6">
              <div class="youtube">
                <iframe width="400" height="225" src="https://www.youtube.com/embed/4KI5Gl579BE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row p-3">
            <div class="col-md-6 order-md-2">
              <h4>第3アウトの置き換え！</h4>
              <p>この動画見ながら、これ以外にも今までこんな場面何回か見たことあるなと思い出しました。何であんなことやってるんだろう？と思いましたが、この為だったんですね。</p>
              <p>野球のいろんなルールを知ったうえで、プレイを観戦するのもまた楽しいと思いますね。</p>
            </div><!-- /.col -->
            <div class="col-md-6">
              <div class="youtube">
              <iframe width="400" height="225" src="https://www.youtube.com/embed/_GRF7-XpI7Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row p-3">
            <div class="col-md-6 order-md-2">
              <h4>奇跡のバックホーム！</h4>
              <p>これは個人的に見たいと思って載せました。何度見ても鳥肌立ちますね。</p>
              <p>選手交代で代わった矢野選手のとこに打球が飛ぶ！そして見事なバックホーム！！動画はここで終わってますが、その後の攻撃で矢野選手が先頭バッターでヒットを打って、勝ち越しに繋がるんですよね。</p>
            </div><!-- /.col -->
            <div class="col-md-6">
              <div class="youtube">
              <iframe width="400" height="225" src="https://www.youtube.com/embed/b_hU5O4JP-8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.card-body -->
      </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('common/footer'); ?>