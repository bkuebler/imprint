<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * 
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . 'helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.choosen', 'select');

$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$canOrder	= $user->authorise('core.edit.state', 'com_imprint.category');
$archived	= $this->state->get('filter.published') == 2 ? true : false;
$trashed	= $this->state->get('filter.published') == -2 ? true : false;
$params		= (isset($this->state->params)) ? $this->state->params : new JObject;
$saveOrder	= $listOrder == 'ordering';

if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_imprint&task=remarks.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'articleList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}

$sortFields = $this->getSortFields();

echo $this->loadTemplate('jscript');
?>
<form action="<?php echo JRoute::_('index.php?option=com_imprint'); ?>" method="post" name="adminForm" id="adminForm">
<?php 
if (!empty( $this->sidebar))
{
	echo '<div id="j-sidebar-container" class="span2">';
	echo $this->sidebar;
	echo '</div>';
	$addStyle	= 'span10';
}
else
{
	$addStyle	= '';
}
?>
	<div id="j-main-container" class="<?php echo $addStyle; ?>">
		<?php $this->loadTemplate('fbar'); ?>
		<div class="clearfix"> </div>
		<table class="table table-striped" id="articleList">
			<?php $this->loadTemplate('thead'); ?>
			<?php $this->loadTemplate('tfoot'); ?>
			<?php $this->loadTemplate('tbody'); ?>
		</table>
		<?php echo $this->pagination->getListFooter(); ?>
		<?php echo $this->loadTemplate('batch'); ?>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="view" value="remarks" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>