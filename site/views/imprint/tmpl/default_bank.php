<?php
/**
 * @version		3.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2013 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

?>

<table class="imprint_no_border">
	<thead>
		<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
				<img src="<?php echo JURI::root(); ?>/media/com_imprint/images/bank.png" border="" alt="" />
			</td>
<?php endif; ?>
			<td class="imprint_td_header" colspan="2">
				<?php echo JText::_( 'COM_IMPRINT_BANKING_CONNECTION' ); ?>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
			</td>
<?php endif; ?>
			<td class="imprint_td_width_50">
				<table class="imprint_no_border">
					<?php
					if ($this->imprint->account_holder)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ACCOUNT_HOLDER' ) . ':</td><td>' . $this->imprint->account_holder . '</td></tr>';
					if ($this->imprint->account_number)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ACCOUNT_NUMBER' ) . ':</td><td>' . $this->imprint->account_number . '</td></tr>';
					if ($this->imprint->bank_code)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_BANK_CODE' ) . ':</td><td>' . $this->imprint->bank_code . '</td></tr>';
					if ($this->imprint->bank_name)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_BANK_NAME' ) . ':</td><td>' . $this->imprint->bank_name . '</td></tr>';
					if ($this->imprint->iban)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_IBAN' ) . ':</td><td>' . $this->imprint->iban . '</td></tr>';
					if ($this->imprint->swift)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_SWIFT' ) . ':</td><td>' . $this->imprint->swift . '</td></tr>';
					?>
				</table>
			</td>
<?php if ($this->imprint->params->get('show_bank2')=="1"): ?>
			<td class="imprint_td_width_50">
				<table class="imprint_no_border">
					<?php
					if ($this->imprint->account_holder2)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ACCOUNT_HOLDER' ) . ':</td><td>' . $this->imprint->account_holder2 . '</td></tr>';
					if ($this->imprint->account_number2)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ACCOUNT_NUMBER' ) . ':</td><td>' . $this->imprint->account_number2 . '</td></tr>';
					if ($this->imprint->bank_code2)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_BANK_CODE' ) . ':</td><td>' . $this->imprint->bank_code2 . '</td></tr>';
					if ($this->imprint->bank_name2)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_BANK_NAME' ) . ':</td><td>' . $this->imprint->bank_name2 . '</td></tr>';
					if ($this->imprint->iban2)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_IBAN' ) . ':</td><td>' . $this->imprint->iban2 . '</td></tr>';
					if ($this->imprint->swift2)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_SWIFT' ) . ':</td><td>' . $this->imprint->swift2 . '</td></tr>';
					?>
				</table>
			</td>
<?php endif; ?>
		</tr>
<?php if ($this->imprint->params->get('show_bank3')=="1"): ?>
		<tr>
			<td colspan="3">
				&nbsp;
			</td>
		</tr>
		<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
			</td>
	<?php endif; ?>
			<td class="imprint_td_width_50">
				<table class="imprint_no_border">
					<?php
					if ($this->imprint->account_holder3)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ACCOUNT_HOLDER' ) . ':</td><td>' . $this->imprint->account_holder3 . '</td></tr>';
					if ($this->imprint->account_number3)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ACCOUNT_NUMBER' ) . ':</td><td>' . $this->imprint->account_number3 . '</td></tr>';
					if ($this->imprint->bank_code3)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_BANK_CODE' ) . ':</td><td>' . $this->imprint->bank_code3 . '</td></tr>';
					if ($this->imprint->bank_name3)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_BANK_NAME' ) . ':</td><td>' . $this->imprint->bank_name3 . '</td></tr>';
					if ($this->imprint->iban3)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_IBAN' ) . ':</td><td>' . $this->imprint->iban3 . '</td></tr>';
					if ($this->imprint->swift3)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_SWIFT' ) . ':</td><td>' . $this->imprint->swift3 . '</td></tr>';
					?>
				</table>
			</td>
	<?php if ($this->imprint->params->get('show_bank4')=="1"): ?>
			<td class="imprint_td_width_50">
				<table class="imprint_no_border">
					<?php
					if ($this->imprint->account_holder4)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ACCOUNT_HOLDER' ) . ':</td><td>' . $this->imprint->account_holder4 . '</td></tr>';
					if ($this->imprint->account_number4)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ACCOUNT_NUMBER' ) . ':</td><td>' . $this->imprint->account_number4 . '</td></tr>';
					if ($this->imprint->bank_code4)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_BANK_CODE' ) . ':</td><td>' . $this->imprint->bank_code4 . '</td></tr>';
					if ($this->imprint->bank_name4)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_BANK_NAME' ) . ':</td><td>' . $this->imprint->bank_name4 . '</td></tr>';
					if ($this->imprint->iban4)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_IBAN' ) . ':</td><td>' . $this->imprint->iban4 . '</td></tr>';
					if ($this->imprint->swift4)
						echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_SWIFT' ) . ':</td><td>' . $this->imprint->swift4 . '</td></tr>';
					?>
				</table>
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
	</tbody>
</table>