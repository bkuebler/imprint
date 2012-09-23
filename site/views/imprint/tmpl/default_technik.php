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
			<img src="<?php echo JURI::root(); ?>media/com_imprint/images/technik.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo JText::_( 'COM_IMPRINT_TECHNIK' ); ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td align="left">
<?php if ($this->imprint->technikperson)
{
	echo JText::_( 'COM_IMPRINT_TECHNIKPERSON' ) . ': ' . $this->imprint->technikperson;
	if ($this->imprint->technikemail)
		echo " (".JHTML::_('email.cloak', $this->imprint->technikemail).")" . '<br />';
}
if ($this->imprint->technikwebsite)
	echo JText::_( 'COM_IMPRINT_TECHNIKWEBSITE' ) . ' <a href="http://' . $this->imprint->technikwebsite . '" target="blank">' . $this->imprint->technikwebsite . '</a>';
?>
		</td>
	</tr>
</table>
<br />