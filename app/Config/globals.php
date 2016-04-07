<?php
    $config['lngFolder'][1] = 'deu';
    $config['lngFolder'][5] = 'eng';
    $config['lngFolder'][22] = 'spa';
    $config['lngFolder'][7] = 'fre';
    $config['lngFolder'][17] = 'rus';

    $config['lngFile'][1] = 'de';
    $config['lngFile'][5] = 'en';
    $config['lngFile'][22] = 'es';
    $config['lngFile'][7] = 'fr';
    $config['lngFile'][17] = 'ru';

    $config['lngNameLong'][1] = 'Deutsch';
    $config['lngNameLong'][5] = 'English';
    $config['lngNameLong'][22] = 'Español';
    $config['lngNameLong'][7] = 'fr';
    $config['lngNameLong'][17] = 'ru';

    $config['lngId']['deu'] = 1;
    $config['lngId']['eng'] = 5;
    $config['lngId']['spa'] = 22;
    $config['lngId']['fre'] = 7;
    $config['lngId']['rus'] = 17;

    $config['SpecialCats'][0]['Objektarteninternet']['OBI_ID'] = 100;
    $config['SpecialCats'][0]['Objektarteninternet']['OBI_SORTIERUNG'] = 30;
    $config['SpecialCats'][0]['Objektarteninternet']['OBIS'] = '3, 4';     // Villen in Anlagen, Freistehende Villen
    $config['SpecialCats'][0]['Objektarteninternet']['EIAS'] = '538, 539, 601, 606'; // Meerblick, Hafenblick

    $config['SpecialCats'][1]['Objektarteninternet']['OBI_ID'] = 200;
    $config['SpecialCats'][1]['Objektarteninternet']['OBI_SORTIERUNG'] = 42;
    $config['SpecialCats'][1]['Objektarteninternet']['OBIS'] = '3';
    $config['SpecialCats'][1]['Objektarteninternet']['EIAS'] = '601, 606'; // direkt am Meer gelegen, direkter Meerzugang

    $config['SpecialCats'][1]['Objektarteninternet']['OBI_ID'] = 300;
    $config['SpecialCats'][1]['Objektarteninternet']['OBI_SORTIERUNG'] = 50;
    $config['SpecialCats'][1]['Objektarteninternet']['OBIS'] = '3';
    $config['SpecialCats'][1]['Objektarteninternet']['EIAS'] = '-1';      // Altstadtpalast

    $config['SpecialCats'][2]['Objektarteninternet']['OBI_ID'] = 400;
    $config['SpecialCats'][2]['Objektarteninternet']['OBI_SORTIERUNG'] = 40;
    $config['SpecialCats'][2]['Objektarteninternet']['OBIS'] = '-1';
    $config['SpecialCats'][2]['Objektarteninternet']['EIAS'] = '622';      // Vermietungen

    $config['youTubeIds'] = array('eygDwQeLEw4');




    $config['SearchResultsPerPage'] = 5;
    $config['MaxNumberImagesPerObject'] = 15;
    $config['DefaultPriceSortDirection'] = 'asc';

    $config['AdminEmail'] = 'info@finestpropertiesmallorca.com';
    $config['BCC'] = array('markusmallorca@yahoo.de', 'heidi.anselstetter@consultingteam.de', 'b.gasse@consultingteam.de');
    $config['SMS'] = '0034696737450';

    //$config['AdminEmail'] = 'heidi.anselstetter@consultingteam.de';
    //$config['BCC'] = array('ha07@gmx.de');
    //$config['SMS'] = '00491787797070';

    //$config['AdminEmail'] = 'yalansky@gmail.com';
    //$config['BCC'] = array('yalansky@gmail.com');
    //$config['SMS'] = '';

    $config['Google'] = array(
        'zoom' => 20,
        'lat' => 39.57817336212527,
        'lng' => 2.6531982421875,
        'type' => 'H', # Roadmap, Satellite, Hybrid, Terrain
        'size' => array('width'=>'100%', 'height'=>400),
        'staticSize' => '500x450',
    );

    $config['stopwords']['deu'][] = "aber";
    $config['stopwords']['deu'][] = "alle";
    $config['stopwords']['deu'][] = "allen";
    $config['stopwords']['deu'][] = "alles";
    $config['stopwords']['deu'][] = "als";
    $config['stopwords']['deu'][] = "also";
    $config['stopwords']['deu'][] = "andere";
    $config['stopwords']['deu'][] = "anderem";
    $config['stopwords']['deu'][] = "anderer";
    $config['stopwords']['deu'][] = "anderes";
    $config['stopwords']['deu'][] = "anders";
    $config['stopwords']['deu'][] = "auch";
    $config['stopwords']['deu'][] = "auf";
    $config['stopwords']['deu'][] = "aus";
    $config['stopwords']['deu'][] = "ausser";
    $config['stopwords']['deu'][] = "ausserdem";
    $config['stopwords']['deu'][] = "bei";
    $config['stopwords']['deu'][] = "beide";
    $config['stopwords']['deu'][] = "beiden";
    $config['stopwords']['deu'][] = "beides";
    $config['stopwords']['deu'][] = "beim";
    $config['stopwords']['deu'][] = "bereits";
    $config['stopwords']['deu'][] = "bestehen";
    $config['stopwords']['deu'][] = "besteht";
    $config['stopwords']['deu'][] = "bevor";
    $config['stopwords']['deu'][] = "bin";
    $config['stopwords']['deu'][] = "bis";
    $config['stopwords']['deu'][] = "bloss";
    $config['stopwords']['deu'][] = "brauchen";
    $config['stopwords']['deu'][] = "braucht";
    $config['stopwords']['deu'][] = "dabei";
    $config['stopwords']['deu'][] = "dadurch";
    $config['stopwords']['deu'][] = "dagegen";
    $config['stopwords']['deu'][] = "daher";
    $config['stopwords']['deu'][] = "damit";
    $config['stopwords']['deu'][] = "danach";
    $config['stopwords']['deu'][] = "dann";
    $config['stopwords']['deu'][] = "darf";
    $config['stopwords']['deu'][] = "darueber";
    $config['stopwords']['deu'][] = "darum";
    $config['stopwords']['deu'][] = "darunter";
    $config['stopwords']['deu'][] = "das";
    $config['stopwords']['deu'][] = "dass";
    $config['stopwords']['deu'][] = "davon";
    $config['stopwords']['deu'][] = "dazu";
    $config['stopwords']['deu'][] = "dem";
    $config['stopwords']['deu'][] = "den";
    $config['stopwords']['deu'][] = "denn";
    $config['stopwords']['deu'][] = "der";
    $config['stopwords']['deu'][] = "des";
    $config['stopwords']['deu'][] = "deshalb";
    $config['stopwords']['deu'][] = "dessen";
    $config['stopwords']['deu'][] = "die";
    $config['stopwords']['deu'][] = "dies";
    $config['stopwords']['deu'][] = "diese";
    $config['stopwords']['deu'][] = "diesem";
    $config['stopwords']['deu'][] = "diesen";
    $config['stopwords']['deu'][] = "dieser";
    $config['stopwords']['deu'][] = "dieses";
    $config['stopwords']['deu'][] = "doch";
    $config['stopwords']['deu'][] = "dort";
    $config['stopwords']['deu'][] = "duerfen";
    $config['stopwords']['deu'][] = "durch";
    $config['stopwords']['deu'][] = "durfte";
    $config['stopwords']['deu'][] = "durften";
    $config['stopwords']['deu'][] = "ebenfalls";
    $config['stopwords']['deu'][] = "ebenso";
    $config['stopwords']['deu'][] = "ein";
    $config['stopwords']['deu'][] = "eine";
    $config['stopwords']['deu'][] = "einem";
    $config['stopwords']['deu'][] = "einen";
    $config['stopwords']['deu'][] = "einer";
    $config['stopwords']['deu'][] = "eines";
    $config['stopwords']['deu'][] = "einige";
    $config['stopwords']['deu'][] = "einiges";
    $config['stopwords']['deu'][] = "einzig";
    $config['stopwords']['deu'][] = "entweder";
    $config['stopwords']['deu'][] = "erst";
    $config['stopwords']['deu'][] = "erste";
    $config['stopwords']['deu'][] = "ersten";
    $config['stopwords']['deu'][] = "etwa";
    $config['stopwords']['deu'][] = "etwas";
    $config['stopwords']['deu'][] = "falls";
    $config['stopwords']['deu'][] = "fast";
    $config['stopwords']['deu'][] = "ferner";
    $config['stopwords']['deu'][] = "folgender";
    $config['stopwords']['deu'][] = "folglich";
    $config['stopwords']['deu'][] = "fuer";
    $config['stopwords']['deu'][] = "ganz";
    $config['stopwords']['deu'][] = "geben";
    $config['stopwords']['deu'][] = "gegen";
    $config['stopwords']['deu'][] = "gehabt";
    $config['stopwords']['deu'][] = "gekonnt";
    $config['stopwords']['deu'][] = "gemaess";
    $config['stopwords']['deu'][] = "getan";
    $config['stopwords']['deu'][] = "gewesen";
    $config['stopwords']['deu'][] = "gewollt";
    $config['stopwords']['deu'][] = "geworden";
    $config['stopwords']['deu'][] = "gibt";
    $config['stopwords']['deu'][] = "habe";
    $config['stopwords']['deu'][] = "haben";
    $config['stopwords']['deu'][] = "haette";
    $config['stopwords']['deu'][] = "haetten";
    $config['stopwords']['deu'][] = "hallo";
    $config['stopwords']['deu'][] = "hat";
    $config['stopwords']['deu'][] = "hatte";
    $config['stopwords']['deu'][] = "hatten";
    $config['stopwords']['deu'][] = "heraus";
    $config['stopwords']['deu'][] = "herein";
    $config['stopwords']['deu'][] = "hier";
    $config['stopwords']['deu'][] = "hin";
    $config['stopwords']['deu'][] = "hinein";
    $config['stopwords']['deu'][] = "hinter";
    $config['stopwords']['deu'][] = "ich";
    $config['stopwords']['deu'][] = "ihm";
    $config['stopwords']['deu'][] = "ihn";
    $config['stopwords']['deu'][] = "ihnen";
    $config['stopwords']['deu'][] = "ihr";
    $config['stopwords']['deu'][] = "ihre";
    $config['stopwords']['deu'][] = "ihrem";
    $config['stopwords']['deu'][] = "ihren";
    $config['stopwords']['deu'][] = "ihres";
    $config['stopwords']['deu'][] = "immer";
    $config['stopwords']['deu'][] = "indem";
    $config['stopwords']['deu'][] = "infolge";
    $config['stopwords']['deu'][] = "innen";
    $config['stopwords']['deu'][] = "innerhalb";
    $config['stopwords']['deu'][] = "ins";
    $config['stopwords']['deu'][] = "inzwischen";
    $config['stopwords']['deu'][] = "irgend";
    $config['stopwords']['deu'][] = "irgendwas";
    $config['stopwords']['deu'][] = "irgendwen";
    $config['stopwords']['deu'][] = "irgendwer";
    $config['stopwords']['deu'][] = "irgendwie";
    $config['stopwords']['deu'][] = "irgendwo";
    $config['stopwords']['deu'][] = "ist";
    $config['stopwords']['deu'][] = "jede";
    $config['stopwords']['deu'][] = "jedem";
    $config['stopwords']['deu'][] = "jeden";
    $config['stopwords']['deu'][] = "jeder";
    $config['stopwords']['deu'][] = "jedes";
    $config['stopwords']['deu'][] = "jedoch";
    $config['stopwords']['deu'][] = "jene";
    $config['stopwords']['deu'][] = "jenem";
    $config['stopwords']['deu'][] = "jenen";
    $config['stopwords']['deu'][] = "jener";
    $config['stopwords']['deu'][] = "jenes";
    $config['stopwords']['deu'][] = "kann";
    $config['stopwords']['deu'][] = "kein";
    $config['stopwords']['deu'][] = "keine";
    $config['stopwords']['deu'][] = "keinem";
    $config['stopwords']['deu'][] = "keinen";
    $config['stopwords']['deu'][] = "keiner";
    $config['stopwords']['deu'][] = "keines";
    $config['stopwords']['deu'][] = "koennen";
    $config['stopwords']['deu'][] = "koennte";
    $config['stopwords']['deu'][] = "koennten";
    $config['stopwords']['deu'][] = "konnte";
    $config['stopwords']['deu'][] = "konnten";
    $config['stopwords']['deu'][] = "kuenftig";
    $config['stopwords']['deu'][] = "leer";
    $config['stopwords']['deu'][] = "machen";
    $config['stopwords']['deu'][] = "macht";
    $config['stopwords']['deu'][] = "machte";
    $config['stopwords']['deu'][] = "machten";
    $config['stopwords']['deu'][] = "man";
    $config['stopwords']['deu'][] = "mehr";
    $config['stopwords']['deu'][] = "mein";
    $config['stopwords']['deu'][] = "meine";
    $config['stopwords']['deu'][] = "meinen";
    $config['stopwords']['deu'][] = "meinem";
    $config['stopwords']['deu'][] = "meiner";
    $config['stopwords']['deu'][] = "meist";
    $config['stopwords']['deu'][] = "meiste";
    $config['stopwords']['deu'][] = "meisten";
    $config['stopwords']['deu'][] = "mich";
    $config['stopwords']['deu'][] = "mit";
    $config['stopwords']['deu'][] = "moechte";
    $config['stopwords']['deu'][] = "moechten";
    $config['stopwords']['deu'][] = "muessen";
    $config['stopwords']['deu'][] = "muessten";
    $config['stopwords']['deu'][] = "muss";
    $config['stopwords']['deu'][] = "musste";
    $config['stopwords']['deu'][] = "mussten";
    $config['stopwords']['deu'][] = "nach";
    $config['stopwords']['deu'][] = "nachdem";
    $config['stopwords']['deu'][] = "nacher";
    $config['stopwords']['deu'][] = "naemlich";
    $config['stopwords']['deu'][] = "neben";
    $config['stopwords']['deu'][] = "nein";
    $config['stopwords']['deu'][] = "nicht";
    $config['stopwords']['deu'][] = "nichts";
    $config['stopwords']['deu'][] = "noch";
    $config['stopwords']['deu'][] = "nuetzt";
    $config['stopwords']['deu'][] = "nur";
    $config['stopwords']['deu'][] = "nutzt";
    $config['stopwords']['deu'][] = "obgleich";
    $config['stopwords']['deu'][] = "obwohl";
    $config['stopwords']['deu'][] = "oder";
    $config['stopwords']['deu'][] = "ohne";
    $config['stopwords']['deu'][] = "per";
    $config['stopwords']['deu'][] = "pro";
    $config['stopwords']['deu'][] = "rund";
    $config['stopwords']['deu'][] = "schon";
    $config['stopwords']['deu'][] = "sehr";
    $config['stopwords']['deu'][] = "seid";
    $config['stopwords']['deu'][] = "sein";
    $config['stopwords']['deu'][] = "seine";
    $config['stopwords']['deu'][] = "seinem";
    $config['stopwords']['deu'][] = "seinen";
    $config['stopwords']['deu'][] = "seiner";
    $config['stopwords']['deu'][] = "seit";
    $config['stopwords']['deu'][] = "seitdem";
    $config['stopwords']['deu'][] = "seither";
    $config['stopwords']['deu'][] = "selber";
    $config['stopwords']['deu'][] = "sich";
    $config['stopwords']['deu'][] = "sie";
    $config['stopwords']['deu'][] = "siehe";
    $config['stopwords']['deu'][] = "sind";
    $config['stopwords']['deu'][] = "sobald";
    $config['stopwords']['deu'][] = "solange";
    $config['stopwords']['deu'][] = "solch";
    $config['stopwords']['deu'][] = "solche";
    $config['stopwords']['deu'][] = "solchem";
    $config['stopwords']['deu'][] = "solchen";
    $config['stopwords']['deu'][] = "solcher";
    $config['stopwords']['deu'][] = "solches";
    $config['stopwords']['deu'][] = "soll";
    $config['stopwords']['deu'][] = "sollen";
    $config['stopwords']['deu'][] = "sollte";
    $config['stopwords']['deu'][] = "sollten";
    $config['stopwords']['deu'][] = "somit";
    $config['stopwords']['deu'][] = "sondern";
    $config['stopwords']['deu'][] = "soweit";
    $config['stopwords']['deu'][] = "sowie";
    $config['stopwords']['deu'][] = "spaeter";
    $config['stopwords']['deu'][] = "stets";
    $config['stopwords']['deu'][] = "such";
    $config['stopwords']['deu'][] = "ueber";
    $config['stopwords']['deu'][] = "ums";
    $config['stopwords']['deu'][] = "und";
    $config['stopwords']['deu'][] = "uns";
    $config['stopwords']['deu'][] = "unser";
    $config['stopwords']['deu'][] = "unsere";
    $config['stopwords']['deu'][] = "unserem";
    $config['stopwords']['deu'][] = "unseren";
    $config['stopwords']['deu'][] = "viel";
    $config['stopwords']['deu'][] = "viele";
    $config['stopwords']['deu'][] = "vollstaendig";
    $config['stopwords']['deu'][] = "vom";
    $config['stopwords']['deu'][] = "von";
    $config['stopwords']['deu'][] = "vor";
    $config['stopwords']['deu'][] = "vorbei";
    $config['stopwords']['deu'][] = "vorher";
    $config['stopwords']['deu'][] = "vorueber";
    $config['stopwords']['deu'][] = "waehrend";
    $config['stopwords']['deu'][] = "waere";
    $config['stopwords']['deu'][] = "waeren";
    $config['stopwords']['deu'][] = "wann";
    $config['stopwords']['deu'][] = "war";
    $config['stopwords']['deu'][] = "waren";
    $config['stopwords']['deu'][] = "warum";
    $config['stopwords']['deu'][] = "was";
    $config['stopwords']['deu'][] = "wegen";
    $config['stopwords']['deu'][] = "weil";
    $config['stopwords']['deu'][] = "weiter";
    $config['stopwords']['deu'][] = "weitere";
    $config['stopwords']['deu'][] = "weiterem";
    $config['stopwords']['deu'][] = "weiteren";
    $config['stopwords']['deu'][] = "weiterer";
    $config['stopwords']['deu'][] = "weiteres";
    $config['stopwords']['deu'][] = "weiterhin";
    $config['stopwords']['deu'][] = "welche";
    $config['stopwords']['deu'][] = "welchem";
    $config['stopwords']['deu'][] = "welchen";
    $config['stopwords']['deu'][] = "welcher";
    $config['stopwords']['deu'][] = "welches";
    $config['stopwords']['deu'][] = "wem";
    $config['stopwords']['deu'][] = "wen";
    $config['stopwords']['deu'][] = "wenigstens";
    $config['stopwords']['deu'][] = "wenn";
    $config['stopwords']['deu'][] = "wenngleich";
    $config['stopwords']['deu'][] = "wer";
    $config['stopwords']['deu'][] = "werde";
    $config['stopwords']['deu'][] = "werden";
    $config['stopwords']['deu'][] = "weshalb";
    $config['stopwords']['deu'][] = "wessen";
    $config['stopwords']['deu'][] = "wie";
    $config['stopwords']['deu'][] = "wieder";
    $config['stopwords']['deu'][] = "will";
    $config['stopwords']['deu'][] = "wir";
    $config['stopwords']['deu'][] = "wird";
    $config['stopwords']['deu'][] = "wodurch";
    $config['stopwords']['deu'][] = "wohin";
    $config['stopwords']['deu'][] = "wollen";
    $config['stopwords']['deu'][] = "wollte";
    $config['stopwords']['deu'][] = "wollten";
    $config['stopwords']['deu'][] = "worin";
    $config['stopwords']['deu'][] = "wuerde";
    $config['stopwords']['deu'][] = "wuerden";
    $config['stopwords']['deu'][] = "wurde";
    $config['stopwords']['deu'][] = "wurden";
    $config['stopwords']['deu'][] = "zufolge";
    $config['stopwords']['deu'][] = "zum";
    $config['stopwords']['deu'][] = "zusammen";
    $config['stopwords']['deu'][] = "zur";
    $config['stopwords']['deu'][] = "zwar";
    $config['stopwords']['deu'][] = "zwischen";

    $config['stopwords']['eng'][] = "about";
    $config['stopwords']['eng'][] = "above";
    $config['stopwords']['eng'][] = "across";
    $config['stopwords']['eng'][] = "after";
    $config['stopwords']['eng'][] = "afterwards";
    $config['stopwords']['eng'][] = "again";
    $config['stopwords']['eng'][] = "against";
    $config['stopwords']['eng'][] = "albeit";
    $config['stopwords']['eng'][] = "all";
    $config['stopwords']['eng'][] = "almost";
    $config['stopwords']['eng'][] = "alone";
    $config['stopwords']['eng'][] = "along";
    $config['stopwords']['eng'][] = "already";
    $config['stopwords']['eng'][] = "also";
    $config['stopwords']['eng'][] = "although";
    $config['stopwords']['eng'][] = "always";
    $config['stopwords']['eng'][] = "among";
    $config['stopwords']['eng'][] = "amongst";
    $config['stopwords']['eng'][] = "and";
    $config['stopwords']['eng'][] = "another";
    $config['stopwords']['eng'][] = "any";
    $config['stopwords']['eng'][] = "anyhow";
    $config['stopwords']['eng'][] = "anyone";
    $config['stopwords']['eng'][] = "anything";
    $config['stopwords']['eng'][] = "anywhere";
    $config['stopwords']['eng'][] = "are";
    $config['stopwords']['eng'][] = "around";
    $config['stopwords']['eng'][] = "became";
    $config['stopwords']['eng'][] = "because";
    $config['stopwords']['eng'][] = "become";
    $config['stopwords']['eng'][] = "becomes";
    $config['stopwords']['eng'][] = "becoming";
    $config['stopwords']['eng'][] = "been";
    $config['stopwords']['eng'][] = "before";
    $config['stopwords']['eng'][] = "beforehand";
    $config['stopwords']['eng'][] = "behind";
    $config['stopwords']['eng'][] = "being";
    $config['stopwords']['eng'][] = "below";
    $config['stopwords']['eng'][] = "beside";
    $config['stopwords']['eng'][] = "besides";
    $config['stopwords']['eng'][] = "between";
    $config['stopwords']['eng'][] = "beyond";
    $config['stopwords']['eng'][] = "both";
    $config['stopwords']['eng'][] = "but";
    $config['stopwords']['eng'][] = "cannot";
    $config['stopwords']['eng'][] = "comprises";
    $config['stopwords']['eng'][] = "corresponding";
    $config['stopwords']['eng'][] = "could";
    $config['stopwords']['eng'][] = "described";
    $config['stopwords']['eng'][] = "desired";
    $config['stopwords']['eng'][] = "does";
    $config['stopwords']['eng'][] = "down";
    $config['stopwords']['eng'][] = "during";
    $config['stopwords']['eng'][] = "each";
    $config['stopwords']['eng'][] = "either";
    $config['stopwords']['eng'][] = "else";
    $config['stopwords']['eng'][] = "elsewhere";
    $config['stopwords']['eng'][] = "enough";
    $config['stopwords']['eng'][] = "etc";
    $config['stopwords']['eng'][] = "even";
    $config['stopwords']['eng'][] = "ever";
    $config['stopwords']['eng'][] = "every";
    $config['stopwords']['eng'][] = "everyone";
    $config['stopwords']['eng'][] = "everything";
    $config['stopwords']['eng'][] = "everywhere";
    $config['stopwords']['eng'][] = "except";
    $config['stopwords']['eng'][] = "few";
    $config['stopwords']['eng'][] = "first";
    $config['stopwords']['eng'][] = "for";
    $config['stopwords']['eng'][] = "former";
    $config['stopwords']['eng'][] = "formerly";
    $config['stopwords']['eng'][] = "from";
    $config['stopwords']['eng'][] = "further";
    $config['stopwords']['eng'][] = "generally";
    $config['stopwords']['eng'][] = "had";
    $config['stopwords']['eng'][] = "has";
    $config['stopwords']['eng'][] = "have";
    $config['stopwords']['eng'][] = "having";
    $config['stopwords']['eng'][] = "hence";
    $config['stopwords']['eng'][] = "her";
    $config['stopwords']['eng'][] = "here";
    $config['stopwords']['eng'][] = "hereafter";
    $config['stopwords']['eng'][] = "hereby";
    $config['stopwords']['eng'][] = "herein";
    $config['stopwords']['eng'][] = "hereupon";
    $config['stopwords']['eng'][] = "hers";
    $config['stopwords']['eng'][] = "herself";
    $config['stopwords']['eng'][] = "him";
    $config['stopwords']['eng'][] = "himself";
    $config['stopwords']['eng'][] = "his";
    $config['stopwords']['eng'][] = "how";
    $config['stopwords']['eng'][] = "however";
    $config['stopwords']['eng'][] = "indeed";
    $config['stopwords']['eng'][] = "into";
    $config['stopwords']['eng'][] = "its";
    $config['stopwords']['eng'][] = "itself";
    $config['stopwords']['eng'][] = "last";
    $config['stopwords']['eng'][] = "latter";
    $config['stopwords']['eng'][] = "latterly";
    $config['stopwords']['eng'][] = "least";
    $config['stopwords']['eng'][] = "less";
    $config['stopwords']['eng'][] = "many";
    $config['stopwords']['eng'][] = "may";
    $config['stopwords']['eng'][] = "means";
    $config['stopwords']['eng'][] = "meanwhile";
    $config['stopwords']['eng'][] = "might";
    $config['stopwords']['eng'][] = "more";
    $config['stopwords']['eng'][] = "moreover";
    $config['stopwords']['eng'][] = "most";
    $config['stopwords']['eng'][] = "mostly";
    $config['stopwords']['eng'][] = "much";
    $config['stopwords']['eng'][] = "must";
    $config['stopwords']['eng'][] = "myself";
    $config['stopwords']['eng'][] = "namely";
    $config['stopwords']['eng'][] = "neither";
    $config['stopwords']['eng'][] = "never";
    $config['stopwords']['eng'][] = "nevertheless";
    $config['stopwords']['eng'][] = "next";
    $config['stopwords']['eng'][] = "nobody";
    $config['stopwords']['eng'][] = "none";
    $config['stopwords']['eng'][] = "noone";
    $config['stopwords']['eng'][] = "nor";
    $config['stopwords']['eng'][] = "not";
    $config['stopwords']['eng'][] = "nothing";
    $config['stopwords']['eng'][] = "now";
    $config['stopwords']['eng'][] = "nowhere";
    $config['stopwords']['eng'][] = "off";
    $config['stopwords']['eng'][] = "often";
    $config['stopwords']['eng'][] = "once";
    $config['stopwords']['eng'][] = "one";
    $config['stopwords']['eng'][] = "only";
    $config['stopwords']['eng'][] = "onto";
    $config['stopwords']['eng'][] = "other";
    $config['stopwords']['eng'][] = "others";
    $config['stopwords']['eng'][] = "otherwise";
    $config['stopwords']['eng'][] = "our";
    $config['stopwords']['eng'][] = "ours";
    $config['stopwords']['eng'][] = "ourselves";
    $config['stopwords']['eng'][] = "out";
    $config['stopwords']['eng'][] = "over";
    $config['stopwords']['eng'][] = "own";
    $config['stopwords']['eng'][] = "particularly";
    $config['stopwords']['eng'][] = "per";
    $config['stopwords']['eng'][] = "perhaps";
    $config['stopwords']['eng'][] = "preferably";
    $config['stopwords']['eng'][] = "preferred";
    $config['stopwords']['eng'][] = "present";
    $config['stopwords']['eng'][] = "rather";
    $config['stopwords']['eng'][] = "relatively";
    $config['stopwords']['eng'][] = "respectively";
    $config['stopwords']['eng'][] = "said";
    $config['stopwords']['eng'][] = "same";
    $config['stopwords']['eng'][] = "seem";
    $config['stopwords']['eng'][] = "seemed";
    $config['stopwords']['eng'][] = "seeming";
    $config['stopwords']['eng'][] = "seems";
    $config['stopwords']['eng'][] = "several";
    $config['stopwords']['eng'][] = "she";
    $config['stopwords']['eng'][] = "should";
    $config['stopwords']['eng'][] = "since";
    $config['stopwords']['eng'][] = "some";
    $config['stopwords']['eng'][] = "somehow";
    $config['stopwords']['eng'][] = "someone";
    $config['stopwords']['eng'][] = "something";
    $config['stopwords']['eng'][] = "sometime";
    $config['stopwords']['eng'][] = "sometimes";
    $config['stopwords']['eng'][] = "somewhere";
    $config['stopwords']['eng'][] = "still";
    $config['stopwords']['eng'][] = "such";
    $config['stopwords']['eng'][] = "suitable";
    $config['stopwords']['eng'][] = "than";
    $config['stopwords']['eng'][] = "that";
    $config['stopwords']['eng'][] = "the";
    $config['stopwords']['eng'][] = "their";
    $config['stopwords']['eng'][] = "them";
    $config['stopwords']['eng'][] = "themselves";
    $config['stopwords']['eng'][] = "then";
    $config['stopwords']['eng'][] = "thence";
    $config['stopwords']['eng'][] = "there";
    $config['stopwords']['eng'][] = "thereafter";
    $config['stopwords']['eng'][] = "thereby";
    $config['stopwords']['eng'][] = "therefor";
    $config['stopwords']['eng'][] = "therefore";
    $config['stopwords']['eng'][] = "therein";
    $config['stopwords']['eng'][] = "thereof";
    $config['stopwords']['eng'][] = "thereto";
    $config['stopwords']['eng'][] = "thereupon";
    $config['stopwords']['eng'][] = "these";
    $config['stopwords']['eng'][] = "they";
    $config['stopwords']['eng'][] = "this";
    $config['stopwords']['eng'][] = "those";
    $config['stopwords']['eng'][] = "though";
    $config['stopwords']['eng'][] = "through";
    $config['stopwords']['eng'][] = "throughout";
    $config['stopwords']['eng'][] = "thru";
    $config['stopwords']['eng'][] = "thus";
    $config['stopwords']['eng'][] = "together";
    $config['stopwords']['eng'][] = "too";
    $config['stopwords']['eng'][] = "toward";
    $config['stopwords']['eng'][] = "towards";
    $config['stopwords']['eng'][] = "under";
    $config['stopwords']['eng'][] = "until";
    $config['stopwords']['eng'][] = "upon";
    $config['stopwords']['eng'][] = "use";
    $config['stopwords']['eng'][] = "various";
    $config['stopwords']['eng'][] = "very";
    $config['stopwords']['eng'][] = "was";
    $config['stopwords']['eng'][] = "well";
    $config['stopwords']['eng'][] = "were";
    $config['stopwords']['eng'][] = "what";
    $config['stopwords']['eng'][] = "whatever";
    $config['stopwords']['eng'][] = "whatsoever";
    $config['stopwords']['eng'][] = "when";
    $config['stopwords']['eng'][] = "whence";
    $config['stopwords']['eng'][] = "whenever";
    $config['stopwords']['eng'][] = "whensoever";
    $config['stopwords']['eng'][] = "where";
    $config['stopwords']['eng'][] = "whereafter";
    $config['stopwords']['eng'][] = "whereas";
    $config['stopwords']['eng'][] = "whereat";
    $config['stopwords']['eng'][] = "whereby";
    $config['stopwords']['eng'][] = "wherefrom";
    $config['stopwords']['eng'][] = "wherein";
    $config['stopwords']['eng'][] = "whereinto";
    $config['stopwords']['eng'][] = "whereof";
    $config['stopwords']['eng'][] = "whereon";
    $config['stopwords']['eng'][] = "whereto";
    $config['stopwords']['eng'][] = "whereunto";
    $config['stopwords']['eng'][] = "whereupon";
    $config['stopwords']['eng'][] = "wherever";
    $config['stopwords']['eng'][] = "wherewith";
    $config['stopwords']['eng'][] = "whether";
    $config['stopwords']['eng'][] = "which";
    $config['stopwords']['eng'][] = "whichever";
    $config['stopwords']['eng'][] = "whichsoever";
    $config['stopwords']['eng'][] = "while";
    $config['stopwords']['eng'][] = "whilst";
    $config['stopwords']['eng'][] = "whither";
    $config['stopwords']['eng'][] = "who";
    $config['stopwords']['eng'][] = "whoever";
    $config['stopwords']['eng'][] = "whole";
    $config['stopwords']['eng'][] = "whom";
    $config['stopwords']['eng'][] = "whomever";
    $config['stopwords']['eng'][] = "whomsoever";
    $config['stopwords']['eng'][] = "whose";
    $config['stopwords']['eng'][] = "whosoever";
    $config['stopwords']['eng'][] = "why";
    $config['stopwords']['eng'][] = "will";
    $config['stopwords']['eng'][] = "with";
    $config['stopwords']['eng'][] = "within";
    $config['stopwords']['eng'][] = "without";
    $config['stopwords']['eng'][] = "would";
    $config['stopwords']['eng'][] = "yet";
    $config['stopwords']['eng'][] = "you";
    $config['stopwords']['eng'][] = "your";
    $config['stopwords']['eng'][] = "yours";
    $config['stopwords']['eng'][] = "yourself";
    $config['stopwords']['eng'][] = "yourselves";

