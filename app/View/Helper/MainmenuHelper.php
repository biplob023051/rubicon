<?php
App::uses('AppHelper', 'View/Helper');

class MainmenuHelper extends AppHelper{
    function getCategory(){

        $Objekt=ClassRegistry::init('Objekt'); //debug($Objekt);
        return $Objekt->getCategories();
    }
    function getCities(){
        $Objekt=ClassRegistry::init('Objekt'); //debug($Objekt);
        return $Objekt->getCities();
    }

    function bookmarkSearch(){
        $Bookmark=ClassRegistry::init('Bookmark'); //debug($Bookmark);
        return $Bookmark->search('short');
    }

}
