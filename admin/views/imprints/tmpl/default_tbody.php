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
			<tbody>
			<?php
			foreach ($this->items as $i => $item)
			{
				$ordering  = ($listOrder == 'ordering');
				$item->cat_link = JRoute::_('index.php?option=com_categories&extension=com_imprint&task=edit&type=other&cid[]=' . $item->catid);
				$canCreate  = $user->authorise('core.create',     'com_banners.category.' . $item->catid);
				$canEdit    = $user->authorise('core.edit',       'com_banners.category.' . $item->catid);
				$canCheckin = $user->authorise('core.manage',     'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
				$canChange  = $user->authorise('core.edit.state', 'com_banners.category.' . $item->catid) && $canCheckin;
				?>
				<tr class="row<?php echo $i % 2; ?>" sortable-group-id="<?php echo $item->catid?>">
					<td class="order nowrap center hidden-phone">
					<?php 
						if ($canChange)
						{
							$disableClassName = '';
							$disabledLabel	  = '';

							if (!$saveOrder)
							{
								$disabledLabel    = JText::_('JORDERINGDISABLED');
								$disableClassName = 'inactive tip-top';
							}

							echo '<span class="sortable-handler hasTooltip ' . $disableClassName . '" title="' . $disabledLabel . '">'
								. '<i class="icon-menu"></i></span>' . '<input type="text" style="display:none" name="order[]" size="5"'
								. 'value="' . $item->ordering . '" class="width-20 text-area-order " />';
						}
						else
						{
							echo '<span class="sortable-handler inactive" ><i class="icon-menu"></i></span>';
						}
						?>
					</td>
					<td class="center hidden-phone">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
					</td>
					<td class="center">
						<?php echo JHtml::_('jgrid.published', $item->state, $i, 'remarks.', $canChange, 'cb', $item->publish_up, $item->publish_down); ?>
					</td>
					<td class="nowrap has-context">
						<div class="pull-left">
							<?php 
								if ($item->checked_out)
								{
									echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'remarks.', $canCheckin);
								}

								if ($canEdit)
								{
									echo '<a href="' . JRoute::_('index.php?option=com_imprint&task=imprint.edit&id=' . (int) $item->id) . '">'
										. $this->escape($item->name) . '</a>';
								}
								else
								{
									echo $this->escape($item->name);
								}
								?>
							<div class="small">
								<?php echo $this->escape($item->category_title); ?>
							</div>
						</div>
						<div class="pull-left">
							<?php
								JHtml::_('dropdown.edit', $item->id, 'remarks.');
								JHtml::_('dropdown.divider');

								if ($item->state)
								{
									JHtml::_('dropdown.unpublish', 'cb' . $i, 'banners.');
								}
								else
								{
									JHtml::_('dropdown.publish', 'cb' . $i, 'banners.');
								}

								JHtml::_('dropdown.divider');

								if ($archived)
								{
									JHtml::_('dropdown.unarchive', 'cb' . $i, 'banners.');
								}
								else
								{
									JHtml::_('dropdown.archive', 'cb' . $i, 'banners.');
								}

								if ($item->checked_out)
								{
									JHtml::_('dropdown.checkin', 'cb' . $i, 'banners.');
								}

								if ($trashed)
								{
									JHtml::_('dropdown.untrash', 'cb' . $i, 'remarks.');
								}
								else
								{
									JHtml::_('dropdown.trash', 'cb' . $i, 'remarks.');
								}

								echo JHtml::_('dropdown.render');
								?>
						</div>
					</td>
					<td class="center small hidden-phone">
						<?php echo JHtml::_('jgrid.isdefault', $item->default, $i, 'imprints.', !$item->default);?>
					</td>
					<td class="small nowrap hidden-phone">
						<?php
							echo $language;

							if ($item->language == '*')
							{
								echo JText::alt('JALL', 'language');
							}
							else
							{
								echo $item->language_title ? $this->escape($item->language_title) : JText::_('JUNDEFINED');
							}
						?>
					</td>
					<td class="center hidden-phone">
						<?php echo $item->id; ?>
					</td>
				</tr>
				<?php 
			}
			?>
			</tbody>