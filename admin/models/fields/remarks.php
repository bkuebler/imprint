<?php
/**
 * @version		3.1.0
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Remarks Form Field class for the Imprint component
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.1
 */
class JFormFieldRemarks extends JFormFieldList
{

	/**
	 * The field class must know its own type through the variable $type.
	 *
	 * @author	mgebhardt
	 * @var		string	The field type.
	 * @since	3.1
	 */
	protected $type = 'Remarks';

	/**
	 * Method to get the field options.
	 *
	 * @return	array	The field option objects.
	 * @since	3.1
	 */
	protected function getOptions()
	{	
		/*
		 * SELECT r.id AS value, r.name AS text, i.imprint AS selected
		 * FROM `jos_imprint_remarks` AS r
		 * LEFT JOIN `jos_imprint_relation` AS i ON r.id = i.remark
		 * HAVING selected IS NULL OR selected = $Id
		 */
		/*
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select("r.id AS value, r.name AS text, i.imprint AS selected");
		$query->from("`jos_imprint_remarks` AS r");
		$query->leftJoin("`jos_imprint_relation` AS i ON r.id = i.remark");
		$query->having("selected IS NULL OR selected = $Id");
		*/
		
		//@TODO: remove this hack
		$this->value = explode(';', $this->value);
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select("r.id AS value, r.name AS text");
		$query->from("`#__imprint_remarks` AS r");
		$query->order("name");
		$db->setQuery($query);
		$options = $db->loadObjectList();
		
		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);
		
		return $options;
	}
}