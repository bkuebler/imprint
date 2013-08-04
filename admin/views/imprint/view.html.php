<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('ImprintHelper', JPATH_COMPONENT . '/helpers/imprint.php');

/**
 * Imprint view class to edit Imprint.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * @since       4.0
 * @author		mgebhardt
 */
class ImprintViewImprint extends JViewLegacy
{
	protected $form;

	protected $item;

	protected $state;

	protected $params;

	protected $script;

	/**
	 * Display the Imprint edit view.
	 *
	 * @param   string  $tpl  The special template name (default null).
	 *
	 * @return  void
	 */
	public function display($tpl = null)
	{
		// Initialize variables.
		$this->form		= $this->get('Form');
		$this->item 	= $this->get('Item');
		$this->state	= $this->get('State');
		$this->script	= $this->get('Script');
		$this->params	= JComponentHelper::getParams('com_imprint');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('\n', $errors));

			return false;
		}

		// Add the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Add the pagetitle and toolbar.
	 *
	 * @return  void
	 *
	 * @since	4.0
	 */
	protected function addToolBar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);

		$user		= JFactory::getUser();
		$userId		= $user->get('id');
		$isNew		= ($this->item->id == 0);
		$canDo		= ImprintHelper::getActions($this->item->id, 0);

		JToolBarHelper::title($isNew ? JText::_('COM_IMPRINT_IMPRINT_NEW') : JText::_('COM_IMPRINT_IMPRINT_EDIT'), 'imprint');

		// If not checked out, can save the item.
		if ($canDo->get('core.edit') || count($user->getAuthorizedCategories('com_imprint', 'core.create')) > 0)
		{
			JToolBarHelper::apply('imprint.apply');
			JToolBarHelper::save('imprint.save');

			// If new item, show create.
			if ($canDo->get('core.create'))
			{
				JToolBarHelper::save2new('imprint.save2new');
			}
		}

		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create'))
		{
			JToolBarHelper::save2copy('imprint.save2copy');
		}

		if (empty($this->item->id))
		{
			JToolBarHelper::cancel('imprint.cancel');
		}
		else
		{
			JToolBarHelper::cancel('imprint.cancel', 'JTOOLBAR_CLOSE');
		}

		JToolBarHelper::divider();
		JToolBarHelper::help('screen.imprint', true);
	}
}
