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

require_once (dirname(__FILE__).DS.'helper.php');

$doc =& JFactory::getDocument();
$doc->addScript(JURI::Root(true).'/modules/mod_jomlogin/js/jomlogin.js');

if ($params->get("load_css", "1") == "1")  $doc->addStyleSheet(JURI::Root(true)."/modules/mod_jomlogin/css/jomlogin.css");

/* IE 6-7-8 stylesheets */
$iebrowser = modJomLoginHelper::getBrowser();

if ($iebrowser && $params->get("load_css", "1") == "1") {
	$style = JURI::Root(true)."/modules/mod_jomlogin/css/jomlogin-ie$iebrowser";
	$check = dirname(__FILE__)."/css/jomlogin-ie$iebrowser";

	if (file_exists($check.".css")) $doc->addStyleSheet($style.".css");
	elseif (file_exists($check.".php")) $doc->addStyleSheet($style.".php");
}
/* End IE 6-7-8 stylesheets */

//$document =& JFactory::getDocument();
//$document->addStyleSheet(JURI::root(true)."/modules/mod_jomlogin/css/jomlogin.css");


$ie_version = $iebrowser;
$params->def('greeting', 1);
$params->def('fpassword', 1);
$params->def('fusername', 1);
$params->def('butsignin', 1);
$params->def('butcreate', 1);
$params->def('butcolor', '#F6F6F6');
$params->def('butcolorfont', '#999999');

$type 	= modJomLoginHelper::getType();
$return	= modJomLoginHelper::getReturnURL($params, $type);
$user   =& JFactory::getUser();

if ($params->get('jomtemplate') == 'layout3') require(JModuleHelper::getLayoutPath('mod_jomlogin', 'layout3'));
else if ($params->get('jomtemplate') == 'layout4') require(JModuleHelper::getLayoutPath('mod_jomlogin', 'layout4'));
else require(JModuleHelper::getLayoutPath('mod_jomlogin'));

