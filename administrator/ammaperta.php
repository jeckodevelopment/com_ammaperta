<?php
/**
 * @version     1.0.0
 * @package     com_ammaperta
 * @copyright   Copyright (C) 2014 Jecko Development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Luca Marzo <info@jeckodevelopment.com> - http://www.jeckodevelopment.com
 */


// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_ammaperta')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JController::getInstance('Ammaperta');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
