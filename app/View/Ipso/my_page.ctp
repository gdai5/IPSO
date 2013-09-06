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
            <li class="active"><a href="/ipso/my_page">マイページ</a></li>
            <li><a href="/questions/all">問題選択</a></li>
            <li><a href="/testdatas/make">テストデータ作成</a></li>
            <li><a href="/ipso/logout">ログアウト</a></li>
          </ul>
          <p class="navbar-text pull-right"><a href="./Login.php">ヘルプ</a></p>
        </div><!--/.nav-collapse -->

      </div>
    </div>
  </div>
  
  <div class="span12">
    <h2>ステータス</h2>
    <h3>ユーザ情報</h3>
    <h4>ユーザ名：<?php echo $userinfo['username'];?></h4>
    <h4>実力値：<?php echo $userinfo['ability_score'];?></h4>
  </div>