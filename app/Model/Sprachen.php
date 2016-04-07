<?php
class Sprachen extends AppModel {
	var $name = 'Sprachen';
    var $useTable = 'Sprachen';
    var $primaryKey = 'SPR_ID';

    var $belongsTo = array(
		'Uebersetzungen' => array(
			'className' => 'Uebersetzungen',
			'foreignKey' => 'SPR_UEN_SPRACHE',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>