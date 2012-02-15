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

/**
 * Impressum helper class.
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
abstract class ImpressumHelper
{
	
	/**
	 * Method to get user actions.
	 *  
	 * @author	mgebhardt
	 * @param	int		$id	The impressum id.
	 * @return	object	The action the user can do.
	 * @since	3.0
	 */
	public static function getActions($id = 0)
	{	
		jimport('joomla.access.access');
		$user	= JFactory::getUser();
		$result	= new JObject;
 
		if (empty($messageId)) {
			$assetName = 'com_impressum';
		}
		else {
			$assetName = 'com_impressum.impressum.'.(int) $messageId;
		}
 
		$actions = JAccess::getActions('com_impressum', 'component');
 
		foreach ($actions as $action) {
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}
 
		return $result;
	}
	
	//TODO: Beschreibung noch ergänzen
	/**
	 * Method to generate icons like in the Control Panel
	 * originally by Jan Pavelka (Phoca.cz)
	 *
	 * @author chris-schmidt
	 * @return object The complete icon with link & picture
	 * @since 3.1
	 * 
	 */
	public static function quickIconButton( $link, $image, $text ) {
	
		$lang	= &JFactory::getLanguage();
		$button = '';
		if ($lang->isRTL()) {
			$button .= '<div style="float:right;">';
		} else {
			$button .= '<div style="float:left;">';
		}
		$button .=	'<div class="icon">'
		.'<a href="'.$link.'">'
		.JHTML::_('image.site',  $image, '../media/com_impressum/images/assets/', NULL, NULL, $text )
		.'<span>'.$text.'</span></a>'
		.'</div>';
		$button .= '</div>';
	
		return $button;
	}

	//TODO: Diesen Code verwenden oder deinen Code aus der script.php ab Zeile 259?
	/**
	 * Read the Impressum Reloaded Version out of the XML-file
	 *
	 * @author chris-schmidt
	 */
	public static function version( ) {
	
		// Import filesystem libraries
		jimport('joomla.filesystem.folder');
	
		$folder = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_impressum';
		if (JFolder::exists($folder))
		{
			$xmlFilesinDir = JFolder::files($folder, '.xml$');
		} else {
			$xmlFilesinDir = null;
		}
	
		if (count($xmlFilesinDir))
		{
			foreach ($xmlFilesinDir as $xmlfile)
			{
				if ($data = JApplicationHelper::parseXMLInstallFile($folder.DS.$xmlfile))
				{
					foreach ($data as $key => $value)
					{
						if ($key == 'version')
						{
							echo $value;
						}
					}
				}
			}
		} else {
			echo 'Unknown?!?';
		}
	}
}