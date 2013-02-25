<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * 
 * @copyright   Copyright (C) 2011 - 2013 Team Imprint. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

definded('_JEXEC') or die;

?>
<h4><?php echo JText::_('JDETAILS'); ?></h4>
<hr />
<fieldset class="form-vertical">
	<div class="control-group">
		<div class="controls">
			<?php echo $this->form->getValue('name'); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo $this->form->getLabel('state'); ?>
		</div>
		<div class="controls">
			<?php echo $this->form->getValue('state'); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="control-label">
			<?php echo $this->form->getLabel('language'); ?>
		</div>
		<div class="controls">
			<?php echo $this->form->getValue('language'); ?>
		</div>
	</div>
</fieldset>