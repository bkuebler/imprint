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
 		// Try to migrate from pre 3.1.0
 		$this->doMigration($type, $parent);
 	}

 	/**
 	 * Checks whether the old com_impressum is installed. If com_impressum is
 	 * installed it migrats the data to the newer versions (3.1.0 or later) and
 	 * uninstalls the old version (com_impressum).
 	 * 
 	 * You should run this script im postflight function.
 	 * 
 	 * @author	mgebhardt
	 * @param	string	$type	Is the type of change (install, update or
	 * 							discover_install).
	 * @param	object	$parent	Is the class calling this method.
	 * @since	3.1
	 * @return  true if every thing works fine, otherwise flase
	 */
 	function doMigration($type, $parent)
 	{ 		
 		// Get application for error messanges, warnings and notice
 		$app = JFactory::getApplication();
 			
 		// Check whether an old installation of com_impressum exits
 		$db = JFactory::getDBO();
 		$query = $db->getQuery(true);
 		$query->select('extension_id');
 		$query->from('#__extensions');
 		$query->where("name LIKE 'com_impressum'");
 		$db->setQuery($query);
 		$db->execute();
 			
 		if($db->getNumRows() == 0)
 		{
 			// There is no entry in Joomlas's extensions table.
 			// You could also check filesystem, admin menu and so on,
 			// but this would be a bit paranoid. Let's say com_impressum is not
 			// intalled any more or was not installed.
 			// So let's stop here.
 			
 			return true;
 		}
 		// Inform admin about the old component
 		$app->enqueueMessage(JText::_('COM_IMPRINT_MIGRATION_OLD_VERSION_FOUND'));
 		
 		// Get the id of old version
 		$oldId = $db->loadResult();
 		
 		// Get the id of new version
 		$db = JFactory::getDBO();
 		$query = $db->getQuery(true);
 		$query->select('extension_id');
 		$query->from('#__extensions');
 		$query->where("name LIKE 'com_imprint'");
 		$db->setQuery($query);
 		$newId = $db->loadResult();
 		
 		// 1. delete new default imprint
 		$query = $db->getQuery(true);
 		$query->delete('#__imprint_imprints');
 		$db->setQuery($query);
 		$db->execute();
 		
 		// 2. insert all old imprints into new database
 		
 		// Copy quere must be hard coded without using JDatabaseQuery because
 		// JDatabaseQuery does not support INSERT - SELECT queries 
 		$db->setQuery('INSERT INTO #__imprint_imprints (`name`, `default`, '
 				. '`firma`, `name1`, `name2`, `name3`, `name4`, `street`, '
 				. '`zipcode`, `city`, `country`, `telephone`, `fax`, '
 				. '`mobilephone`, `website`, `email`, `account_holder`, '
 				. '`bank_code`, `bank_name`, `account_number`, `iban`, `swift`, '
 				. '`account_holder2`, `bank_code2`, `bank_name2`, '
 				. '`account_number2`, `iban2`, `swift2`, `account_holder3`, '
 				. '`bank_code3`, `bank_name3`, `account_number3`, `iban3`, '
 				. '`swift3`, `account_holder4`, `bank_code4`, `bank_name4`, '
 				. '`account_number4`, `iban4`, `swift4`, `vertretertitel`, '
 				. '`vertreter`, `vertreteremail`, `registergericht`, '
 				. '`registernummer`, `sales_tax_id`, `economic_id`, '
 				. '`responsible_for_content`, `responsible_for_content_mail`, '
 				. '`recht2grund`, `vertretertitel2`, `vertreter2`, '
 				. '`vertreteremail2`, `registergericht2`, `registernummer2`, '
 				. '`sales_tax_id2`, `economic_id2`, `responsible_for_content2`, '
 				. '`responsible_for_content_mail2`, `technikperson`, '
 				. '`technikwebsite`, `technikemail`, `extra1titel`, '
 				. '`extra1person`, `extra1website`, `extra1email`, '
 				. '`extra2titel`, `extra2person`, `extra2website`, '
 				. '`extra2email`, `extra3titel`, `extra3person`, '
 				. '`extra3website`, `extra3email`, `template_name`, '
 				. '`template_creator`, `template_creator_website`, '
 				. '`template_creator_email`, `contacturl`, `agburl`, '
 				. '`image`, `misc`, `params`, `image_rights`, `image_sources`, '
 				. '`adresstitel`, `datenschutztitel`) '
 				. 'SELECT `name`, `default`, `firma`, `name1`, `name2`, `name3`, '
 				. '`name4`, `strasse`, `plz`, `ort`, `land`, `telefon`, `fax`, '
 				. '`handy`, `website`, `email`, `bankinhaber`, `blz`, '
 				. '`bankname`, `kontonr`, `iban`, `swift`, `bankinhaber2`, '
 				. '`blz2`, `bankname2`, `kontonr2`, `iban2`, `swift2`, '
 				. '`bankinhaber3`, `blz3`, `bankname3`, `kontonr3`, `iban3`, '
 				. '`swift3`, `bankinhaber4`, `blz4`, `bankname4`, `kontonr4`, '
 				. '`iban4`, `swift4`, `vertretertitel`, `vertreter`, '
 				. '`vertreteremail`, `registergericht`, `registernummer`, '
 				. '`ustidnr`, `wirtidnr`, `inhaltperson`, `inhaltemail`, '
 				. '`recht2grund`, `vertretertitel2`, `vertreter2`, '
 				. '`vertreteremail2`, `registergericht2`, `registernummer2`, '
 				. '`ustidnr2`, `wirtidnr2`, `inhaltperson2`, `inhaltemail2`, '
 				. '`technikperson`, `technikwebsite`, `technikemail`, '
 				. '`extra1titel`, `extra1person`, `extra1website`, '
 				. '`extra1email`, `extra2titel`, `extra2person`, '
 				. '`extra2website`, `extra2email`, `extra3titel`, '
 				. '`extra3person`, `extra3website`, `extra3email`, '
 				. '`templatename`, `templatehersteller`, `templatewebsite`, '
 				. '`templateemail`, `contacturl`, `agburl`, `image`, `misc`, '
 				. '`params`, `bildrechte`, `bildquellen`, `adresstitel`, '
 				. '`datenschutztitel` '
 				. 'FROM #__impressum;');
		$db->execute();
 		
 		// 3. update params and get remark field values
 		$query = $db->getQuery(true);
 		$query->select('`id`, `params`');
 		$query->from('#__imprint_imprints');
 		$db->setQuery($query);
 		$imprints = $db->loadAssocList();
 		if($imprints)
 		{
	 		foreach ($imprints as $imprint)
	 		{
	 			$remarks = array();
	 			
	 			$params = json_decode($imprint['params'], true);
	 			
	 			// Convert all old remarks in params to own remark field
	 			if(!isset($params['show_datenschutz']) || 
	 					$params['show_datenschutz'] == 1)
	 			{
	 				$google = false;
	 				$facebook = false;
	 				
		 			if(isset($params['show_googleanalytics']) &&
		 					$params['show_googleanalytics'] == 1)
		 			{
		 				$google = true;
		 			}
		 			
		 			
		 			if(isset($params['show_facebookplugins']) &&
		 					$params['show_facebookplugins'] == 1)
		 			{
		 				$facebook = true;
		 			}
		 			
		 			if($google && $facebook)
		 			{
		 				$remarks[] = 'Datenschutz Analytics & Facebook';
		 			}
		 			elseif ($google)
		 			{
		 				$remarks[] = 'Datenschutz Analytics';
		 			}
		 			elseif ($facebook)
		 			{
		 				$remarks[] = 'Datenschutz Facebook';
		 			}
		 			else 
		 			{
		 				$remarks[] = 'Datenschutz';
		 			}
	 			}
	 			unset($params['show_datenschutz']);
	 			unset($params['show_googleanalytics']);
	 			unset($params['show_facebookplugins']);
	 			
	 			if(!isset($params['show_nutzungsbedingungen']) ||
	 					$params['show_nutzungsbedingungen'] == 1)
	 			{
	 				$remarks[] = 'Nutzungsbedingungen';
	 			}
	 			unset($params['show_nutzungsbedingungen']);
	 			
	 			if(isset($params['show_verhaltensregeln']) &&
	 					$params['show_verhaltensregeln'] == 1)
	 			{
	 				$remarks[] = 'Verhaltensregeln';
	 			}
	 			unset($params['show_verhaltensregeln']);
	 			
	 			if(isset($params['show_widerrufsrecht']) &&
	 					$params['show_widerrufsrecht'] == 1)
	 			{
	 				$remarks[] = 'Wiederrufsrecht';
	 			}
	 			unset($params['show_widerrufsrecht']);
	 			
	 			// Create your own agb
	 			unset($params['show_agb']);
	 			
	 			if(!isset($params['show_disclaimer']) ||
	 					$params['show_disclaimer'] == 1)
	 			{
	 				$remarks[] = 'Disclaimer';
	 			}
	 			unset($params['show_disclaimer']);
	 			
	 			// Get remark ids
	 			$remarkIds = array();
	 			
	 			foreach ($remarks as $remark)
	 			{
	 				$query = $db->getQuery(true);
	 				$query->select('`id`');
	 				$query->from('#__imprint_remarks');
	 				$query->where("name LIKE '$remark'");
	 				$db->setQuery($query);
	 				$remarkIds[] = $db->loadResult();
	 			}
	 			
	 			// Write back to database
	 			$params = json_encode($params);
	 			$remarks = implode(';', $remarkIds);
	 			
	 			$query = $db->getQuery(true);
	 			$query->update('#__imprint_imprints');
	 			$query->set("params = '$params'");
	 			$query->set("remarks = '$remarks'");
	 			$query->where("id = '" . $imprint['id'] . "'");
	 			$db->setQuery($query);
	 			$db->execute();
	 		}
 		}
	
 		// 4. Update menu item(s)
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__menu');
		$query->where("component_id = '$oldId'");
		$db->setQuery($query);
		$menuItems = $db->loadAssocList();
		if($menuItems)
		{
			foreach ($menuItems as $menuItem)
			{
				// Only frontend
				if($menuItem['menutype'] == 'main')
					continue;
				
				$link = str_replace('impressum', 'imprint', $menuItem['link']);
				
				$query = $db->getQuery(true);
				$query->update('#__menu');
				$query->set("link = '$link'");
				$query->set("component_id = '$newId'");
				$query->where("id = '" . $menuItem['id'] . "'");
				$db->setQuery($query);
				$db->execute();
			}
		}	
		
		
 		// 5. Uninstall com_impressum
 		$installer = JInstaller::getInstance();
 		if(!$installer->uninstall('component', $oldId))
 		{
 			$app->enqueueMessage(JText::_(
 					'COM_IMPRINT_MIGRATION_CANNOT_UNINSTALL_OLD_VERSION'));
 			
			return false;
 		}
 		
 		// Every thing works fine
 		$app->enqueueMessage(JText::_('COM_IMPRINT_MIGRATION_SUCCESS'));
 		return true;
 		
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