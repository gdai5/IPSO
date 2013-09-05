<?php
//ここで定めたクラス名が、データの受け取り名になる？
//validateを自分で作る
class User extends AppModel {
  //public $hasMany = "Status";
  //public $hasMany = "Testdata";

  public $validate = array(
    'username' => array (
    	array(
			'rule' => 'notEmpty',
			'requierd' => true,
			'message' => 'エラー：一文字以上入力'
		),
		array(
			'rule' => array('checkAlphabet'),
			'required' => true,
			'message' => 'エラー：半角英数字のみ'
		),
		array(
			//'rule' => array('checkUnique'),
			'rule' => 'isUnique',
			'required' => true,
			'message' => 'エラー：既に登録されている名前なので、変更してください。'		
		)
    ),
    'password' => array (
      	'rule' => array('minLength', '8'),
		'required' => true,
		'message' => 'エラー：半角英数字で8文字以上'
   	 )
  );
  
   public function beforeSave($options=array()) {
     if (isset($this->data[$this->alias]['password'])) {
       $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
  
  function checkAlphabet($data) {
  	if(preg_match("/^[a-zA-Z0-9]+$/", $data['username'])) {
  		return true;
  	}else{
  		return false;
  	}
  }
  
}
?>