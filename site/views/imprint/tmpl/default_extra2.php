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
			<img src="<?php echo JURI::root(); ?>/media/com_imprint/images/technik.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo $this->imprint->extra2titel ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td align="left">
			<?php echo $this->imprint->extra2person;
			if ($this->imprint->extra2email)
				echo " (".JHTML::_('email.cloak', $this->imprint->extra2email).")<br />";
			if ($this->imprint->extra2website)
				echo JText::_( 'COM_IMPRINT_EXTRAWEBSITE' ) . ' <a href="http://' . $this->imprint->extra2website . '" target="blank">' . $this->imprint->extra2website . '</a>';
			?>
		</td>
	</tr>
</table>
<br />