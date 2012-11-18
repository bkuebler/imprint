<?php
/**
 * @version		3.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>" >
		<td>
			<?php echo JHtml::_('grid.ID', $i, $item->id); ?>
		</td>
		<td>
			<a href="<?php echo JRoute::_('index.php?option=com_imprint&task=remark.edit&id=' . $item->id); ?>">
				<?php echo $item->name; ?>
			</a>
		</td>
		<td class="center">
			<?php echo $item->id; ?>
		</td>
	</tr>
<?php endforeach; ?>