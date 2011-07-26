<?php
/**
 * @version		3.0 $Id$
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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Impressum controller class.
 * 
 * @package		Joomla
 * @subpackage	Impressum
 * @since		3.0
 */
class ImpressumController extends JController
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
		JRequest::setVar('view', JRequest::getCmd('view', 'Impressum'));
		
		// call parent behavior
		parent::display($cachable);
		*/
		
		$document	= JFactory::getDocument();
		$viewType	= $document->getType();
		$viewName	= JRequest::getCmd('view', 'Impressum');
		$viewLayout	= JRequest::getCmd('layout', 'default');
		
		$view = $this->getView($viewName, $viewType, '', array('base_path' => $this->basePath));
		
		// Get/Create the model
		if ($model = $this->getModel('Impressum')) {
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