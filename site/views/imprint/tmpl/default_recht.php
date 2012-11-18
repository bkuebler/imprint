<?php
/**
 * @version		3.0.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

?>
<table class="imprint_no_border">
	<thead>
		<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
				<img src="<?php echo JURI::root(); ?>media/com_imprint/images/recht.png" border="" alt="" />
			</td>
<?php endif; ?>
			<td class="imprint_td_header">
				<?php echo JText::_( 'COM_IMPRINT_LEGAL_FORMALITY' ); ?>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
			</td>
<?php endif; ?>
			<td class="imprint_align_left">
				<table class="imprint_no_border">
					<thead>
						<?php
						if ($this->imprint->vertreter && $this->imprint->vertretertitel)
						{
							echo '<tr><td class="imprint_td_width_50">' . $this->imprint->vertretertitel . ':</td><td>' . $this->imprint->vertreter;
					  		if ($this->imprint->vertreteremail)
					  			echo " (".JHTML::_('email.cloak', $this->imprint->vertreteremail).")";
					  		echo '</td></tr>';
						}
						else if ($this->imprint->vertreter && ($this->imprint->vertretertitel==""))
						{
							echo '<tr><td colspan="2">' . $this->imprint->vertreter;
							if ($this->imprint->vertreteremail)
								echo " (".JHTML::_('email.cloak', $this->imprint->vertreteremail).")";
							echo '</td></tr>';
						}
						?>
					</thead>
					<tbody>
						<?php
						if ($this->imprint->sales_tax_id)
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_SALES_TAX_ID' ) . ':</td><td>' . $this->imprint->sales_tax_id . '</td></tr>';
						if ($this->imprint->economic_id)
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ECONOMIC_ID' ) . ':</td><td>' . $this->imprint->economic_id . '</td></tr>';
						if ($this->imprint->registergericht)
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_REGISTER_COURT' ) . ':</td><td>' . $this->imprint->registergericht . '</td></tr>';
						if ($this->imprint->registernummer)
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_REGISTER_NUMBER' ) . ':</td><td>' . $this->imprint->registernummer . '</td></tr>';
						if ($this->imprint->responsible_for_content)
						{
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_RESPONSIBLE_FOR_CONTENT' ) . ':</td><td>' . $this->imprint->responsible_for_content;
							if ($this->imprint->responsible_for_content_mail)
								echo " (".JHTML::_('email.cloak', $this->imprint->responsible_for_content_mail).")";
							echo '</td></tr>';
						}
						?>
					</tbody>
				</table>
			</td>
		</tr>
<?php if ($this->imprint->params->get('show_recht2')=="1"): ?>
	<?php if ($this->imprint->recht2grund): ?>
		<tr>
			<td colspan="2">
				&nbsp;
			</td>
		</tr>
		<tr>
		<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
				<img src="<?php echo JURI::root(); ?>media/com_imprint/images/recht.png" border="" alt="" />
			</td>
		<?php endif; ?>
			<td class="imprint_td_header">
				<?php echo $this->imprint->recht2grund; ?>
			</td>
	<?php endif; ?>
		</tr>
		<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
	        </td>
	<?php endif; ?>
	        <td class="imprint_align_left">
				<table class="imprint_no_border">
					<thead>
						<?php
						if ($this->imprint->vertreter2 && $this->imprint->vertretertitel2)
						{
							echo '<tr><td class="imprint_td_width_50">' . $this->imprint->vertretertitel2 . ':</td><td>' . $this->imprint->vertreter2;
					  		if ($this->imprint->vertreteremail2)
					  			echo " (".JHTML::_('email.cloak', $this->imprint->vertreteremail2).")";
					 		echo '</td></tr>';
						}
						else if ($this->imprint->vertreter2 && ($this->imprint->vertretertitel2==""))
						{
							echo '<tr><td colspan="2">' . $this->imprint->vertreter2;
							if ($this->imprint->vertreteremail2)
								echo " (".JHTML::_('email.cloak', $this->imprint->vertreteremail2).")";
							echo '</td></tr>';
						}
						?>
					</thead>
					<tbody>
						<?php
						if ($this->imprint->sales_tax_id2)
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_SALES_TAX_ID' ) . ':</td><td>' . $this->imprint->sales_tax_id2 . '</td></tr>';
						if ($this->imprint->economic_id2)
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_ECONOMIC_ID' ) . ':</td><td>' . $this->imprint->economic_id2 . '</td></tr>';
						if ($this->imprint->registergericht2)
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_REGISTER_COURT' ) . ':</td><td>' . $this->imprint->registergericht2 . '</td></tr>';
						if ($this->imprint->registernummer2)
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_REGISTER_NUMBER' ) . ':</td><td>' . $this->imprint->registernummer2 . '</td></tr>';
						if ($this->imprint->responsible_for_content2)
						{
							echo '<tr><td class="imprint_td_width_50">' . JText::_( 'COM_IMPRINT_RESPONSIBLE_FOR_CONTENT' ) . ':</td><td>' . $this->imprint->responsible_for_content2;
							if ($this->imprint->responsible_for_content_mail2)
								echo " (".JHTML::_('email.cloak', $this->imprint->responsible_for_content_mail2).")";
							echo '</td></tr>';
						}
						?>
					</tbody>
				</table>
			</td>
		</tr>
<?php endif; ?>
	</tbody>
</table>