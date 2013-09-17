<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Imprint view class for Remarks.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * @since       4.0
 */
class ImprintViewRemarks extends JViewLegacy
{
	/**
	 * Display the Remarks View
	 *
	 * @param   string  $tpl  The special template name (default null)
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		JHTML::_('behavior.tooltip');

		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('\n', $errors));

			return false;
		}

		ImprintHelper::addSubmenu('remarks');

		$this->addToolBar();

		parent::display($tpl);
	}

	/**
	 * Add the pagetitle and toolbar
	 *
	 * @return  void
	 *
	 * @since   4.0
	 */
	protected function addToolBar()
	{
		$canDo = ImprintHelper::getActions();
		JToolBarHelper::title(JText::_('COM_IMPRINT') . ':' . JText::_('COM_IMPRINT_REMARKS'), 'remarks');

		if ($canDo->get('core.create'))
		{
			JToolBarHelper::addNew('remark.add', 'JTOOLBAR_NEW');
		}
		if ($canDo->get('core.edit'))
		{
			JToolBarHelper::editList('remark.edit', 'JTOOLBAR_EDIT');
		}
		if ($canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'remarks.delete', 'JTOOLBAR_DELETE');
		}

		JToolBarHelper::divider();

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_imprint');
			JToolBarHelper::divider();
		}

		JToolBarHelper::help('screen.imprint', true);
	}
}
