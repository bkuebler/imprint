<?php
/**
 * @version		3.5 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Impressum Reloaded Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

/**
 * Imprint controller class.
 *
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.0
 */
class ImprintController extends JController
{
	
	/**
	 * Typical view method for MVC based architecture
	 *  
	 * @author	mgebhardt
	 * @param	boolean		If true, the view output will be cached 
 	 * @return	JController	This object to support chaining. 
	 * @since	3.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
		// set default view if not set
		JRequest::setVar('view', ($view = JRequest::getCmd('view', 'cpanel')));
		
		// call parent behavior
		parent::display($cachable, $urlparams);
		
		// set the submenu
		if($view != 'cpanel')
			ImprintHelper::addSubmenu($view);
	}
}