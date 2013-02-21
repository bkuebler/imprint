<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

if (!JFactory::getUser()->authorise('core.manage', 'com_imprint'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Set some global property
//$document = JFactory::getDocument();
//$document->addStyleDeclaration('.icon-48-imprint {background-image: url(../media/com_imprint/images/recht-48x48.png);}');
//$document->addStyleDeclaration('.icon-48-about {background-image: url(../media/com_imprint/images/assets/48px/icon-48-about.png);}');
//$document->addStyleDeclaration('.icon-48-cpanel {background-image: url(../media/com_imprint/images/assets/48px/icon-48-cpanel.png);}');
//$document->addStyleDeclaration('.icon-48-imprints {background-image: url(../media/com_imprint/images/assets/48px/icon-48-imprints.png);}');
//$document->addStyleDeclaration('.icon-48-imprint {background-image: url(../media/com_imprint/images/assets/48px/icon-48-imprint.png);}');
//$document->addStyleDeclaration('.icon-48-remark {background-image: url(../media/com_imprint/images/assets/48px/icon-48-remark.png);}');
//$document->addStyleDeclaration('.icon-48-remarks {background-image: url(../media/com_imprint/images/assets/48px/icon-48-remarks.png);}');
//$document->addStyleDeclaration('.icon-16-about {background-image: url(../media/com_imprint/images/assets/48px/icon-16-about.png);}');
//$document->addStyleDeclaration('.icon-16-cpanel {background-image: url(../media/com_imprint/images/assets/48px/icon-16-cpanel.png);}');
//$document->addStyleDeclaration('.icon-16-imprints {background-image: url(../media/com_imprint/images/assets/48px/icon-16-imprints.png);}');
//$document->addStyleDeclaration('.icon-16-imprint {background-image: url(../media/com_imprint/images/assets/48px/icon-16-imprint.png);}');
//$document->addStyleDeclaration('.icon-16-remark {background-image: url(../media/com_imprint/images/assets/48px/icon-16-remark.png);}');
//$document->addStyleDeclaration('.icon-16-remarks {background-image: url(../media/com_imprint/images/assets/48px/icon-16-remarks.png);}');
//$document->addStyleDeclaration('fieldset.adminform label, fieldset.adminform span.faux-label {width: 150px;}');

JLoader::register('ImprintHelper', __DIR__ . '/helpers/imprint.php');

$controller = JControllerLegacy::getInstance('Imprint');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
