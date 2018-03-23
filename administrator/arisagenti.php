<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Arisagenti
 * @author     Todaro Giovanni <giovanni.todaro@gmail.com>
 * @copyright  2018 Todaro Giovanni
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_arisagenti'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Arisagenti', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('ArisagentiHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'arisagenti.php');

$controller = JControllerLegacy::getInstance('Arisagenti');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
