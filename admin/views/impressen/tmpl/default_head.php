<?php
/**
 * @version		3.0 $Id$
 * @package		Joomla
 * @subpackage	Impressum
 * @copyright	(C) 2011 Mathias Gebhardt
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
<tr>
        <th width="1%">
                <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
        </th>                     
        <th width="5%">
                <?php echo JHtml::_('grid.sort',  'COM_IMPRESSUM_IMPRESSEN_AKTIV', 'aktiv', $this->listDirn, $this->listOrder); ?>
        </th>
        <th>
                <?php echo JHtml::_('grid.sort',  'COM_IMPRESSUM_IMPRESSEN_NAME', 'name', $this->listDirn, $this->listOrder); ?>
        </th>
</tr>

