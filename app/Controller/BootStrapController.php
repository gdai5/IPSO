<?php
//同値のユーザ名が入ってきたらどうするか？
class BootStrapController extends AppController{
  public $helpers = array('Html', 'Form');
    
  //indexアクション（認証が必要なページ）
  public function index(){
  }
}
?>