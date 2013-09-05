<?php
//ここで定めたクラス名が、データの受け取り名になる？
class Post extends AppModel {
  public $hasMany = "Comment";

  //$validate addのsave時に呼ばれる
  public $validate = array(
    'title' => array (
      'rule' => 'notEmpty',
      'message' => '最低一文字以上入力してください'
    ),
    'body' => array(
      'rule' => 'notEmpty', 
      'message' => '最低一文字以上入力してください'
    )
  );
}

?>
