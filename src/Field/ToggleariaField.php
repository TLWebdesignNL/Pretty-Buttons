<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2022 TLWebdesign. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace TlwebNamespace\Module\Prettybuttons\Site\Field;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\Field\RadioField;

class ToggleariaField extends RadioField
{
    protected $type = 'Togglearia';

    protected function getInput(): string
    {
        $wa        = Factory::getApplication()->getDocument()->getWebAssetManager();
        $assetName = 'mod_prettybuttons.togglearia';

        if (!$wa->assetExists('script', $assetName)) {
            $wa->registerScript(
                $assetName,
                'media/mod_prettybuttons/js/admin/togglearia.js',
                ['version' => '1.3.0'],
                ['defer' => true]
            );
        }

        $wa->useScript($assetName);

        return parent::getInput();
    }
}