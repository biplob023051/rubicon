<?php
class News extends AppModel {
	var $name = 'News';
    var $useTable = false;

    var $_schema = array(
        'email'             => array('type' => 'string', 'length' => 100)
    );

    var $validate = array(
        'name' => array(
            'required' => array('rule' => 'notEmpty', 'required' => true, 'allowEmpty' => false, 'message' => 'EmptyName'),
        ),
        'email' => array(
            'required' => array('rule' => array('minlength', 1), 'message' => 'EmptyEmail'),
            'email' => array('rule' => 'email', 'message' => 'SyntaxEmail'),
        )
    );
}
?>