$config['seoWording']['content']['sell']['deu'] = 'Apartments_Fincas_Villen_Kauf_Verkauf_Mallorca';
$config['seoWording']['content']['sell']['eng'] = 'Apartments_and_penthouses_for_sale_in_Palma_de_Mallorca';
$config['seoWording']['content']['sell']['spa'] = 'Apartamentos_y_aticos_en_venta_en_Palma_de_Mallorca';
$config['seoWording']['content']['sell']['fre'] = 'Vous_voulez_vendre';
$config['seoWording']['content']['sell']['rus'] = 'Are_you_interested_in_selling';

$config['seoWording']['content']['team']['deu'] = 'Unser_Immobilienmakler_Mallorca_Team';
$config['seoWording']['content']['team']['eng'] = 'Our_Team';
$config['seoWording']['content']['team']['spa'] = 'Nuestro_equipo';
$config['seoWording']['content']['team']['fre'] = 'Notre_equipe';
$config['seoWording']['content']['team']['rus'] = 'Our_Team';

$config['seoWording']['contacts']['show']['deu'] = 'Kontakt';
$config['seoWording']['contacts']['show']['eng'] = 'Contact';
$config['seoWording']['contacts']['show']['spa'] = 'Contacto';
$config['seoWording']['contacts']['show']['fre'] = 'Contact';
$config['seoWording']['contacts']['show']['rus'] = 'Contact';

