<?php
/**
 * @version		3.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Imprints controller class.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.0
 */
class ImprintControllerImprints extends JControllerAdmin
{
	
	/**
	 * Constructor.
	 * 
	 * @author	mgebhardt
	 * @param	array	An optional associative array of configuration settings.
	 * @since	3.0
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask('setDefault', 'setDefault');
	}
	
	/**
	 * Proxy for getModel.
	 *  
	 * @author	mgebhardt
	 * @since	3.0
	 */
	public function getModel($name = 'Imprint', $prefix = 'ImprintModel', $config = array()) 
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	
	/**
	 * Method to set the home property for a list of items.
	 * 
	 * @author	mgebhardt
	 * @since	3.0
	 */
	function setDefault()
	{
		// Check for request forgeries
		JRequest::checkToken('default') or die(JText::_('JINVALID_TOKEN'));

		// Get items to publish from the request.
		$cid	= JRequest::getVar('cid', array(), '', 'array');
		
		if (empty($cid))
			JError::raiseWarning(500, JText::_($this->text_prefix.'_NO_ITEM_SELECTED'));
		else
		{
			// Get the model.
			$model = $this->getModel();

			// Make sure the item ids are integers
			JArrayHelper::toInteger($cid);

			$cid = $cid[0];

			// Publish the items.
			if (!$model->setDefault($cid))
				JError::raiseWarning(500, $model->getError());

			$this->setMessage(JText::_('COM_IMPRINT_IMPRINTS_DEFAULT_SET'));
		}
		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));
	}
}