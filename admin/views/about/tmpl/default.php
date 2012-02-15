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
				<h3><?php echo JText::_('JHELP');?></h3>
				<p>
					<a href="http://sourceforge.net/projects/impressumreload/" target="_blank"><?php echo JText::_('COM_IMPRESSUM').' - '.JText::_('COM_IMPRESSUM_HOME');?></a><br />
				</p>
				
				<h3><?php echo JText::_('COM_IMPRESSUM_ABOUT_HELPFUL_LINKS');?></h3>
				<p>
					<a href="http://www.joomla.org" target="_blank"><?php echo JText::_('COM_IMPRESSUM_ABOUT_JOOMLA_ORG');?></a><br />
					<a href="http:///www.joomlaos.de" target="_blank"><?php echo JText::_('COM_IMPRESSUM_ABOUT_JOOMLAOS_DE');?></a><br />
				</p>
				
				<div style="border-top:1px solid #c2c2c2"></div>
				<h3><?php echo JText::_('COM_IMPRESSUM_ABOUT_MYSQL_AND_PHP_VERSION');?></h3>
				<p>
				<?php echo JText::_('COM_IMPRESSUM_ABOUT_INSTALLED_PHP_VERSION');?>: <?php $PHPVersion = phpversion(); echo $PHPVersion;?><br />
				<?php echo JText::_('COM_IMPRESSUM_ABOUT_INSTALLED_MYSQL_VERSION');?>: <?php printf("%s\n", mysql_get_client_info());?><br />
				</p>
				
				<div style="border-top:1px solid #c2c2c2"></div>
				<h3><?php echo JText::_('COM_IMPRESSUM_ABOUT_IMPRINT_VERSION');?></h3>
				<p>
				<?php echo JText::_('JVERSION');?>: <?php echo ImpressumHelper::version( );?><br />
				</p>
				
			</div>
		</td>

		<td width="45%" valign="top">
			<div style="300px;border:1px solid #ccc;background:#fff;margin:15px;padding:15px">
			<div style="float:right;margin:10px;">
	 				<?php
	 				//TODO: Logo am besten unter /media/com_impressum/assets/images/ speichern, oder? Offizielles Logo?
					echo JHTML::_('image.site', 'recht-48x48.png', '../media/com_impressum/images/', NULL, NULL, 'Impressum Reloaded' )
				?>
			</div>
			<h1><?php echo JText::_('COM_IMPRESSUM').' - '.JText::_('COM_IMPRESSUM_ABOUT_CREDITS');?></h1>
			<p>&copy; 2010 - <?php echo date("Y"); ?> Impressum Reloaded Team. All rights reserved.<br /></p>

			<h2><?php echo JText::_('COM_IMPRESSUM_ABOUT_CODE_CONTRIBUTERS');?>:</h2>
			<p>
				<a href="http://sourceforge.net/projects/impressumreload/" target="_blank">Mathias Gebhardt</a><br />
				<a href="http://sourceforge.net/projects/impressumreload/" target="_blank">Christopher Schmidt</a><br />
			</p>
<!--		No documentation exists at this moment, for the future
			<h3><?php echo JText::_('COM_IMPRESSUM_DOCUMENTAION_CONTRIBUTERS');?>:</h3>
			<p><a href="http://www.gnu.org/licenses/gpl-1.0.html" target="_blank">GPLv2</a></p>
-->

			<h3><?php echo JText::_('COM_IMPRESSUM_ABOUT_TRANSLATION_CONTRIBUTERS');?>:</h3>
			<p>
				English (en-GB) - Impressum Reloaded Translation Team - <a href="http://sourceforge.net/projects/impressumreload/" target="_blank">Christopher Schmidt</a><br />
				German (de-DE) - Impressum Reloaded Translation Team - <a href="http://sourceforge.net/projects/impressumreload/" target="_blank">Christopher Schmidt</a><br />
			</p>
<!--		No derivative work exists at this moment, for the future
			<h3><?php echo JText::_('COM_IMPRESSUM_DERIVATIVE_WORK');?>:</h3>
-->
			</div>
		</td>
	</tr>
</table>
</form>