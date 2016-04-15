<!--<div class="modal" id="sms">
    <a class="close"></a>
    <div class="header">
        <img src="/img/logo.jpg" class="logo" alt="<?php echo __('Mallorca-Finest-Properties'); ?>" />
    </div>
    <h4 class="orange"><?php echo __('SMS - Rückrufservice'); ?></h4>
    <p><?php echo __('Wünschen Sie weitere Informationen in einem persönlichen Gespräch? Dann füllen Sie bitte das nachstehende Formular vollständig aus, wir werden direkt per SMS über Ihren Kontaktwunsch benachrichtigt und können uns zeitnah um Ihre Anfrage kümmern und Sie zurückrufen!'); ?></p>
    <div class="form">
<?php echo $this->Form->create('Smscallback', array('action' => 'index', 'style' => 'clear:both;')); ?>
<?php
if (isset($objects) && count($objects)):
    ?>
                <div class="row" style="padding: 0 0 10px 0;">
                    <div class="infoleft"><?php echo __('Objekt:'); ?></div><div class="inforight"><?= $objects[0]['Gesamtobjekt']['OBJ_NUMMER'] ?></div><div class="clr"></div>
                    <div class="infoleft"><?php echo __('Titel:'); ?></div><div class="inforight"><?= $objects[0]['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'] ?></div><div class="clr"></div>
                    <div class="infoleft"><?php echo __('Ort:'); ?></div><div class="inforight"><?= $objects[0]['Gesamtobjekt']['REG_NAME'] ?><?php if ($objects[0]['Gesamtobjekt']['BER_EXPOSERELEVANT'] == 1) echo ', ' . $objects[0]['Gesamtobjekt']['BER_NAME']; ?></div><div class="clr"></div>
                </div>
    <?php echo $this->Form->hidden('OBJ_ID', array('value' => $objects[0]['Gesamtobjekt']['OBJ_ID'])); ?>
    <?php
endif;
?>
<?php echo $this->Form->input('name', array('label' => __('* Ihr Name', true), 'div' => 'row')); ?>
<?php echo $this->Form->input('email', array('label' => __('* Ihre E-Mail Adresse', true), 'div' => 'row')); ?>
<?php echo $this->Form->input('tel_country', array('label' => __('* Telefon', true), 'div' => 'oneline', 'value' => __('Land', true))); ?>
<?php echo $this->Form->input('tel_pre', array('label' => false, 'div' => 'oneline', 'value' => __('Vorwahl', true))); ?>
<?php echo $this->Form->input('tel_number', array('label' => false, 'div' => 'oneline', 'value' => __('Nummer', true))); ?>
        <div class="clr"></div><div id="errorplaceholder"></div><div class="clr"></div>
        <div class="hint"><?php echo __('Beispiel:'); ?><span id="country">0049</span><span id="pre">1234</span><span id="number">123456789</span> </div>
<?php echo $this->Captcha->input(); ?>
        <div class="clr"></div>
<?php echo $this->Form->button(__('absenden', true), array('type' => 'submit', 'class' => 'submitbtn')); ?>
        <div class="loadingDiv" style="display:none;"><?php echo $this->Html->image('Ladeanimation.gif'); ?><?php echo __('Daten werden übertragen ...'); ?></div>
<?php echo $this->Form->end(); ?>
    </div>
</div>-->

<div class="modal custom-modal fade" tabindex="-1" role="dialog" id="sms">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <img src="/img/logo.jpg" class="logo" alt="<?php echo __('Mallorca-Finest-Properties'); ?>" />
            </div>
            <div class="modal-body clearfix" style="background-color: #58585a;">
                <h4 class="orange"><?php echo __('SMS - Rückrufservice'); ?></h4>
                <p><?php echo __('Wünschen Sie weitere Informationen in einem persönlichen Gespräch? Dann füllen Sie bitte das nachstehende Formular vollständig aus, wir werden direkt per SMS über Ihren Kontaktwunsch benachrichtigt und können uns zeitnah um Ihre Anfrage kümmern und Sie zurückrufen!'); ?></p>
                <div class="form">
                    <?php echo $this->Form->create('Smscallback', array('action' => 'index', 'style' => 'clear:both;')); ?>
                    <?php
                    if (isset($objects) && count($objects)):
                        ?>
                        <div class="row" style="padding: 0 0 10px 0;">
                            <div class="infoleft"><?php echo __('Objekt:'); ?></div><div class="inforight"><?= $objects[0]['Gesamtobjekt']['OBJ_NUMMER'] ?></div><div class="clr"></div>
                            <div class="infoleft"><?php echo __('Titel:'); ?></div><div class="inforight"><?= $objects[0]['Gesamtobjekt']['OBJ_UET_UEBERSCHRIFT'] ?></div><div class="clr"></div>
                            <div class="infoleft"><?php echo __('Ort:'); ?></div><div class="inforight"><?= $objects[0]['Gesamtobjekt']['REG_NAME'] ?><?php if ($objects[0]['Gesamtobjekt']['BER_EXPOSERELEVANT'] == 1) echo ', ' . $objects[0]['Gesamtobjekt']['BER_NAME']; ?></div><div class="clr"></div>
                        </div>
                        <?php echo $this->Form->hidden('OBJ_ID', array('value' => $objects[0]['Gesamtobjekt']['OBJ_ID'])); ?>
                        <?php
                    endif;
                    ?>
                    <?php echo $this->Form->input('name', array('label' => __('* Ihr Name', true), 'div' => 'row')); ?>
                    <?php echo $this->Form->input('email', array('label' => __('* Ihre E-Mail Adresse', true), 'div' => 'row')); ?>
                    <div class="row oneline tel-first required">
                        <?php echo $this->Form->input('tel_country', array('label' => __('* Telefon', true), 'div' => false, 'type' => 'number')); ?>
                        <?php echo $this->Form->input('tel_pre', array('label' => false, 'div' => false, 'type' => 'number')); ?>
                        <?php echo $this->Form->input('tel_number', array('label' => false, 'div' => false, 'type' => 'number')); ?>
                    </div>
                    <div class="clr"></div><div id="errorplaceholder"></div><div class="clr"></div>
                    <div class="hint"><?php echo __('Beispiel:'); ?><span id="country">0049</span><span id="pre">1234</span><span id="number">123456789</span> </div>
                    <?php echo $this->Captcha->input(); ?>
                    <div class="clr"></div>
                    <?php echo $this->Form->button(__('absenden', true), array('type' => 'submit', 'class' => 'submitbtn')); ?>
                    <div class="loadingDiv" style="display:none;"><?php echo $this->Html->image('Ladeanimation.gif'); ?><?php echo __('Daten werden übertragen ...'); ?></div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>