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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.view');

/**
 * Impressum view class.
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
class ImpressumViewImpressum extends JView
{
	
	/**
	 * Execute and display a template script.
	 *  
	 * @author	mgebhardt
	 * @param	string	The name of the template file to parse; automatically 
	 * 					searches through the template paths.
	 * @since	3.0
	 */
	function display($tpl = null)
	{
		$app		= JFactory::getApplication();
		$params		= $app->getParams();
		$impressum	= $this->get('Impressum');
		$id			= $this->get('Id');
		
		// Load the css
		$document	= JFactory::getDocument();
		$document->addStyleSheet(JURI::root() . 'media/com_impressum/css/com_impressum.css');
		
		// Check for errors.
        if (count($errors = $this->get('Errors'))) 
        {
	        JError::raiseError(500, implode('<br />', $errors));
	        return false;
        }
		
        $this->impressum = $impressum;
        $this->id = $id;
        $this->default = $id == 0;
        $this->params = $params;

        $this->setDocument();
        
		parent::display($tpl);
	}
	
	/**
	 * Prepares the document
	 * 
	 * @author	mgebhardt
	 * @since	3.0
	 */
	protected function setDocument()
	{
		$app		= JFactory::getApplication();
		$menus		= $app->getMenu();
		$pathway	= $app->getPathway();
		$title 		= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();

		if ($menu) {
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		}
		else {
			$this->params->def('page_heading', JText::_('COM_IMPRESSUM_DEFAULT_PAGE_TITLE'));
		}

		$title = $this->params->get('page_title', '');

		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}

 		$this->document->setTitle($title);
 		
 		if ($this->params->get('menu-meta_description'))
 		{
 			$this->document->setDescription($this->params->get('menu-meta_description'));
 		}
 		
 		if ($this->params->get('menu-meta_keywords'))
 		{
 			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
 		}
 		
 		if ($this->params->get('robots'))
 		{
 			$this->document->setMetadata('robots', $this->params->get('robots'));
 		}
	}
}
