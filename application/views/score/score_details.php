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
      <h5><?= $score_array[0]['name'] ?></h5>
      <input type="hidden" id="token" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>" />
      <!-- Main row -->
      <div class="row">
        <caption><strong>【野手】</strong></caption>
        <table class="table table-bordered table-hover text-nowrap">
          <thead class="table-primary">
            <tr>
              <th>打席数</th>
              <th>安打数</th>
              <th>打率</th>
              <th>本塁打</th>
              <th>打点</th>
              <th>盗塁</th>
              <th>四死球</th>
              <th>犠打</th>
              <th colspan="2">追加</th>
            </tr>
          </thead>
          <tbody>
            <script>
              $(".can_edit").on("click", function(e) {
                  var target = $(e.target);
                  var type = target.data("type");
                  var value = target.text;
                  var id = target.parent().data("id");
              });
            </script>
            <?php foreach ($score_array as $values) { ?>
              <tr>
                <td><?= $values['atbat'] ?></td>
                <td><?= $values['hit'] ?></td>
                <td><?= number_format(round($values['hit'] / $values['atbat'], 3), 3) ?></td>
                <td><?= $values['homerun'] ?></td>
                <td><?= $values['rbi'] ?></td>
                <td><?= $values['steal'] ?></td>
                <td><?= $values['walk'] ?></td>
                <td><?= $values['sacrifice'] ?></td>
                <td>
                  <button onclick="location.href='/score/score_update?id=<?= $values['score_id'] ?>'" id="button1" type="submit" class="btn-success">スコア編集 <i class="fas fa-pencil-alt"></i></button>
                </td>
                <td>
                  <button name="delete_score" data-id="<?= $values['score_id'] ?>" data-name="<?= $values['name'] ?>" type="submit" class="btn-danger">スコア削除 <i class="far fa-trash-alt"></i></button>
                </td>
              </tr>
            <?php  } ?>
          </tbody>
        </table>
      </div><!-- /.row -->
      <div class="row">
        <caption><strong>【投手】</strong></caption>
        <table class="table table-bordered table-hover text-nowrap">
          <thead class="table-primary">
            <tr>
              <th>投球数</th>
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
              if ($values['inning'] != "0") { ?>
                <tr>
                  <td><?= floor($values['inning'] / 3) ?>回 <?= $values['inning'] % 3 ?>/3</td>
                  <td><?= number_format(round($values['er'] * 27 / $values['inning'], 3), 3) ?></td>
                  <td><?= $values['h_hit'] ?></td>
                  <td><?= $values['h_homerun'] ?></td>
                  <td><?= $values['er'] ?></td>
                  <td><?= $values['strikeout'] ?></td>
                  <td><?= $values['h_walk'] ?></td>
                  <td>
                    <button onclick="location.href='/score/score_update?id=<?= $values['score_id'] ?>'" id="button1" type="submit" class="btn-success">スコア編集 <i class="fas fa-pencil-alt"></i></button>
                  </td>
                  <td>
                    <button name="delete_score" data-id="<?= $values['score_id'] ?>" data-name="<?= $values['name'] ?>" type="submit" class="btn-danger">スコア削除 <i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>
              <?php  } ?>
            <?php  } ?>
          </tbody>
        </table>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('common/footer'); ?>