<?php
/**
 * @version		3.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$params = $this->form->getFieldsets('params');
?>
<form action="<?php echo JRoute::_('index.php?option=com_imprint&view=remark&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="imprint-form" class="form-validate">
	<div class="width-80 fltlft">
		<fieldset class="adminform">
			<legend><?php echo JText::_('JDETAILS'); ?></legend>
			<ul class="adminformlist">
				<li><?php echo $this->form->getLabel('name');echo $this->form->getInput('name');?></li>
			</ul>
			<div class="clr"></div>
			<?php echo $this->form->getLabel('text'); ?>
			<div class="clr"></div>
			<?php echo $this->form->getInput('text'); ?>
		</fieldset>
	</div>
	<div class="width-20 fltrt">
		<?php echo JText::_('COM_IMPRINT_REMARK_TEXT_HINTS')?>
	</div>
	<div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>