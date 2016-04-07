<?php
class NewsController extends AppController{
    var $name = 'News';

    function index(){

        //Configure::write('debug', 0);
        $this->layout = 'ajax';

        if ($this->RequestHandler->isAjax()) {
             if (!empty($this->request->data)) {
                 $this->News->set($this->request->data['News']);
                 //$this->News->Behaviors->attach('Captcha');
                 if($this->News->validates()) {

                     $this->Email->reset();
                     $this->Email->to  = Configure::read('AdminEmail');
                     $this->Email->bcc = Configure::read('BCC');
                     $this->Email->subject = 'Anmeldung zum Newsletter';
                     $this->Email->from = Configure::read('AdminEmail');
                     $this->Email->template = 'news';
                     $this->Email->sendAs = 'both';

                     if($this->Email->send()){
                        $message = __('Ihre E-Mailadresse wurde erfolgreich in unserem Verteiler eingetragen. Wir bedanken uns für Ihr Interesse.');
                        $this->request->data['target'] = 'NewsIndexForm';
                        $data = $this->request->data;
                        $this->set('success', compact('message', 'data'));
                     }

                     // TODO send email to user with confirm token
                 }else{
                    $message = __('Es sind Fehler aufgetreten.');
                    $News = $this->News->invalidFields(); //debug($News);
                    $News['target'] = 'NewsIndexForm';
                    $data = compact('News');
                    $this->set('errors', compact('message', 'data'));
                 }
             }
        }
    }

    function rus(){
        //Configure::write('debug', 2);
        $this->layout = 'ajax';

        if ($this->RequestHandler->isAjax()) {
            if (!empty($this->request->data)) {
                // Rename data from 'Rus' to 'News'
                $this->request->data['News']['name'] = $this->request->data['Rus']['name'];
                $this->request->data['News']['email'] = $this->request->data['Rus']['email'];
                $this->request->data['News']['phone'] = $this->request->data['Rus']['phone'];
                unset($this->request->data['Rus']);

                $this->News->set($this->request->data['News']);
                //$this->News->Behaviors->attach('Captcha');

                //debug( $this->request->data);

                if($this->News->validates()) {
                    $this->Email->reset();
                    $this->Email->to  = Configure::read('AdminEmail');
                    $this->Email->bcc = Configure::read('BCC');
                    $this->Email->subject = 'Anfrage Russisch';
                    $this->Email->from = $this->request->data['News']['email'];
                    $this->Email->template = 'rus';
                    $this->Email->sendAs = 'both';

                    if($this->Email->send()){
                        $message = __('Wir bedanken uns für Ihr Interesse. Unser russisch-sprachiger Mitarbeiter wird Sie sofort kontaktieren.');
                        $this->request->data['target'] = 'RusIndexForm';
                        $data = $this->request->data;
                        $this->set('success', compact('message', 'data'));
                    }
                }else{
                    $message = __('Es sind Fehler aufgetreten.');
                    $Rus = $this->News->invalidFields(); //debug($Rus);
                    $Rus['target'] = 'RusIndexForm';
                    $data = compact('Rus');
                    $this->set('errors', compact('message', 'data'));
                }

            }
        }
    }

    function confirm($token){
        // TODO verify token
    }

}
?>