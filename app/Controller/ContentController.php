<?php
class ContentController extends AppController{
    var $name = 'Content';

    function links(){
        
    }
    function team(){

    }
    function sell(){

    }
    function vip(){

    }
    function immobiliencanarien(){

    }

    function sitemap(){
        $Gesamtobjekt = ClassRegistry::init('Gesamtobjekt');

        $results = $Gesamtobjekt->find('all', array(
                                                'conditions' => array(
                                                    'OBJ_SICHTBAR = 1'
                                                ),
                                            'fields' => 'DISTINCT OBJ_NUMMER, OBJ_ID, OBI_ID, OBJ_UET_UEBERSCHRIFT, OBI_UET_BESCHREIBUNG, REG_ID, REG_NAME, BER_ID, BER_NAME, BER_EXPOSERELEVANT',
                                            'order' => array('OBJ_FKID_OBA_ID ASC')
                                              ));
        //debug($results);
        $this->set('objects', $Gesamtobjekt->manipulateSearchResults($results));

    }

    function IE6(){
        $this->layout = 'IE6';
    }

    function video(){
        //debug($this->request->params);
        //debug(in_array($this->request->params['named']['vid'], Configure::read('youTubeIds')));
        if(!in_array($this->request->params['vid'], Configure::read('youTubeIds'))){
            $this->redirect('/');
        }
    }

}
?>