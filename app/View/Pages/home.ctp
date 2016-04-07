<?php $this->set('title_for_layout', __('Immobilienmakler für exklusive Immobilien Mallorca | Apartments | Fincas Mallorca kaufen')); ?>
<?php $this->set('metadesc', __('Immobilien Mallorca kaufen – Finest Properties Ihr Immobilienmakler Mallorca für exklusive Mallorca Immobilien. Große Auswahl an Apartments und Fincas Mallorca')); ?>

<div class="content">
    <h1 class="h2home_content"><?php echo __('Exklusive Immobilien auf Mallorca kaufen: Ferienwohnungen, Fincas – Leben Sie Ihren Traum – wir helfen Ihnen dabei'); ?></h1>
    <span class="signatures <?=CakeSession::read('Config.language');?>"><?php echo __('Herzlich Willkommen'); ?></span>
    <h2 class="h2home"><?php echo __('Bei uns sind Sie an der richtigen Adresse, wenn Sie'); ?></h2>
    <ul style="list-style-type: square;">
        <li><?php echo __('Apartments auf Mallorca'); ?></li>
        <li><?php echo __('Fincas auf Mallorca oder'); ?></li>
        <li><?php echo __('andere exklusive Mallorca Immobilien'); ?></li>
    </ul>
    <?php echo __('suchen!'); ?><br/>
    <h2 class="h2home_content"><?php echo __('Finest Properties: Ihr kompetenter Makler auf Mallorca'); ?></h2>
    <div class="content">
        <div class="content_box_fullwidth content_box_rm">

        <p style="vertical-align: top">
            <?php echo __('Suchen Sie exklusive Mallorca Immobilien oder ein Mallorquina Apartment in schönster Lage ? Dann ist Finest Properties <strong>Mallorca</strong> genau der richtige Ansprechpartner für Sie. Luxuriöse Villenanlagen, komfortable <strong>Fincas</strong>, Villen oder Apartments auf Mallorca– unsere Immobilienmakler sind in der Lage, Ihnen ein breites Spektrum an hochwertigen <strong>Immobilien</strong> anzubieten. Palma de Mallorca, Santa Ponsa, Puerto Portals oder Puerto de Andratx mit der malerischen Bucht Cala Llamp sind nur einige der beliebten Orte und angesagten Wohngegenden, in denen wir Ihnen exklusive Objekte zum Kauf oder zur Miete vermitteln können. Verwirklichen Sie jetzt Ihren Traum von einer Luxusimmobilie auf Mallorca und nehmen Sie Kontakt mit uns auf.'); ?>
        </p>

        </div>
    </div>
    <p class="nameSignatures" style="float:right; font-size:20px; padding-bottom: 18px; padding-top: 0px; padding-right: 7px;">Markus Redlich</p>
    <div class="border_orange"/>
