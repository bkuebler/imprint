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

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Remarks controller class.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.1
 */
class ImprintControllerRemarks extends JControllerAdmin
{
	
	/**
	 * Constructor.
	 * 
	 * @author	mgebhardt
	 * @param	array	An optional associative array of configuration settings.
	 * @since	3.1
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
	}
	
	/**
	 * Proxy for getModel.
	 *  
	 * @author	mgebhardt
	 * @since	3.1
	 */
	public function getModel($name = 'Remark', $prefix = 'ImprintModel', $config = array()) 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}