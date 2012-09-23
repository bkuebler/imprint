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
			<img src="<?php echo JURI::root(); ?>media/com_imprint/images/home.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo $this->imprint->adresstitel ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td width="<?php echo $this->imprint->params->get('leftcw'); ?>%" valign="top" align="left">
		<?php
		if ($this->imprint->firma)
			echo JText::_( 'COM_IMPRINT_COMPANY' ) .': '.$this->imprint->firma.'<br />';
		if ($this->imprint->name1)
			echo JText::_( 'COM_IMPRINT_NAME' ) .': '.$this->imprint->name1.'<br />';
		if ($this->imprint->name2)
			echo JText::_( 'COM_IMPRINT_NAME' ) .': '.$this->imprint->name2.'<br />';
		if ($this->imprint->name3)
			echo JText::_( 'COM_IMPRINT_NAME' ) .': '.$this->imprint->name3.'<br />';
		if ($this->imprint->name4)
			echo JText::_( 'COM_IMPRINT_NAME' ) .': '.$this->imprint->name4.'<br />';
		if ($this->imprint->strasse)
			echo JText::_( 'COM_IMPRINT_STREET' ) .': '.$this->imprint->strasse.'<br />';
		if ($this->imprint->plz)
			echo JText::_( 'COM_IMPRINT_ZIP_CODE' ) .': '.$this->imprint->plz.'<br />';
		if ($this->imprint->ort)
			echo JText::_( 'COM_IMPRINT_CITY' ) .': '.$this->imprint->ort.'<br />';
		if ($this->imprint->land)
			echo JText::_( 'COM_IMPRINT_COUNTRY' ) .': '.$this->imprint->land.'<br />';
		?>
		</td>
		<td align="left" valign="top">
			<table style="width: 100%; border-width: 0px; border-spacing: 0px; padding: 0px">
<?php if ($this->imprint->telefon != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_telephone' ); ?>&nbsp;
					</td>
					<td align="left">
					<?php 
						echo JText::_( 'COM_IMPRINT_TELEPHONE' ) .': '.$this->imprint->telefon.'<br />';
					?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->fax != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_fax' ); ?>&nbsp;
					</td>
					<td align="left">
					<?php 
						echo JText::_( 'COM_IMPRINT_FAX' ) .': '.$this->imprint->fax.'<br />';
					?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->handy != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_mobile' ); ?>&nbsp;
					</td>
					<td align="left">
					<?php
						echo JText::_( 'COM_IMPRINT_MOBILE_PHONE' ) .': '.$this->imprint->handy.'<br />';
					?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->website != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_address' ); ?>&nbsp;
					</td>
					<td align="left">
						<a href="http://<?php echo $this->imprint->website ?>">
							<?php echo $this->imprint->website ?>
						</a>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->email != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_email' ); ?>&nbsp;
					</td>
					<td align="left">
						<?php if ($this->imprint->email) echo JHTML::_('email.cloak', $this->imprint->email); ?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->params->get('show_contacturl')=="1"): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_email' ); ?>&nbsp;
					</td>
					<td align="left">
						<a href="http://<?php echo $this->imprint->contacturl ?>">Kontaktformular anzeigen</a>
					</td>
				</tr>
<?php endif; ?>
			</table>
		</td>
	</tr>
</table>
<!-- Adresse Ende -->
<br />