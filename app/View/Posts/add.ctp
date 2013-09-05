<h2>Add post</h2>

<?php
//formのヘルパーを利用
//inputでは、取ってきた情報とDBのカラムを合わせてくれる
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('row'=>3));
echo $this->Form->end('Save Post');

?>
