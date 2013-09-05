<?php
//同値のユーザ名が入ってきたらどうするか？
class IpsoController extends AppController{
  //ヘルパーとしてhtml, form, javascriptを呼び出している
  public $helpers = array('Html', 'Form');
  public $theme = "Cakestrap";
  //使うモデルを宣言している
  var $uses = array('User','Question');
  //var $helpers = array('Javascript');
		
	//indexアクション（認証が必要なページ）
  public function index(){
    //アクセス情報をビューに渡す
    $this->set('userinfo',$this->Auth->user());
    $this->set('questions', $this->Question->find('all', array(
                                                               'fields' => array(
                                                                                 'Question.id', 
                                                                                 'Question.title', 
                                                                                 'Question.text', 
                                                                                 'Question.difficult', 
                                                                                 'Question.testdata_num'))
                                                              ));
    
    $this->set('title_for_layout', 'メイン画面');
  }
  
  public function logout(){
    $this->Auth->logout();
  }
  
}
?>
