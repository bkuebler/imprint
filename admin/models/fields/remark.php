<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

/**
 * Remark Form Field class for the Imprint component
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.1
 */
class JFormFieldRemark extends JFormField
{

	/**
	 * The field class must know its own type through the variable $type.
	 *
	 * @author	mgebhardt
	 * @var		string	The field type.
	 * @since	3.1
	 */
	protected $type = 'Remark';

	/**
	 * Code that returns HTML that will be shown as the form field.
	 *
	 * @author	mgebhardt
	 * @return	string  The field input markup.
	 * @since	3.1
	 */
	public function getInput()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('`id`, `name`');
		$query->from('#__imprint_remarks');
		$db->setQuery((string)$query);
		$remarks = $db->loadObjectList();
		
		
		
		return 'not implemented exception!';
	}
}