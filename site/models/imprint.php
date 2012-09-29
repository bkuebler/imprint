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

jimport('joomla.application.component.model');

/**
 * Imprint model class.
 * 
 * @package     Joomla
 * @subpackage  Imprint
 * @since		3.0
 */
class ImprintModelImprint extends JModel
{
	
	/** 
	 * @author	mgebhardt
	 * @var		int		The id of the imressum; 0 for default imprint.
	 * @since	3.0
	 */
	protected $id;
	
	/** 
	 * @author	mgebhardt
	 * @var		object	The imprint object.
	 * @since	3.0
	 */
	protected $imprint;
	
	/** 
	 * @author	mgebhardt
	 * @var		string	The name of the website.
	 * @since	3.0
	 */
	protected $siteName;
	
	/**
	 * Method to laod the imprint from database.
	 *  
	 * @author	mgebhardt
	 * @return	mixed	The imprint object or false if imprint not found.
	 * @since	3.0
	 */
	function getImprint()
	{
		if (!isset($this->imprint))
		{
			$this->getId();
			
			$default = $this->id == 0;
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from('#__imprint_imprints');
			if ($default)
				$query->where('`default` = 1');
			else
				$query->where("`id` = $this->id");
			$db->setQuery((string)$query);
			$db->query();
			if($db->getNumRows() == 0)
			{
				if(!$default)
				{
					// Imprint not found? Try default imprint.
					$this->id = 0;
					$this->getImprint();
				}
				else
				{
					// Default imprint is missing. Show error page.
					$this->setError(JText::_('COM_IMPRINT_ERROR_DEFAULT_IMPRINT_NOT_FOUND'));
					return false;
				}
			}
			$imprint = $db->loadObject();
	
			$params = $imprint->params;
	
			$imprint->params = new JRegistry();
			$imprint->params->loadJSON($params);
			
			// Handle email cloaking
			if ($imprint->params->get('show_email')) {
				$imprint->email_to = JHTML::_('email.cloak', $imprint->email_to);
			}
			
			if ($imprint->params->get('show_street_adress') || $imprint->params->get('show_suburb') || $imprint->params->get('show_state') || $imprint->params->get('show_postcode') || $imprint->params->get('show_country'))
			{
				if (!empty ($imprint->address) || !empty ($imprint->suburb) || !empty ($imprint->state) || !empty ($imprint->country) || !empty ($imprint->postcode))
				{
					$imprint->params->set('address_check', 1);
				}
			}
			else
			{
				$imprint->params->set('address_check', 0);
			}
			
			// Manage the display mode for imprint detail groups
			switch ($imprint->params->get('contact_icons'))
			{
				case 1 :
					// text
					$imprint->params->set('marker_address', 	JText::_('Website').": ");
					$imprint->params->set('marker_email', 		JText::_('Email').": ");
					$imprint->params->set('marker_telephone', 	JText::_('Telefon').": ");
					$imprint->params->set('marker_fax', 		JText::_('Fax').": ");
					$imprint->params->set('marker_mobile',		JText::_('Handy').": ");
					$imprint->params->set('marker_misc', 		JText::_('Information').": ");
					$imprint->params->set('column_width', 		'100');
					break;
	
				case 2 :
					// none
					$imprint->params->set('marker_address', 	  '');
					$imprint->params->set('marker_email', 	  	'');
					$imprint->params->set('marker_telephone', 	'');
					$imprint->params->set('marker_mobile', 	    '');
					$imprint->params->set('marker_fax', 		    '');
					$imprint->params->set('marker_misc', 		    '');
					$imprint->params->set('column_width', 	  	'0');
					break;
	
				default :
					// icons
					$image1 = JHTML::_('image.site', 'con_address.png',   '/media/contacts/images/', $imprint->params->get('icon_address'), 	'/media/contacts/images/', JText::_('Website').": ");
					$image2 = JHTML::_('image.site', 'emailButton.png',   '/media/contacts/images/', $imprint->params->get('icon_email'), 		'/media/contacts/images/', JText::_('Email').": ");
					$image3 = JHTML::_('image.site', 'con_tel.png',       '/media/contacts/images/', $imprint->params->get('icon_telephone'), 	'/media/contacts/images/', JText::_('Telefon').": ");
					$image4 = JHTML::_('image.site', 'con_fax.png',       '/media/contacts/images/', $imprint->params->get('icon_fax'), 		'/media/contacts/images/', JText::_('Fax').": ");
					$image5 = JHTML::_('image.site', 'con_info.png',      '/media/contacts/images/', $imprint->params->get('icon_misc'), 		'/media/contacts/images/', JText::_('Information').": ");
					$image6 = JHTML::_('image.site', 'con_mobile.png',    '/media/contacts/images/', $imprint->params->get('icon_mobile'), 	'/media/contacts/images/', JText::_('Handy').": ");
	
					$imprint->params->set('marker_address',   $image1);
					$imprint->params->set('marker_email',     $image2);
					$imprint->params->set('marker_telephone', $image3);
					$imprint->params->set('marker_fax',       $image4);
					$imprint->params->set('marker_misc',      $image5);
					$imprint->params->set('marker_mobile',    $image6);
					$imprint->params->set('column_width',     '40');
					break;
			}
			
			// Load remarks
			if(isset($imprint->remarks))
			{
				$remarks = explode(';', $imprint->remarks);
				$query = $db->getQuery(true);
				$query->select('id, name');
				$query->from('#__imprint_remarks');
				$query->where('id IN (' . implode(', ', $remarks) . ')');
				$db->setQuery($query);
				$imprint->remarks = $db->loadObjectList();
				
				foreach ($imprint->remarks as $remark)
				{
					$url = 'index.php?option=com_imprint&view=remark&imprintId=';
					$url .= $this->getId();
					$url .= '&id=' . $remark->id;
					$remark->url = JRoute::_($url);
				}
			}
			else
			{
				$imprint->remarks = false;
			}
			$this->imprint = $imprint;
		}
		return $this->imprint;
	}
	
	/**
	 * Method to get the imprint id from URL.
	 *  
	 * @author	mgebhardt
	 * @return	int	The imprint id or 0 for default imprint.
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