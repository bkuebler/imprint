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
				<img src="<?php echo JURI::root(); ?>/media/com_imprint/images/technik.png" border="" alt="" />
			</td>
<?php endif; ?>
			<td class="imprint_td_header">
				<?php echo $this->imprint->extra2titel ?>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
			<td class="imprint_td_icon">
			</td>
<?php endif; ?>
			<td class="imprint_td_align_left">
				<?php echo $this->imprint->extra2person;
				if ($this->imprint->extra2email)
					echo " (".JHTML::_('email.cloak', $this->imprint->extra2email).")<br />";
				if ($this->imprint->extra2website)
					echo JText::_( 'COM_IMPRINT_EXTRAWEBSITE' ) . ' <a href="http://' . $this->imprint->extra2website . '" target="blank">' . $this->imprint->extra2website . '</a>';
				?>
			</td>
		</tr>
	</tbody>
</table>