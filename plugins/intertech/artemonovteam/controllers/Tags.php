<?php namespace Intertech\Artemonovteam\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Tags Back-end Controller
 */
class Tags extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Intertech.Artemonovteam', 'artemonovteam', 'tags');
    }
}
