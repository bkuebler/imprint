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
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$params = $this->form->getFieldsets('params');
?>
<form action="<?php echo JRoute::_('index.php?option=com_impressum&view=impressum&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="impressum-form" class="form-validate">
	<div class="width-60 fltlft">
<?php foreach ($this->form->getFieldsets() as $name => $fieldset): ?>
<?php if (substr($name, 0, 6) == 'params') continue; ?>
		<fieldset class="adminform">
			<legend><?php echo JText::_($fieldset->label); ?></legend>
			<ul class="adminformlist">
<?php foreach($this->form->getFieldset($name) as $field): ?>
				<li><?php echo $field->label;echo $field->input;?></li>
<?php endforeach; ?>
			</ul>
		</fieldset>
<?php endforeach; ?>	
	</div>

	<div class="width-40 fltrt">
		<?php echo JHtml::_('sliders.start', 'projektwoche-slider'); ?>

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