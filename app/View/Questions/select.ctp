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
  
<div class="container-fluid"> 
  <div id="header" class="hero-unit">
    <center><h3><?php echo $question['Question']['title']?></h3></center>
    <textarea readonly class="span10" rows="20"><?php echo $question['Question']['text']?></textarea>
    <br><br>
    <p>
      <a href="/questions/answer/<?php echo $question['Question']['id'];?>" class="btn btn-primary btn-large">この問題に挑戦</a>
      <a href="/questions/all" class="btn btn-inverse btn-large offset5">戻る</a>
    </p>
  </div>
  
  <div id="footer">
    <div class="row-fluid">
      <div class="span12">
        <h3 style="text-align:center">問題情報</h3>
        <div class="row-fluid">
          <div class="span2 offset4">
            <h4>難易度：<?php echo $question['Question']['difficult']?></h4>  
          </div>
          <div class="span6">
            <h4>テストデータ数：<?php echo $question['Question']['testdata_num']?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>