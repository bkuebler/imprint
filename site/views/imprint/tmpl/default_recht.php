<?php
/**
 * @version		3.0.1 $Id$
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
				<?php
				if ($this->imprint->vertreter)
					if ($this->imprint->vertretertitel)
					{
						echo $this->imprint->vertretertitel.': '.$this->imprint->vertreter;
				  		if ($this->imprint->vertreteremail)
				  			echo " (".JHTML::_('email.cloak', $this->imprint->vertreteremail).")" . '<br />';
					}
				else if ($this->imprint->vertreter)
					if ($this->imprint->vertretertitel=="")
					{
						echo $this->imprint->vertreter;
						if ($this->imprint->vertreteremail)
							echo " (".JHTML::_('email.cloak', $this->imprint->vertreteremail).")" . '<br>';
					}
				if ($this->imprint->sales_tax_id)
					echo JText::_( 'COM_IMPRINT_SALES_TAX_ID' ) .': '.$this->imprint->sales_tax_id.'<br />';
				if ($this->imprint->economic_id)
					echo JText::_( 'COM_IMPRINT_ECONOMIC_ID' ) .': '.$this->imprint->economic_id.'<br />';
				if ($this->imprint->registergericht)
					echo JText::_( 'COM_IMPRINT_REGISTER_COURT' ).': '.$this->imprint->registergericht.'<br />';
				if ($this->imprint->registernummer)
					echo JText::_( 'COM_IMPRINT_REGISTER_NUMBER' ) .': '.$this->imprint->registernummer.'<br />';
				if ($this->imprint->responsible_for_content)
				{
					echo JText::_( 'COM_IMPRINT_RESPONSIBLE_FOR_CONTENT' ) . ': ' . $this->imprint->responsible_for_content;
					if ($this->imprint->responsible_for_content_mail)
						echo " (".JHTML::_('email.cloak', $this->imprint->responsible_for_content_mail).")";
				}
				?>
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
				<?php
				if ($this->imprint->vertreter2)
					if ($this->imprint->vertretertitel2)
					{
							echo $this->imprint->vertretertitel2.': '.$this->imprint->vertreter2;
							if ($this->imprint->vertreteremail2)
								echo " (".JHTML::_('email.cloak', $this->imprint->vertreteremail2).")" . '<br />';
					}
				else if ($this->imprint->vertreter2)
				{
					if ($this->imprint->vertretertitel2=="")
					{
						echo $this->imprint->vertreter2;
						if ($this->imprint->vertreteremail2)
							echo " (".JHTML::_('email.cloak', $this->imprint->vertreteremail2).")" . '<br>';
					}
				}
				if ($this->imprint->vertreter2)
				{
					echo JText::_( 'COM_IMPRINT_REPRESENTATIVE' ).': '.$this->imprint->vertreter2;
					if ($this->imprint->vertreteremail2)
						echo " (".JHTML::_('email.cloak', $this->imprint->vertreteremail2).")" . '<br />';
				}
				if ($this->imprint->sales_tax_id2)
					echo JText::_( 'COM_IMPRINT_SALES_TAX_ID' ) .': '.$this->imprint->sales_tax_id2.'<br />';
				if ($this->imprint->economic_id2)
					echo JText::_( 'COM_IMPRINT_ECONOMIC_ID' ) .': '.$this->imprint->economic_id2.'<br />';
				if ($this->imprint->registergericht2)
					echo JText::_( 'COM_IMPRINT_REGISTER_COURT' ).': '.$this->imprint->registergericht2.'<br />';
				if ($this->imprint->registernummer2)
					echo JText::_( 'COM_IMPRINT_REGISTER_NUMBER' ) .': '.$this->imprint->registernummer2.'<br />';
				if ($this->imprint->responsible_for_content2)
				{
					echo JText::_( 'COM_IMPRINT_RESPONSIBLE_FOR_CONTENT' ) . ': ' . $this->imprint->responsible_for_content2;
				if ($this->imprint->responsible_for_content_mail2)
					echo " (".JHTML::_('email.cloak', $this->imprint->responsible_for_content_mail2).")";
				}
				?>
			</td>
		</tr>
<?php endif; ?>
	</tbody>
</table>