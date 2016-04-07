<?php
//debug($this->Propertylinks->collectText($objects));
//debug($this->params);
//debug($this->params['named']);
//debug($headerinfos['searchCat']);

$cityname = '';
if(
    isset($this->params['named']['cityR']) || isset($this->params['named']['cityB']) ||
    isset($this->params['named']['r']) || isset($this->params['named']['b'])
){
    // seo stuff
    // get city name
    if (isset($this->params['named']['cityR']) || isset($this->params['named']['r'])){
        $cityname = $this->Flags->getCity($this->params['named']['cityR'], 'R');
        $cityname = $cityname['0']['Regionen']['REG_NAME'];
    }
    if (isset($this->params['named']['cityB']) || isset($this->params['named']['b'])){
        $cityname = $this->Flags->getCity($this->params['named']['cityB'], 'B');
        $cityname = $cityname['0']['Regionen']['REG_NAME'].', '.$cityname[0][0]['BER_NAME'];
    }
    //debug($cityname);
}


if(isset($headerinfos['searchCat'])){

    $searchcatname = $headerinfos['searchCat'];

}elseif(isset($headerinfos['mixedCats']) && isset($this->params['named']['cat'])){
    //debug($this->params['named']['cat']);
    switch($this->params['named']['cat']){
        case 100:
            $searchcatname = __('Villen mit Meerblick');
            break;
        case 200:
            $searchcatname = __('Villen an erster Meereslinie');
            break;
        case 300:
            $searchcatname = __('Palma de Mallorca und Altstadtpaläste');
            break;
        case 400:
            $searchcatname = __('Vermietungen');
            break;
        default:
            $searchcatname = __('Luxusimmobilien');
    }
}else{
    $searchcatname = __('Luxusimmobilien');
}
//debug($searchcatname);

#$this->set('metakeys', $this->Text->toList($this->Propertylinks->getSubstantives($this->Propertylinks->collectText($objects), 20), __('und')));


