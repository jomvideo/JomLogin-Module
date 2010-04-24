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
?>
<div id="JomLoginhorz" class="">
<?php if($type == 'logout'):?>
<form action="index.php" method="post" name="login" id="form-login">

<div class="JomLoginPreText">
<?php if ($params->get('greeting')):?>
</div>

<div class="JomLogoutCont">
    <?php if ($params->get('name')): {
    		echo JText::sprintf( 'HINAME', '<strong>'.$user->get('name').'</strong>' );
    	} else : {
    		echo JText::sprintf( 'HINAME', '<strong>'.$user->get('username').'</strong>' );
    	} endif; ?>
    <?php endif; ?>
    <span class="JomLoginDivider"></span>
    <input type="submit" name="Submit" class="JomLogoutButton" value="<?php echo JText::_( 'BUTTON_LOGOUT'); ?>" />
</div>

<input type="hidden" name="option" value="com_user" />
<input type="hidden" name="task" value="logout" />
<input type="hidden" name="return" value="<?php echo $return; ?>" />
</form>

<?php else: ?>

    <?php
    if(JPluginHelper::isEnabled('authentication', 'openid')) :
    		$lang->load( 'plg_authentication_openid', JPATH_ADMINISTRATOR );
    		$langScript = 	'var JLanguage = {};'.
    						' JLanguage.WHAT_IS_OPENID = \''.JText::_( 'WHAT_IS_OPENID' ).'\';'.
    						' JLanguage.LOGIN_WITH_OPENID = \''.JText::_( 'LOGIN_WITH_OPENID' ).'\';'.
    						' JLanguage.NORMAL_LOGIN = \''.JText::_( 'NORMAL_LOGIN' ).'\';'.
    						' var modlogin = 1;';
    		$doc = &JFactory::getDocument();
    		$doc->addScriptDeclaration( $langScript );
    		JHTML::_('script', 'openid.js');
    endif;
    ?>

<form action="<?php echo JRoute::_( 'index.php', true, $params->get('usesecure')); ?>" method="post" name="login" id="form-login" >

<?php echo $iebrowser;?>

<div id="masthead" class="">
<div id="masthead-JomLogin">
<table id="JomLoginTable">
<tr>
<?php if(JPluginHelper::isEnabled('system', 'remember') && $params->get('rememberme') == 1) : ?>
<td>
<label class="JomLoginSm" for="modlgn_remember"><?php echo JText::_('REMEMBERME') ?></label>
</td>
<td>
<input id="modlgn_remember" type="checkbox" name="remember" class="JomLoginRem" value="yes" alt="Remember Me" />
</td>
<?php endif;?>
<td>


<input id="modlgn_username" type="text" name="username"  alt="username" size="15" class="default-value JomLogin-term JomLogin-Username" tabindex="1" value="Username" onfocus="remName(this, 'Name');" onblur="chkName(this, 'Name');" value="Name"/>&nbsp;</td>
<td>
<input id="modlgn_passwd" type="password" name="passwd" alt="password" size="15" class="default-value JomLogin-term JomLogin-Password" tabindex="2" value="Password" />&nbsp;</td>
<td>
<?php if($params->get('butsignin') == 1) : ?>
<button class="JomLogin-uix-button" name="Submit" onclick="this.form.submit();" type="button" tabindex="3">
<span class="JomLogin-uix-button-content"><?php echo JText::_('BUTTON_LOGIN');?></span>
</button>
<?php endif;?>
<?php
$usersConfig = &JComponentHelper::getParams( 'com_users' );
if ($usersConfig->get('allowUserRegistration') && $params->get('butcreate') == 1):?>
<button class="JomLogin-uix-button" name="JomLoginRegister" onclick="window.location='<?php echo JRoute::_( 'index.php?option=com_user&view=register' );?>'" type="button">
<span class="JomLogin-uix-button-content"><?php echo JText::_('REGISTER');?></span>
</button>
<?php endif;?>
</td>
</tr>
<tr>
<?php if(JPluginHelper::isEnabled('system', 'remember') && $params->get('rememberme') == 1) : ?>
<td colspan="2"></td>
<?php endif;?>
<td>
<?php if($params->get('fusername') == 1) : ?>
<a class="JomLoginSm" href="<?php echo JRoute::_( 'index.php?option=com_user&view=remind' );?>"><?php echo JText::_('FORGOT_YOUR_USERNAME'); ?></a>
<?php endif;?>
</td>
<td>
<?php if($params->get('fpassword') == 1) : ?>
<a class="JomLoginSm" href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset' );?>"><?php echo JText::_('FORGOT_YOUR_PASSWORD'); ?></a>
<?php endif;?>
</td>
<td></td>
</tr>
</table>

</div>
</div>

<input type="hidden" name="option" value="com_user" />
<input type="hidden" name="task" value="login" />
<input type="hidden" name="return" value="<?php echo $return; ?>" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
<?php endif; ?>
</div>