<?php
App::uses('AppHelper', 'View/Helper');

class MenuHelper extends AppHelper {
	var $helpers = array('Html');
 
/**
 * Highlight a menu option based on path
 *
 * A menu path gets passed and it compares to requestd path and sets the call to be highlighted.
 * Use regular ereg expressions in the pattern matching.
 *
 * @param path for wich the nav item should be highlighted
 * @param optional normal class to be returned, default navLink
 * @param optional highlight class to be returnd, default navLinkSelected
 * @return returns the proper class based on the url
 */
	function mainnav($path, $normal = '', $selected = 'active') {
		$class = $normal;
		$currentPath = substr($this->Html->here, strlen($this->Html->base));
		// if there is a star in the path we need to do different checking
		$regs = array();
		//if (preg_match('/$path$/', $currentPath)) {
        if (ereg($path,$currentPath,$regs)){
			$class .= " ".$selected;
		}
		return $class;
    }

    function leftnav($path, $normal = '', $selected = 'left_nav_active') {
		$class = $normal;
		$currentPath = substr($this->Html->here, strlen($this->Html->base));
		// if there is a star in the path we need to do different checking
		$regs = array();
		//if (preg_match('/$path$/', $currentPath)) {
        if (ereg($path,$currentPath,$regs)){
			$class .= " ".$selected;
		}
		return $class;
    }

    function tiles($path, $normal = 'tiles', $selected = 'tiles-active') {
		$class = $normal;
		$currentPath = substr($this->Html->here, strlen($this->Html->base));
		// if there is a star in the path we need to do different checking
		$regs = array();
		//if (preg_match('/$path$/', $currentPath)) {
        if (ereg($path,$currentPath,$regs)){
			$class .= " ".$selected;
		}
		return $class;
    }

    function myTruncate($string, $limit, $break=" ", $pad=" ..."){
      // return with no change if string is shorter than $limit
      if(strlen($string) <= $limit) return $string;

      // is $break present between $limit and the end of the string?
      if(false !== ($breakpoint = strpos($string, $break, $limit))) {
        if($breakpoint < strlen($string) - 1) {
          $string = substr($string, 0, $breakpoint) . $pad;
        }
      }

      return $string;
    }
}
?>