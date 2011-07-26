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

defined( '_JEXEC' ) or die( 'Restricted access' );
$user =& JFactory::getUser();

//if ( $this->params->get( 'show_page_title', 1 ) && !$this->impressum->params->get( 'popup' ) ) :
?>
<!--  <div class="componentheading<?php //echo $this->params->get( 'pageclass_sfx' ); ?>">-->
  <?php // echo $this->params->get( 'page_title' ); ?>
<!--  </div>-->
<?php //endif; ?>

<div id="component-impressum">
	<table border="0" width="100%">
		<tr>
			<td>
				<?php echo $this->loadTemplate('address'); ?>
			</td>
<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
				<div style="float: left;">
					<?php echo JHTML::_('image', '/images/'.$this->impressum->image, JText::_( 'COM_IMPRESSUM' ), array('align' => 'middle')); ?>
				</div>
			</td>
<?php endif; ?>
		</tr>

<?php if ($this->impressum->params->get('show_recht')=="1"): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('recht'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
          	<td valign="top" >
          	</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>

    
<?php
if (($this->impressum->params->get('show_bankguests')=="0") && (!$user->guest) &&
	($this->impressum->params->get('show_bank')=="1")): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('bank'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
			</td>
	<?php endif; ?>
		</tr>
<?php elseif ($this->impressum->params->get('show_bank')=="1"): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('bank'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
    
<?php if ($this->impressum->params->get('show_extra1')=="1"): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('extra1'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>

<?php if ($this->impressum->params->get('show_extra2')=="1"): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('extra2'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>

<?php if ($this->impressum->params->get('show_extra3')=="1"): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('extra3'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
    
<?php if ($this->impressum->params->get('show_technik')=="1"): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('technik'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
    
            
<?php if ($this->impressum->params->get('show_design')=="1"): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('design'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>
    
<?php if ($this->impressum->params->get('show_bildrechte')=="1"): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('bildquellen'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
			</td>
	<?php endif; ?>
		</tr>
<?php endif; ?>

<?php if ($this->impressum->params->get('show_info')=="1"): ?>
		<tr>
			<td>
				<?php echo $this->loadTemplate('infos'); ?>
			</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
			<td valign="top" >
			</td>
	<?php endif; ?>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
	<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
						<td style="width: 20px" align="left">
						</td>
	<?php endif; ?>
						<td>
							<?php echo $this->impressum->misc; ?>
						</td>
	<?php if ( $this->impressum->image && $this->impressum->params->get( 'show_image' ) ): ?>
						<td valign="top" >
						</td>
	<?php endif; ?>
					</tr>
				</table>
			</td>
		</tr>
<?php endif; ?>
	</table>
</div>
