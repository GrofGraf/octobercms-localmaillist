<?php namespace GrofGraf\LocalMaillist;

use Backend;
use System\Classes\PluginBase;

/**
 * MaillistSubscribe Plugin Information File
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
            'name'        => 'LocalMaillist',
            'description' => 'Creates a local maillist subscriptions',
            'author'      => 'GrofGraf',
            'icon'        => 'icon-envelope-square'
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
            'GrofGraf\LocalMaillist\Components\SubscribeForm' => 'subscribeForm',
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
            'grofgraf.localmaillist.some_permission' => [
                'tab' => 'LocalMaillist',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerSettings(){
      return [
          'settings' => [
              'label'       => 'Local Maillist',
              'description' => 'Settings for maillist subscription',
              'category'    => 'Marketing',
              'icon'        => 'icon-envelope',
              'class'       => 'GrofGraf\LocalMaillist\Models\Settings',
              'order'       => 100,
              'permissions' => ['grofgraf.localmaillist.settings']
          ]
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
            'maillistsubscribe' => [
                'label'       => 'LocalMaillist',
                'url'         => Backend::url('grofgraf/localmaillist/maillist'),
                'icon'        => 'icon-envelope-square',
                'permissions' => ['grofgraf.localmaillist.*'],
                'order'       => 500,
            ],
        ];
    }
}
