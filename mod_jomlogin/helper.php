<?php
/**
 * @version		$Id: view.html.php 283 2010-02-02 11:55:43Z subfighter $
 * @package:    MODULES:JOMLOGIN
 * @author      Jomtube Development http://www.jomtube.com
 * @copyright	Copyright (c) 2009-2010 JomTube Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */
// no direct access -->
defined('_JEXEC') or die('Restricted access');

class modJomLoginHelper
{
	function getReturnURL($params, $type)
	{
		if($itemid = $params->get($type))
		{
			$menu =& JSite::getMenu();
			$item = $menu->getItem($itemid);
			$url = JRoute::_($item->link.'&Itemid='.$itemid, false);
		}
		else
		{
			// stay on the same page
			$uri = JFactory::getURI();
			$url = $uri->toString(array('path', 'query', 'fragment'));
		}

		return base64_encode($url);
	}

	function getType()
	{
	    $document =& JFactory::getDocument();
		$user = & JFactory::getUser();
		return (!$user->get('guest')) ? 'logout' : 'login';
	}

	function getBrowser()
	{
		$agent = ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) ? strtolower( $_SERVER['HTTP_USER_AGENT'] ) : false;
		$ie_version = false;

		if (preg_match("/msie/", $agent) && !preg_match("/opera/", $agent)){
            $val = explode(" ",stristr($agent, "msie"));
            $ver = explode(".", $val[1]);
			$ie_version = $ver[0];
			$ie_version = preg_replace("#[^0-9,.,a-z,A-Z]#", "", $ie_version);
		}

		return $ie_version;
	}
}
