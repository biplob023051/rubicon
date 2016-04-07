<?php
// called by elements/flags.ctp
class SprachenController extends AppController{
    function getLanguages(){
        $this->autoRender = false;
        // find all languages => all active => ordered by priority
        $results = $this->Sprachen->find('all', array(
                                                'conditions' => array(
                                                    'Sprachen.SPR_UEB_VORHANDEN' => 1,
                                                    'Uebersetzungen.UEB_FKID_SPR_ID' => $this->Session->read('Config.languageID')
                                                    
                                                ),
                                                  'fields' => array(
                                                      'Sprachen.SPR_ID', 'Uebersetzungen.UEB_TEXT'
                                                  ),
                                                'order' =>  array('Sprachen.SPR_SORTIERUNG ASC')
                                              ));
        //debug($results);
        return $results;
    }
}
