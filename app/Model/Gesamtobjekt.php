<?php
App::uses('ComponentCollection', 'Controller');
App::uses('MiscfunctionsComponent', 'Controller/Component');
App::uses('SessionComponent', 'Controller/Component');
App::uses('TranslatorComponent', 'Controller/Component');

class Gesamtobjekt extends AppModel {
	var $name = 'Gesamtobjekt';
    var $useTable = 'GesamtObjekt';
    var $primaryKey = 'GEO_ID';
    var $params = array();
    var $SearchConditions = '';

    function paginateCount($conditions = null, $recursive = 0, $extra = array()){
         $count = $this->find('count', array(
         'fields' => 'DISTINCT Gesamtobjekt.OBJ_NUMMER',
            'conditions' => $this->SearchConditions
        ));
        return $count;
    }

    function findLoc($loc = null){
        $results1 = $this->query('
        SELECT BER_FKID_REG_ID
        FROM Bereiche
        WHERE BER_ID = '.$loc);
        //debug($results1);
        if(empty($results1)){
            return array('cityB' => $loc);
        }else{
            return array('cityR' => $results1[0]['Bereiche']['BER_FKID_REG_ID']);
        }
    }

    function createSearchStatement($params){
        //debug($params);
        //debug(Configure::read('SpecialCats')); exit;
        //debug(array_search(100, Configure::read('SpecialCats')));
		$SpecialCats = Configure::read('SpecialCats');
		//debug($SpecialCats); exit;
        $allowsFilters = array(
            'cat' => 'Gesamtobjekt.OBI_ID = ',
            'cityR' => 'Gesamtobjekt.REG_ID = ',
            'cityB' => 'Gesamtobjekt.BER_ID = ',
            'price' => 'Gesamtobjekt.OBJ_PREIS <=',
            'pricef' => 'Gesamtobjekt.OBJ_PREIS >=',
            'ref' => 'Gesamtobjekt.OBJ_NUMMER LIKE ',
        );
        if($params['action'] == 'search'){
            // Catch special Cats and build options
            //debug($params);

            // if ref is given, ignore all others
            if(isset($params['named']['ref']) && !empty($params['named']['ref'])){
                $this->SearchConditions[] = "Gesamtobjekt.OBJ_NUMMER LIKE '%".$params['named']['ref']."%'";
                return;
            }

            if(isset($params['named']['loc']) && !empty($params['named']['loc'])){
                $correctValue = $this->findLoc($params['named']['loc']);
                $params['named'] = $correctValue;
            }

            foreach ($params['named'] as $filter => $value)  {
                if (isset($allowsFilters[$filter])) {
//                    debug($filter);
//                    debug($value);
                    if($filter == 'pricef') $value = '5000001';
                    if($filter == 'price' && $value == 1) $value = '1000000';
                    if($filter == 'price' && $value == 2) $value = '2000000';
                    if($filter == 'price' && $value == 3) $value = '3000000';
                    if($filter == 'price' && $value == 4) $value = '4000000';
                    if($filter == 'price' && $value == 5) $value = '5000002';
                    if($filter == 'price' && $value == 6) continue;

                    //if($filter == 'ref') $value = '"%'.$value.'%"';

                    if($filter == 'cat' && $value == 100){
                        $allowsFilters[$filter] = 'Gesamtobjekt.OBI_ID IN ('.$SpecialCats[0]['Objektarteninternet']['OBIS'].') AND Gesamtobjekt.EIA_ID IN ('.$SpecialCats[0]['Objektarteninternet']['EIAS'].') ';
                        $value = '';
                    }
                    if($filter == 'cat' && $value == 200){
                        $allowsFilters[$filter] = 'Gesamtobjekt.OBI_ID IN ('.$SpecialCats[1]['Objektarteninternet']['OBIS'].') AND Gesamtobjekt.EIA_ID IN ('.$SpecialCats[1]['Objektarteninternet']['EIAS'].') ';
                        $value = '';
                    }
                    if($filter == 'cat' && $value == 300){
                        $allowsFilters[$filter] = 'Gesamtobjekt.REG_ID = 41';
                        $value = '';
                    }
                    if($filter == 'cat' && $value == 400){
                        $allowsFilters[$filter] = 'Gesamtobjekt.EIA_ID IN ('.$SpecialCats[2]['Objektarteninternet']['EIAS'].') ';
                        $value = '';
                    }
                    //debug($allowsFilters[$filter].$value);
                    $this->SearchConditions[] = $allowsFilters[$filter].$value;
                }
            }
        }
        //debug($this->SearchConditions);
    }

    function preparePaginateConditions($id = null, $stm = null){
        //App::import('Component','Session');
        //$Session = new SessionComponent();

        $this->SearchConditions[] = 'Gesamtobjekt.OBJ_SICHTBAR = 1';

        if($id) $this->SearchConditions[] = 'Gesamtobjekt.OBJ_ID = '.$id;

        if($stm) $this->SearchConditions[] = $stm;
        
        return $this->SearchConditions;

        /*
        $this->paginate['Gesamtobjekt']['conditions'] = $this->SearchConditions;
        $this->paginate['Gesamtobjekt']['fields'] = 'DISTINCT OBJ_NUMMER, OBJ_ID, OBJ_UET_UEBERSCHRIFT, OBI_ID, OBI_UET_BESCHREIBUNG, OBJ_UET_WERBETEXT, OBJ_PREIS, OBJ_PREIS_BIS, OBJ_PREIS_INTERNETREL, OBJ_UET_PREISZUSATZ, REG_ID, BER_ID, REG_NAME, BER_NAME, BER_EXPOSERELEVANT';
        $this->paginate['Gesamtobjekt']['order'] = 'OBJ_PREIS '.Configure::read('DefaultPriceSortDirection');
        $this->paginate['Gesamtobjekt']['limit'] = Configure::read('SearchResultsPerPage');

        //$this->query('INSERT INTO searchlog (query) VALUES ("'.implode(',', $this->paginate['Gesamtobjekt']['conditions']).'")');

        //debug($this->paginate['Gesamtobjekt']);
        return $this->paginate;
        */
    }

    function manipulateSearchResults($results){
        $collection = new ComponentCollection();
        $Miscfunctions = new MiscfunctionsComponent($collection);
        $Session = new SessionComponent($collection);

        foreach($results as $key => $object){
            // Headline
            $results[$key]['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'] = $Miscfunctions->ExtractUet($object['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'], $Session->read('Config.languageID'));
            // Cat
            $results[$key]['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'] = $Miscfunctions->ExtractUet($object['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'], $Session->read('Config.languageID'));
            // Intro text
            if(isset($object['Gesamtobjekt']['OBJ_UET_WERBETEXT']))$results[$key]['Gesamtobjekt']['OBJ_UET_WERBETEXT'] = $Miscfunctions->ExtractUet($object['Gesamtobjekt']['OBJ_UET_WERBETEXT'], $Session->read('Config.languageID'));
            // Price
            if(isset($object['Gesamtobjekt']['OBJ_PREIS_BIS']))$results[$key]['Gesamtobjekt']['OBJ_PREIS'] = $Miscfunctions->price_mod($object['Gesamtobjekt']['OBJ_PREIS_BIS'], $object['Gesamtobjekt']['OBJ_PREIS_INTERNETREL'], $object['Gesamtobjekt']['OBJ_PREIS']);
            // Price additions
            if(isset($object['Gesamtobjekt']['OBJ_UET_PREISZUSATZ']))$results[$key]['Gesamtobjekt']['OBJ_UET_PREISZUSATZ'] = $Miscfunctions->ExtractUet($object['Gesamtobjekt']['OBJ_UET_PREISZUSATZ'], $Session->read('Config.languageID'));

            $results[$key]['Gesamtobjekt']['EIAS'] = array(
                'PLOT'      => $this->getEIAvalue(4, $object['Gesamtobjekt']['OBJ_ID']),
                'LIVING'    => $this->getEIAvalue(2, $object['Gesamtobjekt']['OBJ_ID']),
                'YEAR'      => $this->getEIAvalue(3, $object['Gesamtobjekt']['OBJ_ID']),
                'ROOM'      => $this->getEIAvalue(1, $object['Gesamtobjekt']['OBJ_ID']),
                'BATH'      => $this->getEIAvalue(5, $object['Gesamtobjekt']['OBJ_ID']),
                'RENT'      => $this->getEIAvalue(6, $object['Gesamtobjekt']['OBJ_ID']),
                'ONLYRENT'          => $this->getEIAvalue(7, $object['Gesamtobjekt']['OBJ_ID']),
                'ONLYRENTPrice'     => $this->getEIAvalue(8, $object['Gesamtobjekt']['OBJ_ID'])
            );

            //debug(APP.WEBROOT_DIR.DS.'pdf'.DS.$object['Gesamtobjekt']['OBJ_NUMMER'].'-'.Configure::read('lngFile.'.$Session->read('Config.languageID')).'.pdf');
            if(is_file(WWW_ROOT.'pdf'.DS.$object['Gesamtobjekt']['OBJ_NUMMER'].'-'.Configure::read('lngFile.'.$Session->read('Config.languageID')).'.pdf')){
                $results[$key]['Gesamtobjekt']['PDF'] = $object['Gesamtobjekt']['OBJ_NUMMER'].'-'.Configure::read('lngFile.'.$Session->read('Config.languageID')).'.pdf';
            }else{
                if(is_file(WWW_ROOT.'pdf'.DS.$object['Gesamtobjekt']['OBJ_NUMMER'].'-en.pdf')){
                    $results[$key]['Gesamtobjekt']['PDF'] = $object['Gesamtobjekt']['OBJ_NUMMER'].'-en.pdf';
                }else{
                   $results[$key]['Gesamtobjekt']['PDF'] = '';
                }
            }
        }

        return $results;
    }

    function searchHeader($results){
        if(!empty($results)){
        	$collection = new ComponentCollection();
            $Miscfunctions = new MiscfunctionsComponent($collection);
            $Session = new SessionComponent($collection);

            foreach($Session->read('objectSlider') as $key => $object){
                if(isset($lastCat) && $object['OBI_ID'] != $lastCat){
                    // means we have results with mixed cats
                    $info['mixedCats'] = 1; unset($info['searchCat']); break;
                }else{
                    //$info['searchCat'] = $Miscfunctions->ExtractUet($object['OBI_UET_BESCHREIBUNG'], $Session->read('Config.languageID'));  unset($info['mixedCats']);
                    $info['searchCat'] = $object['OBI_UET_BESCHREIBUNG'];  unset($info['mixedCats']);
                }
                
                $lastCat = $object['OBI_ID'];
            }
            //debug($info);
            return $info;
        }
    }

    function allObjectsArray(){
    	$collection = new ComponentCollection();
    	$Miscfunctions = new MiscfunctionsComponent($collection);
        $Session = new SessionComponent($collection);
        $Session->delete('objectSlider');
        $res = $this->find('all', array(
                                      'conditions' => $this->SearchConditions,
                                      'fields' => 'DISTINCT OBJ_NUMMER, OBJ_ID, OBI_ID, OBI_UET_BESCHREIBUNG, OBJ_UET_UEBERSCHRIFT, BER_NAME, REG_NAME, BER_EXPOSERELEVANT',
                                      'order' => array('OBJ_PREIS '.Configure::read('DefaultPriceSortDirection'))
                                    )); //debug($res);
       
        foreach($res as $k => $v){
            $slider[] = array(
                'OBJ_ID' => $v['Gesamtobjekt']['OBJ_ID'],
                'OBJ_NUMMER' => $v['Gesamtobjekt']['OBJ_NUMMER'],
                'OBI_ID' => $v['Gesamtobjekt']['OBI_ID'],
                'OBI_UET_BESCHREIBUNG' =>  $Miscfunctions->ExtractUet($v['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'], $Session->read('Config.languageID')),
                'OBJ_UET_UEBERSCHRIFT' =>  $Miscfunctions->ExtractUet($v['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'], $Session->read('Config.languageID')),
                'BER_NAME' => $v['Gesamtobjekt']['BER_NAME'],
                'REG_NAME' => $v['Gesamtobjekt']['REG_NAME'],
                'BER_EXPOSERELEVANT' => $v['Gesamtobjekt']['BER_EXPOSERELEVANT']
            );
        }
        if(isset($slider)) $Session->write('objectSlider', $slider);
    }

    function getEIAvalue($les_id, $OBJ_ID){
        $results1 = $this->query('
            SELECT les_fkid_eia_id, les_wertefeld
			FROM Link_eia_static AS LES
			WHERE les_id = '.$les_id);
        //debug($results1);

        $les_fkid_eia_id = $results1[0]['LES']['les_fkid_eia_id'];
	    $les_wertefeld  = $results1[0]['LES']['les_wertefeld'];

        $results2 = $this->query('
            SELECT '.$les_wertefeld.'
			FROM Objekteigenschaften
			WHERE obe_fkid_eia_id = '.$les_fkid_eia_id.'
			AND obe_fkid_obj_id = '.$OBJ_ID);
        //debug($results2);

        if(empty($results2)) return '-';
        $collection = new ComponentCollection();
        $Translator = new TranslatorComponent($collection);
        $Session = new SessionComponent($collection);
        if($les_wertefeld == 'obe_uen_varchar'){
            return $Translator->translate($results2[0]['Objekteigenschaften'][$les_wertefeld], $Session->read('Config.languageID'));
        }else{
            return number_format($results2[0]['Objekteigenschaften'][$les_wertefeld], 0, '.','.');
        }
    }

}
?>