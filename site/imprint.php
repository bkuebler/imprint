<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_imprint
 *
 * @copyright   Copyright (C) 2011 - 2013 Imprint Team. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// require_once JPATH_COMPONENT.'/helpers/route.php';
// require_once JPATH_COMPONENT.'/helpers/query.php';

$controller = JControllerLegacy::getInstance('Imprint');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
