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
 * Remark model class.
 * 
 * @package		Joomal
 * @subpackage	Imprint
 * @since		3.1
 */
class ImprintModelRemark extends JModelAdmin
{
	
	/**
	 * Method override to check if you can edit an existing record.
	 * 
	 * @author	mgebhardt
	 * @param	array	$data	An array of input data.
	 * @param	string	$key	The name of the key for the primary key.
	 * 
	 * @return	boolean
	 * @since	3.1
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		// Check specific edit permission then general edit permission.
		return JFactory::getUser()->authorise('core.edit', 'com_imprint.remark.'.((int) isset($data[$key]) ? $data[$key] : 0)) or parent::allowEdit($data, $key);
	}
	
	/**
	 * Returns a reference to the a Table object, always creating it.
	 * 
	 * @author	mgebhardt
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * 
	 * @return	JTable	A database object
	 * @since	3.1
	 */
	public function getTable($type = 'Remark', $prefix = 'ImprintTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	/**
	 * Method to get the record form.
	 * 
	 * @author	mgebhardt
	 * @param	array	$data		Data for the form.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 * 
	 * @return	mixed	A JForm object on success, false on failure
	 * @since	3.1
	 */
	public function getForm($data = array(), $loadData = true) 
	{
		// Get the form.
		$form = $this->loadForm('com_imprint.remark', 'remark', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) 
		{
			return false;
		}
		return $form;
	}

	/**
	 * Method to get the script that have to be included on the form
	 * 
	 * @author	mgebhardt
	 * @return 	string	Script files
	 */
	public function getScript() 
	{
		return 'administrator/components/com_imprint/models/forms/remark.js';
	}
	
	/**
	 * Method to get the data that should be injected in the form.
	 * 
	 * @author	mgebhardt
	 * @return	mixed	The data for the form.
	 * @since	3.1
	 */
	protected function loadFormData() 
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_imprint.edit.remark.data', array());
		if (empty($data)) 
		{
			$data = $this->getItem();
		}
		return $data;
	}
	
	/**
	* Method to delete one or more records.
	* 
	* @author	mgebhardt
	* @param	array    $pks  An array of record primary keys.
	*
	* @return	boolean  True if successful, false if an error occurs.
	* @since	3.1
	*/
 	public function delete(&$pks)
 	{
 		// Initialise variables.
 		$pks		= (array) $pks;
 		$db			= JFactory::getDbo();
 		
 		foreach ($pks as $i => $pk)
 		{
 			$query = $db->getQuery(true);
 			$query->select('id, remarks');
 			$query->from('#__imprint_imprints');
 			$query->where("remarks LIKE '%$pk%'");
 			$db->setQuery($query);
 			$imprints = $db->loadObjectList();
 			foreach ($imprints as $i => $imprint)
 			{
 				$remarks = explode(';', $imprint->remarks);
 				
 				// Remarks has to be an array
 				if(!is_array($remarks))
 				{
 					unset($imprints[i]);
 					continue;
 				}
 				
 				// It is also possible to get false imprints from query
 				if(($key = array_search($pk, $remarks)) === false)
 				{
 					unset($imprints[i]);
 					continue;
 				}
 				
 				// delete remark from remarks array
 				unset($remarks[$key]);
 				
 				// Write new remarks array back to DB
 				$query = $db->getQuery(true);
 				$query->update('#__imprint_imprints');
 				$query->set("remarks = '" . implode(';', $remarks). "'");
 				$query->where('id = ' . $imprint->id);
 				$db->setQuery($query);
 				$db->query();
 			}
 		}

 		return parent::delete($pks);
 	}
}