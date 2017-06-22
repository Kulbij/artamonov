<?php namespace Intertech\Seo\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Seo Back-end Controller
 */
class Seo extends Controller
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

        BackendMenu::setContext('Intertech.Seo', 'seo', 'seo');
    }
}
