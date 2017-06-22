<?php namespace Intertech\Artemonovteam;

use Backend;
use System\Classes\PluginBase;

/**
 * Artemonovteam Plugin Information File
 */
class Plugin extends PluginBase
{
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
        return []; // Remove this line to activate

        return [
            'Intertech\Artemonovteam\Components\MyComponent' => 'myComponent',
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
                        'icon'        => 'icon-phone',
                        'permissions' => ['intertech.artemonovteam.*'],
                        'order'       => 100,
                    ],
                ],
            ],
        ];
    }
}
