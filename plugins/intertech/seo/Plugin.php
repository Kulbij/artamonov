<?php namespace Intertech\Seo;

use Backend;
use System\Classes\PluginBase;

/**
 * Seo Plugin Information File
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
            'name'        => 'Seo',
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
            'Intertech\Seo\Components\Seo' => 'seo',
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
            'intertech.seo.some_permission' => [
                'tab' => 'Seo',
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
            'seo' => [
                'label'       => 'SEO',
                'url'         => Backend::url('intertech/seo/seo'),
                'icon'        => 'icon-line-chart',
                'permissions' => ['intertech.seo.*'],
                'order'       => 700,

                'sideMenu' => [
                    'seo' => [
                        'label'       => 'SEO',
                        'url'         => Backend::url('intertech/seo/seo'),
                        'icon'        => 'icon-line-chart',
                        'order'       => 100,
                        'permissions' => ['feegleweb.octoshop.*']
                    ],
                ],
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'SEO',
                'description' => 'SEO настройки по умолчанию.',
                'category'    => 'SEO',
                'icon'        => 'icon-line-chart',
                'class'       => 'Intertech\SEO\Models\Settings',
                'order'       => 190,
            ],
        ];
    }
}
