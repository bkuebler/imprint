<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_imprint
 * 
 * @copyright   Copyright (C) 2011 - 2013 Team Imprint. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

definded('_JEXEC') or die;
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'imprint.cancel' || document.formvalidator.isValid(document.id('imprint-form')))
		{
			Joomla.submitform(task, document.getElementById('imprint-form'));
		}
		else
		{
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
		}
	}
</script>