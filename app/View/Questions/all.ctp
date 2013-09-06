<!-- 3/30以降はここを少し修正して、ここにメイン画面を作成する -->
<!doctype html>

<meta http-equiv="content-type" content="text/html; charset=utf-8">

  <style type="text/css">
    body {
      padding-top: 60px;
      padding-bottom: 40px;
    }
    .sidebar-nav {
      padding: 9px 0;
    }
  </style>

<!-- ▼上部ナビゲーションバー -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
        
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <a class="brand" href="./bootstrap-sample.html">メニュー覧：</a>
        <div class="nav-collapse">
          <ul class="nav">
            <li><a href="/ipso/my_page">マイページ</a></li>
            <!-- pull down meny（問題） -->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">問題<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="active"><a href="/questions/all">問題一覧</a></li>
                <li><a href="/questions/all">他ユーザのコード閲覧</a></li>
              </ul>
            </li>
            <!-- pull down meny（問題） end-->
            
            <!-- pull down meny（作成） -->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">作成<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/creates/question">問題作成</a></li>
                <li><a href="/creates/testdata">テストデータ作成</a></li>
              </ul>
            </li>
            <!-- pull down meny（作成） end-->
            <li><a href="/ipso/logout">ログアウト</a></li>
          </ul>
          <p class="navbar-text pull-right"><a href="./Login.php">ヘルプ</a></p>
        </div><!--/.nav-collapse -->

      </div>
    </div>
</div>
<!-- 上部ナビゲーションend -->
<h2>問題集</h2>
<table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="text-align:center">タイトル</th>
          <th style="text-align:center">難易度</th>
          <th style="text-align:center">テストデータ数</th>
          <th style="text-align:center">選択</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($questions_info as $question) : ?>
          <tr>
            <td style="text-align:center"><?php echo $question['Question']['title'];?></td>
            <td style="text-align:center"><h4><?php echo $question['Question']['difficult'];?></h4></td>
            <td style="text-align:center"><h4><?php echo $question['Question']['testdata_num'];?></h4></td>
            <td style="text-align:center">
              <a href="/questions/select/<?php echo $question['Question']['id'];?>" class="btn btn-primary">選択</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
</table>
