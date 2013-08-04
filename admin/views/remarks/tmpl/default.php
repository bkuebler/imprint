<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');

$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$params		= (isset($this->state->params)) ? $this->state->params : new JObject;
?>
<form action="<?php echo JRoute::_('index.php?option=com_imprint&view=remarks'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-sidebar-container" class="span2"><?php echo JHtmlSidebar::render(); ?></div>
	<div id="j-main-container" class="span10">
		<div id="filter-bar" class="btn-toolbar">
			<div class="filter-search btn-group pull-left">
				<label for="filter_search" class="element-invisible"><?php echo JText::_('COM_IMPRINT_SEARCH_IN_TITLE');?></label>
				<input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('COM_IMPRINT_SEARCH_IN_TITLE'); ?>" />
			</div>
			<div class="btn-group pull-left">
				<button type="submit" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
				<button type="button" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
			</div>
			<div class="btn-group pull-right hidden-phone">
				<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
				<?php echo $this->pagination->getLimitBox(); ?>
			</div>
		</div>
		<div class="clearfix"> </div>
		<table class="table table-striped" id="imprintsList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<?php echo JHtml::_('grid.checkall'); ?>
					</th>
					<th>
						<?php echo JHtml::_('grid.sort', 'COM_IMPRINT_REMARKS_HEADING_NAME', 'name', $listDirn, $listOrder); ?>
					</th>
					<th width="1%" class="nowrap center hidden-phone">
						<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'id', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="3">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php foreach ($this->items as $i => $item) :
				$canCreate  = $user->authorise('core.create',     'com_imprint');
				$canEdit    = $user->authorise('core.edit',       'com_imprint');
				$canChange  = $user->authorise('core.edit.state', 'com_imprint');
				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center hidden-phone">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
					</td>
					<td class="nowrap has-context">
						<div class="pull-left">
							<?php if ($canEdit) : ?>
								<a href="<?php echo JRoute::_('index.php?option=com_imprint&task=remark.edit&id='.(int) $item->id); ?>">
									<?php echo $this->escape($item->name); ?></a>
							<?php else : ?>
								<?php echo $this->escape($item->name); ?>
							<?php endif; ?>
						</div>
						<div class="pull-left">
							<?php
								// Create dropdown items
								JHtml::_('dropdown.edit', $item->id, 'remark.');

								// render dropdown list
								echo JHtml::_('dropdown.render');
							?>
						</div>
					</td>
					<td class="center hidden-phone">
						<?php echo $item->id; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
