<?php namespace Intertech\Forms\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Ask Questions Back-end Controller
 */
class AskQuestions extends Controller
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

        BackendMenu::setContext('Intertech.Forms', 'forms', 'askquestions');
    }
}
