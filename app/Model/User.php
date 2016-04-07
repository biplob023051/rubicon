<?php
class User extends AppModel {
	var $name = 'User';
    var $useTable = 'benutzer';
    var $primaryKey = 'ben_id';

    var $hasMany = array(
		'Bookmark' => array(
			'className' => 'Bookmark',
			'foreignKey' => 'mez_fkid_ben_id',
			'conditions' => '',
			'order' => ''
		)
	);

//    function beforeValidate(){
//        if (array_key_exists('ben_email', $this->data['User'])){
//            $this->data['User']['username'] = $this->data['User']['ben_email']; //unset($this->data['User']['ben_email']);
//        }
//        if (array_key_exists('ben_password', $this->data['User'])){
//            $this->data['User']['password'] = $this->data['User']['ben_password']; //unset($this->data['User']['ben_password']);
//        }
//        //debug($this->data);
//        return true;
//    }

    var $validate = array(
        'ben_name' => array(
            'required' => array('rule' => 'notEmpty', 'message' => 'EmptyName')
        ),
        'username' => array(
            'required' => array('rule' => 'notEmpty', 'message' => 'EmptyEmail', 'required' => true, 'allowEmpty' => false, 'last' => true),
            'email' => array('rule' => array('email', true), 'message' => 'SyntaxEmail'),
            'unique' => array('rule' => 'isUnique', 'message' => 'EmailNotUnique')
        ),
        'passwd' => array(
            'required' => array('rule' => 'notEmpty', 'message' => 'EmptyPassword', 'required' => true, 'allowEmpty' => false, 'last' => true),
            'between' => array('rule' => array('between', 6,15), 'message' => 'ToShortPassword', 'last' => true)
        )
    );

    function hashPasswords($data){
        //debug($data);
        if(isset($this->data['User']['passwd'])){
            // 2. Parameter = type of hash eg. sha1 by default, md5, etc
            // 3. Use of security.salt
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['passwd'], NULL, TRUE);
            return $data;
        }
        return $data;
    }

    function beforeSave(){
        $this->hashPasswords(NULL, TRUE);
        return true;
    }
}
?>