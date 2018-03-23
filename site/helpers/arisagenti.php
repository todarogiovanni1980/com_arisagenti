<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Arisagenti
 * @author     Todaro Giovanni <giovanni.todaro@gmail.com>
 * @copyright  2018 Todaro Giovanni
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */
defined('_JEXEC') or die;

JLoader::register('ArisagentiHelper', JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_arisagenti' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'arisagenti.php');

/**
 * Class ArisagentiFrontendHelper
 *
 * @since  1.6
 */
class ArisagentiHelpersArisagenti
{
	/**
	 * Get an instance of the named model
	 *
	 * @param   string  $name  Model name
	 *
	 * @return null|object
	 */
	public static function getModel($name)
	{
		$model = null;

		// If the file exists, let's
		if (file_exists(JPATH_SITE . '/components/com_arisagenti/models/' . strtolower($name) . '.php'))
		{
			require_once JPATH_SITE . '/components/com_arisagenti/models/' . strtolower($name) . '.php';
			$model = JModelLegacy::getInstance($name, 'ArisagentiModel');
		}

		return $model;
	}

	/**
	 * Gets the files attached to an item
	 *
	 * @param   int     $pk     The item's id
	 *
	 * @param   string  $table  The table's name
	 *
	 * @param   string  $field  The field's name
	 *
	 * @return  array  The files
	 */
	public static function getFiles($pk, $table, $field)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select($field)
			->from($table)
			->where('id = ' . (int) $pk);

		$db->setQuery($query);

		return explode(',', $db->loadResult());
	}

    /**
     * Gets the edit permission for an user
     *
     * @param   mixed  $item  The item
     *
     * @return  bool
     */
    public static function canUserEdit($item)
    {
        $permission = false;
        $user       = JFactory::getUser();

        if ($user->authorise('core.edit', 'com_arisagenti'))
        {
            $permission = true;
        }
        else
        {
            if (isset($item->created_by))
            {
                if ($user->authorise('core.edit.own', 'com_arisagenti') && $item->created_by == $user->id)
                {
                    $permission = true;
                }
            }
            else
            {
                $permission = true;
            }
        }

        return $permission;
    }
}
