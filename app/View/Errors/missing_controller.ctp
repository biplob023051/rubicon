<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<h2><?php echo __('Missing Controller'); ?></h2>
<p class="error">
	<strong><?php echo __('Error'); ?>: </strong>
	<?php printf(__('%s could not be found.', true), '<em>' . $controller . '</em>'); ?>
</p>
<p class="error">
	<strong><?php echo __('Error'); ?>: </strong>
	<?php printf(__('Create the class %s below in file: %s', true), '<em>' . $controller . '</em>', APP_DIR . DS . 'controllers' . DS . Inflector::underscore($controller) . '.php'); ?>
</p>
<pre>
&lt;?php
class <?php echo $controller;?> extends AppController {

	var $name = '<?php echo $controllerName;?>';
}
?&gt;
</pre>
<p class="notice">
	<pre><?php print_r($_SERVER['REDIRECT_QUERY_STRING']); ?></pre>
	<pre><?php print_r($_SERVER['REDIRECT_URL']); ?></pre>
	<pre><?php print_r($_SERVER['QUERY_STRING']); ?></pre>
	<pre><?php print_r($_SERVER['HTTP_USER_AGENT']); ?></pre>
	<pre><?php print_r($_SERVER['HTTP_ACCEPT_LANGUAGE']); ?></pre>
</p>