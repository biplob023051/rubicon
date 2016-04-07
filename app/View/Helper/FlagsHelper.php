<?php
App::uses('AppHelper', 'View/Helper');

class FlagsHelper extends AppHelper {
    var $helpers = array ('Session');

    function getLanguages(){
        // find all languages => all active => ordered by priority
        $Sprachen= ClassRegistry::init('Sprachen');
        $results = $Sprachen->find('all', array(
                                                'conditions' => array(
                                                    'Sprachen.SPR_UEB_VORHANDEN' => 1,
                                                    'Uebersetzungen.UEB_FKID_SPR_ID' => CakeSession::read('Config.languageID')

                                                ),
                                                  'fields' => array(
                                                      'Sprachen.SPR_ID', 'Uebersetzungen.UEB_TEXT'
                                                  ),
                                                'order' =>  array('Sprachen.SPR_SORTIERUNG ASC')
                                              ));
        //debug($results);
        return $results;
    }


    public function changeUrl($to, $url = '', $content = false, $seoWording = '', $filters = false){


        #debug($this->params['url']['url']); // 'eng/contacts/show'
        #debug($to);
        #debug($seoWording);
        #debug($content);

        // Home page
        if(!$content && $this->params['controller'] == 'pages' && $this->params['action'] == 'display' && $to != DEFAULT_LANGUAGE){
            return   '/'.$to;
        }elseif(!$content && $this->params['controller'] == 'pages' && $this->params['action'] == 'display' && $to == DEFAULT_LANGUAGE){
            return  '/';
        }
        if(!$content && $url == '/' && $to != DEFAULT_LANGUAGE){
            return   '/'.$to;
        }elseif(!$content && $url == '/' && $to == DEFAULT_LANGUAGE){
            return  '/';
        }

        // does $currentUrl already contain a language string?
        $currentUrl = (!empty($url))? $url : $this->url;              //debug($currentUrl);

//        if(!is_array($currentUrl)){
//            $pattern = '/(eng|spa|fre|rus)/';
//            $found = (preg_match($pattern, $currentUrl)) ? true:false; //debug($found);
//        }


        //debug($currentUrl);
        // Content Links
        if($content && is_array($url) && count($url) && !$filters){

            if(!empty($seoWording) && $to != DEFAULT_LANGUAGE){

                // Only for Kontakt / Impressum Links
                if($currentUrl['controller'] == 'contacts' && isset($currentUrl['multiple'])){
                    return '/'.$to.'/'.Configure::read('seoWording.'.$currentUrl['controller'].'.'.$currentUrl['action'].'.multiple.'.$currentUrl['multiple'].'.'.$to);
                }

                // If we link to a search page
                if($currentUrl['controller'] == 'gesamtobjekt' && $currentUrl['action'] == 'search'){

                    // If a cat is given
                    if(isset($currentUrl['cat']) && !empty($currentUrl['cat'])){

                        // If we have to handel multiple link names (static links)
                        if(isset($currentUrl['multiple']) && !empty($currentUrl['multiple'])){
                            // return controller / action / cat / multiple
                            return '/'.$to.'/'.Configure::read('seoWording.'.$currentUrl['controller'].'.'.$currentUrl['action'].'.cat.'.$currentUrl['cat'].'.multiple.'.$currentUrl['multiple'].'.'.$to);
                        }

                        // else return controller / action / cat
                        return '/'.$to.'/'.Configure::read('seoWording.'.$currentUrl['controller'].'.'.$currentUrl['action'].'.cat.'.$currentUrl['cat'].'.'.$to);

                    }else{

                        // we are at the navigation where only controller/action is given
                        //debug($seoWording);
                        return '/'.$to.'/'.$seoWording;
                    }
                }

                // if only controller / action
                if($currentUrl['controller'] && $currentUrl['action']){
                    return '/'.$to.'/'.Configure::read('seoWording.'.$currentUrl['controller'].'.'.$currentUrl['action'].'.'.$to);
                }

            }


            if(!empty($seoWording) && $to == DEFAULT_LANGUAGE){
                return '/'.$seoWording;
            }

        }else if($content && is_string($url)){ //debug(strpos($url, 'newsletter'));

            if(CakeSession::read('Config.language') != DEFAULT_LANGUAGE){
                if(strpos($url, 'newsletter')){
                    return '/'.$to.'/'.Inflector::slug(Configure::read('seoWording.string.newsletter.'.$to));
                }
                return '/'.$to.'/'.$currentUrl;
            }else{
                return '/'.$currentUrl;
            }

        }

        // FLAGS!!
        if(!$content){
            //debug($this->params);

            if(!$currentUrl) $currentUrl = $this->params->url;
                //debug($currentUrl);


                // we are at search page
                $linkExt = '';
                $querystr = '';
                $ref = '';

                $catstr = false;
                $citystr = false;
                if(isset($this->params['controller']) && $this->params['controller'] == 'gesamtobjekt' && isset($this->params['action']) && $this->params['action'] == 'search'){

                    if(CakeSession::read('Config.language') != $to){

                        //search for ref
                        if(
                                isset($this->params['ref']) && !empty($this->params['ref']) && is_numeric($this->params['ref']) ||
                                isset($this->params['named']['ref']) && !empty($this->params['named']['ref']) && is_numeric($this->params['named']['ref'])
                        ){
                            $ref = (isset($this->params['ref'])) ? $this->params['ref']:$this->params['named']['ref'];
                            //debug(Configure::read('seoWording.search.ref.'.$to));
                            return '/'.$to.'/'.Inflector::slug(Configure::read('seoWording.search.ref.'.$to)).'/ref:'.$ref;
                        }


                        //search for all without any filters
                        if(isset($this->params['any']) && !empty($this->params['any'])){
                            #debug($this->params['named']);
                            if(empty($this->params['named'])) return '/'.$to.'/'.Inflector::slug(Configure::read('seoWording.search.all.'.$to)).'.html';
                        }

                            $parts = explode('/', $currentUrl); unset($parts[0]); //debug($parts);
                            $parts = array_values($parts);
                            $pattern = '/(eng|spa|fre|rus)/';
                            if($parts) $found = (preg_match($pattern, $parts[0])) ? true:false; //debug($found);
                            if(isset($found)){
                                unset($parts[0]);
                                $parts = array_values($parts);
                            }


                            // loop through and get the tags with no ':'
                            foreach($parts as $key => $value){
                                if(strpos($value, ':')){
                                    $querystr .= '/'.$value;
                                }
                            }
                            #debug($querystr);

                            // category slug
                            if(isset($this->params['named']['cat']) && !empty($this->params['named']['cat'])){
                                $linkExt .= '/'.Inflector::slug($this->transDBValue($to));
                                $catstr = true;
                            }
                            #debug($linkExt);

                            // city slug
                            #debug($this->params['named']);
                            if(
                                    isset($this->params['named']['cityR']) && !empty($this->params['named']['cityR']) ||
                                    isset($this->params['named']['cityB']) && !empty($this->params['named']['cityB']))
                            {
                                #debug($this->params['named']);

                                if(isset($this->params['named']['cityR']) && !empty($this->params['named']['cityR'])){
                                    $cityID = $this->params['named']['cityR'];
                                    $cityShortcut = 'R';
                                }elseif(isset($this->params['named']['cityB']) && !empty($this->params['named']['cityB'])){
                                    $cityID = $this->params['named']['cityB'];
                                    $cityShortcut = 'B';
                                }


                                if($cityID && $cityShortcut){
                                    $city = $this->getCity($cityID, $cityShortcut);
                                }
                                if($city && $catstr) $linkExt .= '_'.Inflector::slug($city[0]['Regionen']['REG_NAME']);
                                if($city && !$catstr) $linkExt .= Inflector::slug($city[0]['Regionen']['REG_NAME']);
                                $citystr = true;

                            }
                            #debug($linkExt);

                            // price slug
                            if(isset($this->params['named']['p']) && !empty($this->params['named']['p'])){
                                switch($this->params['named']['p']){
                                    case 1:
                                        if($catstr || $citystr) $linkExt .= '_'.Inflector::slug(Configure::read('seoWording.prices.1.'.$to));
                                        if(!$catstr || !$citystr) $linkExt .= Inflector::slug(Configure::read('seoWording.prices.1.'.$to));
                                        break;
                                    case 2:
                                        if($catstr || $citystr) $linkExt .= '_'.Inflector::slug(Configure::read('seoWording.prices.2.'.$to));
                                        if(!$catstr || !$citystr) $linkExt .= Inflector::slug(Configure::read('seoWording.prices.2.'.$to));
                                        break;
                                    case 3:
                                        if($catstr || $citystr) $linkExt .= '_'.Inflector::slug(Configure::read('seoWording.prices.3.'.$to));
                                        if(!$catstr || !$citystr) $linkExt .= Inflector::slug(Configure::read('seoWording.prices.3.'.$to));
                                        break;
                                    case 4:
                                        if($catstr || $citystr) $linkExt .= '_'.Inflector::slug(Configure::read('seoWording.prices.4.'.$to));
                                        if(!$catstr || !$citystr) $linkExt .= Inflector::slug(Configure::read('seoWording.prices.4.'.$to));
                                        break;
                                    case 5:
                                        if($catstr || $citystr) $linkExt .= '_'.Inflector::slug(Configure::read('seoWording.prices.5.'.$to));
                                        if(!$catstr || !$citystr) $linkExt .= Inflector::slug(Configure::read('seoWording.prices.5.'.$to));
                                        break;
                                    case 6:
                                        if($catstr || $citystr) $linkExt .= '_'.Inflector::slug(Configure::read('seoWording.prices.6.'.$to));
                                        if(!$catstr || !$citystr) $linkExt .= Inflector::slug(Configure::read('seoWording.prices.6.'.$to));
                                        break;
                                }
                            }
                            #debug($linkExt);

                            if($querystr) $querystr = '/'.$querystr;

                            if(empty($linkExt) && !empty($this->params['any'])){
                                $linkExt = $this->params['any'];
                            }

                            if($to != DEFAULT_LANGUAGE) return '/'.$to.'/'.$linkExt.$querystr;
                            if($to == DEFAULT_LANGUAGE) return $linkExt.$querystr;

                    }else{
                        // just take it and reload
                        //debug($currentUrl);
                        return '/'.$currentUrl;
                    }

                }elseif(isset($this->params['controller']) && $this->params['controller'] == 'gesamtobjekt' && isset($this->params['action']) && $this->params['action'] == 'show'){
                    // we are at details page

                    $city = explode(Inflector::slug($this->transDBValue(CakeSession::read('Config.language'))), $this->params['what']); //debug($city);
                    $linkExt .= $city[0];

                    if($to != DEFAULT_LANGUAGE) return '/'.$to.'/'.$linkExt.Inflector::slug($this->transDBValue($to)).'-'.$this->params['oid'].'.html';
                    if($to == DEFAULT_LANGUAGE) return '/'.$linkExt.Inflector::slug($this->transDBValue($to)).'-'.$this->params['oid'].'.html';
                }

                if($to != DEFAULT_LANGUAGE) return '/'.$to.'/'.Configure::read('seoWording.'.$this->params['controller'].'.'.$this->params['action'].'.'.$to);
                if($to == DEFAULT_LANGUAGE) return '/'.Configure::read('seoWording.'.$this->params['controller'].'.'.$this->params['action'].'.'.$to);


        }


        // Links to search with filters
        if($filters){
            $query = '';
            //debug($currentUrl);
            if($currentUrl['controller'] == 'gesamtobjekt' && $currentUrl['action'] == 'search')
                //debug($filters);
                foreach($filters as $key => $value){
                    $query .= '/'.$key.':'.$value;
                }
                if($to != DEFAULT_LANGUAGE) return '/'.$to.'/'.$seoWording.'/'.$query;
                if($to == DEFAULT_LANGUAGE) return '/'.$seoWording.'/'.$query;
        }
    }

