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

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * Imprint helper class.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.0
 */
abstract class ImprintHelper
{
	
	/**
	 * Method to get user actions.
	 *  
	 * @author	mgebhardt
	 * @param	int		$id	The imprint id.
	 * @return	object	The action the user can do.
	 * @since	3.0
	 */
	public static function getActions($id = 0)
	{	
		jimport('joomla.access.access');
		$user	= JFactory::getUser();
		$result	= new JObject;
 
		if (empty($messageId)) {
			$assetName = 'com_imprint';
		}
		else {
			$assetName = 'com_imprint.imprint.'.(int) $messageId;
		}
 
		$actions = JAccess::getActions('com_imprint', 'component');
 
		foreach ($actions as $action) {
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}
 
		return $result;
	}
	
	/**
	 * Method to generate icons like in the Control Panel
	 * originally by Jan Pavelka (Phoca.cz)
	 *
	 * @author 	chris-schmidt
	 * @param	string	$link 	the target
	 * @param	string	$image 	the image name releative to assets folder
	 * @param	string	$text	the text to display
	 * @return 	object 	The complete icon with link & picture
	 * @since 	3.1
	 * 
	 */
	public static function quickIconButton($link, $image, $text)
	{
	
		$lang	= JFactory::getLanguage();
		$button = '';
		
		if ($lang->isRTL())
			$button .= '<div style="float:right;">';
		else
			$button .= '<div style="float:left;">';
		
		$button .=	'<div class="icon">'
			.'<a href="'.$link.'">'
			.JHTML::_('image.site',  $image, '../media/com_imprint/images/assets/', NULL, NULL, $text )
			.'<span>'.$text.'</span></a>'
			.'</div>';
		$button .= '</div>';
	
		return $button;
	}

	/**
	 * Read the Imprint Reloaded Version out of the XML-file
	 * 
	 * @return	boolean	false on error or if success
	 * 			string	the version string
	 * @author 	chris-schmidt
	 * @since	3.1
	 */
	public static function getVersion()
	{
		//TODO: get version form DB
		
		// Import filesystem libraries
		jimport('joomla.filesystem.folder');
	
		$folder = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_imprint';
		if (JFolder::exists($folder))
			$xmlFilesinDir = JFolder::files($folder, '.xml$');
		else
			return false;
	
		foreach ($xmlFilesinDir as $xmlfile)
			if ($data = JApplicationHelper::parseXMLInstallFile($folder.DS.$xmlfile))
				foreach ($data as $key => $value)
					if ($key == 'version')
						return $value;
		
		return false;
	}
	
	/**
	 * Adds the submenu to backend
	 * @param 	strin 	$view The current view name
	 * @author	mgebhardt
	 * @since	3.1
	 */
	public static function addSubmenu($view)
	{
		JSubMenuHelper::addEntry(JText::_('COM_IMPRINT_SUBMENU_CPANEL'), 'index.php?option=com_imprint&view=cpanel', $view == 'cpanel');
		JSubMenuHelper::addEntry(JText::_('COM_IMPRINT_SUBMENU_IMPRINTS'), 'index.php?option=com_imprint&view=imprints', $view == 'imprints');
		JSubMenuHelper::addEntry(JText::_('COM_IMPRINT_SUBMENU_REMARKS'), 'index.php?option=com_imprint&view=remarks', $view == 'remarks');
		JSubMenuHelper::addEntry(JText::_('COM_IMPRINT_SUBMENU_ABOUT'), 'index.php?option=com_imprint&view=about', $view == 'about');
	}
}