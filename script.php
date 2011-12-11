<?php
/**
 * @version		3.0.3 $Id$
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
	 * Current version.
	 * 
	 * @author	mgebhardt
	 * @var		string
	 * @since	3.0.1
	 * @todo: Compare this version with version of xml installer file every release! 
	 */
	private $release = '3.0.3';
	
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
	 * @since	3.0.1
	 */
	function preflight($type, $parent) 
	{
		// this component does not work with Joomla releases prior to 1.6
		// abort if the current Joomla release is older
		$jversion = new JVersion();
		if( version_compare( $jversion->getShortVersion(), '1.6', 'lt' ) )
		{
			Jerror::raiseWarning(null, 'COM_IMPRESSUM_PREFLIGHT_ERROR_JOOMLA_VERSION');
			//Cannot install com_impressum in a Joomla release prior to 1.6
			return false;
		}
		
		// abort if the release being installed is not newer than the currently installed version
		if ( $type == 'update' )
		{
			$oldVersion = $this->getOldVersion();
			$rel = $oldVersion . ' to ' . $this->release;
			if ( version_compare( $this->release, $oldVersion, 'le' ) )
			{
				Jerror::raiseWarning(null, 'COM_IMPRESSUM_PREFLIGHT_ERROR_IMPRESSUM_VERSION' . $rel);
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
					if(in_array('de-DE.com_impressum.ini', $files))
						$return = $ftp->delete($path . 'de-DE.com_impressum.ini');
					if(in_array('de-DE.com_impressum.sys.ini', $files))
						$return = $return && $ftp->delete($path . 'de-DE.com_impressum.sys.ini');
					
					$path = JPATH_ADMINISTRATOR . '/language/en-GB/';
					$path = JPath::clean(str_replace(JPATH_CONFIGURATION, $options->ftp_root, $path), '/');
					$files = $ftp->listDetails($path,'files');
					if(in_array('en-GB.com_impressum.ini', $files))
						$return = $return && $ftp->delete($path . 'en-GB.com_impressum.ini');
					if(in_array('en-GB.com_impressum.sys.ini', $files))
						$return = $return && $ftp->delete($path . 'en-GB.com_impressum.sys.ini');
			
					$path = JPATH_SITE . '/language/de-de/';
					$path = JPath::clean(str_replace(JPATH_CONFIGURATION, $options->ftp_root, $path), '/');
					$files = $ftp->listDetails($path,'files');
					if(in_array('de-DE.com_impressum.ini', $files))
						$return = $return && $ftp->delete($path . 'de-DE.com_impressum.ini');
					
					$path = JPATH_SITE . '/language/en-GB/';
					$path = JPath::clean(str_replace(JPATH_CONFIGURATION, $options->ftp_root, $path), '/');
					$files = $ftp->listDetails($path,'files');
					if(in_array('en-GB.com_impressum.ini', $files))
						$return = $return && $ftp->delete($path . 'en-GB.com_impressum.ini');
							
					$ftp->quit();
				} 
				else
				{
					ob_start();
					if(JFile::exists($path . '/language/de-DE/de-DE.com_impressum.ini'))
						$return = JFile::delete($path . '/language/de-DE/de-DE.com_impressum.ini');
					if(JFile::exists($path . '/language/de-DE/de-DE.com_impressum.sys.ini'))
						$return = $return && JFile::delete($path . '/language/de-DE/de-DE.com_impressum.sys.ini');
					
					if(JFile::exists($path . '/language/en-GB/en-GB.com_impressum.ini'))
						$return = $return && JFile::delete($path . '/language/en-GB/en-GB.com_impressum.ini');
					if(JFile::exists($path . '/language/en-GB/en-GB.com_impressum.sys.ini'))
						$return = $return && JFile::delete($path . '/language/en-GB/en-GB.com_impressum.sys.ini');
					
					if(JFile::exists($path . '/language/de-DE/de-DE.com_impressum.ini'))
						$return = $return && JFile::delete(JPATH_SITE . '/language/de-DE/de-DE.com_impressum.ini');
					
					if(JFile::exists($path . '/language/en-GB/en-GB.com_impressum.ini'))
						$return = $return && JFile::delete(JPATH_SITE . '/language/en-GB/en-GB.com_impressum.ini');
					
					ob_end_clean();
				}
				
				// Fix missing 3.0.sql update script
				$db = JFactory::getDbo();
				$db->setQuery("ALTER TABLE `#__impressum` ADD `templateemail` varchar(255) NOT NULL default ''");
				$db->query();
				$db->setQuery("ALTER TABLE `#__impressum` CHANGE `aktiv` `default` tinyint NOT NULL default 0;");
				$db->query();
			}
		}
		else
		{
			$rel = $this->release;
		}
		
		echo '<p>' . JText::_('COM_IMPRESSUM_PREFLIGHT_' . $type . '_TEXT') . '</p>';
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
// 		echo '<p>' . JText::_('COM_IMPRESSUM_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
// 	}

	/**
	 * Method to get the params of the installed version.
	 * 
	 * @author	mgebhardt
	 * @since	3.0.1
	 */
// Does not work. Use getOldVersion to get the version of the installed impressum.
// 	function getParams()
// 	{
// 		$db = JFactory::getDbo();
// 		$db->setQuery('SELECT manifest_cache FROM #__extensions WHERE name = "com_impressum"');
// 		$params = new JRegistry();
// 		$params->loadString($db->loadResult());
// 		return $params;
// 	}
	
	/**
	 * Method to get the version of the install impressum.
	 * 
	 * @author	mgebhardt
	 * @since	3.0.1
	 * @return	string	The version of the installt impressum.
	 */
	function getOldVersion()
	{
		$db = JFactory::getDbo();
		$db->setQuery('SELECT manifest_cache FROM #__extensions WHERE name = "com_impressum"');
		$manifest = json_decode( $db->loadResult(), true );
		return $manifest['version'];
	}
}