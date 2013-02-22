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
			<?php		
			$link = 'index.php?option=com_imprint&amp;view=imprints';
			echo ImprintHelper::quickIconButton( $link, '48px/icon-48-imprints.png', JText::_( 'COM_IMPRINT_IMPRINTS' ) );
			
			$link = 'index.php?option=com_imprint&amp;task=imprint.edit&amp;id=' . $this->defaultImprintID;
			echo ImprintHelper::quickIconButton( $link, '48px/icon-48-imprint.png', JText::_( 'COM_IMPRINT_EDIT_DEFAULT_IMPRINT' ) );
			
			$link = 'index.php?option=com_imprint&amp;view=remarks';
			echo ImprintHelper::quickIconButton( $link, '48px/icon-48-remarks.png', JText::_( 'COM_IMPRINT_REMARKS' ) );
				
			$link = 'index.php?option=com_imprint&amp;view=about';
			echo ImprintHelper::quickIconButton( $link, '48px/icon-48-about.png', JText::_( 'COM_IMPRINT_ABOUT' ) );
			?>
			</div>
		</td>

		<td width="45%" valign="top">
			<div style="300px;border:1px solid #ccc;background:#fff;margin:15px;padding:15px">
			<div style="float:right;margin:10px;">
				<?php
					echo JHTML::_('image.site', 'recht-48x48.png', '../media/com_imprint/images/', NULL, NULL, 'Imprint' )
				?>
			</div>
			
			<?php echo JText::_('COM_IMPRINT_WE_NEED_HELP'); ?>
			
			<h3><?php echo JText::_('JVERSION');?></h3>
			<p><?php echo ImprintHelper::getVersion();?></p>

			<h3><?php echo JText::_('COM_IMPRINT_COPYRIGHT');?></h3>
			<p>&copy; 2011 - <?php echo date("Y"); ?> Imprint Team. All rights reserved.<br />
			<br />
			<a href="https://github.com/joomla-imprint" target="_blank"><?php echo JText::_('COM_IMPRINT_HOME');?></a></p>

			<h3><?php echo JText::_('COM_IMPRINT_LICENSE');?></h3>
			<p><a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GPLv2</a></p>

			</div>
		</td>
	</tr>
</table>
</form>