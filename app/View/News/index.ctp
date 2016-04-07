<?php
$output = array();
//debug($this->validationErrors);
if(!empty($this->validationErrors['News'])) {
    $output = Set::insert($output, 'errors', array('message' => $errors['message']));
    //debug($output);
    $errorMessages = array(
        'News' => array(
            'email' => array(
                'EmptyEmail' => __("Bitte geben Sie Ihre E-Mailadresse an.", true),
                'SyntaxEmail' => __("Bitte prüfen Sie auf Fehler in der Schreibweise.", true)
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