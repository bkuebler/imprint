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
			<img src="<?php echo JURI::root(); ?>media/com_imprint/images/recht.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRINT_LEGAL_FORMALITY' ); ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td align="left">
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
if ($this->imprint->ustidnr)
	echo JText::_( 'COM_IMPRINT_SALES_TAX_ID' ) .': '.$this->imprint->ustidnr.'<br />';
if ($this->imprint->wirtidnr)
	echo JText::_( 'COM_IMPRINT_ECONOMIC_ID' ) .': '.$this->imprint->wirtidnr.'<br />';
if ($this->imprint->registergericht)
	echo JText::_( 'COM_IMPRINT_REGISTER_COURT' ).': '.$this->imprint->registergericht.'<br />';
if ($this->imprint->registernummer)
	echo JText::_( 'COM_IMPRINT_REGISTER_NUMBER' ) .': '.$this->imprint->registernummer.'<br />';
if ($this->imprint->inhaltperson)
{
	echo JText::_( 'COM_IMPRINT_INHALTPERSON' ) . ': ' . $this->imprint->inhaltperson;
	if ($this->imprint->inhaltemail)
		echo " (".JHTML::_('email.cloak', $this->imprint->inhaltemail).")";
}
?>
		</td>
	</tr>
<?php if ($this->imprint->params->get('show_recht2')=="1"): ?>
	<?php if ($this->imprint->recht2grund): ?>
	<tr>
		<td colspan="2">
		</td>
	</tr>
	<tr>
		<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
			<img src="<?php echo JURI::root(); ?>media/com_imprint/images/recht.png" border="" alt="" />
		</td>
		<?php endif; ?>
		<td>
			<strong><?php echo $this->imprint->recht2grund; ?></strong>
		</td>
	<?php endif; ?>
	</tr>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
        </td>
	<?php endif; ?>
        <td align="left">
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
	if ($this->imprint->ustidnr2)
		echo JText::_( 'COM_IMPRINT_SALES_TAX_ID' ) .': '.$this->imprint->ustidnr2.'<br />';
	if ($this->imprint->wirtidnr2)
		echo JText::_( 'COM_IMPRINT_ECONOMIC_ID' ) .': '.$this->imprint->wirtidnr2.'<br />';
	if ($this->imprint->registergericht2)
		echo JText::_( 'COM_IMPRINT_REGISTER_COURT' ).': '.$this->imprint->registergericht2.'<br />';
	if ($this->imprint->registernummer2)
		echo JText::_( 'COM_IMPRINT_REGISTER_NUMBER' ) .': '.$this->imprint->registernummer2.'<br />';
	if ($this->imprint->inhaltperson2)
	{
		echo JText::_( 'COM_IMPRINT_INHALTPERSON' ) . ': ' . $this->imprint->inhaltperson2;
	if ($this->imprint->inhaltemail2)
		echo " (".JHTML::_('email.cloak', $this->imprint->inhaltemail2).")";
	}
	?>
		</td>
	</tr>
<?php endif; ?>
</table>
<br />