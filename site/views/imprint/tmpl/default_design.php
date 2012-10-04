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
			<img src="<?php echo JURI::root(); ?>media/com_imprint/images/template.png" border="" alt="" />
		</td>
	<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRINT_DESIGN' ); ?></strong>
		</td>
	</tr>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td align="left">
		<?php echo JText::_( 'COM_IMPRINT_TEMPLATE_NAME' ) . ': ' . $this->imprint->template_name . '<br />' ?>
		<?php echo JText::_( 'COM_IMPRINT_TEMPLATE_CREATOR' ) . ': ' . $this->imprint->template_creator;
			if ($this->imprint->template_creator_email)
				echo " (".JHTML::_('email.cloak', $this->imprint->template_creator_email).")"; ?>
			<br />
		<?php if ($this->imprint->template_creator_website)
			echo JText::_( 'COM_IMPRINT_TEMPLATE_CREATOR_WEBSITE' ) .
				': <a href="http://' . $this->imprint->template_creator_website . '" target="_blank">' .
				$this->imprint->template_creator_website.'</a>'; ?>
		</td>
	</tr>
</table>
<br />