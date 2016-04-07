<?php
$this->set('title_for_layout', __('Exklusive Mallorca Immobilien präsentiert von Finest Properties Mallorca'));
$this->set('metadesc', __('Unser Imagevideo gibt Ihnen einen kurzen Einblick in unsere Arbeit als Immobilienmakler für exklusive Immobilien auf Mallorca. Viel Spaß beim Anschauen.'));
?>
<div class="banner">
    <div id="video" rel="<?php echo $this->request->params['vid']; ?>">
        <div id="youtube-player-container"></div>
    </div>
    <div class="clr">
        <div class="staticcontent">
            <div class="staticcontentarea">
                <h1 class="orange"><?php echo __('Wir präsentieren ausgewählte Luxus Immobilien auf Mallorca'); ?></h1>
                <p><?php echo __('Lehnen Sie sich zurück und erhalten Sie einen ersten Eindruck von unserem Angebot an Immobilien auf Mallorca. Unser Immobilien Angebot ist so vielseitig wie die Wünsche unserer Kunden es sind. Alle vereint jedoch der Traum eine Residenz auf Mallorca zu besitzen und diesen endlich zu verwirklichen. Wir stehen Ihnen dabei mit Rat und Tat zur Seite.'); ?></p>
            </div>
        </div>

</div>