<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * 
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.choosen', 'select');

// $params = $this->form->getFieldsets('params');

echo $this->loadTemplate('jscript');
?>
id (int) $this->item->id

<form action="<?php echo JRoute::_('index.php?option=com_imprint&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="imprint-form" class="form-validate form-horizontal">
	<div class="span10 form-horizontal">
		<fieldset>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#details" data-toggle="tab"><?php echo JText::_(''); ?></a></li>
				</ul>
		</fieldset>
		<?php echo JHtml::_($this->presentation_style . '.start', 'imprint-' . $this->presentation_style); ?>
<?php foreach ($this->form->getFieldsets() as $name => $fieldset): ?>
	<?php if (substr($name, 0, 6) == 'params') continue; ?>
	<?php echo JHtml::_($this->presentation_style . '.panel', JText::_($fieldset->label), $name); ?>
		<fieldset class="adminform">
			<ul class="adminformlist">
	<?php foreach($this->form->getFieldset($name) as $field): ?>
		<?php if($field->type == 'Editor'):?>
				<div class="clr"></div>
				<?php echo $field->label; ?>
				<div class="clr"></div>
				<?php echo $field->input; ?>
		<?php else:?>
				<li><?php echo $field->label;echo $field->input;?></li>
		<?php endif; ?>
	<?php endforeach; ?>
			</ul>
		</fieldset>
<?php endforeach; ?>
		<?php echo JHtml::_($this->presentation_style . '.end'); ?>
	</div>

	<div class="width-40 fltrt">
		<?php echo JHtml::_('sliders.start', 'imprint-sliders'); ?>

<?php foreach ($params as $name => $fieldset): ?>
		<?php echo JHtml::_('sliders.panel', JText::_($fieldset->label), $name.'-params');?>
	<?php if (isset($fieldset->description) && trim($fieldset->description)): ?>
		<p class="tip"><?php echo $this->escape(JText::_($fieldset->description));?></p>
	<?php endif;?>
		<fieldset class="panelform" >
			<ul class="adminformlist">
	<?php foreach ($this->form->getFieldset($name) as $field) : ?>
				<li><?php echo $field->label; ?><?php echo $field->input; ?></li>
	<?php endforeach; ?>
			</ul>
		</fieldset>
<?php endforeach; ?>

		<?php echo JHtml::_('sliders.end'); ?>
	</div>
	<div>
		<input type="hidden" name="option" value="com_imprint" />
		<input type="hidden" name="view" value="imprint" />
		<input type="hidden" name="layout" value="edit" />
		<input type="hidden" name="id" value="<?php echo (int) $this->item->id;?>" />
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	<div class="span2">
		<?php echo $this->loadTemplate('sidebar'); ?>
	</div>
</form>