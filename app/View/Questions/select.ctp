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
  
<div class="container-fluid"> 
  <div id="header" class="container">
    <pre  style="border-width: 4px;"><h3 style="text-align:center"><?php echo $question['Question']['title']?></h3></pre>
    <textarea readonly class="span12" rows="20"><?php echo $question['Question']['text']?></textarea>
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