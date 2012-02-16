<?php
/**
 * @version		3.5 $Id$
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