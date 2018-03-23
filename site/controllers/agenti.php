<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Arisagenti
 * @author     Todaro Giovanni <giovanni.todaro@gmail.com>
 * @copyright  2018 Todaro Giovanni
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Agenti list controller class.
 *
 * @since  1.6
 */
class ArisagentiControllerAgenti extends ArisagentiController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Agenti', $prefix = 'ArisagentiModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
