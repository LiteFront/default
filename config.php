<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
     */

    'inherit' => null, //default
    /*
    |--------------------------------------------------------------------------
    | List view for the theme
    |--------------------------------------------------------------------------
    |
    | Here you can specify which view is to be loaded for the list page
    | this can be 'list', 'grid', 'box', 'bootstrap-table' or 'data-table'
    |
    | You can specify additional views but you have to create it under
    | 'patrial/list' folder of each package that uses this theme.
    |
     */

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
     */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function ($theme) {
            // You can remove this line anytime.
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function ($theme) {
            //You may use this event to set up your assets.

            $theme->asset()->usePath()->add('vendor', 'dist/css/app.css');
            $theme->asset()->usePath()->add('settings', 'css/settings.css');
            $theme->asset()->usePath()->add('main', 'css/app.css');
            $theme->asset()->usePath()->add('jquery', 'dist/js/jquery.min.js');

            $theme->asset()->container('footer')->usepath()->add('manifest', 'dist/js/manifest.js');
            $theme->asset()->container('footer')->usepath()->add('vendor', 'dist/js/vendor.js');
            $theme->asset()->container('footer')->usepath()->add('app', 'dist/js/app.js');
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [
            'app' => function ($theme) {
                $theme->asset()->container('footer')->usepath()->add('main', 'js/main.js');
                $theme->asset()->container('footer')->usepath()->add('theme', 'js/theme.js');
            },
        ],

    ],

];
