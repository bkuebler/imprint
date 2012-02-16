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
			<img src="<?php echo JURI::root(); ?>/media/com_imprint/images/bank.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRINT_BANK' ); ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td align="left" >
<?php if ($this->imprint->bankinhaber)
	echo JText::_( 'COM_IMPRINT_INHABER' ) .': '.$this->imprint->bankinhaber.'<br />';
if ($this->imprint->kontonr)
	echo JText::_( 'COM_IMPRINT_KONTONUMMER' ) .': '.$this->imprint->kontonr.'<br />';
if ($this->imprint->blz)
	echo JText::_( 'COM_IMPRINT_BLZ' ) .': '.$this->imprint->blz.'<br />';
if ($this->imprint->bankname)
	echo JText::_( 'COM_IMPRINT_BANKNAME' ) .': '.$this->imprint->bankname.'<br />';
if ($this->imprint->iban)
	echo JText::_( 'COM_IMPRINT_IBAN' ) .': '.$this->imprint->iban.'<br />';
if ($this->imprint->swift)
	echo JText::_( 'COM_IMPRINT_SWIFT' ).': '.$this->imprint->swift;
?>
		</td>
<?php if ($this->imprint->params->get('show_bank2')=="1"):
	if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td align="left" valign="top">
	<?php if ($this->imprint->bankinhaber2)
		echo JText::_( 'COM_IMPRINT_INHABER' ) .': '.$this->imprint->bankinhaber2.'<br />';
	if ($this->imprint->kontonr2)
		echo JText::_( 'COM_IMPRINT_KONTONUMMER' ) .': '.$this->imprint->kontonr2.'<br />';
	if ($this->imprint->blz2)
		echo JText::_( 'COM_IMPRINT_BLZ' ) .': '.$this->imprint->blz2.'<br />';
	if ($this->imprint->bankname2)
		echo JText::_( 'COM_IMPRINT_BANKNAME' ) .': '.$this->imprint->bankname2.'<br />';
	if ($this->imprint->iban2)
		echo JText::_( 'COM_IMPRINT_IBAN' ) .': '.$this->imprint->iban2.'<br />';
	if ($this->imprint->swift2)
		echo JText::_( 'COM_IMPRINT_SWIFT' ).': '.$this->imprint->swift2;
	?>
		</td>
<?php endif; ?>
	</tr>
<?php if ($this->imprint->params->get('show_bank3')=="1"): ?>
	<tr>
		<td colspan="2">
			&nbsp;
		</td>
	</tr>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td align="left">
	<?php if ($this->imprint->bankinhaber3)
		echo JText::_( 'COM_IMPRINT_INHABER' ) .': '.$this->imprint->bankinhaber3.'<br />';
	if ($this->imprint->kontonr3)
		echo JText::_( 'COM_IMPRINT_KONTONUMMER' ) .': '.$this->imprint->kontonr3.'<br />';
	if ($this->imprint->blz3)
		echo JText::_( 'COM_IMPRINT_BLZ' ) .': '.$this->imprint->blz3.'<br />';
	if ($this->imprint->bankname3)
		echo JText::_( 'COM_IMPRINT_BANKNAME' ) .': '.$this->imprint->bankname3.'<br />';
	if ($this->imprint->iban3)
		echo JText::_( 'COM_IMPRINT_IBAN' ) .': '.$this->imprint->iban3.'<br />';
	if ($this->imprint->swift3)
		echo JText::_( 'COM_IMPRINT_SWIFT' ).': '.$this->imprint->swift3;
	?>
		</td>
	<?php if ($this->imprint->params->get('show_bank4')=="1"):
		if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
		<?php endif; ?>
		<td align="left" valign="top">
		<?php if ($this->imprint->bankinhaber4)
			echo JText::_( 'COM_IMPRINT_INHABER' ) .': '.$this->imprint->bankinhaber4.'<br />';
		if ($this->imprint->kontonr4)
			echo JText::_( 'COM_IMPRINT_KONTONUMMER' ) .': '.$this->imprint->kontonr4.'<br />';
		if ($this->imprint->blz4)
			echo JText::_( 'BLZ' ) .': '.$this->imprint->blz4.'<br />';
		if ($this->imprint->bankname4)
			echo JText::_( 'COM_IMPRINT_BANKNAME' ) .': '.$this->imprint->bankname4.'<br />';
		if ($this->imprint->iban4)
			echo JText::_( 'COM_IMPRINT_IBAN' ) .': '.$this->imprint->iban4.'<br />';
		if ($this->imprint->swift4)
			echo JText::_( 'COM_IMPRINT_SWIFT' ).': '.$this->imprint->swift4;
		?>
		</td>
	<?php endif; ?>
	</tr>
<?php endif; ?>
</table>
<br />
