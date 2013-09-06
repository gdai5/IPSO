<?php
class QuestionsController extends AppController{
  public $helpers = array('Html', 'Form');
  public $theme = "Cakestrap";
  var $uses = array('Question');
  
  //問題の一覧を表示する
  public function all() {
    $this->set('title_for_layout', '問題選択');
    $this->set('questions_info', $this->Question->find('all', array(
                                                               'fields' => array(
                                                                                 'Question.id', 
                                                                                 'Question.title', 
                                                                                 'Question.text', 
                                                                                 'Question.difficult', 
                                                                                 'Question.testdata_num'))
                                                              ));
  }
  
  //上のallで選択した問題の情報閲覧画面
  public function select($id = null) {
    $this->Question->id = $id;
    $this->set('question', $this->Question->read());
    $this->set('title_for_layout', '問題選択');
  }
  
  //上のselectで「問題解答」ボタンを押したら飛ぶ場所
  //ここでユーザはコードを書く
  public function answer($id = null) {
    $this->Question->id = $id;
    $this->set('question', $this->Question->read());
  }
  
  /**
   * getで渡されるquestions.idとpostで渡されたprogram_codeを自動判定を行う
   */
  public function auto_assessment($id = null) {
    $this->set('userinfo',$this->Auth->user());
    $this->Question->id = $id;
    $this->set('question', $this->Question->read());
    $program_code = $_POST['program_code'];
    $this->set('program_code',$program_code);
  }

}
?>
