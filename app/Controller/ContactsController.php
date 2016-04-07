<?php
class ContactsController extends AppController {

	var $name = 'Contact';

	function index() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';
        //debug($this->request->data);
        if ($this->RequestHandler->isAjax()) {
            if (!empty($this->request->data)) {
                $this->Contact->set($this->request->data['Contact']);
                $this->Contact->Behaviors->attach('Captcha');
                if($this->Contact->validates()) {

                    // save contact details in session
                    if(isset($this->request->data['Contact']['savedateinsession']) && $this->request->data['Contact']['savedateinsession'] == 1){
                        $this->Session->write('ContactSession', array($this->request->data['Contact']['name'], $this->request->data['Contact']['email'], $this->request->data['Contact']['phone'], $this->request->data['Contact']['comments']));
                    }

                    $obj = '';
                    if(!empty($this->request->data['Contact']['OBJ_ID'])){
                        $Objekt = ClassRegistry::init('Objekt');
                        $getobject = $Objekt->find('first', array(
                                                                       'conditions' => array(
                                                                           'Objekt.OBJ_ID = '. $this->request->data['Contact']['OBJ_ID']
                                                                       ),
                                                                        'fields' => array('OBJ_NUMMER')
                                                                  )
                        );
                    }

                    $this->set('name', $this->request->data['Contact']['name']);
                    $this->set('email', $this->request->data['Contact']['email']);
                    $this->set('phone', $this->request->data['Contact']['phone']);
                    $this->set('comments', $this->request->data['Contact']['comments']);

                    if(!empty($this->request->data['Contact']['OBJ_ID'])){
                        $this->set('singleobject', $getobject['Objekt']['OBJ_NUMMER']);
                    }

                    if(isset($this->request->data['Contact']['Objektnummer']) && is_array($this->request->data['Contact']['Objektnummer'])){
                        $this->set('moreobjects', true);
                        foreach($this->request->data['Contact']['Objektnummer'] as $objnummer){
                            $obj .= $objnummer.',';
                        }
                        $obj=substr($obj, 0, -1);
                        $this->set('moreobjectsstr', $obj);
                    }


                    $this->Email->smtpOptions = array(
                        'port'=>'465',
                        'timeout'=>'30',
                        'host' => 'ssl://smtp.1und1.de',
                        'username'=>'fpm@rubicon-casa.de',
                        'password'=>'ngjsdbikhy2H46HPDFRN',
                    );
                    $this->Email->delivery = 'mail';
                    //$this->Email->reset();
                    $this->Email->to  = Configure::read('AdminEmail');
                    $this->Email->bcc = Configure::read('BCC');
                    $this->Email->subject = 'Internetanfrage von: ' . $this->request->data['Contact']['name'];
                    $this->Email->from = Configure::read('AdminEmail');
                    $this->Email->template = 'contact';
                    $this->Email->sendAs = 'both';


                    if($this->Email->send()){
                        $message = __('Ihre Anfrage wurde erfolgreich versandt!');
                        $this->request->data['target'] = 'ContactIndexForm';
                        $data = $this->request->data;
                        $this->set('success', compact('message', 'data'));
                    }else{
                        echo $this->Email->smtpError;
                    }

                }else{
                    $message = __('Es sind Fehler aufgetreten.');
                    $Contact = $this->Contact->invalidFields();
                    $Contact['target'] = 'ContactIndexForm';
                    $data = compact('Contact');
                    $this->set('errors', compact('message', 'data'));
                }
            }
        }
    }

    function show() {
        //$this->set('mathCaptcha', $this->MathCaptcha->generateEquation());
    }


}