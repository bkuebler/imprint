<?php
/**
 * @version		3.0 $Id$
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
			<img src="<?php echo JURI::root(); ?>/media/com_impressum/images/bank.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRESSUM_BANK' ); ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td align="left" >
<?php if ($this->impressum->bankinhaber)
	echo JText::_( 'COM_IMPRESSUM_INHABER' ) .': '.$this->impressum->bankinhaber.'<br />';
if ($this->impressum->kontonr)
	echo JText::_( 'COM_IMPRESSUM_KONTONUMMER' ) .': '.$this->impressum->kontonr.'<br />';
if ($this->impressum->blz)
	echo JText::_( 'COM_IMPRESSUM_BLZ' ) .': '.$this->impressum->blz.'<br />';
if ($this->impressum->bankname)
	echo JText::_( 'COM_IMPRESSUM_BANKNAME' ) .': '.$this->impressum->bankname.'<br />';
if ($this->impressum->iban)
	echo JText::_( 'COM_IMPRESSUM_IBAN' ) .': '.$this->impressum->iban.'<br />';
if ($this->impressum->swift)
	echo JText::_( 'COM_IMPRESSUM_SWIFT' ).': '.$this->impressum->swift;
?>
		</td>
<?php if ($this->impressum->params->get('show_bank2')=="1"):
	if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td align="left" valign="top">
	<?php if ($this->impressum->bankinhaber2)
		echo JText::_( 'COM_IMPRESSUM_INHABER' ) .': '.$this->impressum->bankinhaber2.'<br />';
	if ($this->impressum->kontonr2)
		echo JText::_( 'COM_IMPRESSUM_KONTONUMMER' ) .': '.$this->impressum->kontonr2.'<br />';
	if ($this->impressum->blz2)
		echo JText::_( 'COM_IMPRESSUM_BLZ' ) .': '.$this->impressum->blz2.'<br />';
	if ($this->impressum->bankname2)
		echo JText::_( 'COM_IMPRESSUM_BANKNAME' ) .': '.$this->impressum->bankname2.'<br />';
	if ($this->impressum->iban2)
		echo JText::_( 'COM_IMPRESSUM_IBAN' ) .': '.$this->impressum->iban2.'<br />';
	if ($this->impressum->swift2)
		echo JText::_( 'COM_IMPRESSUM_SWIFT' ).': '.$this->impressum->swift2;
	?>
		</td>
<?php endif; ?>
	</tr>
<?php if ($this->impressum->params->get('show_bank3')=="1"): ?>
	<tr>
		<td colspan="2">
			&nbsp;
		</td>
	</tr>
	<tr>
	<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td align="left">
	<?php if ($this->impressum->bankinhaber3)
		echo JText::_( 'COM_IMPRESSUM_INHABER' ) .': '.$this->impressum->bankinhaber3.'<br />';
	if ($this->impressum->kontonr3)
		echo JText::_( 'COM_IMPRESSUM_KONTONUMMER' ) .': '.$this->impressum->kontonr3.'<br />';
	if ($this->impressum->blz3)
		echo JText::_( 'COM_IMPRESSUM_BLZ' ) .': '.$this->impressum->blz3.'<br />';
	if ($this->impressum->bankname3)
		echo JText::_( 'COM_IMPRESSUM_BANKNAME' ) .': '.$this->impressum->bankname3.'<br />';
	if ($this->impressum->iban3)
		echo JText::_( 'COM_IMPRESSUM_IBAN' ) .': '.$this->impressum->iban3.'<br />';
	if ($this->impressum->swift3)
		echo JText::_( 'COM_IMPRESSUM_SWIFT' ).': '.$this->impressum->swift3;
	?>
		</td>
	<?php if ($this->impressum->params->get('show_bank4')=="1"):
		if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
		<?php endif; ?>
		<td align="left" valign="top">
		<?php if ($this->impressum->bankinhaber4)
			echo JText::_( 'COM_IMPRESSUM_INHABER' ) .': '.$this->impressum->bankinhaber4.'<br />';
		if ($this->impressum->kontonr4)
			echo JText::_( 'COM_IMPRESSUM_KONTONUMMER' ) .': '.$this->impressum->kontonr4.'<br />';
		if ($this->impressum->blz4)
			echo JText::_( 'BLZ' ) .': '.$this->impressum->blz4.'<br />';
		if ($this->impressum->bankname4)
			echo JText::_( 'COM_IMPRESSUM_BANKNAME' ) .': '.$this->impressum->bankname4.'<br />';
		if ($this->impressum->iban4)
			echo JText::_( 'COM_IMPRESSUM_IBAN' ) .': '.$this->impressum->iban4.'<br />';
		if ($this->impressum->swift4)
			echo JText::_( 'COM_IMPRESSUM_SWIFT' ).': '.$this->impressum->swift4;
		?>
		</td>
	<?php endif; ?>
	</tr>
<?php endif; ?>
</table>
<br />
