<?php
/**
 * Yash Vora Header Hierarchy Corrector plugin
 *
 * @copyright (C)2018 Open Source Matters, Inc. <https://www.joomla.org>
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
	/**
	 * Constructor
	 *
	 * @param   DispatcherInterface  &$subject  The object to observe
	 * @param   array                $config    An optional associative array of configuration settings.
	 *                                          Recognized key values include 'name', 'group', 'params', 'language'
	 *                                         (this list is not meant to be comprehensive).
	 *
	 * @since   1.5
	 */
	public function __construct(& $subject, $config)
	{
		/**
		* Loads the plugin language file
		*
		* @param   string  $extension  The extension for which a language file should be loaded
		*
		* @return  boolean  True, if the file has successfully loaded.
		*
		* @since   1.5
		*/
		$this->loadLanguage('plg_system_headerhierarchycorrector');
		parent::__construct($subject, $config);
	}

	// Checks if current running application is site
	public function isActive()
	{
		/**
		 * Get the global application object. When the global application doesn't exist, an exception is thrown.
		 *
		 * @return  CMSApplicationInterface object
		 *
		 * @since   1.7.0
		 * @throws  \Exception
		 */
		$app = Factory::getApplication();

		// Checks the name of the current running application if it is site then returns true.
		if ($app->getName() === 'site')
		{
			return true;
		}

		// Returns false if current application is not site.
		return false;
	}

	/**
	 * Listener for the `onBeforeRender` event
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onBeforeRender()
	{
		$active = $this->isActive();

		if (!$active)
		{
			return '';
		}

		/**
		 * Class loader method used for loading Javascrript
		 *
		 * Additional arguments may be supplied and are passed to the sub-class.
		 * Additional include paths are also able to be specified for third-party use
		 *
		 * @param   string  $key         The name of helper method to load, (prefix).(class).function
		 *                               prefix and class are optional and can be used to load custom
		 *                               html helpers.
		 * @param   array   $methodArgs  The arguments to pass forward to the method being called
		 *
		 * @return  mixed  Result of HTMLHelper::call($function, $args)
		 *
		 * @since   1.5
		 * @throws  \InvalidArgumentException
		 */
		HTMLHelper::_('script', 'media/plg_system_headerhierarchycorrector/js/config-header-corrector.es6.js', array('version' => 'auto'));

		return true;
	}

}