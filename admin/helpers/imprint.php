<?php
/**
 * @package     Joomla.Administrator
 * @subpackage	com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

/**
 * Imprint Component helper.
 * 
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * @since       4.0
 */
class ImprintHelper
{
	public static $extension = 'com_imprint';
	
	/**
	 * Gets a list of the actions that can be performed.
	 *  
	 * @param   integer   The imprint ID.
	 * 
	 * @return  JObject
	 * @since   4.0
	 */
	public static function getActions($imprintId = 0)
	{	
		$user	= JFactory::getUser();
		$result	= new JObject;
 
		if (empty($imprintId)) {
			$assetName = 'com_imprint';
		}
		else {
			$assetName = 'com_imprint.imprint.'.(int) $imprintId;
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
/**	public static function quickIconButton($link, $image, $text)
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
**/

	/**
	 * Method to get the version of the installed imprint.
	 * 
	 * @author	mgebhardt
	 * @since	3.1
	 * @return	string	The version of the installed imprint.
	 */
	public static function getVersion()
	{
		$db = JFactory::getDbo();
		$db->setQuery('SELECT manifest_cache FROM #__extensions WHERE name = "com_imprint"');
		$manifest = json_decode( $db->loadResult(), true );
		return $manifest['version'];
	}

	/**
	 * Configure the Linkbar
	 *
	 * @param   string     $vName    The current view name
	 *
	 * @return  void
	 * @since   4.0
	 */
	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_IMPRINT_SUBMENU_CPANEL'),
			'index.php?option=com_imprint&view=cpanel',
			$vName == 'cpanel'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_IMPRINT_SUBMENU_IMPRINTS'),
			'index.php?option=com_imprint&view=imprints',
			$vName == 'imprints'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_IMPRINT_SUBMENU_REMARKS'),
			'index.php?option=com_imprint&view=remarks',
			$vName == 'remarks'
		);
		JHtmlSidebar::addEntry(
			JText::_('COM_IMPRINT_SUBMENU_ABOUT'),
			'index.php?option=com_imprint&view=about',
			$vName == 'about'
		);
	}
}
