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
<div id="JomLoginhorz">
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

<?php echo $params->get('pretext');?>

<?php echo $iebrowser;?>


<table class="JomLoginTable">
<tr>
    <?php if(JPluginHelper::isEnabled('system', 'remember') && $params->get('rememberme') == 1) : ?>
	<td><div class="JomLoginBullet1"><span></span></div></td>
	<td align="right"><label class="JomLoginSm" for="modlgn_remember"><?php echo JText::_('REMEMBERME') ?></label>&nbsp;</td>
	<td><input id="modlgn_remember" type="checkbox" name="remember" class="JomLoginRem" value="yes" alt="Remember Me" /></td>
	<?php endif;?>
	<td colspan="2"><input id="jommodlgn_username" type="text" name="username" class="JomLoginUsername" alt="username" size="15" value="<?php echo JText::_('Username') ?>" onclick="login.username.value='';" />&nbsp;</td>
	<td colspan="2"><input id="jommodlgn_passwd" type="password" name="passwd" class="JomLoginPassword" alt="password" size="15" value="<?php echo JText::_('Password') ?>" onclick="login.passwd.value='';" />&nbsp;</td>
	<?php if($params->get('butsignin') == 1) : ?>
	<td><input type="submit" name="Submit" class="JomLoginButton" value="<?php echo JText::_('BUTTON_LOGIN') ?>" />&nbsp;</td>
	<?php endif;?>
	<?php if($params->get('butcreate') == 1) : ?>
    <td><?php
        $usersConfig = &JComponentHelper::getParams( 'com_users' );
        if ($usersConfig->get('allowUserRegistration')):?>
        	<input type="button" name="JomLoginRegister" onclick="window.location='<?php echo JRoute::_( 'index.php?option=com_user&view=register' );?>'" class="JomLoginButton" id="JomLoginRegister" value="<?php echo JText::_('REGISTER');?>" />
        <?php endif; ?>
    </td>
    <?php endif;?>
</tr>
<tr>
	<?php if(JPluginHelper::isEnabled('system', 'remember') && $params->get('rememberme') == 1) : ?>
	<td colspan="3"></td>
	<?php endif;?>
	<?php if($params->get('fusername') == 1) : ?>
    <td><div class="JomLoginBullet"><span></span></div></td>
    <td><a class="JomLoginSm" href="<?php echo JRoute::_( 'index.php?option=com_user&view=remind' );?>"><?php echo JText::_('FORGOT_YOUR_USERNAME'); ?></a></td>
    <?php else: ?>
    <td colspan="2"></td>
	<?php endif;?>
    <?php if($params->get('fpassword') == 1) : ?>
    <td><div class="JomLoginBullet"><span></span></div></td>
    <td><a class="JomLoginSm" href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset' );?>"><?php echo JText::_('FORGOT_YOUR_PASSWORD'); ?></a></td>
    <?php else: ?>
    <td colspan="2"></td>
	<?php endif;?>
    <?php if($params->get('butsignin') == 1) : ?>
    <td></td>
    <?php endif;?>
    <?php if($params->get('butcreate') == 1) : ?>
    <td></td>
    <?php endif;?>
</tr>
</table>
</div>

<div id="JomLogin-PreText"><?php echo $params->get('pretext');?></div>

<div id="JomLogin-Vertical">
<ul class="JomLogin-Vertical-List">
<?php if($params->get('butsignin') == 1) : ?>
<?php endif;?>
<li>
<input tabindex="1" id="modlgn_username2" type="text" name="username" class="JomLoginUsername" alt="username" size="15" value="<?php echo JText::_('Username') ?>" onclick="login.username.value='';" />
<a class="JomLoginSm" href="<?php echo JRoute::_( 'index.php?option=com_user&view=remind' );?>"><?php echo JText::_('FORGOT_YOUR_USERNAME'); ?></a>
</li>
<li>
<input tabindex="2" id="modlgn_passwd2" type="password" name="passwd" class="JomLoginPassword" alt="password" size="15" value="<?php echo JText::_('Password') ?>" onclick="login.passwd.value='';" />
<?php if($params->get('fpassword') == 1) : ?>
<a class="JomLoginSm" href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset' );?>"><?php echo JText::_('FORGOT_YOUR_PASSWORD'); ?></a>
<?php endif;?>
</li>

<?php if($params->get('butsignin') == 1) : ?>
<li>
<button class="yt-uix-button" name="Submit" onclick="this.form.submit();" type="button">
<span class="JomLogin-Button-Content"><?php echo JText::_('BUTTON_LOGIN');?></span>
</button>
<?php if(JPluginHelper::isEnabled('system', 'remember') && $params->get('rememberme') == 1) : ?>
<div class="JomLogin-RememberMe">
<p class="JomLog-Check">
<input class="JomLogin-Remember" id="jomlgn_remember" type="checkbox" name="remember" value="yes" alt="Remember Me" />
</p>
<p class="JomLog-Label">
<label class="Rememberme-Text" for="jomlgn_remember"><span class="JomLogin-SpanText"><?php echo JText::_('REMEMBERME');?></span></label>
</p>
</div>
<?php endif;?>
</li>
<?php endif;?>

<?php
$usersConfig = &JComponentHelper::getParams( 'com_users' );
if ($usersConfig->get('allowUserRegistration') && $params->get('butcreate') == 1):?>
<li><button class="yt-uix-button" name="JomLoginRegister" onclick="window.location='<?php echo JRoute::_( 'index.php?option=com_user&view=register' );?>'" type="button">
<span class="JomLogin-Button-Content"><?php echo JText::_('REGISTER');?></span>
</button>

</li>
<?php endif;?>
</ul>
</div>


<div id="JomLogin-PreText"><?php echo $params->get('posttext');?></div>



<div id="page" class="">
  <div id="masthead-container">
	<div id="masthead" class="">

	<a title="YouTube home" onmousedown="yt.analytics.urchinTracker('/Events/Header_4/YouTubeLogo');" href="/">
			<img alt="YouTube home" src="http://s.ytimg.com/yt/img/pixel-vfl73.gif" class="master-sprite" id="logo1">
		</a>


		<div id="masthead-JomLogin">

			<input id="masthead-JomLogin-term" class="JomLogin-term JomLogin-Username" tabindex="1" type="text" name="username"  alt="username" size="15" value="<?php echo JText::_('Username') ?>" onclick="login.username.value='';" />
			<input id="modlgn_passwd" class="JomLogin-term JomLogin-Password" tabindex="2" type="password" name="passwd" alt="password" size="15" value="<?php echo JText::_('Password') ?>" onclick="login.passwd.value='';" />
			<button class="JomLogin-uix-button" name="Submit" onclick="this.form.submit();" type="button" tabindex="3">
				<span class="JomLogin-uix-button-content"><?php echo JText::_('BUTTON_LOGIN');?></span>
			</button>

<?php
$usersConfig = &JComponentHelper::getParams( 'com_users' );
if ($usersConfig->get('allowUserRegistration') && $params->get('butcreate') == 1):?>
<button class="JomLogin-uix-button" name="JomLoginRegister" onclick="window.location='<?php echo JRoute::_( 'index.php?option=com_user&view=register' );?>'" type="button">
<span class="JomLogin-uix-button-content"><?php echo JText::_('REGISTER');?></span>
</button>

<?php endif;?>

		</div>
	</div>
  </div>
</div>



<input type="hidden" name="option" value="com_user" />
<input type="hidden" name="task" value="login" />
<input type="hidden" name="return" value="<?php echo $return; ?>" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
<?php endif; ?>

