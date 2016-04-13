<div class="modal custom-modal fade" tabindex="-1" role="dialog" id="rus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header clearfix">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <img src="/img/logo.jpg" class="logo" alt="<?php echo __('Mallorca-Finest-Properties'); ?>" />
            </div>
            <div class="modal-body clearfix" style="background-color: #58585a;">
                <h4 class="orange">По всем вопросам Вам поможет наш русскоговорящий сотрудник</h4>
                <p>Вышлите нам пожалуйста Ваши E-Mail и Ваши пожелания по поиску недвижимости и наш русскоговорящий сотрудник свяжется Вами.</p>
                <div class="form">
                    <div class="clr"></div>
                    <?php echo $this->Form->create('Rus', array('action' => 'index', 'style' => 'clear:both;')); ?>
                    <?php echo $this->Form->input('name', array('label' => __('* Ваш имя и фамилия:', true), 'div' => 'row')); ?>
                    <?php echo $this->Form->input('email', array('label' => __('* E-Mail:', true), 'div' => 'row')); ?>
                    <?php echo $this->Form->input('phone', array('label' => __('* телефон:', true), 'div' => 'row')); ?>
                    <?php //echo $this->Captcha->input(); ?>
                    <div class="clr"></div>
                    <?php echo $this->Form->button(__('послатъ', true), array('type' => 'submit', 'class' => 'submitbtn')); ?>
                    <div class="loadingDiv" style="display:none;"><?php echo $this->Html->image('Ladeanimation.gif'); ?><?php echo __('Daten werden übertragen ...'); ?></div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>            
        </div>
    </div>
</div>