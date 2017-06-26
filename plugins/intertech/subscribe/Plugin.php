<?php namespace Intertech\Subscribe;

use Backend;
use System\Classes\PluginBase;

/**
 * Subscribe Plugin Information File
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
            'name'        => 'Subscribe',
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
            'Intertech\Subscribe\Components\SubscribeUser' => 'subscribeUser',
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
            'intertech.subscribe.some_permission' => [
                'tab' => 'Subscribe',
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
            'subscribe' => [
                'label'       => 'Подписки',
                'url'         => Backend::url('intertech/subscribe/subscribers'),
                'icon'        => 'icon-user-plus',
                'permissions' => ['intertech.subscribe.*'],
                'order'       => 600,

                'sideMenu' => [
                    'subscribers'    => [
                        'label' => 'Подписчики',
                        'url'   => Backend::url('intertech/subscribe/subscribers'),
                        'icon'  => 'icon-user-plus',
                        'order' => 100,
                        'permissions' => ['intertech.subscribe.*'],
                    ],
                ],
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Подписки',
                'description' => 'Настройки подписок.',
                'category'    => 'Подписки',
                'icon'        => 'icon-rss',
                'class'       => 'Intertech\Subscribe\Models\Settings',
                'order'       => 180,
            ],
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'intertech.subscribe::mail.subscribe' => 'Сообщение, которое отправляется пользователю после подписки.',
            'intertech.subscribe::mail.unsubscribe' => 'Сообщение, которое отправляется пользователю после отписки.',
            'intertech.subscribe::mail.active' => 'Сообщение, которое используется для рассылки.',
        ];
    }
}