$config['seoWording']['content']['vip']['deu'] = 'VIP_Special';
$config['seoWording']['content']['vip']['eng'] = 'VIP_Special';
$config['seoWording']['content']['vip']['spa'] = 'Oferta_VIP';
$config['seoWording']['content']['vip']['fre'] = 'SPECIAL_VIP';
$config['seoWording']['content']['vip']['rus'] = 'VIP_Special';

$config['seoWording']['content']['video']['deu'] = 'Finest_Properties_Mallorca_praesentiert_Ihnen_exklusive_Immobilien_Mallorca';
$config['seoWording']['content']['video']['eng'] = 'Finest_Properties_Mallorca_presents_luxury_properties_on_Majorca';
$config['seoWording']['content']['video']['spa'] = 'Finest_Properties_Mallorca_le_presenta_seleccionadas_propiedades_de_lujo_en_Mallorca';
$config['seoWording']['content']['video']['fre'] = 'Finest_Properties_Mallorca_presents_luxury_properties_on_Majorca';
$config['seoWording']['content']['video']['rus'] = 'Finest_Properties_Mallorca_presents_luxury_properties_on_Majorca';

$config['seoWording']['prices'][1]['deu'] = 'bis 1 Mio. €';
$config['seoWording']['prices'][2]['deu'] = 'bis 2 Mio. €';
$config['seoWording']['prices'][3]['deu'] = 'bis 3 Mio. €';
$config['seoWording']['prices'][4]['deu'] = 'bis 4 Mio. €';
$config['seoWording']['prices'][5]['deu'] = 'bis 5 Mio. €';
$config['seoWording']['prices'][6]['deu'] = 'ab 5 Mio. €';

