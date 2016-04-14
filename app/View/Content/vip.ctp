<?php
$this->set('title_for_layout', __('Unser VIP Service für Mallorca Einsteiger'));
$this->set('metadesc', __('Unser exklusiver Mallorca VIP Service bietet allen, die die Insel noch nicht kennen, die Möglichkeit einen ersten Einblick in Luxus und Lifestyle auf Mallorca zu bekommen.'));
?>
<div id="sell" class="nivoSlider">
    <img src="/img/vip/1.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/2.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/3.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/4.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/6.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/7.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/8.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/9.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/10.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/11.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/12.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/13.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/14.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/15.jpg" alt="" class="img-responsive"/>
    <img src="/img/vip/16.jpg" alt="" class="img-responsive"/>
</div>
<div class="clearfix"></div>
<div class="border_orange"></div>
<div class="clr"></div>
<div class="staticcontent">
    <div class="staticcontentarea">
        <h1 class="orange"><?php echo __('VIP-Luxus-Wochenende auf Mallorca erleben'); ?></h1>
        <h2><?php echo __('Mallorca als Luxus- und Lifestyle Residenz kennen lernen'); ?></h2>
        <p><?php echo __('Lernen Sie die attraktivsten Seiten Mallorcas kennen – individuell, exklusiv, authentisch!'); ?></p>

            <?php echo __('Eine individuelle Beratung und intensive, professionelle Betreuung ist unsere Handlungsmaxime für jeden unserer Kunden.'); ?><br />
            <?php echo __('Für diejenigen unter ihnen, denen nur die höchsten Ansprüche genügen, bieten wir  darüber hinaus ein individuell gestricktes VIP-Programm an, um Mallorcas Lifestyle und Hot Spots kennenzulernen.'); ?><br />
            <?php echo __('Unser Rundum-Betreuungspaket beinhaltet:'); ?>
            <ul>
                <li><?php echo __('2-3 Tage Übernachtung im Hotel der Fünf-Sterne-Kategorie'); ?></li>
                <li><?php echo __('Fahrservice'); ?></li>
                <li><?php echo __('Ausflug mit Helikopter und / oder Boot'); ?></li>
                <li><?php echo __('Entdecken Sie mit uns die Hot Spots der Insel wie z.B. der angesagtesten Restaurants, Clubs, Bodegas, etc.'); ?></li>
                <li><?php echo __('auf Wunsch Besichtigung von ausgewählten Luxusimmobilien und exklusiven Wohnlagen auf Mallorca'); ?></li>
                <li><?php echo __('und vieles mehr'); ?></li>
            </ul>

        <p><?php echo __('Bevor Sie sich für eine Immobilie entscheiden und Mallorca als Ihre neues Urlaubsdomizil oder gar permanente Residenz wählen, ist es uns wichtig, dass Sie Mallorca und sein mediterranes Lebensgefühl kennen lernen. Alles, was Mallorca an Lifestyle bietet, zeigen wir Ihnen daher mit diesem VIP-Angebot. Da wir selbst seit vielen Jahren auf der Insel leben, garantieren wir Ihnen authentische Einblicke in die Inselwelt weitab von den üblichen Touristenpfaden.'); ?></p>
        <p><?php echo __('Preis und alle weiteren Informationen auf Anfrage.'); ?> <?=$this->Html->link(__('Schreiben Sie uns hier!'), array('controller' => 'contacts', 'action' => 'show', 'language' => $this->Session->read('Config.language'), 'slug' => Inflector::slug(__('Kontakt'))), array('class' => 'whitelink'));?></p><br />
    </div>
</div>