<?php
class AppError extends ErrorHandler{

    function __construct($method, $messages) {
        //Configure::write('debug', 0);
        parent::__construct($method, $messages);
    }
    function _outputMessage($template) {
        $this->controller->render($template);
        $this->controller->afterFilter();

        App::import('Core', 'Email');
        $email = new EmailComponent;

        $email->from = 'CakePHP <cakephpapp@finestpropertiesmallorca.com>';
        $email->to = 'Developer <heidi.anselstetter@consultingteam.de>';
        $email->sendAs = 'html';
        $email->subject = 'Redlich: Fehler in Cake';

        //$email->send($this->controller->output);

        $this->controller->output = null;
        $this->controller->render('error404');
        echo $this->controller->output;
    }
}
?>