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
				<img src="<?php echo JURI::root(); ?>media/com_imprint/images/bilder.png" border="" alt="" />
			</td>
<?php endif; ?>
			<td class="imprint_td_header">
				<?php echo JText::_( 'COM_IMPRINT_IMAGE_SOURCES_AND_RIGHTS' ); ?>
			</td>
		</tr>
	</thead>
	<tbody>
<?php if ($this->imprint->image_sources): ?>
		<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
			</td>
	<?php endif; ?>
			<td class="imprint_td_align_left">
				<?php echo $this->imprint->image_sources; ?>
			</td>
		</tr>
<?php endif; ?>
<?php if ($this->imprint->image_rights): ?>
		<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
			</td>
	<?php endif; ?>
			<td class="imprint_td_align_left">
				<?php echo $this->imprint->image_rights; ?>
			</td>
		</tr>
<?php endif; ?>
	</tbody>
</table>