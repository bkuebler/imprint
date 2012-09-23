<?php
/**
 * @version		3.5 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_imprint')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-48-imprint {background-image: url(../media/com_imprint/images/recht-48x48.png);}');

// require helper file
JLoader::register('ImprintHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'imprint.php');

// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by Imprint
$controller = JController::getInstance('Imprint');
 
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();