<?php
/**
 * @version		$Id: header.php 307 2010-02-04 10:55:58Z subfighter $
 * @package		ELEMENTS:
 * @author      JomVideo Development http://www.jomtube.com
 * @copyright	Copyright (c) 2009-2010 JomTube Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */
// no direct access -->
defined('_JEXEC') or die('Restricted access');

class JElementHeader extends JElement {
	var	$_name = 'header';

	function fetchElement($name, $value, &$node, $control_name){
		// Output
		return '
		<div style="font-weight:bold;font-size:12px;color:#ffffff;padding:4px;margin:0;background:#666666;border:1px solid #999999;">
			'.JText::_($value).'
		</div>
		';
	}
}
