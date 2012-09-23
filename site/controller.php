<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.controller');

//TODO: Remove all old static views and add new view for additional texts

/**
 * Imprint controller class.
 * 
 * @package		Joomla
 * @subpackage	Imprint
 * @since		3.0
 */
class ImprintController extends JController
{

	/**
	 * Typical view method for MVC based architecture
	 *  
	 * @author	mgebhardt
	 * @param	boolean		If true, the view output will be cached 
 	 * @return	JController	This object to support chaining. 
	 * @since	3.0
	 */
	function display($cachable = false)
	{
		/* 
		 * Old stuff, cannot push the one model in all views.
		// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'Imprint'));
		
		// call parent behavior
		parent::display($cachable);
		*/
		
		$document	= JFactory::getDocument();
		$viewType	= $document->getType();
		$viewName	= JRequest::getCmd('view', 'Imprint');
		$viewLayout	= JRequest::getCmd('layout', 'default');
		
		$view = $this->getView($viewName, $viewType, '', array('base_path' => $this->basePath));
		
		// Get/Create the model
		if ($model = $this->getModel('Imprint')) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
		
		// Set the layout
		$view->setLayout($viewLayout);
		
		$view->assignRef('document', $document);
		
		$conf = JFactory::getConfig();
		
		// Display the view
		if ($cachable && $viewType != 'feed' && $conf->get('caching') >= 1) {
			$option	= JRequest::getCmd('option');
			$cache	= JFactory::getCache($option, 'view');
		
			if (is_array($urlparams)) {
				$app = JFactory::getApplication();
		
				$registeredurlparams = $app->get('registeredurlparams');
		
				if (empty($registeredurlparams)) {
					$registeredurlparams = new stdClass();
				}
		
				foreach ($urlparams AS $key => $value)
				{
					// Add your safe url parameters with variable type as value {@see JFilterInput::clean()}.
					$registeredurlparams->$key = $value;
				}
		
				$app->set('registeredurlparams', $registeredurlparams);
			}
		
			$cache->get($view, 'display');
		
		}
		else {
			$view->display();
		}
		
		return $this;
	}
}