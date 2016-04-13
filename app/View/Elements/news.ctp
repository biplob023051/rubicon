<div class="modal custom-modal fade" tabindex="-1" role="dialog" id="news">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <img src="/img/logo.jpg" class="logo" alt="<?php echo __('Mallorca-Finest-Properties'); ?>" />
            </div>
            <div class="modal-body clearfix" style="background-color: #58585a;">
                <h4 class="orange"><?php echo __('Newsletter'); ?></h4>
                <p><?php echo __('Mit unserem E-Mail Newsletter informieren wir Sie regelmäßig und kostenlos per E-Mail über aktuelle Themen, Events und Angebote.'); ?></p>
                <div class="form">
                    <div class="clr"></div>
                    <?php echo $this->Form->create('News', array('action' => 'index', 'style' => 'clear:both;')); ?>
                    <?php echo $this->Form->input('name', array('label' => __('* Ihr Name', true), 'div' => 'row')); ?>
                    <?php echo $this->Form->input('email', array('label' => __('* Ihre E-Mail Adresse', true), 'div' => 'row')); ?>
                    <?php //echo $this->Captcha->input(); ?>
                    <div class="row required">
                        <?php echo $this->Form->button(__('absenden', true), array('type' => 'submit', 'class' => 'submitbtn')); ?>
                    </div>
                    <div class="loadingDiv" style="display:none;"><?php echo $this->Html->image('Ladeanimation.gif'); ?><?php echo __('Daten werden übertragen ...'); ?></div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>            
        </div>
    </div>
</div>