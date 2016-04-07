<?php
class Contact extends AppModel {
	var $name = 'Contact';
    var $useTable = false;

    var $_schema = array(
        'name'              => array('type' => 'string', 'length' => 100),
        'email'             => array('type' => 'string', 'length' => 100),
        'phone'             => array('type' => 'string', 'length' => 100),
        'comments'          => array('type' => 'text')
    );

    public $validate = array(
        'name' => array(
            'required' => array('rule' => array('minlength', 1), 'message' => 'EmptyName')
        ),
        'email' => array(
            'required' => array('rule' => array('minlength', 1), 'message' => 'EmptyEmail'),
            'email' => array('rule' => 'email', 'message' => 'SyntaxEmail'),
            //'last' => true
        )
    );


}
?>