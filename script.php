<?php
/**
 * @version		3.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Script file of Imprint component.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.0
 */
class com_imprintInstallerScript
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
		$app->enqueueMessage(JText::_('COM_IMPRINT_INSTALL_TEXT'));
		
		$parent->getParent()->setRedirectURL('index.php?option=com_imprint');
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
		$app->enqueueMessage(JText::_('COM_IMPRINT_UNINSTALL_TEXT'));
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
		$app->enqueueMessage(JText::_('COM_IMPRINT_UPDATE_TEXT'));
	}
 
	/**
	 * Method to run before an install/update/uninstall method.
	 * 
	 * @author	mgebhardt
	 * @param	object	$parent	Is the class calling this method.
	 * @param	string	$type	Is the type of change (install, update or discover_install).
	 * @since	3.0.1
	 */
	function preflight($type, $parent) 
	{
		// this component does not work with Joomla releases prior to 1.6
		// abort if the current Joomla release is older
		
		$newVersion = $this->getCurrentVersion();
		$app		= JFactory::getApplication();
		
		// Try to get the new imprint version
		if($newVersion === false)
		{
			$app->enqueueMessage(JText::_
					('COM_IMPRINT_PREFLIGHT_ERROR_NEW_VERSION'), 'error');
			return false;
		}
			
		$jversion = new JVersion();
		if( version_compare( $jversion->getShortVersion(), '1.6', 'lt' ) )
		{
			$app->enqueueMessage(JText::_
					('COM_IMPRINT_PREFLIGHT_ERROR_JOOMLA_VERSION'), 'error');
			//Cannot install com_imprint in a Joomla release prior to 1.6
			return false;
		}
		
		// abort if the release being installed is not newer than the currently installed version
		if ( $type == 'update' )
		{
			$oldVersion = $this->getOldVersion();
			$rel = $oldVersion . ' to ' . $newVersion;
			if ( version_compare( $newVersion, $oldVersion, 'le' ) )
			{
				$app->enqueueMessage(JText::_
						('COM_IMPRINT_PREFLIGHT_ERROR_IMPRINT_VERSION') . $rel,
						'error');
				//Incorrect version sequence. Cannot upgrade 
				return false;
			}
		}
		else
		{
			$rel = $this->release;
		}
		
		//echo '<p>' . JText::_('COM_IMPRINT_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}
 
	/**
	 * Method to run after an install/update/uninstall method.
	 * 
	 * @author	mgebhardt
	 * @param	string	$type	Is the type of change (install, update or discover_install).
	 * @param	object	$parent	Is the class calling this method.
	 * @since	3.0
	 */
 	function postflight($type, $parent) 
 	{
 		$app = JFactory::getApplication();
 		
 		// Check whether an old installation of com_impressum exits
 		$db = JFactory::getDBO();
 		$query = $db->getQuery(true);
 		$query->select('extension_id');
 		$query->from('#__extensions');
 		$query->where("name LIKE 'com_impressum'");
 		$db->setQuery($query);
 		$db->execute();
 		
 		if($db->getNumRows() > 0)
 		{
 			// You should uninstall the old imprint versions pre 3.1.0
 			$app->enqueueMessage(JText::_
 					('COM_IMPRINT_POSTLIGHT_ERROR_UNINSTALL_IMPRESSUM'),
 					'warning');
 		}
 	}

	/**
	 * Method to get the params of the installed version.
	 * 
	 * @author	mgebhardt
	 * @since	3.0.1
	 */
// Does not work. Use getOldVersion to get the version of the installed imprint.
// 	function getParams()
// 	{
// 		$db = JFactory::getDbo();
// 		$db->setQuery('SELECT manifest_cache FROM #__extensions WHERE name = "com_imprint"');
// 		$params = new JRegistry();
// 		$params->loadString($db->loadResult());
// 		return $params;
// 	}
	
	/**
	 * Method to get the version of the install imprint.
	 * 
	 * @author	mgebhardt
	 * @since	3.0.1
	 * @return	string	The version of the installt imprint.
	 */
	function getOldVersion()
	{
		$db = JFactory::getDbo();
		$db->setQuery('SELECT manifest_cache FROM #__extensions WHERE name = "com_imprint"');
		$manifest = json_decode( $db->loadResult(), true );
		return $manifest['version'];
	}
	
	/**
	 * Read the new version out of the xml manifestfile
	 *
	 * @author  chris-schmidt
	 * @since	3.1
	 * @return	string 	The version string or 
	 * 			boolean	false if manifestfile or version tag not found.
	 */
	public static function getCurrentVersion()
	{
	
		// Import filesystem libraries
		jimport('joomla.filesystem.folder');
	
		// Get folder of this script
		$folder = dirname(__FILE__);
		
		// Check whether xml files exsits in this folder;
		// otherwhise return null
		if (JFolder::exists($folder))
			$xmlFilesinDir = JFolder::files($folder, '.xml$');
		else
			return false;
		
		foreach ($xmlFilesinDir as $xmlfile)
			if ($data = JApplicationHelper::parseXMLInstallFile($folder.DS.$xmlfile))
				foreach ($data as $key => $value)
					if ($key == 'version')
						return $value;
		
		// Nothing found?
		return null;
	}
}