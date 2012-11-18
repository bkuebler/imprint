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
				<img src="<?php echo JURI::root(); ?>media/com_imprint/images/technik.png" border="" alt="" />
			</td>
<?php endif; ?>
			<td class="imprint_td_header">
				<?php echo JText::_( 'COM_IMPRINT_TECHNICAL_DETAILS' ); ?>
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
				<?php if ($this->imprint->technikperson)
				{
					echo JText::_( 'COM_IMPRINT_TECHNICAL_PERSON_IN_CHARGE' ) . ': ' . $this->imprint->technikperson;
					if ($this->imprint->technikemail)
						echo " (".JHTML::_('email.cloak', $this->imprint->technikemail).")" . '<br />';
				}
				if ($this->imprint->technikwebsite)
					echo JText::_( 'COM_IMPRINT_TECHNICAL_PERSON_WEBSITE' ) . ' <a href="http://' . $this->imprint->technikwebsite . '" target="blank">' . $this->imprint->technikwebsite . '</a>';
				?>
			</td>
		</tr>
	</tbody>
</table>