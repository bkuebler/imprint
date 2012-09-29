<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

?>

<table style="width: 100%; border-width: 0px">
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
			<img src="<?php echo JURI::root(); ?>/media/com_imprint/images/bank.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRINT_BANKING_CONNECTION' ); ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td align="left" >
<?php if ($this->imprint->account_holder)
	echo JText::_( 'COM_IMPRINT_ACCOUNT_HOLDER' ) .': '.$this->imprint->account_holder.'<br />';
if ($this->imprint->bank_number)
	echo JText::_( 'COM_IMPRINT_ACCOUNT_NUMBER' ) .': '.$this->imprint->bank_number.'<br />';
if ($this->imprint->bank_code)
	echo JText::_( 'COM_IMPRINT_BANK_CODE' ) .': '.$this->imprint->bank_code.'<br />';
if ($this->imprint->bank_name)
	echo JText::_( 'COM_IMPRINT_BANK_NAME' ) .': '.$this->imprint->bank_name.'<br />';
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
	<?php if ($this->imprint->account_holder2)
		echo JText::_( 'COM_IMPRINT_ACCOUNT_HOLDER' ) .': '.$this->imprint->account_holder2.'<br />';
	if ($this->imprint->bank_number2)
		echo JText::_( 'COM_IMPRINT_ACCOUNT_NUMBER' ) .': '.$this->imprint->bank_number2.'<br />';
	if ($this->imprint->bank_code2)
		echo JText::_( 'COM_IMPRINT_BANK_CODE' ) .': '.$this->imprint->bank_code2.'<br />';
	if ($this->imprint->bank_name2)
		echo JText::_( 'COM_IMPRINT_BANK_NAME' ) .': '.$this->imprint->bank_name2.'<br />';
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
	<?php if ($this->imprint->account_holder3)
		echo JText::_( 'COM_IMPRINT_ACCOUNT_HOLDER' ) .': '.$this->imprint->account_holder3.'<br />';
	if ($this->imprint->bank_number3)
		echo JText::_( 'COM_IMPRINT_ACCOUNT_NUMBER' ) .': '.$this->imprint->bank_number3.'<br />';
	if ($this->imprint->bank_code3)
		echo JText::_( 'COM_IMPRINT_BANK_CODE' ) .': '.$this->imprint->bank_code3.'<br />';
	if ($this->imprint->bank_name3)
		echo JText::_( 'COM_IMPRINT_BANK_NAME' ) .': '.$this->imprint->bank_name3.'<br />';
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
		<?php if ($this->imprint->account_holder4)
			echo JText::_( 'COM_IMPRINT_ACCOUNT_HOLDER' ) .': '.$this->imprint->account_holder4.'<br />';
		if ($this->imprint->bank_number4)
			echo JText::_( 'COM_IMPRINT_ACCOUNT_NUMBER' ) .': '.$this->imprint->bank_number4.'<br />';
		if ($this->imprint->bank_code4)
			echo JText::_( 'COM_IMPRINT_BANK_CODE' ) .': '.$this->imprint->bank_code4.'<br />';
		if ($this->imprint->bank_name4)
			echo JText::_( 'COM_IMPRINT_BANK_NAME' ) .': '.$this->imprint->bank_name4.'<br />';
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
