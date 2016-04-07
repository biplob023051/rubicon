<?php
class UsersController extends AppController{
    var $name = 'User';
    var $components = array('Auth');

    function beforeFilter(){
        parent::beforeFilter();

        $this->Auth->allowedActions = array('display', 'index', 'add');
        $this->Auth->autoRedirect = false;

//        if (array_key_exists('xusername', $this->data['User'])){
//            $this->data['User']['username'] = $this->data['User']['xusername']; unset($this->data['User']['xusername']);
//        }
//        if (array_key_exists('xpassword', $this->data['User'])){
//            $this->data['User']['password'] = $this->data['User']['xpassword']; unset($this->data['User']['xpassword']);
//        }
        //debug($this->data);
        //$this->Auth->loginError = __('Benutzer / Passwort nicht korrekt');

        $this->Auth->logoutRedirect = array('controller' => 'bookmark', 'action' => 'search');
        $this->Auth->loginRedirect = array('controller' => 'bookmark', 'action' => 'search');
    }

    function login() {

        //Configure::write('debug', 0);
        $this->layout = 'ajax';

        $response = array('success' => false);

        if ($this->RequestHandler->isAjax()) {

            if($this->Auth->User()){

                $id = $this->Auth->User('ben_id');
                $this->User->id = $id;
                $this->User->saveField('ben_last_login', date ( 'Y-m-d H:i:s' ));

                $message = __('Erfolgreicher Login, Seite wird geladen ...');
                $data['target'] = 'UserLoginForm';
                $data['controller'] = 'bookmark';
                $data['action'] = 'search';
                $data = $this->Auth->loginRedirect;
                $this->set('success', compact('message', 'data'));

            }else{

                $message = __('Es sind Fehler aufgetreten!');
                $data['User']['password'] = __('E-Mail / Passwort nicht korrekt!');
                $data['target'] = 'UserLoginForm';
                $this->set('errors', compact('message', 'data'));
            }
        }

    }

    function logout() {
	   $this->redirect($this->Auth->logout());
	}

    function add(){
        //Configure::write('debug', 0);
        $this->layout = 'ajax';

        if ($this->RequestHandler->isAjax()) {
            if (!empty($this->data)) {
                $this->User->create();
                $this->User->set($this->data['User']);
                $this->User->Behaviors->attach('Captcha');
                //debug($this->data);

                if($this->User->validates()) {


//                    $results2 = $this->User->query('
//                    INSERT INTO benutzer
//                    (ben_name, ben_email, username, password, ben_telefon, ben_ort, ben_land)
//                    VALUES
//                    ("'.$this->data['User']['ben_name'].'", "'.$this->data['User']['ben_email'].'", "'.$this->data['User']['ben_email'].'", "'.AuthComponent::password($this->data['User']['ben_password'], NULL, TRUE).'", "'.$this->data['User']['ben_telefon'].'", "'.$this->data['User']['ben_ort'].'", "'.$this->data['User']['ben_land'].'")
//                    ');
                    //debug($results2); die;

                    if ($this->User->save($this->data)) {
                    //if ($results2) {
                        $message = __('Der Zugang zu Ihrer Merkliste wurde abgespeichert. Sie können sich jetzt mit Ihren Zugangsdaten in Ihre Merkliste einloggen.');
                        $this->data['target'] = 'UserAddForm';
                        $data = $this->data;
                        $this->set('success', compact('message', 'data'));
                    }
                }else{
                    $message = __('Es sind Fehler aufgetreten.');
                    $User = $this->User->invalidFields();
                        if (array_key_exists('username', $User)){
                            $User['xusername'] = $User['username']; unset($User['username']);
                        }if (array_key_exists('passwd', $User)){
                            $User['xpassword'] = $User['passwd']; unset($User['passwd']);
                        }

                    $User['target'] = 'UserAddForm';
                    //debug($User);
                    $data = compact('User');
                    $this->set('errors', compact('message', 'data'));
                }
            }
        }
    }
}
?>