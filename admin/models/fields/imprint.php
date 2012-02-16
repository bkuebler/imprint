<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Reloaded Team
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
	protected $type = 'Imprint';
 
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