$config['seoWording']['prices'][1]['eng'] = 'up to 1 Mio. €';
$config['seoWording']['prices'][2]['eng'] = 'up to 2 Mio. €';
$config['seoWording']['prices'][3]['eng'] = 'up to 3 Mio. €';
$config['seoWording']['prices'][4]['eng'] = 'up to 4 Mio. €';
$config['seoWording']['prices'][5]['eng'] = 'up to 5 Mio. €';
$config['seoWording']['prices'][6]['eng'] = '5 Mio. € and more';

$config['seoWording']['prices'][1]['spa'] = 'hasta 1 Mio. €';
$config['seoWording']['prices'][2]['spa'] = 'hasta 2 Mio. €';
$config['seoWording']['prices'][3]['spa'] = 'hasta 3 Mio. €';
$config['seoWording']['prices'][4]['spa'] = 'hasta 4 Mio. €';
$config['seoWording']['prices'][5]['spa'] = 'hasta 5 Mio. €';
$config['seoWording']['prices'][6]['spa'] = 'apartir de 5 Mio. €';

$config['seoWording']['prices'][1]['fre'] = 'à 1 million €';
$config['seoWording']['prices'][2]['fre'] = 'à 2 million €';
$config['seoWording']['prices'][3]['fre'] = 'à 3 million €';
$config['seoWording']['prices'][4]['fre'] = 'à 4 million €';
$config['seoWording']['prices'][5]['fre'] = 'à 5 million €';
$config['seoWording']['prices'][6]['fre'] = 'plus de € 5 millions ';

