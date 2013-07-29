<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Imprint Master Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * @since       4.0
 */
class ImprintController extends JControllerLegacy
{
	/**
	 * @var   string  The default view.
	 * @since   4.0
	 */
	protected $default_view = 'cpanel';

	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   array    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController  This object to support chaining.
	 *
	 * @since   4.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
// 		$view	= $this->input->get('view', 'cpanel');
// 		$layout	= $this->input->get('layout', 'default');

		parent::display();

		return $this;
	}
}
