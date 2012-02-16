<?php
/**
 * @version		3.1 $Id: view.html.php 20 2011-08-15 21:03:56Z mgebhardt $
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Impressum Reloaded Team
 * @license		GNU/GPL, see LICENSE.txt
 * Imprint is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.

 * Imprint is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Imprint; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Imprints view class.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.0
 */
class ImprintViewImprints extends JView
{
	/**
	 * Imprints view display method.
	 *  
	 * @author	mgebhardt
	 * @param	string	$tpl	The name of the template file to parse; automatically 
	 * 							searches through the template paths. 
	 * @since	3.0
	 */
	function display($tpl = null) 
	{
		// Get data from the model
		$items		= $this->get('Items');
		$pagination = $this->get('Pagination');
		$state		= $this->get('State');
		 
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view
		$this->items		= $items;
		$this->pagination	= $pagination;
		$this->state		= $state;
		$this->listOrder	= $this->state->get('list.ordering');
		$this->listDirn		= $this->state->get('list.direction');
		
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
		$canDo = ImprintHelper::getActions();
		JToolBarHelper::title(JText::_('COM_IMPRINT_IMPRINTS'), 'imprint');
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
		}
		JToolBarHelper::help('screen.imprint', true);
	}
	
	/**
	 * Method to set up the document properties
	 * 
	 * @author	mgebhardt
	 * @since	3.0
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_IMPRINT_ADMINISTRATION'));
	}
}