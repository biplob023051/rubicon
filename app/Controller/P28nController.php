<?php  
class P28nController extends AppController { 
    var $name = 'P28n'; 
    var $uses = null; 
    var $components = array('P28n');

    function shuntRequest() { 
        $this->autoRender = false;
        if($this->P28n->change($this->params['lang']));
        //echo $this->Session->read('Config.language');
        //echo $this->referer(null, true);
        $this->redirect($this->referer(null, true));
    } 
} 
?>