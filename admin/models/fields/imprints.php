<?php
/**
 * @version		3.0.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Imprints Form Field class for the Imprint component
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.0
 */
class JFormFieldImprints extends JFormFieldList
{
	/** 
	 * @author	mgebhardt
	 * @var		string	The field type.
	 * @since	3.0
	 */
	protected $type = 'Imprints';
 
	/**
	 * Method to get a list of options for a list input.
	 * 
	 * @author	mgebhardt
	 * @return	array	An array of JHtml options.
	 * @since	3.0
	 */
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('`id`, `name`');
		$query->from('#__imprint_imprints');
		$db->setQuery((string)$query);
		$imprints = $db->loadObjectList();
		$options = array();
		$options[] = JHtml::_('select.option', 0, JText::_('COM_IMPRINT_IMPRINT_FIELD_IMPRINT_OPTION_DEFAULT'));
		if ($imprints && count($imprints) > 1)
		{
			$options[] = JHtml::_('select.option', 0, '-----', 'value', 'text', true);
			foreach($imprints as $imprint) 
			{
				$options[] = JHtml::_('select.option', $imprint->id, $imprint->name);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}