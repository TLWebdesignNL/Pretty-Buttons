<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_prettybuttons
 *
 * @copyright   Copyright (C) 2022 TLWebdesign. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace TlwebNamespace\Module\Prettybuttons\Site\Helper;

\defined('_JEXEC') or die;

/**
 * Helper for mod_prettybuttons
 *
 * @since  V1.0.0
 */
class PrettybuttonsHelper
{
	/**
	 * Retrieve Prettybuttons test
	 *
	 * @param   Registry        $params  The module parameters
	 * @param   CMSApplication  $app     The application
	 *
	 * @return  array
	 */
	public static function getText()
	{
		return 'PrettybuttonsHelpertest';
	}
}
