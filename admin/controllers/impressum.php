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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.controllerform' );

/**
 * Impressum controller class.
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
class ImpressumControllerImpressum extends JControllerForm
{
	
	/** 
	 * @var		string	The URL view list variable.
	 * @since	3.0
	 */
	protected $view_list = 'impressen';
	
//	function cancel($key = null)
//	{
//		
//		
//		return parent::cancel($key);
//	}
//	
//	function save($key = null, $urlVar = null)
//	{
//		$this->view_list = 'impressen';
//		
//		return parent::save($key, $urlVar);
//	}
	
}