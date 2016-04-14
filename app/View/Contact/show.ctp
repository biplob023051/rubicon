<?php
$this->set('title_for_layout', __('Kontaktieren Sie unser Immobilienbüro in Mallorca Costa de la Calma'));
$this->set('metadesc', __('Wir stehen Ihnen jederzeit zur Verfügung bei allen Fragen rund um den Kauf von Immobilien auf Mallorca. Nutzen Sie unseren Rückruf-Service oder schreiben Sie uns eine Email.'));
?>
<!-- Google Code for Anfrage Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1019908970;
    var google_conversion_language = "en";
    var google_conversion_format = "2";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "juO3CK7srAcQ6qaq5gM";
    var google_remarketing_only = false;
    /* ]]> */
</script>

<div class="staticcontentbg">
    <div class="col-md-12 staticcontentarea">
        <h4 class="orange"><?php echo __('Kontaktieren Sie unser Immobilienbüro'); ?></h4>
        <p><?php echo __('Gerne senden wir Ihnen weitere Informationen zu Ihrer Immobilienanfrage zu oder beantworten Ihnen Ihre Fragen. Füllen Sie dazu bitte möglichst alle Felder aus, wir werden uns dann in Kürze bei Ihnen melden.'); ?></p>
        <div class="form clearfix">
            <div class="col-md-8 col-sm-11 col-xs-11 contactform">
                <?php echo $this->Form->create('Contact', array('action' => 'index', 'class' => 'form-horizontal')); ?>
                <?php echo $this->Form->input('name', array('label' => __('* Ihr Name', true), 'class' => 'form-control', 'div' => 'mrgn-btm-15 clearfix')); ?>
                <?php echo $this->Form->input('email', array('label' => __('* Ihre E-Mail Adresse', true), 'class' => 'form-control', 'div' => 'mrgn-btm-15 clearfix')); ?>
                <?php echo $this->Form->input('phone', array('label' => __('Telefon', true), 'class' => 'form-control', 'div' => 'mrgn-btm-15 clearfix')); ?>
                <?php echo $this->Form->input('comments', array('label' => __('Ihre Nachricht an uns', true), 'class' => 'form-control', 'div' => 'mrgn-btm-15 clearfix')); ?>
                <?php
                if ($this->Bookmark->anyBookmarks()):
                    ?>
                    <div class="clearfix"></div>
                    <div class="highlight">
                        <?php echo __('Sie haben ausgewählte Immobilien auf Ihrer Merkliste gespeichert.'); ?><br />
                        <?php echo __('Möchten Sie für diese Objekte weitere Details anfragen?'); ?>
                    </div>
                    <?php echo $this->Form->input('checker', array('label' => __('Merkliste anzeigen?', true), 'div' => 'row indent', 'type' => 'checkbox', 'checked' => 'checked')); ?>
                    <div id="wrap">
                        <div id="bookmarks" class="jcarousel-skin-tango">
                            <div class="jcarousel-clip">
                                <ul class="jcarousel-list">
                                    <?php echo $this->element('jcarousel'); ?>
                                </ul>
                            </div>
                            <div disabled="disabled" class="jcarousel-prev jcarousel-prev-disabled"></div>
                            <div class="jcarousel-next"></div>
                        </div>
                    </div>
                    <div class="clr"></div>
                    <?php
                endif;
                ?>
                <div class="mrgn-btm-15">
                    <?php echo $this->Captcha->input(); ?>
                </div>
                <div class="mrgn-btm-15 clearfix">
                    <?php echo $this->Form->button(__('absenden', true), array('type' => 'submit', 'class' => 'submitbtn')); ?>
                </div>
                <div class="loadingDiv" style="display:none;"><?php echo $this->Html->image('Ladeanimation.gif'); ?><?php echo __('Daten werden übertragen ...'); ?></div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<div class="staticcontentbg"><a name="imprint"></a>
    <div class="staticcontentarea">
        <h4 class="orange"><?php echo __('Adresse'); ?></h4>
        <div class="clr"></div>
        <div class="col-md-6 col-sm-6 form-group clearfix">
            <p class="address">Finest Properties Mallorca, S.L.<span><img src="/img/dot.png" alt=""  rel="#googlemap" class="contact_google_link" id="OBJ9999lati2.48321056long39.52754668"/></span><br />
                Carretera de Andratx, km 18<br />
                E - 07183 Costa de la Calma<br />
                <br />
                <span style="padding-right: 20px"><?php echo __('Tel'); ?></span>+34 971 69 81 49<br />
                <span style="padding-right: 17px"><?php echo __('Fax'); ?></span>+34 971 69 81 50<br />
                <br />
                <?php echo $this->Mailto->encode('info@finestpropertiesmallorca.com', 'info@finestpropertiesmallorca.com', 'whitelink'); ?><br />
                <a href="http://www.finestpropertiesmallorca.com" class="whitelink">www.finestpropertiesmallorca.com</a><br />
                <br />
                <span style="padding-right: 15px">CEO</span>Markus Redlich<br />
                <span style="padding-right: 20px">CIF</span>B 575 251 56
            </p>
        </div>
        <div class="col-md-6 col-sm-6">
            <img src="/img/anfahrt.png" class="img-responsive"/>
        </div>
        <div class="clr" style="height: 40px;"></div>

        <h4 class="orange"><?php echo __('Urheberrecht'); ?></h4>
        <div class="clr"></div>
        <p><?php echo __('Finest Properties Mallorca S.L Produkte und Leistungen sind durch das spanische Urheberrecht geschützt. Die auf dieser Website enthaltenen Informationen, Fotos, Texte oder Grafiken dürfen ohne ausdrückliche schriftliche Genehmigung von Finest Properties Mallorca S.L. in keiner Weise kopiert, verliehen oder weitergegeben werden. Jede Reproduktion oder Veränderung mit heutigen technischen Mitteln ist ohne die schriftliche Erlaubnis streng verboten und wird mit allen rechtlichen Mitteln verfolgt und zur Anzeige gebracht.'); ?></p>
        <div class="clr" style="height: 40px;"></div>

        <h4 class="orange"><?php echo __('Haftungsausschluss'); ?></h4>
        <div class="clr"></div>
        <p><?php echo __('Trotz inhaltlicher Kontrolle übernehmen wir keine Haftung für die Vollständigkeit, Richtigkeit und Aktualität der Website und für die Inhalte externer Links, für Forenbeiträge und für die auf dem Portal eingestellten Angebote. Für den Inhalt der verlinkten Seiten sind ausschließlich deren Betreiber verantwortlich, für Forenbeiträge die Verfasser und für eingestellte Angebote die Anbieter.'); ?></p>
    </div>
    <div class="clr" style="height: 40px;"></div>
</div>
<?php echo $this->element('map'); ?>