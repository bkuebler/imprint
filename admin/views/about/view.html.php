<?php
/**
 * @version		3.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * About view clss.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.1
 */
class ImprintViewAbout extends JView
{

	function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		$script = $this->get('Script');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form = $form;
		$this->item = $item;
		$this->script = $script;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}
	
	/**
	 * Method to create the toolbar.
	 *  
	 * @author	mgebhardt
	 * @since	3.1
	 */
	protected function addToolBar() 
	{
		$canDo = ImprintHelper::getActions();
		JToolBarHelper::title(JText::_('COM_IMPRINT').' - '.JText::_('COM_IMPRINT_ABOUT'), 'about');
		JToolBarHelper::divider();
		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_imprint');
		}
		JToolBarHelper::help('screen.imprint', true);
	}
	
	/**
	* Method to set up the document properties
	*
	* @author	mgebhardt
	* @since	3.1
	*/
	protected function setDocument()
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_IMPRINT_ADMINISTRATION'));
	}
}