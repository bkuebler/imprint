<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Impressum Reloaded Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

?>
<table style="width: 100%; border-width: 0px">
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
			<img src="<?php echo JURI::root(); ?>/media/com_imprint/images/technik.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo $this->imprint->extra3titel ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td align="left">
			<?php echo $this->imprint->extra3person;
			if ($this->imprint->extra3email)
				echo " (".JHTML::_('email.cloak', $this->imprint->extra3email).")<br />";
			if ($this->imprint->extra3website)
				echo JText::_( 'COM_IMPRINT_EXTRAWEBSITE' ) . ' <a href="http://' . $this->imprint->extra3website . '" target="blank">' . $this->imprint->extra3website . '</a>';
			?>
		</td>
	</tr>
</table>
<br />