<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Impressum Reloaded Team
 * @license		GNU/GPL, see LICENSE.txt
 * Imprint is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.

 * Imprint is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Imprint; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
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
//TODO: realy nessessary? Do you need a link to current page?
// 			$link = 'index.php?option=com_imprint';
// 			echo ImprintHelper::quickIconButton( $link, '48px/icon-48-cpanel.png', JText::_( 'COM_IMPRINT_CPANEL' ) );
		
			$link = 'index.php?option=com_imprint&amp;view=imprints';
			echo ImprintHelper::quickIconButton( $link, '48px/icon-48-imprints.png', JText::_( 'COM_IMPRINT_IMPRINTS' ) );
			
			$link = 'index.php?option=com_imprint&amp;view=remarks';
			echo ImprintHelper::quickIconButton( $link, '48px/icon-48-remarks.png', JText::_( 'COM_IMPRINT_REMARKS' ) );
		
			$link = 'index.php?option=com_imprint&amp;view=about';
			echo ImprintHelper::quickIconButton( $link, '48px/icon-48-about.png', JText::_( 'COM_IMPRINT_ABOUT' ) );
			?>
<!--
We can include ads if we want

				<div style="clear:both">&nbsp;</div>
				<p>&nbsp;</p>
				<div style="text-align:center;padding:0;margin:0;border:0">
					<iframe style="padding:0;margin:0;border:0" src="http://www.joomla-gaestebuch.de/adv/jguestbook" noresize="noresize" frameborder="0" border="0" cellspacing="0" scrolling="no" width="500" marginwidth="0" marginheight="0" height="125">
					<a href="http://www.joomla-gaestebuch.de/adv/jguestbook" target="_blank">Joomla Guestbook</a>
					</iframe>
				</div>
-->			</div>
		</td>

		<td width="45%" valign="top">
			<div style="300px;border:1px solid #ccc;background:#fff;margin:15px;padding:15px">
			<div style="float:right;margin:10px;">
				<?php
				//TODO: Logo am besten unter /media/com_imprint/assets/images/ speichern, oder? Offizielles Logo? - Ja
					echo JHTML::_('image.site', 'recht-48x48.png', '../media/com_imprint/images/', NULL, NULL, 'Imprint Reloaded' )
				?>
			</div>

			<h3><?php echo JText::_('JVERSION');?></h3>
			<p><?php echo ImprintHelper::getVersion();?></p>

			<h3><?php echo JText::_('COM_IMPRINT_COPYRIGHT');?></h3>
			<p>&copy; 2011 - <?php echo date("Y"); ?> Imprint Reloaded Team. All rights reserved.<br />
			<br />
			<a href="http://sourceforge.net/projects/imprintreload/" target="_blank"><?php echo JText::_('COM_IMPRINT_HOME');?></a></p>

			<h3><?php echo JText::_('COM_IMPRINT_LICENSE');?></h3>
			<p><a href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GPLv2</a></p>

			</div>
		</td>
	</tr>
</table>
</form>