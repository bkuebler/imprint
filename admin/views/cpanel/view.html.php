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
 * Imprint view class for CPanel.
 * 
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * @since       4.0
 */
class ImprintViewCPanel extends JViewLegacy
{
	/**
	 * Display the CPanel View
	 * 
	 * @param   string  $tpl  The special template name (default null)
	 * 
	 * @return void
	 */
	public function display($tpl = null)
	{
		JHTML::_('behavior.tooltip');
		JHTML::stylesheet(JUri::root() . 'media/com_imprint/css/com_imprint.css');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('\n', $errors));

			return false;
		}

		$this->addToolBar();

		parent::display($tpl);
	}

	/**
	 * Add the pagetitle and toolbar.
	 *  
	 * @return void
	 * 
	 * @since	4.0
	 */
	protected function addToolBar()
	{
		$canDo = ImprintHelper::getActions();
		JToolBarHelper::title(JText::_('COM_IMPRINT_CPANEL_TITLE'), 'cpanel');

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_imprint');
			JToolBarHelper::divider();
		}

		JToolBarHelper::help('screen.imprint', true);
	}
}
