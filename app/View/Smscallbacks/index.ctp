<?php
$output = array();
//print_r($this->validationErrors); exit;
if (empty($this->validationErrors['Smscallback']) && empty($this->validationErrors['Objekt']) && empty($this->validationErrors['Objektarten'])) $this->validationErrors = array();
if($this->validationErrors) {
    $output = Set::insert($output, 'errors', array('message' => $errors['message']));
    //debug($output);
    $errorMessages = array(
        'Smscallback' => array(
            'name' => array(
                'EmptyName' => __("Bitte geben Sie Ihren Namen an.", true)
            ),
            'email' => array(
                'EmptyEmail' => __("Bitte geben Sie Ihre E-Mailadresse an.", true),
                'SyntaxEmail' => __("Bitte prüfen Sie auf Fehler in der Schreibweise.", true)
            ),
            'tel_country' => array(
                //'EmptyTel_country' => __("Bitte geben Sie Ihre Landesvorwahl an.", true),
                'NummericTel_country' => __('Das Feld Land darf nur Ziffern enthalten.', true),
                'NummericTel_min' => __('Feld Land muss minimum 3 Ziffern enthalten', true),
                'NummericTel_max' => __('Feld Land darf maximum 4 Ziffern enthalten', true)
            ),
            'tel_pre' => array(
                //'EmptyTel_pre' => __("Bitte geben Sie Ihre Städtevorwahl an.", true),
                'NummericTel_pre' => __('Das Feld Vorwahl darf nur Ziffern enthalten.', true)
            ),
            'tel_number' => array(
                //'EmptyTel_number' => __("Bitte geben Sie Ihre Telefonnummer an.", true),
                'NummericTel_number' => __('Das Feld Nummer darf nur Ziffern enthalten.', true)
            ),
            'captcha' => array(
                'captchaIllegalContent' => __('Keine erlaubte Eingabe. Bitte korrigieren Sie die Eingabe.', true),
                'captchaResultIncorrect' => __('... vertippt? Bitte Eingabe prüfen', true)
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
}elseif(!empty($success)) {
        $output = Set::insert($output, 'success', array(
            'message' => $success['message'],
            'data' => $success['data']
        ));
}
echo $this->Javascript->object($output);
?>