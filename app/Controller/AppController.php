<?php
/**
 * Application level Controller
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
    public $components = array('Session', 'RequestHandler', 'Email', 'MathCaptcha', 'Cookie');
    public $helpers = array('Html', 'Text', 'Resize', 'Mailto', 'Menu', 'Propertylinks', 'Bookmark', 'Flags', 'Session', 'Javascript', 'Form', 'Ajax', 'GoogleMapV3', 'Captcha', 'Coords', 'Mainmenu');

    function beforeFilter(){
//        debug($this->request->params);
//        debug(CakeSession::check());
//        debug(CakeSession::read());
//
//        debug($this->Cookie->read());
//        debug(Configure::read('lngId.'.$this->Cookie->read('lang')));
//
//
//        debug(CakeSession::check('Config.languageID'));
//        debug(CakeSession::read('Config.language'));

        $this->_setLanguage();

        if(CakeSession::read('ContactSession')){
            $this->set('ContactSession', CakeSession::read('ContactSession'));
        }
    }

    private function _setLanguage() {
    //if the cookie was previously set, and Config.language has not been set
    //write the Config.language with the value from the Cookie
        if ($this->Cookie->read('lang') && !CakeSession::check('Config.language')) {
            CakeSession::write('Config.language', $this->Cookie->read('lang'));
            CakeSession::write('Config.languageID', Configure::read('lngId.'.$this->Cookie->read('lang')));
            CakeSession::write('Config.languageShort', Configure::read('lngFile.'.CakeSession::read('Config.languageID')));
        }
        // no given language code in url, change to DEFAULT_LANGUAGE
        else if (!isset($this->params['language'])){
            CakeSession::write('Config.language', DEFAULT_LANGUAGE);
            CakeSession::write('Config.languageID', Configure::read('lngId.'.DEFAULT_LANGUAGE));
            CakeSession::write('Config.languageShort', Configure::read('lngFile.'.CakeSession::read('Config.languageID')));
            $this->Cookie->write('lang', DEFAULT_LANGUAGE, false, '20 days');
        }
        //if the user clicked the language URL
        else if (isset($this->params['language']) && ($this->params['language'] !=  CakeSession::read('Config.language'))) {
            //then update the value in Session and the one in Cookie
            CakeSession::write('Config.language', $this->params['language']);
            CakeSession::write('Config.languageID', Configure::read('lngId.'.$this->params['language']));
            CakeSession::write('Config.languageShort', Configure::read('lngFile.'.CakeSession::read('Config.languageID')));
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
        }
    }

    public function appError($error) {
//        debug($error);
        $this->redirect('/');
    }

    //override redirect
    public function redirect( $url, $status = NULL, $exit = true ) {
        if (!isset($url['language']) && $this->Session->check('Config.language')) {
            $url['language'] = CakeSession::read('Config.language');
        }
        parent::redirect($url,$status,$exit);
    }
}