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
?>
<div id="component-imprint">
	<table class="imprint_table">
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('address'); ?>
			</td>
<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
				<div style="float: left;">
					<?php echo JHTML::_('image', '/images/'.$this->imprint->image, JText::_( 'COM_IMPRINT' ), array('align' => 'middle')); ?>
				</div>
			</td>
<?php endif; ?>
		</tr>

<?php if ($this->imprint->params->get('show_recht')=="1"): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('recht'); ?>
			</td>
	<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
          	<td class="imprint_td_align_top">
          	</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>

    
<?php
if ((($this->imprint->params->get('show_bankguests')=="1") || (!$user->guest)) &&
	($this->imprint->params->get('show_bank')=="1")): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('bank'); ?>
			</td>
	<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
    
<?php if ($this->imprint->params->get('show_extra1')=="1"): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('extra1'); ?>
			</td>
	<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>

<?php if ($this->imprint->params->get('show_extra2')=="1"): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('extra2'); ?>
			</td>
	<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>

<?php if ($this->imprint->params->get('show_extra3')=="1"): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('extra3'); ?>
			</td>
	<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
    
<?php if ($this->imprint->params->get('show_technik')=="1"): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('technik'); ?>
			</td>
	<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
    
            
<?php if ($this->imprint->params->get('show_design')=="1"): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('design'); ?>
			</td>
	<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
    
<?php if ($this->imprint->params->get('show_image_rights')=="1"): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('image_rights'); ?>
			</td>
	<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>

<?php if ($this->imprint->params->get('show_info')=="1"): ?>
	<?php if($this->imprint->remarks !== false): ?>
		<tr>
			<td class="imprint_td_template">
				<?php echo $this->loadTemplate('remarks'); ?>
			</td>
		<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
			</td>
		<?php endif; ?>
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
	<?php if ( $this->imprint->image && $this->imprint->params->get( 'show_image' ) ): ?>
			<td class="imprint_td_align_top">
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
	</table>
</div>
