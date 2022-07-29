<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use TlwebNamespace\Module\Prettybuttons\Site\Helper\PrettybuttonsHelper;

//$test  = PrettybuttonsHelper::getText();

$block = $params->get('block');
$customoutterclass = $params->get('customoutterclass');
$before = $params->get('before');
$buttons = $params->get('buttons');
$after = $params->get('after');

require ModuleHelper::getLayoutPath('mod_prettybuttons', $params->get('layout', 'default'));
