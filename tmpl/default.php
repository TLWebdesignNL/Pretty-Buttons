<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

$wrapperClass = "";
if ($block == 1) {
    $wrapperClass = "d-grid gap-2";
}
?>

<div class="d-flex flex-column pretty-buttons">
    <?php if ($before) : ?>
        <div class="before">
            <?php echo $before; ?>
        </div>
    <?php endif; // if before ?>
    <?php if (is_object($buttons)) : ?>
        <div class="<?php echo $wrapperClass; ?> <?php echo $customouterclass; ?> pb-button-div">
            <?php foreach ($buttons as $button) :
                if ($button->url && ($button->iconclass || $button->buttontext)) :
                    ?>
                    <a class="
                        <?php echo (isset($button->buttonclass) && is_array($button->buttonclass)) ? implode(" ", $button->buttonclass) : $button->buttonclass; ?>
                        <?php echo (isset($button->custombuttonclass)) ? $button->custombuttonclass : ''; ?>"
                       href="<?php echo $button->url; ?>"
                       target="<?php echo (isset($button->buttontarget)) ? $button->buttontarget : "_blank" ; ?>"
                       aria-label="<?php echo (isset($button->buttontext)) ? $button->buttontext : ''; ?>"
                    >
                        <?php echo (isset($button->iconclass)) ? '<i class="' . $button->iconclass . ' pe-2"></i> ' : ''; ?>
                        <?php echo (isset($button->buttontext)) ? $button->buttontext : ''; ?>
                    </a>
                <?php
                endif; // if $button->buttontext
            endforeach; // foreach $buttons as $button
            ?>
        </div>
    <?php endif; // if is_object(buttons) ?>
    <?php if ($after) : ?>
        <div class="after">
            <?php echo $after; ?>
        </div>
    <?php endif; // if before?>
</div>
