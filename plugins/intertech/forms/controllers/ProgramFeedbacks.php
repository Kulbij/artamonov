<?php namespace Intertech\Forms\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Program Feedbacks Back-end Controller
 */
class ProgramFeedbacks extends Controller
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

        BackendMenu::setContext('Intertech.Forms', 'forms', 'programfeedbacks');
    }
}
