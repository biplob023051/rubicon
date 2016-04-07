<?php
class Objektarten extends AppModel {
	var $name = 'Objektarten';
    var $useTable = 'Objektarten';
    var $primaryKey = 'OBA_ID';

    var $belongsTo = array(
		'Objektarteninternet' => array(
			'className' => 'Objektarteninternet',
			'foreignKey' => 'OBA_FKID_OBI_ID',
			'conditions' => '',
			'fields' => 'OBI_ID, OBI_UEN_BESCHREIBUNG, OBI_SORTIERUNG',
			'order' => ''
		)
	);
}
?>