<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Impressum
 * @copyright	(C) 2011 Impressum Reloaded Team
 * @license		GNU/GPL, see LICENSE.txt
 * Impressum is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.

 * Impressum is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Impressum; if not, write to the Free Software
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
			$link = 'index.php?option=com_impressum';
			echo ImpressumHelper::quickIconButton( $link, '48px/icon-48-cpanel.png', JText::_( 'COM_IMPRESSUM_CPANEL' ) );
		
			$link = 'index.php?option=com_impressum&amp;view=edit_imprints';
			echo ImpressumHelper::quickIconButton( $link, '48px/icon-48-edit_imprints.png', JText::_( 'COM_IMPRESSUM_EDIT_IMPRINTS' ) );
		
			$link = 'index.php?option=com_impressum&amp;view=about';
			echo ImpressumHelper::quickIconButton( $link, '48px/icon-48-about.png', JText::_( 'COM_IMPRESSUM_ABOUT' ) );
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
				//TODO: Logo am besten unter /media/com_impressum/assets/images/ speichern, oder? Offizielles Logo?
					echo JHTML::_('image.site', 'recht-48x48.png', '../media/com_impressum/images/', NULL, NULL, 'Impressum Reloaded' )
				?>
			</div>

			<h3><?php echo JText::_('JVERSION');?></h3>
			<p><?php echo ImpressumHelper::version( );?></p>

			<h3><?php echo JText::_('COM_IMPRESSUM_COPYRIGHT');?></h3>
			<p>&copy; 2011 - <?php echo date("Y"); ?> Impressum Reloaded Team. All rights reserved.<br />
			<br />
			<a href="http://sourceforge.net/projects/impressumreload/" target="_blank"><?php echo JText::_('COM_IMPRESSUM_HOME');?></a></p>

			<h3><?php echo JText::_('COM_IMPRESSUM_LICENSE');?></h3>
			<p><a href="http://www.gnu.org/licenses/gpl-1.0.html" target="_blank">GPL</a></p>

			</div>
		</td>
	</tr>
</table>
</form>