if(isset($this->params['named']['cat'])){
    switch($this->params['named']['cat']){
        case 1:
            $this->set('title_for_layout', __('Apartments und Penthäuser kaufen'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('title_for_layout', __('Apartments und Penthäuser %s kaufen', __('in').' '.$cityname));
            $this->set('metadesc', __('Bei Finest Properties Mallorca finden Sie erstklassige Apartments und Penthäuser auf Mallorca, ob in Santa Ponsa, Port d’Andratx oder direkt in Palma, wir bieten Ihnen Top-Immobilien in den besten Lagen.'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('metadesc', __('Bei Finest Properties Mallorca finden Sie erstklassige Apartments und Penthäuser %s auf Mallorca, wir bieten Ihnen Top-Immobilien in den besten Lagen.', __('in').' '.$cityname));
        break;
        case 3:
            $this->set('title_for_layout', __('Exklusive Villen, Landhäusern und Fincas kaufen'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('title_for_layout', __('Exklusive Villen, Landhäusern und Fincas %s kaufen', __('in').' '.$cityname));
            $this->set('metadesc', __('Ob Apartments, Villen oder  exklusive Fincas Mallorca Immobilienmakler Finest Properties Mallorca findet für Sie den richtigen Käufer oder Langzeitmieter. Erfahren Sie hier mehr!'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('metadesc', __('Finest Properties Mallorca bietet eine exklusive Auswahl an Villen, Landhäusern bzw. Fincas %s auf Mallorca. Wir beraten Sie individuell und professionell während der Suche nach einer passenden Mallorca Immobilie.', __('in').' '.$cityname));
        break;
        case 100:
            $this->set('title_for_layout', __('Ausgewählte Villen, Landhäusern und Fincas mit Meerblick kaufen'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('title_for_layout', __('Ausgewählte Villen, Landhäusern und Fincas mit Meerblick %s kaufen', __('in').' '.$cityname));
            $this->set('metadesc', __('Finest Properties Mallorca offeriert Ihnen ausgewählte Mallorca Luxus-Villen mit Meerblick. Dank unserer langjährigen Erfahrung als Mallorca Immobilienmakler können wir Ihnen ein interessantes Portfolio an Luxusimmobilien in erster Meereslinie bieten.'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('metadesc', __('Finest Properties Mallorca offeriert Ihnen ausgewählte Mallorca Luxus-Villen mit Meerblick %s. Dank unserer langjährigen Erfahrung als Mallorca Immobilienmakler können wir Ihnen ein interessantes Portfolio an Luxusimmobilien in erster Meereslinie bieten.', __('in').' '.$cityname));
        break;
        case 400:
            $this->set('title_for_layout', __('Mietobjekte: Apartments, Villen, Fincas mieten'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('title_for_layout', __('Mietobjekte > Apartments, Villen, Fincas %s mieten', __('in').' '.$cityname));
            $this->set('metadesc', __('Bei uns gibt es eine Vielzahl an interessanten Mallorca Villen, Fincas, Apartments und Penthäusern zum Mieten. Werfen Sie einen Blick auf unsere Rubrik Vermietungen oder kontaktieren Sie uns direkt und wir suchen Ihnen die passende Mietimmobilie auf Mallorca.'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('metadesc', __('Bei uns gibt es eine Vielzahl an interessanten Mallorca Villen, Fincas, Apartments und Penthäusern %s zum Mieten. Werfen Sie einen Blick auf unsere Rubrik Vermietungen oder kontaktieren Sie uns direkt und wir suchen Ihnen die passende Mietimmobilie auf Mallorca.', __('in').' '.$cityname));
        break;
        case 300:
            $this->set('title_for_layout', __('Altstadtpaläste in Palma de Mallorca kaufen'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('title_for_layout', __('Altstadtpaläste in Palma de Mallorca %s kaufen', __('in').' '.$cityname));
            $this->set('metadesc', __('Finden Sie mit Finest Properties Mallorca die schönsten Altstadtpaläste in Palma de Mallorca. Wir sind jederzeit für Sie da als Ihr persönlicher und erfahrener Immobilienmakler auf Mallorca.'));
        break;
        case 7:
            $this->set('title_for_layout', __('Grundstücke in bevorzugten Lagen kaufen'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('title_for_layout', __('Grundstücke in bevorzugten Lagen %s kaufen', __('in').' '.$cityname));
            $this->set('metadesc', __('In der Kategorie Mallorca Grundstücke bieten wir Ihnen herausragende Baugrundstücke auf Mallorca in den bevorzugten Lagen. Wir beraten Sie gerne und zeigen Ihnen alle interessanten Objekte.'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('metadesc', __('In der Kategorie Mallorca Grundstücke bieten wir Ihnen herausragende Baugrundstücke %s auf Mallorca in den bevorzugten Lagen. Wir beraten Sie gerne und zeigen Ihnen alle interessanten Objekte.', __('in').' '.$cityname));
        break;
        case 9:
            $this->set('title_for_layout', __('Gewerbeimmobilien > Ladenlokale, Restaurants, Cafeteria pachten oder kaufen'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('title_for_layout', __('Gewerbeimmobilien > Ladenlokale, Restaurants, Cafeteria %s pachten oder kaufen', __('in').' '.$cityname));
            $this->set('metadesc', __('Hier finden Sie sorgfältig ausgesuchte Mallorca Gewerbeimmobilien. Ob Ladenlokal, Restaurant, Cafeteria oder gar ein eigenes Weingut, Finest Properties Mallorca sucht Ihnen Ihre gewünschte Gewerbeimmobilie.'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('metadesc', __('Hier finden Sie sorgfältig ausgesuchte Mallorca Gewerbeimmobilien %s. Ob Ladenlokal, Restaurant, Cafeteria oder gar ein eigenes Weingut, Finest Properties Mallorca sucht Ihnen Ihre gewünschte Gewerbeimmobilie.', __('in').' '.$cityname));
        break;
        case 9:
            $this->set('title_for_layout', __('Hotels > Fincahotels, Landhaushotels, Stadthotels pachten oder kaufen'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('title_for_layout', __('Hotels > Fincahotels, Landhaushotels, Stadthotels %s pachten oder kaufen', __('in').' '.$cityname));
            $this->set('metadesc', __('In dieser Kategorie finden Sie eine Vielzahl von Hotels auf Mallorca zum Kaufen oder Pachten. Mit Finest Properties Mallorca haben Sie einen vertrauensvollen und diskreten Partner für Ihre Suche.'));
            if(isset($this->params['named']['cityR']) || isset($this->params['named']['cityB'])) $this->set('metadesc', __('In dieser Kategorie finden Sie eine Vielzahl von Hotels %s auf Mallorca zum Kaufen oder Pachten. Mit Finest Properties Mallorca haben Sie einen vertrauensvollen und diskreten Partner für Ihre Suche.', __('in').' '.$cityname));
        break;
    }
}

if(
    isset($this->params['named']['cityR']) || isset($this->params['named']['cityB']) &&
    !isset($this->params['named']['cat']) && !isset($this->params['named']['c'])
){
    $this->set('title_for_layout', __('Exklusive Mallorca Immobilien %s', __('in').' '.$cityname));
    $this->set('metadesc', __('Finden Sie traumhafte Immobilien %s auf Mallorca zum Kaufen oder Mieten. Mit Finest Properties Mallorca haben Sie einen kompetenten und diskreten Partner für Ihre Suche.', __('in').' '.$cityname));
}

if(
    (!isset($this->params['named']['cityR']) && !isset($this->params['named']['cityB']) &&
    !isset($this->params['named']['cat']) && !isset($this->params['named']['c']) &&
    isset($this->params['named']['price']) ||
    isset($this->params['named']['pricef'])) && isset($this->params['named']['p'])
){
    $this->set('title_for_layout', __('Die schönsten Mallorca Immobilien %s', Configure::read('seoWording.prices.'.$this->params['named']['p'].'.'.CakeSession::read('Config.language'))));
    $this->set('metadesc', __('Finden Sie traumhafte Immobilien %s auf Mallorca zum Kaufen oder Mieten. Mit Finest Properties Mallorca haben Sie einen kompetenten und diskreten Partner für Ihre Suche.', __('in').' '.$cityname));
}

if(isset($landing) && isset($type)):
    switch($type){
        case 1:
            $this->set('title_for_layout', __('Santa Ponsa: Villen und Fincas kaufen'));
            $this->set('metadesc', __('Unser Angebot: exklusive Villen und Fincas in Santa Ponsa. Wir vermitteln Ihnen Ihre Traumimmobilie in Santa Ponsa und im ganzen Südwesten von Mallorca'));
        break;
        case 2:
            $this->set('title_for_layout', __('Son Vida: Villen mit Meerblick kaufen'));
            $this->set('metadesc', __('Finden Sie hier Ihre Traumimmobilie in Son Vida, Mallorca. Finest Properties Mallorca verfügt über ein exklusives Angebot an Luxus-Villen in Son Vida bei Palma de Mallorca'));
        break;
        case 3:
            $this->set('title_for_layout', __('Puerto de Andratx: Fincas und Villen kaufen'));
            $this->set('metadesc', __('Mit Finest Properties finden Sie exklusive Immobilien, Villen und Fincas in Andratx und Puerto de Andratx zum Kaufen. Lassen Sie sich verzaubern von dieser einmaligen Lage im wild-romantischen Westen Mallorcas, direkt am Meer.'));
        break;
        case 4:
            $this->set('title_for_layout', __('Palma de Mallorca: Apartment, Penthouse, Wohnung kaufen'));
            $this->set('metadesc', __('Hier finden Sie exklusive Apartments, Wohnungen und Penthäuser in Palma de Mallorca in ausgewählten Top-Lagen. Unsere Immobilienmakler helfen Ihnen auf der Suche nach Ihrer Traum Mallorca Immobilie'));
        break;
        case 5:
            $this->set('title_for_layout', __('Puerto Andratx: Apartments, Penthäuser, Wohnungen kaufen'));
            $this->set('metadesc', __('Exklusive Immobilien wie ein Apartment oder Penthouse in Puerto de Andratx bietet Finest Properties Mallorca. Verwirklichen Sie Ihren Traum von einer Wohnung in Port Andratx und lassen Sie sich beraten'));
        break;
        case 6:
            $this->set('title_for_layout', __('Santa Ponsa: Apartments, Penthäuser, Wohnungen kaufen'));
            $this->set('metadesc', __('Entsprechend der begüterten Klientel fällt die Bebauung aus, großzügige Villen mit spektakulären Ausblicken auf Palma und das Meer dominieren das Bild, Privatsphäre ist aufgrund der lockeren Bebauung garantiert. Diese hat allerdings ihren Preis: Angesichts der hervorragenden Mikrolage zählt Son Vida auf Mallorca zu den luxuriösesten Immobilienstandorten. Wer dort einmal zur Probe wohnen möchte, kann dies problemlos in einem der beiden Top-Hotels vor Ort tun'));
        break;
        case 7:
            $this->set('title_for_layout', __('Palma de Mallorca: Fincas, Landhäuser und Villen kaufen'));
            $this->set('metadesc', __('Der Immobilienmakler für exklusive Mallorca Immobilien - Finest Properties Mallorca – bietet ausgewählte Luxus Villen und Häuser in Palma de Mallorca zum Kaufen an'));
        break;
        case 8:
            $this->set('title_for_layout', __('Mallorca: Hotels, Fincahotels, Landhotels und Stadthotels kaufen'));
            $this->set('metadesc', __('Finest Properties Mallorca offeriert ausgewählte Hotels auf Mallorca zum Kaufen. Unser exklusives Angebot umfasst Strandhotels, Fincahotels, Landhotels und Stadthotels auf Mallorca'));
        break;
    }
endif;

echo $this->element('list');

if(isset($landing) && isset($type) && $this->Session->read('Config.language') != 'fre' && $this->Session->read('Config.language') != 'rus'):?>
    <div class="content">
        <div class="content_box_fullwidth content_box_rm">
            <?php if($type == 1): ?>
                <h1 class="h1home_content"><?php echo __('Villen und Fincas in Santa Ponsa'); ?></h1>
                <h2 class="h2home_content"><?php echo __('Schon immer begehrt: Santa Ponsa'); ?></h2>
                <p><?php echo __('Rund um den heutigen Badeort Santa Ponsa fühlten sich schon die ersten Einwohner Mallorcas wohl. Davon zeugt heute ein archäologischer Park oberhalb des Ortes. Bereits im 13. Jahrhundert von Christus siedelten sich die Angehörigen der Talayot-Kultur in der Region an. Geschichtsträchtig ist der Ort auch, weil König Jaume I. von Aragón im Jahr 1229 mit seiner Streitmacht dort an Land ging und die Insel von den Mauren zurückeroberte.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Santa Ponsa – ein idealer Standort für exklusive Immobilien auf Mallorca'); ?></h2>
                <p><?php echo __('Friedlicher geht es heute zu: Gäste aus ganz Europa schätzen nicht nur den rund 1,3 Kilometer langen Strand, viele von ihnen kommen immer wieder und besitzen mittlerweile in Santa Ponsa Immobilien. Lediglich rund 20 Kilometer trennen den Ort von Palma – ein Pluspunkt für alle, die eine Finca in Santa Ponsa ihr Eigen nennen und sie oft für Kurztrips nutzen. Dementsprechend bietet Santa Ponsa Immobilien für jeden Geschmack. Auch für Familien, die dauerhaft auf Mallorca leben wollen, macht die kurze Distanz zu mehreren internationalen Schulen den Kauf einer Finca in Santa Ponsa interessant.'); ?></p>
                <h2 class="h3home_content"><?php echo __('Was macht Santa Ponsa für Käufer von Luxus Immobilien so attraktiv?'); ?></h2>
                <p><?php echo __('Nicht nur die Nähe zu Palma macht eine Villa in Santa Ponsa für Kaufinteressenten reizvoll – insbesondere im Top-Segment. Dafür spricht unter anderem das Angebot erstklassiger Golfplätze, von denen gleich drei in unmittelbarer Nachbarschaft so manch stattlicher Finca in Santa Ponsa liegen. Auch die Infrastruktur für Yachtbesitzer ist hervorragend und macht Santa Ponsa und seine Immobilien auch für Bootseigner interessant. So bietet der Ort selbst einen wunderschönen Yachthafen, hinzu kommt der vom Stardesigner Philippe Starck entworfene Yachthafen Port Adriano mit seinen Luxus-Shops und edlen Restaurants. Mega-Yachten mit bis zu 100 Metern Länge können dort vor Anker gehen.'); ?></p>
                <h3 class="h3home_content"><?php echo __('Abwechslungsreiches Angebot in Santa Ponsa an Villen in erster Meereslinie'); ?></h3>
                <p><?php echo __('Neben der auf eine anspruchsvolle Klientel zugeschnittenen Infrastruktur sprechen auch die geographischen Gegebenheiten dafür, in Santa Ponsa eine Immobilie zu erwerben: Insbesondere entlang der benachbarten Costa de la Calma lässt sich der Traum von einem Domizil in erster Meereslinie verwirklichen. Einige Immobilienmakler in Santa Ponsa haben sich auf die anspruchsvolle Klientel spezialisiert, darunter auch Finest Properties Mallorca. Von der futuristischen Villa in Santa Ponsa bis zum zur traditionellen Finca im Hinterland bietet das Unternehmen ein breites Portfolio exklusiver Objekte an. Die Immobilienmakler in Santa Ponsa wissen zudem auch, wo der Neubau des individuellen Traumdomizils möglich ist.'); ?></p>
                <h3><?php echo __('Eine Villa oder Finca in Santa Ponsa kaufen als Investition für die Zukunft'); ?></h3>
                <p><?php echo __('Aufgrund der attraktiven Rahmenbedingungen ist der Kauf einer Villa in Santa Ponsa auch eine interessante Investition in die Zukunft, da das Werterhaltungs- beziehungsweise -Steigerungspotenzial von Experten als sehr attraktiv eingeschätzt wird. Immobilienmakler wie Finest Properties Mallorca in Santa Ponsa erteilen hierzu gern detailliert Auskunft.'); ?></p>
            <?php endif;?>
            <?php if($type == 2): ?>
                <h1 class="h1home_content"><?php echo __('Erste Adresse für Luxus Immobilien auf Mallorca: Son Vida - Top of Town'); ?></h1>
                <p><?php echo __('Mallorca ist reich an privilegierten Lagen für eine höchst anspruchsvolle Klientel. Einer dieser Top-Standorte für exklusive Immobilien ist Son Vida, eine Urbanisation der Luxusklasse in den Bergen oberhalb der Inselmetropole Palma. Die Lage von Son Vida auf Mallorca könnte besser nicht sein: Von der Hafenpromenade "Paseo Maritimo" sind es über den Straßenring Via Cintura nur wenige Autominuten bis in das exklusive Villenresort, der Flughafen ist lediglich rund zehn bis 15 Autominuten entfernt.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Was bietet Son Vida als bevorzugte Lage für Luxus Villen auf Mallorca?'); ?></h2>
                <p><?php echo __('Die Nähe zu Palma macht Immobilien in Son Vida attraktiv für alle, die auf der Insel Ruhe genießen und dennoch nicht auf die Vorzüge einer Großstadt mit ihrer kulturellen und gastronomischen Vielfalt verzichten möchten. So eignet sich eine Villa in Son Vida perfekt für diejenigen, die ihren Lebensmittelpunkt nach Mallorca verlegen und dort auch beruflich tätig sein wollen. Dafür spricht ebenfalls der nahegelegene Flughafen mit exzellenten Verbindungen von und nach Deutschland sowie in die europäischen Metropolen, die sich binnen zwei Flugstunden und ohne Umsteigen erreichen lassen.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Was macht Son Vida für Käufer von Luxusimmobilien so attraktiv?'); ?></h2>
                <p><?php echo __('Erste Wahl ist der Standort Son Vida auf Mallorca auch für Golfer: Die drei wunderschönen Golfplätze Son Quint, Son Vida und Son Muntaner ermöglichen es Besitzern einer Luxus Villa in Son Vida, quasi direkt vor der Haustür am Handicap zu feilen. Wer eine Yacht besitzt, ist mit einer Villa in Son Vida ebenfalls gut bedient: bis zum exklusiven Yachthafen Puerto Portals, der sogar Megayachten bis 70 Metern Länge Platz bietet, sind es nur wenige Fahrminuten. Hinzu kommen vier weitere Yachthäfen im Raum Palma, darunter zwei am immer beliebter werdenden Standort Portixol.'); ?></p>
                <h3 class="h3home_content"><?php echo __('Eine Villa in Son Vida: sicher, privat, exklusiv'); ?></h3>
                <p><?php echo __('Nicht von der Hand zu weisen ist auch der Vorteil, dass die Immobilien in Son Vida innerhalb einer Urbanisation liegen, die von privaten Sicherheitskräften bewacht wird: Die Zufahrt ist lediglich über eine einzige Straße möglich, das Wachhäuschen ist Tag und Nacht besetzt. Insbesondere, wer häufig abwesend ist, wird diesen Pluspunkt zu schätzen wissen. Die Urbanisation verfügt zudem über einen rund 500 Hektar großen Park, von dem die Hälfte unter Naturschutz steht. '); ?></p>
                <p><?php echo __('Entsprechend der begüterten Klientel fällt die Bebauung aus, großzügige Villen mit spektakulären Ausblicken auf Palma und das Meer dominieren das Bild, Privatsphäre ist aufgrund der lockeren Bebauung garantiert. Diese hat allerdings ihren Preis: Angesichts der hervorragenden Mikrolage zählt Son Vida auf Mallorca zu den luxuriösesten Immobilienstandorten. Wer dort einmal zur Probe wohnen möchte, kann dies problemlos in einem der beiden Top-Hotels vor Ort tun.'); ?></p>
            <?php endif;?>
            <?php if($type == 3): ?>
                <h1 class="h1home_content"><?php echo __('Mallorca Immobilien: Villen und Fincas in Puerto de Andratx kaufen'); ?></h1>
                <h2 class="h2home_content"><?php echo __('Immobilien in Puerto de Andratx'); ?></h2>
                <p><?php echo __('Die Gemeinde Andratx liegt im Südwesten Mallorcas, am Ausläufer des Tramuntana-Gebirges. Andratx ist eine Küstengemeinde mit malerischen Buchten, Steilküsten und vier kleinen unbewohnten Inseln, wozu auch \'sa Dragonera\' gehört, 1995 als Naturschutzpark deklariert. Der Ort Andratx liegt inmitten der Gemeinde. Unser Verkaufsangebot umfasst Immobilien in Puerto de Andratx (auf Katalanisch Port d’Andratx), Cala Llamp, La Mola und Camp de Mar aber auch eine Villa oder Finca in Andratx.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Warum eine Villa in Andratx?'); ?></h2>
                <p><?php echo __('Wer hier, in einer der schönsten Ecken Mallorcas lebt, hat unendliche Möglichkeiten sich am kulturellen Lifestyle zu erfreuen und gleichzeitig die Landschaft zu genießen: das Tramuntana-Gebirge, die Steilküsten, die hübschen Buchten und das Meer. All das ist schätzenswerte Lebensqualität. Von der eigenen Finca in Andratx erreichen Sie schnell jede Bucht und können wunderbare Ausflüge ins Umland machen. Immobilien in Port Andratx liegen hübsch eingebettet an Gebirgshängen. Von modernen Apartmentanlagen schauen Sie aufs offene Meer, nach \'sa Dragonera\' und bei klarer Sicht sogar bis nach Ibiza.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Was zeichnet Port Andratx als Lage für exklusive Mallorca Immobilien aus?'); ?></h2>
                <p><?php echo __('Der moderne Hafenort war ursprünglich ein Fischerdorf. Heutzutage gibt es hier sogar einen Segel- und Jachtclub. Port d‘Andratx bietet eine große Auswahl an erstklassigen Restaurants mit schönen Terrassen und Boutiquen. Der kleine Sturzbach, der Torrente \'es Saluet\' mündet hier ins Hafenbecken, wo Fischer auf Booten ihren frischen Fisch verkaufen. Der Wachturm von La Mola ist Zeuge einer antiken Epoche, als Piraten und Freibeuter die Insel heimsuchten. Von der eigenen Villa in Andratx gelangen Sie rasch zu diesem reizvollen und kosmopolitischen Hafenort.'); ?></p>
                <h3 class="h3home_content"><?php echo __('Traumhafte Villen Wohnlagen in Camp de Mar, Cala Llamp und La Mola'); ?></h3>
                <p><?php echo __('Fährt man von Puerto de Andratx weiter zur Cala Llamp, ist die Überraschung ob dieser kleinen Bucht groß, denn sie ist nur 35 Meter lang und fünf Meter breit.  In Camp de Mar finden Sie einen der hübschesten Strände mit feinem Sandstrand. Der Ortskern entwickelte sich in den 80er Jahren. Der \'Torre de Cap Andritxol\' stammt aus antiker Zeit einstiger Verteidigung gegen Piraten und Freibeuter. Golffreunde finden hier einen der modernsten Golfplätze der Insel, den Golf de Andratx.'); ?></p>
                <p><?php echo __('Idyllisch ist das Ambiente auf La Mola, der nahen Halbinsel. Lustig wippen kleine Fischerboote im Meer, daneben liegen teure Luxusyachten. Beschaulich liegt La Mola inmitten der Felsklippen. Der Wachturm gilt als ihr Wahrzeichen. Römische Galeeren landeten hier einst und versorgten die Bastion Andrachium, den heutigen Ort Andratx mit ihren Waren. Auf einer Finca in Andratx leben Sie inmitten purer Natur, erreichen schnell alle Orte und nehmen zugleich am bunten Leben teil.'); ?></p>
            <?php endif;?>
            <?php if($type == 4): ?>
                <h1 class="h1home_content"><?php echo __('Apartments und Penthäuser zu kaufen in Palma de Mallorca'); ?></h1>
                <p><?php echo __('In Palma schlägt das Herz der Insel Mallorca - rund die Hälfte aller Inselbewohner lebt in einem Apartment in Palma an der langgezogenen Bucht an den Ausläufern des Tramuntana-Gebirges. Die Stadt selbst hat rund 300.000 Einwohner und nicht wenige kommen mittlerweile aus dem Ausland. So haben sich beispielsweise viele Norweger und Schweden ein Apartment in Palma zugelegt, bevorzugt im Szeneviertel Santa Catalina, das unter Insidern bereits den Spitznamen "Little Scandinavia" trägt.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Mit einem Apartment in Palma mitten im kulturellen Zentrum der Insel'); ?></h2>
                <p><?php echo __('Die Inselhauptstadt glänzt mit einem reichhaltigen Kulturangebot, das sich nicht allein auf die wunderschöne Kathedrale la Seu und andere Sehenswürdigkeiten wie die Plaza Major und den Almudaina-Palast beschränkt. Auch die Shopping-Vielfalt von der kleinen ausgefallenen Boutique bis hin zu den großen Ketten wie Zara spricht für die Stadt, ebenso das lebendige Nachtleben, das sich vor allem in Santa Catalina, rund um die Placa Mercat und entlang des Paseo Maritimo abspielt. Zum Sundowner laden die zahlreichen Beachclubs ein. Besonders exklusiv genießen lässt sich die Abendstimmung in einem Penthouse in Palma mit Blick über die gesamte Bucht.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Was macht Palma de Mallorca für den Kauf von Luxus Apartments attraktiv?'); ?></h2>
                <p><?php echo __('Die Vielfalt, die eine Großstadt mit sich bringt, ist jedoch nicht der einzige Pluspunkt, der für einen Kauf einer Wohnung in Palma de Mallorca spricht: Nur wenige Autominuten sind es zu den vier Golfplätzen in der direkten Umgebung, die teils eine atemberaubende Aussicht auf die Stadt bieten. Die Qual der Wahl haben auch Yachtbesitzer, die gleich sechs Yachthäfen ansteuern können. Besonders exklusiv geht es etwa in Puerto Portals mit Plätzen für Megayachten von bis 70 Metern Länge zu. Dementsprechend gibt es vom Appartement bis zum Penthouse in Palma ein großes Angebot an luxuriösen Immobilien, die dank der dauerhaften Beliebtheit der Metropole Wertsteigerungspotenzial bieten.'); ?></p>
                <h3 class="h3home_content"><?php echo __('Portixol, Paseo Marítimo und die Altstadt - beste Lagen für exklusive Apartments in Palma'); ?></h3>
                <p><?php echo __('Ein Apartment in Palma ist dank der unmittelbaren Nähe zum Flughafen ideal für alle, die ihren Wohnsitz auf die Insel verlegen und dort beziehungsweise in Deutschland berufstätig sind. Insbesondere wer häufig fliegt, ist im Vorort Portixol unweit des Flughafens gut aufgehoben. Der charmante Fischerort mit seinen Stadthäusern direkt am Strand gehört zu den begehrtesten Lagen für den Kauf einer Wohnung in Palma de Mallorca, ebenso der Hafenboulevard Paseo Maritimo und die Altstadt. Besonders exklusiv lebt es sich in einem Penthouse in Palma, was allerdings seinen Preis hat. Dafür lässt sich ein solches Juwel hervorragend vermieten. Auch eine Wohnung in Palma de Mallorca bietet bei entsprechender Lage und Ausstattung ganzjährig gute Möglichkeiten zur Vermietung.'); ?></p>
            <?php endif;?>
            <?php if($type == 5): ?>
                <h1 class="h1home_content"><?php echo __('Apartments und Penthäuser in Puerto de Andratx'); ?></h1>
                <p><?php echo __('Im äußersten Südwesten Mallorcas befindet sich der malerische Ort Andratx mit seinem Ableger Puerto de Andratx - oder Port d\'Andratx, wie ihn die Katalanen und Mallorquiner nennen. Sowohl das Bergdorf als auch der Hafenort sind bei deutschen Auswanderern beliebt. Für viele ist etwa ein Apartment in Puerto Andratx zur zweiten Heimat geworden.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Puerto de Andratx – eine besondere Lage für Immobilien auf Mallorca'); ?></h2>
                <p><?php echo __('Die idyllische Lage an der fjordartigen Bucht, eingebettet in die hügelige Landschaft, deren Berggipfel auf eine Höhe von 927 Metern hinaufreichen, ist ideal für alle, die ein Faible für Wandertouren haben. Zu den Highlights der Insel gehört eine Tour zum ehemaligen Kloster La Trapa, rund 380 Meter über dem Meer. Auch Wasserfans finden rund um Puerto de Andratx ein schönes Plätzchen zum Ausspannen und Baden, etwa in Sant Elm.'); ?></p>
                <p><?php echo __('Der Doppelort hat auch Kulturinteressierten einiges zu bieten - etwa das Centro Cultural und das Studio Weil der Künstlerin Barbara Weil, das von ihr und dem Star-Architekten Daniel Libeskind gegründet wurde. Puerto de Andratx punktet vor allem mit den einladenden Cafés und Restaurants entlang der Flaniermeile Avenida Mateo Bosch, etwa dem Cappuccino, das von vielen besucht wird, die eine Wohnung in Puerto Andratx besitzen.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Was macht Puerto de Andratx für Käufer von Luxus Immobilien so interessant?'); ?></h2>
                <p><?php echo __('Nicht nur die wunderschöne Lage, auch die exzellente Infrastruktur für höchste Ansprüche macht den Kauf einer Wohnung in Puerto Andratx lohnend. Zu den Attraktionen des Ortes gehört der Yachthafen mit einer Kapazität von rund 200 Schiffen, der unter Kennern als einer der schönsten Naturhäfen weltweit gilt. Für alle, die Hafenatmosphäre lieben, eignet sich am besten ein Penthouse in Port Andratx - oder am benachbarten Yacht Club de Vela. Ein Highlight für Golfer ist der Platz Golf de Andratx in Camp de Mar, nur wenige Kilometer entfernt.'); ?></p>
                <h3 class="h3home_content"><?php echo __('Reiches Angebot an Meerblick Appartements in Puerto de Andratx'); ?></h3>
                <p><?php echo __('Wer Meerblick wünscht, wird auf der Suche nach einem Apartment in Puerto Andratx und insbesondere rund um Cala Llamp fündig: Die Hanglage macht es möglich. Ebenso reizvoll kann ein Penthouse in Port Andratx sein, was vor allem für Kaufinteressenten eine attraktive Alternative ist, die "mittendrin" wohnen wollen.'); ?></p>
                <h3><?php echo __('Ein Apartment in Port Andratx als Investition mit Potential zur Wertsteigerung'); ?></h3>
                <p><?php echo __('Mit dem Kauf eines Apartments in Puerto Andratx darf auch eine stabile Wertentwicklung erwartet werden. Der Erwerb einer Wohnung in Puerto Andratx, vor allem in den privilegierten Lagen von La Mola, Cala Moragues oder Montport kann auch aus Renditegesichtspunkten lohnen, denn es gibt nur wenige Hotels, was eine Vermietung erleichtert. Das gilt ebenso für alle, die ein Penthouse in und um Port Andratx in Betracht ziehen.'); ?></p>
            <?php endif;?>
            <?php if($type == 6): ?>
                <h1 class="h1home_content"><?php echo __('Apartments und Penthäuser in Santa Ponsa'); ?></h1>
                <h2 class="h2home_content"><?php echo __('Santa Ponsa – eine begehrte Wohnlage auf Mallorca'); ?></h2>
                <p><?php echo __('Die Bucht von Santa Ponsa gehört zu den beliebtesten Gegenden der Ferieninsel Mallorca - und das nicht erst, seit die ersten Touristen das Eiland für sich entdeckten. Bereits im 13. Jahrhundert vor Christus wählten die Angehörigen der so genannten Talayot-Kultur die Gegend zum Siedeln aus. Die Spuren der ersten Bewohner in der Region lassen sich noch heute auf einem Hügel auf einem Ausgrabungsgelände oberhalb des Ortes besichtigen.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Gute Gründe für den Kauf einer Immobilie in Santa Ponsa'); ?></h2>
                <p><?php echo __('Der Badeort ist nicht ohne Grund seit vielen Jahren beliebt bei Touristen und solchen, die ihren Wohnsitz beispielsweise in Apartments in Santa Ponsa verlegt haben: Der etwa 1,3 Kilometer lange Strand wird von einer schön angelegten Promenade gesäumt, auf der es mediterran-lebendig zugeht - nicht nur in der Hauptsaison im Sommer. Damit ist eine Wohnung in Santa Ponsa auch für diejenigen attraktiv, die Mallorca außerhalb der Hauptreisezeit schätzen. Die kurze Distanz von etwa 20 Kilometern zur Hauptstadt Palma spricht ebenfalls für Immobilien in Santa Ponsa. Nicht nur die Inselmetropole liegt praktisch nur einen Katzensprung entfernt, auch der Prominenten-Hotspot Andratx ist lediglich eine kurze Autofahrt entfernt - ein weiterer Pluspunkt für den Erwerb von Immobilien in Santa Ponsa.'); ?></p>
                <h3 class="h3home_content"><?php echo __('Residieren in bevorzugter Wohnlage – mit einem Apartment in Santa Ponsa'); ?></h3>
                <p><?php echo __('Die günstige geographische Lage ist nicht der einzige Vorteil, wenn es um einen nachhaltig attraktiven Kauf von Immobilien in Santa Ponsa geht. Der Ort bietet auch eine hervorragende Infrastruktur für gehobene Ansprüche an die Freizeitgestaltung. Viele Appartements in Santa Ponsa sind nur einen Katzensprung von den drei Golfplätzen vor Ort entfernt. Für Wasserportbegeisterte mit eigenem Boot ist ein Penthouse oder eine Wohnung in Santa Ponsa ebenfalls erste Wahl: Sie können sowohl in Santa Ponsa direkt, als auch im benachbarten edlen Yachthafen Port Adriano vor Anker gehen, der vom Stardesigner Philippe Starck entworfen wurde.'); ?></p>
                <h3><?php echo __('Santa Ponsa: Meerblick-Immobilien für höchste Ansprüche'); ?></h3>
                <p><?php echo __('Wer entsprechend solvent ist, findet Penthäuser und Apartments in Santa Ponsa, die auch allerhöchsten Ansprüchen genügen - insbesondere an der benachbarten Costa de la Calma ist es je nach Grundstückslage möglich, in erster Meereslinie zu wohnen - keineswegs selbstverständlich auf der Insel. Wer eine solche Wohnung in Santa Ponsa erwirbt, kann sicher sein, ein nachhaltiges Investment getätigt zu haben, denn ein unverbaubarer Meerblick wird immer heiß begehrt sein.'); ?></p>
            <?php endif;?>
            <?php if($type == 7): ?>
                <h1 class="h1home_content"><?php echo __('Mit einer Villa in Palma im Herzen Mallorcas wohnen'); ?></h1>
                <p><?php echo __('Palma bildet den kulturellen und wirtschaftlichen Mittelpunkt der Insel Mallorca, etwa die Hälfte der Einwohner lebt dort. Doch die quirlige Mittelmeer-Metropole ist für viele Zugereiste auch zur zweiten Heimat geworden, und das nicht nur in Apartments: Eine Villa und die Großstadt nahezu vor der Tür - der Markt für Immobilien in Palma bietet auch das.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Warum eine Immobilie in Palma de Mallorca?'); ?></h2>
                <p><?php echo __('Immobilien in Palma zu kaufen, kann attraktive Chancen eröffnen, denn die Stadt bietet aufgrund ihrer gewachsenen Struktur attraktive Rahmenbedingungen - etwa eine lebendige Kulturszene, die durch historische Bauten wie die Kathedrale La Seu, den Almudaina-Palast und die Plaza Major abgerundet. Hinzu kommen zahlreiche Läden, die zum Shoppen und Entdecken animieren. Ein weiteres Highlight bildet das Nachtleben der Stadt, das allen Altersgruppen gerecht wird.'); ?></p>
                <p><?php echo __('Ein weiteres Plus: die Nähe zum Flughafen mit Direktverbindungen in alle Metropolen Europas. Ebenso ist die Anbindung an alle Inselgegenden dank des gut ausgebauten Straßennetzes hervorragend. Damit eignet sich eine Villa in Palma nicht nur für diejenigen, die ein Feriendomizil suchen, sondern insbesondere für alle, die vor Ort beruflich tätig sind.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Was macht Palma de Mallorca für den Kauf von Luxusvillen attraktiv?'); ?></h2>
                <p><?php echo __('Neben den Vorteilen einer historisch gewachsenen Metropole bietet Palma auch einer erholungsbedürftigen Klientel mit hohen Ansprüchen das passende Umfeld. So laden allein vier Golfplätze in der direkten Umgebung zu einer Partie ein. Wer weder auf eine Villa noch auf eine Yacht verzichten will, findet in und um Palma sechs Yachthäfen, von denen derjenige in Puerto Portals besonders exklusiv ist.'); ?></p>
                <h3 class="h3home_content"><?php echo __('Breitgefächertes Angebot: eine Villa, ein Stadthaus oder ein Altstadtpalast in Palma'); ?></h3>
                <p><?php echo __('Für den Kauf von Immobilien in Palma kommen nicht nur Apartments und Penthäuser in Betracht. Vor allem in Bonanova, Son Armadams und Son Vida am Golfplatz werden Käufer, die mit einer Villa in Palma liebäugeln, fündig und dürfen sich je nach Grundstückslage auf einen atemberaubenden Blick über die Bucht von Palma freuen. Wer auf einen Garten verzichten kann und dennoch ein eigenes Haus statt einer Wohnung bevorzugt, kann statt einer Villa in Palma auch einen der wunderschönen Altstadtpaläste in Betracht ziehen, die mit Charme und urbanem Flair punkten. Wer direkte Meeresnähe bevorzugt, sollte ein Auge auf die Stadthäuser in Portixol werfen: Nur die kleine Uferstraße trennt die teils futuristisch sanierten Häuser von Strand und Meer.'); ?></p>
                <p><?php echo __('Die erstklassigen Rahmenbedingungen machen Immobilien in Palma mit zu den exklusivsten der Insel. Das hat seinen Preis, was allerdings gerechtfertigt ist: So bietet eine Villa in Palma mehr Potenzial für eine ganzjährige Vermietung als vergleichbare Objekte in Strandlage, die eher im Sommer gefragt sind.'); ?></p>
            <?php endif;?>
            <?php if($type == 8): ?>
                <h1 class="h1home_content"><?php echo __('Hotels auf Mallorca kaufen'); ?></h1>
                <p><?php echo __('Mallorca erfreut sich unter Urlaubern seit Jahrzehnten größter Beliebtheit. Insbesondere deutsche Urlauber zieht es immer wieder auf die Baleareninsel, aber auch zahlreiche Briten, gefolgt von Urlaubern aus ganz Europa.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Warum ein Hotel auf Mallorca?'); ?></h2>
                <p><?php echo __('Die Baleareninsel besticht durch ihre landschaftliche Vielfalt - von der einsamen Bergwelt der Serra de Tramuntana bis zur flachen Dünenlandschaft im Südosten, vom Großstadtfeeling in Palma bis zum idyllischen Dorfleben in Landesinneren bietet die Insel für jeden Geschmack das Passende. Dementsprechend breit gefächert ist auch das touristische Angebot mit über 300.000 Gästebetten - vom einfachen Hostal bis zum Luxusresort ist alles auf der Insel vertreten. Neben der reizvollen Landschaft punktet die Insel auch mit einer beeindruckenden Vielfalt an Sportmöglichkeiten: Golfer haben die Wahl zwischen 24 Plätzen, die sich über die Insel verteilen. Hinzu kommen zahlreichen Yachthäfen sowie ideale Bedingungen für Tennisspieler und Radfahrer. Für letztere haben sich die Monate Februar bis April fest als Trainingsziel vor der Sommersaison etabliert.'); ?></p>
                <h2 class="h2home_content"><?php echo __('Was macht ein Hotelinvestment auf Mallorca attraktiv?'); ?></h2>
                <p><?php echo __('Für den Kauf eines Hotels auf Mallorca spricht aber auch die einfache Anreise aus ganz Europa und insbesondere aus Deutschland. Weitere Pluspunkte sind die niedrige Kriminalitätsrate sowie die politische und rechtliche Stabilität. Das milde Klima spricht außerdem für die Insel, die sich ganzjährig als Urlaubsziel eignet.'); ?></p>
                <h3 class="h3home_content"><?php echo __('Vielfältige Auswahl auf Mallorca: Fincahotel, Stadthotel, Strandhotel'); ?></h3>
                <p><?php echo __('Wer ein Hotel auf Mallorca kaufen will, hat die Qual der Wahl: Genauso vielfältig wie sich die Insel als Ganzes präsentiert, ist das Angebot. Insgesamt über 1.500 Beherbergungsbetriebe gibt es auf der Insel. Mit besonderem Charme macht so manches Landhotel auf Mallorca den kleinen Nachteil, nicht direkt am Meer zu liegen, wett. Ein Fincahotel auf Mallorca zu kaufen, kann je nach Lage und Ausstattung ein reizvolles Investment sein, denn immer mehr Individualisten schätzen die Ruhe dieser meist in Alleinlage befindlichen Quartiere. Auch ein Investment in ein Stadthotel auf Mallorca kann attraktive Chancen bieten, etwa ein der beliebten Altstadt von Palma.'); ?></p>
                <h3><?php echo __('Verwirklichung eines Lebenstraums mit dem Kauf eines Hotels auf  Mallorca'); ?></h3>
                <p><?php echo __('Ein Hotel auf Mallorca zu kaufen, ist unter anderem auch deswegen eine Überlegung wert, weil die Insel immer mehr zum Ganzjahresziel wird. Hinzu kommt die zunehmende Beliebtheit der Insel als Ziel für Firmen-Meetings. Ein Fincahotel auf Mallorca zu kaufen, kann jedoch mehr als ein Renditeobjekt sein. So manches liebevoll restaurierte Landhotel auf Mallorca ist der wahrgewordene Traum seines Besitzers und nicht nur Renditeobjekt. Ein gutes Beispiel dafür, wie ein solcher Traum aussehen kann, ist das Castell son Claret, das der Logistik-Milliardär Klaus-Michael Kühne zu einem Fincahotel der Luxusklasse hat umbauen lassen.'); ?></p>
            <?php endif;?>
        </div>
    </div>
<?php
endif;
//$this->set('title_for_layout', __('Fincas Mallorca | Villas Mallorca | Traumvillen | Landhäuser'));
?>
