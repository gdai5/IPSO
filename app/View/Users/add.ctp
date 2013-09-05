<h2>新規登録</h2>

<?php
echo $this->Form->create('User');
echo $this->Form->input('username',array('label'=>'ユーザ名（＊半角英数字）'));
echo $this->Form->input('password',array('label'=>'パスワード（＊８文字以上）'));
echo $this->Form->end('登録');

?>

<?php
//ここをもっと綺麗なボタンで表現したい 
echo $this->Html->link('戻る', '/users/login');
//echo $this->Form->submit('戻る',array('onclick'=>'window.OpenidUrl'));  
?>