$config['seoWording']['prices'][1]['rus'] = 'up to 1 Mio. €';
$config['seoWording']['prices'][2]['rus'] = 'up to 2 Mio. €';
$config['seoWording']['prices'][3]['rus'] = 'up to 3 Mio. €';
$config['seoWording']['prices'][4]['rus'] = 'up to 4 Mio. €';
$config['seoWording']['prices'][5]['rus'] = 'up to 5 Mio. €';
$config['seoWording']['prices'][6]['rus'] = '5 Mio. € and more';

$config['seoWording']['gesamtobjekt']['search']['cat'][100]['deu'] = 'Villen_mit_Meerblick';
$config['seoWording']['gesamtobjekt']['search']['cat'][100]['eng'] = 'Sea view villas';
$config['seoWording']['gesamtobjekt']['search']['cat'][100]['spa'] = 'Villas con vistas al mar';
$config['seoWording']['gesamtobjekt']['search']['cat'][100]['fre'] = 'Villas avec vue sur la mer';
$config['seoWording']['gesamtobjekt']['search']['cat'][100]['rus'] = 'Sea view villas';

$config['seoWording']['gesamtobjekt']['search']['cat'][300]['deu'] = 'Palma_de_Mallorca_und_Altstadtpalaeste';
$config['seoWording']['gesamtobjekt']['search']['cat'][300]['eng'] = 'Old_town_houses_and_Palma';
$config['seoWording']['gesamtobjekt']['search']['cat'][300]['spa'] = 'Casas_palacios_y_Palma_de_Mallorca';
$config['seoWording']['gesamtobjekt']['search']['cat'][300]['fre'] = 'Palais_de_la_Vieille_et_Ville_de_Palma';
$config['seoWording']['gesamtobjekt']['search']['cat'][300]['rus'] = 'Old_town_houses_and_Palma';

