<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Impressum
 * @copyright	(C) 2011 Impressum Reloaded Team
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
			<img src="<?php echo JURI::root(); ?>media/com_impressum/images/recht.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRESSUM_RECHT' ); ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td align="left">
<?php
if ($this->impressum->vertreter)
	if ($this->impressum->vertretertitel)
	{
		echo $this->impressum->vertretertitel.': '.$this->impressum->vertreter;
  		if ($this->impressum->vertreteremail)
  			echo " (".JHTML::_('email.cloak', $this->impressum->vertreteremail).")" . '<br />';
	}
else if ($this->impressum->vertreter)
	if ($this->impressum->vertretertitel=="")
	{
		echo $this->impressum->vertreter;
		if ($this->impressum->vertreteremail)
			echo "(".JHTML::_('email.cloak', $this->impressum->vertreteremail).")" . '<br>';
	}
if ($this->impressum->ustidnr)
	echo JText::_( 'COM_IMPRESSUM_USTIDNR' ) .': '.$this->impressum->ustidnr.'<br />';
if ($this->impressum->wirtidnr)
	echo JText::_( 'COM_IMPRESSUM_WIRTIDNR' ) .': '.$this->impressum->wirtidnr.'<br />';
if ($this->impressum->registergericht)
	echo JText::_( 'COM_IMPRESSUM_REGISTERGERICHT' ).': '.$this->impressum->registergericht.'&nbsp;';
if ($this->impressum->registernummer)
	echo JText::_( 'COM_IMPRESSUM_REGISTERNUMMER' ) .': '.$this->impressum->registernummer.'<br />';
if ($this->impressum->inhaltperson)
{
	echo JText::_( 'COM_IMPRESSUM_INHALTPERSON' ) . ': ' . $this->impressum->inhaltperson;
	if ($this->impressum->inhaltemail)
		echo " (".JHTML::_('email.cloak', $this->impressum->inhaltemail).")";
}
?>
		</td>
	</tr>
<?php if ($this->impressum->params->get('show_recht2')=="1"): ?>
	<?php if ($this->impressum->recht2grund): ?>
	<tr>
		<td colspan="2">
		</td>
	</tr>
	<tr>
		<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
			<img src="<?php echo JURI::root(); ?>media/com_impressum/images/recht.png" border="" alt="" />
		</td>
		<?php endif; ?>
		<td>
			<strong><?php echo $this->impressum->recht2grund; ?></strong>
		</td>
	<?php endif; ?>
	</tr>
	<tr>
	<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
        </td>
	<?php endif; ?>
        <td align="left">
	<?php
	if ($this->impressum->vertreter2)
		if ($this->impressum->vertretertitel2)
		{
				echo $this->impressum->vertretertitel2.': '.$this->impressum->vertreter2;
				if ($this->impressum->vertreteremail2)
					echo "(".JHTML::_('email.cloak', $this->impressum->vertreteremail2).")" . '<br />';
		}
	else if ($this->impressum->vertreter2)
	{
		if ($this->impressum->vertretertitel2=="")
		{
			echo $this->impressum->vertreter2;
			if ($this->impressum->vertreteremail2)
				echo "(".JHTML::_('email.cloak', $this->impressum->vertreteremail2).")" . '<br>';
		}
	}
	if ($this->impressum->vertreter2)
	{
		echo JText::_( 'COM_IMPRESSUM_VERTRETER' ).': '.$this->impressum->vertreter2;
		if ($this->impressum->vertreteremail2)
			echo "(".JHTML::_('email.cloak', $this->impressum->vertreteremail2).")" . '<br />';
	}
	if ($this->impressum->ustidnr2)
		echo JText::_( 'COM_IMPRESSUM_USTIDNR' ) .': '.$this->impressum->ustidnr2.'<br />';
	if ($this->impressum->wirtidnr2)
		echo JText::_( 'COM_IMPRESSUM_WIRTIDNR' ) .': '.$this->impressum->wirtidnr2.'<br />';
	if ($this->impressum->registergericht2)
		echo JText::_( 'COM_IMPRESSUM_REGISTERGERICHT' ).': '.$this->impressum->registergericht2.'&nbsp;';
	if ($this->impressum->registernummer2)
		echo JText::_( 'COM_IMPRESSUM_REGISTERNUMMER' ) .': '.$this->impressum->registernummer2.'<br />';
	if ($this->impressum->inhaltperson2)
	{
		echo JText::_( 'COM_IMPRESSUM_INHALTPERSON' ) . ': ' . $this->impressum->inhaltperson2;
		if ($this->impressum->inhaltemail2)
			echo "(".JHTML::_('email.cloak', $this->impressum->inhaltemail2).")";
	}
	?>
		</td>
	</tr>
<?php endif; ?>
</table>
<br />