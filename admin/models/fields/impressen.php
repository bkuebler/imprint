<?php
/**
 * @version		3.0.1 $Id$
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
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * Impressen Form Field class for the Impressum component
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
class JFormFieldImpressen extends JFormFieldList
{
	/** 
	 * @author	mgebhardt
	 * @var		string	The field type.
	 * @since	3.0
	 */
	protected $type = 'Impressum';
 
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
		$query->from('#__impressum');
		$db->setQuery((string)$query);
		$impressen = $db->loadObjectList();
		$options = array();
		$options[] = JHtml::_('select.option', 0, JText::_('COM_IMPRESSUM_IMPRESSUM_FIELD_IMPRESSUM_OPTION_DEFAULT'));
		if ($impressen && count($impressen) > 1)
		{
			$options[] = JHtml::_('select.option', 0, '-----', 'value', 'text', true);
			foreach($impressen as $impressum) 
			{
				$options[] = JHtml::_('select.option', $impressum->id, $impressum->name);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}