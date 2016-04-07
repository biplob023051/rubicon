<?php
App::uses('Component', 'Controller');
class TranslatorComponent extends Component {
    var $name = 'Translator';

    public function translate($id = null, $sprID){
        if(empty($id)){
            return __('!! missing translation !!');
        }else{
            // TODO $lang = 7 & 17
            if($sprID == 7 || $sprID == 17) { return $this->translate($id, 5); }

            $Uebersetzungen = ClassRegistry::init('Uebersetzungen');

            $translatedString = $Uebersetzungen->find('first', array(
                'conditions' => array(
                    'Uebersetzungen.UEB_NUMMER = '. $id
                    ,
                    'Uebersetzungen.UEB_FKID_SPR_ID = '.$sprID
            ),
            'fields' => array('UEB_TEXT')
            ));
        }
        if (isset($translatedString['Uebersetzungen']) && isset($translatedString['Uebersetzungen']['UEB_TEXT'])) {
               return $translatedString['Uebersetzungen']['UEB_TEXT'];
       } else {
               return __('!! missing translation !!');
       }
    }
}
?>