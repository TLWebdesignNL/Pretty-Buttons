<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2022 TLWebdesign. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\Field\RadioField;

class JFormFieldTogglearia extends RadioField
{
    protected $type = 'Togglearia';

    protected function getInput()
    {
        $wa = Factory::getApplication()->getDocument()->getWebAssetManager();
        $assetName = 'mod_prettybuttons.togglearia';

        if (!$wa->assetExists('script', $assetName)) {
            $wa->registerScript(
                $assetName,
                'media/mod_prettybuttons/js/admin/togglearia.js',
                [],
                ['defer' => true]
            );
        }

        $wa->useScript($assetName);

        return parent::getInput();
    }
}
