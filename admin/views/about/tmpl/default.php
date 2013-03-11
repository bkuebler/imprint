<?php
/**
 * @version		3.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2013 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// load tooltip behavior
JHtml::_('behavior.tooltip');
?>
<form action="index.php" method="post" name="adminForm">
<table class="adminform">
	<tr>
		<td width="55%" valign="top">
			<div id="cpanel">
				<h3><?php echo JText::_('JHELP');?></h3>
				<p>
					<a href="https://github.com/joomla-imprint" target="_blank"><?php echo JText::_('COM_IMPRINT').' - '.JText::_('COM_IMPRINT_HOME');?></a><br />
				</p>
				
				<h3><?php echo JText::_('COM_IMPRINT_ABOUT_HELPFUL_LINKS');?></h3>
				<p>
					<a href="http://www.joomla.org" target="_blank"><?php echo JText::_('COM_IMPRINT_ABOUT_JOOMLA_ORG');?></a><br />
					<a href="http:///www.joomlaos.de" target="_blank"><?php echo JText::_('COM_IMPRINT_ABOUT_JOOMLAOS_DE');?></a><br />
					<a href="http:///www.jgerman.de" target="_blank"><?php echo JText::_('COM_IMPRINT_ABOUT_JGERMAN_DE');?></a>
				</p>
				
				<div style="border-top:1px solid #c2c2c2"></div>
				<h3><?php echo JText::_('COM_IMPRINT_ABOUT_MYSQL_AND_PHP_VERSION');?></h3>
				<p>
					<?php echo JText::_('COM_IMPRINT_ABOUT_INSTALLED_PHP_VERSION');?>: <?php $PHPVersion = phpversion(); echo $PHPVersion;?><br />
					<?php echo JText::_('COM_IMPRINT_ABOUT_INSTALLED_MYSQL_VERSION');?>: <?php printf("%s\n", mysql_get_client_info());?>
				</p>
				
				<div style="border-top:1px solid #c2c2c2"></div>
				<h3><?php echo JText::_('COM_IMPRINT_ABOUT_IMPRINT_VERSION');?></h3>
				<p>
					<?php echo JText::_('JVERSION');?>: <?php echo ImprintHelper::getVersion( );?><br />
				</p>
				
			</div>
		</td>

		<td width="45%" valign="top">
			<div style="300px;border:1px solid #ccc;background:#fff;margin:15px;padding:15px">
			<div style="float:right;margin:10px;">
	 				<?php
					echo JHTML::_('image.site', 'recht-48x48.png', '../media/com_imprint/images/', NULL, NULL, 'Imprint' )
				?>
			</div>
			<h1><?php echo JText::_('COM_IMPRINT').' - '.JText::_('COM_IMPRINT_ABOUT_CREDITS');?></h1>
			<p>&copy; 2011 - <?php echo date("Y"); ?> Imprint Team. All rights reserved.<br /></p>
			<p><?php echo JHTML::_('email.cloak', "dev-team-imprint@joomla.bksus.de"); ?></p>
			<p><?php echo JText::_('COM_IMPRINT_LICENSE');?>: <a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GPLv2</a></p>

			<h2><?php echo JText::_('COM_IMPRINT_ABOUT_CODE_CONTRIBUTERS');?>:</h2>
			<p>
				<a href="https://github.com/mgebhardt" target="_blank">Mathias Gebhardt</a><br />
				<a href="https://github.com/joomla-imprint" target="_blank">Christopher Schmidt</a><br />
				<a href="https://github.com/bkuebler" target="_blank">Benjamin Kübler</a>
			</p>
<!--		No documentation exists at this moment, for the future
			<h3><?php echo JText::_('COM_IMPRINT_DOCUMENTAION_CONTRIBUTERS');?>:</h3>
			<p><a href="http://www.gnu.org/licenses/gpl-1.0.html" target="_blank">GPLv2</a></p>
-->

			<h3><?php echo JText::_('COM_IMPRINT_ABOUT_TRANSLATION_CONTRIBUTERS');?>:</h3>
			<p>
				English (en-GB) - Imprint Translation Team - <a href="https://github.com/joomla-imprint" target="_blank">Christopher Schmidt</a><br />
				German (de-DE) - Imprint Translation Team - <a href="https://github.com/joomla-imprint" target="_blank">Christopher Schmidt</a><br />
				French (fr-FR) - Imprint Translation Team - <a href="https://github.com/joomla-imprint" target="_blank">Christopher Schmidt</a>
			</p>

			<h3><?php echo JText::_('COM_IMPRINT_DERIVATIVE_WORK');?>:</h3>
			<p>
				Impressum Reloaded (C) 2009 - 2011 <a href="http://www.medienmodernisierer.de" target="_blank">Guido Kamniarz</a>, <?php echo JText::_('COM_IMPRINT_LICENSE');?>: <a href="http://www.gnu.org/licenses/gpl-1.0.html" target="_blank">GPL</a><br />
				Impressum (C) 2007 - 2009 <a href="http://www.gcsoft.de" target="_blank">Gerhard Clausen</a>, <?php echo JText::_('COM_IMPRINT_LICENSE');?>: <a href="http://www.gnu.org/licenses/gpl-1.0.html" target="_blank">GPL</a>
			</p>
			</div>
		</td>
	</tr>
</table>
</form>