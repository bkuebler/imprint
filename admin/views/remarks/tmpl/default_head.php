<?php
/**
 * @version		3.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<tr>
	<th width="1%">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>                     
	<th>
		<?php echo JHtml::_('grid.sort',  'COM_IMPRINT_REMARKS_NAME', 'name', $this->listDirn, $this->listOrder); ?>
	</th>
	<th width="1%" class="nowrap">
		<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'id', $this->listDirn, $this->listOrder); ?>
	</th>
</tr>

