<?php echo __('Folgende Kontaktdaten wurden über das Kontaktformular hinterlegt:');?><br />
-------------------------------------------------------------------------<br />
<?php echo __('Name'); ?>: <?=$name?><br />
<?php echo __('E-Mail'); ?>: <?=$email?><br />
<?php echo __('Telefon'); ?>: <?=$phone?><br />
<?php echo __('Nachricht'); ?>: <?=$comments?><br />
-------------------------------------------------------------------------<br />
<?php if(isset($singleobject)): ?> <?php echo __('Angefragtes Objekt'); ?>: <?=$singleobject;?><br /><?php endif; ?>
<?php if(isset($moreobjects)): ?><?php echo __('Zusätzlich angefragte Objekte (Merkliste)'); ?>: <?=$moreobjectsstr;?><br /><?php endif; ?>
<?php if(isset($singleobject) || isset($moreobjects)): ?> -------------------------------------------------------------------------<br /><?php endif; ?>
<?php echo __('Anfrage abgeschickt am:'); ?> <?=date('d.m.Y H:i');?>