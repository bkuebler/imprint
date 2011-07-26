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

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Script file of Impressum component.
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
class com_impressumInstallerScript
{
	/**
	 * Method to install the component.
	 * 
	 * @author	mgebhardt
	 * @param	object	$parent	Is the class calling this method.
	 * @since	3.0
	 */
	function install($parent) 
	{
		$app	= JFactory::getApplication();
		$app->enqueueMessage(JText::_('COM_IMPRESSUM_INSTALL_TEXT'));
		
		$parent->getParent()->setRedirectURL('index.php?option=com_impressum');
	}
 
	/**
	 * Method to uninstall the component.
	 * 
	 * @author	mgebhardt
	 * @param	object	$parent	Is the class calling this method.
	 * @since	3.0
	 */
	function uninstall($parent) 
	{
		$app	= JFactory::getApplication();
		$app->enqueueMessage(JText::_('COM_IMPRESSUM_UNINSTALL_TEXT'));
	}
 
	/**
	 * Method to update the component.
	 * 
	 * @author	mgebhardt
	 * @param	object	$parent	Is the class calling this method.
	 * @since	3.0
	 */
	function update($parent) 
	{
		$app	= JFactory::getApplication();
		$app->enqueueMessage(JText::_('COM_IMPRESSUM_UPDATE_TEXT'));
	}
 
	/**
	 * Method to run before an install/update/uninstall method.
	 * 
	 * @author	mgebhardt
	 * @param	object	$parent	Is the class calling this method.
	 * @param	string	$type	Is the type of change (install, update or discover_install).
	 * @since	3.0
	 */
	// Not used.
// 	function preflight($type, $parent) 
// 	{
// 		echo '<p>' . JText::_('COM_IMPRESSUM_PREFLIGHT_' . $type . '_TEXT') . '</p>';
// 	}
 
	/**
	 * Method to run after an install/update/uninstall method.
	 * 
	 * @author	mgebhardt
	 * @param	string	$type	Is the type of change (install, update or discover_install).
	 * @param	object	$parent	Is the class calling this method.
	 * @since	3.0
	 */
	// Not used.
// 	function postflight($type, $parent) 
// 	{
// 		echo '<p>' . JText::_('COM_IMPRESSUM_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
// 	}
}