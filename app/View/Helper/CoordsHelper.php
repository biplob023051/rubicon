<?php
App::uses('AppHelper', 'View/Helper');

class CoordsHelper extends AppHelper {
    var $helpers = array ('Coords');

    public function getGeo($obj_id){

        $Gesamtobjekt= ClassRegistry::init('Gesamtobjekt');
        $Gesamtobjekt->bindModel(array('belongsTo' => array('Regionen' => array('foreignKey' => 'REG_ID'))));

        $data = $Gesamtobjekt->find('first', array(
                                         'conditions' => array(
                                             'OBJ_ID = '.$obj_id
                                         ),
                                         'fields' => array('Regionen.reg_latitude', 'Regionen.reg_longitude')
                                    )); //debug($data);
        return $data['Regionen'];
    }


}
?>
