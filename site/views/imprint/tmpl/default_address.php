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
				<img src="<?php echo JURI::root(); ?>media/com_imprint/images/home.png" border="" alt="" />
			</td>
<?php endif; ?>
			<td class="imprint_td_header" colspan="2">
				<?php echo $this->imprint->adresstitel ?>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
			</td>
<?php endif; ?>
			<td class="imprint_td_address">
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
			if ($this->imprint->street)
				echo JText::_( 'COM_IMPRINT_STREET' ) .': '.$this->imprint->street.'<br />';
			if ($this->imprint->zipcode)
				echo JText::_( 'COM_IMPRINT_ZIP_CODE' ) .': '.$this->imprint->zipcode.'<br />';
			if ($this->imprint->city)
				echo JText::_( 'COM_IMPRINT_CITY' ) .': '.$this->imprint->city.'<br />';
			if ($this->imprint->country)
				echo JText::_( 'COM_IMPRINT_COUNTRY' ) .': '.$this->imprint->country.'<br />';
			?>
			</td>
			<td class="imprint_td_align_top_left">
				<table class="imprint_no_border">
<?php if ($this->imprint->telephone != ''): ?>
					<tr>
						<td class="imprint_td_icon">
							<?php echo $this->imprint->params->get( 'marker_telephone' ); ?>&nbsp;
						</td>
						<td class="imprint_td_align_left">
						<?php 
							echo JText::_( 'COM_IMPRINT_TELEPHONE' ) .': '.$this->imprint->telephone.'<br />';
						?>
						</td>
					</tr>
<?php endif; ?>
<?php if ($this->imprint->fax != ''): ?>
					<tr>
						<td class="imprint_td_icon">
							<?php echo $this->imprint->params->get( 'marker_fax' ); ?>&nbsp;
						</td>
						<td class="imprint_td_align_left">
						<?php 
							echo JText::_( 'COM_IMPRINT_FAX' ) .': '.$this->imprint->fax.'<br />';
						?>
						</td>
					</tr>
<?php endif; ?>
<?php if ($this->imprint->mobilephone != ''): ?>
					<tr>
						<td class="imprint_td_icon">
							<?php echo $this->imprint->params->get( 'marker_mobile' ); ?>&nbsp;
						</td>
						<td class="imprint_td_align_left">
						<?php
							echo JText::_( 'COM_IMPRINT_MOBILE_PHONE' ) .': '.$this->imprint->mobilephone.'<br />';
						?>
						</td>
					</tr>
<?php endif; ?>
<?php if ($this->imprint->website != ''): ?>
					<tr>
						<td class="imprint_td_icon">
							<?php echo $this->imprint->params->get( 'marker_address' ); ?>&nbsp;
						</td>
						<td class="imprint_td_align_left">
							<a href="http://<?php echo $this->imprint->website ?>">
								<?php echo $this->imprint->website ?>
							</a>
						</td>
					</tr>
<?php endif; ?>
<?php if ($this->imprint->email != ''): ?>
					<tr>
						<td class="imprint_td_icon">
							<?php echo $this->imprint->params->get( 'marker_email' ); ?>&nbsp;
						</td>
						<td class="imprint_td_align_left">
							<?php if ($this->imprint->email) echo JHTML::_('email.cloak', $this->imprint->email); ?>
						</td>
					</tr>
<?php endif; ?>
<?php if ($this->imprint->params->get('show_contacturl')=="1"): ?>
					<tr>
						<td class="imprint_td_icon">
							<?php echo $this->imprint->params->get( 'marker_email' ); ?>&nbsp;
						</td>
						<td class="imprint_td_align_left">
							<a href="http://<?php echo $this->imprint->contacturl ?>">Kontaktformular anzeigen</a>
						</td>
					</tr>
<?php endif; ?>
				</table>
			</td>
		</tr>
	</tbody>
</table>
<!-- Adresse Ende -->