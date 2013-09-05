<!-- 3/30以降はここを少し修正して、ここにメイン画面を作成する -->
<!doctype html>
<html lang="ja">
<head>
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

</head>
<body>
<?php //echo $userinfo['username']; ?>
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
            <li class="active"><a href="./ipso/index">マイページ</a></li>
            <li><a href="/ipso/index">問題作成</a></li>
            <li><a href="/ipso/index">テストデータ作成</a></li>
            <li><a href="/ipso/logout">ログアウト</a></li>
          </ul>
          <p class="navbar-text pull-right"><a href="./Login.php">ヘルプ</a></p>
        </div><!--/.nav-collapse -->

      </div>
    </div>
  </div>

  <!-- ▼Fluidレイアウト -->
    <div class="container-fluid">

    <!-- ▼グリッドレイアウト -->
    <div class="row-fluid">

      <!-- ▼グリッド3列分の段（12列のうち） -->
      <div class="span3">

        <!-- ▼サイドバー：ナビゲーションリスト -->
        <ul class="nav nav-list">
          <li class="nav-header active">以下から問題を選択してください。</li>
          <h3><li class="active"><i class="icon-book"></i>問題選択</li></h3>
          <li><select name="question-select-box" size="20">
            <!-- DBから取得してきた問題数だけ表示 -->
            <?php for($i = 0; $i < count($questions); $i++){ ?>
              <option value="<?php echo $i;?>" onclick="ChangeQuestionInfo(<?php echo $i;?>); return false;"><?php echo $questions[$i]['Question']['title'];?></option>
            <?php } ?>
          </select></li>
          <!-- 問題を選択すると文章が変わるようにJavaScriptで実装-->
          <script type="text/javascript">
            var question_info = new Array(<?php echo count($questions);?>)
            <?php for($i = 0; $i < count($questions); $i++){ ?>
              //question_info = [question.id][testdata_num, difficult]
              question_info[<?php echo $i;?>] = [<?php echo $questions[$i]['Question']['testdata_num']; echo ","; echo $questions[$i]['Question']['difficult']?>] 
            <?php } ?>
            //id=textの内容を引数のtxtに変更する関数
            function ChangeQuestionInfo(num) {
                document.getElementById("testdata_num").innerHTML="テストデータ数：" + question_info[num][0];
                document.getElementById("difficult").innerHTML="難易度：" + question_info[num][1];
            }
          </script>

          
        </ul><!-- /.nav nav-list -->

      </div><!-- /.span3 -->

      <!-- ▼グリッド9列分の段（12列のうち） -->
      <div class="span1"></div>
      <div class="span8">

        <!-- ▼HERO -->
        <div class="hero-unit">
          <p></p>
          <form name="myform" class="form-horizontal">
            <div class="control-group">
                <div class="controls">
                  <h2><textarea class="field span20" name="myarea" id="text" rows="8">問題を選択してください</textarea></h2>
                </div>
              </div>
          </form>
          <br>
          <p>
          <a class="btn btn-primary btn-large" href="http://allabout.co.jp/gm/gc/393078/">&laquo; この問題に回答</a>
          </p>
        </div>

        <!-- ▼グリッドレイアウト -->
        <div class="row-fluid" id="Articles">
          <!--
           ▼グリッド4列分の段（12列のうち） 
          <div class="span4">
            <h2>回答状況</h2>
            <h3>回答者：13人</h3>
            <h3>正解率：65.7%</h3>
          </div> /.span4
           -->

          <!-- ▼グリッド4列分の段（12列のうち） -->
          <div class="span6">
            <h3>問題情報</h3>
            <h4 id = testdata_num> テストデータ数：0 </h4>
            <h4 id = difficult> 難易度：0 </h4>
          </div><!-- /.span4 -->

          <!-- ▼グリッド4列分の段（12列のうち） -->
          <div class="span6">
            <h3>ユーザ情報</h3>
            <h4>ユーザ名：<?php echo $userinfo['username'];?></h4>
            <h4>実力値：<?php echo $userinfo['ability_score'];?></h4>
          </div><!-- /.span4 -->

        </div><!-- /.row-fluid -->

      
    <hr>
  </div><!-- /.container-fluid -->
</body>
</html>

