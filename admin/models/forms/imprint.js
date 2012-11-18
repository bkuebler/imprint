/**
 * @version		3.0.1
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

/**
 * Method to validate the name text box.
 *  
 * @author	mgebhardt
 * @since	3.0
 */
window.addEvent('domready', function() {
	document.formvalidator.setHandler('name',
		function (value) {
			regex=/^[^0-9]+$/;
			return regex.test(value);
	});
});