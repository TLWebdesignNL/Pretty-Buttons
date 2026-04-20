<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2022 TLWebdesign. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace TlwebNamespace\Module\Prettybuttons\Site\Dispatcher;

\defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;

class Dispatcher extends AbstractModuleDispatcher
{
    protected function getLayoutData(): array
    {
        $data   = parent::getLayoutData();
        $params = $data['params'];

        $data['block']            = $params->get('block');
        $data['customouterclass'] = $params->get('customouterclass');
        $data['enable_aria_label'] = (int) $params->get('enable_aria_label', 0);
        $data['before']           = $params->get('before');
        $data['buttons']          = $params->get('buttons');
        $data['after']            = $params->get('after');

        return $data;
    }
}
