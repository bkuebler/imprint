<?php
/**
 * @version		3.0.1 $Id$
 * @package		Joomla
 * @subpackage	Imprint
 * @copyright	(C) 2011 - 2012 Impressum Reloaded Team
 * @license		GNU/GPL, see LICENSE.txt
 * Imprint is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.

 * Imprint is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with Imprint; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

?>

<table style="width: 100%; border-width: 0px">
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
			<img src="<?php echo JURI::root(); ?>media/com_imprint/images/home.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo $this->imprint->adresstitel ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->imprint->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td width="<?php echo $this->imprint->params->get('leftcw'); ?>%" valign="top" align="left">
			<?php if ($this->imprint->firma) echo "<strong>".$this->imprint->firma."</strong><br />" ?>
			<?php if ($this->imprint->name1) echo "<strong>".$this->imprint->name1."</strong><br />" ?>
			<?php if ($this->imprint->name2) echo "<strong>".$this->imprint->name2."</strong><br />" ?>
			<?php if ($this->imprint->name3) echo "<strong>".$this->imprint->name3."</strong><br />" ?>
			<?php if ($this->imprint->name4) echo "<strong>".$this->imprint->name4."</strong><br />" ?>
			<?php if ($this->imprint->strasse) echo $this->imprint->strasse ?><br />
			<?php if ($this->imprint->plz) echo $this->imprint->plz ?>
			<?php if ($this->imprint->ort) echo $this->imprint->ort ?><br />
			<?php if ($this->imprint->land) echo $this->imprint->land ?>
		</td>
		<td align="left" valign="top">
			<table style="width: 100%; border-width: 0px; border-spacing: 0px; padding: 0px">
<?php if ($this->imprint->telefon != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_telephone' ); ?>&nbsp;
					</td>
					<td align="left">
						<?php echo $this->imprint->telefon; ?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->fax != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_fax' ); ?>&nbsp;
					</td>
					<td align="left">
						<?php echo $this->imprint->fax ?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->handy != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_mobile' ); ?>&nbsp;
					</td>
					<td align="left">
						<?php echo $this->imprint->handy ?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->website != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_address' ); ?>&nbsp;
					</td>
					<td align="left">
						<a href="http://<?php echo $this->imprint->website ?>">
							<?php echo $this->imprint->website ?>
						</a>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->email != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_email' ); ?>&nbsp;
					</td>
					<td align="left">
						<?php if ($this->imprint->email) echo JHTML::_('email.cloak', $this->imprint->email); ?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->imprint->params->get('show_contacturl')=="1"): ?>
				<tr>
					<td align="left">
						<?php echo $this->imprint->params->get( 'marker_email' ); ?>&nbsp;
					</td>
					<td align="left">
						<a href="http://<?php echo $this->imprint->contacturl ?>">Kontaktformular anzeigen</a>
					</td>
				</tr>
<?php endif; ?>
			</table>
		</td>
	</tr>
</table>
<!-- Adresse Ende -->
<br />