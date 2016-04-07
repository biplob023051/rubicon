<div class="container modal" id="news">
    <a class="close"></a>
	<div class="header">
        <img src="/img/logo.jpg" class="logo" alt="<?php echo __('Mallorca-Finest-Properties'); ?>" />
    </div>
    <h4 class="orange"><?php echo __('Newsletter'); ?></h4>
    <p><?php echo __('Mit unserem E-Mail Newsletter informieren wir Sie regelmäßig und kostenlos per E-Mail über aktuelle Themen, Events und Angebote.'); ?></p>
    <div class="form">
    <div class="clr"></div>
    <?php echo $this->Form->create('News', array('action' => 'index', 'style' => 'clear:both;')); ?>
    <?php echo $this->Form->input('name', array('label'=>__('* Ihr Name', true), 'div' =>'row')); ?>
    <?php echo $this->Form->input('email', array('label'=>__('* Ihre E-Mail Adresse', true), 'div' =>'row')); ?>
    <?php //echo $this->Captcha->input(); ?>
    <div class="clr"></div>
    <?php echo $this->Form->button(__('absenden', true), array('type'=>'submit', 'class' => 'submitbtn')); ?>
    <div class="loadingDiv" style="display:none;"><?php echo $this->Html->image('Ladeanimation.gif'); ?><?php echo __('Daten werden übertragen ...'); ?></div>
    <?php echo $this->Form->end(); ?>
    </div>
</div>