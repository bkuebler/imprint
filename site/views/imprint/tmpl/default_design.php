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
				<img src="<?php echo JURI::root(); ?>media/com_imprint/images/template.png" border="" alt="" />
			</td>
	<?php endif; ?>
			<td class="imprint_td_header">
				<?php echo JText::_( 'COM_IMPRINT_DESIGN' ); ?>
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
				<?php
				echo JText::_( 'COM_IMPRINT_TEMPLATE_NAME' ) . ': ' . $this->imprint->template_name . '<br />';
				echo JText::_( 'COM_IMPRINT_TEMPLATE_CREATOR' ) . ': ' . $this->imprint->template_creator;
				if ($this->imprint->template_creator_email)
					echo " (".JHTML::_('email.cloak', $this->imprint->template_creator_email).")";
				echo '<br />';
				if ($this->imprint->template_creator_website)
					echo JText::_( 'COM_IMPRINT_TEMPLATE_CREATOR_WEBSITE' ) .
						': <a href="http://' . $this->imprint->template_creator_website . '" target="_blank">' .
						$this->imprint->template_creator_website.'</a>';
				?>
			</td>
		</tr>
	</tbody>
</table>