<div class="modal" id="register">
    <a class="close"></a>
	<div class="header">
        <img src="/img/logo.jpg" class="logo" alt="<?php echo __('Mallorca-Finest-Properties'); ?>" />
    </div>
    <h4 class="orange"><?php echo __('Registrierung Merkliste'); ?></h4>

    <div class="form">
    <?php echo __('Um Ihre gemerkten Immobilien dauerhaft speichern zu können, bitten wir Sie, die nachfolgenden Felder auszufüllen. Sie können sich dann im Anschluss mit Ihrer E-Mailadresse und Ihrem gewählten Passwort jederzeit einloggen und Ihre Objekte verwalten.'); ?><br /><br />
    <?php echo $this->Form->create('User', array('action' => 'add', 'style' => 'clear:both;')); ?>

    <?php echo $this->Form->input('ben_name', array('label'=>__('* Name', true), 'div' =>'row')); ?>
    <?php echo $this->Form->input('username', array('label'=>__('* E-Mail Adresse', true), 'div' =>'row', 'id'=>'xusername')); ?>
    <?php echo $this->Form->input('passwd', array('label'=>__('* Passwort', true), 'div' =>'row', 'id'=>'xpassword')); ?>
    <?php echo $this->Form->input('ben_telefon', array('label'=>__('Telefon', true), 'div' =>'row')); ?>
    <?php echo $this->Form->input('ben_ort', array('label'=>__('Ort', true), 'div' =>'row')); ?>
    <?php echo $this->Form->input('ben_land', array('label'=>__('Land', true), 'div' =>'row')); ?>
    <?php echo $this->Captcha->input(); ?>
    <div class="clr"></div>
    <?php echo $this->Form->button(__('absenden', true), array('type'=>'submit', 'class' => 'submitbtn')); ?>
    <div class="loadingDiv" style="display:none;"><?php echo $html->image('Ladeanimation.gif'); ?><?php echo __('Daten werden übertragen ...'); ?></div>
    <?php echo $this->Form->end(); ?>
        
    </div>
</div>