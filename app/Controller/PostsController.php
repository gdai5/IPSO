<?php

class PostsController extends AppController {
  //決まり文句（cakephpが用意しているhelperが使えるようになる）
  public $helpers = array('Html', 'Form');

  public function index() {
    //$params = array(
    //  'order' => 'modified desc',
    //  'limit' => 2
    //);
    $this->set('posts', $this->Post->find('all'));
    $this->set('title_for_layout', '記事一覧');
  }

  public function view($id = null) {
    $this->Post->id = $id;
    $this->set('post', $this->Post->read());
  }

  public function add() {
    if($this->request->is('post')) {
      if($this->Post->save($this->request->data)) {
        $this->Session->setFlash('Success!');
        //以下のものではroutes.phpのものを採用する
        //もしroutes.phpに設定していない
        //かつ、コントローラも設定していなければ、postsが呼ばれる
        $this->redirect(array('action'=>'index'));
      }else{
        $this->Session->setFlash('failed');
      }
    }
  }

  public function edit($id = null) {
    $this->Post->id = $id;
    //get形式で受け取る
    if($this->request->is('get')) {
      //これでモデルの中にデータを入れてくれる
      $this->request->data = $this->Post->read();
    }else{//postで受け取った場合の処理
      if($this->Post->save($this->request->data)) {
        $this->Session->setFlash('success!');
        $this->redirect(array('action'=>'index'));
      }else{
        $this->Sesstion->setFlash('failed!');
      }
    }
  }
  public function delete($id) {
    if($this->request->is('get')) {
      //posts/delete/id番号で削除できないような対策
      throw new MethodNotAllowedException();
    }
    //ajax version
    if($this->request->is('ajax')) {
      if($this->Post->delete($id)) {
        $this->autoRender = false;
        $this->autoLayout = false;
        $response = array('id' => $id);
        $this->header('Content-Type: application/json');
        echo json_encode($response);
        exit();
      }
    }
    $this->redirect(array('action'=>'index'));
    //nomal version
    //if($this->Post->delete($id)) {
    //  $this->Session->setFlash('Deleted!');
    // $this->redirect(array('action'=>'index'));
    //}
  }
}
?>
