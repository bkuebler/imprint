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
			JError::raiseError('400', 'COM_IMPRINT_PREFLIGHT_ERROR_NEW_VERSION');
			
		$jversion = new JVersion();
		if( version_compare( $jversion->getShortVersion(), '1.6', 'lt' ) )
		{
			Jerror::raiseWarning(null, 'COM_IMPRINT_PREFLIGHT_ERROR_JOOMLA_VERSION');
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
				Jerror::raiseWarning(null, 'COM_IMPRINT_PREFLIGHT_ERROR_IMPRINT_VERSION' . $rel);
				//Incorrect version sequence. Cannot upgrade 
				return false;
			}
			// Fixes the installation bugs of version 3.0 (wrong langeguage directory and missing 3.0.sql).

			// SQL query does not work. Deleting files work.
			
			if ($oldVersion == '3.0')
			{
				jimport('joomla.filesystem.file');
	
				// Get the posted config options.
				$vars = JRequest::getVar('jform', array());
			
				$path = JPATH_ADMINISTRATOR;
			
				// check whether we need to use FTP
				$useFTP = false;
				if ((file_exists($path) && !is_writable($path))) {
					$useFTP = true;
				}
			
				// Check for safe mode
				if (ini_get('safe_mode')) {
					$useFTP = true;
				}
			
				// Enable/Disable override
				if (!isset($options->ftpEnable) || ($options->ftpEnable != 1)) {
					$useFTP = false;
				}
			
				if ($useFTP == true) {
					// Connect the FTP client
					jimport('joomla.client.ftp');
					jimport('joomla.filesystem.path');
			
					$ftp = JFTP::getInstance($options->ftp_host, $options->ftp_port);
					$ftp->login($options->ftp_user, $options->ftp_pass);
			
					// Translate path for the FTP account
					$path = JPATH_ADMINISTRATOR . '/language/de-de/';
					$path = JPath::clean(str_replace(JPATH_CONFIGURATION, $options->ftp_root, $path), '/');
					$files = $ftp->listDetails($path,'files');
					if(in_array('de-DE.com_imprint.ini', $files))
						$return = $ftp->delete($path . 'de-DE.com_imprint.ini');
					if(in_array('de-DE.com_imprint.sys.ini', $files))
						$return = $return && $ftp->delete($path . 'de-DE.com_imprint.sys.ini');
					
					$path = JPATH_ADMINISTRATOR . '/language/en-GB/';
					$path = JPath::clean(str_replace(JPATH_CONFIGURATION, $options->ftp_root, $path), '/');
					$files = $ftp->listDetails($path,'files');
					if(in_array('en-GB.com_imprint.ini', $files))
						$return = $return && $ftp->delete($path . 'en-GB.com_imprint.ini');
					if(in_array('en-GB.com_imprint.sys.ini', $files))
						$return = $return && $ftp->delete($path . 'en-GB.com_imprint.sys.ini');
			
					$path = JPATH_SITE . '/language/de-de/';
					$path = JPath::clean(str_replace(JPATH_CONFIGURATION, $options->ftp_root, $path), '/');
					$files = $ftp->listDetails($path,'files');
					if(in_array('de-DE.com_imprint.ini', $files))
						$return = $return && $ftp->delete($path . 'de-DE.com_imprint.ini');
					
					$path = JPATH_SITE . '/language/en-GB/';
					$path = JPath::clean(str_replace(JPATH_CONFIGURATION, $options->ftp_root, $path), '/');
					$files = $ftp->listDetails($path,'files');
					if(in_array('en-GB.com_imprint.ini', $files))
						$return = $return && $ftp->delete($path . 'en-GB.com_imprint.ini');
							
					$ftp->quit();
				} 
				else
				{
					ob_start();
					if(JFile::exists($path . '/language/de-DE/de-DE.com_imprint.ini'))
						$return = JFile::delete($path . '/language/de-DE/de-DE.com_imprint.ini');
					if(JFile::exists($path . '/language/de-DE/de-DE.com_imprint.sys.ini'))
						$return = $return && JFile::delete($path . '/language/de-DE/de-DE.com_imprint.sys.ini');
					
					if(JFile::exists($path . '/language/en-GB/en-GB.com_imprint.ini'))
						$return = $return && JFile::delete($path . '/language/en-GB/en-GB.com_imprint.ini');
					if(JFile::exists($path . '/language/en-GB/en-GB.com_imprint.sys.ini'))
						$return = $return && JFile::delete($path . '/language/en-GB/en-GB.com_imprint.sys.ini');
					
					if(JFile::exists($path . '/language/de-DE/de-DE.com_imprint.ini'))
						$return = $return && JFile::delete(JPATH_SITE . '/language/de-DE/de-DE.com_imprint.ini');
					
					if(JFile::exists($path . '/language/en-GB/en-GB.com_imprint.ini'))
						$return = $return && JFile::delete(JPATH_SITE . '/language/en-GB/en-GB.com_imprint.ini');
					
					ob_end_clean();
				}
				
				// Fix missing 3.0.sql update script
				$db = JFactory::getDbo();
				$db->setQuery("ALTER TABLE `#__imprint_imprints` ADD `templateemail` varchar(255) NOT NULL default ''");
				$db->query();
				$db->setQuery("ALTER TABLE `#__imprint_imprints` CHANGE `aktiv` `default` tinyint NOT NULL default 0;");
				$db->query();
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
	// Not used.
// 	function postflight($type, $parent) 
// 	{
// 		echo '<p>' . JText::_('COM_IMPRINT_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
// 	}

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