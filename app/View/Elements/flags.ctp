<?php
    //debug($this->Session->read('Config.language'));
    $return = '';
    $flags = $this->Flags->getLanguages();
    //debug($flags);
    foreach($flags as $key => $value){
        if($value['Sprachen']['SPR_ID'] != 17){
            //debug(Configure::read('lngFolder.'.$value['Sprachen']['SPR_ID']));
            //debug($this->Flags->changeUrl(Configure::read('lngFolder.'.$value['Sprachen']['SPR_ID'])));
            //$return .= $this->Html->link($this->Html->image($value['Sprachen']['SPR_ID'].'.png', array('class' => 'mapicon')), $this->Flags->changeUrl(Configure::read('lngFolder.'.$value['Sprachen']['SPR_ID'])), array('escape' => false));
            if(
                $this->params['controller'] == 'pages' && $this->params['action'] == 'display' && isset($this->params['pass'][0]) && $this->params['pass'][0] == 'home' ||
                $this->params['controller'] == 'gesamtobjekt' && $this->params['action'] == 'search' ||
                $this->params['controller'] == 'gesamtobjekt' && $this->params['action'] == 'show'
            ){
                $return .= $this->Html->link($this->Html->image(Inflector::slug(Configure::read('lngNameLong.'.$value['Sprachen']['SPR_ID'])).'.png', array('class' => 'mapicon')), $this->Flags->changeUrl(Configure::read('lngFolder.'.$value['Sprachen']['SPR_ID'])), array('escape' => false));
            }else{
                $return .= $this->Html->link(
                    $this->Html->image(Inflector::slug(Configure::read('lngNameLong.'.$value['Sprachen']['SPR_ID'])).'.png', array('class' => 'mapicon')),
                    array('controller' => $this->params['controller'], 'action' => $this->params['action'], 'language' => Configure::read('lngFolder.'.$value['Sprachen']['SPR_ID']), 'slug' =>  $this->Flags->translateSlug(Configure::read('lngFolder.'.$value['Sprachen']['SPR_ID']), $this->params)),
                    array('escape' => false));
            }
        } else{
            if(
                    $this->params['controller'] == 'pages' && $this->params['action'] == 'display' && isset($this->params['pass'][0]) && $this->params['pass'][0] == 'home' ||
                    $this->params['controller'] == 'gesamtobjekt' && $this->params['action'] == 'search' ||
                    $this->params['controller'] == 'gesamtobjekt' && $this->params['action'] == 'show'
            ){
                $return .= $this->Html->link($this->Html->image($value['Sprachen']['SPR_ID'].'.png', array('class' => 'mapicon')), $this->Flags->changeUrl(Configure::read('lngFolder.'.$value['Sprachen']['SPR_ID'])), array('escape' => false, 'class' => 'modalInput', 'rel' => '#rus'));
            }else{
                $return .= $this->Html->link(
                    $this->Html->image($value['Sprachen']['SPR_ID'].'.png', array('class' => 'mapicon')),
                    array('controller' => $this->params['controller'], 'action' => $this->params['action'], 'language' => Configure::read('lngFolder.'.$value['Sprachen']['SPR_ID']), 'slug' =>  $this->Flags->translateSlug(Configure::read('lngFolder.'.$value['Sprachen']['SPR_ID']), $this->params)),
                    array('escape' => false, 'class' => 'modalInput', 'rel' => '#rus'));
            }
        }
    }
    echo $return;