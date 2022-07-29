<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;
?>
<div class="d-flex flex-column">
	<?php if ($before) : ?>
	<div class="">
		<?php echo $before; ?>
	</div>
	<?php endif; // if before?>
	<?php if (is_object($buttons)) : ?>	
	<div class="py-3">
		<?php foreach($buttons as $button) :
			if ($button->url && ($button->iconclass || $button->text)) :
		?>
			<a class=" <?php echo ($button->buttonclass && is_array($button->buttonclass)) ? implode(" ", $button->buttonclass): $button->buttonclass; ?> <?php echo ($button->custombuttonclass) ? $button->custombuttonclass : ''; ?>" href="<?php echo $button->url; ?>" target="_blank">
				<?php echo ($button->iconclass) ? '<i class="'.$button->iconclass.' pe-2"></i> ' : '' ; ?>
				<?php echo $button->text; ?>
			</a>
		<?php 
			endif; // if $button->text
		endforeach; // foreach $buttons as $button
		?>
	</div>
	<?php endif; // if is_object(buttons) ?>
	<?php if ($after) : ?>
	<div class="">
		<?php echo $after; ?>
	</div>
	<?php endif; // if before?>
</div>
