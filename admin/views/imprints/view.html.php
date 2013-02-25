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
 * Imprint view class for Imprints.
 * 
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * @since       4.0
 */
class ImprintViewImprints extends JViewLegacy
{
	/**
	 * Display the Imprints View
	 *  
	 * @param   string  $tpl  The special template name (default null)
	 * 
	 * @return  void
	 */
	public function display($tpl = null)
	{
		JHtml::_('behavior.tooltip');

		// Get data from the model
		$items		= $this->get('Items');
		$pagination = $this->get('Pagination');
		$state		= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('\n', $errors));

			return false;
		}

		// Assign data to the view
		$this->items		= $items;
		$this->pagination	= $pagination;
		$this->state		= $state;
		$this->listOrder	= $this->state->get('list.ordering');
		$this->listDirn		= $this->state->get('list.direction');

		$this->addToolBar();

		parent::display($tpl);
	}

	/**
	 * Add the pagetitle and toolbar
	 *  
	 * @return  void
	 * 
	 * @since	4.0
	 */
	protected function addToolBar()
	{
		$canDo = ImprintHelper::getActions();
		JToolBarHelper::title(JText::_('COM_IMPRINT_IMPRINTS_TITLE'), 'imprints');

		if ($canDo->get('core.create'))
		{
			JToolBarHelper::addNew('imprint.add', 'JTOOLBAR_NEW');
		}
		if ($canDo->get('core.edit'))
		{
			JToolBarHelper::editList('imprint.edit', 'JTOOLBAR_EDIT');
		}
		if ($canDo->get('core.edit.state'))
		{
			JToolBarHelper::makeDefault('imprints.setDefault', 'COM_IMPRINT_IMPRINTS_TOOLBAR_SET_DEFAULT');
		}
		if ($canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'imprints.delete', 'JTOOLBAR_DELETE');
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
