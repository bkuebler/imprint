<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Impressum Reloaded Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$params = $this->form->getFieldsets('params');
?>
<form action="<?php echo JRoute::_('index.php?option=com_imprint&view=imprint&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="imprint-form" class="form-validate">
	<div class="width-60 fltlft">
		<?php echo JHtml::_($this->presentation_style . '.start', 'imprint-' . $this->presentation_style); ?>
<?php foreach ($this->form->getFieldsets() as $name => $fieldset): ?>
	<?php if (substr($name, 0, 6) == 'params') continue; ?>
		<?php echo JHtml::_($this->presentation_style . '.panel', JText::_($fieldset->label), $name); ?>
		<fieldset class="adminform">
			<ul class="adminformlist">
	<?php foreach($this->form->getFieldset($name) as $field): ?>
				<li><?php echo $field->label;echo $field->input;?></li>
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
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>