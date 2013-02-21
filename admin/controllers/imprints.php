<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

/**
 * Controller for Imprints list.
 * 
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * @since       4.0
 */
class ImprintControllerImprints extends JControllerAdmin
{
	/**
	 * Constructor.
	 * 
	 * @param   array     An optional associative array of configuration settings.
	 *
	 * @return  ImprintControllerImprints
	 * @see     JController
	 * @since   3.0
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask('setDefault', 'setDefault');
	}
	
	/**
	 * Proxy for getModel.
	 *
	 * @param   string     $name    The name of the model.
	 * @param   string     $prefix  The prefix for the PHP class name.
	 *
	 * @return  JModel
	 * @since   4.0
	 */
	public function getModel($name = 'Imprint', $prefix = 'ImprintModel', $config = array('ignore_request' => true)) 
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
	
	/**
	 * Method to set the home property for a list of items.
	 * 
	 * @author	mgebhardt
	 * @since	3.0
	 */
	/**function setDefault()
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
	}**/
}
