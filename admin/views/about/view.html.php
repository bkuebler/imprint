<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Impressum
 * @copyright	(C) 2011 Impressum Reloaded Team
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
 * Impressum view clss.
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
class ImpressumViewAbout extends JView
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
	 * @since	3.0
	 */
	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('COM_IMPRESSUM').' - '.JText::_('COM_IMPRESSUM_ABOUT'), 'about');
		JToolBarHelper::cancel('impressum.cancel', 'JTOOLBAR_CLOSE');
		JToolBarHelper::divider();
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
		$document->setTitle(JText::_('COM_IMPRESSUM_ADMINISTRATION'));
	}
}