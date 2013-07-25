<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * 
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<form action="<?php echo JRoute::_('index.php?option=com_imprint'); ?>" method="post" name="adminForm">
        <table class="adminlist">
                <thead><?php echo $this->loadTemplate('thead');?></thead>
                <tfoot><?php echo $this->loadTemplate('tfoot');?></tfoot>
                <tbody><?php echo $this->loadTemplate('tbody');?></tbody>
        </table>
        <div>
        		<input type="hidden" name="view" value="imprints" />
                <input type="hidden" name="task" value="" />
                <input type="hidden" name="boxchecked" value="0" />
                <input type="hidden" name="filter_order" value="<?php echo $this->listOrder; ?>" />
				<input type="hidden" name="filter_order_Dir" value="<?php echo $this->listDirn; ?>" />
                <?php echo JHtml::_('form.token'); ?>
        </div>
</form>
