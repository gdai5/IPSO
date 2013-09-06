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
    $this->set('questions_info', $this->Question->find('all', array(
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
  
  public function my_page() {
    $user = $this->Auth->user();  
    $user_id = $user['id'];
    //status.created_at, questions.title, questions.difficult, questions.resultを取得するための設定
    /*
     * select status.created_at, questions.title, questions.difficult, questions.result
     * from questions
     * inner join status on questions.id = status.question_id
     * where status.user_id = [ログインしているユーザid]
     * order by status.id <=id statusテーブルにはどんどん情報が積み重なるのでソートしてidが大きい順＝つまり最近作られたもの
     * limit 10
     */
    $params = array(
      'joins' => array(
        array('table'=>'status', 'type'=>'INNER', 
          'conditions'=>array(
            'Question.id = status.question_id',
          )
        )
      ),
      'order' => 'status.id desc', 
      'limit' => 10, 
      'fields' => array('status.created_at', 'Question.title', 'Question.difficult', 'status.result'), 
      'conditions' => array('status.user_id' => $user_id)
    );
    $history = $this->Question->find('all', $params);
    
    //アクセス情報をビューに渡す
    $this->set('userinfo',$user);
    $this->set('title_for_layout', 'マイページ');
    $this->set('history', $history);
    $this->set('result_num', $this->make_result_array());
  }
  
}
?>
