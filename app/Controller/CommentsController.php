<?php
//続きはここから
class CommentsController extends AppController {
  public $helpers = array('Html', 'Form');

  public function add() {
    if($this->request->is('post')) {
      if($this->Comment->save($this->request->data)) {
        $this->Session->setFlash('Success!');
        $this->redirect(array('controller'=>'posts', 'action'=>'view',$this->data['Comment']['post_id']));
      }else{
        $this->Session->setFlash('failed');
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
      if($this->Comment->delete($id)) {
        $this->autoRender = false;
        $this->autoLayout = false;
        $response = array('id' => $id);
        $this->header('Content-Type: application/json');
        echo json_encode($response);
        exit();
      }
    }
    $this->redirect(array('Controller'=>'posts', 'action'=>'index'));
  }
}
?>
