<?php

/**
 * Usersはログイン画面とユーザの新規登録画面を構成している
 * 存在する画面
 * View/Users/login.ctp  ログイン画面
 * View/Users/add.ctp    ユーザの新規登録
 */
class UsersController extends AppController{
	public $helpers = array('Html', 'Form');
	
	//ログインアクション（認証が不要なページ）
 	public function login(){
 	  $this->set('title_for_layout', 'ログイン画面');
 	  //POST送信なら
 	  if($this->request->is('post')) {
 	    //ログインが大丈夫かどうかの判定
 		if($this->Auth->login()) {
 		  //無事ログインできた場合
   		  //Auth指定のログインページへ移動
 		  return $this->redirect($this->Auth->redirect());
 		} else {
 		  //ログインNGなら
 		  $this->Session->setFlash(__('ユーザ名かパスワードが違います'), 'default', array(), 'auth');
        }
 	  } 
    }	
	
	//ログアウトアクション（認証が不要なページ）
 	public function logout(){
 	  $this->Auth->logout();
 	}
	
	public function add() {
	  $this->set('title_for_layout', '新規登録');
	  if($this->request->is('post')) {
	    $this->User->create();
		if($this->User->save($this->request->data)) {
		  $this->Session->setFlash('登録されました');	
		  $this->redirect(array('controller'=>'users','action'=>'login'));	
        }else{
          $this->Session->setFlash('登録に失敗しました');
        }
      }
    }
    
}
?>