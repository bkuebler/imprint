<?php
/**
 * @version		3.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2013 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * CPanel model class.
 * 
 * @package		Joomal
 * @subpackage	Imprint
 * @since		3.1
 */
class ImprintModelCPanel extends JModel
{
	
	/**
	 * Gets the id of default imprint.
	 * 
	 * @author mgebhardt
	 * @since  3.1
	 * @return number the default imprint's id
	 */
	public function getDefaultImprintID()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('`id`');
		$query->from('`#__imprint_imprints`');
		$query->where('`default`= 1');
		$db->setQuery($query);
		$id = $db->loadRow();
		
		return is_numeric($id[0]) ? $id[0] : 0;
	}
}