    function translateSlug($lng, $params){
        if(is_string( $str = Configure::read('seoWording.'.$this->params['controller'].'.'.$this->params['action'].'.'.$lng))){
            return $str;
        }else{
            return false;
        }
    }

    function findCatId($OBJ_NUMMER){
        $Gesamtobjekt= ClassRegistry::init('Gesamtobjekt'); //debug($Objekt);
        $result = $Gesamtobjekt->find('first', array(
            'conditions' => array(
                'Gesamtobjekt.OBJ_NUMMER = "'.$OBJ_NUMMER.'"'
            ),
            'fields' => 'OBI_ID'
        ));
        return $result['Gesamtobjekt']['OBI_ID'];
    }

    function transDBValue($to){
        #debug($this->params['named']);
        $Objekt= ClassRegistry::init('Objekt'); //debug($Objekt);
        if(
            isset($this->params['named']['cat']) && !empty($this->params['named']['cat']) ||
            isset($this->params['oid']) && $cat = $this->findCatId($this->params['oid'])
        ){
            $cat = (isset($this->params['named']['cat']))?$this->params['named']['cat']:$cat;

            if($cat >= 100){
                switch($cat){
                    case 100:
                        return Configure::read('seoWording.gesamtobjekt.search.cat.100.'.$to);
                        break;
                    case 300:
                        return Configure::read('seoWording.gesamtobjekt.search.cat.300.'.$to);
                        break;
                    case 400:
                        return Configure::read('seoWording.gesamtobjekt.search.cat.400.'.$to);
                        break;
                }
            }
            $lng = (Configure::read('lngId.'.$to) == 17) ?5:Configure::read('lngId.'.$to);
            $results = $Objekt->query('
                SELECT OBI_ID,
                       OBI_SORTIERUNG,
                       UEB_TEXT,
                       UEB_FKID_SPR_ID
                FROM   Uebersetzungen
                         JOIN Objektarten_internet AS Objektarteninternet ON (OBI_UEN_BESCHREIBUNG = UEB_NUMMER)
                WHERE  OBI_ID = '.$cat.'
                AND    UEB_FKID_SPR_ID = '.$lng
            );
            #debug($results);
            #debug(CakeSession::read('Config.languageID'));
            #debug($cat);
            return $results['0']['Uebersetzungen']['UEB_TEXT'];
            #return $results['0']['Uebersetzungen']['UEB_TEXT'];
        }
    }

    function getCity($id, $where){
        $Objekt= ClassRegistry::init('Objekt'); //debug($Objekt);
        $where = ($where == 'R')?'REG_ID':'BER_ID';
        $results = $Objekt->query('
                        SELECT DISTINCT
                               REG_NAME,
                               CASE BER_EXPOSERELEVANT WHEN 1 THEN BER_NAME END AS BER_NAME,
                               REG_ID,
                               CASE REG_EXPOSERELEVANT WHEN 1 THEN BER_ID END AS BER_ID
                        FROM   Regionen
                               JOIN Bereiche ON (BER_FKID_REG_ID = REG_ID)
                        WHERE  '.$where.'  = '.$id.'
                        ORDER BY REG_NAME ASC, BER_NAME ASC
                    ');
        //debug($results);
        return $results;
    }
}
