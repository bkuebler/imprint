<?php
/**
 * @version		3.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

// import Joomla table library
jimport('joomla.database.table');

/**
 * Remark table class.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.1
 */
class ImprintTableRemark extends JTable
{
	
	/**
	 * Constructor.
	 * 
	 * @author	mgebhardt
	 * @param	object	Database connector object
	 * @since	3.1
	 */
	function __construct(&$db)
	{
		parent::__construct( '#__imprint_remarks', 'id', $db );
	}
	
	/**
	 * Method to compute the default name of the asset.
	 * The default name is in the form `table_name.id`
	 * where id is the value of the primary key of the table.
	 * 
	 * @author	mgebhardt
	 * @return	string
	 * @since	3.1
	 */
	protected function _getAssetName()
	{
		$k = $this->_tbl_key;
		return 'com_imprint.remark.'.(int) $this->$k;
	}

	/**
	 * Method to return the title to use for the asset table.
	 * 
	 * @author	mgebhardt
	 * @return	string
	 * @since	3.1
	 */
	protected function _getAssetTitle()
	{
		return $this->name;
	}

	/**
	 * Get the parent asset id for the record
	 * 
	 * @author	mgebhardt
	 * @return	int
	 * @since	3.1
	 */
	protected function _getAssetParentId($table = null, $id = null)
	{
		$asset = JTable::getInstance('Asset');
		$asset->loadByName('com_imprint');
		return $asset->id;
	}
	
}
