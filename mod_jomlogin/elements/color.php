<?php
/**
 * @version		$Id: header.php 307 2010-02-04 10:55:58Z subfighter $
 * @package		ELEMENTS:COLOR
 * @author      Jomtube Development http://www.jomtube.com
 * @copyright	Copyright (c) 2009-2010 JomTube Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */
// no direct access -->
defined('_JEXEC') or die('Restricted access');

class JElementColor extends JElement
{
	var	$_name = 'Color';

	function fetchElement($name, $value, &$node, $control_name)
	{
        $document =& JFactory::getDocument();
	    $document->addScript(JURI::Root(true).'/modules/mod_jomlogin/js/jscolor/jscolor.js');
        $id_tag = $control_name.''.$name;

        $class = $node->attributes( 'class' ) ? $node->attributes( 'class' ) : "color {pickerFaceColor:'#555555',pickerBorder:2,pickerInset:3,hash:true}";
        $size = $node->attributes( 'size' ) ? $node->attributes( 'size' ) : "15";
        $value = $node->attributes( 'value' ) ? $node->attributes( 'value' ) : $value;

	    $elem = '<div>'.
	    		'<input type="text"' .
	    	    'id="'. $control_name . $name .'"' .
	            'name="'. $control_name . '[' . $name . ']"' .
	            'value="'. $value .'"' .
	    	    'size="'. $size .'"' .
	            'class="'. $class .'" /> ' .
	    		'<div id="ColorPicker" class="ColorPicker" style="background-color:'.$value.'"></div>'.
	    		'</div>';
	    return $elem;
    }
}