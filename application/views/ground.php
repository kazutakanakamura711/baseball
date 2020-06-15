  <?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10 col-xs-6">
            <h1 class="m-0 text-dark">グラウンド一覧</h1>
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
        <h3 class="mb-3">愛媛県</h3>
        <!-- タブ型ナビゲーション -->
        <p>【松山市・伊予市の野球グラウンド】</p>
        <div class="nav nav-tabs" id="tab-menu1" role="tablist">
          <!-- タブ01 -->
          <a class="nav-item nav-link active" id="tab-menu01" data-toggle="tab" href="#panel-menu01" role="tab" aria-controls="panel-menu01" aria-selected="true">坊っちゃん</a>
          <!-- タブ02 -->
          <a class="nav-item nav-link" id="tab-menu02" data-toggle="tab" href="#panel-menu02" role="tab" aria-controls="panel-menu02" aria-selected="false">マドンナ</a>
          <!-- タブ03 -->
          <a class="nav-item nav-link" id="tab-menu03" data-toggle="tab" href="#panel-menu03" role="tab" aria-controls="panel-menu03" aria-selected="false">総合運動公園</a>
          <!-- タブ04 -->
          <a class="nav-item nav-link" id="tab-menu04" data-toggle="tab" href="#panel-menu04" role="tab" aria-controls="panel-menu04" aria-selected="false">しおさい公園</a>
          <!-- タブ05 -->
          <a class="nav-item nav-link" id="tab-menu05" data-toggle="tab" href="#panel-menu05" role="tab" aria-controls="panel-menu05" aria-selected="false">ウェルピア伊予</a>
          <!-- タブ06 -->
          <a class="nav-item nav-link" id="tab-menu06" data-toggle="tab" href="#panel-menu06" role="tab" aria-controls="panel-menu06" aria-selected="false">五色浜</a>
        </div>
        <!-- /タブ型ナビゲーション -->
        <!-- パネル -->
        <div class="tab-content" id="panel-menu1">
          <!-- パネル01 -->
          <div class="tab-pane fade show active border border-top-0" id="panel-menu01" role="tabpanel" aria-labelledby="tab-menu01">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>松山中央公園野球場(坊っちゃんスタジアム)</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅/フェンス</th>
                      <td>14,300m<sup>2</sup>/99.1m/122m/4.9m</td>
                    </tr>
                    <tr>
                      <th>内野/外野/ファウルエリア</th>
                      <td>クレー舗装/天然芝/人工芝</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>8650円/4h(追加：2160円/1h)</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>9時～13時・13時～17時・17時～21時</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード</th>
                      <td>1080円/1h</td>
                    </tr>
                    <tr>
                      <th>照明</th>
                      <td>6480円:1/5点灯～32400円:全点灯/1h</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>JR市坪駅徒歩5分<br>伊予鉄バス坊っちゃんスタジアム前徒歩3分</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>TEL:089-965-3000
                        <br>
                        Email:centralpark@cul-spo.or.jp
                        <br><a href="https://www.yoyaku.city.matsuyama.ehime.jp/user/rsvUTransInitialScreenBackAction.do" target="blank">予約はこちらから</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.col -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/bochan.jpg" alt="坊っちゃん" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6630.339079047552!2d132.74529248155034!3d33.807937654227246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354fef0775e3e6b9%3A0x39bb8cb3d581225d!2z5Z2K44Gj44Gh44KD44KT44K544K_44K444Ki44Og77yI5p2-5bGx5Lit5aSu5YWs5ZyS6YeO55CD5aC077yJ!5e0!3m2!1sja!2sjp!4v1587379804375!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル02 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu02" role="tabpanel" aria-labelledby="tab-menu02">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>松山中央公園野球場(マドンナスタジアム)</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅/フェンス</th>
                      <td>14,300m<sup>2</sup>/99.1m/122m/4.9m</td>
                    </tr>
                    <tr>
                      <th>内野/外野/ファウルエリア</th>
                      <td>クレー舗装/人工芝</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>6,920円/4h(追加：1,730円/1h)</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>9時～13時・13時～17時・17時～21時</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード</th>
                      <td>1080円/1h</td>
                    </tr>
                    <tr>
                      <th>照明</th>
                      <td>2160円:1/2点灯,4320円:全点灯/1h</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>JR市坪駅徒歩5分<br>伊予鉄バスマドンナスタジアム前徒歩3分</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>TEL:089-965-3000
                        <br>
                        Email:centralpark@cul-spo.or.jp
                        <br><a href="https://www.yoyaku.city.matsuyama.ehime.jp/user/rsvUTransInitialScreenBackAction.do" target="blank">予約はこちらから</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.col -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/madonna.jpg" alt="マドンナ" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3315.1217756352107!2d132.74534781460903!3d33.80917038067275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354fef086beeb0af%3A0x8e8dbae7dfcb6da4!2z5p2-5bGx5Lit5aSu5YWs5ZyS44K144OW6YeO55CD5aC0KOODnuODieODs-ODiuOCueOCv-OCuOOCouODoCk!5e0!3m2!1sja!2sjp!4v1587475027351!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル03 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu03" role="tabpanel" aria-labelledby="tab-menu03">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>愛媛県総合運動公園多目的広場</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅/フェンス</th>
                      <td>12,320m<sup>2</sup>/--</td>
                    </tr>
                    <tr>
                      <th>内野/外野</th>
                      <td>土(芝張り：10010m<sup>2</sup>)</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>2620円/8h以下、3930円/8h超(1310円/4h)</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>9時～21時</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード/照明</th>
                      <td>2080円/1h</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>伊予鉄バス総合運動公園口・ニンジニアスタジアム前徒歩5分</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>TEL:089-963-3211
                        <br>
                        <a href="http://www.epsc.jp/inquiry/index.html">お問い合わせフォームはこちら</a>
                        <br><a href="https://www.pref.ehime.jp/s_yoyaku/servlet/Kokai?type=2&sid=200400000004" target="blank">予約はこちらから</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.row -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/ninsta.jpg" alt="総合運動公園" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1658.3952670263413!2d132.7962008757664!3d33.76607829514749!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354fe9399063bb69%3A0x66efecc7d1148eb0!2z5oSb5aqb55yM57eP5ZCI6YGL5YuV5YWs5ZyS5aSa55uu55qE5bqD5aC0!5e0!3m2!1sja!2sjp!4v1587385177377!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル04 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu04" role="tabpanel" aria-labelledby="tab-menu04">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>伊予市しおさい公園野球場</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅/フェンス</th>
                      <td>11,500m<sup>2</sup>/95m/115m</td>
                    </tr>
                    <tr>
                      <th>内野/外野</th>
                      <td>黒土/芝生</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>4600円～6250円/3.5～5h</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>8時30分～12時・12時～17時・17時～21時30分</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード</th>
                      <td>520円/1試合</td>
                    </tr>
                    <tr>
                      <th>照明</th>
                      <td>6600円:半灯/2h</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>JR伊予市駅,伊予鉄郡中駅車約6分(2km)</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>TEL:089-982-2367
                        <br>
                        Email:shiosaipark@midori-gr.com
                        <br><a href="https://www.midori-gr.com/shiosaipark/contact.html" target="blank">予約はこちらから</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.row -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/siosai.jpg" alt="しおさい" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6635.270895094197!2d132.68183148345807!3d33.74424173315825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354ff2ed88ee8c47%3A0x81c88e2fd690bb7a!2z44GX44GK44GV44GE5YWs5ZyS6YeO55CD5aC0!5e0!3m2!1sja!2sjp!4v1587385555644!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル05 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu05" role="tabpanel" aria-labelledby="tab-menu05">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>ウェルピア伊予野球場</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅</th>
                      <td>--/92m/102m</td>
                    </tr>
                    <tr>
                      <th>内野/外野</th>
                      <td>土</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>1650円～2200円/1h(伊予市民：1000円/1h)</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>早朝～日没</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード/照明</th>
                      <td>無し</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>JR伊予市駅、伊予鉄郡中港駅車約8分</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>TEL:089-983-4500
                        <br><a href="https://welpiaiyo.jp/facility-sport" target="blank">予約はこちらから</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.col -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/welpia.jpg" alt="ウェルピア" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6633.378087345488!2d132.71642125091404!3d33.76870044930544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1ca31c63732483fc!2z44Km44Kn44Or44OU44Ki5LyK5LqI!5e0!3m2!1sja!2sjp!4v1587385985090!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル06 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu06" role="tabpanel" aria-labelledby="tab-menu06">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>五色浜公園グラウンド</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅</th>
                      <td>--</td>
                    </tr>
                    <tr>
                      <th>内野/外野</th>
                      <td>土</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>1370～1644円/2h,2730～3276円/～4h,4400～5280円/～8h</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>8時30分～19時</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード/照明</th>
                      <td>無し</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>JR伊予市駅,伊予鉄郡中港駅徒歩7分</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>TEL:089-982-0506(彩浜館)
                        <br><a href="https://www.city.iyo.lg.jp/shisetsu/shisetsu/koen/goshikig.html" target="blank">予約はこちらから</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.col -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/gosikihama.jpg" alt="五色浜" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6634.443995736064!2d132.69599354705647!3d33.75492878480875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354ff264a2235c19%3A0x38a0fbbe17fd918d!2z5LqU6Imy5rWc44Kw44Op44Km44Oz44OJ!5e0!3m2!1sja!2sjp!4v1587386894455!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
        </div><!-- /.tab-content -->
        <!-- /パネル -->
        <!-- タブ型ナビゲーション -->
        <p>【松山周辺の野球グラウンド】</p>
        <div class="nav nav-tabs" id="tab-menu2" role="tablist">
          <!-- タブ07 -->
          <a class="nav-item nav-link active" id="tab-menu07" data-toggle="tab" href="#panel-menu07" role="tab" aria-controls="panel-menu07" aria-selected="false">ゆとり公園</a>
          <!-- タブ08 -->
          <a class="nav-item nav-link" id="tab-menu08" data-toggle="tab" href="#panel-menu08" role="tab" aria-controls="panel-menu08" aria-selected="false">文化の森公園</a>
          <!-- タブ09 -->
          <a class="nav-item nav-link" id="tab-menu09" data-toggle="tab" href="#panel-menu09" role="tab" aria-controls="panel-menu09" aria-selected="false">東温市総合公園</a>
          <!-- タブ10 -->
          <a class="nav-item nav-link" id="tab-menu10" data-toggle="tab" href="#panel-menu10" role="tab" aria-controls="panel-menu10" aria-selected="false">松前公園</a>
        </div>
        <!-- /タブ型ナビゲーション -->
        <!-- パネル -->
        <div class="tab-content" id="panel-menu2">
          <!-- パネル07 -->
          <div class="tab-pane fade show active border border-top-0" id="panel-menu07" role="tabpanel" aria-labelledby="tab-menu07">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>砥部町陶街道ゆとり公園野球場</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅</th>
                      <td>--</td>
                    </tr>
                    <tr>
                      <th>内野/外野</th>
                      <td>土</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>--</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>9時～22時</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード/照明</th>
                      <td>無し/不明</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>伊予鉄バス砥部町役場西徒歩10分</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>TEL:089-962-4600
                        <br>
                        Email:tamai.masato@atomgroup.jp ,tobe-koen@atomgroup.jp
                        <br><a href="http://www.fuyom.com/facility/tobepark/index.html" target="blank">予約はこちらから</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.col -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/yutori.jpg" alt="ゆとり" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6635.15494362225!2d132.7944198890668!3d33.745740498496666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354fe9582953bcaf%3A0x8a01019e45484a50!2z56Cl6YOo55S6IOmZtuihl-mBk-OChuOBqOOCiuWFrOWckg!5e0!3m2!1sja!2sjp!4v1587387878478!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル08 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu08" role="tabpanel" aria-labelledby="tab-menu08">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>北条河野別府公園市民グラウンド(文化の森)</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅</th>
                      <td>10,530m<sup>2</sup>/--</td>
                    </tr>
                    <tr>
                      <th>内野/外野</th>
                      <td>土</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>1020円/2h</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>6時～21時</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード/照明</th>
                      <td>無し/30分710円</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>JR北条駅車5分,伊予鉄バス</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>TEL:089-993-3266
                        <br><a href="https://www.yoyaku.city.matsuyama.ehime.jp/user" target="blank">予約はこちらから</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.col -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/bunka.jpg" alt="文化の森" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6635.15494362225!2d132.7944198890668!3d33.745740498496666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354fe9582953bcaf%3A0x8a01019e45484a50!2z56Cl6YOo55S6IOmZtuihl-mBk-OChuOBqOOCiuWFrOWckg!5e0!3m2!1sja!2sjp!4v1587387878478!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル09 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu09" role="tabpanel" aria-labelledby="tab-menu09">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>東温市総合公園多目的グラウンド</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅</th>
                      <td>11,600m<sup>2</sup>/125m/103m</td>
                    </tr>
                    <tr>
                      <th>内野/外野</th>
                      <td>土</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>1220円/1h(半面：610円/1h)</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>9時～22時</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード/照明</th>
                      <td>無し/3050円(2030円/半分):1hあたり</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>伊予鉄バス西ノ岡徒歩10分</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>TEL:089-964-4440
                        <br><a href="https://nelcs.ne.jp/Facilityrsv/3821500/" target="blank">予約はこちらから(PC)</a>
                        <br><a href="https://www.city.toon.ehime.jp/soshiki/17/2057.html" target="blank">予約はこちらから(モバイル)</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.col -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/toonsogo.jpg" alt="東温総合公園" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6630.35456129104!2d132.86591685256784!3d33.80773786179141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354fdd640743e9a9%3A0x201ca1e23312d16f!2z5p2x5rip5biC57eP5ZCI5YWs5ZyS!5e0!3m2!1sja!2sjp!4v1587388106370!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- パネル10 -->
          <div class="tab-pane fade border border-top-0" id="panel-menu10" role="tabpanel" aria-labelledby="tab-menu10">
            <div class="row p-3">
              <div class="col-md-8 order-md-2">
                <h4>松前公園多目的広場</h4>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>面積/両翼/中堅</th>
                      <td>--</td>
                    </tr>
                    <tr>
                      <th>内野/外野</th>
                      <td>土</td>
                    </tr>
                    <tr>
                      <th>施設使用料金</th>
                      <td>1500～1800円/1h</td>
                    </tr>
                    <tr>
                      <th>施設利用時間</th>
                      <td>9時～21時</td>
                    </tr>
                    <tr>
                      <th>駐車場/トイレ/ベンチ</th>
                      <td>有り</td>
                    </tr>
                    <tr>
                      <th>スコアボード/照明</th>
                      <td>無し/4500円(2400円/半分):1h</td>
                    </tr>
                    <tr>
                      <th>周辺アクセス</th>
                      <td>伊予鉄松前駅・小泉駅徒歩10分
                        <br>JR北伊予・伊予横田駅車10分</td>
                    </tr>
                    <tr>
                      <th>お問い合わせ</th>
                      <td>
                        <a href="http://www.i-masaki.jp/rental/index.html" target="blank">予約はこちらから</a></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.col -->
              <div class="col-md-4">
                <img src="<?= base_url() ?>assets/images/masaki.jpg" alt="松前公園" class="img-fluid">
                <div class="w-100"></div>
                <br>
                <div class="google_map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3315.923532654289!2d132.71132925016948!3d33.78847278058361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354fee04b9d15dab%3A0x32de99e9f50b8faa!2z5p2-5YmN5YWs5ZyS!5e0!3m2!1sja!2sjp!4v1587388238399!5m2!1sja!2sjp" width="325" height="243.75" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- /.google_map -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.tab-pane fade show active border border-top-0 -->
          <!-- /パネル -->
        </div><!-- /.tab-content -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>