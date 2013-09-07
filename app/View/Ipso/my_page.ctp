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
            <!-- pull down meny（問題） -->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">問題<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/questions/all">問題一覧</a></li>
                <li><a href="/questions/code_perusal">他ユーザのコード閲覧</a></li>
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
  <!-- 上部ナビゲーション end -->
  
<div class="row-fluid">
  <!-- span4 -->
  <div class="span4">
    <h3 style="text-align:center"><i class="icon-user"></i>ユーザ情報</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID番号</th>
          <th>名前</th>
          <th>実力</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $userinfo['id'];?></td>
          <td><?php echo $userinfo['username'];?></td>
          <td><?php echo $userinfo['ability_score'];?></td>
        </tr>    
      </tbody>
    </table>
  </div>
  <!-- span4 end -->
  
  <!-- span8 -->
  <div class="span8">
    <h3 style="text-align:center">履歴（最新１０件）</h3>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>日付</th>
          <th>タイトル</th>
          <th>難易度</th>
          <th>結果</th>
        </tr>
      </thead>
      <tbody>
        <?php for($i = 0; $i < count($history); $i++) { ?>
          <tr>
            <td><?php echo $history[$i]['status']['created_at'];?></td>
            <td><?php echo $history[$i]['Question']['title'];?></td>
            <td><?php echo $history[$i]['Question']['difficult'];?></td>
            <td><?php echo $history[$i]['status']['result'];?></td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>