</div>
<div class="clr"/>
<div class="content">
    <div class="content_box_fullwidth content_box_rm">
        <h2 class="h2home_content"><?php echo __('Finest Properties präsentiert Ihnen exklusive Immobilien Mallorca'); ?></h2>
        <?=$this->Html->Link($this->Html->Image('finest-office-video.jpg', array('alt' => __('Finest Properties präsentiert Ihnen exklusive Immobilien Mallorca'))), array('controller' => 'content', 'action' => 'video', 'vid' => 'eygDwQeLEw4', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLFinest Properties präsentiert Ihnen exklusive Immobilien Mallorca'))), array('escape' => false, 'title' => __('Finest Properties präsentiert Ihnen exklusive Immobilien Mallorca'))); ?>
        <p><?php echo __('<p><strong>Finest Properties Mallorca</strong> präsentiert Ihnen exklusive Immobilien auf Mallorca. Aufgrund unserer langjährigen Erfahrung und Marktkenntnis können wir Ihnen auch die wirklich außergewöhnlichen Mallorca Immobilien zeigen, die nicht offiziell auf dem Immobilienmarkt verfügbar sind. In diesem Video erhalten Sie einen ersten Eindruck von unserer Arbeit als <strong>Immobilienmakler</strong> für Luxusimmobilien.</p>'); ?></p>
        <p><?=$this->Html->Link(__('Video ansehen'), array('controller' => 'content', 'action' => 'video', 'vid' => 'eygDwQeLEw4', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLFinest Properties präsentiert Ihnen exklusive Immobilien Mallorca'))), array('escape' => false, 'title' => __('Finest Properties präsentiert Ihnen exklusive Immobilien Mallorca'))); ?></p>
    </div>
    <div class="border_orange"/>
</div>
<div class="clr"/>
<div class="content">
    <div class="content_box content_box_rm">
        <h2 class="h2home_content"><?php echo __('Villen an erster Meereslinie'); ?></h2>
        <?=$this->Html->Link($this->Html->Image('Mallorca-Villen-an-erster-Meereslinie.jpg', array('alt' => __('Villen an erster Meereslinie'))), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '100', 'multiple' => 1, 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLVillen an erster Meereslinie'))), array('escape' => false, 'title' => __('Villen an erster Meereslinie'))); ?>
        <p>
	        <?php echo __('Eine Villa direkt am Meer gelegen: der Traum von einer Immobilie auf Mallorca. Hier finden Sie Luxusimmobilien mit sensationellem, unverbautem Blick auf das Meer.'); ?><br/>
	        <?=$this->Html->Link(__('mehr Details'), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '100', 'multiple' => 1, 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLVillen an erster Meereslinie'))), array('escape' => false, 'title' => __('Villen an erster Meereslinie'))); ?>
        </p>
    </div>
    <div class="content_box">
        <h2 class="h2home_content"><?php echo __('Die schönsten Ferienwohnungen auf der Insel'); ?></h2>
        <?=$this->Html->Link($this->Html->Image('Mallorca-Ferienwohnungen.jpg', array('alt' => __('Die schönsten Ferienwohnungen auf der zauberhaften Insel')), array('alt' => __(''))), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '1', 'multiple' => 1, 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLDie schönsten Ferienwohnungen auf der zauberhaften Insel'))), array('escape' => false, 'title' => __('Die schönsten Ferienwohnungen auf der zauberhaften Insel'))); ?>
        <p>
	        <?php echo __('<strong>Moderne Ferienwohnungen</strong> in den besten Wohnlagen Mallorcas. Genießen Sie Ihren  Urlaub in Ihrem neuen Ferienapartment oder bewohnen Sie ganzjährig eines der exklusiven Wohnungen aus unserem Angebot.'); ?><br />
	        <?=$this->Html->Link(__('mehr Details'), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '1', 'multiple' => 1, 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLDie schönsten Ferienwohnungen auf der zauberhaften Insel'))), array('escape' => false, 'title' => __('Die schönsten Ferienwohnungen auf der zauberhaften Insel'))); ?>
        </p>
    </div>

    <div class="content_box_devider"></div>

    <div class="content_box content_box_rm">
        <h2 class="h2home_content"><?php echo __('Freistehende Villen und Fincas'); ?></h2>
        <?=$this->Html->Link($this->Html->Image('Mallorca-Immobilien.jpg', array('alt' => __('Freistehende Villen und Fincas '))), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '3', 'multiple' => 2, 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLFreistehende Villen und Fincas'))), array('escape' => false, 'title' => __('Freistehende Villen und Fincas'))); ?>
        <p>
	        <?php echo __('Genießen Sie das mediterran- milde Wetter das ganze Jahr über in einer Luxus Villa auf Mallorca. <strong>Villen Mallorca</strong> - ob als Erst- oder Zweitwohnsitz, Villen und Immobilien auf der beliebten Insel zu kaufen, ist eine sichere Investition für die Zukunft.'); ?><br/>
	        <?=$this->Html->Link(__('mehr Details'), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '3', 'multiple' => 2, 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLFreistehende Villen und Fincas'))), array('escape' => false, 'title' => __('Freistehende Villen und Fincas'))); ?>
        </p>
    </div>
    <div class="content_box">
        <h2 class="h2home_content"><?php echo __('Grundstücke in besten Lagen vom Immobilienmakler'); ?></h2>
        <?=$this->Html->Link($this->Html->Image('Grundstuecke-Meerblick-Mallorca.jpg', array('alt' => __('Grundstücke in besten Lagen vom Immobilienmakler Mallorca'))), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '7', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLGrundstücke in besten Lagen vom Immobilienmakler Mallorca'))), array('escape' => false, 'title' => __('Grundstücke in besten Lagen vom Immobilienmakler Mallorca'))); ?>
        <p>
	        <?php echo __('Auf Mallorca Immobilien kaufen oder bauen? Bauen oder investieren Sie in wertstabile Baugrundstücke. Finest Properties Mallorca bietet Ihnen über einen Immobilienmakler Mallorca eine sorgfältige Auswahl an Grundstücken zum Kaufen in den bevorzugten Lagen der Insel.'); ?><br />
	        <?=$this->Html->Link(__('mehr Details'), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '7', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLGrundstücke in besten Lagen vom Immobilienmakler Mallorca'))), array('escape' => false, 'title' => __('Grundstücke in besten Lagen vom Immobilienmakler Mallorca'))); ?>
        </p>
    </div>

    <div class="content_box_devider"></div>

    <div class="content_box content_box_rm">
        <h2 class="h2home_content"><?php echo __('Immobilien Mallorca kaufen - traumhafte Altstadtpaläste'); ?></h2>
        <?=$this->Html->Link($this->Html->Image('Palma-de-Mallorca-Altstadt-Immobilien.jpg', array('alt' => __('Immobilien Mallorca kaufen - traumhafte Altstadtpaläste'))), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '300', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLImmobilien Mallorca kaufen - traumhafte Altstadtpaläste'))), array('escape' => false, 'title' => __('Immobilien Mallorca kaufen - traumhafte Altstadtpaläste'))); ?>
        <p>
	        <?php echo __('Immobilien mit Charakter: einzigartige Stadtjuwelen in der historischen Altstadt von Palma mit einem atemberaubenden Blick über die Stadt. Hier können Sie unser Angebot an hochwertig restaurierten Altstadtpalästen und traumhaften Villen einsehen.'); ?><br />
	        <?=$this->Html->Link(__('mehr Details'), array('controller' => 'gesamtobjekt', 'action' => 'search', 'cat' => '300', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLImmobilien Mallorca kaufen - traumhafte Altstadtpaläste'))), array('escape' => false, 'title' => __('Immobilien Mallorca kaufen - traumhafte Altstadtpaläste'))); ?>
        </p>
    </div>
    <div class="content_box">
        <h2 class="h2home_content"><?php echo __('Immobilien veräußern'); ?></h2>
        <?=$this->Html->Link($this->Html->Image('Mallorca-Immobilien-Verkaufen.jpg', array('alt' => __('Immobilien veräußern'))), array('controller' => 'content', 'action' => 'sell', 'multiple' => 2, 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLImmobilien veräußern'))), array('escape' => false, 'title' => __('Immobilien veräußern'))); ?>
        <p>
	        <?php echo __('Sie möchten Ihre einzigartige Mallorca Immobilie verkaufen und suchen ein Immobilienbüro oder einen Immobilienmakler auf Mallorca, der sich auf die Vermarktung exklusiver Objekte versteht? Dann freuen wir uns auf Ihren Kontakt!'); ?><br />
	        <?=$this->Html->Link(__('mehr Details'), array('controller' => 'content', 'action' => 'sell', 'multiple' => 2, 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('URLImmobilien veräußern'))), array('escape' => false, 'title' => __('Immobilien veräußern'))); ?>
        </p>
    </div>


    <div class="clr"></div>


    <?php if(CakeSession::read('Config.language') == 'deu'): ?>
    <div style="font-size: 13px;line-height: 17px;" class="content_box_fullwidth">
        <h2 class="h2home_content"><?php echo __('Warum gerade diese Insel?'); ?></h2>
        <p><?php echo __('Immobilien auf Mallorca erfreuen sich schon seit langem großer Beliebtheit und so ist der <strong>Immobilienmarkt</strong> hier ständig in Bewegung. Das ganzjährig milde Klima lockt nicht nur Saisonurlauber, sondern auch viele, die gerne den kalten Wintermonaten entkommen möchten. Einen Großteil des Jahres hier verbringen oder Mallorca gar zu ihrem Erstwohnsitz machen- was immer man möchte. Die Insel bietet alles, um auch höchsten Ansprüchen an Wohn- und Lebensqualität gerecht zu werden. Dazu zählen die vielseitigen Freizeitaktivitäten, Sportmöglichkeiten und kulturellen Einrichtungen. Darüber hinaus besteht eine gute Infrastruktur und eine hervorragende Anbindung an europäische und internationale Ziele. Die erstklassige ärztliche Versorgung – auch durch deutschsprachige Ärzte - ist ebenfalls ein bedeutender Pluspunkt. Dazu kommen die traumhaften Landschaften und die leichte Lebensart, die auch bei einem dauerhaften Aufenthalt zum Wohlfühlfaktor beitragen und die Kaufentscheidung für Immobilien auf Mallorca erleichtern.'); ?></p>

	    <h2 class="h2home_content"><?php echo __('Immobilien Mallorca – anspruchsvolle Wohnobjekte für eine anspruchsvolle Klientel'); ?></h2>
        <p><?php echo __('Bereits seit zehn Jahren ist Finest Properties Mallorca als <strong>Immobilienmakler</strong> tätig und hat sich dabei auf die Vermittlung von Luxusobjekten und <strong>Fincas</strong> auf dieser Ferieninsel spezialisiert. Aus dieser langjährigen Erfahrung heraus sind wir in der Lage, Ihnen die interessantesten Immobilien auf Mallorca zu präsentieren. Dabei steht für uns die individuelle Beratung und Betreuung unserer Kunden im Vordergrund, so dass Sie Ihre ganz persönliche Traumimmobilie finden können. Eine Villa direkt am Meer? Eine Finca, romantisch in den Bergen gelegen? Ein Altstadtpalast in Palma mit ganz besonderem Flair? Oder ein gepflegtes Apartment in einer der begehrten Wohnanlagen der Insel? Gemeinsam finden wir die Immobilien, die Ihren Vorstellungen entsprechen. Wenn Sie Ihre Immobilien bei uns kaufen, lassen wir Ihre Wünsche wahr werden.'); ?></p>

	    <h2 class="h2home_content"><?php echo __('Perfekter Rundumservice für Käufer'); ?></h2>
        <p><?php echo __('Sie interessieren sich für Immobilien auf Mallorca? Mit unserem VIP-Special bieten wir Ihnen die perfekte Möglichkeit, die Insel zunächst etwas besser kennenzulernen. Gerne zeigen wir Ihnen die besten Restaurants und Clubs, besichtigen mit Ihnen ausgewählte und exklusive Wohnobjekte und vermitteln Ihnen einen Eindruck vom echten, ursprünglichen Mallorca. Entdecken Sie den mediterranen Lifestyle abseits von jeglichem Massentourismus und lassen Sie sich von dieser wunderschönen, charmanten Insel verzaubern.'); ?></p>

	    <h2 class="h2home_content"><?php echo __('Für jeden Geschmack die richtige Immobilie'); ?></h2>
        <p><?php echo __('Gemütliche Landhäuser, eine traditionelle Finca, ein modernes Penthouse oder eine <strong>Villa der Extraklasse</strong> – was Stil, Größe und Lage anbetrifft, haben wir  für Sie in unserem Angebot. Deshalb sind die Immobilien, die wir Ihnen offerieren können, auch sehr verschieden, damit Sie genau das Objekt finden können, was zu Ihrem Lebensstil passt. Doch so unterschiedlich die Objekte unseres Portfolios auch sein mögen, eines haben sie alle gemeinsam: sie überzeugen durch gute Lage, gehobene Ausstattung, edles Ambiente und einen fairen Preis. Wir sind auf <strong>Mallorca</strong> bestens etabliert und daher in der Lage, Ihnen auch traumhafte Objekte anzubieten, die Sie auf dem offiziellen Markt sonst nicht erhalten. Sie möchten Ihr Traumhaus von Grund auf nach Ihren ganz individuellen Bedürfnissen und Vorlieben gestalten lassen? Dann vermitteln wir Ihnen gerne geeignete Baugrundstücke in TOP-Lagen, wie unter anderem Puerto de Andratx, Sol de Mallorca oder Santa Ponsa.'); ?></p>
        <p><?php echo __('Ganz nach gewünschtem Nutzungszweck kann Finest Properties Mallorca Ihnen passende <strong>Fincas</strong>, Villen, Grundstücke oder Apartments anbieten. Ob Sie ein Objekt als Erst- oder Zweitwohnsitz, als Ferienwohnung oder als reine Investition kaufen möchten – unsere Immobilienmakler begleiten Sie vom ersten Schritt an auf der Suche nach dem geeigneten Objekt. Lassen Sie sich von unseren Fincas auf Mallorca begeistern, verwirklichen Sie sich den Traum von einer Immobilie mit Meerblick, verwunschenen Landsitzen oder komfortablen Wohnungen in lebhaften Städten, genießen Sie die Ruhe und Einsamkeit in einer allein stehenden Finca oder profitieren Sie vom Komfort und Service in einer modernen Wohnanlage. Bis hin zur Schlüsselübergabe und selbst noch darüber hinaus bleibt Finest Properties Mallorca an Ihrer Seite und ist Ansprechpartner für alle Fragen rund um Ihre Traumimmobilie. Umfassender Service gehört, wie Sie bereits gemerkt haben, zu unseren Grundsätzen.'); ?></p>

	    <h2 class="h2home_content"><?php echo __('Mit Hilfe von Finest Properties Immobilien erfolgreich Fincas veräußern'); ?></h2>
        <p><?php echo __('Sie besitzen bereits eine exklusive Immobilie auf Mallorca und möchten diese gerne verkaufen? Auch dann stehen wir Ihnen zur Verfügung. Aufgrund unserer langjährigen Berufserfahrung können wir den Markt bestens einschätzen, Ihr Objekt professionell präsentieren und so die geeigneten Interessentenkreise ansprechen.'); ?></p>
        <p><?php echo __('Ob mieten, kaufen oder verkaufen – Finest Properties ist Ihr Partner für den Kauf und Verkauf luxuriöser und exklusiver Mallorca Immobilien.'); ?></p>

	    <h2 class="h2home_content"><?php echo __('Newsletter'); ?></h2>
        <p><?php echo __('Melden Sie sich hier für unsere kostenlosen Newsletter an und verpassen Sie kein Angebot mehr!'); ?></p>

	    <p><?php echo __('<strong>Kontaktieren Sie uns per Telefon oder direkt vor Ort und erfahren Sie mehr über unseren Service</strong>'); ?></p>
        <p><?php echo __('Sie haben noch Fragen? Dann kontaktieren Sie unsere Makler und vereinbaren Sie einen unverbindlichen Termin.'); ?></p>
    </div>
    <div class="clr"></div>
    <?php endif; ?>

	<div class="content_box_fullwidth">
		<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fhttp://www.finestpropertiesmallorca.com&amp;layout=box_count&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp" style="width:100px;height:60px;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
		<g:plusone href="http://www.finestpropertiesmallorca.com/" size="tall" annotation="bubble" recommendations="true" align="right"></g:plusone>

	</div>
</div>