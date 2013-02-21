<?php
/**
 * @package     Joomla.Site
 * @subpackage	com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Imprint View class für the Imprint component.
 * 
 * @package     Joomla.Site
 * @subpackage  com_imprint
 * @since       3.0
 */
class ImprintViewImprint extends JViewLegacy
{
	protected $state = null;

	protected $items = null;
	protected $params;
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
		$state		= $this->get('State');
		$params		= $app->getParams();
		$imprint	= $this->get('Imprint');
		$id			= $this->get('Id');
		
		// Load the css
		$document	= JFactory::getDocument();
		$document->addStyleSheet(JURI::root() . 'media/com_imprint/css/com_imprint.css');
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));

			return false;
		}
		
//        $this->imprint = $imprint;
//        $this->id = $id;
//        $this->default = $id == 0;

		$this->params = &$params;

		$this->_prepareDocument();

		parent::display($tpl);
	}
	
	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app		= JFactory::getApplication();
		$menus		= $app->getMenu();
		$pathway	= $app->getPathway();
		$title		= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if ($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		}
		else 
		{
			$this->params->def('page_heading', JText::_('COM_IMPRINT_DEFAULT_PAGE_TITLE'));
		}

		// Check for empty title and add site name if param is set
		$title = $this->params->get('page_title', '');
		if (empty($title))
		{
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1)
		{
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2)
		{
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
