<!-- 3/30以降はここを少し修正して、ここにメイン画面を作成する -->
<!doctype html>

<meta http-equiv="content-type" content="text/html; charset=utf-8">

<div id="header">
  <pre  style="border-width: 4px;"><center><h3><?php echo $question['Question']['title'];?>の評価結果</h3></center></pre>
</div>


<div class="container">
    <div class="row">
      <div class="span5 offset1">
        <h3 style="text-align:center">正誤判定</h3>
        <textarea readonly class="span5" rows="15">
          -----------------test1-----------------
          Correct Output : 12
          Your Output    : 12
          Result         : Good
        
          -----------------test2-----------------
          Correct Output : 94
          Your Output    : 30
          Result         : Faile
          ・
          ・
          ・
          ・
        </textarea>
      </div>
      <!-- span5 offset1 end -->
      
      <div class="span6">
        <h3>実行結果</h3>
        <div class="row">
          <div class="span3">
            <h4>自動正誤判定結果</h4>
            <h4>テストデータ数：<?php echo $question['Question']['testdata_num'];?></h4>
            <h4>合っていた数　：1</h4>
            <h4><strong>結果：Wrong Answer</strong></h4>
          </div>
          <div class="span3">
            <h4>自動評価</h4>
            <h4>ユーザの実力</h4>
            <h4>Befor：3.4</h4>
            <h4>After：3.2</h4>
          </div>
        </div>
        <br><br>
        <a href="/questions/all" class="btn btn-inverse btn-large">問題一覧へ戻る</a>
      </div>
      <!-- span6 end -->
      
    </div>
</div>