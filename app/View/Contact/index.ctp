<?php
$output = array();
if (empty($this->validationErrors['Objekt']) && empty($this->validationErrors['Contact']) && empty($this->validationErrors['Objektarten'])) $this->validationErrors = array();
if (!empty($this->validationErrors)) {
	$output = Set::insert($output, 'errors', array('message' => $errors['message']));
    $errorMessages = array(
        'Contact' => array(
            'name' => array(
                'EmptyName' => __("Bitte geben Sie Ihren Namen an.")
            ),
            'email' => array(
                'EmptyEmail' => __("Bitte geben Sie Ihre E-Mailadresse an."),
                'SyntaxEmail' => __("Bitte prüfen Sie auf Fehler in der Schreibweise.")
            ),
            'captcha' => array(
                'captchaIllegalContent' => __('Keine erlaubte Eingabe. Bitte korrigieren Sie die Eingabe.'),
                'captchaResultIncorrect' => __('... vertippt? Bitte Eingabe prüfen')
            )
        )
    );
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
}elseif(isset($success) && $success) {
        $output = Set::insert($output, 'success', array(
            'message' => $success['message'],
            'data' => $success['data']
        ));
}
echo $this->Javascript->object($output);
?>