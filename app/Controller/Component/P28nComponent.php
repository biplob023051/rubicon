<?php
App::uses('Component', 'Controller'); 
class P28nComponent extends Component {
    public $components = array('Session', 'Cookie');
    
    function startup() { // The 'startup method' is called after the controller's beforeFilter method but before the controller executes the current action handler.
    	if (!$this->Session->check('Config.language')) {
    		//debug(DEFAULT_LANGUAGE);
    		$this->change(DEFAULT_LANGUAGE);
    	}
    }
    
    function change($lang = null) {
        if (!empty($lang)) {
            CakeSession::write('Config.language', $lang);
            CakeSession::write('Config.languageID', Configure::read('lngId.'.$lang));
            return true;
        }
    }
}