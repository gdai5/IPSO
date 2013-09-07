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
   * getで渡されるquestions.idとpostで渡されたprogram_codeを用いて自動正誤判定および自動評価を行う
   * @param $id = questions.id
   * Viewに渡す情報
   * １：全てのテストデータを実行した時の正誤表
   * ２：正誤判定結果
   * ３：自動評価で「ユーザの実力」「問題の難易度がどのように変化したのかを表示する」
   */
  public function auto_assessment($id = null) {
    $program_code  = $_POST['program_code'];
    $user_info     = $this->Auth->user();
    //取ってくる問題情報のidを指定
    $this->Question->id = $id;
    //セットしたidの問題を取得
    $question_info = $this->Question->read();
    
    $this->set('question', $question_info);
    $this->set('userinfo', $user_info);
    
    //$this->set('program_code',$program_code)
  }
  
  /**
   * チャレンジを一回以上した問題に対して、他のユーザのコードを閲覧するこができる
   * 流れ：チャレンジした問題一覧 => その問題に正解できた人一覧 => その人のプログラムコードを閲覧
   * DBから必要な情報を取得するためのsql
   * select users.ability_score, users.username, 
   */
  public function code_perusal() {
    
  }
  
  /**
   * 完了：7/8
   * 一時フォルダの生成およびMain.javaの存在確認
   * @param user_id
   * @return true or false
   */
  public final function mkDirectory($user_id) {
      $this->temporary_dir_name = $this->getUniquName($user_id, $question_id);
      $this->chkDirecotryExist();
      exec("mkdir ./". DIRECTORY_PASS ."/$this->temporary_dir_name");
      exec("cp ./Main.java ./". DIRECTORY_PASS ."/$this->temporary_dir_name");
      if(!$this->chkFileExist()){
          return false;
      }
      return true;
  }

}
?>
