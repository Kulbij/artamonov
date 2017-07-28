<?php namespace Intertech\Artemonovteam;

use Backend;
use System\Classes\PluginBase;

/**
 * Artemonovteam Plugin Information File
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
            'name'        => 'Artemonovteam',
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
            'Intertech\Artemonovteam\Components\Cover' => 'cover',
            'Intertech\Artemonovteam\Components\Pages' => 'pages',
            'Intertech\Artemonovteam\Components\Socials' => 'socials',
            'Intertech\Artemonovteam\Components\AskQuestion' => 'askquestion',
            'Intertech\Artemonovteam\Components\Footer' => 'footer',
            'Intertech\Artemonovteam\Components\Categories' => 'categories',
            'Intertech\Artemonovteam\Components\Calendar' => 'calendar',
            'Intertech\Artemonovteam\Components\UpWorkuuts' => 'upworkouts',
            'Intertech\Artemonovteam\Components\Trainers' => 'trainers',
            'Intertech\Artemonovteam\Components\Contacts' => 'contacts',
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
            'intertech.artemonovteam.some_permission' => [
                'tab' => 'Artemonovteam',
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
            'artemonovteam' => [
                'label'       => 'Сайт',
                'url'         => Backend::url('intertech/artemonovteam/pages'),
                'icon'        => 'icon-home',
                'permissions' => ['intertech.artemonovteam.*'],
                'order'       => 500,
                'sideMenu' => [
                    'pages' => [
                        'label'       => 'Страницы',
                        'url'         => Backend::url('intertech/artemonovteam/pages'),
                        'icon'        => 'icon-square',
                        'permissions' => ['intertech.artemonovteam.*'],
                        'order'       => 100,
                    ],
                    'categories' => [
                        'label'       => 'Категории',
                        'url'         => Backend::url('intertech/artemonovteam/categories'),
                        'icon'        => 'icon-book',
                        'permissions' => ['intertech.artemonovteam.*'],
                        'order'       => 200,
                    ],
                    'articals' => [
                        'label'       => 'Блог',
                        'url'         => Backend::url('intertech/artemonovteam/articals'),
                        'icon'        => 'icon-bars',
                        'permissions' => ['intertech.artemonovteam.*'],
                        'order'       => 300,
                    ],
                    'tags' => [
                        'label'       => 'Теги',
                        'url'         => Backend::url('intertech/artemonovteam/tags'),
                        'icon'        => 'icon-tags',
                        'permissions' => ['intertech.artemonovteam.*'],
                        'order'       => 400,
                    ],
                    'programs' => [
                        'label'       => 'Програмы',
                        'url'         => Backend::url('intertech/artemonovteam/programs'),
                        'icon'        => 'icon-list',
                        'permissions' => ['intertech.artemonovteam.*'],
                        'order'       => 500,
                    ],
                    'trainers' => [
                        'label'       => 'Тренеры',
                        'url'         => Backend::url('intertech/artemonovteam/trainers'),
                        'icon'        => 'icon-users',
                        'permissions' => ['intertech.artemonovteam.*'],
                        'order'       => 500,
                    ],
                    'covers' => [
                        'label'       => 'Обложки',
                        'url'         => Backend::url('intertech/artemonovteam/covers'),
                        'icon'        => 'icon-users',
                        'permissions' => ['intertech.artemonovteam.*'],
                        'order'       => 600,
                    ],
                ],
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'contactsettings' => [
                'label'       => 'Контакты',
                'description' => 'Редактирование страницы контактов.',
                'category'    => 'Сайт',
                'icon'        => 'icon-phone',
                'class'       => 'Intertech\Artemonovteam\Models\ContactSettings',
                'order'       => 1,
            ],
            'socialsettings' => [
                'label'       => 'Социальные сети',
                'description' => 'Редактирование социальных сетей.',
                'category'    => 'Сайт',
                'icon'        => 'icon-facebook',
                'class'       => 'Intertech\Artemonovteam\Models\SocialSettings',
                'order'       => 2,
            ],
            'settings' => [
                'label'       => 'Основная информация',
                'description' => 'Редактирование основной информации.',
                'category'    => 'Сайт',
                'icon'        => 'icon-sun-o',
                'class'       => 'Intertech\Artemonovteam\Models\Settings',
                'order'       => 3,
            ],
        ];
    }
}
