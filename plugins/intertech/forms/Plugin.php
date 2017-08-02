<?php namespace Intertech\Forms;

use Backend;
use System\Classes\PluginBase;

/**
 * Forms Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['RainLab.User'];
    
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Forms',
            'description' => 'No description provided yet...',
            'author'      => 'Intertech',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Intertech\Forms\Components\Callback' => 'callback',
            'Intertech\Forms\Components\ProductFeedback' => 'productFeedback',
            'Intertech\Forms\Components\Feedback' => 'feedback',
            'Intertech\Forms\Components\Team' => 'formTeam',
            'Intertech\Forms\Components\AskQuestion' => 'askQuestion',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'intertech.forms.some_permission' => [
                'tab' => 'Forms',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'forms' => [
                'label'       => 'Формы',
                'url'         => Backend::url('intertech/forms/callbacks'),
                'icon'        => 'icon-pencil-square-o',
                'permissions' => ['intertech.forms.*'],
                'order'       => 400,
                'sideMenu' => [
                    // 'callbacks' => [
                    //     'label'       => 'Обратный звонок',
                    //     'url'         => Backend::url('intertech/forms/callbacks'),
                    //     'icon'        => 'icon-phone',
                    //     'permissions' => ['intertech.forms.*'],
                    //     'order'       => 100,
                    // ],
                    'feedbacks' => [
                        'label'       => 'Обратная связь',
                        'url'         => Backend::url('intertech/forms/feedbacks'),
                        'icon'        => 'icon-comments-o',
                        'permissions' => ['intertech.forms.*'],
                        'order'       => 200,
                    ],
                    'programfeedbacks' => [
                        'label'       => 'Обратная связь программы',
                        'url'         => Backend::url('intertech/forms/programfeedbacks'),
                        'icon'        => 'icon-pencil',
                        'permissions' => ['intertech.forms.*'],
                        'order'       => 300,
                    ],
                    'teams' => [
                        'label'       => 'Хочу в команду',
                        'url'         => Backend::url('intertech/forms/teams'),
                        'icon'        => 'icon-users',
                        'permissions' => ['intertech.forms.*'],
                        'order'       => 400,
                    ],
                    'askquestions' => [
                        'label'       => 'Задать вопрос',
                        'url'         => Backend::url('intertech/forms/askquestions'),
                        'icon'        => 'icon-question-circle',
                        'permissions' => ['intertech.forms.*'],
                        'order'       => 500,
                    ],
                ],
            ],
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'intertech.forms::mail.admin_callback' => 'Send callback on mail admin',
            'intertech.forms::mail.user_callback' => 'Send callback on mail user',
            'intertech.forms::mail.admin_feedback' => 'Send feeedback on mail admin',
            'intertech.forms::mail.user_feedback' => 'Send feeedback on mail user',
        ];
    }
}
