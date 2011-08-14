<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Impressum
 * @copyright	(C) 2011 Mathias Gebhardt
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

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * Impressum model class.
 * 
 * @package		Joomal
 * @subpackage	Impressum
 * @since		3.0
 */
class ImpressumModelImpressum extends JModelAdmin
{
	
	/**
	 * Method override to check if you can edit an existing record.
	 * 
	 * @author	mgebhardt
	 * @param	array	$data	An array of input data.
	 * @param	string	$key	The name of the key for the primary key.
	 * 
	 * @return	boolean
	 * @since	3.0
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		// Check specific edit permission then general edit permission.
		return JFactory::getUser()->authorise('core.edit', 'com_impressum.impressum.'.((int) isset($data[$key]) ? $data[$key] : 0)) or parent::allowEdit($data, $key);
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
	 * @since	3.0
	 */
	public function getTable($type = 'Impressum', $prefix = 'ImpressumTable', $config = array()) 
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
	 * @since	3.0
	 */
	public function getForm($data = array(), $loadData = true) 
	{
		// Get the form.
		$form = $this->loadForm('com_impressum.impressum', 'impressum', array('control' => 'jform', 'load_data' => $loadData));
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
	 * @return string	Script files
	 */
	public function getScript() 
	{
		return 'administrator/components/com_impressum/models/forms/impressum.js';
	}
	
	/**
	 * Method to get the data that should be injected in the form.
	 * 
	 * @author	mgebhardt
	 * @return	mixed	The data for the form.
	 * @since	3.0
	 */
	protected function loadFormData() 
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_impressum.edit.impressum.data', array());
		if (empty($data)) 
		{
			$data = $this->getItem();
		}
		return $data;
	}
	/**
	 * Method to change the home state of one or more items.
	 * 
	 * @author	mgebhardt
	 * @param	int		$pk	A list of the primary keys to change.
	 * @return	boolean	True on success.
	 * @since	3.0
	 */
	function setDefault($pk)
	{
		// Initialise variables.
		$table		= $this->getTable();
		$user		= JFactory::getUser();
		
		if(is_array($pk))
			JError::raiseError(500, JText::_('COM_IMPRESSUM_ERROR_PK_IS_ARRAY'));

		if(!is_numeric($pk))
			JError::raiseError(500, JText::_('COM_IMPRESSUM_ERROR_PK_IS_NOT_NUMMERIC'));

		if ($pk < 1)
			JError::raiseError(500, JText::_('COM_IMPRESSUM_ERROR_PK_IS_LESS_THAN_1'));
			
		if ($table->load($pk))
		{	
			
			if ($table->default == 1)
				JError::raiseNotice(403, JText::_('COM_IMPRESSUM_ERROR_ALREADY_DEFAULT'));
			else 
			{
				$db = JFactory::getDBO();
				$query = $db->getQuery(true);
				$query->update('#__impressum');
				$query->set('`default` = 0');
				$db->setQuery($query);
				$db->query();
				
				$table->default = 1;
				
				if (!$table->store())
					JError::raiseWarning(403, $table->getError());
			}
		}
		
		// Clear the component's cache
		$cache = JFactory::getCache();
		$cache->clean('com_impressum');

		return true;
	}
	
	/**
	* Method to delete one or more records.
	* 
	* @author	mgebhardt
	* @param	array    $pks  An array of record primary keys.
	*
	* @return	boolean  True if successful, false if an error occurs.
	* @since	3.0
	*/
	public function delete(&$pks)
	{
		// Initialise variables.
		$pks		= (array) $pks;
		$table		= $this->getTable();
		
		
		// Iterate the items to delete each one.
		foreach ($pks as $i => $pk)
		{
			if ($table->load($pk))
			{
				if($table->default)
				{
					unset($pks[$i]);
					JError::raiseNotice('', JText::_('COM_IMPRESSUM_IMPRESSUM_ERROR_CANNOT_DELETE_DEFAULT'));
				}
			}
		}
		return parent::delete($pks);
	}
}