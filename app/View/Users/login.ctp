<?php 
  //上手くログインできない原因はnameをusernameにしていなかったため
  //簡単な話し、命名規約に違反していたということ。
	echo $this->Session->flash('auth');
	echo "<h2>ログイン画面</h2>";
 	echo $this->Form->create('User'); 
 	echo $this->Form->input('username', array('label' => 'ユーザ名')); 
 	echo $this->Form->input('password', array('label' => 'パスワード')); 
 	echo $this->Form->end('ログイン'); 
?>
<h3>
	新規登録はこちらから→
	<?php echo $this->Html->link('新規登録', '/users/add'); ?>
</h3>

