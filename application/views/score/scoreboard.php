  <?php $this->load->view('common/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h1 class="m-0 text-dark">スコアボード</h1>
          <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i>【チーム成績】</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap">
                  <thead class="table-primary">
                    <tr>
                      <th>試合数</th>
                      <th>選手数</th>
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
                            <td><?= $value['gamecount'] ?></td>
                            <td><?= $value['playercount'] ?></td>
                            <td><?= number_format(round($value['sum(hit)'] / $value['sum(atbat)'], 3), 3) ?></td>
                            <td><?= $value['sum(homerun)'] ?></td>
                            <td><?= $value['sum(rbi)'] ?></td>
                            <td><?= $value['sum(steal)'] ?></td>
                            <td><?= number_format(round($value['sum(er)'] * 27 / $value['sum(inning)'], 3), 3) ?></td>
                            <td><?= $value['sum(er)'] ?></td>
                            <td><?= $value['sum(strikeout)'] ?></td>
                            <td><?= $value['sum(sacrifice)'] ?></td>
                          </tr>
                        <?php  } ?>
                      <?php  } ?>
                    <?php  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i>【野手成績】</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap">
                  <thead class="table-primary">
                    <tr>
                      <th>打順</th>
                      <th>背番号</th>
                      <th>守備</th>
                      <th>名前</th>
                      <th>打率</th>
                      <th>本塁打</th>
                      <th>打点</th>
                      <th>盗塁</th>
                      <th>四死球</th>
                      <th>犠打</th>
                      <th colspan="2">更新</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($score_array as $values) {
                      if ($values['delete_player'] === "0") { ?>
                        <tr>
                          <td><?= $values['turn'] ?></td>
                          <td><?= $values['number'] ?></td>
                          <td><?= $values['position'] ?></td>
                          <td><?= $values['name'] ?></td>
                          <td><?= number_format(round($values['sum(hit)'] / $values['sum(atbat)'], 3), 3) ?></td>
                          <td><?= $values['sum(homerun)'] ?></td>
                          <td><?= $values['sum(rbi)'] ?></td>
                          <td><?= $values['sum(steal)'] ?></td>
                          <td><?= $values['sum(walk)'] ?></td>
                          <td><?= $values['sum(sacrifice)'] ?></td>
                          <td>
                            <button onclick="location.href='/score/score_signup?id=<?= $values['pid'] ?>'" id="button1" type="submit" class="btn-primary">スコア追加 <i class="fas fa-pencil-alt"></i></button>
                          </td>
                          <td>
                            <button onclick="location.href='/score/score_details?id=<?= $values['pid'] ?>'" id="button2" type="submit" class="btn-success">スコア詳細 <i class="fas fa-pencil-alt"></i></button>
                          </td>
                        </tr>
                      <?php  } ?>
                    <?php  } ?>
                  </tbody>
                </table>
                <?= $score_pagination ?>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-users"></i>【投手成績】</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap">
                  <thead class="table-primary">
                    <tr>
                      <th>打順</th>
                      <th>背番号</th>
                      <th>守備</th>
                      <th>名前</th>
                      <th>防御率</th>
                      <th>被安打</th>
                      <th>被本塁打</th>
                      <th>自責点</th>
                      <th>奪三振</th>
                      <th>被四死球</th>
                      <th colspan="2">更新</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($score_array as $values) {
                      if ($values['delete_player'] === "0" && $values['sum(inning)'] != "0") { ?>
                        <tr>
                          <td><?= $values['turn'] ?></td>
                          <td><?= $values['number'] ?></td>
                          <td><?= $values['position'] ?></td>
                          <td><?= $values['name'] ?></td>
                          <td><?= number_format(round($values['sum(er)'] * 27 / $values['sum(inning)'], 3), 3) ?></td>
                          <td><?= $values['sum(h_hit)'] ?></td>
                          <td><?= $values['sum(h_homerun)'] ?></td>
                          <td><?= $values['sum(er)'] ?></td>
                          <td><?= $values['sum(strikeout)'] ?></td>
                          <td><?= $values['sum(h_walk)'] ?></td>
                          <td>
                            <button onclick="location.href='/score/score_signup?id=<?= $values['pid'] ?>'" id="button1" type="submit" class="btn-primary">スコア追加 <i class="fas fa-pencil-alt"></i></button>
                          </td>
                          <td>
                            <button onclick="location.href='/score/score_details?id=<?= $values['pid'] ?>'" id="button2" type="submit" class="btn-success">スコア詳細 <i class="fas fa-pencil-alt"></i></button>
                          </td>
                        </tr>
                      <?php  } ?>
                    <?php  } ?>
                  </tbody>
                </table>
                <?= $score_pagination ?>
              </div>
            </div>
          </div><!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-baseball-ball"></i>【試合結果】</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-bordered table-hover text-nowrap">
                    <thead class="table-primary">
                      <tr>
                        <th>相手チーム</th>
                        <th>最終スコア</th>
                        <th>勝敗</th>
                        <th>考察</th>
                        <th colspan="2">更新</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($game_array as $games) {
                        if ($games['delete_game'] === "0") { ?>
                          <tr>
                            <td><?= $games['battle_team'] ?></td>
                            <td><?= $games['score'] ?> － <?= $games['loss'] ?></td>
                            <td><?= $games['battle'] ?></td>
                            <td title="<?= $games['consideration'] ?>" class="text-truncate" style="max-width: 500px;"><?= $games['consideration'] ?></td>
                            <td>
                              <button onclick="location.href='/game/game_update?id=<?= $games['id'] ?>'" id="button1" type="submit" class="btn-success">編集 <i class="fas fa-pencil-alt"></i></button>
                            </td>
                            <td>
                              <button name="delete_game" data-id="<?= $games['id'] ?>" data-name="<?= $games['battle_team'] ?>" type="submit" class="btn-danger">削除 <i class="far fa-trash-alt"></i></button>
                            </td>
                          </tr>
                        <?php  } ?>
                      <?php  } ?>
                    </tbody>
                  </table>
                  <?= $game_pagination ?>
                </div>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <?php $this->load->view('common/footer'); ?>