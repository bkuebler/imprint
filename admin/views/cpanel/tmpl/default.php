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
					<?php
					$link = 'index.php?option=com_imprint&amp;view=imprints';
					echo ImprintHelper::quickIconButton($link, '48px/icon-48-imprints.png', JText::_('COM_IMPRINT_IMPRINTS'));

					$link = 'index.php?option=com_imprint&amp;view=remarks';
					echo ImprintHelper::quickIconButton($link, '48px/icon-48-remarks.png', JText::_('COM_IMPRINT_REMARKS'));

					$link = 'index.php?option=com_imprint&amp;view=about';
					echo ImprintHelper::quickIconButton($link, '48px/icon-48-about.png', JText::_('COM_IMPRINT_ABOUT'));
					?>
					<div style="clear:both">&nbsp;</div>
					<p>&nbsp;</p>
					<div class="alert alert-block alert-info ph-w80">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<?php echo ImprintHelper::getLinks(); ?>
					</div>
				</div>
			</div>
			<div class="imprint-cpanel-right">
				<div class="well">
					<div style="float:right;margin:10px;">
						<?php echo JHTML::_('image', 'team-imprint.png', 'Team Imprint'); ?>
					</div>
					<h3><?php echo JText::_('JVERSION'); ?></h3>
					<p><?php echo ImprintHelper::getVersion();?></p>
					<h3><?php echo JText::_('COM_IMPRINT_COPYRIGHT'); ?></h3>
					<p>&copy; 2011 - <?php echo date("Y"); ?> Imprint Team</p>
					<p><a href="http://joomla-imprint.github.com/imprint/" target="_blank">Homepage</a></p>
					<h3><?php echo JText::_('COM_IMPRINT_LICENCE'); ?></h3>
					<p><a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GPLv2</a></p>
					<div style="border-top:1px solid #c2c2c2"></div>
					<p>&nbsp;</p>
					<div class="btn-group">
						<a class="btn btn-large btn-primary" href="http://joomla-imprint.github.com/imprint/" target="_blank">
							<i class="icon-loop icon-white"></i>&nbsp;&nbsp;
							<?php echo JText::_('COM_IMPRINT_CHECK_FOR_UPDATE'); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" name="option" value="com_imprint" />
		<input type="hidden" name="view" value="cpanel" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>