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
 * Imprint view clss.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.0
 */
class ImprintViewImprint extends JView
{
	
	/**
	 * Imprint view display method.
	 *  
	 * @author	mgebhardt
	 * @param	string	$tpl	The name of the template file to parse; automatically 
	 * 							searches through the template paths. 
	 * @since	3.0
	 */
	function display($tpl = null) 
	{
		// get the Data
		$form 	= $this->get('Form');
		$item 	= $this->get('Item');
		$script = $this->get('Script');
		$params = JComponentHelper::getParams('com_imprint');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form 				= $form;
		$this->item 				= $item;
		$this->script 				= $script;
		$this->presentation_style	= $params->get('presentation_style') == '' ? 'tabs' : $params->get('presentation_style');

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
	 * @since	3.0
	 */
	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		
		$user = JFactory::getUser();
		$userId = $user->id;
		$isNew = $this->item->id == 0;
		$canDo = ImprintHelper::getActions($this->item->id);
		
		JToolBarHelper::title($isNew ? JText::_('COM_IMPRINT').' - '.JText::_('COM_IMPRINT_IMPRINT_NEW') : JText::_('COM_IMPRINT').' - '.JText::_('COM_IMPRINT_IMPRINT_EDIT'), 'imprint');
		
		// Built the actions for new and existing records.
		if ($isNew) 
		{
			// For new records, check the create permission.
			if ($canDo->get('core.create')) 
			{
				JToolBarHelper::apply('imprint.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('imprint.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('imprint.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('imprint.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			if ($canDo->get('core.edit'))
			{
				// We can save the new record
				JToolBarHelper::apply('imprint.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('imprint.save', 'JTOOLBAR_SAVE');
 
				// We can save this record, but check the create permission to see if we can return to make a new one.
				if ($canDo->get('core.create')) 
				{
					JToolBarHelper::custom('imprint.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}
			if ($canDo->get('core.create')) 
			{
				JToolBarHelper::custom('imprint.save2new', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
			}
			JToolBarHelper::cancel('imprint.cancel', 'JTOOLBAR_CLOSE');
		}
		JToolBarHelper::divider();
		JToolBarHelper::help('screen.imprint', true);
	}
	
	/**
	 * Method to set up the document properties.
	 * 
	 * @author	mgebhardt
	 * @since 3.0
	 */
	protected function setDocument() 
	{
		$isNew = $this->item->id == 0;
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_IMPRINT').' - '.JText::_('COM_IMPRINT_IMPRINT_CREATING') : JText::_('COM_IMPRINT').' - '.JText::_('COM_IMPRINT_IMPRINT_EDITING'));
		$document->addScript(JURI::root() . $this->script);
	}
}