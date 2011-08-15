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
 * Disclaimer view class.
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
class ImpressumViewDisclaimer extends JView
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
		$this->id = $this->get('Id');
		$this->siteName = $this->get('SiteName');
		
		// Check for errors.
        if (count($errors = $this->get('Errors'))) 
        {
	        JError::raiseError(500, implode('<br />', $errors));
	        return false;
        }
		
		parent::display($tpl);
	}
}
