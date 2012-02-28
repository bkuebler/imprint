<?php
/**
 * @version		3.5 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Impressum Reloaded Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
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