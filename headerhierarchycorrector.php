<?php
/**
 * Yash Vora Header Hierarchy Corrector plugin
 *
 * @copyright(C)2018 Open Source Matters, Inc. <https://www.joomla.org>
 * @license          GNU General Public License version 2 or later; see LICENSE.txt
 * @since            4.0
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\HTML\HTMLHelper;

defined('_JEXEC') or die('Restricted access');
/**
 * Checks heading hierarchy and corrects it
 *
 * @since 4.0
 */
class PlgSystemHeaderHierarchyCorrector extends CMSPlugin
{

	public function __construct(& $subject, $config)
	{
		$this->loadLanguage('plg_system_headerhierarchycorrector');
		parent::__construct($subject, $config);
	}

	public function isActive()
	{
		$app = Factory::getApplication();

		if ($app->getName() === 'site')
		{
			return true;
		}

		return false;
	}

	public function onBeforeRender()
	{
		$active = $this->isActive();

		if (!$active)
		{
			return '';
		}

		HTMLHelper::_('script', 'media/plg_system_headerhierarchycorrector/js/config-header-corrector.es6.js', array('version' => 'auto'));

		return true;
	}

}
