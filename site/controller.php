<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Imprint Component Controller
 * 
 * @package     Joomla.Site
 * @subpackage  Imprint
 * @since       4.0
 */
class ImprintController extends JControllerLegacy
{
	/**
	 * Method to display a view
	 *
	 * @param   boolean    If true, the view output will be cached
	 * @param   array      An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
 	 * @return  JController   This object to support chaining. 
	 * @since   4.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$cachable = true;

		// Set the default view name and format from the Request.
		$vName = $this->input->getCmd('view', 'Imprint');
		$this->input->set('view', $vName);
		
		parent::display($cachable, $safeurlparams);

		return $this;
	}
}
