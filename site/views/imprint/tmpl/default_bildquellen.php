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
			<img src="<?php echo JURI::root(); ?>media/com_imprint/images/bilder.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRINT_BILDQUELLEN' ); ?></strong>
		</td>
	</tr>
<?php if ($this->imprint->bildquellen): ?>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td align="left" >
			<?php echo $this->imprint->bildquellen; ?>
		</td>
	</tr>
<?php endif; ?>
<?php if ($this->imprint->bildrechte): ?>
	<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
	<?php endif; ?>
		<td align="left" >
			<?php echo $this->imprint->bildrechte; ?>
		</td>
	</tr>
<?php endif; ?>
</table>
<br />