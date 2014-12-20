<?php
/**
 * @version     1.0.0
 * @package     com_ammaperta
 * @copyright   Copyright (C) 2014 Jecko Development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Luca Marzo <info@jeckodevelopment.com> - http://www.jeckodevelopment.com
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Concessioni list controller class.
 */
class AmmapertaControllerConcessioni extends AmmapertaController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Concessioni', $prefix = 'AmmapertaModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}