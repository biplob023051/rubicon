<?php
class Bookmark extends AppModel {
	var $name = 'Bookmark';
    var $useTable = 'link_obj_ben';
    var $primaryKey = 'mez_fkid_obj_id';

    var $_schema = array(
        'ben_name'              => array('type' => 'string', 'length' => 100),
        'ben_email'             => array('type' => 'string', 'length' => 100),
        'ben_telefon'           => array('type' => 'text', 'length' => 100),
        'ben_ort'               => array('type' => 'text', 'length' => 100),
        'ben_land'              => array('type' => 'text', 'length' => 100),
        'security_code'         => array('type' => 'string', 'length' => 2)
    );

    var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'mez_fkid_ben_id',
			'conditions' => '',
			'order' => '',
            'fields' => 'ben_id',
		)
	);


}
?>