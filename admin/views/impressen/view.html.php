<?php
/**
 * @version		3.0 $Id$
 * @package		Joomla
 * @subpackage	Impressum
 * @copyright	(C) 2011 Mathias Gebhardt
 * @license		GNU/GPL, see LICENSE.txt
 * Impressum is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.

 * Impressum is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Impressum; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Impressen view class.
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
class ImpressumViewImpressen extends JView
{
	/**
	 * Impressen view display method.
	 * 
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
	* @since	3.0
	*/
	protected function addToolBar() 
	{
		$canDo = ImpressumHelper::getActions();
		JToolBarHelper::title(JText::_('COM_IMPRESSUM_IMPRESSEN'), 'impressum');
		if ($canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('impressum.add', 'JTOOLBAR_NEW');
		}
		if ($canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('impressum.edit', 'JTOOLBAR_EDIT');
		}
		if ($canDo->get('core.edit.state')) 
		{
			JToolBarHelper::makeDefault('impressen.setDefault', 'COM_IMPRESSUM_IMPRESSEN_TOOLBAR_SET_AKTIV');
		}
		if ($canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'impressen.delete', 'JTOOLBAR_DELETE');
		}
		if ($canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_impressum');
		}
	}
	
	/**
	 * Method to set up the document properties
	 *
	 * @since	3.0
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_IMPRESSUM_ADMINISTRATION'));
	}
}