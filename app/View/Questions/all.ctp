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
            <li class="active"><a href="/questions/all">問題選択</a></li>
            <li><a href="/testdatas/make">テストデータ作成</a></li>
            <li><a href="/ipso/logout">ログアウト</a></li>
          </ul>
          <p class="navbar-text pull-right"><a href="./Login.php">ヘルプ</a></p>
        </div><!--/.nav-collapse -->

      </div>
    </div>
  </div>
<h2>問題集</h2>
<ul>
  <?php foreach ($questions_info as $question) : ?>
    <li>
      <?php 
        echo $this->Html->link($question['Question']['title'],'/questions/select/'.$question['Question']['id']);
      ?>
    </li>
  <?php endforeach; ?>
</ul>