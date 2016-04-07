<?php
class GesamtobjektController extends AppController{
    public $name = 'Gesamtobjekt';
    public $helpers = array('PaginatorExt');

    public $paginate = array();

    function showsmspopup(){
        $this->layout = false;
        $this->render('showsmspopup');
    }
    function showcontactpopup($id = null){
        $this->layout = false;
        if(isset($id)){
            $this->show($id);
        }
        $this->render('showcontactpopup');
    }

    function search($single=false, $id=false) {

        // TODO do search only when params passed, otherwise print error message
        // TODO search by price
        // TODO save search params
        //Configure::write('debug', 2);
        //debug($this->request->params);

        if(isset($this->request->params['cat']) && !empty($this->request->params['cat']) && isset($this->request->params['id']) && !empty($this->request->params['id'])){
            $this->request->params['named']['cat'] = $this->request->params['id'];
        }
        if(isset($this->request->params['loc']) && !empty($this->request->params['loc']) && isset($this->request->params['id']) && !empty($this->request->params['id'])){
            $this->request->params['named']['loc'] = $this->request->params['id'];
        }
        if(isset($this->request->params['cat']) && !empty($this->request->params['cat'])){
            $this->request->params['named']['cat'] = $this->request->params['cat'];
        }

        // slug url-rewriting
        if(isset($this->request->params['ref']) && !empty($this->request->params['ref'])){
           $this->request->params['named']['ref'] = $this->request->params['ref'];
       }
        if(isset($this->request->params['named']['c']) && !empty($this->request->params['named']['c'])){
            $this->request->params['named']['cat'] = $this->request->params['named']['c'];
        }
        if(isset($this->request->params['named']['r']) && !empty($this->request->params['named']['r'])){
            $this->request->params['named']['cityR'] = $this->request->params['named']['r'];
        }
        if(isset($this->request->params['named']['b']) && !empty($this->request->params['named']['b'])){
            $this->request->params['named']['cityB'] = $this->request->params['named']['b'];
        }
        if(isset($this->request->params['named']['p']) && !empty($this->request->params['named']['p'])){
            $this->request->params['named']['price'] = $this->request->params['named']['p'];
        }
        if(isset($this->request->params['named']['p']) && !empty($this->request->params['named']['p']) && $this->request->params['named']['p'] == 6){
            $this->request->params['named']['pricef'] = $this->request->params['named']['p'];
        }
        if(isset($this->request->params['named']['ref']) && !empty($this->request->params['named']['ref'])){
            $this->request->params['named']['ref'] = $this->request->params['named']['ref'];
        }

        // landing pages
        if(isset($this->request->params['named']['cat']) && $this->request->params['named']['cat'] == 3 && isset($this->request->params['named']['cityR']) && $this->request->params['named']['cityR'] == 57){
            //http://fpm.3-dct.de/URLImmobilien/URLkaufen/Villen_Landhaeuser/Santa_Ponsa/c:3/r:57
            $this->set('landing', true);
            $this->set('type', 1);
        }if(isset($this->request->params['named']['cat']) && $this->request->params['named']['cat'] == 3 && isset($this->request->params['named']['cityR']) && $this->request->params['named']['cityR'] == 65){
            //http://fpm.3-dct.de/URLImmobilien/URLkaufen/Villen_Landhaeuser/Son_Vida/c:3/r:65
            $this->set('landing', true);
            $this->set('type', 1);
        }if(isset($this->request->params['named']['cat']) && $this->request->params['named']['cat'] == 3 && isset($this->request->params['named']['cityR']) && $this->request->params['named']['cityR'] == 95){
            //http://fpm.3-dct.de/URLImmobilien/URLkaufen/Villen_Landhaeuser/Puerto_de_Andratx/c:3/r:95
            $this->set('landing', true);
            $this->set('type', 3);
        }if(isset($this->request->params['named']['cat']) && $this->request->params['named']['cat'] == 1 && isset($this->request->params['named']['cityR']) && $this->request->params['named']['cityR'] == 41){
            //http://fpm.3-dct.de/URLImmobilien/URLkaufen/Apartments_Penthaeuser/Palma_de_Mallorca/c:1/r:41
            $this->set('landing', true);
            $this->set('type', 4);
        }if(isset($this->request->params['named']['cat']) && $this->request->params['named']['cat'] == 1 && isset($this->request->params['named']['cityR']) && $this->request->params['named']['cityR'] == 95){
            //http://fpm.3-dct.de/URLImmobilien/URLkaufen/Apartments_Penthaeuser/Puerto_de_Andratx/c:1/r:95
            $this->set('landing', true);
            $this->set('type', 5);
        }if(isset($this->request->params['named']['cat']) && $this->request->params['named']['cat'] == 1 && isset($this->request->params['named']['cityR']) && $this->request->params['named']['cityR'] == 57){
            //http://fpm.3-dct.de/URLImmobilien/URLkaufen/Apartments_Penthaeuser/Santa_Ponsa/c:1/r:57
            $this->set('landing', true);
            $this->set('type', 6);
        }if(isset($this->request->params['named']['cat']) && $this->request->params['named']['cat'] == 3 && isset($this->request->params['named']['cityR']) && $this->request->params['named']['cityR'] == 41){
            //http://fpm.3-dct.de/URLImmobilien/URLkaufen/Villen_Landhaeuser/Palma_de_Mallorca/c:3/r:41
            $this->set('landing', true);
            $this->set('type', 7);
        }if(isset($this->request->params['named']['cat']) && $this->request->params['named']['cat'] == 8){
            //http://fpm.3-dct.de/URLImmobilien/URLkaufen/Hotels/c:8
            $this->set('landing', true);
            $this->set('type', 8);
        }

        if(isset($this->request->params['any'])){
            // check if we got a single city
            $Objekt=& ClassRegistry::init('Objekt'); //debug($Objekt);
            $results = $Objekt->query('
                SELECT REG_ID FROM Regionen WHERE REG_NAME LIKE "%'.$this->request->params['any'].'%"
            ');//debug($results);
            if(count($results)){
                $this->request->params['named']['cityR'] = $results[0]['Regionen']['REG_ID'];
                $this->request->params['named']['r'] = $results[0]['Regionen']['REG_ID'];
            }else{
                $results = $Objekt->query('
                   SELECT BER_ID FROM Bereiche WHERE BER_NAME LIKE "%'.$this->request->params['any'].'%"
               ');//debug($results);
                if(count($results)){
                    $this->request->params['named']['cityB'] = $results[0]['Bereiche']['BER_ID'];
                    $this->request->params['named']['b'] = $results[0]['Bereiche']['BER_ID'];
                }
            }
        }

        #debug($this->request->params['named']);

        $this->Gesamtobjekt->createSearchStatement($this->params);

        $this->paginate['conditions'] = $this->Gesamtobjekt->preparePaginateConditions();
        $this->paginate['fields'] = 'DISTINCT OBJ_NUMMER, OBJ_ID, OBJ_UET_UEBERSCHRIFT, OBI_ID, OBI_UET_BESCHREIBUNG, OBJ_UET_WERBETEXT, OBJ_PREIS, OBJ_PREIS_BIS, OBJ_PREIS_INTERNETREL, OBJ_UET_PREISZUSATZ, REG_ID, BER_ID, REG_NAME, BER_NAME, BER_EXPOSERELEVANT';
        //$this->paginate['order'] = 'OBJ_PREIS '.Configure::read('DefaultPriceSortDirection');
        $this->paginate['order'] = 'OBJ_INTERNET_UPLOAD DESC';
        $this->paginate['limit'] = Configure::read('SearchResultsPerPage');
        //$this->paginate['paramType'] = 'querystring';


        //debug($this->paginate['conditions']);

        $results = $this->paginate('Gesamtobjekt', $this->paginate['conditions']);
        $this->Gesamtobjekt->allObjectsArray();

        //debug($results);


        $this->set('objects', $this->Gesamtobjekt->manipulateSearchResults($results));
        $this->set('headerinfos', $this->Gesamtobjekt->searchHeader($results));
        $this->set('defaultMaxPerPage', Configure::read('SearchResultsPerPage'));
        $this->set('DefaultPriceSortDirection', Configure::read('DefaultPriceSortDirection'));

    }



    function show(){

        if(isset($this->params['id']) && is_numeric($this->params['id'])){
            $id = $this->params['id'];
        }
        if(isset($this->params['pass'][0]) && is_numeric($this->params['pass'][0])){
            $id = $this->params['pass'][0];
        }

        // url-rewriting
        if(isset($this->params['oid'])){ // && is_numeric($this->params['oid'])
            $oid = $this->params['oid']; //debug($oid);
            $getOBJ_IDfromOid = $this->Gesamtobjekt->find('first', array(
                'conditions' => array(
                    'Gesamtobjekt.OBJ_NUMMER = "'.$oid.'"'
                ),
                'fields' => 'OBJ_ID'

            )); //debug($getOBJ_IDfromOid);

            if (isset($getOBJ_IDfromOid['Gesamtobjekt']) && isset($getOBJ_IDfromOid['Gesamtobjekt']['OBJ_ID'])) {
                $id = $getOBJ_IDfromOid['Gesamtobjekt']['OBJ_ID'];
            }
        }

        if($id){
            $conditions = $this->Gesamtobjekt->preparePaginateConditions($id);
            //debug($conditions);
            $results = $this->Gesamtobjekt->find('first', array('conditions' => $conditions));
            //debug($results); //exit;

            $images = array();
            // Build object images array
            for($i=1; $i <= Configure::read('MaxNumberImagesPerObject'); $i++){
                //debug(APP.WEBROOT_DIR.DS.'imagesrc'.DS.$data['OBJ_NUMMER'].'-'.$i.'.jpg');
                if(is_file(APP.WEBROOT_DIR.DS.'imagesrc'.DS.$results['Gesamtobjekt']['OBJ_NUMMER'].'-'.$i.'.jpg')) $images[] = '-'.$i;
            }
            if(count($images)) $this->set('images', $images);

        	$objects = $this->Gesamtobjekt->manipulateSearchResults(array($results));
            $this->set('objects', $objects);

            // save search query in session in order to be able to return to search
            //debug(preg_match('/search/',  $this->referer()));
            //debug($this->referer());
            if(preg_match('/search/',  $this->referer()))  $this->Session->write('lastSearch', $this->referer());

            // Reverse lookup to get cat/city/price info for navigation
            $loc = $this->Gesamtobjekt->findLoc($results['Gesamtobjekt']['BER_ID']); //debug($loc);

            $add='price';
            if(intval($results['Gesamtobjekt']['OBJ_PREIS']) < 1000000){    $price = 1;}
            elseif(intval($results['Gesamtobjekt']['OBJ_PREIS']) < 2000000){$price = 2;}
            elseif(intval($results['Gesamtobjekt']['OBJ_PREIS']) < 3000000){$price = 3;}
            elseif(intval($results['Gesamtobjekt']['OBJ_PREIS']) < 4000000){$price = 4;}
            elseif(intval($results['Gesamtobjekt']['OBJ_PREIS']) < 5000000){$price = 5;}
            elseif(intval($results['Gesamtobjekt']['OBJ_PREIS']) > 5000000){$price = 5; $add='pricef';}

            //$path = 'cat:'.$results['Gesamtobjekt']['OBI_ID'].'/'.key($loc).':'.current($loc).'/'.$add.':'.$price;
            //CakeLog::write('activity', 'add: '.$add. ' ==> price: ' .$price );

            $this->set('menuSel', array(
                'cat' => $results['Gesamtobjekt']['OBI_ID'],
                key($loc) => current($loc),
                'price' => $price));

        }else{
            $this->redirect($this->referer(null, true));
        }
    }
}