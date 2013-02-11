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
				<img src="<?php echo JURI::root(); ?>media/com_imprint/images/home.png" border="" alt="" />
			</td>
<?php endif; ?>
			<td class="imprint_td_header" colspan="2">
				<?php echo $this->imprint->adresstitel; ?>
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
					if ($this->imprint->firma)
						echo '<tr><td>' . $this->imprint->firma .'</td></tr>';
					if ($this->imprint->name1)
						echo '<tr><td>' . $this->imprint->name1 .'</td></tr>';
					if ($this->imprint->name2)
						echo '<tr><td>' . $this->imprint->name2 .'</td></tr>';
					if ($this->imprint->name3)
						echo '<tr><td>' . $this->imprint->name3 .'</td></tr>';
					if ($this->imprint->name4)
						echo '<tr><td>' . $this->imprint->name4 .'</td></tr>';
					if ($this->imprint->street)
						echo '<tr><td>' . $this->imprint->street .'</td></tr>';
					if ($this->imprint->zipcode)
						echo '<tr><td>' . $this->imprint->zipcode .'</td></tr>';
					if ($this->imprint->city)
						echo '<tr><td>' . $this->imprint->city .'</td></tr>';
					if ($this->imprint->country)
						echo '<tr><td>' . $this->imprint->country .'</td></tr>';
					?>
				</table>
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
							echo $this->imprint->telephone;
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
							echo $this->imprint->fax;
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
							echo $this->imprint->mobilephone;
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
							<?php echo JHTML::_('email.cloak', $this->imprint->email); ?>
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