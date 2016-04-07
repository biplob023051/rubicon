<?php

debug($this->params);

switch($this->params['named']['cat']){
    case 100:
        $metatitle = __('Villen mit Meerblick', true);
        $metadesc = __('Villen mit Meerblick', true);
        $metakeys = __('Villen mit Meerblick', true);
    break;
}

$this->set('title_for_layout', $metatitle);
$this->set('metadesc', $metadesc);
$this->set('metakeys', $metakeys);

$this->element('list');