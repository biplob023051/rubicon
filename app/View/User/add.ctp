<?php
$output = array();
//print_r($this->validationErrors); exit;
if (empty($this->validationErrors['User'])) $this->validationErrors = array();
if($this->validationErrors) {
    $output = Set::insert($output, 'errors', array('message' => $errors['message']));
    //debug($output);
    $errorMessages = array(
        'User' => array(
            'ben_name' => array(
                'EmptyName' => __("Bitte geben Sie Ihren Namen an.", true)
            ),
            'xusername' => array(
                'EmptyEmail' => __("Bitte geben Sie Ihre E-Mailadresse an.", true),
                'SyntaxEmail' => __("Bitte prüfen Sie auf Fehler in der Schreibweise.", true),
                'EmailNotUnique' => __("Diese E-Mailadresse gibt es schon, bitte wählen Sie eine andere.", true),
            ),
            'xpassword' => array(
                'EmptyPassword' => __("Bitte wählen Sie ein eindeutiges Passwort.", true),
                'ToShortPassword' => __("Bitte wählen Sie ein Passwort mit mindestens 6 und maximal 15 Stellen.", true),
            ),
            'captcha' => array(
                'captchaIllegalContent' => __('Keine erlaubte Eingabe. Bitte korrigieren Sie die Eingabe.', true),
                'captchaResultIncorrect' => __('... vertippt? Bitte Eingabe prüfen', true)
            )
        )
    );
    //debug($errors);
    foreach ($errors['data'] as $model => $errs) {
        foreach ($errs as $field => $message) {
			$message = $message[0];
            if($field == 'target'){
                $output['errors']['data']['target'] = $message;
            }else{
                $output['errors']['data'][$model][$field] = $errorMessages[$model][$field][$message];
            }
        }
    }
}elseif($success) {
        $output = Set::insert($output, 'success', array(
            'message' => $success['message'],
            'data' => $success['data']
        ));
}
echo $this->Javascript->object($output);
?>