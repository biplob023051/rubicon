<?php
App::uses('AppHelper', 'View/Helper');
App::uses('String', 'Utility');

class PropertylinksHelper extends AppHelper {
    var $helpers = array ('Session');

    public function getPropertyId($current){
        //debug($this->Session->read('objectSlider'));
        if(!is_array($this->Session->read('objectSlider'))){
            return false;
        }
        $sessionArray = $this->Session->read('objectSlider');
        $currentPositionKey = ''; $keys = '';
        $total = count($sessionArray);
        
        foreach($sessionArray as $key => $obj_id){
            //debug($current);
            if($current == $obj_id['OBJ_ID']){
                $currentPositionKey = array_keys($sessionArray, $obj_id);
            }
        }
        $currentPositionKey = $currentPositionKey[0];

        if($currentPositionKey < $total-1){
            $keys['next'] = $sessionArray[$currentPositionKey+1];
        }
        if($currentPositionKey > 0){
            $keys['prev'] = $sessionArray[$currentPositionKey-1];
        }
        return $keys;
    }

    public function stringToSlug($str) {
        // trim the string
        $str = strtolower(trim($str));
        // replace all non valid characters and spaces with an underscore

        $umlaute = Array("/ä/","/ö/","/ü/","/Ä/","/Ö/","/Ü/","/ß/","/á/","/m²/","/ó/","/í/","/Á/");
        $umlautereplace = Array("ae","oe","ue","Ae","Oe","Ue","ss","a","m2","o","i","A");
        $str = preg_replace($umlaute, $umlautereplace, $str);

        $str = preg_replace('/[^a-z0-9-.]/', '_', $str);
        $str = preg_replace('/-+/', "_", $str);
        return $str;
    }

    public function collectText($objects){
        if(!count($objects)) return false;
        //debug($objects);
        foreach($objects as $item){
            $return[] = $item['Gesamtobjekt']['REG_NAME'];
            if($item['Gesamtobjekt']['BER_NAME'] != 'ohne Region')$return[] = $item['Gesamtobjekt']['BER_NAME'];
            $return[] = $item['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'];
            $return[] = $item['Gesamtobjekt']['OBI_UET_BESCHREIBUNG'];
            $return[] = $item['Gesamtobjekt']['OBJ_UET_WERBETEXT'];
        }
        return implode(';', $return);
    }

    public function getSubstantives($text, $limit) {
        if(!is_array(Configure::read('stopwords.'.CakeSession::read('Config.language'))))return array();
        if(empty($text)) return array();
        $ausgabe = '';
        $text = strip_tags($text);
        $text = str_replace("<br>", "", $text);
        $text = str_replace("<br/>", "", $text);
        $text = str_replace(array("\r\n", "\r"), "\n", $text);
        $text = str_replace("\n", " ", $text);


        $tokens = explode(" ", $text);

        for ($i = 0; $i < count($tokens); $i ++) {
            $pattern = "/^[A-Z]/";

            if(preg_match($pattern, $tokens[$i])) {
                $satzzeichen = array(".", ",", ";", ":", "-", "(", ")", "\"");
                $ausgabe[$i] = str_replace($satzzeichen, "", $tokens[$i]);
            }

            if(substr($tokens[$i], strlen($tokens[$i]) - 1) == ".") {
                $i++;
            }
        }

        if(is_array($ausgabe)){
            $array = array_count_values($ausgabe);
            //debug($array);

            if (arsort($array, SORT_NUMERIC)) {
                $result = array();
                $i = 0;
                while(list($k, $v) = each($array)) {
                    if ($i++ < $limit)
                        if (!in_array(strtolower($k), Configure::read('stopwords.'.CakeSession::read('Config.language')))) {
                            array_push($result, $k);
                        }

                }
                return $result;
            }
            else {
                return null;
            }
        }else{
            return null;
        }
    }
}
?>
