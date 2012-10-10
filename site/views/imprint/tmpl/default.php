<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Imprint Team
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die( 'Restricted access' );
$user = JFactory::getUser();
// count all rows to display
$rows = 1;
if($show_recht = ($this->imprint->params->get('show_recht') == "1"))
	$rows++;
if($show_bank = ((($this->imprint->params->get('show_bankguests')=="1") || (!$user->guest)) &&
					($this->imprint->params->get('show_bank')=="1")))
	$rows++;
if($show_extra1 = ($this->imprint->params->get('show_extra1')=="1"))
	$rows++;
if($show_extra2 = ($this->imprint->params->get('show_extra2')=="1"))
	$rows++;
if($show_extra3 = ($this->imprint->params->get('show_extra3')=="1"))
	$rows++;
if($show_technik = ($this->imprint->params->get('show_technik')=="1"))
	$rows++;
if($show_design = ($this->imprint->params->get('show_design')=="1"))
	$rows++;
if($show_image_rights =($this->imprint->params->get('show_image_rights')=="1"))
	$rows++;
if($show_info = ($this->imprint->params->get('show_info')=="1"))
	$rows++;
if(($show_remarks = ($this->imprint->remarks !== false)) && $show_info)
	$rows++;
?>
<div id="component-imprint">
	<table class="imprint_table">
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('address'); ?>
			</td>
<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_logo" rowspan="<?php echo $rows; ?>">
					<?php echo JHTML::_('image', '/images/'.$this->imprint->image, JText::_( 'COM_IMPRINT' ), array('align' => 'middle')); ?>
			</td>
<?php endif; ?>
		</tr>

<?php if ($show_recht): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('recht'); ?>
			</td>
		</tr>
<?php endif; ?>

    
<?php
if ($show_bank): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('bank'); ?>
			</td>
		</tr>
<?php endif; ?>
    
<?php if ($show_extra1): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('extra1'); ?>
			</td>
		</tr>
<?php endif; ?>

<?php if ($show_extra2): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('extra2'); ?>
			</td>
		</tr>
<?php endif; ?>

<?php if ($show_extra3): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('extra3'); ?>
			</td>
		</tr>
<?php endif; ?>
    
<?php if ($show_technik): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('technik'); ?>
			</td>
		</tr>
<?php endif; ?>
    
            
<?php if ($show_design): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('design'); ?>
			</td>
		</tr>
<?php endif; ?>
    
<?php if ($show_image_rights): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('image_rights'); ?>
			</td>
		</tr>
<?php endif; ?>

<?php if ($show_info): ?>
	<?php if($show_remarks): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('remarks'); ?>
			</td>
		</tr>
	<?php endif; ?>
		<tr>
			<td class="imprint_td_template">
				<table class="imprint_no_border">
					<tr>
	<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
						<td class="imprint_td_icon">
						</td>
	<?php endif; ?>
						<td class="imprint_td_align_top">
							<?php echo nl2br($this->imprint->misc); ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
<?php endif; ?>
	</table>
</div>
