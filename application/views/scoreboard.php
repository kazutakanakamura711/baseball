  <?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h1 class="m-0 text-dark">スコアボード</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <caption><strong>【チーム成績】</strong></caption>
          <table class="table table-bordered table-hover text-nowrap">
            <thead class="table-primary">
              <tr>
                <th>試合数</th>
                <th>打率</th>
                <th>本塁打</th>
                <th>得点</th>
                <th>盗塁</th>
                <th>防御率</th>
                <th>失点</th>
                <th>奪三振</th>
                <th>犠打</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($teamscore_array as $value) {
                if ($_SESSION['id'] === $value['team_id']) {
                  if ($value['delete_player'] === "0") { ?>
                    <tr>
                      <td><?= $game ?></td>
                      <td><?= number_format(round($value['sum(hit)'] / $value['sum(atbat)'], 3, PHP_ROUND_HALF_DOWN), 3) ?></td>
                      <td><?= $value['sum(homerun)'] ?></td>
                      <td><?= $value['sum(rbi)'] ?></td>
                      <td><?= $value['sum(steal)'] ?></td>
                      <td><?= number_format(round($value['sum(er)'] * 27 / $value['sum(inning)'], 3, PHP_ROUND_HALF_DOWN), 3) ?></td>
                      <td><?= $value['sum(er)'] ?></td>
                      <td><?= $value['sum(strikeout)'] ?></td>
                      <td><?= $value['sum(sacrifice)'] ?></td>
                    </tr>
                  <?php  } ?>
                <?php  } ?>
              <?php  } ?>
            </tbody>
          </table>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-9">
            <caption><strong>【野手】</strong></caption>
          </div>
          <div class="col-sm-3">
            <a href="<?= base_url() ?>main/players" class="float-sm-right nav-link">選手情報一覧へ　
              <span class="fa fa-chevron-right"></span><span class="fa fa-chevron-right"></span></a>
          </div>
          <table class="table table-bordered table-hover text-nowrap">
            <thead class="table-primary">
              <tr>
                <th>打順</th>
                <th>背番号</th>
                <th>名前</th>
                <th>打率</th>
                <th>本塁打</th>
                <th>打点</th>
                <th>盗塁</th>
                <th>四死球</th>
                <th>犠打</th>
                <th>追加</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($score_array as $values) {
                if ($_SESSION['id'] === $values['team_id']) {
                  if ($values['delete_player'] === "0") { ?>
                    <tr>
                      <td><?= $values['turn'] ?></td>
                      <td><?= $values['number'] ?></td>
                      <td><?= $values['name'] ?></td>
                      <td><?= number_format(round($values['sum(hit)'] / $values['sum(atbat)'], 3, PHP_ROUND_HALF_DOWN), 3) ?></td>
                      <td><?= $values['sum(homerun)'] ?></td>
                      <td><?= $values['sum(rbi)'] ?></td>
                      <td><?= $values['sum(steal)'] ?></td>
                      <td><?= $values['sum(walk)'] ?></td>
                      <td><?= $values['sum(sacrifice)'] ?></td>
                      <td>
                        <button onclick="location.href='/score/score_signup?id=<?= $values['id'] ?>'" id="button1" type="submit" class="btn-primary">スコア追加 <i class="fas fa-pencil-alt"></i></button>
                      </td>
                    </tr>
                  <?php  } ?>
                <?php  } ?>
              <?php  } ?>
            </tbody>
          </table>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-9">
            <caption><strong>【投手】</strong></caption>
          </div>
          <div class="col-sm-3">
            <a href="<?= base_url() ?>main/players" class="float-sm-right nav-link">選手情報一覧へ　
              <span class="fa fa-chevron-right"></span><span class="fa fa-chevron-right"></span></a>
          </div>
          <table class="table table-bordered table-hover text-nowrap">
            <thead class="table-primary">
              <tr>
                <th>打順</th>
                <th>背番号</th>
                <th>名前</th>
                <th>防御率</th>
                <th>被安打</th>
                <th>被本塁打</th>
                <th>自責点</th>
                <th>奪三振</th>
                <th>被四死球</th>
                <th>更新</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($score_array as $values) {
                if ($_SESSION['id'] === $values['team_id']) {
                  if ($values['delete_player'] === "0" && $values['sum(inning)'] != "0") { ?>
                    <tr>
                      <td><?= $values['turn'] ?></td>
                      <td><?= $values['number'] ?></td>
                      <td><?= $values['name'] ?></td>
                      <td><?= number_format(round($values['sum(er)'] * 27 / $values['sum(inning)'], 3, PHP_ROUND_HALF_DOWN), 3) ?></td>
                      <td><?= $values['sum(h_hit)'] ?></td>
                      <td><?= $values['sum(h_homerun)'] ?></td>
                      <td><?= $values['sum(er)'] ?></td>
                      <td><?= $values['sum(strikeout)'] ?></td>
                      <td><?= $values['sum(h_walk)'] ?></td>
                      <td>
                        <button onclick="location.href='/score/score_signup?id=<?= $values['id'] ?>'" id="button1" type="submit" class="btn-primary">スコア追加 <i class="fas fa-pencil-alt"></i></button>
                      </td>
                    </tr>
                  <?php  } ?>
                <?php  } ?>
              <?php  } ?>
            </tbody>
          </table>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-9">
            <caption><strong>【試合結果】</strong></caption>
          </div>
          <div class="col-sm-3">
            <?= form_open("#"); ?>
            <a href="#" class="float-sm-right nav-link">試合結果入力へ　
              <span class="fa fa-chevron-right"></span><span class="fa fa-chevron-right"></span></a>
            <?= form_close(); ?>
          </div>
          <table class="table table-bordered table-hover text-nowrap">
            <thead class="table-primary">
              <tr>
                <th>相手チーム</th>
                <th>最終スコア</th>
                <th>勝敗</th>
                <th>考察</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($game_array as $values) {
                if ($_SESSION['id'] === $values['team_id']) {
                  if ($values['delete_game'] === "0") { ?>
                    <tr>
                      <td><?= $values['battle_team'] ?></td>
                      <td><?= $values['score'] ?> － <?= $values['loss'] ?></td>
                      <td><?= $values['battle'] ?></td>
                      <td><?= $values['consideration'] ?></td>
                    </tr>
                  <?php  } ?>
                <?php  } ?>
              <?php  } ?>
            </tbody>
          </table>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>