<?php
class SmscallbacksController extends AppController {

	var $name = 'Smscallbacks';

	function index() {
        //Configure::write('debug', 2);
        $this->layout = 'ajax';
        if ($this->RequestHandler->isAjax()) {
            if (!empty($this->request->data)) {
                $this->Smscallback->set($this->request->data['Smscallback']);
                $this->Smscallback->Behaviors->attach('Captcha');
                if($this->Smscallback->validates()) {
                $back = array();

                    $nummer = Configure::read('SMS');
		            $gw = 28;
		            $p = "4dofsmr5";

                    $Objekt = ClassRegistry::init('Objekt');
                    $getobject = $Objekt->find('first', array(
                                                                   'conditions' => array(
                                                                       'Objekt.OBJ_ID = '. $this->request->data['Smscallback']['OBJ_ID']
                                                                   ),
                                                                    'fields' => array('OBJ_NUMMER')
                                                              )
                    );
                    //debug($getobject); die();

                    $sms = "Internet Rückruf:\r";
                    $sms .= "Objekt: ". $getobject['Objekt']['OBJ_NUMMER']."\r";
                    $sms .= "Name: ". $this->request->data['Smscallback']['name']."\r";
		            $sms .= "Email: ". $this->request->data['Smscallback']['email']."\r";
		            $sms .= "Tel.: ". $this->request->data['Smscallback']['tel_country']." ".$this->request->data['Smscallback']['tel_pre']." ".$this->request->data['Smscallback']['tel_number']."\r";

                    $text = iconv("UTF-8", "ISO-8859-1//IGNORE", $sms);
                    $text = urlencode($text);

                    //debug($text); die();

                    $url = "http://gateway.any-sms.biz/send_sms.php?id=100325&pass=$p&text=$text&nummer=$nummer&gateway=$gw&absender=01787797070&notify=1";
                    //debug($url); die();

                    $fp = fsockopen ("gateway.any-sms.biz",80,$errno,$errstr,5);
                    if (!$fp) {
                        $back[0] = "keine Verbindung möglich";
                    } else {
                        $fp = @fopen($url,"r");
                        while (!feof($fp)) { $back[] = fgets($fp,100); }
                        fclose($fp);
                    }
                    //debug($back);
                    $sms .= "------------------------------------------\r";
                    $sms .= "Provider Rückmeldung:\r";
                    foreach($back as $backtext){
                        $sms .= $backtext."\r";
                    }
                    $sms .= "------------------------------------------\r";

                    // internal backup email
                    $this->Email->from = 'Webdienst';
                    $this->Email->to  = Configure::read('AdminEmail');
                    $this->Email->bcc = Configure::read('BCC');
                    $this->Email->subject = 'SMS Rückruf-Service';
                    $this->Email->send($sms);

                    $message = __('Ihre Anfrage wurde erfolgreich versandt!');
                    $this->request->data['target'] = 'SmscallbackIndexForm';
                    $data = $this->request->data;
                    $this->set('success', compact('message', 'data'));
                }else{
                    $message = __('Es sind Fehler aufgetreten.');
                    $Smscallback = $this->Smscallback->invalidFields();
                    $Smscallback['target'] = 'SmscallbackIndexForm';
                    $data = compact('Smscallback');
                    $this->set('errors', compact('message', 'data'));
                }
            }
        }
    }


}
?>