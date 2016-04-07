<?php
class Objekt extends AppModel {
	var $name = 'Objekt';
    var $useTable = 'Objekte';
    var $primaryKey = 'OBJ_ID';

    var $belongsTo = array(
		'Objektarten' => array(
			'className' => 'Objektarten',
			'foreignKey' => 'OBJ_FKID_OBA_ID',
			'conditions' => '',
			'fields' => 'OBA_ID, OBA_FKID_OBI_ID',
			'order' => ''
		)
	);



    function getCategories(){
        $this->autoRender = false;
        // TODO $lang = 7 & 17
        $results = $this->query('
            SELECT OBI_ID,
                   OBI_SORTIERUNG,
                   UEB_TEXT
            FROM   Uebersetzungen
                     JOIN Objektarten_internet AS Objektarteninternet ON (OBI_UEN_BESCHREIBUNG = UEB_NUMMER)
            WHERE  OBI_ID IN (
                SELECT OBA_FKID_OBI_ID
                FROM   Objekte
                       JOIN Objektarten ON (OBJ_FKID_OBA_ID = OBA_ID)
                WHERE  OBA_FKID_OBI_ID = OBI_ID
            )
            AND    UEB_FKID_SPR_ID = '.CakeSession::read('Config.languageID').'
        ');

        // add static categories from Configure::read('SpecialCats');
        //array_push($results, Configure::read('SpecialCats.0'));
        array_push($results, Configure::read('SpecialCats.1'));
        array_push($results, Configure::read('SpecialCats.2'));
        array_push($results, Configure::read('SpecialCats.3'));


        foreach($results as $key => $value){
            $sort[$key] = $value['Objektarteninternet']['OBI_SORTIERUNG'];
        }

        array_multisort($sort, SORT_ASC, $results);
        //debug($results);
        return $results;
    }

    function getCities(){
        $this->autoRender = false;
        $results = $this->query('
            SELECT DISTINCT
                   REG_NAME,
                   CASE BER_EXPOSERELEVANT WHEN 1 THEN BER_NAME END AS BER_NAME,
                   REG_ID,
                   CASE REG_EXPOSERELEVANT WHEN 1 THEN BER_ID END AS BER_ID
            FROM   Regionen
                   JOIN Bereiche ON (BER_FKID_REG_ID = REG_ID)
            WHERE  BER_ID IN (
                SELECT OBJ_FKID_BER_ID
                FROM   Objekte
                WHERE  OBJ_FKID_BER_ID = BER_ID
            )
            ORDER BY REG_NAME ASC, BER_NAME ASC
        ');

        return $results;
    }

}
