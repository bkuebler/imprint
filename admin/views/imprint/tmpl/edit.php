<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$params = $this->form->getFieldsets('params');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'imprint.cancel' || document.formvalidator.isValid(document.id('imprint-form')))
		{
			Joomla.submitform(task, document.getElementById('imprint-form'));
		}
	}
	window.addEvent('domready', function()
	{
		document.id('jform_type0').addEvent('click', function(e){
			document.id('image').setStyle('display', 'block');
			document.id('url').setStyle('display', 'block');
			document.id('custom').setStyle('display', 'none');
		});
		document.id('jform_type1').addEvent('click', function(e){
			document.id('image').setStyle('display', 'none');
			document.id('url').setStyle('display', 'block');
			document.id('custom').setStyle('display', 'block');
		});
		if (document.id('jform_type0').checked==true)
		{
			document.id('jform_type0').fireEvent('click');
		}
		else
		{
			document.id('jform_type1').fireEvent('click');
		}
	});
</script>

<form action="<?php echo JRoute::_('index.php?option=com_imprint&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="imprint-form" class="form-validate form-horizontal">

<?php echo JLayoutHelper::render('joomla.edit.item_title', $this); ?>

<!-- Begin Banner -->
<div class="span10 form-horizontal">

	<fieldset>
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'misc')); ?>

		<?php foreach ($this->form->getFieldsets() as $name => $fieldset): ?>
			<?php if (substr($name, 0, 6) == 'params') continue; ?>

			<?php echo JHtml::_('bootstrap.addTab', 'myTab', $name, JText::_($fieldset->label, true)); ?>

			<?php foreach($this->form->getFieldset($name) as $field): ?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $field->label ?>
					</div>
					<div class="controls">
						<?php echo $field->input;?>
					</div>
				</div>
			<?php endforeach; ?>

			<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php endforeach; ?>

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</fieldset>

	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	</div>
	<!-- End Newsfeed -->
	<!-- Begin Sidebar -->
	<div class="span2">
		<h4><?php echo JText::_('JDETAILS');?></h4>
		<hr />
		<fieldset class="form-vertical">
			<div class="control-group">
				<div class="controls">
					<?php echo $this->form->getValue('name'); ?>
				</div>
			</div>

			<?php foreach ($params as $name => $fieldset): ?>

				<?php foreach ($this->form->getFieldset($name) as $field) : ?>
					<div class="control-group">
						<div class="control-label">
							<?php echo $field->label ?>
						</div>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					</div>
				<?php endforeach; ?>

			<?php endforeach; ?>

		</fieldset>
	</div>
	<!-- End Sidebar -->
</form>
