<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<title>Contact</title>
<meta name="description" content="<?php if(isset($metadesc)){ echo $metadesc; }else{ echo __('Finest Properties Mallorca Immobilien', true); }?>">
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="expires" content="0">
<?php
    echo $this->Html->css('jquery-ui-1.8.16.custom');
    echo $this->Html->css('MyFontsWebfontsKit');
    echo $this->Html->css('styles');
    echo $this->Html->css('skin');
    
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
	//echo $scripts_for_layout;
?>
<?=$this->Html->meta('icon');?>
<script type="text/javascript" src="/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="/js/jquery.tinyscrollbar.min.js"></script>
<script type="text/javascript" src="/js/scriptbreaker-multiple-accordion-1.js"></script>
<script type="text/javascript" src="/js/jquery.actions.js"></script>
</head>
<body>
<?php echo $this->element('contact', array('objects' => $objects)); ?>
<script type="text/javascript">
	$(function(){
		$('#contact').dialog({
			draggable:false,
			width: 500,
			position:[0,0]			
		});	
		$('.ui-dialog-titlebar-close').unbind('click').click(function(){window.close()});
	});
</script>
</body>
</html>