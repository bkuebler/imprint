<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Impressum
 * @copyright	(C) 2011 Impressum Reloaded Team
 * @license		GNU/GPL, see LICENSE.txt
 * Impressum is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.

 * Impressum is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Impressum; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>" >
		<td>
			<?php echo JHtml::_('grid.ID', $i, $item->id); ?>
		</td>
		<td class="center">
			<?php echo JHtml::_('jgrid.isdefault', $item->default, $i, 'impressen.', !$item->default);?>
		</td>
		<td>
			<a href="<?php echo JRoute::_('index.php?option=com_impressum&task=impressum.edit&id=' . $item->id); ?>">
				<?php echo $item->name; ?>
			</a>
		</td>
	</tr>
<?php endforeach; ?>