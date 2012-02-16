<?php
/**
 * @version		3.0.1 $Id$
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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

// import Joomla table library
jimport('joomla.database.table');

/**
 * Imprint table class.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.0
 */
class ImprintTableImprint extends JTable
{
	
	/**
	 * Constructor.
	 * 
	 * @author	mgebhardt
	 * @param		object			Database connector object
	 * @since		3.0
	 */
	function __construct(&$db)
	{
		parent::__construct( '#__imprint_imprints', 'id', $db );
	}
	
	/**
	 * Overloaded bind function
	 * 
	 * @author	mgebhardt
	 * @param       array           named array
	 * @return      null|string     null is operation was satisfactory, otherwise returns an error
	 * @since 		3.0
	 */
	public function bind($array, $ignore = '') 
	{
		if (isset($array['params']) && is_array($array['params'])) 
		{
			// Convert the params field to a string.
			$parameter = new JRegistry;
			$parameter->loadArray($array['params']);
			$array['params'] = (string)$parameter;
		}
		return parent::bind($array, $ignore);
	}

	/**
	 * Overloaded load function
	 * 
	 * @author	mgebhardt
	 * @param		int		$pk primary key
	 * @param		boolean	$reset reset data
	 * @return		boolean
	 * @since		3.0
	 */
	public function load($pk = null, $reset = true) 
	{
		if (parent::load($pk, $reset)) 
		{
			// Convert the params field to a registry.
			$params = new JRegistry;
			$params->loadString($this->params);
			$this->params = $params;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Method to compute the default name of the asset.
	 * The default name is in the form `table_name.id`
	 * where id is the value of the primary key of the table.
	 * 
	 * @author	mgebhardt
	 * @return		string
	 * @since		3.0
	 */
	protected function _getAssetName()
	{
		$k = $this->_tbl_key;
		return 'com_imprint.imprint.'.(int) $this->$k;
	}

	/**
	 * Method to return the title to use for the asset table.
	 * 
	 * @author	mgebhardt
	 * @return		string
	 * @since		3.0
	 */
	protected function _getAssetTitle()
	{
		return $this->name;
	}

	/**
	 * Get the parent asset id for the record
	 * 
	 * @author	mgebhardt
	 * @return		int
	 * @since		3.0
	 */
	protected function _getAssetParentId($table = null, $id = null)
	{
		$asset = JTable::getInstance('Asset');
		$asset->loadByName('com_imprint');
		return $asset->id;
	}
	
}
