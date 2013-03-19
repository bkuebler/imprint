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

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_imprint')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Set some global property
$document = JFactory::getDocument();
//$document->addStyleDeclaration('.icon-48-imprint {background-image: url(../media/com_imprint/images/recht-48x48.png);}');
$document->addStyleDeclaration('.icon-48-imprint-about {background-image: url(../media/com_imprint/images/assets/48px/icon-48-imprint-about.png);}');
$document->addStyleDeclaration('.icon-48-imprint-cpanel {background-image: url(../media/com_imprint/images/assets/48px/icon-48-imprint-cpanel.png);}');
$document->addStyleDeclaration('.icon-48-imprint-imprints {background-image: url(../media/com_imprint/images/assets/48px/icon-48-imprint-imprints.png);}');
$document->addStyleDeclaration('.icon-48-imprint-imprint {background-image: url(../media/com_imprint/images/assets/48px/icon-48-imprint-imprint.png);}');
$document->addStyleDeclaration('.icon-48-imprint-remark {background-image: url(../media/com_imprint/images/assets/48px/icon-48-imprint-remark.png);}');
$document->addStyleDeclaration('.icon-48-imprint-remarks {background-image: url(../media/com_imprint/images/assets/48px/icon-48-imprint-remarks.png);}');

$document->addStyleDeclaration('.icon-16-imprint-about {background-image: url(../media/com_imprint/images/assets/16px/icon-16-imprint-about.png);}');
$document->addStyleDeclaration('.icon-16-imprint-cpanel {background-image: url(../media/com_imprint/images/assets/16px/icon-16-imprint-cpanel.png);}');
$document->addStyleDeclaration('.icon-16-imprint-imprints {background-image: url(../media/com_imprint/images/assets/16px/icon-16-imprint-imprints.png);}');
$document->addStyleDeclaration('.icon-16-imprint-imprint {background-image: url(../media/com_imprint/images/assets/16px/icon-16-imprint-imprint.png);}');
$document->addStyleDeclaration('.icon-16-imprint-remark {background-image: url(../media/com_imprint/images/assets/16px/icon-16-imprint-remark.png);}');
$document->addStyleDeclaration('.icon-16-imprint-remarks {background-image: url(../media/com_imprint/images/assets/16px/icon-16-imprint-remarks.png);}');

$document->addStyleDeclaration('fieldset.adminform label, fieldset.adminform span.faux-label {width: 150px;}');

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