<?php
App::uses('Component', 'Controller');
class MiscfunctionsComponent extends Component {
    var $name = 'Miscfunctions';
    // extract translations from table GESAMTOBJEKT
    public function ExtractUet($uetAll, $lang){

        // $lang = 7 & 17
        //debug($lang);
        if($lang == 7 || $lang == 17) { return $this->ExtractUet($uetAll, 5); }
        //debug($lang);

        $uet = "";
        $uetArray = explode("\n", $uetAll); //debug($UetArray);

        foreach($uetArray as $UetString){
            if (substr($UetString, 0, strlen($lang) + 2) == "(".$lang.")") {
                $uet = trim(substr($UetString, strlen($lang) + 4));
            }
        }

        //debug($uet);
        return $uet;
    }

    public function price_mod($priceUp, $priceOnRequest, $price){
        if($priceUp != '0.00'){
           $return = __('Preis ab &#8364; ').number_format($price,0,",",".").",-";
        }else{
            $return = "&#8364; ".number_format($price,0,",",".").",-";
        }

        if($priceOnRequest == 0){
            $return = __('Preis auf Anfrage');
        }
        return $return;
    }


}
?>