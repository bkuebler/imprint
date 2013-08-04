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
		if (task == 'remark.cancel' || document.formvalidator.isValid(document.id('remark-form')))
		{
			Joomla.submitform(task, document.getElementById('remark-form'));
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

<form action="<?php echo JRoute::_('index.php?option=com_imprint&view=remark&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="remark-form" class="form-validate form-horizontal">

<?php echo JLayoutHelper::render('joomla.edit.item_title', $this); ?>

<!-- Begin Banner -->
<div class="span10 form-horizontal">

	<fieldset>
		<div class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('name'); ?>
			</div>
			<div class="controls">
				<?php echo $this->form->getInput('name');?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('text'); ?>
			</div>
			<div class="controls">
				<?php echo $this->form->getInput('text');?>
			</div>
		</div>
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
					<?php echo JText::_('COM_IMPRINT_REMARK_TEXT_HINTS')?>
				</div>
			</div>
		</fieldset>
	</div>
	<!-- End Sidebar -->
</form>
