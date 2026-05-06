<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2022 TLWebdesign. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

$wrapperClass = $block == 1 ? 'd-grid gap-2' : '';
?>

<div class="d-flex flex-column pretty-buttons">
    <?php if (!empty($before)) : ?>
        <div class="before">
            <?php echo $before; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($buttons)) : ?>
        <div class="<?php echo trim(htmlspecialchars($wrapperClass . ' ' . $customouterclass, ENT_QUOTES, 'UTF-8')); ?> pb-button-div">
            <?php foreach ($buttons as $button) :
                if (!empty($button->url) && (!empty($button->iconclass) || !empty($button->buttontext))) :
                    $buttonClasses = '';
                    $target        = $button->buttontarget ?? '_blank';
                    $rel           = $target === '_blank' ? 'noopener noreferrer' : '';

                    if (!empty($button->buttonclass)) {
                        $classes       = is_array($button->buttonclass) ? $button->buttonclass : [$button->buttonclass];
                        $buttonClasses = implode(' ', array_map(
                            static fn(string $c) => htmlspecialchars($c, ENT_QUOTES, 'UTF-8'),
                            $classes
                        ));
                    }

                    if (!empty($button->custombuttonclass)) {
                        $buttonClasses .= ' ' . htmlspecialchars($button->custombuttonclass, ENT_QUOTES, 'UTF-8');
                    }

                    $ariaLabel = $button->buttontext ?? '';

                    if (!empty($enable_aria_label) && !empty($button->aria_label)) {
                        $ariaLabel = $button->aria_label;
                    }
                    ?>
                    <a class="<?php echo trim($buttonClasses); ?>"
                       href="<?php echo htmlspecialchars($button->url, ENT_QUOTES, 'UTF-8'); ?>"
                       target="<?php echo htmlspecialchars($target, ENT_QUOTES, 'UTF-8'); ?>"
                       <?php if (!empty($rel)) : ?>rel="<?php echo htmlspecialchars($rel, ENT_QUOTES, 'UTF-8'); ?>"<?php endif; ?>
                       aria-label="<?php echo htmlspecialchars($ariaLabel, ENT_QUOTES, 'UTF-8'); ?>"
                    >
                        <?php if (!empty($button->iconclass)) : ?>
                            <i class="<?php echo htmlspecialchars($button->iconclass, ENT_QUOTES, 'UTF-8');
                                echo !empty($button->buttontext) ? ' pe-2' : ''; ?>" aria-hidden="true"></i>
                        <?php endif; ?>
                        <?php echo htmlspecialchars($button->buttontext ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($after)) : ?>
        <div class="after">
            <?php echo $after; ?>
        </div>
    <?php endif; ?>
</div>
