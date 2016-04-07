<?php echo __('Folgende Kontaktdaten wurden über das Kontaktformular hinterlegt:');?><?php echo "\n";?>
-------------------------------------------------------------------------<?php echo "\n";?>
<?php echo __('Name'); ?>: <?=$name?><?php echo "\n";?>
<?php echo __('E-Mail'); ?>: <?=$email?><?php echo "\n";?>
<?php echo __('Telefon'); ?>: <?=$phone?><?php echo "\n";?>
<?php echo __('Nachricht'); ?>: <?=$comments?> <?php echo "\n";?>
-------------------------------------------------------------------------<?php echo "\n";?>
<?php if(isset($singleobject)): ?> <?php echo __('Angefragtes Objekt'); ?>: <?=$singleobject;?><?php echo "\n";?><?php endif; ?>
<?php if(isset($moreobjects)): ?><?php echo __('Zusätzlich angefragte Objekte (Merkliste)'); ?>: <?=$moreobjectsstr;?><?php echo "\n";?><?php endif; ?>
<?php if(isset($singleobject) || isset($moreobjects)): ?> ------------------------------------------------------------------------- <?php echo "\n";?><?php endif; ?>
<?php echo __('Anfrage abgeschickt am:'); ?> <?=date('d.m.Y H:i');?>