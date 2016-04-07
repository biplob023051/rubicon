<?php
class Smscallback extends AppModel {
	var $name = 'Smscallback';
    var $useTable = false;

    var $_schema = array(
        'name'              => array('type' => 'string', 'length' => 100),
        'email'             => array('type' => 'string', 'length' => 255),
        'tel_country'       => array('type' => 'text', 'length' => 5),
        'tel_pre'           => array('type' => 'text', 'length' => 6),
        'tel_number'        => array('type' => 'text', 'length' => 20)
    );

    var $validate = array(
        'name' => array(
            'required' => array('rule' => array('minlength', 1), 'message' => 'EmptyName')
        ),
        'email' => array(
            'required' => array('rule' => array('minlength', 1), 'message' => 'EmptyEmail'),
            'email' => array('rule' => 'email', 'message' => 'SyntaxEmail'),
            //'last' => true
        ),
        'tel_country' => array(
            //'required' => array('rule' => 'notEmpty', 'message' => 'EmptyTel_country'),
            'num' => array('rule' => 'numeric', 'message' => 'NummericTel_country'),
            'maxlen' => array('rule' => array('maxLength', 4), 'message' => 'NummericTel_max'),
            'minlen' => array('rule' => array('minLength', 2), 'message' => 'NummericTel_min'),
            //'last' => true
        ),
        'tel_pre' => array(
            //'required' => array('rule' => 'notEmpty', 'message' => 'EmptyTel_pre'),
            'num' => array('rule' => 'numeric', 'message' => 'NummericTel_pre'),
            //'last' => true
        ),
        'tel_number' => array(
            //'required' => array('rule' => 'notEmpty', 'message' => 'EmptyTel_number'),
            'num' => array('rule' => 'numeric', 'message' => 'NummericTel_number'),
            //'last' => true
        )
    );
}
?>