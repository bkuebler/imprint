<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Impressum
 * @copyright	(C) 2011 Mathias Gebhardt
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

?>

<table width="100%" border="0">
	<tr>
<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
			<img src="<?php echo JURI::root(); ?>media/com_impressum/images/technik.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRESSUM_TECHNIK' ); ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td align="left">
<?php if ($this->impressum->technikperson)
{
	echo JText::_( 'COM_IMPRESSUM_TECHNIKPERSON' ) . ': ' . $this->impressum->technikperson;
	if ($this->impressum->technikemail)
		echo " (".JHTML::_('email.cloak', $this->impressum->technikemail).")" . '<br />';
}
if ($this->impressum->technikwebsite)
	echo JText::_( 'COM_IMPRESSUM_TECHNIKWEBSITE' ) . ' <a href="http://' . $this->impressum->technikwebsite . '" target="blank">' . $this->impressum->technikwebsite . '</a>';
?>
		</td>
	</tr>
</table>
<br />