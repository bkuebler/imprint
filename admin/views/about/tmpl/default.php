<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * 
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


?>
<form action="index.php" method="post" name="adminForm">
	<div id="j-sidebar-container" class="span2"><?php echo JHtmlSidebar::render(); ?></div>
	<div id="j-main-container" class="span10">
		<div class="adminform">
			<div class="imprint-cpanel-left">
				<div id="cpanel">
					<h3><?php echo JText::_('JHELP');?></h3>
					<p>
						<a href="https://github.com/joomla-imprint" target="_blank">
							<?php echo JText::_('COM_IMPRINT') . ' - ' . JText::_('COM_IMPRINT_HOME');?>
						</a>
					</p>				
					<h3><?php echo JText::_('COM_IMPRINT_ABOUT_HELPFUL_LINKS');?></h3>
					<p>
						<a href="http://www.joomla.org" target="_blank">
							<?php echo JText::_('COM_IMPRINT_ABOUT_JOOMLA_ORG');?>
						</a><br />
						<a href="http:///www.joomlaos.de" target="_blank">
							<?php echo JText::_('COM_IMPRINT_ABOUT_JOOMLAOS_DE');?>
						</a><br />
						<a href="http:///www.jgerman.de" target="_blank">
							<?php echo JText::_('COM_IMPRINT_ABOUT_JGERMAN_DE');?>
						</a>
					</p>
					<div style="border-top:1px solid #c2c2c2"></div>
					<h3><?php echo JText::_('COM_IMPRINT_ABOUT_MYSQL_AND_PHP_VERSION');?></h3>
					<p>
						<?php echo JText::_('COM_IMPRINT_ABOUT_INSTALLED_PHP_VERSION') . ':' . phpversion(); ?><br />
						<?php echo JText::_('COM_IMPRINT_ABOUT_INSTALLED_MYSQL_VERSION') . ':' . mysql_get_client_info(); ?>
					</p>				
					<div style="border-top:1px solid #c2c2c2"></div>
					<h3><?php echo JText::_('COM_IMPRINT_ABOUT_IMPRINT_VERSION');?></h3>
					<p>
						<?php echo JText::_('JVERSION') . ':' . ImprintHelper::getVersion(); ?><br />
					</p>
				</div>
			</div>
			<div class="imprint-cpanel-right">
				<div class="well">
					<div style="float:right;margin:10px;">
	 					<?php echo JHTML::_('image', '../media/com_imprint/images/recht-48x48.png', 'Team Imprint') ?>
					</div>
					<h1><?php echo JText::_('COM_IMPRINT') . ' - ' . JText::_('COM_IMPRINT_ABOUT_CREDITS'); ?></h1>
					<p>&copy; 2011 - <?php echo date("Y"); ?> Imprint Team. All rights reserved.</p>
					<p><?php echo JText::_('COM_IMPRINT_LICENSE'); ?>: <a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GPLv2</a></p>
					<h2><?php echo JText::_('COM_IMPRINT_ABOUT_CODE_CONTRIBUTERS'); ?>:</h2>
					<p>
						<a href="https://github.com/mgebhardt" target="_blank">Mathias Gebhardt</a><br />
						<a href="https://github.com/joomla-imprint" target="_blank">Christopher Schmidt</a><br />
						<a href="https://github.com/bkuebler" target="_blank">Benjamin K&uuml;bler</a>
					</p>
					<h3><?php echo JText::_('COM_IMPRINT_DOCUMENTAION_CONTRIBUTERS');?>:</h3>
					<p>
						<a href="http://joomla-imprint.github.com/imprint" target="_blank">Homepage</a>
					</p>
					<h3><?php echo JText::_('COM_IMPRINT_ABOUT_TRANSLATION_CONTRIBUTERS');?>:</h3>
					<p>
						English (en-GB) - Imprint Translation Team - <a href="https://github.com/joomla-imprint" target="_blank">Christopher Schmidt</a><br />
						German (de-DE) - Imprint Translation Team - <a href="https://github.com/joomla-imprint" target="_blank">Christopher Schmidt</a><br />
						French (fr-FR) - Imprint Translation Team - <a href="https://github.com/joomla-imprint" target="_blank">Christopher Schmidt</a>
					</p>
					<h3><?php echo JText::_('COM_IMPRINT_DERIVATIVE_WORK');?>:</h3>
					<p>
						Impressum Reloaded (C) 2009 - 2011 <a href="http://www.medienmodernisierer.de" target="_blank">Guido Kamniarz</a>, \
						<?php echo JText::_('COM_IMPRINT_LICENSE'); ?>: <a href="http://www.gnu.org/licenses/gpl-1.0.html" target="_blank">GPL</a><br />
						Impressum (C) 2007 - 2009 <a href="http://www.gcsoft.de" target="_blank">Gerhard Clausen</a>, \
						<?php echo JText::_('COM_IMPRINT_LICENSE');?>: <a href="http://www.gnu.org/licenses/gpl-1.0.html" target="_blank">GPL</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</form>