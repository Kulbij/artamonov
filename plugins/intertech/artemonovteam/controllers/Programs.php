<?php namespace Intertech\Artemonovteam\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Programs Back-end Controller
 */
class Programs extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Intertech.Artemonovteam', 'artemonovteam', 'programs');
    }
}
