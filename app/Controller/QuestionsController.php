<?php
class QuestionsController extends AppController{
  public $helpers = array('Html', 'Form');
  public $theme = "Cakestrap";
    
  //indexアクション（認証が必要なページ）
  public function autojudge(){
    //アクセス情報をビューに渡す
    $this->set('userinfo',$this->Auth->user());
    $this->set('title_for_layout', 'メイン画面');
  }
  
  public function logout(){
    $this->Auth->logout();
  }
  

}
?>
