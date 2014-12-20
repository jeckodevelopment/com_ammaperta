<?php
/**
 * @version     1.0.0
 * @package     com_ammaperta
 * @copyright   Copyright (C) 2014 Jecko Development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Luca Marzo <info@jeckodevelopment.com> - http://www.jeckodevelopment.com
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Concessione controller class.
 */
class AmmapertaControllerConcessione extends JControllerForm
{

    function __construct() {
        $this->view_list = 'concessioni';
        parent::__construct();
    }

}