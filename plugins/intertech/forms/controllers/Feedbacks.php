<?php namespace Intertech\Forms\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

/**
 * Feedbacks Back-end Controller
 */
class Feedbacks extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Intertech.Forms', 'forms', 'feedbacks');
    }

    public function create()
    {
        return Response::make(View::make('cms::404'), 404);
    }

    public function update()
    {
        return Response::make(View::make('cms::404'), 404);
    }
}
