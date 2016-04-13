<div class="modal custom-modal fade" tabindex="-1" role="dialog" id="contact">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <img src="/img/logo.jpg" class="logo" alt="<?php echo __('Mallorca-Finest-Properties'); ?>" />
            </div>
            <div class="modal-body clearfix" style="background-color: #58585a;">
                <h4 class="orange"><?php echo __('Sie wünschen weitere Details zu diesem Objekt?'); ?></h4>
                <p><?php echo __('Gerne senden wir Ihnen weitere Informationen zu Ihrer Immobilienanfrage zu oder beantworten Ihnen Ihre Fragen. Füllen Sie dazu bitte möglichst alle Felder aus, wir werden uns dann in Kürze bei Ihnen melden.'); ?></p>
                <div class="form">
                    <?php echo $this->Form->create('Contact', array('action' => 'index', 'style' => 'clear:both;')); ?>
                    <div class="row" style="padding: 0 0 10px 0;">
                        <div class="infoleft"><?php echo __('Objekt:'); ?></div><div class="inforight"><?= $objects[0]['Gesamtobjekt']['OBJ_NUMMER'] ?></div><div class="clr"></div>
                        <div class="infoleft"><?php echo __('Titel:'); ?></div><div class="inforight"><?= $objects[0]['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'] ?></div><div class="clr"></div>
                        <div class="infoleft"><?php echo __('Ort:'); ?></div><div class="inforight"><?= $objects[0]['Gesamtobjekt']['REG_NAME'] ?><?php if ($objects[0]['Gesamtobjekt']['BER_EXPOSERELEVANT'] == 1) echo ', ' . $objects[0]['Gesamtobjekt']['BER_NAME']; ?></div><div class="clr"></div>
                    </div>
                    <?php //echo debug($ContactSession);?>
                    <?php echo $this->Form->hidden('OBJ_ID', array('value' => $objects[0]['Gesamtobjekt']['OBJ_ID'])); ?>
                    <?php echo $this->Form->input('name', array('label' => __('* Ihr Name', true), 'div' => 'row', 'value' => @$ContactSession['0'])); ?>
                    <?php echo $this->Form->input('email', array('label' => __('* Ihre E-Mail Adresse', true), 'div' => 'row', 'value' => @$ContactSession['1'])); ?>
                    <?php echo $this->Form->input('phone', array('label' => __('Telefon', true), 'div' => 'row', 'value' => @$ContactSession['2'])); ?>
                    <?php echo $this->Form->input('comments', array('label' => __('Ihre Nachricht an uns', true), 'div' => 'row', 'type' => 'textarea', 'value' => @$ContactSession['3'])); ?>
                    <?php echo $this->Captcha->input(); ?>
                    <?php if (!isset($ContactSession)): ?>
                        <?php echo $this->Form->input('savedateinsession', array('label' => __('** Daten merken?', true), 'div' => 'row', 'type' => 'checkbox')); ?>
                        <div class="clr"></div>
                    <?php endif; ?>
                    <?php echo $this->Form->button(__('absenden', true), array('type' => 'submit', 'class' => 'submitbtn')); ?>
                    <div class="loadingDiv" style="display:none;"><?php echo $this->Html->image('Ladeanimation.gif'); ?><?php echo __('Daten werden übertragen ...'); ?></div>
                    <?php echo $this->Form->end(); ?>
                    <div class="clr"></div>
                    <?php if (!isset($ContactSession)): ?>
                        <span class="hint"><br /><?php echo __('** Wir speichern Ihre Daten (z.B. Name und E-Mailadresse) temporär für die Zeit Ihres Besuchs auf unserer Webseite ab, damit Sie bei weiteren Anfragen, diese nicht erneut eingeben müssen. Nach dem Schliessen des Browsers und dem Verlassen unserer Webseite werden Ihre Daten wieder gelöscht.'); ?></span>
                        <div class="clr"></div>
                    <?php endif; ?>
                </div>
            </div>            
        </div>
    </div>
</div>