$config['seoWording']['gesamtobjekt']['search']['cat'][400]['deu'] = 'Vermietungen';
$config['seoWording']['gesamtobjekt']['search']['cat'][400]['eng'] = 'Rentals';
$config['seoWording']['gesamtobjekt']['search']['cat'][400]['spa'] = 'Alquileres';
$config['seoWording']['gesamtobjekt']['search']['cat'][400]['fre'] = 'Location';
$config['seoWording']['gesamtobjekt']['search']['cat'][400]['rus'] = 'Rentals';

$config['seoWording']['search']['ref']['deu'] = 'Immobilien_Suche_nach_Referenznummer';
$config['seoWording']['search']['ref']['eng'] = 'Property_search_with_reference';
$config['seoWording']['search']['ref']['spa'] = 'Busqueda_de_inmuebles_por_no_referencia';
$config['seoWording']['search']['ref']['fre'] = 'Immobilier_Recherche_par_reference';
$config['seoWording']['search']['ref']['rus'] = 'Property_search_with_reference';

$config['seoWording']['search']['all']['deu'] = 'Unser_aktuelles_Immobilien_Angebot';
$config['seoWording']['search']['all']['eng'] = 'Our_current_range_of_Mallorca_properties';
$config['seoWording']['search']['all']['spa'] = 'Lista_actual_de_inmuebles';
$config['seoWording']['search']['all']['fre'] = 'Notre_Immobilier_courant';
$config['seoWording']['search']['all']['rus'] = 'Our_current_range_of_Mallorca_properties';