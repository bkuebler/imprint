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
 * @author		mgebhardt
 */
class ImprintViewImprints extends JViewLegacy
{
	/**
	 * All imprints to list
	 * @var 	array
	 * @since	4.0
	 * @author	mgebhardt
	 */
	protected $items;

	/**
	 * Used for pagination
	 * @var		Joomla's pagination object
	 * @since	4.0
	 * @author	mgebhardt
	 */
	protected $pagination;

	/**
	 * Used for state
	 * @var 	Joomla's state object
	 * @since	4.0
	 * @author 	mgebhardt
	 */
	protected $state;

	/**
	 * Display the Imprints View
	 *
	 * @param   string  $tpl  The special template name (default null)
	 *
	 * @return  void
	 * @since	4.0
	 * @author	mgebhardt
	 */
	public function display($tpl = null)
	{
		JHtml::_('behavior.tooltip');

		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state		= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		ImprintHelper::addSubmenu('imprints');

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
		JToolBarHelper::title(JText::_('COM_IMPRINT') . ':' . JText::_('COM_IMPRINT_IMPRINTS'), 'imprints');

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
