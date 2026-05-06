<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2022 TLWebdesign. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Installer\InstallerScriptInterface;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Log\Log;
use Joomla\Filesystem\Folder;

return new class implements InstallerScriptInterface
{
    public function install(InstallerAdapter $adapter): bool
    {
        Factory::getApplication()->enqueueMessage(Text::_('MOD_PRETTYBUTTONS_INSTALLERSCRIPT_INSTALL'));

        return true;
    }

    public function uninstall(InstallerAdapter $adapter): bool
    {
        Factory::getApplication()->enqueueMessage(Text::_('MOD_PRETTYBUTTONS_INSTALLERSCRIPT_UNINSTALL'));

        return true;
    }

    public function update(InstallerAdapter $adapter): bool
    {
        Factory::getApplication()->enqueueMessage(Text::_('MOD_PRETTYBUTTONS_INSTALLERSCRIPT_UPDATE'));

        // Joomla 6.1+ auto-removes files dropped from the manifest; older versions do not.
        if (version_compare(JVERSION, '6.1', '<')) {
            $this->removeLegacyFiles();
        }

        return true;
    }

    public function preflight(string $type, InstallerAdapter $adapter): bool
    {
        if (version_compare(JVERSION, '5.4.0', '<')) {
            Log::add(Text::sprintf('JLIB_INSTALLER_MINIMUM_JOOMLA', '5.4.0'), Log::WARNING, 'jerror');

            return false;
        }

        return true;
    }

    public function postflight(string $type, InstallerAdapter $adapter): bool
    {
        return true;
    }

    private function removeLegacyFiles(): void
    {
        $fieldsDir = JPATH_SITE . '/modules/mod_prettybuttons/fields';

        if (is_dir($fieldsDir)) {
            Folder::delete($fieldsDir);
        }
    }
};