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

?>

<table width="100%" border="0">
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
			<img src="<?php echo JURI::root(); ?>media/com_imprint/images/info.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRINT_INFORMATIONEN' ); ?></strong>
		</td>
	</tr>
<?php if ($this->imprint->params->get('show_agb')=="1"): ?>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td valign="top" align="left">
			<a href="http://<?php echo $this->imprint->agburl ?>"><?php echo JText::_( 'COM_IMPRINT_AGB' ); ?></a>
		</td>
	</tr>
<?php endif; ?>
<?php if ($this->imprint->params->get('show_nutzungsbedingungen')=="1"): ?>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td valign="top" align="left">
			<a href="index.php?option=com_imprint<?php echo $this->id == 0 ? '' : ('&amp;id=' . $this->id); ?>&amp;view=nutzungsbedingungen"><?php echo JText::_( 'COM_IMPRINT_NUTZUNGSBEDINGUNGEN' ); ?></a>
		</td>
	</tr>
<?php endif; ?>
<?php if ($this->imprint->params->get('show_verhaltensregeln')=="1"): ?>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td valign="top" align="left">
			<a href="index.php?option=com_imprint<?php echo $this->id == 0 ? '' : ('&amp;id=' . $this->id); ?>&amp;view=verhaltensregeln"><?php echo JText::_( 'COM_IMPRINT_VERHALTENSREGELN' ); ?></a>
		</td>
	</tr>
<?php endif; ?>
<?php if ($this->imprint->params->get('show_datenschutz')=="1"): ?>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td valign="top" align="left">
	<?php if (($this->imprint->params->get('show_googleanalytics')=="1") AND ($this->imprint->params->get('show_facebookplugins')=="1")): ?>
			<a href="index.php?option=com_imprint<?php echo $this->id == 0 ? '' : ('&amp;id=' . $this->id); ?>&amp;view=datenschutzanalyticsfacebook"><?php echo JText::_( 'COM_IMPRINT_DATENSCHUTZ' ); ?></a>
	<?php elseif (($this->imprint->params->get('show_googleanalytics')=="1") AND ($this->imprint->params->get('show_facebookplugins')=="0")): ?>
			<a href="index.php?option=com_imprint<?php echo $this->id == 0 ? '' : ('&amp;id=' . $this->id); ?>&amp;view=datenschutzanalytics"><?php echo JText::_( 'COM_IMPRINT_DATENSCHUTZ' ); ?></a>
	<?php elseif (($this->imprint->params->get('show_googleanalytics')=="0") AND ($this->imprint->params->get('show_facebookplugins')=="1")): ?>
			<a href="index.php?option=com_imprint<?php echo $this->id == 0 ? '' : ('&amp;id=' . $this->id); ?>&amp;view=datenschutzfacebook"><?php echo JText::_( 'COM_IMPRINT_DATENSCHUTZ' ); ?></a>
	<?php else: ?>
			<a href="index.php?option=com_imprint<?php echo $this->id == 0 ? '' : ('&amp;id=' . $this->id); ?>&amp;view=datenschutz"><?php echo JText::_( 'COM_IMPRINT_DATENSCHUTZ' ); ?></a>
	<?php endif; ?>
		</td>
	</tr>
<?php endif; ?>
<?php if ($this->imprint->params->get('show_widerrufsrecht')=="1"): ?>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td valign="top" align="left">
			<a href="index.php?option=com_imprint<?php echo $this->id == 0 ? '' : ('&amp;id=' . $this->id); ?>&amp;view=widerrufsrecht"><?php echo JText::_( 'COM_IMPRINT_WIDERRUFSRECHT' ); ?></a>
		</td>
	</tr>
<?php endif; ?>
<?php if ($this->imprint->params->get('show_disclaimer')=="1"): ?>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td valign="top" align="left">
			<a href="index.php?option=com_imprint<?php echo $this->id == 0 ? '' : ('&amp;id=' . $this->id); ?>&amp;view=disclaimer"><?php echo JText::_( 'COM_IMPRINT_DISCLAIMER' ); ?></a>
		</td>
	</tr>
<?php endif; ?>
</table>
