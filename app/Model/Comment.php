<?php
//アソシエーションを活用している
class Comment extends AppModel {
  //全てのコメントはPostモデルに依存するという意味
  public $belongsTo = 'Post';
}

?>
