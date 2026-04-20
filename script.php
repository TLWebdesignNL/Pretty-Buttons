<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2022 TLWebdesign. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Log\Log;
use Joomla\Filesystem\File;

/**
 * Script file of Prettybuttons module
 *
 * Class name follows Joomla's installer convention: {element}InstallerScript
 */
// phpcs:ignore PSR1.Classes.ClassDeclaration
class mod_prettybuttonsInstallerScript
{
    protected string $minimumJoomla = '4.0';

    protected string $minimumPhp = '';

    public function __construct()
    {
        $this->minimumPhp = JOOMLA_MINIMUM_PHP;
    }

    public function install($parent): bool
    {
        Factory::getApplication()->enqueueMessage(Text::_('MOD_PRETTYBUTTONS_INSTALLERSCRIPT_INSTALL'));

        return true;
    }

    public function uninstall($parent): bool
    {
        Factory::getApplication()->enqueueMessage(Text::_('MOD_PRETTYBUTTONS_INSTALLERSCRIPT_UNINSTALL'));

        return true;
    }

    public function update($parent): bool
    {
        Factory::getApplication()->enqueueMessage(Text::_('MOD_PRETTYBUTTONS_INSTALLERSCRIPT_UPDATE'));

        return true;
    }

    public function preflight($type, $parent): bool
    {
        if (!empty($this->minimumPhp) && version_compare(PHP_VERSION, $this->minimumPhp, '<')) {
            Log::add(Text::sprintf('JLIB_INSTALLER_MINIMUM_PHP', $this->minimumPhp), Log::WARNING, 'jerror');

            return false;
        }

        if (!empty($this->minimumJoomla) && version_compare(JVERSION, $this->minimumJoomla, '<')) {
            Log::add(Text::sprintf('JLIB_INSTALLER_MINIMUM_JOOMLA', $this->minimumJoomla), Log::WARNING, 'jerror');

            return false;
        }

        return true;
    }

    public function postflight($type, $parent): bool
    {
        return true;
    }
}
