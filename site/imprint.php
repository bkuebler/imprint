<?php
/**
 * @version		3.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2013 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Imprint
$controller = JController::getInstance('Imprint');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
