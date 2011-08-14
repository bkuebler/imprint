<?php
/**
 * @version		3.0.1 $Id$
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

?>

<table width="100%" border="0">
	<tr>
<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
			<img src="<?php echo JURI::root(); ?>media/com_impressum/images/home.png" border="" alt="" />
		</td>
<?php endif; ?>
		<td>
			<strong><?php echo $this->impressum->adresstitel ?></strong>
		</td>
	</tr>
	<tr>
<?php if ($this->impressum->params->get('show_icons')=="1"): ?>
		<td style="width: 20px" align="left">
		</td>
<?php endif; ?>
		<td width="<?php echo $this->impressum->params->get('leftcw'); ?>%" valign="top" align="left">
			<?php if ($this->impressum->firma) echo "<strong>".$this->impressum->firma."</strong><br />" ?>
			<?php if ($this->impressum->name1) echo "<strong>".$this->impressum->name1."</strong><br />" ?>
			<?php if ($this->impressum->name2) echo "<strong>".$this->impressum->name2."</strong><br />" ?>
			<?php if ($this->impressum->name3) echo "<strong>".$this->impressum->name3."</strong><br />" ?>
			<?php if ($this->impressum->name4) echo "<strong>".$this->impressum->name4."</strong><br />" ?>
			<?php if ($this->impressum->strasse) echo $this->impressum->strasse ?><br />
			<?php if ($this->impressum->plz) echo $this->impressum->plz ?>
			<?php if ($this->impressum->ort) echo $this->impressum->ort ?><br />
			<?php if ($this->impressum->land) echo $this->impressum->land ?>
		</td>
		<td align="left" valign="top">
			<table cellspacing="2" cellpadding="0" border="0">
<?php if ($this->impressum->telefon != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->impressum->params->get( 'marker_telephone' ); ?>&nbsp;
					</td>
					<td align="left">
						<?php echo $this->impressum->telefon; ?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->impressum->fax != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->impressum->params->get( 'marker_fax' ); ?>&nbsp;
					</td>
					<td align="left">
						<?php echo $this->impressum->fax ?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->impressum->handy != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->impressum->params->get( 'marker_mobile' ); ?>&nbsp;
					</td>
					<td align="left">
						<?php echo $this->impressum->handy ?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->impressum->website != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->impressum->params->get( 'marker_address' ); ?>&nbsp;
					</td>
					<td align="left">
						<a href="http://<?php echo $this->impressum->website ?>">
							<?php echo $this->impressum->website ?>
						</a>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->impressum->email != ''): ?>
				<tr>
					<td align="left">
						<?php echo $this->impressum->params->get( 'marker_email' ); ?>&nbsp;
					</td>
					<td align="left">
						<?php if ($this->impressum->email) echo JHTML::_('email.cloak', $this->impressum->email); ?>
					</td>
				</tr>
<?php endif; ?>
<?php if ($this->impressum->params->get('show_contacturl')=="1"): ?>
				<tr>
					<td align="left">
						<?php echo $this->impressum->params->get( 'marker_email' ); ?>&nbsp;
					</td>
					<td align="left">
						<a href="http://<?php echo $this->impressum->contacturl ?>">Kontaktformular anzeigen</a>
					</td>
				</tr>
<?php endif; ?>
			</table>
		</td>
	</tr>
</table>
<!-- Adresse Ende -->
<br />