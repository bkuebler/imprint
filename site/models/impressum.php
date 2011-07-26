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

jimport('joomla.application.component.model');

/**
 * Impressum model class.
 * 
 * @package     Joomla
 * @subpackage  Impressum
 * @since		3.0
 */
class ImpressumModelImpressum extends JModel
{
	
	/** 
	 * @author	mgebhardt
	 * @var		int		The id of the imressum; 0 for default impressum.
	 * @since	3.0
	 */
	protected $id;
	
	/** 
	 * @author	mgebhardt
	 * @var		object	The impressum object.
	 * @since	3.0
	 */
	protected $impressum;
	
	/** 
	 * @author	mgebhardt
	 * @var		string	The name of the website.
	 * @since	3.0
	 */
	protected $siteName;
	
	/**
	 * Method to laod the impressum from database.
	 *  
	 * @author	mgebhardt
	 * @return	mixed	The impressum object or false if impressum not found.
	 * @since	3.0
	 */
	function getImpressum()
	{
		if (!isset($this->impressum))
		{
			$this->getId();
			
			$default = $this->id == 0;
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from('#__impressum');
			if ($default)
				$query->where('aktiv = 1');
			else
				$query->where("id = $this->id");
			$db->setQuery((string)$query);
			$db->query();
			if($db->getNumRows() == 0)
			{
				if(!$default)
				{
					// Impressum not found? Try default impressum.
					$this->id = 0;
					$this->getImpressum();
				}
				else
				{
					// Default impressum is missing. Show error page.
					$this->setError(JText::_('COM_IMPRESSUM_ERROR_DEFAULT_IMPRESSUM_NOT_FOUND'));
					return false;
				}
			}
			$impressum = $db->loadObject();
	
			$params = $impressum->params;
	
			$impressum->params = new JRegistry();
			$impressum->params->loadJSON($params);
			
			// Handle email cloaking
			if ($impressum->params->get('show_email')) {
				$impressum->email_to = JHTML::_('email.cloak', $impressum->email_to);
			}
			
			if ($impressum->params->get('show_street_adress') || $impressum->params->get('show_suburb') || $impressum->params->get('show_state') || $impressum->params->get('show_postcode') || $impressum->params->get('show_country'))
			{
				if (!empty ($impressum->address) || !empty ($impressum->suburb) || !empty ($impressum->state) || !empty ($impressum->country) || !empty ($impressum->postcode))
				{
					$impressum->params->set('address_check', 1);
				}
			}
			else
			{
				$impressum->params->set('address_check', 0);
			}
			
			// Manage the display mode for impressum detail groups
			switch ($impressum->params->get('contact_icons'))
			{
				case 1 :
					// text
					$impressum->params->set('marker_address', 	JText::_('Website').": ");
					$impressum->params->set('marker_email', 		JText::_('Email').": ");
					$impressum->params->set('marker_telephone', 	JText::_('Telefon').": ");
					$impressum->params->set('marker_fax', 		JText::_('Fax').": ");
					$impressum->params->set('marker_mobile',		JText::_('Handy').": ");
					$impressum->params->set('marker_misc', 		JText::_('Information').": ");
					$impressum->params->set('column_width', 		'100');
					break;
	
				case 2 :
					// none
					$impressum->params->set('marker_address', 	  '');
					$impressum->params->set('marker_email', 	  	'');
					$impressum->params->set('marker_telephone', 	'');
					$impressum->params->set('marker_mobile', 	    '');
					$impressum->params->set('marker_fax', 		    '');
					$impressum->params->set('marker_misc', 		    '');
					$impressum->params->set('column_width', 	  	'0');
					break;
	
				default :
					// icons
					$image1 = JHTML::_('image.site', 'con_address.png',   '/media/contacts/images/', $impressum->params->get('icon_address'), 	'/media/contacts/images/', JText::_('Website').": ");
					$image2 = JHTML::_('image.site', 'emailButton.png',   '/media/contacts/images/', $impressum->params->get('icon_email'), 		'/media/contacts/images/', JText::_('Email').": ");
					$image3 = JHTML::_('image.site', 'con_tel.png',       '/media/contacts/images/', $impressum->params->get('icon_telephone'), 	'/media/contacts/images/', JText::_('Telefon').": ");
					$image4 = JHTML::_('image.site', 'con_fax.png',       '/media/contacts/images/', $impressum->params->get('icon_fax'), 		'/media/contacts/images/', JText::_('Fax').": ");
					$image5 = JHTML::_('image.site', 'con_info.png',      '/media/contacts/images/', $impressum->params->get('icon_misc'), 		'/media/contacts/images/', JText::_('Information').": ");
					$image6 = JHTML::_('image.site', 'con_mobile.png',    '/media/contacts/images/', $impressum->params->get('icon_mobile'), 	'/media/contacts/images/', JText::_('Handy').": ");
	
					$impressum->params->set('marker_address',   $image1);
					$impressum->params->set('marker_email',     $image2);
					$impressum->params->set('marker_telephone', $image3);
					$impressum->params->set('marker_fax',       $image4);
					$impressum->params->set('marker_misc',      $image5);
					$impressum->params->set('marker_mobile',    $image6);
					$impressum->params->set('column_width',     '40');
					break;
			}
		}
		return $impressum;
	}
	
	/**
	 * Method to get the impressum id from URL.
	 *  
	 * @author	mgebhardt
	 * @return	int	The impressum id or 0 for default impressum.
	 * @since	3.0
	 */
	function getId()
	{
		if(!isset($this->id))
		{
			$this->id = JRequest::getVar('id', 0);
		}
		return $this->id;
	}
	
	/**
	 * Method to get the name of the website.
	 *  
	 * @author	mgebhardt
	 * @return	string	The name of the website.
	 * @since	3.0
	 */
	function getSiteName()
	{
		if(!isset($this->siteName))
		{
			$app = JFactory::getApplication();
			$this->siteName = $app->getCfg('sitename');
		}
		return $this->siteName;
	}
}