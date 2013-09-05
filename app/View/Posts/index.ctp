<h2>記事一覧</h2>

<ul>
<?php foreach ($posts as $post) : ?>
<li id="post_<?php echo h($post['Post']['id']); ?>">
<?php
//渡されるデータを見やすくする
//debug($post);
//echo h($post['Post']['title']);
//helperで呼んでいるから使える
echo $this->Html->link($post['Post']['title'],'/posts/view/'.$post['Post']['id']);
?>  
<?php echo $this->Html->link('編集', array('action'=>'edit', $post['Post']['id'])); ?>  
<?php
//used ajax delete
//a href="#" <= こいつはリンク元の出発点を表す
echo $this->Html->link('削除', '#', array('class'=>'delete', 'data-post-id'=>$post['Post']['id']));

//nomal delete
//echo $this->Form->postLink('削除', array('action'=>'delete',  $post['Post']['id']),
//  array('confirm'=>'sure?'));
?>
</li>
<?php endforeach; ?>
</ul>

<h2>Add Post</h2>
<?php echo $this->Html->link('Add post', array('controller'=>'posts','action'=>'add')); ?>

<?php
//$('a.delete') = HTMLのa要素のdeleteというclassが付いたものを指す
?>
<script>
$(function() {
  $('a.delete').click(function(e) {
    if (confirm('sure?')) {
      $.post('/posts/delete/'+$(this).data('post-id'), {}, function(res) {
        $('#post_'+res.id).fadeOut();
      }, "json");
    }
    return false;
  });
});
</script>
