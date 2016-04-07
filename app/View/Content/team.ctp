<?php
$this->set('title_for_layout', __('Finest Porperties Mallorca – Ihr kompetentes Immobilienmakler Mallorca Team'));
$this->set('metadesc', __('Immobilienmakler Mallorca – Finest Porperties Mallorca Ihr Makler wenn es um exklusive Immobilien, Villas, Fincas und Apartments geht.'));
?>
<div class="banner"><img src="/img/banner_20.jpg" alt="" /></div>
<div class="border_orange"></div>
<div class="clr"></div>
<div class="staticcontent">
    <div class="staticcontentarea">
        <h1 class="orange"><?php echo __('Unsere Immobilienmakler sind für Sie auf Mallorca da'); ?></h1>

        <?php if($this->Session->read('Config.language') == 'deu'): ?>
        <div><?php echo __('Unsere <strong>Immobilienmakler Mallorca</strong> vermitteln Ihnen Ihre <strong>Wunschimmobilie</strong> auf <strong>Mallorca</strong>. Die Immobilien werden nach Ihren Vorgaben ausgesucht. Selbstverständlich erhalten Sie die Möglichkeit zu mehreren Besichtigungen, um sich ein Bild von unseren Anliegen zu machen.'); ?></div>
        <h2><?php echo __('Vor und nach dem Kauf Ihrer neuen Mallorca Immobilie können Sie auf uns zählen'); ?></h2>
        <div><?php echo __('Unsere <strong>Makler</strong> stehen Ihnen vor und nach dem Verkauf auf <strong>Mallorca</strong> beratend zur Seite. Sie sind jederzeit für Sie da, wenn Fragen auftauchen oder Probleme entstehen sollten. Auch bei der Vertragsabwicklung sind Sie Ihnen natürlich gerne behilflich.'); ?></div>
        <h3><?php echo __('SMS – Rückrufservice'); ?></h3>
        <div><?php echo __('Sie haben mehrere Möglichkeiten unsere <strong>Immobilienmakler</strong> auf <strong>Mallorca</strong> zu kontaktieren. Nehmen Sie telefonisch Kontakt auf oder schicken Sie uns eine SMS. Unsere <strong>Immobilienmakler</strong> werden sich so schnell wie möglich bei Ihnen melden um gemeinsam mit Ihnen Ihre <strong>Wunschimmobilie</strong> auf <strong>Mallorca</strong> zu finden. Selbstverständlich stehen Ihnen unsere <strong>Makler</strong> auch gerne via E-Mail Kontakt zur Verfügung.'); ?></div>
        <h4><?php echo __('Newsletter'); ?></h4>
        <div><?php echo __('Um immer auf dem Laufenden zu sein, empfehlen wir Ihnen, unseren <strong>kostenlosen Newsletter</strong> zu abonnieren. Hier erfahren Sie als erstes, welche neuen Immobilien auf <strong>Mallorca</strong> zum Verkauf angeboten werden und <strong>welches Angebot Sie auf keinen Fall versäumen sollten</strong>!'); ?></div>
        <?php endif; ?>
        
        <p ><?php echo __('Wir freuen uns auf Ihren Anruf oder'); ?> <?=$this->Html->link(__('schreiben Sie uns hier!'), array('controller' => 'contacts', 'action' => 'show', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Kontakt'))), array('class' => 'whitelink'));?></p>
        <div class="clr"></div>
        <div class="blogs"><img src="/img/team/Markus-Redlich.jpg" alt="<?php echo __('Immobilienmakler Markus Redlich'); ?>" /><p>Markus Redlich<br /><?php echo __('Inhaber + CEO'); ?><br />+34 971 69 81 49<br /><br /><!--a class="smsicon" href="#" class="modalInput" rel="#sms"><?php echo __('SMS Rückruf-Service'); ?></a--><br /><?php echo $this->Mailto->encode('markus@finestpropertiesmallorca.com', __('E-Mail senden', true), 'mailicon'); ?></p></div>
        <div class="blogs"><img src="/img/team/Volker-Schupp.jpg" alt="<?php echo __('Sales Manager Volker Schupp'); ?>" /><p>Volker Schupp<br /><?php echo __('Sales Manager'); ?><br />+34 971 69 81 49<br /><br />&nbsp;<br /><?php echo $this->Mailto->encode('info@finestpropertiesmallorca.com', __('E-Mail senden', true), 'mailicon'); ?></p></div>
        <div class="blogs"><img src="/img/team/Cornelia-Schaedlich.jpg" alt="<?php echo __('Office Manager Cornelia Schädlich'); ?>" /><p>Cornelia Schädlich<br /><?php echo __('Office Manager'); ?><br />+34 971 69 81 49<br /><br />&nbsp;<br /><?php echo $this->Mailto->encode('info@finestpropertiesmallorca.com', __('E-Mail senden', true), 'mailicon'); ?></p></div>
        <div class="blogs"><img src="/img/team/Elena-Pyatnitsa.jpg" alt="Elena Pyatnitsa" /><p>Elena Pyatnitsa<br /><br />+34 971 69 81 49<br /><br />&nbsp;<br /><?php echo $this->Mailto->encode('info@finestpropertiesmallorca.com', __('E-Mail senden', true), 'mailicon'); ?></p></div>
    </div>
</div>
<?= $this->element('sms');?>