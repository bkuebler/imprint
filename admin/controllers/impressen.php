<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Impressum
 * @copyright	(C) 2011 Mathias Gebhardt
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

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Impressen controller class.
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
class ImpressumControllerImpressen extends JControllerAdmin
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
	public function getModel($name = 'Impressum', $prefix = 'ImpressumModel') 
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

			$this->setMessage(JText::_('COM_IMPRESSUM_IMPRESSEN_DEFAULT_SET'));
		}
		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));
	}
}