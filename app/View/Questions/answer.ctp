
<h3 style="text-align:center">
  <div id="header" class="container" style="background:gray;">
    <?php echo $question['Question']['title']?>
  </div>
</h3>
 
<div class="container">
  <div class="row">
    <div class="span6">
      <!-- この画面で書かれたプログラムソースをpostでquestions/auto_assessmentに投げる -->
      <form action="/questions/auto_assessment/<?php echo $question['Question']['id'];?>" method="post">
        <div class="form-group">
          <h4 style="text-align:center">プログラムコード記述欄</h4>
          <textarea class="span6" name="program_code" rows="20"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="プログラムを投稿" class="btn btn-primary">
        </div>
      </form>      
    </div>
    <div class="span6">
      <h4 style="text-align:center">問題文</h4>
      <textarea readonly class="span6" rows="20"><?php echo $question['Question']['text']; ?></textarea>
    </div>
  </div>


  <div id="footer">
    <a href="/questions/all" class="btn btn-inverse btn-large">戻る</a>
  </div>
</div>